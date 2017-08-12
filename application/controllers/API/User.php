<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');
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

}