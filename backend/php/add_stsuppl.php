<?php  
        
         if(isset($_POST['staddsupp']))
         {
          //$username = $_POST['user_name'];// user name
          //$userjob = $_POST['user_job'];// user email


            $rucsup=$_POST['txtrucpro'];
            $namsup=$_POST['txtnmarc'];
            $corrsup=$_POST['txtcorc'];
            $state=$_POST['txtstatrc'];
            
          
          if(empty($rucsup)){
           $errMSG = "Please enter your name.";
          }
          else if(empty($namsup)){
           $errMSG = "Please Enter your lastname.";
          }

          // if no error occured, continue ....
          if(!isset($errMSG))
          {
           $stmt = $connect->prepare("INSERT INTO supplier(rucsup, namsup,corrsup,state) VALUES(:rucsup, :namsup,:corrsup,:state)");
           $stmt->bindParam(':rucsup',$rucsup);
           $stmt->bindParam(':namsup',$namsup);
           $stmt->bindParam(':corrsup',$corrsup);
           $stmt->bindParam(':state',$state);
           
           if($stmt->execute())
           {
            echo '<script type="text/javascript">
        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                    window.location = "../supplier/mostrar.php";
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