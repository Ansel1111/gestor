<?php
if(isset($_POST['stdeltsupp'])){
////////////// Elimianr registro de la tabla /////////
$consulta = "DELETE FROM `supplier` WHERE `idsup`=:idsup";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idsup', $idsup, PDO::PARAM_INT);
$idsup=trim($_POST['suppid']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();

    echo '<script type="text/javascript">
swal("¡Eliminado!", "Eliminado correctamente", "success").then(function() {
            window.location = "../supplier/mostrar.php";
        });
        </script>';

}
else{

        echo '<script type="text/javascript">
swal("Error!", "No se pudo eliminar el registro", "error").then(function() {
            window.location = "../supplier/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>