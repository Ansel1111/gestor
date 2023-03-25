<?php
  

  if(isset($_POST['stupdsupp']))
{
    $idsup = $_POST['suppid'];
    $rucsup = $_POST['txtrucs'];
    $namsup = $_POST['txtnmarc'];
    $corrsup = $_POST['txtcorc'];
    
    try {

        $query = "UPDATE supplier SET rucsup=:rucsup, namsup=:namsup, corrsup=:corrsup WHERE idsup=:idsup LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':rucsup' => $rucsup,
            ':namsup' => $namsup,
            ':corrsup' => $corrsup,
            
            ':idsup' => $idsup
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../supplier/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../supplier/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>