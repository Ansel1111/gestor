    <?php 

if(isset($_POST['stupdrecustservct']))
{

    $idcli=$_POST['cusid'];
    $idcusser=$_POST['cuscid'];
    $corr=$_POST['txtcorrc'];
   
   
    $usuario=$_POST['txtuser'];
   

    $idserv=$_POST['txtplanc'];
    $inicio=$_POST['txtinic'];
    $fin=$_POST['txtfecv'];
    $state=$_POST['renosrv'];
  
    
         $statement2 = $connect->prepare("UPDATE customer SET corr='$corr' , usuario='$usuario'   WHERE idcli= $idcli LIMIT 1;");

         $statement3 = $connect->prepare("UPDATE cust_serv SET idcli ='$idcli',idserv ='$idserv' , inicio='$inicio',fin='$fin', state='$state'   WHERE idcusser = $idcusser  LIMIT 1;");


        $inserted = $statement2->execute(); 
        $inserted = $statement3->execute(); 

        if($inserted>0){

    echo '<script type="text/javascript">
swal("Listo!", "Se renovo correctamente", "success").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se puede,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
  

    }




?>