INSERT INTO `products` (`Id_prod`, `name_de`, `name_fr`, `FK_type_Id`, `FK_brand_Id`, `price`, `imgSrc`, `alcPercent`, `energy`) VALUES
(1, 'Original', 'Original', 1, 1, '1.20', 'FeldOriginal.png', 5, 41),
(2, 'Hopfenperle', 'Hopfenperle', 2, 1, '2.20', 'hofpenperle.png', 6, 44),
(3, 'Braufrisch', 'Braufrisch', 1, 1, '1.70', 'braufrisch.png', 2, 500),
(4, 'Ice', 'Ice', 1, 1, '2.50', 'ice.png', 6.5, 456),
(5, 'Dunkel', 'Brune', 3, 1, '3.00', 'dunkel.png', 4.6, 48),
(6, 'Pale Ale', 'Pale Ale', 5, 1, '2.60', 'paleale.png', 5.2, 40),
(7, 'Original', 'Original', 1, 2, '2.30', 'heinOriginal.png', 5.2, 39),
(8, 'West Coast Ale', 'West Coast Ale', 5, 3, '4.95', 'blz-west-coast.png', 5.2, 600);

INSERT INTO `types` (`Id_type`, `name`) VALUES
(1, 'Lager'),
(2, 'Amber'),
(3, 'Dark Lager'),
(5, 'Pale Ale');

INSERT INTO `brands` (`Id_brand`, `name`) VALUES
(1, 'Feldschl&ouml;schen'),
(2, 'Heineken'),
(3, 'BLZ');
