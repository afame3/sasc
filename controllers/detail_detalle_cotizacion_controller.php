<?php

/*define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);
define('APP_PATHS', BASE_PATH . 'models' . DS);
*/

require_once("models/detalle_cotizacion.entidad.php");
require_once("models/detalle_cotizacion_model.php");

$model=new DetalleCotizacionModel();
$dco = new DetalleCotizacion();

//require_once("models/empleado.entidad.php");
//require_once("models/empleado_model.php");

//$eml=new Empleado();
//$emp= new EmpleadoModel();

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
			$dco->__SET('iddetalle_cotizacion',             $_REQUEST['iddetalle_cotizacion']);
			$dco->__SET('detalle_cotizacion_version',        $_REQUEST['detalle_cotizacion_version']);
			$dco->__SET('detalle_cotizacion_monto',        $_REQUEST['detalle_cotizacion_monto']);
			$dco->__SET('detalle_cotizacion_comentario',        $_REQUEST['detalle_cotizacion_comentario']);
			$dco->__SET('detalle_cotizacion_fecha',        $_REQUEST['detalle_cotizacion_fecha']);
			$dco->__SET('detalle_cotizacion_visita',        $_REQUEST['detalle_cotizacion_visita']);
			$dco->__SET('detalle_cotizacion_adjunto_pdf',        $_REQUEST['detalle_cotizacion_adjunto_pdf']);
			$dco->__SET('detalle_cotizacion_pago',        $_REQUEST['detalle_cotizacion_pago']);
			$dco->__SET('detalle_cotizacion_documento',        $_REQUEST['detalle_cotizacion_documento']);
			$dco->__SET('detalle_cotizacion_condicion',        $_REQUEST['detalle_cotizacion_condicion']);
			$dco->__SET('detalle_cotizacion_gasto',        $_REQUEST['detalle_cotizacion_gasto']);
			$dco->__SET('detalle_cotizacion_estado',        $_REQUEST['detalle_cotizacion_estado']);
			$dco->__SET('cotizacion_idcotizacion',        $_REQUEST['cotizacion_idcotizacion']);
			$dco->__SET('detalle_cotizacion_adjunto_word',        $_REQUEST['detalle_cotizacion_adjunto_word']);
			$dco->__SET('detalle_cotizacion_adjunto_excel',        $_REQUEST['detalle_cotizacion_adjunto_excel']);
			
			$model->Actualizar($dco);
			//header('Location: list_cotizacion.php');
			break;

		case 'registrar':
			$dco->__SET('detalle_cotizacion_version',        $_REQUEST['detalle_cotizacion_version']);
			$dco->__SET('detalle_cotizacion_monto',        $_REQUEST['detalle_cotizacion_monto']);
			$dco->__SET('detalle_cotizacion_comentario',        $_REQUEST['detalle_cotizacion_comentario']);
			$dco->__SET('detalle_cotizacion_fecha',        $_REQUEST['detalle_cotizacion_fecha']);
			$dco->__SET('detalle_cotizacion_visita',        $_REQUEST['detalle_cotizacion_visita']);
			$dco->__SET('detalle_cotizacion_adjunto_pdf',        $_REQUEST['detalle_cotizacion_adjunto_pdf']);
			$dco->__SET('detalle_cotizacion_pago',        $_REQUEST['detalle_cotizacion_pago']);
			$dco->__SET('detalle_cotizacion_documento',        $_REQUEST['detalle_cotizacion_documento']);
			$dco->__SET('detalle_cotizacion_condicion',        $_REQUEST['detalle_cotizacion_condicion']);
			$dco->__SET('detalle_cotizacion_gasto',        $_REQUEST['detalle_cotizacion_gasto']);
			$dco->__SET('detalle_cotizacion_estado',        $_REQUEST['detalle_cotizacion_estado']);
			$dco->__SET('cotizacion_idcotizacion',        $_REQUEST['cotizacion_idcotizacion']);
			$dco->__SET('detalle_cotizacion_adjunto_word',        $_REQUEST['detalle_cotizacion_adjunto_word']);
			$dco->__SET('detalle_cotizacion_adjunto_excel',        $_REQUEST['detalle_cotizacion_adjunto_excel']);

			$model->Registrar($dco);
			//header('Location: list_detalle_cotizacion.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcotizacion']);
			header('Location: list_cotizacion.php');
			break;

		case 'editar':
			$dco= $model->Obtener($_REQUEST['iddetalle_cotizacion']);
			break;
	}
}
require_once("views/detail_detalle_cotizacion_view.phtml");
?>