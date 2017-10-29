<?php
class Like_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_like($ID = FALSE)
    {
        if($ID === FALSE)
        {
            $this->db->select('users.id as user_id, users.nickname, items.title, items.id as item_id, likes.created');
            $this->db->from('likes');
            $this->db->join('users','likes.user_id = users.id','inner');
            $this->db->join('items', 'likes.item_id = items.id', 'inner');
            $this->db->order_by('created', 'desc');
            
            $query_users = array();
            $results = array();
            $before = NULL;
            
            # it gets everyone who ever liked something.
            foreach($this->db->get()->result_array() as $row)
            {
                if($row['nickname'] === $before)
                {
                    $query_users[$before]['items'][] = array_slice($row, 2);
                }else
                {
                    $query_users[$row['nickname']] =  array_slice($row, 0, 2);
                    $query_users[$row['nickname']]['items'][] = array_slice($row, 2);
                }
                $before = $row['nickname'];
            }
            
            $newItem = array();
            
            foreach ($query_users as $value)
            {
                 
                 foreach($value['items'] as $item)
                 {
                    $item['qt_item_likes'] = $this->count_like($item['item_id'])[0]['qt_item_likes'];
                    $newItem['items'][] = $item;
                 }
                 
                $value['items'] = $newItem['items'];
                $results[] = $value;
                unset($newItem['items']);
            }
            return $results;
        }
        
        /* Received Likes */
        $this->db->select('likes.user_id, users.nickname, likes.item_id, items.title, likes.created');
        $this->db->from('items');
        $this->db->join('likes','likes.item_id = items.id','inner');
        $this->db->join('users', 'likes.user_id = users.id', 'inner');
        $this->db->where('items.user_id ', $ID);
        $this->db->order_by('created', 'desc');
        $results['received'] = $this->db->get()->result_array();
        /* Received Given */
        $this->db->select('items.title, items.id as item_id, likes.created');
        $this->db->from('likes');
        $this->db->join('users','likes.user_id = users.id','inner');
        $this->db->join('items', 'likes.item_id = items.id', 'inner');
        $this->db->where('likes.user_id', $ID);
        $this->db->order_by('created', 'desc');
        $results['given'] = $this->db->get()->result_array();
       
        return $results;
    }
    
    public function set_like($ID)
    {
        $query = $this->db->get_where('likes', array("item_id" => $this->input->post('item_id'), "user_id" => $ID));
        if($query->num_rows() > 0)
        {
            return false;
        }
        $data = array
        (
            'user_id' => $ID,
            'item_id' => $this->input->post('item_id')
        );
        
        $this->db->insert('likes', $data);
        return true;
    }
    
    public function delete_like($UID, $IID)
    {
        $data = array('user_id' => $UID, 'item_id' => $IID);
        $this->db->delete('likes', $data);   
    }
    
    public function count_like($ITEM_ID)
    {
       $this->db->select("COUNT(*) as qt_item_likes");
       $query = $this->db->get_where('likes', array('item_id' => $ITEM_ID));
       return $query->result_array();
    }
} 
?>