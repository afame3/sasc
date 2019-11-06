<?php
require_once('funciones.php');
?>
<html>
<head>
<title>Problema</title>
</head>
<body>
<form name="fomul"> 
Valoración sobre este web: 
<select name="miSelect"> 
<option value="10">Muy bien 
<option value="5" selected>Regular 
<option value="0">Muy mal 
</select> 

<script type="text/javascript">
  document.write('La fecha de hoy es:'+retornarFecha());
  document.write('<br>');
  document.write('La hora es:'+retornarHora());
</script>

</body>
</html>