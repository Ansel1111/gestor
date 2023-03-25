<?php
  

  if(isset($_POST['stupdpt']))
{
    $idsus = $_POST['susid'];
    $descr = $_POST['txtdesc'];
    $noms = $_POST['txtnoms'];
  

    try {

        $query = "UPDATE suscrp SET noms=:noms, descr=:descr WHERE idsus=:idsus LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':noms' => $noms,
            ':descr' => $descr,
            ':idsus' => $idsus
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../products/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../products/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>