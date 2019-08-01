@extends('dashboards.admin')
@section('mainbody')

<div class="row">
    <div class="col-md-8">

        <!-- INPUT GROUPS -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add new user</h3>
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
                    <form method="post" action="#" id="regForm" name="regForm">
                        @csrf
                        <div class="form-group">    
                            <label for="fname">First name</label>
                            <input type="text" class="form-control" name="fname"/>
                        </div>

                        <div class="form-group">
                            <label for="img">Last name:</label>
                            <input type="text" class="form-control" name="lname"/>
                        </div>
                        <div class="form-group">    
                            <label for="fee">Phone</label>
                            <input type="text" class="form-control" name="phone" maxlength='11'/>
                        </div>
                        <div class="form-group">    
                            <label for="fee">Email</label>
                            <input type="text" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">    
                            <label for="fee">Password</label>
                            <input type="text" class="form-control" name="password"/>
                        </div>

                        <div class="form-group">
                            <label for="img">Address:</label>
                            <input type="text" class="form-control" name="address"/>
                        </div>
                        <div class="form-group">    
                            <label for="description">Gender:</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">-Select-</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>
                        <div class="form-group">    
                            <label for="description">State name:</label>
                            <select class="form-control" name="state" id="state">
                                <option value="">-Select-</option>
                                @foreach($states as $state)
                                <option value="{{$state->state_id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">    
                            <label for="description">LGA:</label>
                            <select class="form-control" name="lga" id="lga">
                                <option value="">-Select-</option>

                            </select>
                        </div>
                        <div class="form-group">    
                            <label for="description">Court name:</label>
                            <select class="form-control" name="court" id="court">
                                <option value="">-Select-</option>

                            </select>
                        </div>

                        <div class="form-group">    
                            <label for="description">Select roles(s):</label><br>
                            @foreach($roles as $role)
                            &nbsp; &nbsp; &nbsp;<input type="checkbox" value="{{$role->role_id}}" id="{{$role->role_id}}" name="duty[]">&nbsp; &nbsp; &nbsp;<span class="font-size-16"><?= $role->description ?></span><br>
                            @endforeach
                        </div>

                        <div class="form-group text-center">
                            <p id="response"></p>

                        </div>
                        <button type="submit" class="btn btn-primary" id='regBtn'>Add user</button>
                    </form>
                </div> 
            </div>
        </div>
        <!-- END INPUT GROUPS -->

    </div>
</div>
@stop
@section('myscript')
<script type="text/javascript">
    $(function(){
        $('#state').change(function(){
            var selectedState = $('#state').val();
            $.ajax({
                type: "get",
                dataType: 'text',
                url: "{{ url('fetchlga') }}",
                data: {state_id:selectedState}, // serialize all form inputs
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#lga').html(response);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });


        $('#lga').change(function(){
            var selectedLga = $('#lga').val();
            $.ajax({
                type: "get",
                dataType: 'text',
                url: "{{ url('fetchcourts') }}",
                data: {lga:selectedLga}, // serialize all form inputs
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#court').html(response);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        
        $("form[name='regForm']").validate({
            rules: {
                fname: 'required',
                lname: 'required',
                gender: 'required',
                password: 'required',
                phone: {'required': true, 'number': true},

            },
            messages: {
                fname: 'Enter a first name',
                lname: 'Enter a first name',
                address: 'address is required',
                phone: 'Enter a valid phone',
                password: 'Enter a password'
            },
            submitHandler: function (form) {
                $('#regBtn').attr('disabled', true);
                $('#response').removeClass();
                if (confirm("Are you sure you want to proceed and complete this operation?")) {
                    $('#response').addClass('alert alert-primary text-center').html('Processing request . . .').fadeIn();
                    $.ajax({
                        type: "get",
                        dataType: 'json',
                        url: '{{ url('submituser') }}',
                        data: $('form').serialize(), // serialize all form inputs
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                           success: function(e) {
                        
                        $('#response').removeClass();
                        if(200 === e.status){ $("#response").addClass("text-center bg-success").html(e.msg)
                            .fadeOut(5000, function(){
                            $('#regForm').trigger("reset");
                        });
                                            } else {
                                                $("#response").addClass("alert alert-danger").html(e.msg);

                                            }
                    },
                        error: function(data) {
                            console.log(data);
                        }
                });
                $('#regBtn').attr('disabled', false);
                }
        }
                                           });



    });

</script>
@stop