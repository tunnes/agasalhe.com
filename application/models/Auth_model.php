<?php

use \Firebase\JWT\JWT;

class Auth_model extends CI_Model {

    private $key;
    
    public function __construct()
    {

    #   HS256 Encryption Application Switchover:
        $this->key = "SSBoYXZlIGxpdmVkIHRocm91Z2ggbWFueSBkaWZmaWN1bHQgdGltZXMsIEkg
        aGF2ZSBibGVkLCBJIGhhdmUgY3JpZWQsIEkgaGF2ZSBsb3N0LiBIb3dldmVyLCBJIGhhdmUgYW
        xzbyBidWlsdCB0aGlzIGFwcGxpY2F0aW9uLCBpdCBpcyBvbmUgb2YgdGhvc2UgdGhpbmdzIHRo
        YXQgSSBhbSBwcm91ZCB0byBoYXZlIGJ1aWx0Lg==";
    }
    
    public function set_auth($data)
    {
    #   The variable $ token expects an associative array with 
    #   information to be encrypted:
        $token = $data;

    #	Token validity time to realize that it is timed with seconds
    #   the case of our application would be 5 minutes:	
		JWT::$leeway = 300;
    
    #   Encryption function that generates JSON token token web token:
        $json_web_token = JWT::encode($token, $this->key);
        return $json_web_token;
    }
    
    public function get_auth($token)
    {
        try {
        #   Decrypting token sent with HS256 key:
    	    $json_decoded = JWT::decode($token, $this->key, array('HS256'));

        #   Converting JSON into an associative array: 
    	    $associative_array = (array) $json_decoded;
    	
    	    return $associative_array;
        }
        catch (Exception $e) {
            return null;
        }
    }
}

?>