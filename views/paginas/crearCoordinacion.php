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
                    <li><a href="crearDireccion.php">Dirección</a></li>
                    <li class="active"><a href="crearCoordinacion.php">Coordinación</a></li>
                </ul>
            </li>
        </ul>
<?php include "../adminlte/content.php"; ?>
    <!--------------------------
    | Your Page Content Here |
    -------------------------->
    <!-- Coneccion a la DB para agregar direccion o coordinacion -->
<?php   

    if (isset($_POST['enviarCoordinacion'])) {
        $coordinacion = $_POST["coordi"];
        $direccion2 = $_POST["direcc"];

        // Verifica si el nombre de la coordinacion ya existe en la base de datos
        $select=$db->prepare('SELECT * FROM T_COORDINACIONES WHERE nombre=:nombre');
        $select->bindValue('nombre',$coordinacion);
        $select->execute();
        $registro=$select->fetch();

        if($registro['nombre']!=NULL){
            $usado=False;
        }else{
            $usado=True;
        }	
        $very = $usado;
        // Fin Verificacion
        
        // inserta coordinacion o envia aviso por si la coordinacion ya existe
        if ($very != True) {
            # code...
            echo 'La Coordinacion ya existe';
        } else {
            // Inserta Coordinacion
            $db->query("INSERT INTO T_COORDINACIONES VALUES ('','$direccion2','$coordinacion')");
            $db = null;
        }       
    }

?>
        
    <Div class="titulo12">
            <h2>Crear Coordinación</h2>
        
        <form class="form1" action="" method="POST">
            <div>
                <!-- <---- Sele asigna el "class=DCselect" para que se vincule con el id de la direccion -->
                <select class="DCselect" name="direcc">
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

            <label for="firstName" class="first-name">Coordinación</label>
            <input id="firstName" type="text" name="coordi"> 

            <button id="b1231" name="enviarCoordinacion">Aceptar</button>
        </form>
        </Div>
    </div>
      
    
    
    

        
<?php include "../adminlte/footer.php"; ?>
