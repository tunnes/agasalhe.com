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
        $this->load->model('like_model');
        
		$this->load->helper('form');        
	    $this->load->library('form_validation');
	    $this->load->library('authentication', ['this' => $this]);

    }
    # Get an user
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
    
    # Register an user
    public function index_post()    
    {
        # Birth date Format Standard
        //$_POST['birth'] = date('Y-m-d', strtotime($this->input->post('birth')));
        //echo 'DATA: '. $this->input->post('birth');
	    $this->form_validation->set_rules('nickname', 'nick name', 'trim|required|max_length[20]|is_unique[users.nickname]|regex_match[#^[^0-9][_A-z0-9]*((-)*[_A-z0-9])*$#]');
	    $this->form_validation->set_rules('username', 'user name', 'trim|required|max_length[80]');
	    $this->form_validation->set_rules('profile_image', 'profile image');
	    $this->form_validation->set_rules('postal_code', 'postal code', 'trim|required|integer|exact_length[10]');
	    $this->form_validation->set_rules('about_me', 'About me', 'trim|max_length[250]');
	    $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|is_unique[users.email]');
	    $this->form_validation->set_rules('gender', 'gender', 'trim|required|in_list[W,M]');
	    $this->form_validation->set_rules('birth', 'Date of birth', 'trim|required|callback_date_regex');
	    $this->form_validation->set_rules('firebase_id', 'firebase identifier', 'trim|required|max_length[200]');

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
    # Update an user
    public function index_put()
    {
        $USER = $this->authentication->verify_authentication();
        
        # Birth date Format Standard
        # $put_data = $this->put();
        # $put_data['birth'] = date('Y-m-d', strtotime($put_data['birth']));
        
        $this->form_validation->set_data($this->put());
        $this->form_validation->set_rules('nickname', 'nick name', 'trim|required|max_length[20]|regex_match[#^[^0-9][_A-z0-9]*((-)*[_A-z0-9])*$#]');
	    $this->form_validation->set_rules('username', 'user name', 'trim|required|max_length[80]');
	    $this->form_validation->set_rules('profile_image', 'profile image');
	    $this->form_validation->set_rules('postal_code', 'postal code', 'trim|required|integer|exact_length[10]');
	    $this->form_validation->set_rules('about_me', 'About me', 'trim|max_length[250]');
	    $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email');
	    $this->form_validation->set_rules('gender', 'gender', 'trim|required|in_list[W,M]');
	    $this->form_validation->set_rules('birth', 'Date of birth', 'trim|required|callback_date_regex');
	    $this->form_validation->set_rules('firebase_id', 'firebase identifier', 'trim|required|max_length[200]');
        
        if ($this->form_validation->run() === FALSE)
        {
            $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else
        {
            $update = $this->user_model->update($USER['id'], $this->put());
            if($update[0] === FALSE)
            {
                $this->set_response($update[1], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
            }
            $this->set_response($update[1], REST_Controller::HTTP_OK);
        }
    }
    # Delete itself account.
    public function index_delete()
    {
        $USER = $this->authentication->verify_authentication();
        $this->user_model->delete_user($ID);
        $message = ['id' => $USER['id'], 'message' => 'The resource has been deleted.'];
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
    
    public function wish_get()
    {
        $ID = $this->get('id');
        
        if ($ID === NULL)
        {
            $wishes = $this->wish_model->get_wish();
            $error = ['status' => FALSE, 'message' => 'Wishes were not found'];
            $wishes ? $this->response($wishes, REST_Controller::HTTP_OK) : $this->response($error, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            $ID = (int) $ID;
            $ID <= 0 ? $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST) : $wish = $this->wish_model->get_wish($ID);
            
            $error = ['status' => FALSE, 'message' => 'User wish could not be found'];
            !empty($wish) ? $this->set_response($wish, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
        }
    }

	public function wish_post()
	{
        $USER = $this->authentication->verify_authentication(); 
        # $ID = $this->verify_parameter('id');
        
	    $this->form_validation->set_rules('item_id', 'Item ID', 'trim|required|integer|max_length[10]|greater_than[-1]');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
			$response = $this->wish_model->create_wish($USER['id']);
            $response ? $this->set_response(null, REST_Controller::HTTP_CREATED) : $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);			
	    }
	    return false;
	}
	
	public function wish_delete()
    {
        $USER = $this->authentication->verify_authentication(); 
        $IID = $this->authentication->verify_parameter('item_id');        

        $this->wish_model->delete_wish($USER['id'], $IID);
        $message = ['item_removed' => $IID, 'message' => 'The wish has been removed.'];
    
        # NO_CONTENT (204) being the HTTP response code
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
    
    public function like_get()
    {
        $ID = $this->get('id');
        
        if ($ID === NULL)
        {
            $likes = $this->like_model->get_like();
            $error = ['status' => FALSE, 'message' => 'Likes were not found'];
            $likes ? $this->response($likes, REST_Controller::HTTP_OK) : $this->response($error, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            $ID = (int) $ID;
            $ID <= 0 ? $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST) : $like = $this->like_model->get_like($ID);
            
            $error = ['status' => FALSE, 'message' => 'Item like could not be found'];
            !empty($like) ? $this->set_response($like, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function like_post()
    {
        $USER = $this->authentication->verify_authentication();
        
        $this->form_validation->set_rules('item_id', 'Item ID', 'trim|required|integer|max_length[10]|greater_than[-1]');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
			$response = $this->like_model->set_like($USER['id']);
            $response ? $this->set_response(null, REST_Controller::HTTP_CREATED) : $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);			
	    }
        
    }
    
    public function like_delete()
    {
        $USER = $this->authentication->verify_authentication(); 
        $IID = $this->authentication->verify_parameter('item_id');        

        $this->like_model->delete_like($USER['id'], $IID);
        $message = ['item unliked' => $IID, 'message' => 'The item has been unliked.'];
    
        # NO_CONTENT (204) being the HTTP response code
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
    
    public function authenticate_post()
    {
	    $this->form_validation->set_rules('nickname', 'nick name', 'trim|required|max_length[50]|regex_match[#^[^0-9][_A-z0-9]*((-)*[_A-z0-9])*$#]');
	    $this->form_validation->set_rules('firebase_id', 'firebase identifier', 'trim|required|max_length[200]');
	    
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
    
    /* Some basic validations */
    public function date_regex($field) 
    {
      if(preg_match('#^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])#', $field))
      { 
         $date = explode('-', $field);
         if(!checkdate($date[1], $date[2], $date[0]))
         {
           $this->form_validation->set_message('date_regex', 'The {field} field is not valid.');
           return false;
         }
           return true;
      }
      $this->form_validation->set_message('date_regex', 'The {field} field is not valid.');
      return false;
    }
}

/*
[13:36, 13/10/2017] Gabriel Morais: date('Y-m-d', strtotime($variavelDaData))
[13:36, 13/10/2017] Gabriel Morais: e pra tirar do banco  processo inverso
[13:36, 13/10/2017] Gabriel Morais: date('d/m/Y', strtotime($variavelDobanco))
[13:36, 13/10/2017] Gabriel Morais: date('Y-m-d', strtotime($variavelDaData)) salva a data no banco nos padroes mysql
[13:36, 13/10/2017] Gabriel Morais: date('d/m/Y', strtotime($variavelDobanco)) quando for tirar do banco, para deixar no padrão br
[13:37, 13/10/2017] Gabriel Morais: se bem q o bgl é internacional

ANO MES E DIA TEM Q SER ENVIADO.

*/