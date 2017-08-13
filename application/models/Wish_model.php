<?php
class Wish_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_by_requester($id_user)
    {
        $query = $this->db->get_where('interest', array('id_user' => $id_user));
        return $query->row_array();
    }
    
    public function create_wish($ID)
    {
        $data = array(
            'id_item' => $this->input->post('id_item'),
            'id_user' => $ID
        );
        
        return $this->db->insert('wish', $data);
    }
    
    public function delete_wish($UID, $IID)
    {
        $data = array('id_item' => $IID, 'id_user' => $UID);
        $this->db->delete('wish', $data); 
    }
}

?>