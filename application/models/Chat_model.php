<?php

class Chat_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    //UID is a user who made request here and TID a target user
    public function get_chat($UID, $TID = FALSE)
    {
        if($TID === FALSE)
        {
            $query = $this->db->query('SELECT DISTINCT IF(m.sender = '.$UID.', r.username, s.username) as username, IF(m.sender = '.$UID.', r.id, s.id) as id, IF(m.sender = '.$UID.', r.nickname, s.nickname) as nickname FROM messages AS m INNER JOIN users AS s ON m.sender = s.id INNER JOIN users AS r ON m.receiver = r.id WHERE m.sender = '.$UID.' OR m.receiver = '.$UID);
            return $query->result_array();
        }
        $query = $this->db->query('SELECT m.description, m.created, IF(m.sender = '.$UID.', true, false) AS sent_by_sender, m.id FROM messages AS m INNER JOIN users AS s ON m.sender = s.id INNER JOIN users AS r ON m.receiver = r.id WHERE (m.sender = '.$UID.' OR m.receiver = '.$UID.') AND (m.sender = '.$TID.' OR m.receiver = '.$TID.') ORDER BY m.id ASC');
        foreach($query->result() as $row)
            $row->created = $this->out_date($row->created);
            
        return $query->result_array();
    }

    public function set_chat($sender)
    {
        $date = date('Y-m-d H:i:s');
        $data = array
        (
            'receiver' => $this->input->post('receiver'),
            'description' => $this->input->post('description'),
            'sender' => $sender['id'],
            'created' => $date
        );
        
        $this->db->insert('messages', $data);
        
        $date = $this->out_date($date);
        
        $this->load->library('FCMNotify');
        $this->load->model('user_model');
        $this->fcmnotify->send(
            $this->user_model->get_fcm($this->input->post('receiver')),
            $sender['username'] . " enviou uma mensagem.",
            $this->input->post('description'),
            base_url() . "API/image/profile/" . $sender['id'],
            array('created' => $date, 'id' => $this->db->insert_id(), 'sender_id' => $sender['id'])
        );
        
        return $date;
    }
    
    private function out_date($created){
        $created = strtotime($created);
        switch(USER_LANGUAGE){
                case 'spanish' || 'portuguese':
                    $today = 'Hoje';
                    $yesterday = 'Ontem';
                    $hour  = date('H:i', $created);
                    $date  = date('d/m/Y', $created);
                    break;
                default:
                    $today = 'Today';
                    $yesterday = 'Yesterday';
                    $hour  = date('a h:i', $created);
                    $date  = date('m/d/Y', $created);
        }
        if(date('Y-m-d') == date('Y-m-d', $created))
            $created = $today . ' ' . $hour;
        else if(date('Y-m-d', strtotime("-1 days")) == date('Y-m-d', $created))
            $created = $yesterday . ' ' . $hour;
        else
            $created = $date . ' ' . $hour;
        return $created;
    }
}

?>