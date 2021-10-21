
<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>LingStar</title>

  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos -->
  <link rel="shortcut icon" href="img/LSbW.png">
  <link rel="stylesheet" href="css/styleHeader.css">
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="css/styleWsp.css">
  <link rel="stylesheet" href="css/styleInterfaz.css">
<!-- bootstrap 5 css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/2cb25f2c39.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
  <header>
    <?php require 'encabezado.php' ?>
  </header>

  <?php if(!empty($user)): ?>

  <div class="welcome">
    <h1>Bienvenido</h1>
    <h2><?= $user['nombres']; ?></h2>
    <h1>Tu acabas de iniciar sesion como Cliente</h1>
    <div class="devolver">
      <a href="logout.php">Cerrar Sesion</a>
    </div>
    <?php else: ?>
    <div class="devolver">
      <h1>Acabas de cerrar Sesion</h1>
      <a href="Login.php">Vuelve a iniciar sesion</a>
    </div>
  </div>

    <?php endif; ?>
  </section>
      <!-- Boton de Whatsapp-->
      <a href="https://api.whatsapp.com/send?phone=5195508107&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
</body>

</html>