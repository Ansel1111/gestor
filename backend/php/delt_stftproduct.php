<?php
if(isset($_POST['stdeltftpt'])){
////////////// Elimianr registro de la tabla /////////
$consulta = "DELETE FROM `suscrp` WHERE `idsus`=:idsus";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idsus', $idsus, PDO::PARAM_INT);
$idsus=trim($_POST['susid']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();

    echo '<script type="text/javascript">
swal("¡Eliminado!", "Eliminado correctamente", "success").then(function() {
            window.location = "../products/mostrar.php";
        });
        </script>';

}
else{

        echo '<script type="text/javascript">
swal("Error!", "No se pudo eliminar el registro", "error").then(function() {
            window.location = "../products/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>