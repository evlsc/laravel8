@extends('pages.modules.layout')

@section('title')
<title>JBL | Account Manamgent</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Account Management</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-body">
                    <div class="col-12">
                        <button type="submit" class="btn btn-default float-right" data-toggle="modal"
                            data-target="#modal-lg">Add User </button>
                    </div><br><br>
                    <table id="allAccount" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User type</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title"><i class="fas fa-user"></i> Create user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="accountForm">
                    <input type="hidden" id="uuid">
                    <div class="row">
                        <div class=" col-4 form-group">
                            <label for="ans1">Position</label>
                            <select class="custom-select rounded-0" id="user_type">
                                <option value="Member">Employee</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div><br>
                        <div class=" col-4 form-group">
                            <label for="ans1"> First name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Enter first name">
                        </div><br>
                        <div class=" col-4 form-group">
                            <label for="ans1">Last name </label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Enter last name">
                        </div><br>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">Save changes</button>
                </div>
            </form>
               
        </div>

    </div>

</div>
@endsection
@section('customScript')
<script src="customs/js/modules/accountManagement.js"></script>
@endsection