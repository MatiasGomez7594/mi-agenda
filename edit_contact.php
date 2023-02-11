<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Mi agenda</title>
</head>
<?php 

include("bbdd/contact.php");
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
?>
<div class="container-fluid col-md w-50 ">
    <form class="form w-100 pt-5 ">
        <h2>Editar informacion del contacto</h2>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input name="name" type="text" class="form-control" id="name" value="<?php echo $name?>">
          <div class="text-danger text-error" id="name-error">
                El nombre debe tener un minimo de 3 letras
          </div>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Apellido</label>
            <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $lastname?>">
          <div class="text-danger text-error" id="lastname-error">
            El apellido debe tener un minimo de 3 letras
          </div>
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Telefono</label>
          <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefono" value="<?php echo $phone_number?>">
          <div class="text-danger text-error" id="phone-error">
            El telefono es invalido debe ser 1122334455
          </div>
        </div>
        <div class="form-group">
          <label for="adress">Direccion</label>
          <input name="adress" type="text" class="form-control" id="adress" placeholder="Direccion" value="<?php echo $adress?>">
          <div class="text-danger text-error" id="adress-error">
            La direccion es invalida
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="email@ejemplo.com" value="<?php echo $email?>">
            <div class="text-danger text-error" id="email-error">
                El email es invalido 
            </div>
          </div>
        </div>
        <input type="button" id="edit-button" name="edit_contact" 
        value="guardar cambios" class="btn btn-success" onClick="validate_data_edit('<?php echo $id_user?>','<?php echo $id_contact?>')">
        <a class="btn btn-secondary" href="my_phonebook.php" role="button" >Volver</a>
    </form>
</div>
<script src="scripts/delete_edit_contact.js"> 
</script>
