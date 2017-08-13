<?php
class User_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($nick_name = FALSE, $attribute = FALSE)
    {
        if ($nick_name === FALSE)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array($attribute => $nick_name));
        return $query->row_array();
    }

    public function set_user()
    {
        $this->load->helper('url');
    
        # Todo! Create an coditional to verify conflits on nick vs applications routes!
        # Removing special characters, sanitizing and replacing all spacings to '-' 
        # character to turn this 'nick_name' attribute in custom route:
        $nick_name = url_title($this->input->post('nick_name'), 'dash', TRUE);
    
        $data = array(
            'password' => $this->input->post('password'),
            'name' => $this->input->post('name'),
            'nick_name' => $nick_name,
        );
    
        return $this->db->insert('user', $data);
    }
    
    public function get_login()
    {
        $data = array(
            'nick_name' => $this->input->post('nick_name'),
            'password' => $this->input->post('password')            
        );
        
        $query = $this->db->get_where('user', $data);
        return $query->row_array();
    }
    
    public function update($ID, $data)
    {
        $this->db->where('id', $ID);
        $this->db->update('user', $data);
    }
    
    public function delete_user($ID)
    {
        $this->db->delete('user', array('id' => $ID)); 
    }
    
}

?>