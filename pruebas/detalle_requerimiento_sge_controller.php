<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);


require_once APP_PATH.'requerimiento.entidad.php';
require_once APP_PATHS.'requerimiento_model.php';
*/
require_once("models/requerimiento.entidad.php");
require_once("models/requerimiento_model.php");

// Logica
$req = new Requerimiento();
$model = new RequerimientoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{

		case 'actualizar':
			$req->__SET('idrequerimiento',             $_REQUEST['idrequerimiento']);
			$req->__SET('sol_negocio',        $_REQUEST['sol_negocio']);
			$req->__SET('sol_tecnico',        $_REQUEST['sol_tecnico']);
			$req->__SET('nombre_requerimiento',        $_REQUEST['nombre_requerimiento']);
			$req->__SET('fecha_inicio_planificado',        $_REQUEST['fecha_inicio_planificado']);
			$req->__SET('fecha_fin_planificado',        $_REQUEST['fecha_fin_planificado']);
			$req->__SET('fecha_inicio_construccion',        $_REQUEST['fecha_inicio_construccion']);
			$req->__SET('fecha_fin_construccion',        $_REQUEST['fecha_fin_construccion']);
			$req->__SET('tipo_construccion',        $_REQUEST['tipo_construccion']);
			$req->__SET('idaplicativo',        $_REQUEST['idaplicativo']);
			$req->__SET('idestado',        $_REQUEST['idestado']);
			$req->__SET('idestado_cq',        $_REQUEST['idestado_cq']);
			$req->__SET('idproveedor',        $_REQUEST['idproveedor']);
			$req->__SET('horas_construccion',        $_REQUEST['horas_construccion']);
			$req->__SET('indicador',        $_REQUEST['indicador']);
																											
			$model->Actualizar($req);
			header('Location: list_requerimiento.php');
			break;

		case 'registrar':
			$req->__SET('sol_negocio',        $_REQUEST['sol_negocio']);
			$req->__SET('sol_tecnico',        $_REQUEST['sol_tecnico']);
			$req->__SET('nombre_requerimiento',        $_REQUEST['nombre_requerimiento']);
			$req->__SET('fecha_inicio_planificado',        $_REQUEST['fecha_inicio_planificado']);
			$req->__SET('fecha_fin_planificado',        $_REQUEST['fecha_fin_planificado']);
			$req->__SET('fecha_inicio_construccion',        $_REQUEST['fecha_inicio_construccion']);
			$req->__SET('fecha_fin_construccion',        $_REQUEST['fecha_fin_construccion']);
			$req->__SET('tipo_construccion',        $_REQUEST['tipo_construccion']);
			$req->__SET('idaplicativo',        $_REQUEST['idaplicativo']);
			$req->__SET('idestado',        $_REQUEST['idestado']);
			$req->__SET('idestado_cq',        $_REQUEST['idestado_cq']);
			$req->__SET('idproveedor',        $_REQUEST['idproveedor']);
			$req->__SET('horas_construccion',        $_REQUEST['horas_construccion']);
			$req->__SET('indicador',        $_REQUEST['indicador']);
			
			$model->Registrar($req);
			header('Location: list_requerimiento.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idrequerimiento']);
			header('Location: list_requerimiento.php');
			break;

		case 'editar':
			$req= $model->Obtener($_REQUEST['idrequerimiento']);
			break;
	}
}
require_once("views/detail_requerimiento_view.phtml");
?>