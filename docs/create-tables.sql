SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `brands`
(
    `Id_brand` int(11)     NOT NULL,
    `name`     varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `products`
(
    `Id_prod`     int(11) NOT NULL,
    `name_de`     varchar(50)   DEFAULT NULL,
    `name_fr`     varchar(50)   DEFAULT NULL,
    `FK_type_Id`  int(11) NOT NULL,
    `FK_brand_Id` int(11) NOT NULL,
    `price`       decimal(9, 2) DEFAULT NULL,
    `imgSrc`      varchar(30)   DEFAULT NULL,
    `alcPercent`  double        DEFAULT NULL,
    `energy`      double        DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `users`
(
    `Id_user`       int(11) NOT NULL,
    `email`         varchar(50) DEFAULT NULL,
    `firstname`     varchar(50) DEFAULT NULL,
    `lastname`      varchar(50) DEFAULT NULL,
    `password`      CHAR(32)    DEFAULT NULL,
    `birthdate`     DATE        DEFAULT NULL,
    `FK_address_Id` int(11) NOT NULL,
    `FK_bill_address_Id` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `types`
(
    `Id_type` int(11) NOT NULL,
    `name`    varchar(50) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `brands`
    ADD PRIMARY KEY (`Id_brand`);

ALTER TABLE `products`
    ADD PRIMARY KEY (`Id_prod`),
    ADD UNIQUE KEY `Id_prod` (`Id_prod`);

ALTER TABLE `types`
    ADD PRIMARY KEY (`Id_type`),
    ADD UNIQUE KEY `Id_type` (`Id_type`);

ALTER TABLE `brands`
    MODIFY `Id_brand` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

ALTER TABLE `products`
    MODIFY `Id_prod` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;

ALTER TABLE `types`
    MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
