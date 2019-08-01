@extends('dashboards.admin')
@section('mainbody')
<?php
use \App\Http\Controllers\UsersRecordController;
?>
<div class="row">
    <div class="col-md-12">

        <!-- INPUT GROUPS -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Users record</h3>
            </div>
            <div class="panel-body">
                <div>
                    <a style="margin: 19px; float:right" href="{{ url('usercreate')}}" class="btn btn-primary">New user</a>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Role</td>
                                <td>Court</td>
                                <td>LGA</td>
                                <td>State</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.edit',$user->user_id)}}">{{$user->lname}} {{$user->fname}} {{$user->mname}}</a></td>
                                <td>{{$user->description}}</td>
                                <td>{{$user->cdescription}}</td>
                                <td>{{$user->local_name}}</td>
                                <td>{{$user->name}}</td>

                                <td>@if('1' == $user->status)
                                    <a href="#" class="btn btn-success btn-xs">Active</a>
                                    @else <a href="#" class="btn btn-danger btn-xs">In active</a>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
        <!-- END INPUT GROUPS -->


    </div>
</div>
@stop
@section('myscript')

@stop