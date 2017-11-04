<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication  {
    protected $CI;
    protected $referenceOfThis;
    public function __construct($params)
    {
        $this->CI =& get_instance();
        $this->CI->load->model('auth_model');
        $this->referenceOfThis = $params['this'];
    }
    
    public function verify_authentication()
    {
        $token = NULL;
        
        if (array_key_exists("authorization", $this->CI->input->request_headers()))
        {
        #   To improve security use base64 conversion in exchange of values 
        #   between client and server exemple base64_decode($token)
            $token = $this->CI->input->request_headers()['authorization'];
        }
        #verify if session has token
        if($this->session->userdata('user') != $token){
            $this->referenceOfThis->response(NULL, REST_Controller::HTTP_UNAUTHORIZED);
            die();
        }
        
        $user = $this->CI->auth_model->get_auth($token);

        if($user === NULL)
        {
            $this->referenceOfThis->response(NULL, REST_Controller::HTTP_UNAUTHORIZED);
            die();
        }
        else
        {
            return $user;
        }
    }
    
    public function verify_parameter($parameter_string)
    {
        $parameter = $this->referenceOfThis->get($parameter_string);
        
        if ($parameter === NULL || $parameter < 0)
        {
        #   Set the response and exit
        #   BAD_REQUEST (400) being the HTTP response code   
            $this->referenceOfThis->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            die();
        }
        else {
            return (int) $parameter;
        }
    }
}


?>