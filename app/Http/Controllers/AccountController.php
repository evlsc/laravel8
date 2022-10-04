<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use DB;

class AccountController extends Controller
{
    public function getAccount(){

        if(request()->ajax()) {
            $data = DB::table('users')->get();
                return DataTables()->of($data)->make(true);
        }
         return view('pages/modules/accountManagement');
    }

    public function getSpecificAccount($id){
        $user = DB::table('users')->where('id', $id )->first();
        return response()->json($user);
    }

    public function addAccount(Request $request){
        $data = new User;
        $data->id = Str::uuid()->toString(); // uuid generator
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->user_type = $request->user_type;
        $data->username = $request->first_name.' '.$request->last_name;
        $data->password = $request->first_name.' '.$request->last_name;
        $query = $data->save();
        
        if($query){
            $response = array('response' => "success", 'message' => "success");
        }else{
            $response = array('response' => "error", 'message' => "error");
        }
        return response()->json($response);
    }
    public function updateAccount(Request $request, $id){
        $query = DB::table('users')
              ->where('id', $id)
              ->update(['first_name' =>  $request->first_name, 
              'last_name' =>  $request->last_name, 'user_type' =>  $request->user_type]);
        if($query){
                $response = array('response' => "success", 'message' => "success");
            }else{
                $response = array('response' => "error", 'message' => "error");
            }
        return response()->json($response);            
    }
}