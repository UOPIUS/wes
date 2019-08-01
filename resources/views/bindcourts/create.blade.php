
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
                    <form method="post" action="{{ route('bindcourts.store') }}" id="bindForm" name="bindForm">
                        @csrf
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
                            <select class="form-control" name="court">
                                <option value="">-Select-</option>
                                @foreach($courts as $court)
                                <option value="{{$court->court_id}}">{{$court->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">    
                            <label for="fee">Fee charged</label>
                            <input type="text" class="form-control" name="fee"/>
                        </div>

                        <div class="form-group">
                            <label for="img">Address:</label>
                            <input type="text" class="form-control" name="address"/>
                        </div>
                        <div class="form-group text-center">
                            <p id="response"></p>

                        </div>
                        <button type="submit" class="btn btn-primary" id='bindcourtBtn'>Add court</button>
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

    $("form[name='bindForm']").validate({
        rules: {
            lga: 'required',
            address: 'required',
            fee: {'required': true, 'number': true},
            court: 'required'
        },
        messages: {
            lga: 'Select an LGA',
            address: 'address is required',
            fee: 'Enter a valid fee'
        },
        submitHandler: function (form) {
            $('#bindcourtBtn').attr('disabled', true);
            $('#response').removeClass();
            if (confirm("Are you sure you want to proceed and complete this operation?")) {
                $('#response').addClass('alert alert-primary text-center').html('Processing request . . .').fadeIn();
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '{{ url('ajaxbindcourtlga') }}',
                    data: $('form').serialize(), // serialize all form inputs
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                       success: function(e) {
                    $('#bindcourtBtn').attr('disabled', false);
                    $('#response').removeClass();
                    if(200 === e.status){ $("#response").addClass("text-center bg-success").html(e.msg)
                        .fadeOut(5000, function(){
                        $('#bindForm').trigger("reset");
                    });
                    } else {
                        $("#response").addClass("alert alert-danger").html(e.msg);

                    }
                },
                    error: function(data) {
                        console.log(data);
                    }
            });
        }
    }
    });



    });

</script>
@stop