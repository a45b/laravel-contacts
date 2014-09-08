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
	    {{ Form::open(array('url'=>'users/signup', 'role'=>'form', 'class'=>'form-signin', 'id'=> 'signup-form'))}}
	        <h2 class="form-signin-heading text-center">Sign up</h2>
	        <input type="text" name="name" class="form-control" placeholder="Name" required="" autofocus="">
	        <input type="email" name="email" class="form-control" placeholder="Email" required="">
	        <input type="password" name="password" class="form-control" placeholder="Password" required="">
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
	        <label class="checkbox">
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	    {{ Form::close() }}
    </div>
  </div>
</div>
@stop
