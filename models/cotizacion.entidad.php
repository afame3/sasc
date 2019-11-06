<?php

class Cotizacion
{
	private $idcotizacion;
	private $cotizacion_numero;
	private $cotizacion_fecha;
	private $cotizacion_descripcion;
	private $cotizacion_estado;
	private $empresa_idempresa;
	private $empleado_idempleado;
	
	//private $observacion_cotizacion;
	//private $sub_total;
	//private $fecha_observacion;
	//private $version;
	//private $visita;
	//private $link_documento;
	//private $link_adjunto;
		
	private $empresa;
	private $empleado;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}