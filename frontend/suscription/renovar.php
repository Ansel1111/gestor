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
                        <h4 class="page-title">Clientes</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../administrador/escritorio.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="../customers/mostrar.php">Clientes</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Renovar suscripcion del cliente</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container-fluid">
           
          <div class="row">
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
        <?php foreach($data as $f):?>
           <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../../backend/img/subidas/<?php echo  $f->foto; ?>"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $f->nombre ?> </h4>
                                    <h6 class="card-subtitle"><?php echo $f->usuario ?></h6>
                                    

                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Correo electrónico </small>
                                <h6><?php echo $f->correo ?></h6> <small class="text-muted p-t-30 db">Telefono</small>
                                <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                                 <small class="text-muted p-t-30 db">Social Profile</small>
                                <br />
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
            </div>

<?php endforeach; ?>
  
    <?php else:?>
        
<div class="alert alert-warning" style="position: relative;
    margin-top: 14px;
    margin-bottom: 0px;">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>

                <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <?php 
 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT cust_serv.idcusser, customer.idcli, customer.nomcli, customer.apecli, customer.tele, customer.corr, customer.usuario, service.idserv, service.nameserv, service.prec, service.cont, cust_serv.inicio, cust_serv.fin, cust_serv.state, 
GROUP_CONCAT(suscrp.idsus, '..', suscrp.noms, '..' SEPARATOR '__') AS suscrp FROM cust_serv INNER JOIN customer ON cust_serv.idcli= customer.idcli INNER JOIN service ON cust_serv.idserv = service.idserv INNER JOIN suscrp ON service.idsus = suscrp.idsus  WHERE cust_serv.idcusser= '$id' GROUP BY cust_serv.idcusser;");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $d):?>
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" enctype="multipart/form-data" method="POST"  autocomplete="off">
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre</label>
                                        <div class="col-md-12">
                                            <input type="text" readonly value="<?php echo $d->nomcli ?>" name="txtnomc"  placeholder="ejm: merlin"
                                                class="form-control form-control-line">
                                               <input type="hidden" name="cusid" value="<?php echo $d->idcli ?>">
                                               <input type="hidden" name="cuscid" value="<?php echo $d->idcusser  ?>">
                                               <input type="hidden" name="renosrv" value="1">
                                             
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Apellido</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $d->apecli ?>" name="txtapec" readonly placeholder="ejm: rojas"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Correo electronico<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="email" required  name="txtcorrc" value="<?php echo $d->corr ?>" placeholder="ejm: rojas@gmail.com"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Nombre de usuario<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text"  name="txtuser" value="<?php echo $d->usuario ?>" required placeholder="ejm: rojas01"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label class="col-sm-12">Planes<span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                           
                                        <select name="txtplanc" class="form-select shadow-none form-control-line">
                                              
                                                <option value="<?php echo $d->idserv ?>">
                                                    <?php echo $d->nameserv ?> - 

                                                    <?php foreach(explode("__", $d->suscrp) as $suscrpConcatenados){ 
                                $suscrp = explode("..", $suscrpConcatenados)
                                ?>
                                                
                                                    <?php echo $suscrp[1] ?>
                                <?php } ?>                        
                                                    </option>
                                                    <option>------------------Seleccione el plan--------------------</option>
                                                    <?php
               $stmt = $connect->prepare('SELECT service.idserv, suscrp.idsus, suscrp.noms, suscrp.descr, suscrp.foto, service.nameserv, service.prec, service.cont, service.state FROM service INNER JOIN suscrp ON service.idsus = suscrp.idsus'); 
                $stmt->execute();

                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
             {
                 extract($row);
                 ?>
                 <option value="<?php echo $idserv ; ?>"><?php echo $noms; ?> - <?php echo $nameserv; ?></option>
                 <?php
             }
                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Fecha de inicio<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="date" id="fechaActual" name="txtinic" readonly 
                                                class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Fecha de vencimiento<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="date" value="<?php echo $d->fin ?>" id="fechad" name="txtfecv" required
                                                class="form-control form-control-line">
                                        </div>
                                    </div>

                                   
                                   <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name='stupdrecustservct' class="btn btn-success text-white">Actualizar</button>
                                           
                                            <a class="btn btn-danger text-white" href="../customers/mostrar.php">Cancelar</a>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <?php endforeach; ?>
  
    <?php else:?>
        
<div class="alert alert-warning">
            <strong>No hay datos!</strong>
        </div>
    <?php endif; ?>
                        </div>
                    </div>
                    <!-- Column -->   
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
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <?php
    include_once '../../backend/php/upd_stcustrenservc.php'
?>
    <script>
        // Obtener fecha actual
let fecha = new Date();
// Agregar 3 días falta
fecha.setDate(fecha.getDate() + 0);
// Obtener cadena en formato yyyy-mm-dd, eliminando zona y hora
let fechaMin = fecha.toISOString().split('T')[0];
// Asignar valor mínimo
document.querySelector('#fechad').min = fechaMin;        
        </script>
        <script type="text/javascript">
            window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
        </script>
</body>

</html>
<?php }else{ 
    header('Location: ./login.php');
 } ?>