<?php

class DetalleCotizacion
{
	private $iddetalle_cotizacion;
	private $detalle_cotizacion_version;
	private $detalle_cotizacion_monto;
	private $detalle_cotizacion_comentario;
	private $detalle_cotizacion_fecha;
	private $detalle_cotizacion_visita;
	private $detalle_cotizacion_adjunto_pdf;
	private $detalle_cotizacion_pago;
	private $detalle_cotizacion_documento;
	private $detalle_cotizacion_condicion;
	private $detalle_cotizacion_gasto;
	private $detalle_cotizacion_estado;
	private $cotizacion_idcotizacion;
	private $detalle_cotizacion_adjunto_word;
	private $detalle_cotizacion_adjunto_excel;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}