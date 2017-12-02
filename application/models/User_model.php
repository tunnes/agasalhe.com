<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($id = FALSE, $attribute = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('id,email,username,nickname,about_me,gender,countries.name AS country, countries.code as cdCountry, state,city,birth');
            $this->db->from('users');
            $this->db->join('countries', 'users.country = countries.code');
            return $this->db->get()->result_array();
        }
        $this->db->select('id,email,username,nickname,about_me,gender,countries.name AS country, countries.code as cdCountry, state,city,birth');
        $this->db->from('users');
        $this->db->join('countries', 'users.country = countries.code');
        $this->db->where($attribute, $id);
        return $this->db->get()->row_array();
    }

    public function set_user()
    {
        $data = array
        (
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nickname' => $this->input->post('nickname'),
            'username' => $this->input->post('username'),
            //'profile_image' => $this->input->post('profile_image'),
            'gender' => $this->input->post('gender'),
            'birth' => $this->input->post('birth'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city')
        );
        
        $this->send_email($data);
    
        return $this->db->insert('users', $data);
    }
    
    public function get_login()
    {
        $this->db->select('id,email,username, password, nickname,gender,countries.name AS country, countries.code as cdCountry, state,city,birth');
        $this->db->from('users');
        $this->db->join('countries', 'users.country = countries.code');
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get()->result_array();
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
        
       $user = array
        (
            'email' => $data['email'],
            'nickname' => $data['nickname'],
            'username' => $data['username'],
            'gender' => $data['gender'],
            'birth' => $data['birth'],
            'country' => $data['country'],
            'state' =>  array_key_exists('state', $data) ? $data['state'] : NULL,
            'city' =>  array_key_exists('city', $data) ? $data['city'] : NULL
        );
        
        if(!empty($data['newpassword']))
        {
            $user['password'] = password_hash($data['newpassword'], PASSWORD_DEFAULT);
        }
        
        $this->db->where('id', $ID);
        $this->db->update('users', $user);
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
    
    #update firebase cloud messaging token used to identify user who will receive some notification
    public function update_token($ID, $token){
        $this->db->set('fcm', $token);
        $this->db->where('id', $ID);
        $this->db->update('users');
    }
    
    # it returns true for a valid field value
    public function possible_field($ID, $field, $value)
    {
        $this->db->where('id !=', $ID);
        $this->db->where($field, $value);
        $res = $this->db->get('users');
        return ! $res->num_rows() > 0;
    }
    
    # it returns user fcm used to send him notification
    public function get_fcm($UID){
        $this->db->select('fcm');
        $this->db->from('users');
        $this->db->where('id', $UID);
        return $this->db->get()->row()->fcm;
    }
    
    private function send_email($user){
        switch($user['country']){
            case 'BR':
                $title = "Bem-vindo ao trocaqui";
                $text  = "Faça bom proveito!!! Caso tenha alguma dúvida, entre em contato conosco:";
                $subject = "Parabéns, ".explode(' ', $user['nickname'])[0].". Agora você é um usuário Trocaqui!";
                break;
            default:
                $title = "Welcome to trocaqui";
                $text  = "Have a good navigation!!! If you have any questions, please contact us:";
                $subject = "Congratulations, ".explode(' ', $user['nickname'])[0].". Now you are Trocaqui user!";
        }
        
        $html = file_get_contents('./application/views/email-template.html');
        $html = str_replace('{title}', $title, $html);
        $html = str_replace('{text}', $text, $html);
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Charset = 'utf8-decode()';  
        $emailSender = 'swapei.noreply@gmail.com';
        $mail->Port = 587;     
        $mail->Host = 'smtp.gmail.com';        
        $mail->Mailer = 'smtp';
        $mail->SMTPAuth = true;
        $mail->Username = $emailSender; 
        $mail->Password = 'swapei-tcc-2017';
        $mail->setFrom($emailSender, 'Trocaqui');
        $mail->SingleTo = true; 
        $mail->addAddress($user['email'], $user['nickname']);          
        $mail->Subject =  utf8_decode($subject);
        $mail->MsgHTML($html);
        $mail->IsHTML(true);  
        $mail->Send();
    }
    
    public function get_profile($user_nickname)
    {
        $this->db->select('id,email,username,nickname,about_me,gender,countries.name AS country, countries.code as cdCountry,state,city,birth');
        $this->db->from('users');
        $this->db->join('countries', 'users.country = countries.code');
        $this->db->where('nickname', $user_nickname);
        return $this->db->get()->row_array();
    }
    
}

?>