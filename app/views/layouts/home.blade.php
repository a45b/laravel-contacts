<html>
	<head>	            
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Laravel Contacts">
        <meta name="keywords" content="Laravel Contacts">
        <title>Laravel Contacts</title>       
        <!-- css -->
  	    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css')}}
        {{ HTML::style('packages/bootstrapvalidator/css/bootstrapValidator.min.css')}}
        {{ HTML::style('packages/font-awesome/css/font-awesome.min.css')}}
        {{ HTML::style('packages/alertifyjs/css/alertify.min.css')}}
        {{ HTML::style('packages/application/css/application.css')}}
        <!-- js -->
        {{ HTML::script('packages/jquery/js/jquery-2.1.1.min.js');}}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js');}}        
        {{ HTML::script('packages/bootstrapvalidator/js/bootstrapValidator.min.js');}}
        {{ HTML::script('packages/alertifyjs/js/alertify.min.js');}}
	</head>
    <body>
        @section('navbar')
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::to('/')}}">
                        <i class="fa fa-users"></i> Laravel-Contacts
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    @if(Auth::check())                    
                        <li id="contacts_li"><a href="{{URL::to('contact')}}">Contacts</a></li>
                    @endif    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li id="profile_li"><a href="{{URL::to('profile')}}">Profile</a></li>
                        <li id="signout_li"><a href="{{URL::to('users/signout')}}">Sign out</a></li>
                    @else                        
                        <li><a href="#" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#signinModal">Sign in</a></li>                        
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
        @show
        <section>
            @yield('content')
        </section>
        @section('footer')
          <div id="footer">
            <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="pull-left">
                      <small class="text-muted">&copy; iamkdev 2014</small>
                      <small class="text-muted"> | </small>
                      <small><a href="#" title="Learn about your privacy and Crimatrix"> Privacy</a></small>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                        <p class="pull-right">
                            <small class="text-muted">Created with Laravel</small>
                        </p>    
                  </div>
                </div>
            </div>
          </div>
    </body>
</html>
