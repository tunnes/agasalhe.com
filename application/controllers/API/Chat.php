<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Chat extends REST_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('wish_model');
        $this->load->model('chat_model');
        $this->load->model('image_model');
		$this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('authentication', ['this' => $this]);
	    $this->load->library('Password_Recovery');
    }
   
    # Get chat
    public function index_get()
    {
        $USER = $this->authentication->verify_authentication();
        //UID is a user who made request here and TID a target user
        $UID  = $USER['id'];
        $TID  = $this->get('id');
        
        if ($TID === NULL)
        {
            $chat = $this->chat_model->get_chat($UID);
            $error = ['status' => FALSE, 'message' => 'No conversation were found'];
            $chat ? $this->response($chat, REST_Controller::HTTP_OK) : $this->response($chat, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            $TID = (int) $TID;
            $TID <= 0 ? $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST) : $chat = $this->chat_model->get_chat($UID, $TID);
            
            $error = ['status' => FALSE, 'message' => 'No messages'];
            !empty($chat) ? $this->set_response($chat, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    # Register an user
    public function index_post()    
    {
        $USER = $this->authentication->verify_authentication();
        $this->form_validation->set_rules('receiver', 'receiver', 'trim|required|integer');
	    $this->form_validation->set_rules('description', 'password', 'required|max_length[255]');
        
	    if ($this->form_validation->run() === FALSE || $USER['id'] == $this->input->post('receiver'))
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
        #   CREATED (201) being the HTTP response code:
	        $created = $this->chat_model->set_chat($USER);
	        $MID  = $this->db->insert_id();
            $this->set_response(['message' => 'Message sent successfully', 'created' => $created, 'id' => $MID], REST_Controller::HTTP_CREATED);
	    }
    }
    
    # Update an user
    public function index_put()
    {
        $USER = $this->authentication->verify_authentication();
        
        $this->form_validation->set_data($this->put());
        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|max_length[80]');
	    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('nickname', 'nick name', 'trim|required|max_length[20]|regex_match[#^[^0-9][_A-z0-9]*((-)*[_A-z0-9])*$#]');
	    $this->form_validation->set_rules('username', 'user name', 'trim|required|max_length[80]');
	    $this->form_validation->set_rules('profile_image', 'profile image');
	    $this->form_validation->set_rules('about_me', 'About me', 'trim|max_length[250]');
	    $this->form_validation->set_rules('gender', 'gender', 'trim|required|in_list[M,F]');
	    $this->form_validation->set_rules('phone', 'phone', 'trim|max_length[11]|min_length[10]');
	    $this->form_validation->set_rules('birth', 'Date of birth', 'trim|required|callback_date_regex');
	    $this->form_validation->set_rules('country', 'country', 'trim|required|exact_length[2]|alpha');
        $this->form_validation->set_rules('state', 'state', 'trim|max_length[60]');
        $this->form_validation->set_rules('city', 'city', 'trim|max_length[60]');
        
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
	    $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|max_length[80]');
	    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[20]');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
	        $user = $this->user_model->get_login();
	        unset($user['password']);
	        
	        if(empty($user))
	        {
	            $this->set_response(['user' => NULL, 'message' => $this->lang->line('home_login_incorrect')], REST_Controller::HTTP_UNAUTHORIZED);
	        }
	        else
	        {
	            $token = $this->auth_model->set_auth($user);
	            $this->session->set_userdata('user', $token);
	            $this->session->set_userdata('image', "/API/image/profile/" . $user['id']);
	            $this->session->set_userdata('nickname', $user['nickname']);
	            $response = [
    		        'token'    => $token,
		            'username' => $user['username'],
		            'nickname' => $user['nickname'],
		            'email'    => $user['email'],
		            'id'       => $user['id'],
		            'image'    => "/API/image/profile/" . $user['id'],
		            'country'  => $user['country'],
		            'city'     => $user['city'],
		            'state'    => $user['state'],
		            'phone'    => $user['phone'],
		            'birth'    => $user['birth'],
		            'gender'   => $user['gender'],
		            'about_me' => $user['about_me']
		        ];
		        $this->set_response($response, REST_Controller::HTTP_OK);
	        }
	    }
    }
    
    public function token_put()
    {
        $this->form_validation->set_data($this->put());
        $this->form_validation->set_rules("token", "Token", "trim|required|max_length[255]");
        if($this->form_validation->run())
        {
            $USER = $this->authentication->verify_authentication();
            $this->user_model->update_token($USER['id'], $this->put()['token']);
            $message = ['message' => 'Fcm token updated.'];
            # NO_CONTENT (204) being the HTTP response code
            $this->set_response($message, REST_Controller::HTTP_OK);
        }else{
            $error = $this->form_validation->error_array();
            $this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        
    }
    
    public function password_recovery_post()
    {
        $this->form_validation->set_rules("email", "E-mail", "trim|required|valid_email");
        if ($this->form_validation->run() === FALSE)
	    {
	       $error = $this->form_validation->error_array();
	       $this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }else {
	    $this->password_recovery->init($this->input->post('email'));
        $response = $this->password_recovery->sendEmail();
        $response[0] ? $this->set_response(['status' => true, 'message' => $response[1]], REST_Controller::HTTP_OK) 
                     : $this->set_response(['status' => false, 'message' => $response[1]], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }  
    }
    
    public function password_recovery_put()
    {
        $this->form_validation->set_data($this->put());
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules("hash", "hash", "trim|required|max_length[255]");
        if ($this->form_validation->run() === FALSE)
	    {
	       $error = $this->form_validation->error_array();
	       $this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }else {
	    $response = $this->password_recovery->updatePassword($this->put()['hash'], $this->put()['password']);
        $response[0] ? $this->set_response(['status' => true, 'message' => $response[1]], REST_Controller::HTTP_OK) 
                     : $this->set_response(['status' => false, 'message' => $response[1]], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
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
