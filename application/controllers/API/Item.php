<?php 
    
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->model('item_model');
        $this->load->helper('form');
        
	    $this->load->library('form_validation');
	    $this->load->library('authentication', ['this' => $this]);
    }
    # Get user item(s)
    public function index_get()
    {
        $ID = $this->get('id');
        
        if($ID == NULL)
        {
           $items = $this->item_model->get_item();
           $error = ['status' => FALSE, 'message' => 'No items were found'];
           $items ? $this->response($items, REST_Controller::HTTP_OK) : $this->response($error, REST_Controller::HTTP_NOT_FOUND); 
        }
        else
        {
          $ID = (int) $ID;
          $ID <= 0 ? $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST) : $item = $this->item_model->get_item($ID, "id");
          
          $error = ['status' => FALSE, 'message' => 'Item could not be found'];
          !empty($item) ? $this->set_response($item, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
        }
    }
    # Create an item
    public function index_post()
    {
        $USER = $this->authentication->verify_authentication();
        
        $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[2]|max_length[80]');
        $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('use_state', 'use state', 'trim|required|in_list[NOVO,USADO,SEMI-NOVO]');
	    $this->form_validation->set_rules('category', 'category', 'trim|required|in_list[MOVEL,ELETRONICO,ELETRODOMESTICO,BRINQUEDO,ROUPA,UTENSILIO,FERRAMENTA,INSTRUMENTO]');
	    if ($this->form_validation->run() === FALSE)
	    {
	        $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
	    }
	    else
	    {
			$response = $this->item_model->set_item($USER['id']);
            $response ? $this->set_response(null, REST_Controller::HTTP_CREATED) : $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);			
	    }
        
        
    }
    # Update the item
    public function index_put()
    {
        $USER = $this->authentication->verify_authentication();
        $ID = $this->authentication->verify_parameter('id');
        $this->form_validation->set_data($this->put());
        
        $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[2]|max_length[80]');
        $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('use_state', 'use state', 'trim|required|in_list[NOVO,USADO,SEMI-NOVO]');
        $this->form_validation->set_rules('category', 'category', 'trim|required|in_list[MOVEL,ELETRONICO,ELETRODOMESTICO,BRINQUEDO,ROUPA,UTENSILIO,FERRAMENTA,INSTRUMENTO]');
        
        if ($this->form_validation->run() === FALSE)
        {
            $error = $this->form_validation->error_array();
	    	$this->set_response($error, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else
        {
          	$response = $this->item_model->update_item($ID, $this->put());
            $response ? $this->set_response(null, REST_Controller::HTTP_OK) : $this->set_response(NULL, REST_Controller::HTTP_UNAUTHORIZED);
        }
    }
    # Remove the user item
    public function index_delete()
    {
        $USER = $this->authentication->verify_authentication(); 
        $IID  = $this->authentication->verify_parameter('id');        

        $this->item_model->delete_item($IID);
        $message = ['item_removed' => $IID, 'message' => 'The item has been removed.'];
    
        # NO_CONTENT (204) being the HTTP response code
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
    
    # Get user trades
    public function trade_get()
    {
      $USER = $this->authentication->verify_authentication();
      $response = $this->item_model->get_trades($USER['id']);
      $error = ['status' => FALSE, 'message' => 'trades were not found.'];
      $response ? $this->set_response($response, REST_Controller::HTTP_OK) : $this->set_response($error, REST_Controller::HTTP_NOT_FOUND);
    }
    
    # Do a request for trading.
    public function trade_post()
    {
        $USER = $this->authentication->verify_authentication();
        $ITEM_THEIRS = $this->authentication->verify_parameter('item_theirs');
        $ITEM_YOURS = $this->authentication->verify_parameter('item_yours');

        $response = $this->item_model->set_trade($ITEM_YOURS, $ITEM_THEIRS, $USER['id']);
        $response[0] ? $this->set_response(['status' => TRUE, 'message' => $response[1]], REST_Controller::HTTP_CREATED) : 
                       $this->set_response(['status' => FALSE, 'message' => $response[1]], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }
    
    # Complete the trade, it means done = TRUE
    public function trade_put()
    {
        $USER = $this->authentication->verify_authentication();
        $ITEM_THEIRS = $this->authentication->verify_parameter('item_theirs');
        $ITEM_YOURS = $this->authentication->verify_parameter('item_yours');
        
        $response = $this->item_model->complete_trade($ITEM_YOURS, $ITEM_THEIRS, $USER['id']);
        $response[0] ? $this->set_response(['status' => TRUE, 'message' => $response[1]], REST_Controller::HTTP_OK) : 
                       $this->set_response(['status' => FALSE, 'message' => $response[1]], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);

    }
    
    # Undo a trade request if the trade isn't accepted (done = NULL or FALSE).
    public function trade_delete()
    {
        $USER = $this->authentication->verify_authentication();
        $ITEM_THEIRS = $this->authentication->verify_parameter('item_theirs');
        $ITEM_YOURS = $this->authentication->verify_parameter('item_yours');
        
        $response = $this->item_model->delete_trade($ITEM_YOURS, $ITEM_THEIRS, $USER['id']);
        $response[0] ? $this->set_response(['status' => TRUE, 'message' => $response[1]], REST_Controller::HTTP_OK) : 
                       $this->set_response(['status' => FALSE, 'message' => $response[1]], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }
}

?>