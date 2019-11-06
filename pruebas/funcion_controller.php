<?php
//hemos creado la clase Porcentaje que tien como funcion a porcen()
//se crea el objeto $por de la clase Porcentaje
//por medio del objeto $por accedemos a la función porcen
//se imprime el valor devuelto por la funcion porcen

require_once("/funcion_model.php");
require_once("/aplicativo.entidad.php");

//$por = new Porcentaje();
//echo $por->porcen();

$cod=new CodigoAplicatvo();

foreach($cod->Codigo() as $r)
echo $r->__GET('codigo_aplicativo');

foreach($cod->Porcentaje() as $p)
echo $p->__GET('porcentaje_regresion');
echo $p->__GET('porcentaje_mejora');

?>