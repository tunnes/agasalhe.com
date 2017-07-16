<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clothing_in_donation extends CI_Controller {
	
	# This controller is the second most complex cause the same motive and 
	# unfortunately it counts several responsibilities and the coupling rate
	# will be very high
	
	public function index()
	{
		$this->load->view('clothing_in_donation');
	}
}
