    <?php 

if(isset($_POST['stupdplanct']))
{

    $idcli=$_POST['cusid'];
    $corr=$_POST['txtcorrc'];
   
    $clave=MD5($_POST['txtcontc']);
    $usuario=$_POST['txtuser'];
    $rol=$_POST['rolid'];

    $idserv=$_POST['txtplanc'];
    $inicio=$_POST['txtinic'];
    $fin=$_POST['txtfecv'];
  
    
         $statement2 = $connect->prepare("UPDATE customer SET corr='$corr' , usuario='$usuario' , clave='$clave' , 
            rol='$rol' WHERE idcli= $idcli LIMIT 1;");



        $statement3 = $connect->prepare("INSERT INTO cust_serv (idcli,idserv,inicio,fin,state) VALUES('$idcli','$idserv','$inicio','$fin','1')");

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