<?php  

 if(isset($_POST['staddct']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email


    $nomcli=$_POST['txtnomc'];
    $apecli=$_POST['txtapec'];
  
    $imgFile = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $imgSize = $_FILES['foto']['size'];

    $tele=$_POST['txtcelc'];
    $status=$_POST['txtstatc'];
    

  
  if(empty($nomcli)){
   $errMSG = "Please enter your inicio.";
  }

    else
  {
   $upload_dir = '../../backend/img/subidas/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $foto = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$foto);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  

  $stmt = "SELECT * FROM customer  WHERE tele='$tele'";


   if(empty($tele)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM customer  WHERE tele='$tele'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO customer(nomcli, apecli, tele,status,foto) VALUES(:nomcli, :apecli,:tele,:status,:foto)");
   $stmt->bindParam(':nomcli',$nomcli);
   $stmt->bindParam(':apecli',$apecli);
   $stmt->bindParam(':tele',$tele);
   $stmt->bindParam(':status',$status);
   $stmt->bindParam(':foto',$foto);


   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{

                     echo '<script type="text/javascript">
swal("Error!", "ya existe el registro!", "error").then(function() {
            window.location = "../customers/mostrar.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>