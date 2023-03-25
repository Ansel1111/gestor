<?php
     session_start();
    
    if(!isset($_SESSION['rol']) == 1){
    header('location: ./login.php');
  }
?>
<?php if(isset($_SESSION['id'])) { ?>
     <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="">
    <meta name="description"
        content="">
    <meta name="robots" content="">
    <title>GoMovies</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../backend/img/2.png">
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="../../backend/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../backend/css/card.css">

        <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">
    
</head>

<body>
   
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
  
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
       
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../administrador/escritorio.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../backend/img/dddd.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../../backend/img/dddd.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../backend/img/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../../backend/img/logo-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                   
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <ul class="navbar-nav float-start me-auto">
                       
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                   
                    <ul class="navbar-nav float-end">
                      
                       <?php 
require '../../backend/bd/ctconex.php';
 $id = $_SESSION['id'];
 $sentencia = $connect->prepare("SELECT * FROM usuarios  WHERE usuarios.id= '$id';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $f):?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../backend/img/subidas/<?php echo  $f->foto; ?>" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../profile/mostrar.php"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="../pages-logout.php"><i class="ti-power-off m-r-5 m-l-5"></i>
                                    Salir</a>
                               
                            </ul>
                        </li>
                         <?php endforeach; ?>
  
    <?php else:?>
        
<div class="alert alert-warning" style="position: relative;
    margin-top: 14px;
    margin-bottom: 0px;">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                 <?php 
 $id = $_SESSION['id'];
 $sentencia = $connect->prepare("SELECT * FROM usuarios  WHERE usuarios.id= '$id';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $a):?>
                            <div class="user-pic">
                                <img src="../../backend/img/subidas/<?php echo  $a->foto; ?>" alt="users"
                                        class="rounded-circle" width="40" />
                            </div>
                            <?php endforeach; ?>
  
    <?php else:?>
        
<div class="alert alert-warning" style="position: relative;
    margin-top: 14px;
    margin-bottom: 0px;">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $_SESSION['nombre']; ?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $_SESSION['correo']; ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="../profile/mostrar.php"><i
                                                class="ti-user m-r-5 m-l-5"></i> Mi perfil</a>
                                       
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../pages-logout.php"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Salir</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../administrador/escritorio.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Panel administrativo</span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../products/mostrar.php" aria-expanded="false"><i
                                    class="mdi mdi-package-variant-closed"></i><span class="hide-menu">Productos</span></a></li>
                      
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../service/mostrar.php" aria-expanded="false"><i class="mdi mdi-bulletin-board"></i><span
                                    class="hide-menu">Servicios</span></a></li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../supplier/mostrar.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                                    class="hide-menu">Proveedores</span></a></li>


                                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../customers/mostrar.php" aria-expanded="false"><i class="mdi mdi-account"></i><span
                                    class="hide-menu">Clientes</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../sale/mostrar.php" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span
                                    class="hide-menu">Ventas</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../receipt/mostrar.php" aria-expanded="false"><i class="mdi mdi-ticket"></i><span
                                    class="hide-menu">Recibos</span></a></li>

                                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../config/mostrar.php" aria-expanded="false"><i class="mdi mdi-settings"></i><span
                                    class="hide-menu">Configuraciones</span></a></li>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Ventas</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../administrador/escritorio.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                                </ol>
                            </nav>
                        </div>
                       
                    </div>

                    

                    
                </div>
            </div>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-12 text-center">
          
<?php

$sentencia = $connect->prepare("SELECT cust_serv.idcusser,customer.idcli, customer.nomcli, customer.apecli, customer.tele, customer.corr, customer.usuario, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state, 
GROUP_CONCAT(suscrp.idsus, '..', suscrp.noms, '..', suscrp.foto, '..' SEPARATOR '__') AS suscrp FROM cust_serv INNER JOIN customer ON cust_serv.idcli= customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv INNER JOIN suscrp ON service.idsus = suscrp.idsus  GROUP BY cust_serv.idcusser DESC;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
?>
<?php if(count($data)>0):?>
<table class="table" id="example">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cuenta</th>
      <th scope="col">Cliente</th>
      <th scope="col">Telefono</th>
      <th scope="col">Periodo</th>
      <th scope="col">Dias restantes</th>
      <th scope="col">Plan</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $e):?>
    <tr>
      <th scope="row" style="color: #3e5569;"><?php echo  $e->idcusser; ?></th>
      
     
      <?php foreach(explode("__", $e->suscrp) as $suscrpConcatenados){ 
                                $suscrp = explode("..", $suscrpConcatenados)
                                ?>
          <td style="color: #3e5569;"><?php  echo "<img src='../../backend/img/subidas/".$suscrp[2]."'width='50'"; ?></td>                      
        <?php } ?>                         

      <td style="color: #3e5569;"><?php echo  $e->nomcli; ?>&nbsp;<?php echo  $e->apecli; ?></td>
      <td style="color: #3e5569;"><a href="tel:<?php echo $e->tele ?>"><?php echo $e->tele ?></a></td>

    
      <?php    if($e->state ==1)  { ?> 

    <td style="color: #3e5569;"><?php echo  $e->inicio; ?> - <?php echo  $e->fin; ?></td>
               <?php  }   else {?> 
               
             <td style="color: #3e5569;">
                <span class="text-dark"><strong>Suscripcion inactiva</strong></span>      
             </td>  
           
          
     <?php  } ?>

      <td style="color: #3e5569;">
        <?php
                                          $esta=$e->state; 
                                          $fechaEnvio = $e->fin; 
                                          $fechaActual = date('Y-m-d'); 
                                          $datetime1 = date_create($fechaEnvio);
                                          $datetime2 = date_create($fechaActual);
                                          $contador = date_diff($datetime1, $datetime2);
                                          $differenceFormat = '%a';


                                        while ($fechaEnvio == '0000-00-00') {
                                               echo '<span class="label label-success">FREE</span>';
                                               $fechaEnvio++;
                                            }
                                            if ($esta == '0') {
                                                 echo '<span class="text-dark"><strong>Cancelado</strong></span>';

                                             }elseif ($fechaEnvio > $fechaActual ) {
                                                 echo $contador->format($differenceFormat);
                                             }else {
                                          
                                           echo '<span class="text-danger"><strong>Renovar</strong></span>';


                                        }
                                          
                                        ?>   
      </td>
      
      <?php    if($e->state ==1)  { ?> 

    <td style="color: #3e5569;"><span class="text-danger"><strong><?php echo  $e->nameserv; ?></strong></span></td>
               <?php  }   else {?> 
               
             <td style="color: #3e5569;">
                <span class="text-dark"><strong>Sin plan</strong></span>      
             </td>  
           
          
     <?php  } ?>

      <?php    if($e->state ==1)  { ?> 

    <td style="color: #3e5569;">
          

    <a href="../suscription/print.php?id=<?php echo  $e->idcusser; ?>" class="btn btn-success text-white"
    ><i class='mdi mdi-cloud-print' data-toggle='tooltip' title='print'></i></a>  

    
      </td>
    
               <?php  }   else {?> 
               
        <td style="color: #3e5569;">
        <a href="../suscription/renovar.php?id=<?php echo  $e->idcusser; ?>" class="btn btn-dark text-white"
    ><i class='mdi mdi-cube-outline' data-toggle='tooltip' title='renovar'></i></a>    
        </td>     
          
     <?php  } ?>
    </tr>
     <?php endforeach; ?>
  </tbody>
</table>

<?php else:?>
    <div class="alert alert-warning" style="position: relative;
   
    margin-top: 14px;
    margin-bottom: 0px;">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>

        </div>       
    </div>

        </div>
    </div>
    
    <script src="../../backend/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../backend/dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../../backend/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../backend/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../backend/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    
    <script type="text/javascript" src="../../backend/js/sweetalert2@9.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="../../backend/js/reenvio.js"></script>


    <!-- Data Tables -->
    <script type="text/javascript" src="../../backend/js/datatable.js"></script>
    <script type="text/javascript" src="../../backend/js/datatablebuttons.js"></script>
    <script type="text/javascript" src="../../backend/js/jszip.js"></script>
    <script type="text/javascript" src="../../backend/js/pdfmake.js"></script>
    <script type="text/javascript" src="../../backend/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonshtml5.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonsprint.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>

</body>

</html>
<?php }else{ 
    header('Location: ./login.php');
 } ?>