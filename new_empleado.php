<?php

/*
 * empleado php.
 *
 * @category   SASC Sistemas Administrador de Servicios CulturaQHSE
 * @package    Application
 * @subpackage Empleado
 * @copyright  Copyright (c) 2019 Head Systems S.R.L. (http://www.headsystems.pe)
 * @license    LGPL v3 (See LICENSE file)
 * @link       http://www.culturaqhse.com/sasc
 * @since      File available since Release 1.0
 * @version    Release: 1.0.1
 * @author     Aldo Manosalva <afame@gmail.com>
 */
 
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', BASE_PATH . 'controllers' . DS);

require_once APP_PATH.'empleado_controller.php';

?>