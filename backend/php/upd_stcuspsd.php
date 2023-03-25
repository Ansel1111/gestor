<?php
  

  if(isset($_POST['stupdcustpsd']))
{
    $idcli = $_POST['cusid'];
    $clave=MD5($_POST['txtpassw']);
  

    try {

        $query = "UPDATE customer SET clave=:clave WHERE idcli=:idcli LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':clave' => $clave,
            
            ':idcli' => $idcli
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Contraseña actualizada correctamente", "success").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>