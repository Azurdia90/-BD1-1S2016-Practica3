<!DOCTYPE HTML>
<html>
	<head>
		<title>Area Administrativa</title>
      	<meta charset="UTF-8">
		<title>Menu Desplegable</title>
		<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav {
				width: 600px; /*Le establecemos un ancho*/
				margin:0 auto; /*Centramos automaticamente*/
			}
 
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>
	</head>
	<body>
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="Area_Administrativa.php">Inicio</a></li>
					<li><a href="">Unidades Administrativas</a></li>
					<li><a href="">Empleados</a></li>
					<li><a href="">Puestos</a></li>
					<li><a href="Cursos.php">Cursos</a></li>
					<li><a href="">Cerrar Sesion</a></li>
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
	</body>
</html>