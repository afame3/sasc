<?php
//require_once('function.php');
require_once('funciones.php');
?>
<html>
<head>


</head>
<body>

<form name="fomul"> 
Valoración sobre este web: 
<select name="miSelect"> 
	<option value="10">Muy bien 
	<option value="5" selected>Regular 
	<option value="0">Muy mal 
</select>
<input type=button value="valor" onclick="retornarFecha()"> 
</form>
<script type="text/javascript">
  document.write('La fecha de hoy es:'+retornarFecha());
  document.write('<br>');
  document.write('La hora es:'+retornarHora());
  document.write('<br>');
  document.write('La fecha de hoy es:'+valor());
</script>

</body>
</html>