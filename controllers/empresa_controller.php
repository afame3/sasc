<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

require_once("models/empresa.entidad.php");
require_once("models/empresa_model.php");

$emp=new Empresa();
$model= new EmpresaModel();

// Logica

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$emp->__SET('idempresa',             $_REQUEST['idempresa']);
			$emp->__SET('numero_empresa',        $_REQUEST['numero_empresa']);
			$emp->__SET('razon_social',        $_REQUEST['razon_social']);
			$emp->__SET('ruc',        $_REQUEST['ruc']);
			$emp->__SET('estado_empresa',        $_REQUEST['estado_empresa']);
			$emp->__SET('direccion_empresa',        $_REQUEST['direccion_empresa']);
			$emp->__SET('telefono_empresa',        $_REQUEST['telefono_empresa']);
			
			$model->Actualizar($emp);
			header('Location: lis_empleado.php');
			break;

		case 'registrar':
			$emp->__SET('empresa_numero',        $_REQUEST['empresa_numero']);
			$emp->__SET('empresa_razon_social',        $_REQUEST['empresa_razon_social']);
			$emp->__SET('empresa_ruc',        $_REQUEST['empresa_ruc']);
			$emp->__SET('empresa_estado',        $_REQUEST['empresa_estado']);
			$emp->__SET('empresa_direccion',        $_REQUEST['empresa_direccion']);
			$emp->__SET('empresa_telefono',        $_REQUEST['empresa_telefono']);
			$emp->__SET('empresa_contacto',        $_REQUEST['empresa_contacto']);
			$emp->__SET('empresa_correo',        $_REQUEST['empresa_correo']);
			
			$model->Registrar($emp);
			header('Location: list_cotizacion.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idempresa']);
			header('Location: index.php');
			break;

		case 'editar':
			$emp= $model->Obtener($_REQUEST['idempresa']);
			break;
	}
}
require_once("views/new_empresa_view.phtml");
?>