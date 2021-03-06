SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS brands;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS types;
DROP TABLE IF EXISTS address;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS orders_products;

CREATE TABLE brands
(
    Id_brand            int(11)         AUTO_INCREMENT      PRIMARY KEY,
    name                varchar(50)     NOT NULL
);

CREATE TABLE products
(
    Id_prod             int(11)         AUTO_INCREMENT      PRIMARY KEY,
    name_de             varchar(50)     DEFAULT NULL,
    name_fr             varchar(50)     DEFAULT NULL,
    FK_type_Id          int(11)         NOT NULL,
    FK_brand_Id         int(11)         NOT NULL,
    price               decimal(9, 2)   DEFAULT NULL,
    imgSrc              varchar(30)     DEFAULT NULL,
    alcPercent          double          DEFAULT NULL,
    energy              double          DEFAULT NULL
);

CREATE TABLE users
(
    Id_user             int(11)         AUTO_INCREMENT      PRIMARY KEY,
    email               varchar(50)     DEFAULT NULL,
    firstname           varchar(50)     DEFAULT NULL,
    lastname            varchar(50)     DEFAULT NULL,
    password            varchar(255)    DEFAULT NULL,
    birthdate           DATE            DEFAULT NULL,
    FK_address_Id       int(11)         NOT NULL,
    FK_bill_address_Id  int(11)         NOT NULL,
    isAdmin             boolean
);

CREATE TABLE `types`
(
    Id_type             int(11)         AUTO_INCREMENT      PRIMARY KEY,
    name                varchar(50)     DEFAULT NULL
);

CREATE TABLE `address`
(
    Id_address          int(11)         AUTO_INCREMENT      PRIMARY KEY,
    street              varchar(100)    DEFAULT NULL,
    town                varchar(50)     DEFAULT NULL,
    zip                 varchar(11)     DEFAULT NULL,
    country             varchar(75)     DEFAULT NULL
);

CREATE TABLE `orders`
(
    Id_order            int(11)         AUTO_INCREMENT      PRIMARY KEY,
    FK_user_Id          int(11)         NOT NULL,
    order_date          datetime        NOT NULL
);

CREATE TABLE `orders_products`
(
    FK_order_Id         int(11)         NOT NULL,
    FK_product_Id       int(11)         NOT NULL,
    quantity            int(11)         NOT NULL
)

COMMIT;