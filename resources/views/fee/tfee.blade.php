@extends('dashboards.admin')
@section('mainbody')
<div class="row">
    <div class="col-md-12">

        <!-- INPUT GROUPS -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Transaction fee record</h3>
            </div>
            <div class="panel-body">
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Transaction fee ( &#x20A6 )</td>
                                <td>Date created</td>
                                <td>Last update</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fees as $fee)
                            <tr>
                                <td>{{$fee->amt}}</td>

                                <td>{{$fee->date_created}}</td>
                                <td>{{$fee->last_edit}}</td>

                                <td>
                                    <div class="modal fade" id="editFee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Edit Fee</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">

                                                    <div class="md-form mb-4">
                                                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Transaction fee</label>
                                                        <input type="text" id="tf" class="form-control" value="{{$fee->amt}}" name="tf">
                                                        <input type="hidden" id="tfId" value="{{$fee->id}}">
                                                    </div>
                                                    <div class="md-form mb-4">
                                                        <p id="response"></p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-success" type="button" id="updatetfBtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-warning btn-rounded mb-4" data-toggle="modal" data-target="#editFee">Edit fee
                                        </a>
                                    </div>
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
        $('#updatetfBtn').click(function(e){
            
            $('#response').addClass('text-primary text-center').html('Processing request . . .').fadeIn();
            e.preventDefault();
            var newTf = $('#tf').val(),
                id = $('#tfId').val();
            if($.isNumeric(newTf)){
                $('#updatetfBtn').attr('disabled', true);
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '{{ url('updatetf') }}',
                    data: {id:id,fee:newTf}, // serialize all form inputs
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                success: function(e) {
                    
                    $('#response').removeClass();
                    if(200 == e.status){ 
                        location.reload(true);

                    } else {
                        $("#response").addClass("text-danger text-center").html(e.msg);
                    }
                },
        });
        $('#updatetfBtn').attr('disabled', false);
    }
      else {
      $("#response").addClass("text-center text-danger").html('Fill in a valid fee');
    }
    });
    });
</script>
@stop