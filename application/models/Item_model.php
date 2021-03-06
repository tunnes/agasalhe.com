<?php
class Item_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
        $this->load->library('authentication', ['this' => $this]);
    }
    
    # Get itens
    public function get_item($ID = FALSE)
    {
        # Get many items: 
        if ($ID === FALSE)
        {
            $this->db->select('u.id as user_id, u.nickname, i.id as item_id, i.title,
                            i.description, i.use_state, i.category, i.active');
            $this->db->from('items as i');
            $this->db->join('users as u', 'u.id = i.user_id', 'inner');
            $query = $this->db->get()->result_array();
            $results = array();
            
            if($this->authentication->getUserIdForLikedItems()['id'])
            {
                foreach($query as $value)
                {
                    $images = $this->get_images($value['item_id']);
                    $likes  = $this->count_likes($value['item_id']);
                    $value['images'] = $images;
                    $value['qt_likes'] = $likes[0]['qt_item_likes'];
                    $value['isLikedForYou'] = $this->isLikedForYou($value['item_id'], $this->authentication->getUserIdForLikedItems()['id']);
                    $results[] = $value;
                }
                return $results;
            }
            foreach($query as $value)
            {
                $images = $this->get_images($value['item_id']);
                $likes  = $this->count_likes($value['item_id']);
                $value['images'] = $images;
                $value['qt_likes'] = $likes[0]['qt_item_likes'];
                $results[] = $value;
            }
            return $results;
        }
        
        # Get specific item:
        $this->db->select('users.id as user_id, users.nickname, users.username, items.id as item_id, items.title,
                            items.description, items.use_state, items.category, items.active');
        $this->db->from('items');
        $this->db->join('users', 'users.id = items.user_id', 'inner');
        $this->db->where('items.id', $ID);
        $query = $this->db->get()->result_array();
        
        foreach($query as $value)
        {
            $likes  = $this->count_likes($value['item_id']);
            $images = $this->get_images($value['item_id']);
            $value['images'] = $images;
            $value['qt_likes'] = $likes[0]['qt_item_likes'];
            $results[] = $value;
        }
        return $results;
    }
    
    # Get itens by paramteres
    public function get_filter_items($FILTER_PARAMS)
    {
        $this->db->select(' u.id as user_id, u.nickname, i.id as item_id, i.title');
        $this->db->from('items as i');
        $this->db->join('users as u', 'u.id = i.user_id', 'inner');
        
        if($this->authentication->getUserIdForLikedItems()['id'])
        {
            foreach($FILTER_PARAMS as $key => $value)
            {
                $this->db->like($key, $value);
            }
            
            $query = $this->db->get()->result_array();
            $results = array();
            foreach($query as $value)
            {
               $images = $this->get_images($value['item_id']);
               $likes  = $this->count_likes($value['item_id']);
               $value['images'] = $images;
               $value['qt_likes'] = $likes[0]['qt_item_likes'];
               $value['isLikedForYou'] = $this->isLikedForYou($value['item_id'], $this->authentication->getUserIdForLikedItems()['id']);
               $results[] = $value;
            }
            return $results;
        }
        
        foreach($FILTER_PARAMS as $key => $value)
        {
            $this->db->like($key, $value);
        }
        
        $query = $this->db->get()->result_array();
        $results = array();
        foreach($query as $value)
        {
           $images = $this->get_images($value['item_id']);
           $likes  = $this->count_likes($value['item_id']);
           $value['images'] = $images;
           $value['qt_likes'] = $likes[0]['qt_item_likes'];
           $results[] = $value;
        }
        return $results;
    
    }
    # Check whether the item is like
    public function isLikedForYou($IID, $UID)
    {
        $query = $this->db->get_where('likes', array('user_id' => $UID, 'item_id' => $IID));
        $v = $query->num_rows();
        return $v ? true : false;
    }
    # Get items from the user
    public function user_items($ID) 
    {
        $this->db->select('*')->from('items');
        $this->db->where('user_id', $ID);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        }
        
        $results = array();
        
        foreach($query as $value)
        {
            $likes  = $this->count_likes($value['id']);
            $images = $this->get_images($value['id']);
            $value['images'] = $images;
            $value['qt_likes'] = $likes[0]['qt_item_likes'];
            $results[] = $value;
        }
        return $results;
    }
    
    # Insert Item
    public function set_item($USER_ID)
    {
        $data = array
        (
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'use_state' => $this->input->post('use_state'),
            'category' => $this->input->post('category'),
            'user_id' => $USER_ID
        );
    
        return $this->db->insert('items', $data);
    }
    
    public function update_item($ITEM_ID, $DATA)
    {
        $data = array
        (
            'title' => $DATA['title'],
            'description' => $DATA['description'],
            'use_state' => $DATA['use_state'],
            'category' => $DATA['category']
        );
        $this->db->where('id', $ITEM_ID);
        return $this->db->update('items', $data);
    }
    
    public function delete_item($ITEM_ID)
    {
        $this->db->delete('likes', array('item_id' => $ITEM_ID)); 
        $this->db->delete('wishes', array('item_id' => $ITEM_ID)); 
        $this->db->where('item_yours', $ITEM_ID)->or_where('item_theirs', $ITEM_ID);
        $this->db->delete('trades');
        # removing item images...
        $delete = "DELETE images FROM images INNER JOIN items
                   ON items.id = images.item_id
                   WHERE items.user_id = ?";
        $this->db->query($delete, array('item_id' => $ITEM_ID));
        $this->db->delete('items', array('id' => $ITEM_ID));
    }
    
    public function get_trades($USER_ID)
    {
        //trocas solicitadas
        $this->db->select("t.item_yours, i.title, i.description, i.use_state, i.category, i.active,
                           t.created, t.status as 'trade_status', t.item_theirs");
        $this->db->from('trades as t');
        $this->db->join('items as i', 'i.id = t.item_yours', 'inner');
        $this->db->where('i.user_id', $USER_ID);
        $this->db->order_by('t.created', 'desc');
        $query = $this->db->get()->result_array();
        $results = array();
    
        foreach($query as $value)
        {
            $this->db->select('i.user_id, i.id as item_id, u.nickname, u.username, 
            i.title, i.description, i.use_state, i.category, i.active');
            $this->db->from('items as i');
            $this->db->join('users as u', 'i.user_id = u.id');
            $this->db->where('i.id', $value['item_theirs']);
            unset($value['item_theirs']);
            $item_theirs = $this->db->get()->result_array()[0];
            $value['traded_by'] = $item_theirs;
            $results["requested"][]= $value;
        }
        //trocas recebidas
        $this->db->select("t.item_yours, i.title, i.description, i.use_state, i.category, i.active,
                           t.created, t.status as 'trade_status', t.item_theirs");
        $this->db->from('trades as t');
        $this->db->join('items as i', 'i.id = t.item_theirs', 'inner');
        $this->db->where('i.user_id', $USER_ID);
        $this->db->order_by('t.created', 'desc');
        $queryReceived = $this->db->get()->result_array();
       
        foreach($queryReceived as $value)
        {
            $this->db->select('i.user_id, i.id as item_id, u.nickname, u.username, 
            i.title, i.description, i.use_state, i.category, i.active');
            $this->db->from('items as i');
            $this->db->join('users as u', 'i.user_id = u.id');
            $this->db->where('i.id', $value['item_yours']);
            $item_yours = $this->db->get()->result_array()[0];
            unset($value['item_yours']);
            $item_yours['received'] = $value;
            // $aux = $value;
            // $value['traded_by'] = $item_yours;
            $results["received"][] = $item_yours;
        }
    
        return $results;
    }
    /*
        Required rules for doing a trade:
        - item id must exists ~ obviously.
        - the user cannot trade an item for the same or by another item of their own possession.
        - the user cannot trade if a trade for the item is already done, it means: can't trade twice or more the same item.
        - the user cannot trade an item which was already traded (it means if done = TRUE).
        - the user cannot trade an item which was already traded by another user.
        - the user cannot trade a item which not belongs to it.
    */
    public function set_trade($ITEM_YOURS, $ITEM_THEIRS, $ID)
    {
        if($ITEM_YOURS === $ITEM_THEIRS)
        {
            return [false, 'You cannot trade the item by itself.'];
        }
        if(!$this->isValidItemId($ITEM_THEIRS) && $this->isValidItemId($ITEM_YOURS))
        {
            return [false, 'Only valid IDs are acceptable.'];
        }
        if($this->isMyOwnItem($ITEM_THEIRS, $ID))
        {
            return [false, 'You cannot trade an item which is already yours.'];
        }
        # Now is checking if the item is really yours.
        if(!$this->isMyOwnItem($ITEM_YOURS, $ID))
        {
            return [false, 'You cannot trade an item which is not yours.'];
        }
        
        if($this->isAlreadyRequested($ITEM_THEIRS, $ITEM_YOURS)[1])
        {
            $r = $this->isAlreadyRequested($ITEM_THEIRS, $ITEM_YOURS)[0];
            return [false, "You've already requested for this item before, its status is: ". $r];
        }
        if(!$this->isAlreadyTraded($ITEM_YOURS, $ITEM_THEIRS)[0])
        {
            return [false, $this->isAlreadyTraded($ITEM_YOURS, $ITEM_THEIRS)[1]];
        }
        
        $insert = "INSERT INTO trades VALUES (?, ?, NOW(), 'PENDING')";
        $this->db->query($insert, array(
            'item_theirs' => $ITEM_THEIRS,
            'item_yours' => $ITEM_YOURS));
        
        return [true, 'Successful request'];
    }
    
    # When the trade is over, this function must update the item active column as FALSE.
    public function complete_trade($ITEM_YOURS, $ITEM_THEIRS, $ID)
    {
        if($ITEM_YOURS === $ITEM_THEIRS || !$this->isAlreadyRequested($ITEM_YOURS, $ITEM_THEIRS)[1])
        {
            return [false, 'Invalid request.'];
        }
        
        # Now is checking if the trade is really yours.
        if(!$this->isMyOwnItem($ITEM_YOURS, $ID))
        {
            return [false, 'You cannot complete a trade whose item is not yours.'];
        }
        
        if(!$this->isAlreadyTraded($ITEM_YOURS, $ITEM_THEIRS)[0])
        {
            return [false, 'This trade was already finished before.'];
        }
        
        $this->db->where('item_theirs', $ITEM_YOURS);
        $this->db->where('item_yours', $ITEM_THEIRS);
        $this->db->update('trades', array('status' => 'DONE'));
        
        $this->db->where('id', $ITEM_THEIRS);
        $this->db->update('items', array('active' => false));
        $this->db->where('id', $ITEM_YOURS);
        $this->db->update('items', array('active' => false));
        
        return [true, 'The trade has been completed.'];
    }
    
    public function delete_trade($ITEM_YOURS, $ITEM_THEIRS, $ID)
    {
       if($ITEM_YOURS === $ITEM_THEIRS || !$this->isAlreadyRequested($ITEM_THEIRS, $ITEM_YOURS)[1])
        {
            return [false, 'Invalid request.'];
        }
        
        # Now is checking if the trade is really yours.
        if(!$this->isMyOwnItem($ITEM_YOURS, $ID))
        {
            return [false, 'You cannot cancel a trade which is not yours.'];
        }
        # Now is necessary to check the trade status;
        if($this->isTradeComplete($ITEM_YOURS, $ITEM_THEIRS))
        {
            return [false, 'You cannot cancel a trade which is already finished.'];
        }
        
        $this->db->delete('trades', array('item_theirs' => $ITEM_THEIRS, 'item_yours' => $ITEM_YOURS));
        return [true, 'The trade request has been removed.'];
    }
      /*
        In this function the fields item_theirs and item_yours are inverted to check who intended to do the trade.
        Can't deny what was denied.
        Can't deny a trade not intented for you.
        
    */
    public function refuse_trade($ITEM_YOURS, $ITEM_THEIRS, $ID)
    {
        if($ITEM_YOURS === $ITEM_THEIRS || !$this->isAlreadyRequested($ITEM_YOURS, $ITEM_THEIRS)[1])
        {
            return [false, 'Invalid request.'];
        }
        
        if(!$this->isMyOwnItem($ITEM_YOURS, $ID))
        {
            return [false, 'You cannot refuse a trade which is not yours.'];
        }
        
        if(!$this->isAlreadyTraded($ITEM_THEIRS, $ITEM_YOURS)[0])
        {
            return [false, 'You cannot refuse a trade which is already finished. Update the page please :-)'];
        }
        
        if($this->isTradeRefused($ITEM_THEIRS, $ITEM_YOURS))
        {
            return [false, 'You cannot refuse a trade which was already refused.'];
        }
        
        $this->db->where('item_theirs', $ITEM_YOURS);
        $this->db->where('item_yours', $ITEM_THEIRS);
        $this->db->update('trades', array('status' => 'REFUSED'));
        return [true, 'The trade has been refused.'];
        
    }
    
    # Aux Functions
    public function get_images($ITEM_ID)
    {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('item_id', $ITEM_ID);
        $results = $this->db->get()->result_array();
        $images = [];
        foreach ($results as &$result) {
            $image = [ 'image' => "/API/image/index/" . $result['id'], 'text' => $result['alt'] ];
            array_push($images, $image);
        }
        return $images;
    }
    
    public function count_likes($ITEM_ID)
    {
       $this->db->select("COUNT(*) as qt_item_likes");
       $query = $this->db->get_where('likes', array('item_id' => $ITEM_ID));
       return $query->result_array();
    }

    public function isMyOwnItem($ITEM_THEIRS, $ID)
    {
        $this->db->select('*')->from('items');
        $this->db->where('id', $ITEM_THEIRS);
        $this->db->where('user_id', $ID);
        return $this->db->get()->num_rows() > 0;
    }
    
    public function isAlreadyRequested($ITEM_THEIRS, $ITEM_YOURS)
    {
        $this->db->select('*');
        $this->db->from('trades');
        $this->db->where('item_theirs', $ITEM_THEIRS);
        $this->db->where('item_yours', $ITEM_YOURS);
        $done = $this->db->get();
        if($done->num_rows() > 0)
        {
           return [$done->result_array()[0]['status'], TRUE];
        }
        return [NULL, FALSE];
    }
    
    # Check if i've traded MY item with someone else or if someone else traded it with me. 
    public function isAlreadyTraded($ITEM_YOURS, $ITEM_THEIRS)
    {
        $this->db->select('*')->from('trades')->where("status = 'DONE' AND item_yours = " . $ITEM_YOURS . " OR status = 'DONE' AND item_theirs = " . $ITEM_YOURS);
        if($this->db->get()->num_rows() > 0)
        {
            return [false, 'Your item was already traded.'];
        }
        $this->db->select('*')->from('trades')->where("status = 'DONE' AND item_theirs = " . $ITEM_THEIRS . " OR status = 'DONE' AND item_yours = " . $ITEM_THEIRS);
        if($this->db->get()->num_rows() > 0)
        {
            return [false, 'The requested item was already traded.'];
        }
        return [true, NULL];
    }
    
    public function isTradeComplete($ITEM_YOURS, $ITEM_THEIRS)
    {
        $check = $this->db->get_where('trades', array('item_yours' => $ITEM_YOURS, 'item_theirs' => $ITEM_THEIRS, 'status' => 'DONE'));
        return (bool) $check->num_rows() > 0;
    }
    
    public function isTradeRefused($ITEM_YOURS, $ITEM_THEIRS)
    {
        $check = $this->db->get_where('trades', array('item_yours' => $ITEM_YOURS, 'item_theirs' => $ITEM_THEIRS, 'status' => 'REFUSED'));
        return (bool) $check->num_rows() > 0;
    }
    
    public function isValidItemId($ID)
    {
       $r = $this->db->get_where('items', array('id' => $ID))->num_rows() > 0;
       return $r;
    }
}
?>