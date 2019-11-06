<?php
session_start();
if(!isset($_SESSION["idusuario"]) || $_SESSION["idusuario"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<html lang="en">
	<head>
		<title>.: HAV :.</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php include "views/navbar.phtml"; ?>
<div class="container">

	<div class="col-md-12">
			<h2>BIENVENIDO</h2>
			<!--p class="lead">El Equipo de Herramientas, Automatización y Virtualización les da la BIENVENIDA.</p-->
			<p>En esta web usted encontrará:</p>
			<!--p>Objetivos:</p-->
			<ol>
				<li><b>Equipo GSE:</b> SN/ST creados por automatización.</li>
				<li><b>Equipo CDS y Proveedores:</b> Calculadora de estimaciones con automatización.</li>
				<li><b>Equipo HAV:</b> Administración de Estados, Parámetros y Usuarios.</li>
			</ol>
			<br>
			<ul type="none">
			<li><i class="glyphicon glyphicon-ok"></i> Ideal para el seguimiento</li>
			<li><i class="glyphicon glyphicon-ok"></i> Versión compatible con Google Chrome</li>
			</ul>

	</div>
</div>
</div>
	</body>
</html>