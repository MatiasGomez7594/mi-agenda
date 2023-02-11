<?php

include_once("db.php");

class Contact extends Connect{
    protected $name;
    protected $lastname;
    protected $phone;
    protected $adress;
    protected $email;

    public function __construct(){
        parent::__construct();
    }
    public function sanitize($var){
        $string_clean = $this->db->real_escape_string($var);
        return $string_clean ;
      }

    public function register($id_user,$name,$lastname,$phone,$adress,$email){
        $sql="INSERT INTO my_contacts(id_user,contact_name,contact_lastname,phone_number,adress,email) 
                VALUES('$id_user','$name','$lastname','$phone','$adress','$email')";
        $res = $this->db->query($sql);
        if($res){
            return $res;
            $res->close();
            $this->db->close();
        }else{
            echo '<div class="alert alert-warning" role="alert">
                Hubo un error intente mas tarde
            </div>';
        }
    }
        
    public function delete($id_user,$id_contact){
        $sql="DELETE FROM my_contacts WHERE id_contact ='$id_contact' AND id_user='$id_user'";
        $res = $this->db->query($sql);
        if($res){
            return $res;
            $res->close();
            $this->db->close();
        }else{
            echo '<div class="alert alert-warning" role="alert">
            Hubo un error intente mas tarde
            </div>';
        }
    }
    public function update($id_user,$id_contact,$name,$lastname,$phone_number,$adress,$email){
        $sql="UPDATE my_contacts SET contact_name = '$name', contact_lastname = '$lastname',
        phone_number = '$phone_number',adress = '$adress', email = '$email'  
        WHERE id_contact ='$id_contact' AND id_user='$id_user'";
        $res = $this->db->query($sql);
        if($res){
            return $res;
            $res->close();
            $this->db->close();
        }else{
            echo '<div class="alert alert-warning" role="alert">
                Hubo un error intente mas tarde
            </div>';
        }
    }
    public function get_all($id_user){
        $sql="SELECT id_contact,contact_name,contact_lastname,phone_number,adress,email 
                FROM my_contacts WHERE id_user ='$id_user'";
        $res = $this->db->query($sql);
        $contacts_founded =  $res->fetch_all(MYSQLI_ASSOC);
        if($contacts_founded){
            return $contacts_founded;
            $contacts_founded->close();
            $this->db->close();
        }else{
            echo '<div class="alert alert-warning" role="alert">
              No tiene ningun contacto
            </div>';
        }
    }
    public function see_contact($id_user,$id_contact){
        $sql="SELECT contact_name,contact_lastname,phone_number,adress,email 
             FROM my_contacts  WHERE id_contact ='$id_contact' AND id_user='$id_user'";
        $res = $this->db->query($sql);
        $contact_founded =  $res->fetch_all(MYSQLI_ASSOC);
        if($contact_founded){
            return $contact_founded;
            $contact_founded->close();
            $this->db->close();
        }else{
            echo '<div class="alert alert-danger" role="alert">
            Hubo un error intente mas tarde
          </div>';
        }
    }






      



}