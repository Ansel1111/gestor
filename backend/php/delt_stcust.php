<?php
  

  if(isset($_POST['stdeltcus']))
{
    $idcli = $_POST['cusid'];
    
    try {

        $query = "UPDATE customer SET status='0' WHERE idcli=:idcli LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            
            ':idcli' => $idcli
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
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