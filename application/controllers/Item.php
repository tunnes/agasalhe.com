<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
    }
    
	# This function verify if the attributes were sent correctly via post, If this happens the 
	# registration is performed if validation error error messages are displayed or if the first 
	# request returns only the layout markup
	public function register()
	{
		if($this->session->user)
		{
			$this->load->helper('form');
	    	$this->load->library('form_validation');
	
		    # Todo create an correct validation of true application fields:
		    $this->form_validation->set_rules('description', 'Description', 'required');
		    $this->form_validation->set_rules('name', 'Name', 'required');
	
		    
		    if ($this->form_validation->run() === FALSE)
		    {
		    	$this->load->helper('form');
		        $this->load->view('item/register');
		    }
		    else
		    {
				$ID = $this->session->user['id'];
				$this->item_model->set_item($ID);
		        $this->load->view('item/register_success');
		    }
		}
		else{
			echo "Erro: You not logged!";
		}
	}

	public function show($ID)
	{
		$data['item'] = $this->item_model->get_item($ID);
        empty($data['item']) ? show_404() : $this->load->view('item/show', $data);
	}
	
	public function show_all()
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$data['items'] = $this->item_model->get_item();
		
		$this->load->view('item/show_all', $data);	
	}
	
	public function show_by_user($ID)
	{
		$data['items'] = $this->item_model->get_by_user($ID);
		$user = $this->session->user;
		$data['user_name'] = $user['name'];
        empty($data['items']) ? show_404() : $this->load->view('dashboard/show_registed_items', $data);		
	}
}
