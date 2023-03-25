<?php
session_start();
    if (isset($_SESSION['id'])){
        header('Location: administrador/escritorio.php');
    } 
include_once './backend/php/ctlogx.php'
 ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoMovies</title>
    <link rel="stylesheet" href="./backend/css/login.css">
    <link rel="icon" type="image/png"  href="./backend/img/2.png">
</head>
<body>
    <div class="login-wrapper">

        <div class=" box-image box-col">
 <img src="./backend/img/ac.jpg" alt="sideimage"> 
        </div>
        <div class="box-col">
           <div class="box-form">
               <div class="inner">

                   <div class="form-head">
                    <form autocomplete="off" method="post"  role="form">
                       <div class="title">
                           GoMovies
                       </div>
                       <?php 
                            if (isset($errMsg)) {
                                echo '
    <div style="color:#FF0000;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>
    ';  ;
                            }

                        ?>
                       <div class="form-group">
                           <input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>"  autocomplete="off" class="form-control" placeholder="Nombre de usuario">
                       </div>
                       <div class="form-group">
                           <input type="password" required="true" name="clave" value="<?php if(isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" class="form-control" placeholder="Contraseña">
                       </div>
                      
                       <div class="actions">
                           <button class="btn btn-google" name='ctxlog' type="submit">
                               <span class="icon">
                                   Acceder
                               </span>
                           </button>
                       </div>
                    </form>
                   </div>

               </div>
           </div>
        </div>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
         <script type="text/javascript" src="./backend/js/reenvio.js"></script>
</body>
</html>