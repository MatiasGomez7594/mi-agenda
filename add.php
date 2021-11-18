<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form class="form w-50 pt-5" method="POST" action="bbdd/new_contact.php" onsubmit="validate_form_edit(event)">
    <?php  
            include("bbdd/session.php");
            $session = new Session();
            if(isset($_SESSION['user_session'])){
                $email = $_SESSION['user_session'];
                include("bbdd/user.php");
                $user = new User();
                $search_user = $user->search_user($email);
                if($search_user){
                    foreach ($search_user as $user_data) {
                        $id_user = $user_data['id_user'];
                    }
                }
            }else{
              header("location: index.php");
            }?>
        <h2>Añadir nuevo contacto</h2>
        <div class="form-row">
        <input name="id_user" type="hidden" value="<?php echo $id_user?>">
          <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input name="name" type="text" class="form-control" id="name">
            <div class="text-success" id="name-message" >
                Se ve bien!
          </div>
          <div class="text-danger" id="name-error">
                El nombre debe tener un minimo de 3 letras
          </div>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Apellido</label>
            <input name="lastname" type="text" class="form-control" id="lastname">
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
          <input name="phone" type="text" class="form-control" id="phone-number" placeholder="Telefono">
        </div>
        <div class="text-success" id="phone-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="phone-error">
            El telefono es invalido debe ser 1122334455
          </div>
        <div class="form-group">
          <label for="adress">Direccion</label>
          <input name="adress" type="text" class="form-control" id="adress" placeholder="Direccion">
        </div>
        <div class="text-success" id="adress-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="adress-error">
            La direccion es invalida
          </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="email@ejemplo.com">
            <div class="text-success" id="email-message">
                Se ve bien!
            </div>
            <div class="text-danger" id="email-error">
                El email es invalido
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success w-25">Agregar</button>
        <a class="btn btn-success w-25" href="my_phonebook.php" role="button">Volver</a>
      </form>
      <script src="scripts/validate_form.js"> 
      </script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>