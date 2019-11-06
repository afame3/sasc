<?php

class Empresa
{
	private $idempresa;
	private $empresa_numero;
	private $empresa_razon_social;
	private $empresa_ruc;
	private $empresa_estado;
	private $empresa_direccion;
	private $empresa_telefono;
	private $empresa_contacto;
	private $empresa_correo;
		
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}