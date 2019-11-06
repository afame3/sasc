-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.47


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema culturaq_sasc_des
--

CREATE DATABASE IF NOT EXISTS culturaq_sasc_des;
USE culturaq_sasc_des;

--
-- Definition of table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `numero_area` int(11) DEFAULT NULL,
  `nombre_area` varchar(45) DEFAULT NULL,
  `descripcion_area` varchar(200) DEFAULT NULL,
  `estado_area` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


--
-- Definition of table `campo`
--

DROP TABLE IF EXISTS `campo`;
CREATE TABLE `campo` (
  `idcampo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `version` varchar(45) DEFAULT NULL,
  `fecha_emision` datetime DEFAULT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idcampo`),
  KEY `fk_campo_empleado1` (`empleado_idempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campo`
--

/*!40000 ALTER TABLE `campo` DISABLE KEYS */;
/*!40000 ALTER TABLE `campo` ENABLE KEYS */;


--
-- Definition of table `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacion_numero` int(11) DEFAULT NULL,
  `cotizacion_fecha` datetime DEFAULT NULL,
  `cotizacion_descripcion` varchar(255) DEFAULT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  `cotizacion_estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizacion_empresa` (`empresa_idempresa`),
  KEY `fk_cotizacion_empleado1` (`empleado_idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cotizacion`
--

/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` VALUES  (1,4,'2019-10-25 00:00:00','Monitoreo Ocupacional',2,1,'Pendiente'),
 (2,2,'2019-10-26 06:49:22','Monitoreo Ocupacional',2,1,'Pendiente'),
 (3,3,'2019-10-26 06:57:52','Monitoreo Ocupacional',2,1,'Rechazado'),
 (4,3,'2019-10-27 15:31:56','Monitoreo Ocupacional',2,1,'Registrado'),
 (5,5,'2019-10-27 16:57:08','Monitoreo Ocupacional',3,2,'Pendiente');
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;


--
-- Definition of table `detalle_campo`
--

DROP TABLE IF EXISTS `detalle_campo`;
CREATE TABLE `detalle_campo` (
  `iddetalle_campo` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `numero_trabajador` int(11) DEFAULT NULL,
  `punto` int(11) DEFAULT NULL,
  `costo_parametro` decimal(10,0) DEFAULT NULL,
  `campo_idcampo` int(11) NOT NULL,
  `riesgo_idriesgo` int(11) NOT NULL,
  `area_idarea` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_campo`),
  KEY `fk_detalle_campo_campo1` (`campo_idcampo`),
  KEY `fk_detalle_campo_riesgo1` (`riesgo_idriesgo`),
  KEY `fk_detalle_campo_area1` (`area_idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_campo`
--

/*!40000 ALTER TABLE `detalle_campo` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_campo` ENABLE KEYS */;


--
-- Definition of table `detalle_cotizacion`
--

DROP TABLE IF EXISTS `detalle_cotizacion`;
CREATE TABLE `detalle_cotizacion` (
  `iddetalle_cotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_cotizacion_version` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_monto` float(18,2) DEFAULT NULL,
  `detalle_cotizacion_comentario` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_fecha` datetime DEFAULT NULL,
  `detalle_cotizacion_visita` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_adjunto` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_pago` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_documento` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_condicion` varchar(45) DEFAULT NULL,
  `detalle_cotizacion_gasto` float(18,2) DEFAULT NULL,
  `cotizacion_idcotizacion` int(11) NOT NULL,
  `detalle_cotizacion_estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_cotizacion`),
  KEY `fk_detalle_cotizacion_cotizacion1_idx` (`cotizacion_idcotizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_cotizacion`
--

/*!40000 ALTER TABLE `detalle_cotizacion` DISABLE KEYS */;
INSERT INTO `detalle_cotizacion` VALUES  (1,'1',100.00,'comentario uno','2019-10-25 06:52:44','SI','www.adjunto','Pago Adelantado','Orden de Servicio','condicion',70.00,1,'Registrado'),
 (2,'2',110.00,'comentario dos','2019-10-26 06:07:22','SI','www.adjunto','Pago Adelantado','Orden de Servicio','condicion2',170.00,1,'Registrado'),
 (3,'4',1.00,'1','2019-10-26 19:37:05','1','1','1','1','1',1.00,1,'Aprobado'),
 (4,'7',2.00,'1','2019-10-26 21:38:11','SI','1','50% adelanto/50% al final','Contrato','1',1.00,1,'Pendiente'),
 (5,'6',10.00,'comentario','2019-10-26 21:31:34','SI','ad','A 60 dÃ­as','1','1',1.00,1,'Registrado'),
 (6,'5',2.00,'2','2019-10-26 19:42:17','NO','2','2','2','2',2.00,1,'Pendiente'),
 (7,'3',100.00,'1','2019-10-26 18:24:56','SI','1','Sin factura','1','1',120.00,1,'Aprobado'),
 (8,NULL,NULL,NULL,'2019-10-26 22:18:28',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL),
 (9,'1',1.00,'1','2019-10-27 15:15:03','NO','1','50% adelanto/50% al final','Orden de Servicio','1',1.00,2,'Registrado'),
 (10,'1',1.00,'cometario cotizacion numero ','2019-10-27 18:32:12','SI','1','50% adelanto/50% al final','Oden de Servicio','1',1.00,5,'Registrado'),
 (11,'2',2.00,'dos','2019-10-27 18:36:02','SI','2','50% adelanto/50% al final','Oden de Servicio','2',2.00,5,'Registrado'),
 (12,'3',2.00,'tres','2019-10-27 18:46:54','SI','2','50% adelanto/50% al final','Orden de Servicio','2',2.00,5,'Pendiente'),
 (13,'4',4.00,'444','2019-10-27 18:50:07','SI','4','A 60 dÃ­as','Oden de Servicio','4',4.00,5,'Registrado'),
 (14,'6',6.00,'6','2019-10-27 19:01:17','SI','6','50% adelanto/50% al final','Orden de Servicio','6',6.00,5,'Registrado'),
 (15,'5',5.00,'5','2019-10-27 18:57:31','SI','5','50% adelanto/50% al final','Oden de Servicio','5',5.00,5,'Registrado'),
 (16,'7',7.00,'7','2019-10-27 19:01:44','SI','7','50% adelanto/50% al final','Oden de Servicio','7',7.00,5,'Registrado'),
 (17,'8',8.00,'8','2019-10-27 19:04:27','SI','8','50% adelanto/50% al final','Oden de Servicio','8',8.00,5,'Registrado'),
 (18,'9',9.00,'9','2019-10-27 19:40:44','SI','9','50% adelanto/50% al final','Oden de Servicio','9',9.00,5,'Registrado'),
 (19,'10',10.00,'10','2019-10-27 19:42:59','SI','10','50% adelanto/50% al final','Oden de Servicio','10',10.00,5,'Registrado'),
 (20,'11',11.00,'11','2019-10-28 00:58:29','SI','11','Sin factura','Orden de Servicio','11',11.00,5,'Registrado'),
 (21,'12',12.00,'12','2019-10-28 01:03:14','SI','12','50% adelanto/50% al final','Oden de Servicio','12',12.00,5,'Registrado'),
 (22,'13',13.00,'prueba','2019-10-28 02:46:05','SI','13','50% adelanto/50% al final','Oden de Servicio','13',13.00,5,'Registrado');
/*!40000 ALTER TABLE `detalle_cotizacion` ENABLE KEYS */;


--
-- Definition of table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_numero` int(11) DEFAULT NULL,
  `empleado_nombre` varchar(100) DEFAULT NULL,
  `empleado_dni` varchar(8) DEFAULT NULL,
  `empleado_direccion` varchar(200) DEFAULT NULL,
  `empleado_telefono` varchar(12) DEFAULT NULL,
  `empleado_estado` varchar(20) DEFAULT NULL,
  `empleado_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleado`
--

/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES  (1,NULL,'Aldo Manosalva','12347890','Calle Elias Ascuez # 143','971430728','Activo','afame.sis@gmail.com'),
 (2,NULL,'Merly','','','','Activo','');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;


--
-- Definition of table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_numero` int(11) DEFAULT NULL,
  `empresa_razon_social` varchar(100) DEFAULT NULL,
  `empresa_ruc` varchar(11) DEFAULT NULL,
  `empresa_estado` varchar(20) DEFAULT NULL,
  `empresa_direccion` varchar(250) DEFAULT NULL,
  `empresa_telefono` varchar(12) DEFAULT NULL,
  `empresa_contacto` varchar(100) DEFAULT NULL,
  `empresa_correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresa`
--

/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES  (1,1,' ',' ',' ',' ',' ',' ',' '),
 (2,NULL,'Head Systems S.R.L.','2048238314','Activo','Calle Elias Ascuez # 143','971430728','',''),
 (3,NULL,'Cultura QHSE','','Activo','','','','');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


--
-- Definition of table `manual`
--

DROP TABLE IF EXISTS `manual`;
CREATE TABLE `manual` (
  `id_manual` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(45) DEFAULT NULL,
  `ruta` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `automatizado` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_manual`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual`
--

/*!40000 ALTER TABLE `manual` DISABLE KEYS */;
/*!40000 ALTER TABLE `manual` ENABLE KEYS */;


--
-- Definition of table `riesgo`
--

DROP TABLE IF EXISTS `riesgo`;
CREATE TABLE `riesgo` (
  `idriesgo` int(11) NOT NULL AUTO_INCREMENT,
  `numero_riesgo` int(11) DEFAULT NULL,
  `tipo_riesgo` varchar(100) DEFAULT NULL,
  `parametro_medicion` varchar(200) DEFAULT NULL,
  `equipo_herramienta` varchar(200) DEFAULT NULL,
  `metodo` varchar(500) DEFAULT NULL,
  `costo_unitario` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idriesgo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riesgo`
--

/*!40000 ALTER TABLE `riesgo` DISABLE KEYS */;
/*!40000 ALTER TABLE `riesgo` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
