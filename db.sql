-- database name :test

-- table: todo
CREATE TABLE `todo` ( `Id` INT NOT NULL AUTO_INCREMENT , `Value` VARCHAR(4000) NOT NULL , `Submit` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `Username` VARCHAR(300) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;