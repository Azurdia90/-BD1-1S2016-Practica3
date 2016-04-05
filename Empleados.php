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
		<title>Empleados</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
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
		<br/>
		<div id="area_busqueda">
			<form action="Empleados.php" method="post">
				<label for="lb_buscar">Codigo Empleado</label>
				<input type="text" name="in_key_employed">
				<input type="submit" value="Buscar">
			</form>
		</div>
		<br/>
		<div id="formulario">
			<form action="CRUD_Empleados.php" method="post">
				<?php
					if($_POST){
						$cod = $_POST["in_key_employed"];
						if (!($resultado = $conexion->query("CALL ReadEmpleado($cod, @name, @apellido, @birth_date, @start_date, @position, @unit)"))) {
    						header("Location: Empleados.php");
						}else{
							$resultado = $conexion->query("SELECT @name");
							$r_name = $resultado->fetch_assoc();
							$name = $r_name["@name"];
							$resultado = $conexion->query("SELECT @apellido");
							$r_apellido = $resultado->fetch_assoc();
							$apellido= $r_apellido["@apellido"];
							$resultado = $conexion->query("SELECT @birth_date");
							$r_birth_date = $resultado->fetch_assoc();
							$birth_date = $r_birth_date["@birth_date"];
							$resultado = $conexion->query("SELECT @start_date");
							$r_start_date = $resultado->fetch_assoc();
							$start_date = $r_start_date["@start_date"];
							$resultado = $conexion->query("SELECT @position");
							$r_position = $resultado->fetch_assoc();
							$position = $r_position["@position"];
							$resultado = $conexion->query("SELECT @unit");
							$r_unit = $resultado->fetch_assoc();
							$unit = $r_unit["@unit"];	
				?>	
				<label for="lb_codigo">Codigo Empleado</label>
				<input type="text" name="in_key_employed2" value="<?= $cod ?>">
				<label for="lb_puesto">Puesto</label>
				<input type="text" name="in_puesto" value="<?= $position ?>">
				<br/>
				<label for="lb_nombre">Nombre</label>
				<input type="text" name="in_lastnam_employed" value="<?= $name ?>">
				<label for="lb_apellido">Apellido</label>
				<input type="text" name="in_firstnam_employed" value="<?= $apellido ?>">
				<br/>
				<label for="lb_birth_date">Fecha Nacimiento</label>
				<input type="text" name="in_birth_date" value="<?= $birth_date ?>">
				<label for="lb_start_date">Fecha Inicio</label>
				<input type="text" name="in_start_date" value="<?= $start_date ?>">
				<br/>
				<label for="lb_unidad">Unidad</label>
				<input type="text" name="in_unidad" value="<?= $unit ?>">
			<?php
					}
				}else{
			?>
				<label for="lb_codigo">Codigo Empleado</label>
				<input type="text" name="in_key_employed2" >
				<label for="lb_puesto">Puesto</label>
				<input type="text" name="in_puesto" >
				<br/>
				<label for="lb_nombre">Nombre</label>
				<input type="text" name="in_lastnam_employed" >
				<label for="lb_apellido">Apellido</label>
				<input type="text" name="in_firstnam_employed">
				<br/>
				<label for="lb_birth_date">Fecha Nacimiento</label>
				<input type="text" name="in_birth_date">
				<label for="lb_start_date">Fecha Inicio</label>
				<input type="text" name="in_start_date">
				<br/>
				<label for="lb_unidad">Unidad</label>
				<input type="text" name="in_unidad">
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