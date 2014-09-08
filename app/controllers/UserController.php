<?php

class UserController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));    
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
    public function postSignup() {        
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return Response::json( array('msg' => 1));
        }
        else{
            return Response::json( array('msg' => 0));
        }
    }
    public function getSignout() {
        Auth::logout();
        return Redirect::to('/');
    }
}
