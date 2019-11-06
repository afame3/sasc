<?php

class Aplicativo
{
	private $idaplicativo;
	private $codigo_aplicativo;
	private $nombre_aplicativo;
	private $estado_aplicativo;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}