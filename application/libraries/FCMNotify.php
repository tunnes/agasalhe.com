<?php
    define('AUTH_KEY', "AAAAtFRpU1I:APA91bG5OqP7dwbJclOdS7JMyUFQJYhpkVGuFdNT85ILS13YHJkgE7HDV8HhZ_guWxwDlPu8QqcdPXHDrkRODITdPun4sVA2X67QWgOCYFDXlKSC_YSL8T7dUlPk1BVFPzpF5g75ST4X");
    class FCMNotify{
        
        public function send($tokenFcm, $title, $body, $icon, $data = null, $url = null){
            $data['title'] = $title;
            $data['body']  = $body;
            $data['sound'] = 'default';
            $data['icon'] = $icon;
            $data['action_click'] = $url;
            
            $fields = array(
            	'to' 	       => $tokenFcm,
                'data'         => $data
            );
            $headers = array(
            	'Authorization: key='.AUTH_KEY,
            	'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch,CURLOPT_POST, true );
            curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch );
            curl_close( $ch );
        }
    }
?>