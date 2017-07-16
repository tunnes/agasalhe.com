<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	# This controller should verify what type of request, in default this controller
	# will return an page with form to register in our system.
	
	public function index()
	{
		# To do..
	}
	
	# This function should verify what type of request, in default this function
	# will return an page with form to register user in our system.
	public function register()
	{
		$this->load->view('register');
	}
	
	public function see_profile($user_id)
	{
		echo ('Profile: ' . $user_id);
	}	
	
}
