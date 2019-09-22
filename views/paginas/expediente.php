<?php
    require_once('../../conexion.php');
    $db=DB::conectar();

	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>
<?php include "../adminlte/head.php"; ?>
<title>SIOA - Expediente</title>
<?php include "../adminlte/headFin.php"; ?>
<link rel="stylesheet" href="../css/estilos.css">
<script lenguage="javascript" src="../js/jquery-3.3.1.min.js"></script>
<?php include "../adminlte/header.php"; ?>
<?php include "../adminlte/aside.php"; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview active" ><a href="home.php"><i class="fa fa-copy"></i> <span>Areas</span></a></li>
            <li ><a href="guardaPrecautoria.php"><i class="fa fa-link"></i> <span>Tiempo de guarda precautoria</span></a></li>
            <li >
                <a href="#"><i class="fa fa-file-text-o"></i> <span>Crear</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="crearExpediente.php">Expediente</a></li>
                    <li><a href="crearDireccion.php">Dirección</a></li>
                    <li class="active"><a href="crearCoordinacion.php">Coordinación</a></li>
                </ul>
            </li>
        </ul>
<?php include "../adminlte/content.php"; ?>
    <!--------------------------
    | Your Page Content Here |
    -------------------------->
        
    <?php
        echo "Variable $saludo: $HTTP_GET_VARS["saludo"] <br>n";
        echo "Variable $texto: $HTTP_GET_VARS["texto"] <br>n"
    ?>
      
    
    
    

        
<?php include "../adminlte/footer.php"; ?>
