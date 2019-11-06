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
-- Create schema culturaq_sasc_prod
--

CREATE DATABASE IF NOT EXISTS culturaq_sasc_prod;
USE culturaq_sasc_prod;

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
