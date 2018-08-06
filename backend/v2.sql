ALTER TABLE `cinci_dance`.`user` 
CHANGE COLUMN `email` `email` VARCHAR(100) NOT NULL ,
ADD COLUMN `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `create_time` ;

ALTER TABLE `cinci_dance`.`contact` 
CHANGE COLUMN `lname` `lname` VARCHAR(100) NOT NULL ,
CHANGE COLUMN `relationship` `relationship` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `address` `address` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `city` `city` VARCHAR(100) NULL DEFAULT NULL ,
ADD COLUMN `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `user` ,
ADD COLUMN `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `create_time` ;

ALTER TABLE `cinci_dance`.`student` 
CHANGE COLUMN `fname` `fname` VARCHAR(100) NOT NULL ,
CHANGE COLUMN `lname` `lname` VARCHAR(100) NOT NULL ,
CHANGE COLUMN `school_district` `school_district` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `grade` `grade` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `medical_info` `medical_info` VARCHAR(500) NULL DEFAULT NULL ,
ADD COLUMN `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `contact` ,
ADD COLUMN `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `create_time`;

ALTER TABLE `cinci_dance`.`payment` 
CHANGE COLUMN `inserted_date` `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `status`,
CHANGE COLUMN `updated_date` `update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ;