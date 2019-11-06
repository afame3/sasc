SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `empresa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `razon_social` VARCHAR(100) NULL ,
  `ruc` VARCHAR(11) NULL ,
  `estado` VARCHAR(1) NULL ,
  `direccion` VARCHAR(250) NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`idempresa`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `empleado` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `empleado` (
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

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `cotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cotizacion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `cotizacion` (
  `idcotizacion` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `estado` VARCHAR(1) NULL ,
  `empresa_idempresa` INT NOT NULL ,
  `empleado_idempleado` INT NOT NULL ,
  PRIMARY KEY (`idcotizacion`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_cotizacion_empresa` ON `cotizacion` (`empresa_idempresa` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_cotizacion_empleado1` ON `cotizacion` (`empleado_idempleado` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `area` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `area` (
  `idarea` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`idarea`) )
ENGINE = InnoDB;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
