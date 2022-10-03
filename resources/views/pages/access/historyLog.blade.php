@extends('pages.modules.layout')

@section('title')
<title>JBL | History logs</title>
@endsection
@section('content')
@csrf
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>History Logs</h1>
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
                    <table id="history" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customScript')
<script src="customs/js/access/history.js"></script>
@endsection
