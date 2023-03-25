<?php 
if(isset($_POST['stupdsetn']))
{
    $idstn = $_POST['settid'];
    $rucm = $_POST['txtruccg'];
    $namstn = $_POST['txtnomcg'];
    $direc1 = $_POST['txtdircg'];
    $direc2 = $_POST['txtdireccg'];
    $telstn = $_POST['txttelcg'];

    
    try {

        $query = "UPDATE setting SET rucm=:rucm,namstn=:namstn,direc1=:direc1,direc2=:direc2,telstn=:telstn WHERE idstn=:idstn LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':rucm' => $rucm,
            ':namstn' => $namstn,
            ':direc1' => $direc1,
            ':direc2' => $direc2,
            ':telstn' => $telstn,
            
            ':idstn' => $idstn
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../config/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../config/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


   ?>