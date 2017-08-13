<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('wish_model');
    }
	
	# Verify if the attributes were sent correctly via post, If this happens the 
	# registration is performed if validation error error messages are displayed  
	# or if the first request returns only the layout markup:
	public function register()
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');
	
	    # Todo create an correct validation of true application fields:
	    $this->form_validation->set_rules('nick_name', 'Nick Name', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('name', 'Name', 'required');

	    
	    if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->helper('form');
	        $this->load->view('user/register');
	    }
	    else
	    {
	        $this->user_model->set_user();
	        $user = $this->user_model->login();
	        $this->session->user = $user;
	        $this->parser->parse('dashboard/show_template', $user);
	    }
	}
	
	# To show an view with informations of determied user by 'nick_name' this  
	# parameter is comming via URL sanitized parameter an not all information is
	# returned on view:
	public function show_profile($nick_name)
	{
		$user = $this->user_model->get_user($nick_name, 'nick_name');
		
        empty($user) ? show_404() : $this->parser->parse('user/show_template', $user);
	}

	# Return an view with all user registed on application this view is accessed
	# only by root users: 
	public function show_all()
	{
		$data['users'] = $this->user_model->get_user();
		$this->parser->parse('user/show_all_template', $data);		
	}
	
	# Autentication operation function, this function return view in get method
	# and redirect or return erro mensage on wrong credentials:  
	public function login()
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');
	
	    # Todo create an correct validation of true application fields:
	    $this->form_validation->set_rules('nick_name', 'Nick Name', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->helper('form');
	        $this->load->view('user/login');
	    }
	    else
	    {
	        $user = $this->user_model->get_login();
	        if(empty($user))
	        {
	        	$this->load->view('user/invalid');
	        }
	        else
	        {
	        	$this->session->user = $user;
	        	$this->load->view('dashboard/dashboard', $user);
	        }
	    }
	}
	
	# This function is to logout system is used by root users and regular users
	# afeter distory session the user is redirect to home page:
	public function logout()
	{
		$this->session->sess_destroy();
    	redirect('/', 'refresh');
	}
	
	# Register interest, post
	public function item_interest()
	{
		# Todo..
		$this->load->helper('form');
	    $this->load->library('form_validation');
	
	    # Todo create an correct validation of true application fields:
	    $this->form_validation->set_rules('id_item', 'Item', 'required');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	    	# Return http invalid
	    }
	    else
	    {
			# $this->wish_model->create_wish();
	    }
	    return false;
	}
	
	# Register interest, delete
	public function item_disinterest()
	{
		# Todo..
	}

}
