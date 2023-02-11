<?php 

include("contact.php");
$contact = new Contact();
//print_r($_POST);
if(isset($_POST['id_user']) 
&& isset($_POST['id_contact'])
&& isset($_POST['name'])  
&& isset($_POST['lastname']) 
&& isset($_POST['phone_number'])
&& isset($_POST['adress'])
&& isset($_POST['email'])){
    $id_user = $_POST['id_user'];
    $id_contact = $_POST['id_contact'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $adress = $_POST['adress'];
    $email = $_POST['email'];

    $edit_contact= $contact->update($id_user,$id_contact,$name,$lastname,$phone_number,$adress,$email);
    if($edit_contact){
        echo 'ok';
       // header("location: ../my_phonebook.php");
    }
}