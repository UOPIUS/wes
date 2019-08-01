@extends('home.layout')

@section('home.content')

<div class="row" id="new">
    <!-- second Row -->
    <div class="col-12">
        <div class="card">

            <div class="card-block">
                <h4 class="card-title">New Role</h4>
                <p class="card-text">Add a new Role like Sub Admin etc</p>
                <div class="row">

                    <div class="col-2 offset-md-10">
                        <button type="button" class="btn btn-warning ladda-button" data-style="slide-left" data-plugin="ladda">
                            <span class="ladda-label"><i class="icon wb-arrow-left mr-10" aria-hidden="true"></i>Go
                                Back</span>
                            <span class="ladda-spinner"></span>
                        </button>  

                    </div>
                </div>
                <form autocomplete="off" method="post" name="role_form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="new_role">Name of Role</label>

                            <input type="text" class="form-control round" id="new_role" name="new_role" placeholder="Role" >
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="username">Print privilege</label>

                            &nbsp; &nbsp; &nbsp;<input type="checkbox" id="print_right" name="print_right">&nbsp; &nbsp; &nbsp;Allow
                        </div>

                        <div class="col-md-6  text-center">
                            <p id="response"></p>
                        </div>

                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary round" id="role_btn">Add new Role</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div> 
<div class="row" id="old">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Role record</h4>
                <p class="card-text">Record of roles available in your System</p>
                <table class="table table-striped" id="roleTable">
                    <thead>
                        <tr>
                            <td>Role</td>

                            <td>Role status</td>

                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Role</td>

                            <td>Role status</td>

                            <td colspan = 2>Actions</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$role->description}}</td>
                            <td>{{$role->home_page}}</td>
                            <td>
                                @if($role->status =='1')
                                <a href="#" class="btn btn-success">Active</a>
                                @elseif($role->status =='0')
                                <a href="#" class="btn btn-danger">In active</a>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('roles.edit',$role->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id)}}" method="post">
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

</div>
@stop

@section('home.script')

<script type="text/javascript">
    $("#new").hide();
    $(function () {
        $('#table_id').DataTable();

        $("form[name='role_form']").validate({
            rules: {
                new_role: 'required'
            },
            submitHandler: function (form) {
                $('#role_btn').attr('disabled', true);
                $('#response').fadeIn();
                // console.log(right);
                $.ajax({
                    type: 'post',
                    url: '../role/add_new_role.php',
                    data: $("form").serialize(),
                    dataType: 'json',
                    success: function (data) {
                        $('#response').addClass('alert alert-info').text(data.msg).fadeOut(5000, function () {
                            $('#role_btn').attr('disabled', false);
                        });
                    }
                });
            }
        });

        $("input[name='r_p']").click(function () {
            var key_value;
            if ($(this).is(":checked")) {
                var roleID = ($(this).attr('id')),
                    checkValue = "YY";
                key_value = roleID + '^' + checkValue;
            } else {
                var roleID = ($(this).attr('id')),
                    checkValue = "XX";
                key_value = roleID + '^' + checkValue;
            }
            //xhr
            $.ajax({
                type: 'post',
                url: '../role/__pr.php',
                data: {val:key_value},
                dataType: 'json',
                success: function (data) {
                    if(200 === data.status){
                        swal(data.msg,'Notification','success');
                    }

                }
            });
        });
    });
</script>
@stop