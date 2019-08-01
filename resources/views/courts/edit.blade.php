@extends('dashboards.admin')
@section('mainbody')
<div class="row">
    <div class="col-md-8">

        <!-- INPUT GROUPS -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add court</h3>
            </div>
            <div class="panel-body">
                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('courts.update',$court->court_id) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="description">Court name:</label>
                            <input type="text" class="form-control" name="description" value="{{$court->description}}">
                        </div>
                        <!---
                        <div class="form-group">
                            <label for="img">Logo:</label>
                            <input type="file" class="form-control" name="img"/>
                        </div>
                        --->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
        <!-- END INPUT GROUPS -->


    </div>
</div>
@stop
@section('myscript')

@stop