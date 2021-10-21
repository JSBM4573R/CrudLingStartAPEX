<?php

  require 'database1.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (nombres,apellidos,telefono,email,password,confirm_password,rol_id) VALUES (:nombres, :apellidos, :telefono, :email, :password, :confirm_password, :rol_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':apellidos', $_POST['apellidos']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':email', $_POST['email']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encriptar password
    //$stmt->bindParam(':password', $password); //encriptar password
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':confirm_password', $_POST['confirm_password']);
    $stmt->bindParam(':rol_id', $_POST['rol_id']);
    if ($stmt->execute()) {
      //$message = 'Cuenta Creada correctamente';
      echo "<script>
              alert('Usuario registrado exitosamente');
              window.location = 'Login.php';
            </script>";
    } else {
      //$message = 'Lo sentimos, verifica el registro e ingresalos nuevamente';
      echo "<script>alert('Ups! ah ocurrido un error verifica e intenta nuevamente')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang='es'>
    <head>
      
    <title>Lingstar</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/LSbW.png">
    <link rel="stylesheet" href="css/styleRegister.css">
    <link rel="stylesheet" href="css/styleHeader.css">
    <link rel="stylesheet" href="css/styleWsp.css">
    <script src="https://kit.fontawesome.com/2cb25f2c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
    </head>
    <body>
            
    <?php require 'encabezado.php' ?>
            
      <form action = "formularioCliente.php" method = "POST">
        <div class="titulo">
            <h1>Registro Cliente</h1>
        </div>
        <div class="formulario">
            <p><input class="datos" type = "text" name = "rol_id" value=2></p>
            <p>Nombres<input class="datos" type = "text" name = "nombres" placeholder = "Tu apellido"></p>
            <p>Apellidos <input class="datos" type = "text" name = "apellidos" placeholder = "Tu apellido"></p>
            <p>Número de contacto <input class="datos" type = "tel" name = "telefono" placeholder = "Tu número"></p>
            <p>Correo Electronico <input class="datos" type = "email" name = "email" placeholder = "Tu correo" require></p>
            <p>Contraseña <input class="datos" type = "password" name = "password" placeholder = "Tu contraseña" require></p>
            <p>Confirmacion de Contraseña <input class="datos" type = "password" name = "confirm_password" placeholder = "Confirma tu contraseña" require></p>
            <input class="button_validate" type = "submit" value = "Registrarse" >
        </div>
      </form>
          <!-- Boton de Whatsapp-->
    <a href="https://api.whatsapp.com/send?phone=5195508107&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    </body>
</html>