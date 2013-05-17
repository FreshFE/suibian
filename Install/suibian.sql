SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `suibian3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `suibian3` ;

-- -----------------------------------------------------
-- Table `suibian3`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(100) NOT NULL ,
  `username` VARCHAR(20) NOT NULL ,
  `password` CHAR(40) NOT NULL ,
  `password_salt` CHAR(32) NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `coverpath` CHAR(26) NOT NULL ,
  `role` VARCHAR(20) NOT NULL COMMENT '用户角色' ,
  `buy_counts` INT UNSIGNED NOT NULL COMMENT '购买数量' ,
  `total_credits` INT UNSIGNED NOT NULL COMMENT '积分' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`login_log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`login_log` (
  `int` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `ip` CHAR(15) NOT NULL ,
  `phone_dev` VARCHAR(60) NOT NULL ,
  `login_type` VARCHAR(45) NOT NULL ,
  `useragent` VARCHAR(255) NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`int`) ,
  INDEX `fk_login_record_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_login_record_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian3`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`shop_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`shop_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `fid` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(15) NOT NULL ,
  `fullname` VARCHAR(45) NOT NULL ,
  `priority` TINYINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`shop`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`shop` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `shop_category_id` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `descripe` VARCHAR(255) NOT NULL ,
  `content` VARCHAR(500) NOT NULL ,
  `startline` INT UNSIGNED NOT NULL ,
  `endline` INT UNSIGNED NOT NULL ,
  `closing` TINYINT UNSIGNED NOT NULL COMMENT '0 => 开门，1 => 关门' ,
  `close_msg` VARCHAR(255) NOT NULL ,
  `hidden` TINYINT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  `coverpath` CHAR(26) NOT NULL ,
  `address` VARCHAR(255) NOT NULL COMMENT '商店地址' ,
  `areaname` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_shops_category_cid_idx` (`shop_category_id` ASC) ,
  CONSTRAINT `fk_shops_category_cid`
    FOREIGN KEY (`shop_category_id` )
    REFERENCES `suibian3`.`shop_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`product_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`product_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `shop_id` INT UNSIGNED NOT NULL ,
  `fid` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(15) NOT NULL ,
  `fullname` VARCHAR(45) NOT NULL ,
  `priority` TINYINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_product_category_shop_id_idx` (`shop_id` ASC) ,
  CONSTRAINT `fk_product_category_shop_id`
    FOREIGN KEY (`shop_id` )
    REFERENCES `suibian3`.`shop` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `product_categoty_id` INT UNSIGNED NOT NULL ,
  `shop_id` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `price` DECIMAL(12,2) NOT NULL ,
  `content` VARCHAR(500) NOT NULL ,
  `hidden` TINYINT UNSIGNED NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  `coverpath` CHAR(26) NOT NULL ,
  `buy_counts` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_product_prodcut_category_id_idx` (`product_categoty_id` ASC) ,
  CONSTRAINT `fk_product_prodcut_category_id`
    FOREIGN KEY (`product_categoty_id` )
    REFERENCES `suibian3`.`product_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `shop_id` INT UNSIGNED NOT NULL ,
  `price` DECIMAL(12,2) UNSIGNED NOT NULL ,
  `school` VARCHAR(100) NOT NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `receiver` VARCHAR(50) NOT NULL ,
  `phone` VARCHAR(20) NOT NULL ,
  `status` TINYINT UNSIGNED NOT NULL COMMENT '订单状态。\n0 => 订单被创建，但是未执行，\n100 => 订单在处理中，\n200 => 订单在配送中，\n300 => 订单已经完成。' ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_user_user_id_idx` (`user_id` ASC) ,
  INDEX `fk_orders_shop_id_idx` (`shop_id` ASC) ,
  CONSTRAINT `fk_orders_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian3`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shop_id`
    FOREIGN KEY (`shop_id` )
    REFERENCES `suibian3`.`shop` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`orders_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`orders_product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `orders_id` INT UNSIGNED NOT NULL ,
  `product_id` INT UNSIGNED NOT NULL ,
  `num` INT UNSIGNED NOT NULL COMMENT '单位数量' ,
  `createline` INT UNSIGNED NOT NULL ,
  `updateline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_goods_orders_id_idx` (`orders_id` ASC) ,
  INDEX `fk_orders_goods_goods_id_idx` (`product_id` ASC) ,
  CONSTRAINT `fk_orders_product_orders_id`
    FOREIGN KEY (`orders_id` )
    REFERENCES `suibian3`.`orders` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_product_product_id`
    FOREIGN KEY (`product_id` )
    REFERENCES `suibian3`.`product` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`receive_address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`receive_address` (
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
    REFERENCES `suibian3`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suibian3`.`image`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`image` (
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


-- -----------------------------------------------------
-- Table `suibian3`.`shop_manager`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `suibian3`.`shop_manager` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `shop_id` INT UNSIGNED NOT NULL ,
  `role` VARCHAR(20) NOT NULL ,
  `createline` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `UNIQUE_user_id_shop_id` (`user_id` ASC, `shop_id` ASC) ,
  INDEX `fk_shop_manager_shop_id_idx` (`shop_id` ASC) ,
  INDEX `fk_shop_manager_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_shop_manager_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `suibian3`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shop_manager_shop_id`
    FOREIGN KEY (`shop_id` )
    REFERENCES `suibian3`.`shop` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `suibian3` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
