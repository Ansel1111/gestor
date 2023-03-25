<?php  
       
         if(isset($_POST['staddserv']))
         {
          //$username = $_POST['user_name'];// user name
          //$userjob = $_POST['user_job'];// user email


            $idsus=$_POST['txtprod'];
            $nameserv=$_POST['txtnoms'];
            $prec=$_POST['txtpre'];
            $cont=$_POST['txtdis'];
            $state=$_POST['txtsta'];

          
          if(empty($nameserv)){
           $errMSG = "Please enter your name.";
          }
          else if(empty($prec)){
           $errMSG = "Please Enter your lastname.";
          }

          // if no error occured, continue ....
          if(!isset($errMSG))
          {
           $stmt = $connect->prepare("INSERT INTO service(idsus, nameserv,prec,cont,state) VALUES(:idsus, :nameserv,:prec,:cont,:state)");
           $stmt->bindParam(':idsus',$idsus);
           $stmt->bindParam(':nameserv',$nameserv);
           $stmt->bindParam(':prec',$prec);
           $stmt->bindParam(':cont',$cont);
           $stmt->bindParam(':state',$state);
           
           if($stmt->execute())
           {
            echo '<script type="text/javascript">
        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                    window.location = "mostrar.php";
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