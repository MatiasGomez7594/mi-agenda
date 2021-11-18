<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/my_phonebook.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Mi agenda</title>
</head>
<body >
    <nav class="navbar navbar-success w-100 bg-success">
        <a class="navbar-brand text-light "  onclick="show_menu()">
            <img src="imgs/logo-mi-agenda.png"  width="40" height="50" class="d-inline-block " alt="">
           <?php  
            include("bbdd/session.php");
            $session = new Session();
            if(isset($_SESSION['user_session'])){
                  $email = $_SESSION['user_session'];   
            }else{
              header("location: index.php");
            }?>
        </a>
      </nav>
      <div class="menu-left" id="menu-left">
        <form class="jumbotron" method="POST">
          <?php             
          if(isset($_POST['exit'])){
            $session->session_destroy();
            header("location: login.php");
          }
          ?>
          <h2 class="display-5 "><span class="badge badge-success ml-2"><?php echo $email;?></span></h2>
          <hr class="my-4">
          <button class="btn btn-success  btn-lg" name="exit"  type="submit">Salir</button>
          <a class="btn btn-success  btn-lg" href="#" role="button" onclick="show_menu()">Volver</a>
        </form>
      </div>
        <?php 
        include("bbdd/user.php");
        $user = new User();
        $search_user = $user->search_user($email);
        if($search_user){
            foreach ($search_user as $user_data) {
                $id_user = $user_data['id_user'];
            }
        }
        include("bbdd/contact.php");
        $new_contact = new Contact();
        $search_contact = $new_contact->get_all($id_user);
        if($search_contact){
          ?>
          <table class="table mt-2">
          <thead class="thead bg-success text-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Telefono</th>
              <th scope="col">Direccion</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody id="contacts-list" >
          <?php 
          foreach ($search_contact as $contact_data){
            $id_contact = $contact_data['id_contact'];
            echo '<tr class="my-contact" onclick="activate_item('.$id_contact.')" id="'.$id_contact.'">';
            echo '<td>'.$contact_data['contact_name'].'</td>';
            echo '<td>'. $contact_data['contact_lastname'].'</td>';
            echo '<td>'.$contact_data['phone_number'].'</td>';
            echo '<td>'.$contact_data['adress'].'</td>';
            echo '<td>'.$contact_data['email'].'</td>';
            echo '</tr>';
          }     
        }
        ?>
        </tbody>
      </table>
    <form class="modal-footer" method="POST" action="bbdd/edit_contact.php">
        <input name="id_user" type="hidden" value="<?php echo $id_user?>">
        <input name="id_contact" id="id-contact-edit" type="hidden" >
        <button type="submit" id="edit-button" disabled="true" class="btn btn-success">
          Editar 
        </button> 
        <a class="btn btn-success" href="add.php" role="button">Añadir contacto</a>
        <button type="button" id="delete-button" disabled="true"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          Eliminar
        </button>
    </form>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Seguro que desea eliminar este contacto de su agenda?
        </div>
        <form class="modal-footer" method="POST" action="bbdd/delete_contact.php">
          <input name="id_user" type="hidden" value="<?php echo $id_user?>">
          <input name="id_contact" id="id-contact-delete" type="hidden">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    function show_menu(){
      var menu_left = document.getElementById("menu-left")
      if(menu_left.className == "menu-left"){
         menu_left.className = "show-menu-left"
      }else{
        menu_left.className = "menu-left"
      }
    }
  </script>
  <script src="scripts/table.js"></script>
  <script src="scripts/switch_mode.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>