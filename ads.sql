-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2012 at 04:04 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(4, 'admin', 'admin', '2012-05-21'),
(11, 'johnrosemale', 'elamesor_11', '2012-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(50) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `details`, `date_added`) VALUES
(130, 'Natasha', 'Natasha Products', '2012-08-09'),
(127, 'Avon', 'All about Avon.', '2012-08-08'),
(128, 'Personal Collection (PC)', 'Personal Collection Products', '2012-08-09'),
(131, 'Ever Bilena', 'Ever Bilena Collection', '2012-08-09'),
(136, 'Marikina Shoe Exchange (MSE)', 'All about MSE products ... ', '2012-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(25) NOT NULL AUTO_INCREMENT,
  `dealerID` int(25) NOT NULL,
  `orderDate` date NOT NULL,
  `instructions` text NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `product_qty` int(50) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`) VALUES
(1, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(80) NOT NULL,
  `details` varchar(100) NOT NULL,
  `price` decimal(50,2) DEFAULT NULL,
  `qty` int(100) NOT NULL,
  `date` date NOT NULL,
  `subcategory_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `details`, `price`, `qty`, `date`, `subcategory_id`) VALUES
(115, 'Brizelda', 'Size/s: S, M, L, XL Color: Gray', '560.00', 7, '0000-00-00', 30),
(116, 'Cazy', 'Sizes: S, M, L, XL Color: Yellow', '450.00', 6, '0000-00-00', 30),
(114, 'Flex', 'Man-made Leather, Sole Rubber, Sizes: 50-90 Color: White', '1180.00', 15, '0000-00-00', 54),
(117, 'Atom', 'Semi Body Fit Sizes: s, m, l, xl Color: white', '550.00', 4, '0000-00-00', 31),
(118, 'Carley', 'Sizes: S, M, L, XL Color: Pink', '595.00', 4, '0000-00-00', 34),
(119, 'Carmen Underwire Brassiere', 'Multi-color underwear', '399.00', 3, '0000-00-00', 29),
(125, 'Maliah', 'Size/s: S, M, L, XL\r\nColor: orange', '920.00', 3, '0000-00-00', 32),
(121, 'Keziah', 'Blouse Size: Small, Large, XLarge', '321.00', 4, '0000-00-00', 30),
(139, 'Asprey', 'Size/s: S, M, L, XL\r\nColor: BLue', '289.00', 4, '0000-00-00', 30),
(124, 'BURKE', 'Semi-Body Fit\r\nSize/s: S, M, L, XL\r\nColor: black', '500.00', 2, '0000-00-00', 31),
(126, 'Amalia', 'Size/s: S, M, L, XL\r\nColor: blue', '1020.00', 2, '0000-00-00', 32),
(127, 'PINK BLOOMS BODY SPRAY', 'Body Spray', '165.00', 5, '0000-00-00', 33),
(130, 'Bituin', 'Size/s: 50, 60, 70, 80, 90 Color: Off White', '410.00', 9, '0000-00-00', 43),
(109, 'Blissful Haiku Sunset', '4-Piece Layering Set', '943.00', 1, '0000-00-00', 27),
(154, 'Atom', 'Size/s: S, M, L, XL', '550.00', 4, '0000-00-00', 58),
(111, 'Imari Mystique', 'Hand and Body Lotion 150 mL', '119.00', 3, '0000-00-00', 25),
(140, 'Aloha', 'Size/s: S, M, L, XL Color: Red', '238.00', 5, '0000-00-00', 57),
(112, 'Liwanag', 'Upper: Man-made Leather\r\nSole: pu\r\nHeel height: 2 1/2"\r\nSize: 50-90\r\ncolor: Black', '695.00', 8, '0000-00-00', 54),
(146, 'Elmo', 'Size/s: s, m, l, xl Color: Blue', '405.00', 9, '0000-00-00', 59),
(128, 'MINI BRUSH SET', 'Mini Brush Set\r\nPreferred by professional make-up artists, this ultimate brush collection features b', '855.00', 3, '0000-00-00', 33),
(129, 'ALMOND BLOSSOMS HW', 'Hand Wash\r\nSize/s: 485ml', '120.00', 7, '0000-00-00', 33),
(131, 'Bev', 'Size/s: 50, 60, 70, 80, 90 Color: Blue', '950.00', 5, '0000-00-00', 43),
(132, 'Annielle', 'Color: Yellow, Pink, Brown', '235.00', 7, '0000-00-00', 43),
(133, 'Avon Make-up Color Lipstick', '', '254.00', 7, '0000-00-00', 28),
(134, 'Extra-lasting Mascara', 'Avon Lipstick Mascara', '300.00', 9, '0000-00-00', 28),
(138, 'makeup color ideal control', 'Avon Lipstick', '189.00', 6, '0000-00-00', 28),
(141, 'Celeste', 'Size/s: S, M, L, XL Color: Peach', '345.00', 4, '0000-00-00', 57),
(142, 'Charming', 'Size/s: S, M, L, XL Color: Brown', '300.00', 5, '0000-00-00', 57),
(143, 'Amor', 'Size/s: S, M, L, XL Color: Off - White', '440.00', 6, '0000-00-00', 57),
(144, 'Skin so Soft', 'Skin Care 250 mL', '185.00', 3, '0000-00-00', 25),
(145, 'Imari Mystique', 'Eau de Cologne Spray', '1000.00', 3, '0000-00-00', 27),
(147, 'Tuff', 'Tuff PLD with FabCon 800 g.', '158.50', 4, '0000-00-00', 36),
(150, 'HBS LiverProtect', 'Food Suplement 60 Capsule', '1030.00', 2, '0000-00-00', 37),
(151, 'Eternal Magic Enchanted', 'Eau de Toilet 50 mL', '629.00', 3, '0000-00-00', 27),
(153, 'Simply Delicate', 'Feminine Wash 400 mL', '175.00', 4, '0000-00-00', 26),
(155, 'Ark', 'Size/s: S, M, L, XL', '465.00', 4, '0000-00-00', 58),
(156, 'Ashburn', 'Sizes: 60-10 Color: White', '1100.00', 6, '0000-00-00', 54);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `salesID` int(50) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`salesID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `sub_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `subcategory` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `name`, `category_id`) VALUES
(28, 'Avon Make-Up', 127),
(27, 'Avon Fragrance', 127),
(26, 'Avon Personal Care', 127),
(30, 'Natasha Ladies Wear', 130),
(25, 'Avon Skin Care', 127),
(29, 'Avon Intimate Apparel', 127),
(31, 'Natasha Mens Wear', 130),
(32, 'Renee Salud Collection', 130),
(33, 'Natasha Beauty', 130),
(34, 'Natasha Kids', 130),
(36, 'PC Home Care', 128),
(37, 'PC Health Care', 128),
(59, 'MSE Kids', 136),
(58, 'MSE Mens Wear', 136),
(43, 'TRU Wear', 130),
(44, 'Ever Bilena Mens Fragrance', 131),
(45, 'Ever Bilena Ladies Fragrance', 131),
(46, 'Ever Bilena Advance', 131),
(47, 'Careline', 131),
(48, 'Ever Bilena Beauty', 131),
(57, 'MSE Ladies Wear', 136),
(54, 'MSE Footwear', 136);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `birthday` date NOT NULL,
  `date` date NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `cnum` varchar(100) NOT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `nationality` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `status` enum('Single','Married','Widowed') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `birthday`, `date`, `street`, `city`, `province`, `cnum`, `gender`, `nationality`, `bio`, `status`) VALUES
(127, 'Rosemarie Villacorta', 'mahree', '6228507dcce6751bf9e392ee9332a1e8', '0000-00-00', '2012-09-03', 'Quezon Street', 'Panabo City', 'Davao del Norte', '09306673054', 'Female', 'Filipino', 'better to know me well :)) hahah ...', 'Single'),
(107, 'Jellene Pastoral', 'jelai', '1c8e5ae4e6dbb61b56dddbccfc03d935', '0000-00-00', '2012-08-13', 'Jose abad santos', 'Panabo City', 'Davao del Norte', '09476922154', 'Female', 'Filipino', 'beautiful :P', 'Married'),
(131, 'Elena Gilbert', 'elena', 'e14c4ec12adad2f00980d8da23864c97', '0000-00-00', '2012-09-04', 'Catherine St.,', 'New York', 'USA', '09287798299', 'Female', 'Bulgarian', 'Likes: Adventurous Person, TVD Series, Bugatti Mc Clarence Cars, Ice Cream ^^', ''),
(105, 'Rosemale-John Villacorta', 'rosemalejohn', '0f63001c087a7fadcbcad219fa62358a', '0000-00-00', '2012-08-07', 'Quezon Street', 'Panabo City', 'Davao del Norte', '09103235491', 'Male', 'Filipino', '"Sorry for the inconvenience, Brain is under construction."', 'Single'),
(123, 'maxwell chavez maluenda', 'maxwell', '2a7d544ccb742bd155e55c796de8e511', '0001-01-01', '2012-09-03', 'budbud', 'davao', 'davao del sur', '09129126200', 'Male', 'Filipino', 'testingggg', 'Single'),
(128, 'Apple Jean Y. Constancio', 'apple', '3d682a9968ca50cb9fb7e0c109de2179', '1990-09-09', '2012-09-04', 'Rempohito subdivsion', 'Panabo City', 'Davao del norte', '09487846461', 'Female', 'Filipino', 'simple', 'Single'),
(135, 'Florefie Remedios', 'florefie', 'a284bf18041238887ffa880e7c6d229e', '1991-01-03', '2012-09-21', 'San Vicente', 'Panabo City', 'Davao del Norte', '09103235491', 'Female', 'Filipino', 'better to know me ...', 'Single');
