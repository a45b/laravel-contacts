<?php

class ContactController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('postDataimg')));
		$this->beforeFilter('auth', array('only'=>array('postCreate')));
	}
	public function index()
	{
		$this->layout->content = View::make('user.index');
	}
	public function getContact()
	{
		$id = Input::get('id');
		$contacts = Contact::find($id);
		return Response::json($contacts);
	}
	public function postDataimg()
	{		
		$name = Input::get('fname');
		$data_url = Input::get('dataurl');		
		$this->saveGuestphoto($name,$data_url);
		return 1;
	}
	public function postCreate()
	{
		$validator = Validator::make(Input::all(), Contact::$rules);
        if ($validator->passes()) {
			$contact = new Contact;
			$contact->name = Input::get('name');
			$contact->email = Input::get('email');
			$contact->mobile = Input::get('mobile');
			$contact->photoid = Input::get('fname');
			$contact->save();  
			$insertedId = $contact->id;  
			return Response::json( array('msg' => $insertedId));
		}
		else{
			return Response::json( array('msg' => 0));
		}
	}
    public function saveGuestphoto($id,$data_url){
    	$path = public_path();
    	$destinationPath = $path.'/uploads/';
    	$file = $id.".jpg";    	
		$img = substr($data_url, strpos($data_url, ",") + 1);
		$decodedData = base64_decode($img);
		$success = file_put_contents($destinationPath.$file, $decodedData);

		$source_path = $destinationPath.$file;
		$destination= $destinationPath.$file;
		$newwidth = 640;
		$this->resizeImg($newwidth,$source_path,$destination);
    }
    public function resizeImg($newwidth,$source_path,$destination) {
		$image = imagecreatefromjpeg($source_path);
		$width = imagesx($image);
		$height = imagesy($image);
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight, $width,$height);
		imagejpeg($tmp,$destination,100);
		imagedestroy($image);
		imagedestroy($tmp);
	} 

}
