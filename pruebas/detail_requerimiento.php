<?php

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);

require_once APP_PATH.'detalle_requerimiento_sge_controller.php';

?>