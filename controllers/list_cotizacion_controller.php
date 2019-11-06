<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);


require_once APP_PATH.'aplicativo.entidad.php';
require_once APP_PATHS.'aplicativo.model.php';
*/
require_once("models/cotizacion.entidad.php");
require_once("models/cotizacion_model.php");

// Logica
$cot = new Cotizacion();
$model = new CotizacionModel();
/*
if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$cot->__SET('idcotizacion',             $_REQUEST['idcotizacion']);
			$cot->__SET('numero_cotizacion',        $_REQUEST['numero_cotizacion']);
			$cot->__SET('estado_cotizacion',        $_REQUEST['estado_cotizacion']);
			$cot->__SET('empresa_idempresa',        $_REQUEST['empresa_idempresa']);
			$cot->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);
			$cot->__SET('descripcion_cotizacion',        $_REQUEST['descripcion_cotizacion']);


			$model->Actualizar($cot);
			header('Location: list_cotizacion.php');
			break;

		case 'registrar':
			$cot->__SET('numero_cotizacion',        $_REQUEST['numero_cotizacion']);
			$cot->__SET('estado_cotizacion',        $_REQUEST['estado_cotizacion']);
			$cot->__SET('empresa_idempresa',        $_REQUEST['empresa_idempresa']);
			$cot->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);
			$cot->__SET('descripcion_cotizacion',        $_REQUEST['descripcion_cotizacion']);

			$model->Registrar($cot);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcotizacion']);
			header('Location: index.php');
			break;

		case 'editar':
			$cot= $model->Obtener($_REQUEST['idcotizacion']);
			//$apl= $model->Porcentaje($_REQUEST['idaplicativo']);
			
			break;
	}
	//require_once("views/aplicativo_view.phtml");
}*/
require_once("views/list_cotizacion_view.phtml");
?>