<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>
<?php include "../adminlte/head.php"; ?>
<title>SICOA - Expediente</title>
<?php include "../adminlte/headFin.php"; ?>
<link rel="stylesheet" href="../css/estilos.css">

<?php include "../adminlte/header.php"; ?>
<?php include "../adminlte/aside.php"; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="home.php"><i class="fa fa-link"></i> <span>Areas</span></a></li>
            <li ><a href="guardaPrecautoria.php"><i class="fa fa-link"></i> <span>Tiempo de guarda precautoria</span></a></li>
            <li class="treeview active" >
                <a href="#"><i class="fa fa-link"></i> <span>Crear</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="crearExpediente.php">Expediente</a></li>
                    <li><a href="crearDireccion.php">Dirección</a></li>
                    <li><a href="crearCoordinacion.php">Coordinación</a></li>
                </ul>
            </li>
        </ul>
<?php include "../adminlte/content.php"; ?>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <Div class="tituloExpe">
            <h2>Crear Coordinación</h2>
        
            <form class="form1Expe" action="" method="POST">
                <div>
                    <!-- <---- Sele asigna el "class=DCselect" para que se vincule con el id de la direccion -->
                    <select class="ExpeSelect" name="direcc">
                        <option value="0" disabled selected>Selecciona una Dirección :</option>
                        <?php
                            $mysqli = new mysqli("localhost","root","","sicoa");  // conecta mediante mysqli
                            // <--- Obtiene todas las direcciones y las ordena segun su Id
                            $query = "SELECT Id_direcciones, nombre FROM t_direcciones ORDER BY Id_direcciones"; 
                            $resultado=$mysqli->query($query);
                        ?>
                        <?php while($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['Id_direcciones']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                        <?php mysqli_close($mysqli); ?>
                    </select>
                </div>           

                <button id="b1231" name="enviarCoordinacion">Aceptar</button>
            </form>
        </Div>
    </div>


        
<?php include "../adminlte/footer.php"; ?>
