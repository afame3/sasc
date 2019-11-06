-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-10-2019 a las 05:17:04
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `culturaq_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `numero_area` int(11) DEFAULT NULL,
  `nombre_area` varchar(45) DEFAULT NULL,
  `descripcion_area` varchar(200) DEFAULT NULL,
  `estado_area` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `numero_area`, `nombre_area`, `descripcion_area`, `estado_area`) VALUES
(1, 1, 'Administracion', NULL, '1'),
(2, 2, 'Comercial', NULL, '1'),
(3, 3, 'Monitoreo', NULL, '1'),
(4, 4, 'Logistica', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo`
--

CREATE TABLE `campo` (
  `idcampo` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `version` varchar(45) DEFAULT NULL,
  `fecha_emision` datetime DEFAULT NULL,
  `empleado_idempleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL,
  `numero_cotizacion` int(11) DEFAULT NULL,
  `estado_cotizacion` varchar(50) DEFAULT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  `descripcion_cotizacion` varchar(255) DEFAULT NULL,
  `fecha_cotizacion` date DEFAULT NULL,
  `observacion_cotizacion` varchar(500) DEFAULT NULL,
  `sub_total` float(18,2) DEFAULT NULL,
  `fecha_observacion` date DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `visita` varchar(4) DEFAULT NULL,
  `link_documento` varchar(200) DEFAULT NULL,
  `link_adjunto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idcotizacion`, `numero_cotizacion`, `estado_cotizacion`, `empresa_idempresa`, `empleado_idempleado`, `descripcion_cotizacion`, `fecha_cotizacion`, `observacion_cotizacion`, `sub_total`, `fecha_observacion`, `version`, `visita`, `link_documento`, `link_adjunto`) VALUES
(1, 603, 'Pendiente', 16, 7, 'Monitoreo ocupacional', '2019-10-15', '', 0.00, '2019-10-18', '', NULL, NULL, NULL),
(2, 602, 'Pendiente', 17, 7, 'Monitoreo ocupacional', '2019-10-15', 'CORREO', 0.00, NULL, NULL, NULL, NULL, NULL),
(3, 608, 'Rechazada', 18, 7, 'monitoreo ocupacional', '2019-10-16', '', 0.00, '2019-10-18', '', NULL, NULL, NULL),
(4, 604, 'Pendiente', 19, 7, 'monitoreo ocupacional', '2019-10-16', '', 3760.00, '2019-10-22', '', 'SI', NULL, NULL),
(5, 605, 'Pendiente', 19, 7, 'monitoreo ocupacional', '2019-10-16', '', 7315.00, '2019-10-22', '', 'SI', NULL, NULL),
(6, 605, 'Rechazada', 19, 7, 'monitoreo ocupacional', '2019-10-16', '', 0.00, '2019-10-22', '', 'SI', NULL, NULL),
(7, 606, 'Pendiente', 19, 7, 'monitoreo ocupacional', '2019-10-16', '', 2455.00, '2019-10-22', '', 'SI', NULL, NULL),
(8, 607, 'Pendiente', 19, 7, 'monitoreo ocupacional', '2019-10-16', '', 2925.00, '2019-10-22', '', 'SI', NULL, NULL),
(9, 609, 'Pendiente', 20, 7, 'monitoreo ocupacional', '2019-10-16', '', 3800.00, '2019-10-22', '', 'SI', NULL, NULL),
(10, 611, 'Rechazada', 21, 7, 'monitoreo ocupacional', '2019-10-17', '', 0.00, '2019-10-18', '', NULL, NULL, NULL),
(11, 612, 'Rechazada', 21, 7, 'monitoreo ocupacional', '2019-10-17', '', 0.00, '2019-10-18', '', NULL, NULL, NULL),
(12, 613, 'Rechazada', 21, 7, 'monitoreo ocupacional', '2019-10-17', '', 0.00, '2019-10-18', '', NULL, NULL, NULL),
(13, 614, 'Aprobada', 22, 7, 'monitoreo ocupacional', '2019-10-17', 'Aprobada y en el transcurso de la semana enviaran la OC', 3280.00, '2019-10-22', '', 'SI', NULL, NULL),
(14, 611, 'Registrado', 21, 7, 'Monitoreo Ocupacional', '2019-10-18', '', 5440.00, '2019-10-18', '1', NULL, NULL, NULL),
(15, 615, 'Registrado', 21, 7, 'Monitoreo Ocupacional', '2019-10-18', '', 3330.00, '2019-10-22', '', 'SI', NULL, NULL),
(16, 616, 'Registrado', 24, 7, 'Monitoreo Ocupacional', '2019-10-23', ' Llego a traves del correo, esta cotizacion es de la sede CC Don Droso', 3330.00, NULL, NULL, 'SI', NULL, NULL),
(17, 617, 'Registrado', 25, 7, 'Monitoreo Ocupacional', '2019-10-23', 'En el transcurso del dia se le estara haciendo el seguimiento correspondiente\r\n\r\n\r\n\r\n', 3365.00, NULL, NULL, 'SI', NULL, NULL),
(18, 618, 'Registrado', 26, 7, 'Monitoreo Ocupacional', '2019-10-23', 'SEDE UDL', 3510.00, '2019-10-23', '1', 'SI', NULL, NULL),
(19, 619, 'Pendiente', 26, 7, 'Monitoreo Ocupacional', '2019-10-23', '', 2130.00, '2019-10-25', '1', 'SI', NULL, NULL),
(20, 214, 'Registrado', 27, 9, 'Saneamiento', '2019-10-23', 'Sin IGV\r\nDesinfectaci¨®n y Desinsectaci¨®n\r\nControl de insectos con la nebulizadora\r\nLocal en TEXTIMAX (Av. Huarochiri, Santa Anita 15011)', 500.00, NULL, NULL, 'NO', NULL, NULL),
(21, 622, 'Registrado', 28, 10, 'Monitoreo Ocupacional', '2019-10-25', 'llego por correo pero falta que el cliente nos envie la cantidad de puntos es por ellos que no se a realizado aun la cotizacion. \r\nno hay telefono de contacto ', 0.00, '2019-10-25', '', 'NO', NULL, NULL),
(22, 623, 'Registrado', 29, 10, 'Monitoreo Ocupacional', '2019-10-25', 'cotizaci¨®n por realizar ', 0.00, NULL, NULL, 'NO', NULL, NULL),
(23, 625, 'Registrado', 30, 11, 'Monitoreo Ocupacional', '2019-10-25', '', 0.00, '2019-10-25', '', 'NO', NULL, NULL),
(24, 624, 'Registrado', 31, 8, 'Monitoreo Ocupacional', '2019-10-25', '', 2.58, '2019-10-25', '', 'NO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_campo`
--

CREATE TABLE `detalle_campo` (
  `iddetalle_campo` int(11) NOT NULL,
  `numero_detalle_campo` int(11) DEFAULT NULL,
  `numero_trabajador` int(11) DEFAULT NULL,
  `punto` int(11) DEFAULT NULL,
  `costo_parametro` decimal(10,0) DEFAULT NULL,
  `campo_idcampo` int(11) NOT NULL,
  `riesgo_idriesgo` int(11) NOT NULL,
  `area_idarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `numero_empleado` int(11) DEFAULT NULL,
  `nombre_empleado` varchar(100) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion_empleado` varchar(200) DEFAULT NULL,
  `telefono_empleado` varchar(45) DEFAULT NULL,
  `estado_empleado` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `numero_empleado`, `nombre_empleado`, `dni`, `direccion_empleado`, `telefono_empleado`, `estado_empleado`, `email`) VALUES
(7, NULL, 'Fiorela Granados', '12345657', '', '941678446', 'Activo', ''),
(8, NULL, 'Aldo Manosalva', '', 'Calle Elias Ascuez # 143', '971430728', 'Activo', 'afame.sis@gmail.com'),
(9, NULL, 'Yanelly Oviedo', '73030270', '', '', 'Activo', ''),
(10, NULL, 'rosario nizama ', '75401559', '', '', 'Activo', ''),
(11, NULL, 'MERLY', '', '', '', 'Activo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `numero_empresa` int(11) DEFAULT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `estado_empresa` varchar(25) DEFAULT NULL,
  `direccion_empresa` varchar(250) DEFAULT NULL,
  `telefono_empresa` varchar(45) DEFAULT NULL,
  `contacto_empresa` varchar(100) DEFAULT NULL,
  `correo_empresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `numero_empresa`, `razon_social`, `ruc`, `estado_empresa`, `direccion_empresa`, `telefono_empresa`, `contacto_empresa`, `correo_empresa`) VALUES
(16, NULL, 'UAC', '', 'Activo', '', '', NULL, NULL),
(17, NULL, 'SYMI SAC', '20302794252', 'Activo', '', '', NULL, NULL),
(18, NULL, 'FORTESA', '20101602606', 'Activo', 'Av. Nicolas Arriola 318, La Victoria', '224-7773/ anexo: 31', NULL, NULL),
(19, NULL, 'EMAPA CAÃ‘ETE SAC', '20176170876', 'Activo', 'CaÃ±ete', '', NULL, NULL),
(20, NULL, 'TRANSPORTES ACOINSA SAC', '20100568617', 'Activo', '', '982093402', NULL, NULL),
(21, NULL, 'ABZ INGENIEROS', '20119377308', 'Activo', '', '', NULL, NULL),
(22, NULL, 'FLESAN', '20551503462', 'Activo', '', '', NULL, NULL),
(23, NULL, 'Head Systems S.R.L.', '20482383514', 'Activo', 'Calle Elias Ascuez # 143', '971430728', 'Head Systems S.R.L.', 'afame.sis@gmail.com'),
(24, NULL, 'MAR ANDINO PERU SAC', '20553621659', 'Activo', '', '', 'Elvis Quispe', ''),
(25, NULL, 'NEUMA PERU', '20110963875', 'Activo', '', '', 'AlessandraLavado', ''),
(26, NULL, 'UTILIDADES DOMESTICAS LIMA SAC', '20603952830', 'Activo', '', '', 'Katherine Toscaino', ''),
(27, NULL, 'Concesiones en Catering', '20557284533', 'Activo', '', '', '', ''),
(28, NULL, 'DISAL ', '', 'Activo', '', '', '', ''),
(29, NULL, 'AISEL CONSULTING', '20547980329', 'Activo', 'Cal. Andres Vesalio Nro. 278', '978391410', 'ARMANDO GAMARRA ', 'www.aiselconsulting.com'),
(30, NULL, 'Electronoroeste S.A', '', 'Activo', '', '', '', ''),
(31, NULL, 'CONSULTORIA YAC S.A.C ', '', 'Activo', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgo`
--

CREATE TABLE `riesgo` (
  `idriesgo` int(11) NOT NULL,
  `numero_riesgo` int(11) DEFAULT NULL,
  `tipo_riesgo` varchar(100) DEFAULT NULL,
  `parametro_medicion` varchar(200) DEFAULT NULL,
  `equipo_herramienta` varchar(200) DEFAULT NULL,
  `metodo` varchar(500) DEFAULT NULL,
  `costo_unitario` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `riesgo`
--

INSERT INTO `riesgo` (`idriesgo`, `numero_riesgo`, `tipo_riesgo`, `parametro_medicion`, `equipo_herramienta`, `metodo`, `costo_unitario`) VALUES
(1, 1, 'Riesgos Físicos', 'Ruido por dosimetría', 'Dosímetro Quest 3M', NULL, '120'),
(2, 2, 'Riesgos Físicos', 'Personal Administrativo', 'Formato de evaluación/Cámara fotográfica', NULL, '50'),
(3, 3, 'Riesgos Físicos', 'Personal Administrativo/Operativo', 'Formato de evaluación/Cámara fotográfica', NULL, '55'),
(4, 4, 'Riesgos Físicos', 'Personal Operativo', 'Formato de evaluación/Equipo de filmación', NULL, '60');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`idcampo`),
  ADD KEY `fk_campo_empleado1` (`empleado_idempleado`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idcotizacion`),
  ADD KEY `fk_cotizacion_empresa` (`empresa_idempresa`),
  ADD KEY `fk_cotizacion_empleado1` (`empleado_idempleado`);

--
-- Indices de la tabla `detalle_campo`
--
ALTER TABLE `detalle_campo`
  ADD PRIMARY KEY (`iddetalle_campo`),
  ADD KEY `fk_detalle_campo_campo1` (`campo_idcampo`),
  ADD KEY `fk_detalle_campo_riesgo1` (`riesgo_idriesgo`),
  ADD KEY `fk_detalle_campo_area1` (`area_idarea`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `riesgo`
--
ALTER TABLE `riesgo`
  ADD PRIMARY KEY (`idriesgo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `campo`
--
ALTER TABLE `campo`
  MODIFY `idcampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idcotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_campo`
--
ALTER TABLE `detalle_campo`
  MODIFY `iddetalle_campo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `riesgo`
--
ALTER TABLE `riesgo`
  MODIFY `idriesgo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `fk_campo_empleado1` FOREIGN KEY (`empleado_idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_campo`
--
ALTER TABLE `detalle_campo`
  ADD CONSTRAINT `fk_detalle_campo_area1` FOREIGN KEY (`area_idarea`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_campo_campo1` FOREIGN KEY (`campo_idcampo`) REFERENCES `campo` (`idcampo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_campo_riesgo1` FOREIGN KEY (`riesgo_idriesgo`) REFERENCES `riesgo` (`idriesgo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
