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
                                                class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                       
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
                        <h4 class="page-title">Panel administrativo</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../administrador/escritorio.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Panel administrativo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="container-fluid">
  <div class="col-div-3">
     
    <?php 
        $id=$_SESSION['id'];
        $sql = "SELECT SUM(prec) as total ,cust_serv.idcusser, customer.idcli, customer.nomcli, customer.apecli, customer.tele, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state FROM cust_serv INNER JOIN customer ON cust_serv.idcli = customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv where cust_serv.inicio = CURDATE() ";
        $result = $connect->query($sql); //$pdo sería el objeto conexión
        $total = $result->fetchColumn();

         ?>
    <div class="box">
      <p>S/<?php echo  $total; ?><br/><span> <strong>Ventas hoy</strong></span></p>
      <i class="fa fa-calendar box-icon-1"></i>
    </div>
  </div>
  
  <div class="col-div-3">
    <?php 
        $sql = "SELECT COUNT(*) total FROM suscrp";
        $result = $connect->query($sql); //$pdo sería el objeto conexión
        $total = $result->fetchColumn();

         ?>
    <div class="box">
      <p><?php echo  $total; ?><br/><span><strong>Productos</strong></span></p>
      <i class="fa fa-cube box-icon"></i>
    </div>
  </div>


    <div class="col-div-3">
    <?php 
        $sql = "SELECT COUNT(*) total FROM service";
        $result = $connect->query($sql); //$pdo sería el objeto conexión
        $total = $result->fetchColumn();

         ?>
    <div class="box">
      <p><?php echo  $total; ?><br/><span><strong>Servicios</strong></span></p>
      <i class="fa fa-id-card box-icon-3"></i>
    </div>
  </div>


  <div class="col-div-3">
    <?php 
        $sql = "SELECT COUNT(*) total FROM customer";
        $result = $connect->query($sql); //$pdo sería el objeto conexión
        $total = $result->fetchColumn();

         ?>
    <div class="box">
      <p><?php echo  $total; ?><br/><span><strong>Clientes</strong></span></p>
      <i class="fa fa-user box-icon-4"></i>
    </div>
  </div>

  


  <div class="clearfix"></div>

<div class="col-div-8">
    <div class="box-8">
        <div class="content-box">
         <p>Últimas suscripciones </p>
         <?php
$sentencia = $connect->prepare("SELECT cust_serv.idcusser,customer.idcli, customer.nomcli, customer.apecli, customer.tele, customer.corr, customer.usuario, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state, 
GROUP_CONCAT(suscrp.idsus, '..', suscrp.noms, '..', suscrp.foto, '..' SEPARATOR '__') AS suscrp FROM cust_serv INNER JOIN customer ON cust_serv.idcli= customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv INNER JOIN suscrp ON service.idsus = suscrp.idsus  GROUP BY cust_serv.idcusser DESC LIMIT 10;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
?>
<?php if(count($data)>0):?>
<table  id="example1">
                 <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cuenta</th>
      <th scope="col">Cliente</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $e):?>
      <tr>
          <td><?php echo  $e->idcusser; ?></td>
           <?php foreach(explode("__", $e->suscrp) as $suscrpConcatenados){ 
            $suscrp = explode("..", $suscrpConcatenados)
             ?>
            

            <td><?php echo $suscrp[1] ?> - <?php echo $e->nameserv ?></td>
        <?php } ?>
          
          <td><?php echo $e->nomcli ?> <?php echo $e->apecli ?></td>
          <td><?php echo $e->corr ?></td>
      </tr>
       <?php endforeach; ?>
  </tbody>    
               </table>
               <?php else:?>
    <div class="alert alert-warning" style="position: relative;
    margin-left: 705px;
    margin-top: 14px;
    margin-bottom: 0px;">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>    
        </div>
    </div>
</div>
<br>
<div class="col-div-4">
   <div class="box-4">
     <div class="content-box">
       <p>Productos</p>  

       <div id="piechart"></div>
     </div>  
   </div> 
</div>

    </div>

    <div class="container-fluid">
        <div class="col-div-8">
            <div class="box-8">
               <div class="content-box">
                  <p>Ventas  de hoy</p> 
                  <div id="comp_hoy"></div>
               </div> 
            </div>   
        </div>
<br>
        <div class="col-div-4">
            <div class="box-4">
               <div class="content-box">
                  <p>Suscripciones</p> 
                  <div id="sub_s"></div>
               </div> 
            </div>   
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
    <script type="text/javascript" src="../../backend/js/loader.js"></script>
 

       <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Productos', 'Hours per Day'],
          
          <?php
                   
        $stmt = $connect->prepare("SELECT suscrp.idsus, suscrp.noms, suscrp.descr, suscrp.foto, suscrp.status FROM suscrp");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($row = $stmt->fetch()) { 
            echo "['".$row['noms']."', ".$row['status']."],";
        }

            ?>
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
         <?php
   
        $stmt = $connect->prepare("SELECT SUM(prec) as total ,cust_serv.idcusser, customer.idcli, customer.nomcli, customer.apecli, customer.tele, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state FROM cust_serv INNER JOIN customer ON cust_serv.idcli = customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv where cust_serv.inicio = CURDATE()");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($row = $stmt->fetch()) { 
            echo "['".$row['inicio']."', ".$row['total']."],";
        }

            ?>
        ]);

        var options = {
        
          hAxis: {title: 'Fecha', minValue: 0, maxValue: 15},
          vAxis: {title: 'Monto', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('comp_hoy'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Productos', 'Hours per Day'],
          
          <?php
                   
        $stmt = $connect->prepare("SELECT cust_serv.idcusser,customer.idcli, customer.nomcli, customer.apecli, customer.tele, customer.corr, customer.usuario, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state, 
GROUP_CONCAT(suscrp.idsus, '..', suscrp.noms, '..', suscrp.foto, '..' SEPARATOR '__') AS suscrp FROM cust_serv INNER JOIN customer ON cust_serv.idcli= customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv INNER JOIN suscrp ON service.idsus = suscrp.idsus  GROUP BY cust_serv.idcusser");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($t = $stmt->fetch()) { 
            echo "['".$t['nameserv']."', ".$t['idcusser']."],";
        }

            ?>
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('sub_s'));

        chart.draw(data, options);
      }
    </script>


    
</body>

</html>
<?php }else{ 
    header('Location: ./login.php');
 } ?>