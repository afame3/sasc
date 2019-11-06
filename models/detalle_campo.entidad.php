<?php

class DetalleCampo
{
	private $iddetalle_campo;
	private $numero_detalle_campo;
	private $numero_trabajador;
	private $punto;
	private $costo_parametro;
	private $campo_idcampo;
	private $riesgo_idriesgo;
	private $area_idarea;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}