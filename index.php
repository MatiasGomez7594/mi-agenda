<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="container-fluid row mt-5">
    <div class="container col-md">
      <img src="imgs/01G5T39168 - copia.jpg" alt="">
    </div>
    <form class="needs-validation col-md " id="needs-validation">
      <h2 class=" row col-md-6 ">Registrarse</h2>
      <a class="nav-link active row col-md-6 " href="login.php">¿Ya tiene cuenta? Iniciar sesion</a>
      <div id="message-signup"></div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Nombre</label>
          <input name="name" type="text" class="form-control" id="name" >
          <div class="text-success" id="name-message" >
            Se ve bien!
          </div>
          <div class="text-danger" id="name-error">
            El nombre debe tener un minimo de 3 letras
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom02">Apellido</label>
          <input name="lastname" type="text" class="form-control" id="lastname">
          <div class="text-success" id="lastname-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="lastname-error">
            El apellido debe tener un minimo de 3 letras
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationCustom03">Email</label>
          <input name="email" type="email" class="form-control" id="email" >
          <div class="text-success" id="email-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="email-error">
            El email es invalido
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Contraseña</label>
          <input name="password" type="password" class="form-control" id="password" >
          <div class="text-success" id="password-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="password-error">
           La contraseña debe tener un minimo de 4 caracteres
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Repita la contraseña</label>
          <input name="password2" type="password" class="form-control" id="password2" >
          <div class="text-success" id="password2-message">
            Se ve bien!
          </div>
          <div class="text-danger" id="password2-error">
           Las contraseñas no coinciden
          </div>
        </div>
      </div>
      <div class="form-check col-md-12 mb-3">
        <input class="form-check-input " type="checkbox"  id="show-password" onchange="show_password()">
        <label class="form-check-label" for="show-password">
         Ver contraseña
        </label>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input " type="checkbox"  id="not-robot" onchange="not_robot()">
          <label class="form-check-label" for="not-robot">
            No soy un robot
          </label>
          <div class="text-danger" id="error-robot">
            ¿Sos un robot?
          </div>
        </div>
      </div>
      <button class="btn btn-success" type="button" onclick="validate_form()">Registrarse</button>
    </form>
  </div>      
      <script src="scripts/validate_form.js"> 
      </script>
     
</body>
</html>