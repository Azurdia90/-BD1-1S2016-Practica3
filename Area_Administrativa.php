<!DOCTYPE HTML>
<html>
	<head>
		<title>Area Administrativa</title>
      	<meta charset="UTF-8">
		<title>Menu Desplegable</title>
		<?php session_start()?>
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
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
		<div id="tabla">
			<table>
				<tr>
					<td>
				 		Nombres:
					</td>
					<td>
						<?php
							echo $_SESSION['lastname'];
						?>
					</td>
				</tr>
				<tr>
					<td>
						Apellido:
					</td>
					<td>
						<?php
							echo $_SESSION['firstname'];
						?>
					</td>
				</tr>
				<tr>
					<td>
						Puesto:
					</td>
					<td>
						<?php
							echo $_SESSION['issues'];
						?>
					</td>
				</tr>
				<tr>
					<td>
						Area:
					</td>
					<td>
						<?php
							echo $_SESSION['area'];
						?>
					</td>
				</tr>
			</table>	
		</div>
	</body>
</html>