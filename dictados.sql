-- MySQL Script generated by MySQL Workbench
-- Thu Nov 30 01:46:35 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dictados
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dictados
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dictados` DEFAULT CHARACTER SET utf8 ;
USE `dictados` ;

-- -----------------------------------------------------
-- Table `dictados`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `a_paterno` VARCHAR(45) NOT NULL,
  `a_materno` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(20) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `nivel` INT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Maestro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Maestro` (
  `numGrupos` VARCHAR(45) NULL,
  `idPersona` INT NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_Maestro_Persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dictados`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Alumno` (
  `numDictados` INT NULL,
  `promedio` INT NULL,
  `idPersona` INT NOT NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_Alumno_Persona`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dictados`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Grupo` (
  `idGrupo` INT NOT NULL AUTO_INCREMENT,
  `numAlumnos` INT NULL,
  `nombre` VARCHAR(45) NULL,
  `idPersona` INT NOT NULL,
  PRIMARY KEY (`idGrupo`),
  INDEX `fk_Grupo_Maestro1_idx` (`idPersona` ASC),
  CONSTRAINT `fk_Grupo_Maestro1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dictados`.`Maestro` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Dictado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Dictado` (
  `idDictado` INT NOT NULL AUTO_INCREMENT,
  `tipo` INT NULL,
  PRIMARY KEY (`idDictado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Grupo_has_Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Grupo_has_Alumno` (
  `idPersona` INT NOT NULL,
  `idGrupo` INT NOT NULL,
  `Calificacion` INT NULL,
  PRIMARY KEY (`idPersona`, `idGrupo`),
  INDEX `fk_Grupo_has_Alumno_Alumno1_idx` (`idPersona` ASC),
  INDEX `fk_Grupo_has_Alumno_Grupo1_idx` (`idGrupo` ASC),
  CONSTRAINT `fk_Grupo_has_Alumno_Grupo1`
    FOREIGN KEY (`idGrupo`)
    REFERENCES `dictados`.`Grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grupo_has_Alumno_Alumno1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dictados`.`Alumno` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dictados`.`Dictado_has_Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dictados`.`Dictado_has_Alumno` (
  `idPersona` INT NOT NULL,
  `idDictado` INT NOT NULL,
  `Calificacion` INT NULL,
  PRIMARY KEY (`idPersona`, `idDictado`),
  INDEX `fk_Dictado_has_Alumno_Alumno1_idx` (`idPersona` ASC),
  INDEX `fk_Dictado_has_Alumno_Dictado1_idx` (`idDictado` ASC),
  CONSTRAINT `fk_Dictado_has_Alumno_Dictado1`
    FOREIGN KEY (`idDictado`)
    REFERENCES `dictados`.`Dictado` (`idDictado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dictado_has_Alumno_Alumno1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dictados`.`Alumno` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
