<?php
require_once('funciones.php');
require_once('function.php');
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
<input type=button value="Dime propiedades" onclick="dimePropiedades()"> 

  <?php 
  $fecha='<script type="text/javascript">document.write(retornarFecha())';
  echo $fecha;
  echo '</script><br/>';
  $hora='<script type="text/javascript">document.write(retornarHora())';
  echo $hora;
  echo '</script>';
  $hora='<script type="text/javascript">dimePropiedades()';
  echo '</script>';
  ?>


</body>
</html>