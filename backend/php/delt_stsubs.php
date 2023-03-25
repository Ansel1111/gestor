<?php
  

  if(isset($_POST['stdeltsubs']))
{
    $idcusser = $_POST['suscpid'];
    
    try {

        $query = "UPDATE cust_serv SET state='0' WHERE idcusser =:idcusser LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            
            ':idcusser' => $idcusser
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