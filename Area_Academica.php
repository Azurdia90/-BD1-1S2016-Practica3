<!DOCTYPE HTML>
<html>
	<head>
		<?php session_start();?>
		<title>Area Academica</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
		<!--INICIANDO EL BLOQUE DEL MENU-->
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="Area_Academica.php">Inicio</a></li>
					<li><a href="Asignacion.php">Asignaciones</a></li>
					<li><a href="Notas.php">Notas</a></li>
					<li><a href="Catedraticos.php">Catedraticos</a></li>
					<li><a href="Cerrar_Sesion.php">Cerrar Sesion</a></li>
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
		<!--FINALIZANDO EL BLOQUE DEL MENU-->
		<br/>
		<!--INICIANDO EL BLOQUE DEL TITULO-->
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
						Area:
					</td>
					<td>
						<?php
							echo $_SESSION['issues'];
						?>
					</td>
				</tr>
				<tr>
					<td>
						Carrera:
					</td>
					<td>
						<?php
							echo $_SESSION['area'];
						?>
					</td>
				</tr>
			</table>	
		</div>
		<!--FINALIZANDO EL BLOQUE DEL TITULO-->
	</body>
</html>