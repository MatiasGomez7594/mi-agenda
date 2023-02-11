<?php 

include("contact.php");
$contact = new Contact();
$id_user = $_POST['id_user'];
$id_contact = $_POST['id_contact'];
//print_r($_POST);
    //echo  $id_user;
    $contact_deleted = $contact->delete($id_user,$id_contact);
    if($contact_deleted){
        header("location: ../my_phonebook.php");
    }
    
    

?>