@extends('layouts.home')
@section('navbar')
    @parent	
@stop

@section('content')
    <div class="container">
    	<div class="row">
    		<h1 class="text-center">Profile</h1>
    		<hr>
    	</div>    	
    	<div class="row">
    		<div class="col-md-6 col-md-offset-3">
                <div class="input-group alert alert-info">
                    <div class="input-group-addon">
                        <i class="fa fa-user fa-2x"></i>
                    </div>
                    <input type="text" class="form-control input-lg" disabled="disabled" value="{{Auth::user()->name}}">
                </div>
                <div class="input-group alert alert-info">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope fa-2x"></i>
                    </div>
                    <input type="text" class="form-control input-lg" disabled="disabled" value="{{Auth::user()->email}}">
                </div>                
            </div>
    	</div>
    </div>
    <script type="text/javascript">
        $('#profile_li').addClass('active');
    </script>
@stop
