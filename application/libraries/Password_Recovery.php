<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Password_Recovery {
  private $emailReceiver, $database, $msg, $emailSender, $mail, $hash;  
  
  public function __construct() {      
    $this->database = &get_instance();  
    $this->mail = new PHPMailer();
    $this->mail->IsSMTP();
    $this->mail->Charset = 'utf8-decode()';      
    $this->mail->SMTPDebug = 2;
    $this->emailSender = 'swapei.noreply@gmail.com';
    //swapei-tcc-2017
    //swapei.noreply@gmail.com
  }
  
  public function init($emailReceiver) {
    $this->emailReceiver = $emailReceiver;
    $this->hash = $this->generateHash();    
    $this->msg  = $this->createMessage();     

    //configuração do gmail
    $this->mail->Port = 587;     
    $this->mail->Host = 'smtp.gmail.com';        
    $this->mail->Mailer = 'smtp';       

    //configuração do usuário do gmail
    $this->mail->SMTPAuth = true; 
    $this->mail->Username = $this->emailSender; 
    $this->mail->Password = 'swapei-tcc-2017'; 
    $this->mail->setFrom($this->emailSender, 'Swapei');
    $this->mail->SingleTo = true; 
    $this->mail->addAddress($this->emailReceiver, 'Usuário');          
    $this->mail->Subject =  utf8_decode("Swapei - RECUPERAÇÃO DE SENHA");
    $this->mail->Body = utf8_decode($this->msg);
    $this->mail->IsHTML(true);  
  }
  public function sendEmail() {
    $date = date('d-m-Y H:i:s', strtotime('+1 day'));
    if($this->verifyWhetherSent()) {
      if(!$this->mail->Send()){
         echo $this->mail->ErrorInfo;
         return [false, "Não foi possível enviar e-mail ao destinatário informado."];
        }else {
          $update = "UPDATE users SET recovery_hash = ?, recovery_validity =  STR_TO_DATE(?, '%d-%m-%Y %H:%i:%s') ". "WHERE email = ?";    
          $this->database->db->query($update, array($this->hash, $date, $this->emailReceiver));           
          return [true, "E-mail Enviado com sucesso."];
      }
    } 
    else {
      return [false, "E-mail não cadastrado ou já enviado (está na validade), verifique sua caixa de entrada."];
    }
  }
  private function verifyWhetherSent() {
    $where = "email LIKE '". $this->emailReceiver ."' AND recovery_validity < NOW() "."OR email LIKE '". $this->emailReceiver."' AND recovery_validity IS NULL"; 
    $this->database->db->where($where); 
    $query = $this->database->db->get('users');
    return $query->num_rows() > 0;
  }
  private function verifyValidity($hash) {
    $where = "recovery_hash LIKE '" . $hash . "' AND recovery_validity > NOW()";
    $this->database->db->where($where);
    $query = $this->database->db->get('users');
    return $query->num_rows() > 0 ? [true, $hash] : [false, null];
  }
  private function verifyEmailExistence(){
    $query = $this->database->db->get_where('users', array('email' => $this->emailReceiver)); 
    return $query->num_rows() > 0;
  }
  private function generateHash() {
    return base64_encode(password_hash($this->emailSender.$this->emailReceiver, PASSWORD_DEFAULT));
  }
  public function updatePassword($hash, $newpwd) {
    $newpwd = password_hash($newpwd, PASSWORD_DEFAULT);
    $validity = $this->verifyValidity($hash);
    if($validity[0]) {
      $this->database->db->update('users', array(
        'password' => $newpwd,
        'recovery_hash' => null,
        'recovery_validity' => null,
      ), "recovery_hash = '" . $validity[1] . "'");
      return [true, 'senha atualizada com sucesso.'];
    } 
    return [false, 'O tempo de validade expirou.'];
  }
  # E-mail skeleton
  private function createMessage() {
    return "<p> O swappei recebeu uma tentativa de recuperação de senha para este ".
    "e-email, caso não tenha sido você, desconsidere este e-mail, caso contrário ".
    "clique no link abaixo: <br> <a href='https://agasalhe-tarcisiolima.c9users.io/password-recovery/".$this->hash."'> ".
    "Recupere sua senha </a></p>";
  }
}

?>