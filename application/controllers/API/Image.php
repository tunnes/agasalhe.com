<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        $this->load->model('image_model');
      
    }
    
	public function index($ID)
	{
		header( "Content-type: image/jpg");
		echo $this->image_model->get_image($ID);
	}
	
	public function profile($ID)
	{
		header( "Content-type: image/jpg");
		echo $this->image_model->get_profile($ID);
	}
	
	public function item($ID)
	{
		header( "Content-type: image/jpg");
		echo $this->image_model->get_by_item($ID);
	}	
	
	public function register()
	{
		$this->image_model->set_image($_FILES['image'], "Uma bela image", 10);
	}

}
