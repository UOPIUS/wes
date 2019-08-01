@extends('dashboards.admin')
@section('mainbody')
<div class="row">
    <div class="col-md-12">

        <!-- INPUT GROUPS -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Court record</h3>
            </div>
            <div class="panel-body">
                <div>
                    <a style="margin: 19px; float:right" href="{{ url('bindlgacourt')}}" class="btn btn-primary">New Court</a>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Court</td>
                                <td>Fee</td>
                                <td>Address</td>
                                <td>LGA</td>
                                <td>
                                    State
                                </td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bindcourts as $court)
                            <tr>
                                <td>{{$court->description}}</td>
                                <td>
                                   
                                    {{$court->fee}}
                                </td>
                                <td>{{$court->address}}</td>
                                <td>{{$court->local_name}}</td>
                                
                                <td>
                                   
                                    {{$court->name}}
                                </td>
                                
                                <td>@if('1' == $court->status)
                                    <a href="#" class="btn btn-success btn-xs">Active</a>
                                    @else <a href="#" class="btn btn-danger btn-xs">In active</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('bindcourts.edit',$court->bind_id)}}" class="btn btn-primary btn-xs">Edit</a>
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