<?php 
    require './backend/bd/ctconex.php';

    if(isset($_POST['ctxlog'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];
    
    $clave = MD5($_POST['clave']);

    if($usuario == '')
      $errMsg = 'Digite su usuario';
    if($clave == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, nombre, usuario, correo,clave, rol FROM usuarios WHERE usuario = :usuario');


        $stmt->execute(array(
          ':usuario' => $usuario
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "El nombre de usuario: $usuario no se encuentra , puede solicitarlo con el administrador.";
        }
        else {
          if($contra == $data['contra']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['correo'] = $data['correo'];
            $_SESSION['clave'] = $data['clave'];
            $_SESSION['rol'] = $data['rol'];
            
            
    if($_SESSION['rol'] == 1){
          header('Location: frontend/administrador/escritorio.php');
        }
            exit;
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
 ?>