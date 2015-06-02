--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(256) NOT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `price` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `timestamp`, `name`, `url`, `image`, `price`) VALUES
(1, '2013-11-28 22:33:27', 'Wenger Schweizer Offiziersmesser Giant Messer', 'http://www.amazon.de/Wenger-Schweizer-Offiziersmesser-Messer-Schatulle/dp/B000R0JDSI?tag=pcw2-21', 'http://ecx.images-amazon.com/images/I/61ABQA%2Bgt8S._SX342_.jpg', '731,54'),
(2, '2013-11-28 22:34:55', '1/2 Million Euro Schreddergeld als Barren', 'http://www.amazon.de/Million-Euro-Schreddergeld-als-Barren/dp/B004BWPJZ4?tag=pcw2-21', 'http://ecx.images-amazon.com/images/I/21VqS2zDmDL.jpg', '24,95'),
(3, '2013-11-28 22:34:03', 'Lynx Suborbital-Flug', 'http://www.amazon.de/meventi-Erlebnisgutscheine-Lynx-Suborbital-Flug/dp/B003GAHHFM?tag=pcw2-21', 'http://ecx.images-amazon.com/images/I/410ayNu5qfL._SX342_.jpg', '95.000,00'),
(4, '2013-11-28 22:32:19', 'Cutting Maschine Pro', 'http://www.amazon.de/gp/product/B002Z8JEBG/?tag=pcw2-21', 'http://ecx.images-amazon.com/images/I/41Bcv0vMzVL._SX342_.jpg', '4.890,00'),
(5, '2013-11-28 22:27:40', 'S.T. Dupont NY 5th Avenue Diamonds', 'http://www.amazon.de/gp/product/B001W74UJ2/?tag=pcw2-21', 'http://ecx.images-amazon.com/images/I/41B9NRJXA-L._SX355_.jpg', '24.900,00'),
(6, '2013-11-28 22:20:52', 'PHP 5.4 und MySQL 5.6 für Dummies', 'http://www.amazon.de/PHP-5-4-MySQL-5-6-Dummies/dp/352770874X/ref=sr_1_1?ie=UTF8&qid=1385677220&sr=8-1&keywords=php+dummies', 'http://ecx.images-amazon.com/images/I/51zHTTBvcDL._BO2,204,203,200_PIsitb-sticker-arrow-click,TopRight,35,-76_SX342_SY445_CR,0,0,342,445_SH20_OU03_.jpg', '19,95'),
(7, '2013-11-28 22:19:18', 'Erzi Salatkopf aus Holz', 'http://www.amazon.de/Erzi-Salatkopf-aus-Holz/dp/B004OY3D5C/ref=sr_1_cc_2?s=aps&ie=UTF8&qid=1385677092&sr=1-2-catcorr&keywords=salatkopf', 'http://ecx.images-amazon.com/images/I/51Mb6jG6wkL._SX342_.jpg', '10,57'),
(8, '2013-11-28 22:17:22', 'Erwachsene Socken 3-er Pack', 'http://www.amazon.de/s-Oliver-Unisex-Erwachsene-Mehrfarbig-festival/dp/B00B9OTC3M/ref=sr_1_33?s=apparel&ie=UTF8&qid=1385676967&sr=1-33', 'http://ecx.images-amazon.com/images/I/91e4nwQcSiL._SX342_.jpg', '7,95'),
(9, '2013-11-28 21:16:22', 'Space Pen', 'http://www.amazon.com/Fisher-Space-Pen-Bullet-400/dp/B000095K9D', 'http://ecx.images-amazon.com/images/I/51-N87HWnsL._SY450_.jpg', '15,22');