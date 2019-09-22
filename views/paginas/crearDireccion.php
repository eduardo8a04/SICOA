<?php
    require_once('../../conexion.php');
    $db=DB::conectar();

	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>
<?php include "../adminlte/head.php"; ?>
<title>SIOA - Areas</title>
<?php include "../adminlte/headFin.php"; ?>
<link rel="stylesheet" href="../css/estilos.css">
<script lenguage="javascript" src="../js/jquery-3.3.1.min.js"></script>
<?php include "../adminlte/header.php"; ?>
<?php include "../adminlte/aside.php"; ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="home.php"><i class="fa fa-copy"></i> <span>Areas</span></a></li>
            <li ><a href="guardaPrecautoria.php"><i class="fa fa-link"></i> <span>Tiempo de guarda precautoria</span></a></li>
            <li class="treeview active" >
                <a href="#"><i class="fa fa-file-text-o"></i> <span>Crear</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="crearExpediente.php">Expediente</a></li>
                    <li class="active"><a href="crearDireccion.php">Dirección</a></li>
                    <li><a href="crearCoordinacion.php">Coordinación</a></li>

                </ul>
            </li>
        </ul>
<?php include "../adminlte/content.php"; ?>
    <!--------------------------
    | Your Page Content Here |
    -------------------------->
    <!-- Coneccion a la DB para agregar direccion o coordinacion -->
    <?php   

        if (isset($_POST['enviarDireccion'])) {
            $direccion = $_POST["direc"];

            
			$select=$db->prepare('SELECT * FROM T_DIRECCIONES WHERE nombre=:nombre');
			$select->bindValue('nombre',$direccion);
			$select->execute();
			$registro=$select->fetch();
			if($registro['nombre']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
            $very = $usado;
            
            
            if ($very != True) {
                # code...
                echo 'La direccion ya existe';
            } else {
                $db->query("INSERT INTO t_direcciones VALUES ('','$direccion')");
                $db = null;
            }       
        }

    ?>
    
    <div>
        <div class="titulo12">
            <h2>Crear Dirección</h2>
        
            <form class="form1" action="" method="POST">
                <label for="firstName" class="first-name">Dirección</label>
                <input required="" type="text" name="direc">

                <button id="b1231" name="enviarDireccion">Aceptar</button>
            </form>
        </div>
    </div>
        
<?php include "../adminlte/footer.php"; ?>
