<?php
class Wish_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_wish($ID = FALSE)
    {
        if($ID === FALSE)
        {
           $this->db->select("id, nickname");
           $users_wishes = $this->db->get('users')->result_array();
           $results = array();
           foreach ($users_wishes as $value)
           {
              $this->db->select("items.id as item_id, items.title, items.description, items.use_state, users.nickname, users.id as user_id");
              $this->db->from("wishes");
              $this->db->join('items', 'wishes.item_id = items.id', 'inner');
              $this->db->join('users', 'items.user_id = users.id', 'inner');
              $this->db->where('wishes.user_id', $value['id']);
          
              $value['wishes'] = $query = $this->db->get()->result_array();
              $results[]['user'] = $value;

           }
           return $results;
        }
           $this->db->select("items.id as item_id, items.title, items.description, items.use_state, users.nickname, users.id as user_id");
           $this->db->from("wishes");
           $this->db->join('items', 'wishes.item_id = items.id', 'inner');
           $this->db->join('users', 'items.user_id = users.id', 'inner');
           $this->db->where('wishes.user_id', $ID);
           $query = $this->db->get()->result_array();
           return $query;
    }
    
    public function create_wish($ID)
    {
        $queryItemExists    = $this->db->get_where('items', array("id" => $this->input->post('item_id')));
        $queryIsItemMine    = $this->db->get_where('items', array("id" => $this->input->post('item_id'), "user_id" => $ID));
        $queryAlreadyWished = $this->db->get_where('wishes', array("item_id" => $this->input->post('item_id'), "user_id" => $ID));
        
        if($queryItemExists->num_rows() === 0 || $queryIsItemMine->num_rows() > 0 || $queryAlreadyWished->num_rows() > 0)
        {
            return false;
        }
        $data = array
        (
            'user_id' => $ID,
            'item_id' => $this->input->post('item_id')
        );
        
        $this->db->insert('wishes', $data);
        return true;
    }
    
    public function delete_wish($UID, $IID)
    {
        $data = array('user_id' => $UID, 'item_id' => $IID);
        $this->db->delete('wishes', $data);     
    }
}

?>