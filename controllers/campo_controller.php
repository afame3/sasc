<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

require_once("models/campo.entidad.php");
require_once("models/campo_model.php");

//require_once("models/aplicativo.entidad.php");
//require_once("models/aplicativo_model.php");

//$cod=new AplicativoModel();
//$app= new Aplicativo();

// Logica
$model=new CampoModel();
$cam = new Campo();


if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		
		case 'actualizar':
			$cam->__SET('idcampo',             $_REQUEST['idcampo']);
			$cam->__SET('codigo',        $_REQUEST['codigo']);
			$cam->__SET('version',        $_REQUEST['version']);
			$cam->__SET('fecha_emision',        $_REQUEST['fecha_emision']);
			$cam->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);

			$model->Actualizar($cam);
			header('Location: index.php');
			break;

		case 'registrar':
			$cam->__SET('codigo',        $_REQUEST['codigo']);
			$cam->__SET('version',        $_REQUEST['version']);
			$cam->__SET('fecha_emision',        $_REQUEST['fecha_emision']);
			$cam->__SET('empleado_idempleado',        $_REQUEST['empleado_idempleado']);

			$model->Registrar($cam);
			header('Location: new_detalle_campo.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcampo']);
			header('Location: index.php');
			break;

		case 'editar':
			$cam= $model->Obtener($_REQUEST['idcampo']);
			break;
	}
}
require_once("views/new_campo_view.phtml");
?>