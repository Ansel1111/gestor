<?php
  

  if(isset($_POST['stupdct']))
{
    $idcli = $_POST['cusid'];
    $nomcli = $_POST['txtnomc'];
    $apecli = $_POST['txtapec'];
    $tele = $_POST['txtcelc'];
    $status = $_POST['txtstac'];
  

    try {

        $query = "UPDATE customer SET nomcli=:nomcli, apecli=:apecli, tele=:tele,status=:status WHERE idcli=:idcli LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomcli' => $nomcli,
            ':apecli' => $apecli,
            ':tele' => $tele,
            ':status' => $status,
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