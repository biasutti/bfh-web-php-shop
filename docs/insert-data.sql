INSERT INTO `products` (`name_de`, `name_fr`, `FK_type_Id`, `FK_brand_Id`, `price`, `imgSrc`, `alcPercent`, `energy`) VALUES
('Original', 'Original', 1, 1, '1.20', 'FeldOriginal.png', 5, 41),
('Hopfenperle', 'Hopfenperle', 2, 1, '2.20', 'hofpenperle.png', 6, 44),
('Braufrisch', 'Braufrisch', 1, 1, '1.70', 'braufrisch.png', 2, 500),
('Ice', 'Ice', 1, 1, '2.50', 'ice.png', 6.5, 456),
('Dunkel', 'Brune', 3, 1, '3.00', 'dunkel.png', 4.6, 48),
('Pale Ale', 'Pale Ale', 4, 1, '2.60', 'paleale.png', 5.2, 40),
('Original', 'Original', 1, 2, '2.30', 'heinOriginal.png', 5.2, 39),
('West Coast Ale', 'West Coast Ale', 4, 3, '4.95', 'blz-west-coast.png', 5.2, 600);

INSERT INTO `types` (`name`) VALUES
('Lager'),
('Amber'),
('Dark Lager'),
('Pale Ale');

INSERT INTO `brands` (`name`) VALUES
('Feldschl&ouml;schen'),
('Heineken'),
('BLZ');
