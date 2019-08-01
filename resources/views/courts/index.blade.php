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
                    <a style="margin: 19px; float:right" href="{{ route('courts.create')}}" class="btn btn-primary">New Court</a>
                </div>
                <div>
                    <table class="table table-striped" id="courtTable">
                        <thead>
                            <tr>
                                <td>Description</td>
                                <td>Date created</td>
                                
                                <td>Status</td>

                                <td colspan = 2>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courts as $court)
                            <tr>
                                <td>{{$court->description}}</td>

                                <td>{{$court->date_created}}</td>
                                
                                <td>@if('1' == $court->status)
                                    <a href="#" class="btn btn-success">Active</a>
                                    @else <a href="#" class="btn btn-danger">In active</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('courts.edit',$court->court_id)}}" class="btn btn-primary">Edit</a>
                                </td>

                                <td>
                                    <form action="{{ route('courts.destroy', $court->court_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
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
<script>
    $(function(){
        $('#courtTable').DataTable();
    });
</script>
@stop