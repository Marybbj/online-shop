/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2018-03-21 16:09:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_product` int(11) DEFAULT NULL,
  `top_product` int(255) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'our product', '5', '500.00', 'no_img.png', '3', null, null, '50');
INSERT INTO `products` VALUES ('2', 'camera', '3', '800.00', 'camera.jpeg', '6', '1', '1', '80');
INSERT INTO `products` VALUES ('3', 'iphoneX', '7', '900.00', 'iphoneX.jpg', '2', null, null, '90');
INSERT INTO `products` VALUES ('6', 'mac book', '10', '1050.00', 'macBook.jpg', '6', null, null, '105');
INSERT INTO `products` VALUES ('7', 'earphone xiaomi', '6', '70.00', 'earphone.jpg', '2', '1', null, '7');
INSERT INTO `products` VALUES ('8', 'watch xiaomi', '1', '200.00', 'watch.jpg', '3', '1', '1', '20');
INSERT INTO `products` VALUES ('9', 'product', '12', '130.00', '', '10', null, null, '13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `userfile` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `false_pass` varchar(255) NOT NULL,
  `block_time` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `login_time` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'John', 'Smith', 'j.s@gmail.com', '$2y$10$zCctCjxhS0ODUd3aFT.CTe4oXWWHBwpHL/0EkUxgZauRgHWAg0QDm', 'none.png', null, '3', '1519923196', '50', '1521217300');
INSERT INTO `users` VALUES ('2', 'Alex', 'Toney', 'alex@gmail.com', '$2y$10$5YS5hTvgz9gwoDe0P3cmFO43nlTgCZeQxBjwsWnd4MvUAPomtYdFm', 'al.jpg', null, '3', null, '30', null);
INSERT INTO `users` VALUES ('3', 'Alen', 'Brook', 'brook@gmail.com', '$2y$10$8cPAQcbBG5XrwO7NGNJd1OV1.nQbZb0cjahAVharWdft6cmm8DbX2', 'alenn.jpg', null, '', null, '5', null);
INSERT INTO `users` VALUES ('4', 'Alice', 'Baghi', 'bagh@gmail.com', '$2y$10$DwoZm2MBZro2Dz5s2nTDAOkWtm2d48.ElZQvLjWLDIZWR1/u1SfeK', 'none.png', null, '1', null, '100', null);
INSERT INTO `users` VALUES ('5', 'Agnes', 'Watmyne', 'watmy@gmail.com', '$2y$10$RO9oF8zSWMoH6nnHEDvJ..AHYxLLPNz/u1zyfUDsLeaTLrQDQwTKy', 'none.png', null, '', null, '60', null);
INSERT INTO `users` VALUES ('6', 'Mary', 'Babajanyan', 'mry.bbj@gmail.com', '$2y$10$qYuHQmQXNCNH.gbooRyYDu5Jdi02wPA72dLC9tFHX7RG9xUbAOgzG', 'mary.jpg', '1', '0', '1520003268', '700', '1521634118');
INSERT INTO `users` VALUES ('7', 'Arni', 'Lucys', 'ar.ly@gmail.com', '$2y$10$YvsQJK5ogh2KDckXGaLQEe/bAgz1w3OESRRDCHtInS0ngRukv/WHe', 'none.png', null, '', null, '600', null);
INSERT INTO `users` VALUES ('8', 'Nane', 'Zen-Wood', 'nane.zen@mail.com', '$2y$10$kWTrNisKXKEiIxfu/L6g/OCa1HuKnwuqv9KPLNPSd5MtUsmbwpmfm', 'none.png', null, '', null, '9', null);
INSERT INTO `users` VALUES ('9', 'Armen', 'Marjinyan', 'armen@gmail.com', '$2y$10$qYuHQmQXNCNH.gbooRyYDu5Jdi02wPA72dLC9tFHX7RG9xUbAOgzG', 'none.png', null, '0', null, '600', '1521631593');
INSERT INTO `users` VALUES ('10', 'amo', 'margyan', 'am@gmail.com', '$2y$10$xbPf1WxM9vBjYWWgZhSzTe2PZJNbZRj.1sWadiGctt3bX3Njbv9g2', '12.png', null, '0', null, null, '1521575336');
