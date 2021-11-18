<?php
include_once("db.php");

class User extends Connect{
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;

    public function __construct(){
        parent::__construct();
    }
    public function signup($name,$lastname,$email,$password){
        $sql = "INSERT INTO users(username,user_lastname,user_email,user_password) 
                VALUES('$name','$lastname','$email','$password')";
        $res = $this->db->query($sql);
        if($res){
            return $res;
            $res->close();
            $this->db->close();
        }else{
            echo 'Hubo un error en el registro intente mas tarde';
        }
        
    }
    public function login($email, $password){
        $sql="SELECT id_user,username,user_lastname FROM users WHERE user_email ='$email' 
             AND user_password = '$password'";
        $res = $this->db->query($sql);
        $user_founded =  $res->fetch_all(MYSQLI_ASSOC);
        if($user_founded){
            return $user_founded;
            $user_founded->close();
            $this->db->close();
        }
    }
    public function search_user($email){
        $sql="SELECT id_user,username,user_lastname FROM users WHERE user_email ='$email'";
        $res = $this->db->query($sql);
        $user_founded =  $res->fetch_all(MYSQLI_ASSOC);
        if($user_founded){
            return $user_founded;
            $user_founded->close();
            $this->db->close();
        }
    }
    public function edit_profile($id_user){
        $sql="UPDATE users SET username = '$name',
                    user_lastname = '$lastname',
                    user_password ='$password' 
                    WHERE id_user ='$id_user'";
        $res = $this->db->query($sql);
        if($res){
            return $res;
            $res->close();
            $this->db->close();
        }else{
            echo 'Hubo un error intente mas tarde';
        }

    }


}