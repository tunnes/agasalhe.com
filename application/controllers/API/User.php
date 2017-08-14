<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('wish_model');
        $this->load->model('auth_model');
        
		$this->load->helper('form');        
	    $this->load->library('form_validation');
    }

    public function index_get()
    {
        $ID = $this->get('id');
        
        if ($ID === NULL)
        {
            $users = $this->user_model->get_user();
            $error = ['status' => FALSE, 'message' => 'No users were found'];
            $users ? $this->response($users, REST_Controller::HTTP_OK) : $this->response($error, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {

            $ID = (int) $ID;
            $ID <= 0 ? $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST) : $user = $this->user_model->get_user($ID, "id");
            
            $error = ['status' => FALSE, 'message' => 'User could not be found'];
            !empty($user) ? $this->set_response($user, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function index_post()
    {
	    # Todo create an correct validation of true application fields:
	    $this->form_validation->set_rules('nick_name', 'Nick Name', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('name', 'Name', 'required');

	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
        #   CREATED (201) being the HTTP response code:
	        $this->user_model->set_user();
            $this->set_response(null, REST_Controller::HTTP_CREATED);
	    }
    }
    
    public function index_put()
    {
        $ID = $this->get('id');
        
        if ($ID === NULL)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return false;
        }
        else
        {
    	    # Todo create an correct validation of true application fields:
    	    $this->form_validation->set_data($this->put());
    	    $this->form_validation->set_rules('nick_name', 'Nick Name', 'required');
    	    $this->form_validation->set_rules('password', 'Password', 'required');
    	    $this->form_validation->set_rules('name', 'Name', 'required');
    
    	    
    	    if ($this->form_validation->run() === FALSE)
    	    {
    	        $error = $this->form_validation->error_array();
    	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    	    }
    	    else
    	    {
                $data = array(
                    'password' => $this->put('password'),
                    'name' => $this->put('name'),
                    'nick_name' => url_title($this->put('nick_name'), 'dash', TRUE),
                );
    	        $this->user_model->update($ID,$data);
                $this->set_response(null, REST_Controller::HTTP_OK);
    	    }
        }
        
    }

    public function index_delete()
    {
        $ID = (int) $this->get('id');

        // Validate the id.
        if ($ID <= 0)
        {
        #   Set the response and exit
        #   BAD_REQUEST (400) being the HTTP response code    
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        else{

            $this->user_model->delete_user($ID);
            $message = ['id' => $ID, 'message' => 'Deleted the resource'];
        #   NO_CONTENT (204) being the HTTP response code
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
        }
    }
    
	public function wish_post()
	{
        $ID = $this->get('id');
        
        if ($ID === NULL)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return false;
        }
        else
        {	    
    	    # Todo create an correct validation of true application fields:
    	    $this->form_validation->set_rules('id_item', 'Item', 'required');
    	    
    	    if ($this->form_validation->run() === FALSE)
    	    {
    	        $error = $this->form_validation->error_array();
    	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    	    }
    	    else
    	    {
    			$reponse = $this->wish_model->create_wish($ID);
                $response ? $this->set_response(null, REST_Controller::HTTP_CREATED) : $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);			
    	    }
    	    return false;
        }
	}
	
	public function wish_delete()
    {
        $UID = (int) $this->get('user_id');
        $IID = (int) $this->get('item_id');        

        // Validate the id.
        if ($IID <= 0 && $UID <= 0)
        {
        #   Set the response and exit
        #   BAD_REQUEST (400) being the HTTP response code    
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        else{

            $this->wish_model->delete_wish($UID, $IID);
            $message = ['id' => $ID, 'message' => 'Deleted the resource'];
        #   NO_CONTENT (204) being the HTTP response code
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
        }
    }
    
    public function authenticate_post()
    {
	    # Todo create an correct validation of true application fields:
	    $this->form_validation->set_rules('nick_name', 'Nick Name', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
	        $user = $this->user_model->get_login();
	        if(empty($user))
	        {
	            
	            $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);
	        }
	        else
	        {
		        $token = $this->auth_model->set_auth($user);
		        $this->set_response($token, REST_Controller::HTTP_OK);
	        }
	    }
    }
}