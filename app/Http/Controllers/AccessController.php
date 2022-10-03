<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\History_log;
use DataTables;
use DB;
use Session;


class AccessController extends Controller
{
    public function register(Request $request){
       
        $validator = $request->validate([

            'username' => 'required|unique:users',
            'password' => 'required|min:5',
        
        ], [
            'username.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

            $user = new User;
            $user->id =Str::uuid()->toString();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->user_type = $request->userType;
            $query = $user->save();
          
            return back()->with('success','Item created successfully!');
        
    
           
    }
    //history
    public function getHistory()
    {
        //Join query to get the name of the user in History table
        // select * from history_logs inner join users.id = history_logs.user_id

        if(request()->ajax()) {
            $data = History_log::join('users', 'users.id', '=', 'history_logs.user_id')
                    ->orderBy('history_logs.created_at', 'desc')
                    ->get(['users.*', 'history_logs.*']);
                    
                return DataTables()->of($data)->make(true);
        }
         return view('pages/access/historyLog');
    }

    // Log in code
    public function userLogin(Request $request){
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required'
        ]);
            $user = User::where('username', '=', $request->username)->first();

            if($user){
                if(Hash::check($request->password, $user->password)){
                    // if password is match then save details in history logs
                    Session::put('loggedID', $user->id); // created session
                    // echo  $user; ///// 0 ID -- ERROR
                    $history = new History_log;
                    $history->history_id = Str::uuid()->toString(); // uuid generator
                    $history->user_id = $user->id;
                    $history->category = 'Login';
                    $history->description = 'Logged In';
                    $query = $history->save();
                    
                    return redirect('dashboard');
                }else{
                    return back()->with('error','Password is not matched.');
                }
            }else{
                return back()->with('error','Username not found.');
            } 
    }
    //logout
    public function userLogout()
    {
        if(Session::has('loggedID')){
            Session::pull('loggedID');
            return redirect('login');
        }

    }
}
