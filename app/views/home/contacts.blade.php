@extends('layouts.home')
@section('sidebar')
    @parent
@stop

@section('content')
    <div class="container">
    	<div class="row">
    		<h1>Contacts <button class="btn btn-default pull-right" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus"></span> Add</button></h1>
    		<hr>
    	</div>        
    	<div class="row">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php $i = 1;?>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <?php $img = "uploads/".$contact->photoid.".jpg"; ?>
                        <td><img class="img-responsive" style="width:50px; height: 50px;" alt="photo" src="{{asset($img)}}"></td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->mobile}}</td>
                        <td><button class="btn btn-default btn-border-less"><span class="glyphicon glyphicon-edit text-info"></span></button></td>
                        <td><button class="btn btn-default btn-border-less"><span class="glyphicon glyphicon-trash text-danger"></span></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    	</div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="addModalLabel">Add Contact</h4>
          </div>
          <div class="modal-body">
                <div class="form-group">                    
                    <img class="img-responsive" id="cam_photo" style="width:100%;" alt="photo" src="{{asset('uploads/defaultpic.jpg')}}">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="imgfiles" name="imgfiles" accept="image/jpeg" onchange="readURL(this);"> 
                </div>    
            {{ Form::open(array('role'=>'form','id'=> 'contact-form'))}}
                <div class="form-group">
                    <label>Name</label>                    
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>              
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Mobile">
                </div>                                
            {{ Form::close() }}

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveContact();">Save</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
        var data_url = 0;
        var fname = 0;
        function readURL(input){
            if(input.files[0].size <= 1048576){
                   if (input.files && input.files[0]){
                        var reader = new FileReader();
                        reader.onload = function (e) {                            
                            data_url = e.target.result;
                            upImg(e.target.result);                                                
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
            }
            else{
                alert('File is too large. Upload file less than 1MB');
            }
        }
        function upImg(dataurl){
            fname = data_url.substr(data_url.length - 64);
            fname = fname.replace(/[^\w\s]/gi, '');
            var csrf_token = '{{csrf_token()}}';
            $.ajax({
                type: 'POST',
                url: '../contacts/dataimg',
                dataType: 'JSON',
                data: {'_token':csrf_token, 'fname':fname, 'dataurl': dataurl},
                success: function(data){
                    $('#cam_photo').attr('src', data_url);
                }
            });
        }
        function saveContact(){
            var res = $('form#contact-form').data('bootstrapValidator').validate();
            if(res.isValid() == true){
                var formData = $('form#contact-form').serializeArray();
                formData.push({name: 'fname', value: fname});
                $.ajax({
                    type: 'POST',
                    url: '../contacts/create',
                    dataType: 'JSON',
                    data: formData,
                    success: function(data){
                    }
                });
            }
        }

        $(function(){
            $('form#contact-form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required and can\'t be empty'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            },
                            emailAddress: {message: 'The input is not a valid email address'}
                        }
                    },
                    mobile: {
                        validators: {
                            notEmpty: {
                                message: 'The mobile is required and can\'t be empty'
                            },
                            digits: {
                                message: 'The value can contain only digits. Don\'t add +91'
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: 'The name must be 10'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop
