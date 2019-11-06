SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`empresa` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `razon_social` VARCHAR(100) NULL ,
  `ruc` VARCHAR(11) NULL ,
  `estado` VARCHAR(1) NULL ,
  `direccion` VARCHAR(250) NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`idempresa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`empleado` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`empleado` (
  `idempleado` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `nombre` VARCHAR(100) NULL ,
  `dni` VARCHAR(8) NULL ,
  `direccion` VARCHAR(200) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `estado` VARCHAR(1) NULL ,
  `email` VARCHAR(100) NULL ,
  PRIMARY KEY (`idempleado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`cotizacion` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`cotizacion` (
  `idcotizacion` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `estado` VARCHAR(1) NULL ,
  `empresa_idempresa` INT NOT NULL ,
  `empleado_idempleado` INT NOT NULL ,
  PRIMARY KEY (`idcotizacion`) ,
  INDEX `fk_cotizacion_empresa` (`empresa_idempresa` ASC) ,
  INDEX `fk_cotizacion_empleado1` (`empleado_idempleado` ASC) ,
  CONSTRAINT `fk_cotizacion_empresa`
    FOREIGN KEY (`empresa_idempresa` )
    REFERENCES `mydb`.`empresa` (`idempresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cotizacion_empleado1`
    FOREIGN KEY (`empleado_idempleado` )
    REFERENCES `mydb`.`empleado` (`idempleado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`area` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`area` (
  `idarea` INT NOT NULL AUTO_INCREMENT ,
  `numero_area` INT NULL ,
  `nombre_area` VARCHAR(45) NULL ,
  `descripcion_area` VARCHAR(200) NULL ,
  `estado_area` VARCHAR(1) NULL ,
  PRIMARY KEY (`idarea`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`riesgo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`riesgo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`riesgo` (
  `idriesgo` INT NOT NULL AUTO_INCREMENT ,
  `numero_riesgo` INT NULL ,
  `tipo_riesgo` VARCHAR(100) NULL ,
  `parametro_medicion` VARCHAR(200) NULL ,
  `equipo_herramienta` VARCHAR(200) NULL ,
  `metodo` VARCHAR(500) NULL ,
  `costo_unitario` DECIMAL NULL ,
  PRIMARY KEY (`idriesgo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`campo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`campo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`campo` (
  `idcampo` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NULL ,
  `version` VARCHAR(45) NULL ,
  `fecha_emision` DATETIME NULL ,
  `empleado_idempleado` INT NOT NULL ,
  PRIMARY KEY (`idcampo`) ,
  INDEX `fk_campo_empleado1` (`empleado_idempleado` ASC) ,
  CONSTRAINT `fk_campo_empleado1`
    FOREIGN KEY (`empleado_idempleado` )
    REFERENCES `mydb`.`empleado` (`idempleado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`detalle_campo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`detalle_campo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`detalle_campo` (
  `iddetalle_campo` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `numero_trabajador` INT NULL ,
  `punto` INT NULL ,
  `costo_parametro` DECIMAL NULL ,
  `campo_idcampo` INT NOT NULL ,
  `riesgo_idriesgo` INT NOT NULL ,
  `area_idarea` INT NOT NULL ,
  PRIMARY KEY (`iddetalle_campo`) ,
  INDEX `fk_detalle_campo_campo1` (`campo_idcampo` ASC) ,
  INDEX `fk_detalle_campo_riesgo1` (`riesgo_idriesgo` ASC) ,
  INDEX `fk_detalle_campo_area1` (`area_idarea` ASC) ,
  CONSTRAINT `fk_detalle_campo_campo1`
    FOREIGN KEY (`campo_idcampo` )
    REFERENCES `mydb`.`campo` (`idcampo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_campo_riesgo1`
    FOREIGN KEY (`riesgo_idriesgo` )
    REFERENCES `mydb`.`riesgo` (`idriesgo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_campo_area1`
    FOREIGN KEY (`area_idarea` )
    REFERENCES `mydb`.`area` (`idarea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
