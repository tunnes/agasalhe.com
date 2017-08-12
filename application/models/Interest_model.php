<?php
class Interest_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_by_requester($id_user)
    {
        $query = $this->db->get_where('interest', array('id_user' => $id_user));
        return $query->row_array();
    }
    
    public function set_interest()
    {
        $data = array(
            'id_item' => $this->input->post('id_item'),
            'id_user' => $this->session->user['id']
        );
        
        return $this->db->insert('interest', $data);
    }
}

?>