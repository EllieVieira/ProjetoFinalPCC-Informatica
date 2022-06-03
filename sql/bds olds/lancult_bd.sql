-- MySQL Script generated by MySQL Workbench
-- Thu May  5 15:52:41 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lancult_bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lancult_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lancult_bd` DEFAULT CHARACTER SET utf8 ;
USE `lancult_bd` ;

-- -----------------------------------------------------
-- Table `lancult_bd`.`PAISES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`PAISES` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lancult_bd`.`TIPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`TIPO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lancult_bd`.`USUARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`USUARIOS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(80) NOT NULL,
  `EMAIL` VARCHAR(255) NOT NULL,
  `PASSWORD` VARCHAR(100) NOT NULL,
  `DATA_CADASTRAMENTO` DATETIME DEFAULT NOW(),
  `PAISES_ID` INT NOT NULL,
  `TIPO_ID` INT NOT NULL,
  `STATUS` ENUM('ATIVO', 'INATIVO') NULL DEFAULT 'ATIVO',
  `PERFIL` ENUM('ADMIN', 'USUARIO') NULL DEFAULT 'USUARIO',
  PRIMARY KEY (`ID`),
  INDEX `fk_USUARIOS_PAISES1_idx` (`PAISES_ID` ASC),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  INDEX `fk_USUARIOS_TIPO1_idx` (`TIPO_ID` ASC),
  CONSTRAINT `fk_USUARIOS_PAISES1`
    FOREIGN KEY (`PAISES_ID`)
    REFERENCES `lancult_bd`.`PAISES` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_TIPO1`
    FOREIGN KEY (`TIPO_ID`)
    REFERENCES `lancult_bd`.`TIPO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lancult_bd`.`IDIOMAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`IDIOMAS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lancult_bd`.`DISCURSAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`DISCURSAO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `TITULO` VARCHAR(50) NOT NULL,
  `DESCRICAO` VARCHAR(255) NOT NULL,
  `DATA` DATETIME DEFAULT NOW(),
  `IMAGEM` VARCHAR(255) NULL,
  `ATIVO` ENUM('ATIVO', 'INATIVO') NULL DEFAULT 'ATIVO',
  `USUARIOS_ID` INT NOT NULL,
  `IDIOMAS_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_DISCURSAO_USUARIOS1_idx` (`USUARIOS_ID` ASC),
  INDEX `fk_DISCURSAO_IDIOMAS1_idx` (`IDIOMAS_ID` ASC),
  CONSTRAINT `fk_DISCURSAO_USUARIOS1`
    FOREIGN KEY (`USUARIOS_ID`)
    REFERENCES `lancult_bd`.`USUARIOS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DISCURSAO_IDIOMAS1`
    FOREIGN KEY (`IDIOMAS_ID`)
    REFERENCES `lancult_bd`.`IDIOMAS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lancult_bd`.`RESPOSTAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lancult_bd`.`RESPOSTAS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `DESCRICAO` VARCHAR(255) NOT NULL,
  `DATA` DATETIME DEFAULT NOW(),
  `PONTUACAO` TINYINT NOT NULL DEFAULT 1,
  `DISCURSAO_ID` INT NOT NULL,
  `USUARIOS_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_RESPOSTAS_DISCURSAO1_idx` (`DISCURSAO_ID` ASC),
  INDEX `fk_RESPOSTAS_USUARIOS1_idx` (`USUARIOS_ID` ASC),
  CONSTRAINT `fk_RESPOSTAS_DISCURSAO1`
    FOREIGN KEY (`DISCURSAO_ID`)
    REFERENCES `lancult_bd`.`DISCURSAO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RESPOSTAS_USUARIOS1`
    FOREIGN KEY (`USUARIOS_ID`)
    REFERENCES `lancult_bd`.`USUARIOS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `idiomas` (`ID`, `NOME`) VALUES
(1, 'Portuguese'),
(2, 'English'),
(3, 'Spanish'),
(4, 'French');


INSERT INTO `paises` (`ID`, `NOME`) VALUES
(1, 'Brazil'),
(2, 'UK'),
(3, 'USA'),
(4, 'Spain'),
(5, 'French');


INSERT INTO `tipo` (`ID`, `NOME`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Native');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;