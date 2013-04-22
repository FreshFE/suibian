SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `suibian` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `suibian` ;

-- -----------------------------------------------------
-- Table `suibian`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(100) NOT NULL ,
  `username` VARCHAR(20) NOT NULL ,
  `password` CHAR(40) NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`user_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`user_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `role_id` INT UNSIGNED NOT NULL ,
  `typeof` CHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_user_role_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_user_role_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`login_record`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`login_record` (
  `int` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `ip` CHAR(15) NOT NULL ,
  PRIMARY KEY (`int`) ,
  INDEX `fk_login_record_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_login_record_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`category` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `fid` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(15) NOT NULL ,
  `fullname` VARCHAR(45) NOT NULL ,
  `priority` TINYINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`cid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`food`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`food` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cid` INT UNSIGNED NOT NULL ,
  `shop_id` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `price` DECIMAL(12,2) NOT NULL ,
  `content` VARCHAR(500) NOT NULL ,
  `hidden` TINYINT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  `coverpath` CHAR(26) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_goods_category_cid_idx` (`cid` ASC) ,
  CONSTRAINT `fk_goods_category_cid`
    FOREIGN KEY (`cid` )
    REFERENCES `suibian`.`category` (`cid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`shop`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`shop` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cid` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `content` VARCHAR(500) NOT NULL ,
  `hidden` TINYINT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  `coverpath` CHAR(26) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_shops_category_cid_idx` (`cid` ASC) ,
  CONSTRAINT `fk_shops_category_cid`
    FOREIGN KEY (`cid` )
    REFERENCES `suibian`.`category` (`cid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `code` INT UNSIGNED NOT NULL ,
  `price` DECIMAL(12,2) UNSIGNED NOT NULL ,
  `school` VARCHAR(100) NOT NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `receiver` VARCHAR(50) NOT NULL ,
  `status` TINYINT NOT NULL COMMENT '订单状态。\\n0 => 订单被创建，但是未执行，\\n100 => 订单在处理中，\\n200 => 订单在配送中，\\n300 => 订单已经完成。' ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_user_user_id_idx` (`user_id` ASC) ,
  UNIQUE INDEX `code_UNIQUE` (`code` ASC) ,
  CONSTRAINT `fk_orders_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`orders_food`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`orders_food` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `orders_id` INT UNSIGNED NOT NULL ,
  `food_id` INT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_goods_orders_id_idx` (`orders_id` ASC) ,
  INDEX `fk_orders_goods_goods_id_idx` (`food_id` ASC) ,
  CONSTRAINT `fk_orders_goods_orders_id`
    FOREIGN KEY (`orders_id` )
    REFERENCES `suibian`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_goods_goods_id`
    FOREIGN KEY (`food_id` )
    REFERENCES `suibian`.`food` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`receive_address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`receive_address` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `school` VARCHAR(100) NOT NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `receiver` VARCHAR(50) NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_receive_address_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_receive_address_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian`.`image`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian`.`image` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` CHAR(26) NOT NULL ,
  `basepath` CHAR(16) NOT NULL ,
  `typepath` CHAR(1) NOT NULL ,
  `subpath` CHAR(8) NOT NULL ,
  `savepath` CHAR(26) NOT NULL ,
  `saverule` CHAR(13) NOT NULL ,
  `originalname` VARCHAR(100) NOT NULL ,
  `type` VARCHAR(30) NOT NULL ,
  `extension` CHAR(4) NOT NULL ,
  `size` INT UNSIGNED NOT NULL ,
  `thumbname` VARCHAR(50) NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
