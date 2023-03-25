<?php
if(isset($_POST['stadelserv'])){
////////////// Elimianr registro de la tabla /////////
$consulta = "DELETE FROM `service` WHERE `idserv`=:idserv";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idserv', $idserv, PDO::PARAM_INT);
$idserv=trim($_POST['servid']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();

    echo '<script type="text/javascript">
swal("¡Eliminado!", "Eliminado correctamente", "success").then(function() {
            window.location = "../service/mostrar.php";
        });
        </script>';

}
else{

        echo '<script type="text/javascript">
swal("Error!", "No se pudo eliminar el registro", "error").then(function() {
            window.location = "../service/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>