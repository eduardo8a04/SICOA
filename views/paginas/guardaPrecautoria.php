<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>
<?php include "../adminlte/head.php"; ?>
<title>SICOA - Guarda</title>
<?php include "../adminlte/headFin.php"; ?>

<?php include "../adminlte/header.php"; ?>
<?php include "../adminlte/aside.php"; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="home.php"><i class="fa fa-link"></i> <span>Areas</span></a></li>
            <li class="active"><a href="guardaPrecautoria.php"><i class="fa fa-link"></i> <span>Tiempo de guarda precautoria</span></a></li>
            <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Crear</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="crearExpediente.php">Expediente</a></li>
                <li><a href="crearDireccion.php">Dirección</a></li>
                <li><a href="crearCoordinacion.php">Coordinación</a></li>
            </ul>
            </li>
        </ul>
<?php include "../adminlte/content.php"; ?>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
<?php include "../adminlte/footer.php"; ?>
