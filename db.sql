-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema phpversion
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema phpversion
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `phpversion` DEFAULT CHARACTER SET latin1 ;
USE `phpversion` ;

-- -----------------------------------------------------
-- Table `phpversion`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpversion`.`admin` (
  `admin_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `phpversion`.`origin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpversion`.`origin` (
  `nationality_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nationality` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`nationality_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `phpversion`.`members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpversion`.`members` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NULL DEFAULT NULL,
  `lname` VARCHAR(45) NULL DEFAULT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `origin_nationality_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_members_origin_idx` (`origin_nationality_id` ASC),
  CONSTRAINT `fk_members_origin`
    FOREIGN KEY (`origin_nationality_id`)
    REFERENCES `phpversion`.`origin` (`nationality_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
