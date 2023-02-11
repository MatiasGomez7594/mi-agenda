<?php

include("user.php");
$new_user = new User();
if(isset($_POST['email']) 
    && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_user = $new_user->login($email, $password);
    if($login_user){
        include("session.php");
        $session = new Session();
        $user_session = $session->set_session("user_session",$email);
        echo 'login exitoso';
    }else{
        echo 'Usuario y/o contraseña incorrectos';
    }
    
}



?>
