<?php

require_once("models/usuario.entidad.php");
require_once("models/usuario_model.php");

// Logica
$usu = new Usuario();
$model = new UsuarioModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$usu->__SET('idusuario',             $_REQUEST['idusuario']);
			$usu->__SET('matricula',        $_REQUEST['matricula']);
			$usu->__SET('nombre_usuario',        $_REQUEST['nombre_usuario']);
			$usu->__SET('clave',        $_REQUEST['clave']);
			$usu->__SET('correo',        $_REQUEST['correo']);
			$usu->__SET('estado',        $_REQUEST['estado']);
			$usu->__SET('fecha_alta',        $_REQUEST['fecha_alta']);
			$usu->__SET('idproveedor',        $_REQUEST['idproveedor']);

			$model->Actualizar($usu);
			header('Location: index.php');
			break;

		case 'registrar':
			$usu->__SET('matricula',        $_REQUEST['matricula']);
			$usu->__SET('nombre_usuario',        $_REQUEST['nombre_usuario']);
			$usu->__SET('clave',        $_REQUEST['clave']);
			$usu->__SET('correo',        $_REQUEST['correo']);
			$usu->__SET('estado',        $_REQUEST['estado']);
			$usu->__SET('fecha_alta',        $_REQUEST['fecha_alta']);
			$usu->__SET('idproveedor',        $_REQUEST['idproveedor']);


			$model->Registrar($usu);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idusuario']);
			header('Location: index.php');
			break;

		case 'editar':
			$usu= $model->Obtener($_REQUEST['idusuario']);
			break;
			
		case 'login':
			$usu= $model->Login($usu);
			header('Location: home.php');
			break;

	}
}
require_once("views/login_view.phtml");
?>