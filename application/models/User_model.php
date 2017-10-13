<?php
class User_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($id = FALSE, $attribute = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array($attribute => $id));
        return $query->row_array();
    }

    public function set_user()
    {
        $data = array
        (
            'nickname' => $this->input->post('nickname'),
            'username' => $this->input->post('username'),
            'profile_image' => $this->input->post('profile_image'),
            'postal_code' => $this->input->post('postal_code'),
            'about_me' => $this->input->post('about_me'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'birth' => $this->input->post('birth'),
            'firebase_id' => $this->input->post('firebase_id')
        );
    
        return $this->db->insert('users', $data);
    }
    
    public function get_login()
    {
        $data = array(
            'nickname' => $this->input->post('nickname'),
            'firebase_id' => $this->input->post('firebase_id')            
        );
        
        $query = $this->db->get_where('users', $data);
        return $query->row_array();
    }
    
    public function update($ID, $data)
    {
        if(!$this->possible_field($ID, 'email', $data['email']))
        {
           return [false, 'E-mail must be unique.']; 
        }
        
        if(!$this->possible_field($ID, 'nickname', $data['nickname']))
        {
           return [false, 'Nickname must be unique.']; 
        }
        
       $data = array
        (
            'nickname' => $data['nickname'],
            'username' => $data['username'],
            'profile_image' => array_key_exists('profile_image', $data) ? $data['profile_image'] : NULL,
            'postal_code' => $data['postal_code'],
            'about_me' =>  array_key_exists('about_me', $data) ? $data['about_me'] : NULL,
            'email' => $data['email'],
            'gender' => $data['gender'],
            'birth' => $data['birth'],
            'firebase_id' => $data['firebase_id']
        );
        $this->db->where('id', $ID);
        $this->db->update('users', $data);
        return [true, 'Update success.']; 
    }
    # All references must be deleted before the user to be removed.
    public function delete_user($ID)
    {
        $this->db->delete('likes', array('user_id' => $ID)); 
        $this->db->delete('wishes', array('user_id' => $ID)); 
        $this->db->delete('trades', array('user_id' => $ID));
        # removing item images...
        $delete = "DELETE item_images FROM item_images INNER JOIN items
                   ON items.id = item_images.item_id
                   WHERE items.user_id = ?";
        $this->db->query($delete, array('user_id' => $ID));
        $this->db->delete('items', array('user_id' => $ID));
        $this->db->delete('users', array('id' => $ID));
    }
    
    # it returns true for a valid field value
    public function possible_field($ID, $field, $value)
    {
        $this->db->where('id !=', $ID);
        $this->db->where($field, $value);
        $res = $this->db->get('users');
        return ! $res->num_rows() > 0;
    }
    
    
}

?>