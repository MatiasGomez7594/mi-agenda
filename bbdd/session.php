<?php

class Session{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function set_session($user_session,$email){
        if(isset($_SESSION)){
            $_SESSION[$user_session] = $email;
        }
    

    }
    public function session_destroy(){
        session_destroy();

    }


}