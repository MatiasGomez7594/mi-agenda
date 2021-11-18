<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Mi agenda</title>
</head>
<?php 
include("contact.php");
$contact = new Contact();
$id_user = $_POST['id_user'];
$id_contact = $_POST['id_contact'];
//echo  $id_user;
$contact_info= $contact->see_contact($id_user,$id_contact);
if($contact_info){
    foreach ($contact_info as $contact_data) {
        $name = $contact_data['contact_name'];
        $lastname = $contact_data['contact_lastname'];
        $phone_number = $contact_data['phone_number'];
        $adress = $contact_data['adress'];
        $email = $contact_data['email'];
    }
}

if(isset($_POST['name'])  
&& isset($_POST['lastname']) 
&& isset($_POST['phone_number'])
&& isset($_POST['adress'])
&& isset($_POST['email'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $adress = $_POST['adress'];
    $email = $_POST['email'];
    $edit_contact= $contact->update($id_user,$id_contact,$name,$lastname,$phone_number,$adress,$email);
    if($edit_contact){
        //echo $edit_contact;
        header("location: ../my_phonebook.php");
    }
}
?>
<div class="container-fluid col-md w-50 ">
    <form class="form w-100 pt-5 " method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit="validate_form_edit(event)" >
        <h2>Editar informacion del contacto</h2>
        <div class="form-row">
        <input name="id_user" type="hidden" value="<?php echo $id_user?>">
        <input name="id_contact" id="id-contact" type="hidden" value="<?php echo $id_contact?>">
          <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input name="name" type="text" class="form-control" id="name" value="<?php echo $name?>">
            <div class="text-success" id="name-message" >
                Se ve bien!
          </div>
          <div class="text-danger" id="name-error">
                El nombre debe tener un minimo de 3 letras
          </div>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Apellido</label>
            <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $lastname?>">
            <div class="text-success" id="lastname-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="lastname-error">
            El apellido debe tener un minimo de 3 letras
          </div>
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Telefono</label>
          <input name="phone_number" type="text" class="form-control" id="phone-number" placeholder="Telefono" value="<?php echo $phone_number?>">
          <div class="text-success" id="phone-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="phone-error">
            El telefono es invalido debe ser 1122334455
          </div>
        </div>
        <div class="form-group">
          <label for="adress">Direccion</label>
          <input name="adress" type="text" class="form-control" id="adress" placeholder="Direccion" value="<?php echo $adress?>">
          <div class="text-success" id="adress-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="adress-error">
            La direccion es invalida
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="email@ejemplo.com" value="<?php echo $email?>">
            <div class="text-success" id="email-message">
                Se ve bien!
            </div>
            <div class="text-danger" id="email-error">
                El email es invalido
            </div>
          </div>
        </div>
        <input type="submit" id="edit-button" name="edit_contact" value="guardar cambios" class="btn btn-success">
        <a class="btn btn-secondary" href="../my_phonebook.php" role="button" >Volver</a>
    </form>
</div>
<script src="../scripts/validate_form.js"> 
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>