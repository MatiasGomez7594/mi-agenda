<?php 
    include("bbdd/user.php");
    $login_user = new User();
    
    if(isset($_POST['email']) 
    && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $search = $login_user->search_user($email,$password);
        if($search){
           require('session.php');
           $user_session = new Session();
           $user_session->set_username_session('username_session',$email);
        }else{
            echo 'Usuario y/o contraseña inorrecto';
        }
    }
  ?>