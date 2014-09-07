<?php

class HomeController extends BaseController {

	public function __construct() {

	}

	protected $layout = "layouts.home";

	public function homePage(){
		$this->layout->content = View::make('home.index');
	}
	public function profilePage(){
		$this->layout->content = View::make('home.profile');
	}
	public function contactsPage(){
		$this->layout->content = View::make('home.contacts');
	}
}
