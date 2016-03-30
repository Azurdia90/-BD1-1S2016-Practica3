<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$usuario = $_POST["in_user"];
	$password = $_POST["in_pass"];
	$conexion = mysql_connect("localhost","Practicas_Bases","Practica34") or die('No se pudo conectar: '.mysql_error());
	mysql_select_db("Practica3_201020331")or die('No se pudo encontrar la Base de datos: ' .mysql_error());

	if(empty($usuario) ){
		header("Location: index.html");
	}else{
		$query = "SELECT nombre, apellidos FROM Usuarios WHERE id = $usuario AND pass ='$password'";
		$datos = mysql_query($query) or die('Consulta fallo: '.mysql_error());	
		if(mysql_num_rows($datos) > 0)
		{
			$info = mysql_fetch_array($datos);	
			setcookie("usuario","$info[0] $info[1]",time() + 3600);
			//mysql_close();
			header("Location: Area_Administrativa.php");
		}		
		else
		{
			header("Location: index.html");
		}
	} 
	mysql_close();
?>