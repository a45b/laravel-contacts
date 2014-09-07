<?php

class UserController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));	
        //$this->beforeFilter('auth', array('only'=>array('postProfile')));
        //$this->beforeFilter('auth', array('only'=>array('postChangepassword')));
	}
    public function postSignin() {
        if (Auth::attempt(array('email'=> Input::get('email'), 'password'=>Input::get('password')))) {
            Session::put('userid', Auth::user()->id);
            Session::put('name', Auth::user()->name);
            Session::put('email', Auth::user()->email);
            return Redirect::to('contact');
        }
        else{
            return Redirect::to('/');
        }
        //return Response::json(Input::all());
    }
    public function getSignout() {
        Auth::logout();
        return Redirect::to('/');
    }
}
