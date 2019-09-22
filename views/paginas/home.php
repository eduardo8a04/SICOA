<?php
    // require_once('../../conexion.php');
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
    }
    
?>

<?php include "../adminlte/head.php"; ?>
<title>SICOA</title>
<?php include "../adminlte/headFin.php"; ?>
    <!-- Agregar otros estilos -->

<link rel="stylesheet" href="../css/estilos.css">



<?php include "../adminlte/header.php"; ?>
<?php include "../adminlte/aside.php"; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="home.php"><i class="fa fa-link"></i> <span>Areas</span></a></li>
            <li><a href="guardaPrecautoria.php"><i class="fa fa-link"></i> <span>Tiempo de guarda precautoria</span></a></li>
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
    <div class="containerHome">
       
        <?php
            $mysqli = new mysqli("localhost","root","","sicoa");  // conecta mediante mysqli
            // <--- Obtiene todas las direcciones y las ordena segun su Id
            $query = "SELECT Id_direcciones, nombre FROM T_DIRECCIONES ORDER BY Id_direcciones";
            $resultado=$mysqli->query($query);

        ?>
        <?php while($row = $resultado->fetch_assoc()) { ?>

            <div class="card">
                <div class="cardTitulo">
                    <h4><?php echo $row['nombre']; ?></h4>
                </div>
                <div class="rowTableDC">
                    <?php if($row['nombre'] === $row['nombre']){ ?>
                        <table>
                        <?php 
                            $query2 = "SELECT nombre FROM T_COORDINACIONES WHERE id_direcciones = {$row['Id_direcciones']}"; 
                            $resultado2=$mysqli->query($query2);
                            while($row2 = $resultado2->fetch_assoc()) { ?>
                                    <tr>
                                        <td> <a href="expediente.php?coordinacionTitulo={$row2['nombre']}&variable2={${Id_coordinacion}"> <?php echo $row2['nombre']; ?></a></td>
                                    </tr>                           

                        <?php } ?>
                        </table> 
                    <?php  ;} ?>
                </div>
            </div>

        <?php } ?>
        <?php mysqli_close($mysqli); ?>
        
    </div>


<?php include "../adminlte/footer.php"; ?>