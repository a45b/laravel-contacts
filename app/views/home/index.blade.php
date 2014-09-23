@extends('layouts.home')
@section('navbar')
    @parent	 
     <style type="text/css">
    	body{
    		background: #eee;
    	}
    </style>  
@stop

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="jumbotron text-center">
    			<p><i class="fa fa-users fa-10x"></i></p>
				<h1>Laravel Contacts</h1>
				<h3>A beautiful way to store your contacts online</h3>
			</div>
    	</div>
    </div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
	    {{ Form::open(array('url'=>'', 'role'=>'form', 'class'=>'form-signin', 'id'=> 'signup-form'))}}
	        <h2 class="form-signin-heading text-center">Sign up</h2>
          <div class="form-group">
	        <input type="text" name="name" class="form-control" placeholder="Name" required="" autofocus="">
          </div>
          <div class="form-group">
	        <input type="email" name="email" class="form-control" placeholder="Email" required="">
          </div>
          <div class="form-group">
	        <input type="password" name="password" class="form-control" placeholder="Password" required="">
          </div>
	        <button class="btn btn-lg btn-primary btn-block" id="sign_up_btn" type="button">Sign in</button>
	    {{ Form::close() }}
    </div>
  </div>
</div>
<!-- Sign In Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
	     {{ Form::open(array('url'=>'users/signin', 'role'=>'form', 'class'=>'form-signin', 'id'=> 'signin-form'))}}
	        <h2 class="form-signin-heading text-center">Sign in</h2>
	        <input type="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
	        <input type="password" name="password" class="form-control" placeholder="Password" required="">
	          @if ($alert = Session::get('error'))
              <p class="bg-danger" style="padding: 15px;">{{ $alert }}</p>
              <script type="text/javascript">
                $('#signinModal').modal('show');
              </script>
            @endif
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	    {{ Form::close() }}
    </div>
  </div>
</div>

<script type="text/javascript">
$('#sign_up_btn').on('click',function(){  
    var res = $('form#signup-form').data('bootstrapValidator').validate();      
    if(res.isValid() == true){
        $('#sign_up_btn').attr('disabled', true);
        var formData = $('form#signup-form').serializeArray();
        $.ajax({
            type: 'POST',
            url: 'users/signup',
            dataType: 'JSON',
            data: formData,
            success: function(data){                
                $('#sign_up_btn').attr('disabled', false);                
                $('#signupModal').modal('hide');
                $('form#signup-form').each(function(){this.reset();});

                if(data['msg'] == 1){
                    alertify.success('Thanks for registering.');
                }
                else{
                    alertify.error("Email already registered!");
                }
            },
            error: function(xhr, textStatus, thrownError) {
                $('#signupModal').modal('hide');
                $('form#signup-form').each(function(){this.reset();});
                alertify.error("Something went to wrong.Please Try again later...");
            }
        });
    }    
});

$(function(){
  $('form#signup-form').bootstrapValidator({
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
          password: {
              validators: {
                  notEmpty: {
                      message: 'The password is required and can\'t be empty'
                  },
                  identical: {
                      field: 'confirmPassword',
                      message: 'The password and its confirm are not the same'
                  },
                  stringLength: {
                      min: 6,
                      message: 'The name must be 6'
                  }
              }
          }
      }
  });
});
</script>
@stop
