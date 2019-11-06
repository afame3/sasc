<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

require_once("models/detalle_campo.entidad.php");
require_once("models/detalle_campo_model.php");

//require_once("models/aplicativo.entidad.php");
//require_once("models/aplicativo_model.php");

//$cod=new AplicativoModel();
//$app= new Aplicativo();

// Logica
$model=new DetalleCampoModel();
$dca = new DetalleCampo();


if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		
		case 'actualizar':
			$dca->__SET('iddetalle_campo',             $_REQUEST['iddetalle_campo']);
			$dca->__SET('numero_detalle_campo',        $_REQUEST['numero_detalle_campo']);
			$dca->__SET('numero_trabajador',        $_REQUEST['numero_trabajador']);
			$dca->__SET('punto',        $_REQUEST['punto']);
			$dca->__SET('costo_parametro',        $_REQUEST['costo_parametro']);
			$dca->__SET('campo_idcampo',        $_REQUEST['campo_idcampo']);
			$dca->__SET('riesgo_idriesgo',        $_REQUEST['riesgo_idriesgo']);
			$dca->__SET('area_idarea',        $_REQUEST['area_idarea']);

			$model->Actualizar($dca);
			header('Location: index.php');
			break;

		case 'registrar':
			$dca->__SET('numero_detalle_campo',        $_REQUEST['numero_detalle_campo']);
			$dca->__SET('numero_trabajador',        $_REQUEST['numero_trabajador']);
			$dca->__SET('punto',        $_REQUEST['punto']);
			$dca->__SET('costo_parametro',        $_REQUEST['costo_parametro']);
			$dca->__SET('campo_idcampo',        $_REQUEST['campo_idcampo']);
			$dca->__SET('riesgo_idriesgo',        $_REQUEST['riesgo_idriesgo']);
			$dca->__SET('area_idarea',        $_REQUEST['area_idarea']);

			$model->Registrar($dca);
			header('Location: list_detalle_campo.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['iddetalle_campo']);
			header('Location: index.php');
			break;

		case 'editar':
			$dca= $model->Obtener($_REQUEST['iddetalle_campo']);
			break;
	}
}
require_once("views/new_detalle_campo_view.phtml");
?>