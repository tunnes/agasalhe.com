<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	# This is the most complex controller cause were are here will have the 
	# greatest number of functions and operations to the database this controller
	# requires the user to be logged in to operate.
	
	public function index()
	{
		$this->load->view('show_account');
	}
}
