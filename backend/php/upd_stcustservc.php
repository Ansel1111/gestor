    <?php 

if(isset($_POST['stupdcustservct']))
{

    $idcli=$_POST['cusid'];
    $idcusser=$_POST['cuscid'];
    $corr=$_POST['txtcorrc'];
   
   
    $usuario=$_POST['txtuser'];
   

    $idserv=$_POST['txtplanc'];
    $inicio=$_POST['txtinic'];
    $fin=$_POST['txtfecv'];
  
    
         $statement2 = $connect->prepare("UPDATE customer SET corr='$corr' , usuario='$usuario'   WHERE idcli= $idcli LIMIT 1;");

         $statement3 = $connect->prepare("UPDATE cust_serv SET idcli ='$idcli',idserv ='$idserv' , inicio='$inicio',fin='$fin'   WHERE idcusser = $idcusser  LIMIT 1;");


        $inserted = $statement2->execute(); 
        $inserted = $statement3->execute(); 

        if($inserted>0){

    echo '<script type="text/javascript">
swal("Listo!", "Se realizo correctamente", "success").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
  

    }




?>