-- MySQL Script generated by MySQL Workbench
-- Fri Oct 21 15:59:25 2016
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bbb_halloween
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bbb_halloween
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bbb_halloween` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bbb_halloween` ;

-- -----------------------------------------------------
-- Table `bbb_halloween`.`bbbh_departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbb_halloween`.`bbbh_departamento` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(75) NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbb_halloween`.`bbbh_ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbb_halloween`.`bbbh_ciudad` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idDepartamento` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_bbbh_ciudad_bbbh_departamento_idx` (`idDepartamento` ASC)  COMMENT '',
  CONSTRAINT `fk_bbbh_ciudad_bbbh_departamento`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `bbb_halloween`.`bbbh_departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbb_halloween`.`bbbh_participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbb_halloween`.`bbbh_participante` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(75) NULL COMMENT '',
  `apellido` VARCHAR(75) NULL COMMENT '',
  `correo` VARCHAR(75) NULL COMMENT '',
  `telefono` VARCHAR(12) NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbb_halloween`.`bbbh_acudiente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbb_halloween`.`bbbh_acudiente` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idCiudad` INT NOT NULL COMMENT '',
  `idParticipante` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(75) NULL COMMENT '',
  `apellido` VARCHAR(75) NULL COMMENT '',
  `tipoDocumento` ENUM('C', 'T') NULL COMMENT '',
  `documento` VARCHAR(15) NULL COMMENT '',
  `correo` VARCHAR(75) NULL COMMENT '',
  `telefono` VARCHAR(12) NULL COMMENT '',
  `direccion` VARCHAR(150) NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_bbbh_acudiente_bbbh_ciudad1_idx` (`idCiudad` ASC)  COMMENT '',
  INDEX `fk_bbbh_acudiente_bbbh_participante1_idx` (`idParticipante` ASC)  COMMENT '',
  CONSTRAINT `fk_bbbh_acudiente_bbbh_ciudad1`
    FOREIGN KEY (`idCiudad`)
    REFERENCES `bbb_halloween`.`bbbh_ciudad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bbbh_acudiente_bbbh_participante1`
    FOREIGN KEY (`idParticipante`)
    REFERENCES `bbb_halloween`.`bbbh_participante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbb_halloween`.`bbbh_juego`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbb_halloween`.`bbbh_juego` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idParticipante` INT NOT NULL COMMENT '',
  `puntaje` INT NULL COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_bbbh_juego_bbbh_participante1_idx` (`idParticipante` ASC)  COMMENT '',
  CONSTRAINT `fk_bbbh_juego_bbbh_participante1`
    FOREIGN KEY (`idParticipante`)
    REFERENCES `bbb_halloween`.`bbbh_participante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;