<?php
  

  if(isset($_POST['staupdserv']))
{
    $idserv = $_POST['servid'];
    $idsus = $_POST['txtprod'];
    $nameserv = $_POST['txtnoms'];
    $prec = $_POST['txtpre'];
    $cont = $_POST['txtdis'];

    try {

        $query = "UPDATE service SET idsus=:idsus, nameserv=:nameserv ,prec=:prec ,cont=:cont  WHERE idserv=:idserv LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':idsus' => $idsus,
            ':nameserv' => $nameserv,
            ':prec' => $prec,
            ':cont' => $cont,
            ':idserv' => $idserv
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../service/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../service/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>