<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutional extends CI_Controller {
	
	public function __construct() 
    {
        parent::__construct();
        $this->load->library('Password_Recovery');
        $this->lang->load('account',USER_LANGUAGE);
        $this->lang->load('home',USER_LANGUAGE);
        $this->lang->load('item',USER_LANGUAGE);
        $this->lang->load('main_navigation',USER_LANGUAGE);
        $this->lang->load('user',USER_LANGUAGE);
        $this->load->model('user_model');
    }
	
	# This is index function for show an view with basic information of our site 
	# like a menu navigation, footer, how to use system, last clothes posted and
	# about we and our project:
	public function index()
	{
		$data['isLogged'] = $this->session->userdata('user');
		$data['image']    = $this->session->userdata('image');
		$data['myimage']    = $this->session->userdata('image');
		$data['mynickname'] = $this->session->userdata('nickname');
		$data['myusername'] = $this->session->userdata('username');
		$this->load->view('home', $data);
		/*if($this->session->userdata('user'))
			$this->load->view('account');
		else
			$this->load->view('home');*/
	}
	
	# Is an simple function to render informations about our project and our
	# intentions to provide this portal, were also contains informations about
	# we team contact like linkedin, facebook, github and twitter profiles:
	public function items()
	{
		$data['isItems']  = true;
		$data['isLogged'] = $this->session->userdata('user');
		$data['myimage']    = $this->session->userdata('image');
		$data['mynickname'] = $this->session->userdata('nickname');
		$data['myusername'] = $this->session->userdata('username');
		$this->load->view('items', $data);
	}
	
	public function account()
	{
		if($this->session->userdata('user')){
			$data['isAccount']  = true;
			$data['isLogged'] = $this->session->userdata('user');
			$data['myimage']    = $this->session->userdata('image');
			$data['mynickname'] = $this->session->userdata('nickname');
			$data['myusername'] = $this->session->userdata('username');
			$this->load->view('account', $data);
		}
		else {
			redirect();
		}
			
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
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
	
	public function password_recovery($hash)
	{
	  if($this->password_recovery->verifyValidity($hash)[0])
	  {
		$this->load->view('password_recovery');
	  }else {
	  	echo "<h1>A valídade expirou :(</h1><br> <a href='/'>Voltar para o início</a>";
	  }
	}
	
	public function user_profile($user)
	{
		$data = $this->user_model->get_profile($user);
		if (!empty($data)){
			$data['mySelf'] = $user == $this->session->userdata('nickname') ? true : false;
			$data['isLogged'] = $this->session->userdata('user');
			$data['myimage']    = $this->session->userdata('image');
			$data['mynickname'] = $this->session->userdata('nickname');
			$data['myusername'] = $this->session->userdata('username');
			$this->load->view('user_profile', $data);
		}else{
			show_404();
		}
	}
}
