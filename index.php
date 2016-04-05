<!DOCTYPE HTML>
<html lang="es">
  <head>
      <?php
        $conexion = mysql_connect("localhost","Practicas_Bases","Practica34") or die('No se pudo conectar: '.mysql_error());
        mysql_select_db("Practicas_Bases1")or die('No se pudo encontrar la Base de datos: ' .mysql_error()); 
      ?>
      <title>Inicio</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="Style/estilo2.css">
  </head>
  <body>
    <div id="titulo">
      <h1>FACULTAD DE INGENIERIA</h1>
    </div>
    <div id="inicio"> 
      <form action = "login.php" method = "post">
        <label for="lbl_usuario">
          Usuario   
        </label>
        <input type="text" name = "in_user">
        <br>
        <label for="lbl_usuario">
          Contraseña  
        </label>
        <input type = "password" name = "in_pass">
        <br>
        <label for="lbl_usuario">
          Grupo 
        </label>
        <?php
          $query = "SELECT cod_tipo,nombre FROM Tipo_Usuario";
          $resultado = mysql_query($query) or die('Consulta fallo: '.mysql_error());  
        ?>
        <select name ="sl_grupo">
          <?php
            while($fila = mysql_fetch_array($resultado)){
              echo "<option value = $fila[0]> $fila[1]</option> \n";
            }
            mysql_free_result($resultado);
            mysql_close();
          ?>
        </select>
        <br/>
        <input type="submit" value="Entrar">
      </form>
    </div>
  </body>
</html>