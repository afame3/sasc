<?php

class Campo
{
	private $idcampo;
	private $codigo;
	private $version;
	private $fecha_emision;
	private $empleado_idempleado;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}