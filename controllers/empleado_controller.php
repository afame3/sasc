<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

//require_once("models/cotizacion.entidad.php");
//require_once("models/cotizacion_model.php");

//$model=new CotizacionModel();
//$cot = new Cotizacion();

require_once("models/empleado.entidad.php");
require_once("models/empleado_model.php");

$eml=new Empleado();
$model= new EmpleadoModel();

//require_once("models/empresa.entidad.php");
//require_once("models/empresa_model.php");

//$emr=new Empresa();
//$em= new EmpresaModel();

// Logica

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$eml->__SET('idempleado',             $_REQUEST['idempleado']);
			$eml->__SET('numero_empleado',        $_REQUEST['numero_empleado']);
			$eml->__SET('nombre_empleado',        $_REQUEST['nombre_empleado']);
			$eml->__SET('dni',        $_REQUEST['dni']);
			$eml->__SET('direccion_empleado',        $_REQUEST['direccion_empleado']);
			$eml->__SET('telefono_empleado',        $_REQUEST['telefono_empleado']);
			$eml->__SET('estado_empleado',        $_REQUEST['estado_empleado']);
			$eml->__SET('email',        $_REQUEST['email']);

			$model->Actualizar($eml);
			header('Location: lis_empleado.php');
			break;

		case 'registrar':
			$eml->__SET('empleado_numero',        $_REQUEST['empleado_numero']);
			$eml->__SET('empleado_nombre',        $_REQUEST['empleado_nombre']);
			$eml->__SET('empleado_dni',        $_REQUEST['empleado_dni']);
			$eml->__SET('empleado_direccion',        $_REQUEST['empleado_direccion']);
			$eml->__SET('empleado_telefono',        $_REQUEST['empleado_telefono']);
			$eml->__SET('empleado_estado',        $_REQUEST['empleado_estado']);
			$eml->__SET('empleado_email',        $_REQUEST['empleado_email']);

			$model->Registrar($eml);
			header('Location: list_cotizacion.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idempleado']);
			header('Location: index.php');
			break;

		case 'editar':
			$eml= $model->Obtener($_REQUEST['idempleado']);
			break;
	}
}
require_once("views/new_empleado_view.phtml");
?>