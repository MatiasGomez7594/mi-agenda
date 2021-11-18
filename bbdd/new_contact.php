<?php


include("contact.php");
$new_contact = new Contact();
//print_r($_POST);
if(isset($_POST['name']) 
&& isset($_POST['lastname']) 
&& isset($_POST['email']) 
&& isset($_POST['phone'])
&& isset($_POST['adress'])){
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    //echo  $id_user;
    $register = $new_contact->register($id_user,$name,$lastname,$phone,$adress,$email);
    if($register){
       header("location: ../add.php");
    }
    
    
}
?>