<!DOCTYPE HTML>
<html>
	<head>
		<?php 	
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
			session_start();
			$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
			if ($conexion->connect_errno) {
    			echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
			}
		?>	
		<title>Cursos</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
		<!--INICIANDO EL BLOQUE DEL MENU-->
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="Area_Administrativa.php">Inicio</a></li>
					<li><a href="Unidades.php">Unidades Administrativas</a></li>
					<li><a href="Empleados.php">Empleados</a></li>
					<li><a href="Puestos.php">Puestos</a></li>
					<li><a href="Cursos.php">Cursos</a></li>
					<li><a href="Cerrar_Sesion.php">Cerrar Sesion</a></li>
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
		<!--FINALIZANDO EL BLOQUE DEL MENU-->
		<br/>
		<!--INICIANDO EL BLOQUE DE BUSQUEDA-->
		<div id= "area_busqueda">
			<form action="Cursos.php" method="post">
				<label for="lb_buscar">Codigo Curso</label>
				<input type="text" name="in_key_curso">
				<input type="submit" value="Buscar">
			</form>
		</div>
		<!--FINALINZADO EL BLOQUE DE BUSQUEDA-->
		<br/>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->
		<div id="formulario">
			<form action="CRUD_Cursos.php" method="post">
				<?php
					if($_POST){
						$cod = $_POST["in_key_curso"];
						if (!($resultado = $conexion->query("CALL ReadCurso($cod, @nombre, @carrera, @salon, @catedratico, @lab, @cupo, @horario, @cod_unidad, @seccion)"))) {
    						header("Location: Cursos.php");
						}else{
							$resultado = $conexion->query("SELECT @nombre");
							$r_name = $resultado->fetch_assoc();
							$nombre = $r_name["@nombre"];
							$resultado = $conexion->query("SELECT @carrera");
							$r_carrera = $resultado->fetch_assoc();
							$carrera= $r_carrera["@carrera"];
							$resultado = $conexion->query("SELECT @salon");
							$r_salon = $resultado->fetch_assoc();
							$salon = $r_salon["@salon"];
							$resultado = $conexion->query("SELECT @catedratico");
							$r_catedratico = $resultado->fetch_assoc();
							$catedratico = $r_catedratico["@catedratico"];
							$resultado = $conexion->query("SELECT @lab");
							$r_lab = $resultado->fetch_assoc();
							$lab = $r_lab["@lab"];
							$resultado = $conexion->query("SELECT @cupo");
							$r_cupo = $resultado->fetch_assoc();
							$cupo = $r_cupo["@cupo"];	
							$resultado = $conexion->query("SELECT @horario");
							$r_horario = $resultado->fetch_assoc();
							$horario = $r_horario["@horario"];
							$resultado = $conexion->query("SELECT @cod_unidad");
							$r_unidad = $resultado->fetch_assoc();
							$cod_unidad = $r_unidad["@cod_unidad"];
							$resultado = $conexion->query("SELECT @seccion");
							$r_seccion = $resultado->fetch_assoc();
							$seccion = $r_seccion["@seccion"];					
				?>	
				<label for="lb_codigo">Codigo Curso</label>
				<input type="text" name="in_key_curso2" value="<?= $cod?>">
				<label for="lb_lab">Laboratorio</label>
				<input type="text" name="in_lab" value="<?= $lab?>">
				<br/>
				<label for="lb_nombre">Nombre Curso</label>
				<input type="text" name="in_nombre" value="<?= $nombre?>">
				<label for="lb_cupo">Cupo</label>
				<input type="text" name="in_cupo" value="<?= $cupo?>">
				<br/>
				<label for="lb_carrera">Carrera</label>
				<input type="text" name="in_carrera" value="<?= $carrera?>">
				<label for="lb_horario">Horario</label>
				<input type="text" name="in_horario" value="<?= $horario?>"> 
				<br/>
				<label for="lb_key_build">Salon</label>
				<input name="in_salon" value ="<?= $salon?>">
				<label for="lb_unidad">Unidad</label>
				<input name="in_unidad" value="<?= $cod_unidad?>">
				<br/>
				<label for="lb_catedratico">Catedratico</label>
				<input name="in_catedratico" value="<?= $catedratico?>">
				<label for="lb_seccion">Seccion</label>
				<input name="in_seccion" value="<?= $seccion?>">
				<?php
						}
					}else{
				?>
				<label for="lb_codigo">Codigo Curso</label>
				<input type="text" name="in_key_curso2">
				<label for="lb_lab">Laboratorio</label>
				<input type="text" name="in_lab">
				<br/>
				<label for="lb_nombre">Nombre Curso</label>
				<input type="text" name="in_curso">
				<label for="lb_cupo">Cupo</label>
				<input type="text" name="in_cupo">
				<br/>
				<label for="lb_carrera">Carrera</label>
				<input type="text" name="in_carrera">
				<label for="lb_horario">Horario</label>
				<input type="text" name="in_horario"> 
				<br/>
				<label for="lb_key_build">Salon</label>
				<input name="in_salon" >
				<label for="lb_unidad">Unidad</label>
				<input name="in_unidad" >
				<br/>
				<label for="lb_catedratico">Catedratico</label>
				<input name="in_catedratico" >
				<label for="lb_seccion">Seccion</label>
				<input name="in_seccion" >
				<?php
					}
				?>
				<br/>
				<select name="sl_cur">
					<option value=1>Crear</option>
					<option value=2>Modificar</option>
					<option value=3>Eliminar</option>
				</select>
				<input type="submit" value="Realizar">
			</form>
		</div>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->	
	</body>
</html>