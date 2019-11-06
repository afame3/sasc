<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);


require_once APP_PATH.'manual.entidad.php';
require_once APP_PATHS.'manual.model.php';
*/
require_once("models/detalle_cotizacion.entidad.php");
require_once("models/detalle_cotizacion_model.php");

// Logica
$dco = new DetalleCotizacion();
$model = new DetalleCotizacionModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$dco->__SET('iddetalle_cotizacion',             $_REQUEST['iddetalle_cotizacion']);
			//$dco->__SET('detalle_cotizacion_version',        $_REQUEST['detalle_cotizacion_version']);
			//$dco->__SET('detalle_cotizacion_monto',        $_REQUEST['detalle_cotizacion_monto']);
			//$dco->__SET('detalle_cotizacion_comentario',        $_REQUEST['detalle_cotizacion_comentario']);
			//$dco->__SET('detalle_cotizacion_fecha',        $_REQUEST['detalle_cotizacion_fecha']);
			//$dco->__SET('detalle_cotizacion_visita',        $_REQUEST['detalle_cotizacion_visita']);
			$dco->__SET('detalle_cotizacion_adjunto_pdf',        $_REQUEST['detalle_cotizacion_adjunto_pdf']);
			//$dco->__SET('detalle_cotizacion_pago',        $_REQUEST['detalle_cotizacion_pago']);
			//$dco->__SET('detalle_cotizacion_documento',        $_REQUEST['detalle_cotizacion_documento']);
			$dco->__SET('detalle_cotizacion_condicion',        $_REQUEST['detalle_cotizacion_condicion']);
			//$dco->__SET('detalle_cotizacion_gasto',        $_REQUEST['detalle_cotizacion_gasto']);
			//$dco->__SET('detalle_cotizacion_estado',        $_REQUEST['detalle_cotizacion_estado']);
			//$dco->__SET('cotizacion_idcotizacion',        $_REQUEST['cotizacion_idcotizacion']);
			$dco->__SET('detalle_cotizacion_adjunto_word',        $_REQUEST['detalle_cotizacion_adjunto_word']);
			$dco->__SET('detalle_cotizacion_adjunto_excel',        $_REQUEST['detalle_cotizacion_adjunto_excel']);
			
			$model->ActualizarAdjunto($dco);
			//header('Location: list_cotizacion.php');
			break;

		case 'registrar_manual':
			$man->__SET('autor',        $_REQUEST['autor']);
			$man->__SET('ruta',        $_REQUEST['ruta']);
			$man->__SET('titulo',        $_REQUEST['titulo']);
			//$man->__SET('fecha_creacion',        $_REQUEST['fecha_creacion']);
			//$man->__SET('automatizado',        $_REQUEST['automatizado']);
			//$man->__SET('estado',        $_REQUEST['estado']);

			$model->registrar_manual($man);
			header('Location: user_manual.php');
			break;

		case 'eliminar_manual':
			$model->eliminar_manual($_REQUEST['id_manual']);
			//header('Location: user_manual.php');
			break;

		case 'editar':
			$dco= $model->obtener($_REQUEST['iddetalle_cotizacion']);
			break;
	}
}
require_once("views/adjunto_view.phtml");
?>