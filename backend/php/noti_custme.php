<?php 


if(isset($_POST['notification_custm']))
 {
$destinatario  = $_POST['cusemai'];
$mensaje = $_POST['mens'];
$inicio = $_POST['cusfin'];

$correo = "admin034e4@gmail.com";
    $asunto = "IMPORTANTE"; 
$cuerpo = '
    <html> 
        <head> 
            <title>Notificacion de suscripcion pendiente</title> 
        </head>
        <body> 
            <h1>Notificacion de suscripcion pendiente GoMovies </h1>
            <p> 
                Señor(a):  '.$destinatario . ' - ' . $asunto .'  <br>
                Mensaje: '.$mensaje.'<br>
                Fecha: '.$inicio.'
            </p> 
        </body>
    </html>
';


//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=UTF8\r\n"; 
//dirección del remitente

$headers .= "FROM: $correo <$correo>\r\n";
mail($destinatario,$asunto,$cuerpo,$headers);

         echo '<script type="text/javascript">
swal("¡ok!", "Correo enviado correctamente", "success").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
 }
 
 




    
?>