<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

require_once("models/cotizacion.entidad.php");
require_once("models/cotizacion_model.php");

$model=new CotizacionModel();
$cot = new Cotizacion();

//require_once("models/empleado.entidad.php");
//require_once("models/empleado_model.php");

//$eml=new Empleado();
//$emp= new EmpleadoModel();

require_once("models/empresa.entidad.php");
require_once("models/empresa_model.php");

$emr=new Empresa();
$em= new EmpresaModel();

// Logica

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		
		case 'actualizar':
			$cot->__SET('idcotizacion',             $_REQUEST['idcotizacion']);
			$cot->__SET('cotizacion_numero',        $_REQUEST['cotizacion_numero']);
			$cot->__SET('cotizacion_fecha',        $_REQUEST['cotizacion_fecha']);
			$cot->__SET('cotizacion_descripcion',        $_REQUEST['cotizacion_descripcion']);
			$cot->__SET('cotizacion_estado',        $_REQUEST['cotizacion_estado']);
			$cot->__SET('empresa_idempresa',        $_REQUEST['empresa_idempresa']);
			$cot->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);
			
			$model->Actualizar($cot);
			header('Location: list_cotizacion.php');
			break;

		case 'registrar':
			$cot->__SET('numero_cotizacion',        $_REQUEST['numero_cotizacion']);
			$cot->__SET('estado_cotizacion',        $_REQUEST['estado_cotizacion']);
			$cot->__SET('empresa_idempresa',        $_REQUEST['empresa_idempresa']);
			$cot->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);
			$cot->__SET('descripcion_cotizacion',        $_REQUEST['descripcion_cotizacion']);
			$cot->__SET('fecha_cotizacion',        $_REQUEST['fecha_cotizacion']);
			$cot->__SET('observacion_cotizacion',        $_REQUEST['observacion_cotizacion']);
			$cot->__SET('sub_total',        $_REQUEST['sub_total']);
			$cot->__SET('fecha_observacion',        $_REQUEST['fecha_observacion']);
			$cot->__SET('version',        $_REQUEST['version']);

			$model->Registrar($cot);
			header('Location: list_cotizacion.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcotizacion']);
			header('Location: list_cotizacion.php');
			break;

		case 'editar':
			$cot= $model->Obtener($_REQUEST['idcotizacion']);
			break;
	}
}
require_once("views/detail_cotizacion_view.phtml");
?>