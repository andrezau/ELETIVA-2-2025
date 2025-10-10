-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idusu` INT NOT NULL AUTO_INCREMENT,
  `nomeusu` VARCHAR(255) NOT NULL,
  `emailusu` VARCHAR(255) NOT NULL,
  `senhausu` TEXT NOT NULL,
  PRIMARY KEY (`idusu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `idcat` INT NOT NULL AUTO_INCREMENT,
  `nomecat` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idcat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
  `idprod` INT NOT NULL AUTO_INCREMENT,
  `descricaoprod` VARCHAR(255) NOT NULL,
  `valorprod` DECIMAL(8,2) NOT NULL,
  `categoria_idcat` INT NOT NULL,
  PRIMARY KEY (`idprod`),
  INDEX `fk_produto_categoria_idx` (`categoria_idcat` ASC),
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`categoria_idcat`)
    REFERENCES `mydb`.`categoria` (`idcat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
