<?php
class Item_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_item($ID = FALSE)
    {
        # Get many items: 
        if ($ID === FALSE)
        {
            $query = $this->db->get('item');
            return $query->result_array();
        }
        
        # Get specific item:
        $query = $this->db->get_where('item', array('id' => $ID));
        return $query->row_array();
    }

    public function set_item($user_id)
    {
        
        $data = array(
            'description' => $this->input->post('description'),
            'name' => $this->input->post('name'),
            'user_id' => $user_id,
        );
    
        return $this->db->insert('item', $data);
    }
    
    public function get_by_user($ID)
    {
        # Get specific item:
        $query = $this->db->get_where('item', array('user_id' => $ID));
        return $query->result_array();
    }
}

?>