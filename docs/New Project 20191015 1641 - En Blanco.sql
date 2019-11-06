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
-- Create schema culturaq_sistema
--

CREATE DATABASE IF NOT EXISTS culturaq_sistema;
USE culturaq_sistema;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`idarea`,`numero_area`,`nombre_area`,`descripcion_area`,`estado_area`) VALUES 
 (1,1,'Administracion',NULL,'1'),
 (2,2,'Comercial',NULL,'1'),
 (3,3,'Monitoreo',NULL,'1'),
 (4,4,'Logistica',NULL,'1');
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
  KEY `fk_campo_empleado1` (`empleado_idempleado`),
  CONSTRAINT `fk_campo_empleado1` FOREIGN KEY (`empleado_idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campo`
--

/*!40000 ALTER TABLE `campo` DISABLE KEYS */;
INSERT INTO `campo` (`idcampo`,`codigo`,`version`,`fecha_emision`,`empleado_idempleado`) VALUES 
 (1,'FOR-COM-001','001','2019-09-23 20:39:49',1),
 (2,'cp1','1','2019-09-25 00:00:00',1),
 (3,'cp3','1','2019-09-25 00:00:00',1),
 (4,'cp4','1','2019-09-25 00:00:00',1),
 (5,'cp5','1','2019-09-25 00:00:00',1),
 (6,'cp1','1','2019-09-27 00:00:00',1);
/*!40000 ALTER TABLE `campo` ENABLE KEYS */;


--
-- Definition of table `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cotizacion` varchar(10) DEFAULT NULL,
  `estado_cotizacion` varchar(50) DEFAULT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  `descripcion_cotizacion` varchar(255) DEFAULT NULL,
  `fecha_cotizacion` datetime DEFAULT NULL,
  `observacion_cotizacion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizacion_empresa` (`empresa_idempresa`),
  KEY `fk_cotizacion_empleado1` (`empleado_idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cotizacion`
--
-
-- Definition of table `detalle_campo`
--

DROP TABLE IF EXISTS `detalle_campo`;
CREATE TABLE `detalle_campo` (
  `iddetalle_campo` int(11) NOT NULL AUTO_INCREMENT,
  `numero_detalle_campo` int(11) DEFAULT NULL,
  `numero_trabajador` int(11) DEFAULT NULL,
  `punto` int(11) DEFAULT NULL,
  `costo_parametro` decimal(10,0) DEFAULT NULL,
  `campo_idcampo` int(11) NOT NULL,
  `riesgo_idriesgo` int(11) NOT NULL,
  `area_idarea` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_campo`),
  KEY `fk_detalle_campo_campo1` (`campo_idcampo`),
  KEY `fk_detalle_campo_riesgo1` (`riesgo_idriesgo`),
  KEY `fk_detalle_campo_area1` (`area_idarea`),
  CONSTRAINT `fk_detalle_campo_area1` FOREIGN KEY (`area_idarea`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_campo_campo1` FOREIGN KEY (`campo_idcampo`) REFERENCES `campo` (`idcampo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_campo_riesgo1` FOREIGN KEY (`riesgo_idriesgo`) REFERENCES `riesgo` (`idriesgo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_campo`
--

/*!40000 ALTER TABLE `detalle_campo` DISABLE KEYS */;
INSERT INTO `detalle_campo` (`iddetalle_campo`,`numero_detalle_campo`,`numero_trabajador`,`punto`,`costo_parametro`,`campo_idcampo`,`riesgo_idriesgo`,`area_idarea`) VALUES 
 (1,1,3,1,'120',1,1,1),
 (2,2,2,1,'50',1,2,2),
 (3,3,5,2,'110',1,3,3),
 (4,4,1,1,'60',1,4,4);
/*!40000 ALTER TABLE `detalle_campo` ENABLE KEYS */;


--
-- Definition of table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `numero_empleado` int(11) DEFAULT NULL,
  `nombre_empleado` varchar(100) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion_empleado` varchar(200) DEFAULT NULL,
  `telefono_empleado` varchar(45) DEFAULT NULL,
  `estado_empleado` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

--
-- Definition of table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `numero_empresa` int(11) DEFAULT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `estado_empresa` varchar(25) DEFAULT NULL,
  `direccion_empresa` varchar(250) DEFAULT NULL,
  `telefono_empresa` varchar(45) DEFAULT NULL,
  `contacto_empres` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa`
--


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riesgo`
--

/*!40000 ALTER TABLE `riesgo` DISABLE KEYS */;
INSERT INTO `riesgo` (`idriesgo`,`numero_riesgo`,`tipo_riesgo`,`parametro_medicion`,`equipo_herramienta`,`metodo`,`costo_unitario`) VALUES 
 (1,1,'Riesgos Físicos','Ruido por dosimetría','Dosímetro Quest 3M',NULL,'120'),
 (2,2,'Riesgos Físicos','Personal Administrativo','Formato de evaluación/Cámara fotográfica',NULL,'50'),
 (3,3,'Riesgos Físicos','Personal Administrativo/Operativo','Formato de evaluación/Cámara fotográfica',NULL,'55'),
 (4,4,'Riesgos Físicos','Personal Operativo','Formato de evaluación/Equipo de filmación',NULL,'60');
/*!40000 ALTER TABLE `riesgo` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
