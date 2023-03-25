<?php  
require_once('../../backend/bd/ctconex.php');
 if(isset($_POST['staddpt']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email


    $noms=$_POST['txtnoms'];
    $descr=$_POST['txtdesc'];
  
    $imgFile = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $imgSize = $_FILES['foto']['size'];

    $status=$_POST['txtstat'];
    
   
    

  
  if(empty($noms)){
   $errMSG = "Please enter your name.";
  }
  else if(empty($descr)){
   $errMSG = "Please Enter your description.";
  }
  else if(empty($status)){
   $errMSG = "Please Enter your status.";
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
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO suscrp(noms, descr, foto,status) VALUES(:noms, :descr,:foto,:status)");
   $stmt->bindParam(':noms',$noms);
   $stmt->bindParam(':descr',$descr);
   $stmt->bindParam(':foto',$foto);
   $stmt->bindParam(':status',$status);



   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../products/mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  }
 }
?>