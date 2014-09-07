<?php
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homePage'));
Route::get('/profile', array('before'=>'auth', 'as' => 'profile', 'uses' => 'HomeController@profilePage'));
Route::get('/contact', array('before'=>'auth', 'as' => 'contact', 'uses' => 'HomeController@contactsPage'));
Route::controller('users', 'UserController');
Route::controller('contacts', 'ContactController');