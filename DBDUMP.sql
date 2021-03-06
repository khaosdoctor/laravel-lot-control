-- MySQL Script generated by MySQL Workbench
-- 12/15/16 22:02:32
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lot_control
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lot_control
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lot_control` DEFAULT CHARACTER SET utf8 ;
USE `lot_control` ;

-- -----------------------------------------------------
-- Table `lot_control`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lot_control`.`produto` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `barcode` VARCHAR(255) NOT NULL,
  `insertion_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lot_control`.`lote`lotelotelote
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lot_control`.`lote` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(200) NOT NULL,
  `qty_lot` REAL NOT NULL DEFAULT 0,
  `expire` DATE NOT NULL,
  `insertion_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `produto_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `produto_id`),
  CONSTRAINT `fk_lote_produto`
    FOREIGN KEY (`produto_id`)
    REFERENCES `lot_control`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_lote_produto_idx` ON `lot_control`.`lote` (`produto_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
