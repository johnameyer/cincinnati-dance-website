ALTER TABLE `cinci_dance`.`user` 
ADD COLUMN `admin` INT(1) NOT NULL DEFAULT 0 AFTER `forgot_password`;