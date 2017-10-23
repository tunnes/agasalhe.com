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
            $this->db->select('id,email,username,nickname,profile_image,about_me,gender,country,state,city,birth,phone');
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $this->db->select('id,email,username,nickname,profile_image,about_me,gender,country,state,city,birth,phone');
        $query = $this->db->get_where('users', array($attribute => $id));
        return $query->row_array();
    }

    public function set_user()
    {
        $data = array
        (
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nickname' => $this->input->post('nickname'),
            'username' => $this->input->post('username'),
            'profile_image' => $this->input->post('profile_image'),
            'about_me' => $this->input->post('about_me'),
            'gender' => $this->input->post('gender'),
            'birth' => $this->input->post('birth'),
            'phone' => $this->input->post('phone'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city')
        );
    
        return $this->db->insert('users', $data);
    }
    
    public function get_login()
    {
        $query = $this->db->get_where('users', array('email' => $this->input->post('email')))->result_array();
       if($query) {
          return (password_verify($this->input->post('password'), $query[0]['password'])) ? $query[0] : null;
       }
       return null;
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
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'nickname' => $data['nickname'],
            'username' => $data['username'],
            'profile_image' => array_key_exists('profile_image', $data) ? $data['profile_image'] : NULL,
            'about_me' =>  array_key_exists('about_me', $data) ? $data['about_me'] : NULL,
            'gender' => $data['gender'],
            'birth' => $data['birth'],
            'phone' => array_key_exists('phone', $data) ? $data['phone'] : NULL,
            'country' => $data['country'],
            'state' =>  array_key_exists('state', $data) ? $data['state'] : NULL,
            'city' =>  array_key_exists('city', $data) ? $data['city'] : NULL
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