<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutional extends CI_Controller {
	
	public function __construct() 
    {
        parent::__construct();
        $this->load->library('Password_Recovery');
      
    }
	
	# This is index function for show an view with basic information of our site 
	# like a menu navigation, footer, how to use system, last clothes posted and
	# about we and our project:
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('home');
	}
	
	# Is an simple function to render informations about our project and our
	# intentions to provide this portal, were also contains informations about
	# we team contact like linkedin, facebook, github and twitter profiles:
	public function items()
	{
		$this->load->view('items');
	}
	
	public function account()
	{
		$this->load->view('account');
	}	
	
	# May this function is the most simple in the application cause this return
	# an form to send a message or feedback to our team:
	public function contact()
	{
		$this->load->view('institutional/contact');
	}
	
	public function login()
	{
		$this->load->view('login_test.php');
	}
	
	public function password_recovery($hash)
	{
	  if(!empty($hash)){
		$this->load->view('password_recovery');
    	//$this->password_recovery(); 
	  }
	}
}
