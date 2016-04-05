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
		<title>Area Administrativa</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
		<!-- Aqui estamos iniciando la nueva etiqueta nav -->
		<div id="header">
			<nav>
				<ul class="nav">
					<li><a href="Area_Administrativa.php">Inicio</a></li>
					<li><a href="Unidades.php">Unidades Administrativas</a></li>
					<li><a href="Empleados.php">Empleados</a></li>
					<li><a href="Puestos.php">Puestos</a></li>
					<li><a href="Cursos.php">Cursos</a></li>
					<li><a href="Cerrar_Sesion.php">Cerrar Sesion</a></li>
				</ul>
			</nav>
		</div>
		<!--FINALIZANDO EL BLOQUE DEL MENU-->
		<br/>
		<!--INICIANDO EL BLOQUE DE BUSQUEDA-->
		<div id="area_busqueda">
			<form action="Unidades.php" method="post">
				<label for="lb_buscar">Codigo Unidad</label>
				<input type="text" name="in_key_unidad">
				<input type="submit" value="Buscar">
			</form>
		</div>
		<!--FINALINZADO EL BLOQUE DE BUSQUEDA-->
		<br/>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->
		<div id="formulario">
			<form action="CRUD_Unidades.php" method="post">
				<?php
					if($_POST){
						$cod = $_POST["in_key_unidad"];
						if (!($resultado = $conexion->query("CALL ReadUnidad($cod, @nombre, @director, @fecha, @open, @close, @type, @build)"))) {
    						header("Location: Unidades.php");
						}else{
							$resultado = $conexion->query("SELECT @nombre");
							$r_name = $resultado->fetch_assoc();
							$name = $r_name["@nombre"];
							$resultado = $conexion->query("SELECT @director");
							$r_director = $resultado->fetch_assoc();
							$director= $r_director["@director"];
							$resultado = $conexion->query("SELECT @fecha");
							$r_date = $resultado->fetch_assoc();
							$date = $r_date["@fecha"];
							$resultado = $conexion->query("SELECT @open");
							$r_open = $resultado->fetch_assoc();
							$open = $r_open["@open"];
							$resultado = $conexion->query("SELECT @close");
							$r_close = $resultado->fetch_assoc();
							$close = $r_close["@close"];
							$resultado = $conexion->query("SELECT @type");
							$r_type = $resultado->fetch_assoc();
							$type = $r_type["@type"];	
							$resultado = $conexion->query("SELECT @build");
							$r_build = $resultado->fetch_assoc();
							$build = $r_build["@build"];
						?>	
							<label for="lb_codigo">Codigo Unidad</label>
							<input type="text" name="in_key_unidad2" value="<?= $cod ?>">
		    				<label for="lb_tipo_unidad">Tipo Unidad</label>
							<input type="text" name="in_tipo_unidad" value="<?= $type ?>">
							<br/>
							<label for="lb_nombre">Nombre</label>
							<input type="text" name="in_nam_unidad" value="<?= $name?>">
							<label for="lb_edificio">Edificio</label>
							<input type="text" name="in_build" value="<?= $build?>" >
							</select>
							<br/>
							<label for="lb_date_fundation">Fecha Fundacion</label>
							<input type="text" name="in_date_fundation" value="<?= $date?>">
							<label for="lb_encargado">Encargado</label>
							<input type="text" name="in_encargado" value="<?= $director?>">
							</select>
							<br/>
							<label for="lb_hour_begin">Hora Inicio</label>
							<input type="text" name="in_hour_begin" value="<?= $open?>">
							<label for="lb_hour_finish">Hora Final</label>
							<input type="text" name="in_hour_finish" value="<?= $close?>">	
						<?php		
						}	
					}else{
						?>
						<label for="lb_codigo">Codigo Unidad</label>
							<input type="text" name="in_key_unidad2">
		    				<label for="lb_tipo_unidad">Tipo Unidad</label>
							<input type="text" name="in_tipo_unidad">
							</select>
							<br/>
							<label for="lb_nombre">Nombre</label>
							<input type="text" name="in_nam_unidad">
							<label for="lb_edificio">Edificio</label>
							<input type="text" name="in_build">
							</select>
							<br/>
							<label for="lb_date_fundation">Fecha Fundacion</label>
							<input type="text" name="in_date_fundation">
							<label for="lb_encargado">Encargado</label>
							<input type="text" name="in_encargado">
							</select>
							<br/>
							<label for="lb_hour_begin">Hora Inicio</label>
							<input type="text" name="in_hour_begin">
							<label for="lb_hour_finish">Hora Final</label>
							<input type="text" name="in_hour_finish">'
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
	</body>
</html>