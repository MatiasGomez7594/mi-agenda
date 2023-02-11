<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>
    <form class="form w-50 pt-5">
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
        <div class="alert alert-success contact-add" id="contact-add-message" role="alert" >
                Se agregò el contacto con exito
            </div>
        <input name="id_user" type="hidden" value="<?php echo $id_user?>">
          <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input name="name" type="text" class="form-control" id="name">
            <div class="text-success text-ok" id="name-message" >
                Se ve bien!
          </div>
          <div class="text-danger text-error" id="name-error">
                El nombre debe tener un minimo de 3 letras
          </div>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Apellido</label>
            <input name="lastname" type="text" class="form-control" id="lastname">
            <div class="text-success text-ok" id="lastname-message">
            Se ve bien!
          </div>
          <div class="text-danger text-error" id="lastname-error">
            El apellido debe tener un minimo de 3 letras
          </div>
          </div>

        </div>
        <div class="form-group">
          <label for="phone">Telefono</label>
          <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefono">
        </div>
        <div class="text-success text-ok" id="phone-message">
            Se ve bien!
          </div>
          <div class="text-danger text-error" id="phone-error">
            El telefono es invalido debe ser 1122334455
          </div>
        <div class="form-group">
          <label for="adress">Direccion</label>
          <input name="adress" type="text" class="form-control" id="adress" placeholder="Direccion">
        </div>
        <div class="text-success text-ok" id="adress-message">
            Se ve bien!
          </div>
          <div class="text-danger text-error" id="adress-error">
            La direccion es invalida
          </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="email@ejemplo.com">
            <div class="text-success text-ok" id="email-message">
                Se ve bien!
            </div>
            <div class="text-danger text-error" id="email-error">
                El email es invalido
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-success w-25" onClick="validate_contact('<?php echo $id_user?>')">Agregar</button>
        <a class="btn btn-success w-25" href="my_phonebook.php" role="button">Volver</a>
      </form>
      <script src="scripts/validate_form.js"> 
      </script>
</body>
</html>