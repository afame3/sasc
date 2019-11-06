<?php

class Empleado
{
	private $idempleado;
	private $empleado_numero;
	private $empleado_nombre;
	private $empleado_dni;
	private $empleado_direccion;
	private $empleado_telefono;
	private $empleado_estado;
	private $empleado_email;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}