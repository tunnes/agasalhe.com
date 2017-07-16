<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {
	
	# This is index function for show an view with basic information of our site 
	# like a menu navigation, footer, how to use system, last clothes posted and
	# about we and our project.
	public function index()
	{
		$this->load->view('home');
	}
	
	# Is an simple function to render informations about our project and our
	# intentions to provide this portal, were also contains informations about
	# we team contact llike linkedin, facebook, github and twitter profiles.
	public function about()
	{
		$this->load->view('about');
	}
	
	# May this function is the most simple in the application cause this return
	# an form to send a message or feedback to our team.
	public function contact()
	{
		$this->load->view('contact');
	}
	
	# This function have one unique proposite, show an view with explanations to
	# user learn about our application.
	public function how_it_works()
	{
		$this->load->view('how_it_works');
	}	
}
