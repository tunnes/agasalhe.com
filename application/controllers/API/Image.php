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
		header( "Content-type: image/jpeg");
		echo $this->image_model->get_image($ID);
	}
	
	public function register()
	{
		$this->image_model->set_image($_FILES['image'], "Uma bela image", 10);
	}

}
