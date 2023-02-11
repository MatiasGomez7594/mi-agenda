<?php 
    include("user.php");
    $new_user = new User();
    //print_r($_POST);
    if(isset($_POST['name']) 
    && isset($_POST['lastname']) 
    && isset($_POST['email']) 
    && isset($_POST['password'])
    && isset($_POST['password2'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $search = $new_user->search_user($email);
        echo($search);
        if($search){
            echo 'El email ya se encuentra registrado';
        }else{
            $register = $new_user->signup($name,$lastname,$email,$password);
            if($register){
                echo 'Se registró exitosamente';
            }
        }
        
    }

  ?>