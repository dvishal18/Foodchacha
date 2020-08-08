-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2019 at 10:13 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bytotkyt_ioseresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `about_desc`) VALUES
(1, '<p>This is an online food ordering application for user can see menu and place order as per need. also we offer hot deals for discounts. We offer food delivery at their address within 30 min. Users get your food on time with cost lower then restaurnet.&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `email`, `phone`, `image`) VALUES
(1, 'Bytotech solution', 'admin@123', 'admin123', 'admin@gmail.com ', '+919601501313', 'profile.png'),
(2, 'Bytotech solution', 'admin', 'admin', 'bytotechsolution@gmail.com ', '+919601501313', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_ad`
--

CREATE TABLE `tbl_banner_ad` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_desc` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner_ad`
--

INSERT INTO `tbl_banner_ad` (`id`, `banner_name`, `banner_desc`, `banner_image`, `banner_url`) VALUES
(1, 'Aloo paratha', 'Aloo paratha is a whole wheat flatbread which is stuffed with spicy mashed potatoes. It’s usually enjoyed with butter, yogurt or pickle.', '15530_Aloo_Paratha.jpg', ''),
(2, 'Margherita pizza', 'Margherita Pizza has always been one of my favorite kinds of pizza. ', '94517_Margherita Pizzat.jpg', ''),
(3, 'Thepla', 'Gujarati Methi Thepla, a must try lightly spiced paratha like Indian flat-bread is prepared from wheat flour, fenugreek leaves and other spices. ', '27633_Thepla.jpg', ''),
(4, 'Masal Dosa', 'A popular South Indian dish, dosa is a delicious comfort food that you can eat in any given course of food. ', '24227_masala-dosa.jpg', ''),
(5, 'Pav bhaji', 'Pav Bhaji – a spicy curry of mixed vegetables (bhaji) cooked in a special blend of spices and served with soft buttered pav (bread bun shallow fried in butter), is any Indian food lover’s dream.', '26217_pav bhaji.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_qty` int(2) NOT NULL,
  `menu_price` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `menu_id`, `menu_name`, `menu_qty`, `menu_price`) VALUES
(10, 142, 33, 'Chicken fried bacon', 1, 180.00),
(11, 142, 33, 'Chicken fried bacon', 1, 180.00),
(14, 148, 33, 'Chicken fried bacon', 1, 180.00),
(25, 142, 32, 'Cajun cuisine', 1, 150.00),
(27, 161, 34, 'Fried rice', 2, 240.00),
(28, 161, 33, 'Chicken fried bacon', 3, 540.00),
(29, 142, 30, 'Chicken nugget', 1, 250.00),
(30, 142, 30, 'Chicken nugget', 1, 250.00),
(31, 142, 4, 'Aloo Paratha', 1, 50.00),
(32, 160, 27, 'Thepla', 2, 100.00),
(39, 162, 33, 'Chicken fried bacon', 3, 180.00),
(70, 166, 33, 'Chicken fried bacon', 2, 360.00),
(71, 166, 32, 'Cajun cuisine', 1, 150.00),
(75, 168, 33, 'Chicken fried bacon', 1, 180.00),
(76, 170, 32, 'Cajun cuisine', 2, 300.00),
(77, 171, 33, 'Chicken fried bacon', 1, 180.00),
(78, 169, 33, 'Chicken fried bacon', 1, 180.00),
(79, 169, 45, 'Martabak', 1, 85.00),
(80, 170, 18, 'Chinese Sticky Rice', 2, 300.00),
(81, 172, 31, 'Bear claw', 2, 420.00),
(85, 175, 32, 'Cajun cuisine', 1, 150.00),
(86, 175, 31, 'Bear claw', 1, 210.00),
(87, 175, 45, 'Martabak', 1, 85.00),
(88, 175, 44, 'Pepes ikan', 1, 60.00),
(89, 177, 50, 'Margherita Pizza', 1, 89.00),
(91, 179, 34, 'Fried rice', 1, 120.00),
(94, 181, 25, 'Sev Tometo', 1, 80.00),
(99, 182, 33, 'Chicken fried bacon', 1, 180.00),
(100, 182, 30, 'Chicken nugget', 4, 1000.00),
(105, 179, 18, 'Chinese Sticky Rice', 3, 450.00),
(113, 187, 33, 'Chicken fried bacon', 1, 180.00),
(116, 167, 33, 'Chicken fried bacon', 1, 180.00),
(118, 190, 55, 'Sweet Potato', 2, 90.00),
(119, 191, 33, 'Chicken fried bacon', 3, 540.00),
(120, 192, 51, 'Mushroom Risotto', 1, 95.00),
(121, 192, 15, 'Samosa', 3, 90.00),
(123, 194, 35, 'Kung Pao chicken', 1, 115.00),
(124, 195, 18, 'Chinese Sticky Rice', 2, 300.00),
(126, 197, 37, 'Cassoulet', 1, 95.00),
(129, 198, 33, 'Chicken fried bacon', 1, 180.00),
(131, 199, 33, 'Chicken fried bacon', 2, 360.00),
(133, 201, 43, 'Brezel', 1, 120.00),
(134, 201, 25, 'Sev Tometo', 1, 80.00),
(135, 201, 4, 'Aloo Paratha', 1, 50.00),
(138, 202, 33, 'Chicken fried bacon', 1, 180.00),
(139, 204, 35, 'Kung Pao chicken', 2, 230.00),
(140, 205, 33, 'Chicken fried bacon', 3, 540.00),
(142, 205, 50, 'Margherita Pizza', 2, 178.00),
(143, 206, 32, 'Cajun cuisine', 1, 150.00),
(144, 207, 33, 'Chicken fried bacon', 2, 360.00),
(146, 208, 46, ' Balado terong', 1, 80.00),
(149, 209, 33, 'Chicken fried bacon', 2, 360.00),
(150, 209, 32, 'Cajun cuisine', 2, 300.00),
(151, 209, 31, 'Bear claw', 2, 420.00),
(154, 210, 47, 'Ikan bakar', 1, 115.00),
(155, 210, 46, ' Balado terong', 1, 80.00),
(156, 210, 45, 'Martabak', 1, 85.00),
(157, 212, 33, 'Chicken fried bacon', 2, 360.00),
(158, 213, 33, 'Chicken fried bacon', 1, 180.00),
(159, 214, 33, 'Chicken fried bacon', 2, 360.00),
(169, 197, 38, 'Nicoise salad', 1, 125.00),
(170, 220, 33, 'Chicken fried bacon', 2, 360.00),
(172, 222, 33, 'Chicken fried bacon', 1, 180.00),
(173, 222, 32, 'Cajun cuisine', 1, 150.00),
(176, 223, 48, 'Bruschetta', 1, 135.00),
(177, 224, 39, 'Ratatouille', 1, 110.00),
(178, 224, 37, 'Cassoulet', 3, 285.00),
(196, 211, 39, 'Ratatouille', 1, 110.00),
(202, 230, 33, 'Chicken fried bacon', 3, 540.00),
(203, 230, 9, 'Idli Sambar', 2, 140.00),
(204, 232, 33, 'Chicken fried bacon', 2, 360.00),
(205, 234, 34, 'Fried rice', 4, 480.00),
(207, 234, 46, ' Balado terong', 3, 240.00),
(208, 234, 57, 'Korean Grilled Cheese Lobster', 5, 500.00),
(209, 234, 59, 'Hotteok', 4, 320.00),
(210, 234, 4, 'Aloo Paratha', 14, 700.00),
(217, 235, 39, 'Ratatouille', 2, 220.00),
(221, 209, 39, 'Ratatouille', 1, 110.00),
(223, 240, 35, 'Kung Pao chicken', 1, 115.00),
(225, 216, 31, 'Bear claw', 2, 420.00),
(228, 242, 32, 'Cajun cuisine', 2, 300.00),
(229, 242, 33, 'Chicken fried bacon', 1, 180.00),
(230, 242, 31, 'Bear claw', 1, 210.00),
(231, 242, 30, 'Chicken nugget', 1, 250.00),
(233, 243, 35, 'Kung Pao chicken', 3, 345.00),
(234, 243, 34, 'Fried rice', 2, 240.00),
(235, 243, 38, 'Nicoise salad', 1, 125.00),
(247, 245, 33, 'Chicken fried bacon', 3, 540.00),
(253, 180, 9, 'Idli Sambar', 1, 70.00),
(254, 180, 33, 'Chicken fried bacon', 1, 180.00),
(255, 246, 32, 'Cajun cuisine', 1, 150.00),
(257, 248, 32, 'Cajun cuisine', 2, 300.00),
(258, 223, 31, 'Bear claw', 1, 210.00),
(259, 223, 39, 'Ratatouille', 1, 110.00),
(262, 250, 38, 'Nicoise salad', 1, 125.00),
(263, 244, 43, 'Brezel', 5, 600.00),
(266, 236, 33, 'Chicken fried bacon', 1, 180.00),
(269, 251, 16, 'Pav bhaji', 1, 60.00),
(271, 254, 33, 'Chicken fried bacon', 3, 540.00),
(272, 170, 43, 'Brezel', 1, 120.00),
(284, 180, 30, 'Chicken nugget', 1, 250.00),
(287, 258, 57, 'Korean Grilled Cheese Lobster', 1, 100.00),
(290, 260, 33, 'Chicken fried bacon', 1, 180.00),
(291, 260, 42, 'Sauerbraten', 3, 145.00),
(293, 262, 35, 'Kung Pao chicken', 3, 115.00),
(300, 232, 56, 'Tteokbokki ', 2, 240.00),
(301, 265, 33, 'Chicken fried bacon', 1, 180.00),
(302, 259, 33, 'Chicken fried bacon', 2, 360.00),
(304, 266, 30, 'Chicken nugget', 1, 250.00),
(305, 267, 33, 'Chicken fried bacon', 1, 180.00),
(306, 267, 30, 'Chicken nugget', 1, 250.00),
(307, 269, 33, 'Chicken fried bacon', 1, 180.00),
(309, 274, 33, 'Chicken fried bacon', 2, 360.00),
(310, 274, 32, 'Cajun cuisine', 1, 150.00),
(311, 274, 16, 'Pav bhaji', 2, 120.00),
(312, 275, 27, 'Thepla', 1, 50.00),
(313, 273, 42, 'Sauerbraten', 2, 145.00),
(314, 273, 41, 'Eintopf', 1, 150.00),
(315, 273, 40, 'Rote grutze', 1, 120.00),
(316, 273, 43, 'Brezel', 1, 120.00),
(318, 275, 33, 'Chicken fried bacon', 1, 180.00),
(319, 276, 33, 'Chicken fried bacon', 1, 180.00),
(321, 277, 33, 'Chicken fried bacon', 1, 180.00),
(323, 278, 33, 'Chicken fried bacon', 4, 720.00),
(324, 278, 31, 'Bear claw', 1, 210.00),
(325, 279, 33, 'Chicken fried bacon', 1, 180.00),
(327, 167, 34, 'Fried rice', 1, 120.00),
(328, 280, 30, 'Chicken nugget', 1, 250.00),
(336, 250, 43, 'Brezel', 2, 240.00),
(341, 285, 34, 'Fried rice', 3, 120.00),
(342, 286, 33, 'Chicken fried bacon', 5, 900.00),
(343, 286, 49, ' Pasta Carbonara', 3, 255.00),
(344, 277, 52, 'Kare Pan', 1, 65.00),
(353, 270, 33, 'Chicken fried bacon', 1, 180.00),
(356, 216, 32, 'Cajun cuisine', 2, 300.00),
(357, 216, 30, 'Chicken nugget', 2, 500.00),
(358, 216, 33, 'Chicken fried bacon', 1, 180.00),
(359, 216, 35, 'Kung Pao chicken', 3, 345.00),
(360, 291, 52, 'Kare Pan', 4, 195.00),
(363, 292, 45, 'Martabak', 1, 85.00),
(364, 295, 33, 'Chicken fried bacon', 1, 180.00),
(365, 296, 33, 'Chicken fried bacon', 1, 180.00),
(369, 300, 32, 'Cajun cuisine', 1, 150.00),
(370, 300, 30, 'Chicken nugget', 1, 250.00),
(375, 184, 27, 'Thepla', 2, 100.00),
(376, 281, 34, 'Fried rice', 1, 120.00),
(377, 328, 8, 'Masal Dosa', 1, 100.00),
(378, 329, 9, 'Idli Sambar', 2, 70.00),
(379, 329, 16, 'Pav bhaji', 1, 60.00),
(380, 329, 15, 'Samosa', 1, 30.00),
(382, 329, 8, 'Masal Dosa', 1, 100.00),
(383, 329, 25, 'Sev Tometo', 1, 80.00),
(384, 280, 36, 'Soupe à l\'oignon', 3, 65.00),
(393, 354, 33, 'Chicken fried bacon', 1, 180.00),
(397, 250, 33, 'Chicken fried bacon', 1, 180.00),
(404, 350, 52, 'Kare Pan', 2, 130.00),
(407, 341, 33, 'Chicken fried bacon', 1, 180.00),
(409, 364, 33, 'Chicken fried bacon', 1, 180.00),
(414, 366, 33, 'Chicken fried bacon', 1, 180.00),
(416, 367, 25, 'Sev Tometo', 3, 240.00),
(417, 368, 33, 'Chicken fried bacon', 2, 360.00),
(419, 369, 37, 'Cassoulet', 2, 190.00),
(422, 371, 50, 'Margherita Pizza', 1, 89.00),
(424, 373, 33, 'Chicken fried bacon', 1, 180.00),
(427, 374, 53, 'Gyoza', 3, 165.00),
(430, 375, 27, 'Thepla', 2, 100.00),
(431, 375, 25, 'Sev Tometo', 2, 160.00),
(438, 378, 58, 'Eomuk Tang', 2, 220.00),
(447, 381, 56, 'Tteokbokki ', 8, 960.00),
(448, 382, 33, 'Chicken fried bacon', 3, 540.00),
(463, 390, 44, 'Pepes ikan', 2, 120.00),
(479, 395, 33, 'Chicken fried bacon', 1, 180.00),
(481, 392, 30, 'Chicken nugget', 1, 250.00),
(499, 400, 33, 'Chicken fried bacon', 1, 180.00),
(500, 400, 32, 'Cajun cuisine', 1, 150.00),
(501, 400, 30, 'Chicken nugget', 1, 250.00),
(511, 393, 35, 'Kung Pao chicken', 3, 345.00),
(514, 325, 33, 'Chicken fried bacon', 2, 360.00),
(531, 410, 33, 'Chicken fried bacon', 1, 180.00),
(533, 411, 33, 'Chicken fried bacon', 2, 360.00),
(534, 411, 31, 'Bear claw', 1, 210.00),
(535, 411, 30, 'Chicken nugget', 3, 750.00),
(538, 406, 34, 'Fried rice', 2, 240.00),
(542, 412, 33, 'Chicken fried bacon', 4, 720.00),
(592, 5, 42, 'Sauerbraten', 1, 145.00),
(598, 358, 34, 'Fried rice', 3, 360.00),
(603, 6, 36, 'Soupe à l\'oignon', 1, 65.00),
(612, 394, 25, 'Sev Tometo', 1, 80.00),
(616, 11, 17, 'Chinese noodles', 1, 100.00),
(617, 11, 39, 'Ratatouille', 10, 440.00),
(618, 358, 33, 'Chicken fried bacon', 1, 180.00),
(620, 12, 32, 'Cajun cuisine', 3, 450.00),
(621, 12, 50, 'Margherita Pizza', 1, 89.00),
(622, 12, 48, 'Bruschetta', 2, 270.00),
(624, 3, 27, 'Thepla', 1, 50.00),
(628, 15, 46, ' Balado terong', 6, 480.00),
(644, 0, 33, 'Chicken fried bacon', 1, 180.00),
(645, 0, 53, 'Gyoza', 1, 55.00),
(646, 0, 17, 'Chinese noodles', 1, 100.00),
(648, 21, 33, 'Chicken fried bacon', 1, 180.00),
(654, 12, 53, 'Gyoza', 1, 55.00),
(655, 325, 17, 'Chinese noodles', 2, 200.00),
(656, 27, 34, 'Fried rice', 1, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `total_rate` int(11) NOT NULL,
  `rate_avg` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_image`, `total_rate`, `rate_avg`, `status`) VALUES
(3, 'CHINESE', '1147_noodles.jpg', 3, '4', 1),
(7, 'INDIAN', '66627_indian-dinner.jpg', 2, '3', 1),
(8, 'JAPANESE', '69377_j-5685-286.jpg', 3, '3', 1),
(9, 'ITALIAN', '61998_margherita-pizza.jpg', 2, '4', 1),
(10, 'AMERICAN', '61437_american.jpg', 4, '4', 1),
(13, 'FRANCE', '81348_frances.jpg', 0, '', 1),
(14, 'GERMAN', '68963_HUMBURGER.jpg', 0, '', 1),
(15, 'INDONESIAN', '44310_indonesian-food.jpg', 0, '', 1),
(16, 'KOREAN', '52413_28587_17563_KOREAN.jpg', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `crt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`c_id`, `comment`, `user_id`, `menu_id`, `mid`, `crt_date`) VALUES
(20, 'nice food', 6, 24, 4, '0000-00-00 00:00:00'),
(21, 'nice food test', 49, 17, 21, '0000-00-00 00:00:00'),
(22, 'nice food test', 49, 17, 21, '0000-00-00 00:00:00'),
(23, 'nice food test', 68, 17, 21, '0000-00-00 00:00:00'),
(24, 'nice food test', 6, 17, 21, '0000-00-00 00:00:00'),
(25, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(26, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(38, 'haha', 6, 24, 27, '0000-00-00 00:00:00'),
(29, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(30, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(31, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(32, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(33, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(34, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(35, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(36, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(37, 'comment', 9, 17, 21, '0000-00-00 00:00:00'),
(40, 'gg', 9, 17, 21, '0000-00-00 00:00:00'),
(44, 'hahaha', 6, 17, 5, '0000-00-00 00:00:00'),
(42, 'xxx', 9, 17, 21, '0000-00-00 00:00:00'),
(43, 'kamlesh ', 9, 17, 21, '0000-00-00 00:00:00'),
(45, '', 0, 0, 0, '0000-00-00 00:00:00'),
(46, 'vg', 9, 23, 16, '0000-00-00 00:00:00'),
(47, 'jjjj', 6, 22, 28, '0000-00-00 00:00:00'),
(53, 'test menu', 6, 31, 23, '0000-00-00 00:00:00'),
(49, '', 0, 0, 0, '0000-00-00 00:00:00'),
(50, 'gg', 9, 26, 21, '0000-00-00 00:00:00'),
(51, 'cg', 9, 26, 21, '0000-00-00 00:00:00'),
(52, 'ffggg', 9, 26, 21, '0000-00-00 00:00:00'),
(54, 'cfd', 9, 24, 27, '0000-00-00 00:00:00'),
(55, 'fft', 9, 24, 27, '0000-00-00 00:00:00'),
(56, 'ff', 9, 35, 16, '0000-00-00 00:00:00'),
(57, 'hahaha', 6, 33, 24, '0000-00-00 00:00:00'),
(58, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(59, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(60, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(61, 'nice food test', 6, 17, 4, '0000-00-00 00:00:00'),
(62, 'nananan', 6, 33, 24, '0000-00-00 00:00:00'),
(63, 'hate', 6, 33, 24, '0000-00-00 00:00:00'),
(64, 'hahah', 6, 33, 24, '0000-00-00 00:00:00'),
(65, 'hahahah', 6, 33, 24, '0000-00-00 00:00:00'),
(66, 'hahaha', 6, 34, 27, '0000-00-00 00:00:00'),
(67, 'jajajaj', 6, 24, 27, '0000-00-00 00:00:00'),
(68, 'hahah', 6, 23, 16, '0000-00-00 00:00:00'),
(69, 'hahahaha', 6, 35, 16, '0000-00-00 00:00:00'),
(84, 'hi', 9, 54, 16, '0000-00-00 00:00:00'),
(71, 'nice food', 6, 24, 0, '0000-00-00 00:00:00'),
(72, 'nice food', 6, 24, 0, '0000-00-00 00:00:00'),
(73, 'nice food', 6, 24, 0, '0000-00-00 00:00:00'),
(74, 'nice food', 6, 24, 0, '0000-00-00 00:00:00'),
(85, 'hihelodsfjknbcxcn cxmn cxkmnncmncxvmncxnvmv cxmv cmnvcxvcxv00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', 9, 35, 16, '2018-10-16 07:53:08'),
(79, 'comment', 9, 23, 16, '0000-00-00 00:00:00'),
(80, 'comment', 9, 23, 16, '0000-00-00 00:00:00'),
(81, 'hy', 9, 23, 16, '0000-00-00 00:00:00'),
(86, 'hi', 9, 60, 16, '0000-00-00 00:00:00'),
(87, 'kamledh', 9, 60, 16, '0000-00-00 00:00:00'),
(88, 'comment', 9, 61, 16, '0000-00-00 00:00:00'),
(89, 'comment', 9, 23, 16, '0000-00-00 00:00:00'),
(90, 'my new comment', 9, 61, 16, '0000-00-00 00:00:00'),
(91, 'hi', 9, 61, 16, '0000-00-00 00:00:00'),
(92, 'new', 9, 61, 16, '0000-00-00 00:00:00'),
(93, 'hi', 9, 61, 16, '0000-00-00 00:00:00'),
(94, 'vv', 9, 61, 16, '0000-00-00 00:00:00'),
(95, 'hi', 68, 63, 9, '0000-00-00 00:00:00'),
(96, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(100, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(99, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(101, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(102, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(103, '', 0, 0, 0, '0000-00-00 00:00:00'),
(104, 'hi', 122, 24, 27, '0000-00-00 00:00:00'),
(105, '', 0, 0, 27, '0000-00-00 00:00:00'),
(106, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(107, 'new menu', 122, 24, 27, '0000-00-00 00:00:00'),
(108, 'new menu', 122, 0, 27, '0000-00-00 00:00:00'),
(109, 'new menu', 122, 24, 0, '0000-00-00 00:00:00'),
(110, 'test comment', 142, 33, 0, '0000-00-00 00:00:00'),
(111, 'rd6rz6rzyd,ydzydzyrz6rx7rz7rz6rz6rz6rz6rz7rz7rz6rz6rz6rz6rz6rz6rzyrzyrz6rz6rz6rz6rz6rz6rz6rz6rz6rz6rz6rz6rzyrzyrzyrzyrzyrzyrzryzyrzydzyrzyrzyrzyrzyrzyrzyrzyrzyrzyrzydzydzydzyd,yd,dy,yd,yd,yd,yd,yd,yd,dy,yd,yd,yd,yd,yd,yd,yd,yd,yd,yf,', 142, 32, 0, '0000-00-00 00:00:00'),
(112, 'testy', 148, 33, 0, '0000-00-00 00:00:00'),
(113, '', 0, 0, 0, '0000-00-00 00:00:00'),
(114, '', 0, 0, 0, '0000-00-00 00:00:00'),
(115, 'Hi', 162, 33, 0, '0000-00-00 00:00:00'),
(116, 'hi', 142, 33, 0, '0000-00-00 00:00:00'),
(117, 'Hi there', 162, 33, 0, '0000-00-00 00:00:00'),
(118, 'Huh', 162, 33, 0, '0000-00-00 00:00:00'),
(119, 'Yuh', 162, 33, 0, '0000-00-00 00:00:00'),
(120, 'Try', 162, 33, 0, '0000-00-00 00:00:00'),
(121, 'Super', 166, 33, 0, '0000-00-00 00:00:00'),
(122, 'sure', 191, 33, 0, '0000-00-00 00:00:00'),
(123, 'wow', 208, 33, 0, '0000-00-00 00:00:00'),
(124, 'ótimo vale a pena comprar aproveite é maravilhoso', 215, 33, 0, '0000-00-00 00:00:00'),
(125, 'Más o menos.', 0, 52, 0, '0000-00-00 00:00:00'),
(126, 'Good', 226, 33, 0, '0000-00-00 00:00:00'),
(127, 'Hello hjk', 226, 33, 0, '0000-00-00 00:00:00'),
(128, 'jddghj', 0, 33, 0, '0000-00-00 00:00:00'),
(129, 'g hgf fgh fdgfdg hfg fdg ery te hfg hgf hgf hfgd hfgdh fdgh fgd', 0, 32, 0, '0000-00-00 00:00:00'),
(130, 'hello', 239, 33, 0, '0000-00-00 00:00:00'),
(131, 'bbh', 245, 33, 0, '0000-00-00 00:00:00'),
(132, 'delicious', 250, 51, 0, '0000-00-00 00:00:00'),
(133, 'Leger', 244, 43, 0, '0000-00-00 00:00:00'),
(134, 'good', 241, 33, 0, '0000-00-00 00:00:00'),
(135, 'i  love  it', 0, 33, 0, '0000-00-00 00:00:00'),
(136, 'dffffft', 259, 33, 0, '0000-00-00 00:00:00'),
(137, 'Nice', 284, 33, 0, '0000-00-00 00:00:00'),
(138, 'Good ', 285, 33, 0, '0000-00-00 00:00:00'),
(139, 'Hello ', 285, 34, 0, '0000-00-00 00:00:00'),
(140, 'good', 288, 5, 0, '0000-00-00 00:00:00'),
(141, 'testy', 341, 16, 0, '0000-00-00 00:00:00'),
(142, 'gostei', 371, 30, 0, '0000-00-00 00:00:00'),
(143, 'lecker', 374, 53, 0, '0000-00-00 00:00:00'),
(144, 'Love ir', 378, 43, 0, '0000-00-00 00:00:00'),
(145, 'Lol', 378, 33, 0, '0000-00-00 00:00:00'),
(146, 'aww', 381, 54, 0, '0000-00-00 00:00:00'),
(147, 'Todo muy rico', 399, 33, 0, '0000-00-00 00:00:00'),
(148, 'Hi', 400, 32, 0, '0000-00-00 00:00:00'),
(149, 'ok', 403, 33, 0, '0000-00-00 00:00:00'),
(150, 'thfffgg', 405, 33, 0, '0000-00-00 00:00:00'),
(151, 'please install NAChat', 403, 49, 0, '0000-00-00 00:00:00'),
(152, '...', 358, 34, 0, '0000-00-00 00:00:00'),
(153, 'hi', 3, 51, 0, '0000-00-00 00:00:00'),
(154, '???', 11, 17, 0, '0000-00-00 00:00:00'),
(155, 'yummy', 20, 30, 0, '0000-00-00 00:00:00'),
(156, 'vbzvhzhhz bhshh', 0, 33, 0, '0000-00-00 00:00:00'),
(157, 'vvuug', 23, 39, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intro`
--

CREATE TABLE `tbl_intro` (
  `id` int(11) NOT NULL,
  `intro_title` varchar(255) NOT NULL,
  `intro_description` text NOT NULL,
  `intro_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_intro`
--

INSERT INTO `tbl_intro` (`id`, `intro_title`, `intro_description`, `intro_image`) VALUES
(1, 'Intro Title 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '79925_Screen_Sort1.png'),
(2, 'Intro 2', 'It is a long established fact that a reader will be distracted by the readable', '76296_Screen_Sort2.png'),
(3, 'Intro Title 3', 'will be distracted by the readable content of a page when looking at its layout', '53607_Screen_Sort3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`like_id`, `menu_id`, `user_id`) VALUES
(153, 57, 9),
(127, 33, 6),
(45, 30, 112),
(8, 2, 6),
(7, 2, 6),
(9, 2, 6),
(44, 22, 6),
(37, 23, 6),
(68, 24, 6),
(27, 17, 49),
(67, 26, 9),
(65, 31, 6),
(154, 37, 112),
(118, 58, 9),
(155, 28, 6),
(156, 19, 48),
(157, 27, 1),
(158, 59, 9),
(159, 60, 9),
(160, 61, 9),
(181, 0, 122),
(188, 32, 142),
(184, 39, 122),
(197, 33, 142),
(190, 17, 142),
(192, 27, 142),
(193, 9, 142),
(196, 33, 148),
(209, 46, 160),
(200, 33, 162),
(218, 33, 0),
(217, 33, 160),
(219, 33, 0),
(220, 33, 0),
(221, 33, 0),
(222, 33, 0),
(223, 33, 0),
(224, 33, 0),
(225, 33, 0),
(226, 33, 0),
(227, 30, 180),
(228, 33, 182),
(229, 16, 180),
(230, 33, 187),
(234, 35, 204),
(235, 33, 205),
(236, 33, 208),
(237, 33, 215),
(238, 52, 0),
(239, 9, 230),
(240, 17, 234),
(241, 33, 0),
(242, 55, 239),
(243, 44, 239),
(244, 25, 239),
(245, 15, 239),
(246, 40, 239),
(247, 50, 0),
(248, 50, 0),
(251, 43, 244),
(252, 54, 0),
(253, 54, 0),
(254, 54, 0),
(255, 33, 0),
(256, 33, 259),
(257, 33, 265),
(258, 32, 274),
(260, 33, 284),
(261, 5, 288),
(262, 30, 300),
(263, 16, 341),
(264, 32, 342),
(265, 33, 354),
(266, 50, 350),
(268, 34, 367),
(269, 30, 371),
(270, 53, 374),
(271, 30, 378),
(272, 45, 378),
(273, 33, 380),
(275, 34, 386),
(276, 50, 387),
(277, 8, 387),
(278, 25, 387),
(279, 33, 391),
(280, 33, 399),
(281, 33, 403),
(282, 33, 405),
(283, 57, 405),
(285, 30, 0),
(286, 30, 0),
(291, 17, 11),
(292, 33, 358),
(293, 33, 14),
(294, 46, 15),
(295, 30, 20),
(296, 33, 0),
(297, 33, 0),
(298, 33, 0),
(299, 33, 0),
(300, 33, 0),
(301, 51, 0),
(302, 51, 0),
(303, 35, 0),
(304, 35, 0),
(305, 35, 0),
(306, 17, 0),
(307, 17, 0),
(308, 17, 0),
(309, 17, 0),
(310, 50, 23),
(311, 33, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_category`
--

CREATE TABLE `tbl_menu_category` (
  `cid` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_image`
--

CREATE TABLE `tbl_menu_image` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `menu_image_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_image`
--

INSERT INTO `tbl_menu_image` (`id`, `mid`, `menu_image_cat`) VALUES
(8, 4, 'aluparatha.jpg'),
(9, 4, 'gobhiparatha.jpg'),
(10, 46, 'sambal-terong.jpg'),
(11, 46, 'Terong-Balado.jpg'),
(12, 33, 'bacon-fried-chicken-gravy.jpg'),
(13, 33, 'CHICKEN_FRIED_BACON....jpg'),
(14, 33, 'chicken_fried_bacon.jpg'),
(15, 33, 'delish-chicken-fried-bacon.jpg'),
(16, 31, 'Bear_claw_new.jpg'),
(17, 31, 'bearclaw.jpg'),
(18, 43, 'Brezel.jpg'),
(19, 43, 'Brezelntt.jpg'),
(20, 43, 'Brezelt.jpg'),
(21, 48, 'Bruschetta.jpg'),
(22, 48, 'bruschetta-tomato.jpg'),
(23, 48, 'Bruschettatt.jpg'),
(24, 32, 'Cajun cuisine.jpg'),
(25, 32, 'Cajun cuisinet.jpeg'),
(26, 32, 'Cajun cuisinett.jpeg'),
(27, 37, 'cassoulet (1).jpg'),
(28, 37, 'Cassoulet.jpg'),
(29, 37, 'Cassoulett.jpg'),
(30, 30, 'Chicken nugget.jpeg'),
(31, 30, 'Chicken nuggett.jpg'),
(32, 30, 'Chicken-Nuggets.jpg'),
(33, 17, 'Chinese noodles.jpg'),
(34, 17, 'Chinese noodlest.jpg'),
(35, 17, 'chinese-noodle.jpg'),
(36, 18, 'Chinese Sticky Rice.jpg'),
(37, 18, 'Chinese-Sticky-Rice.jpg'),
(38, 41, 'Eintopf.jpg'),
(39, 41, 'Eintopft.jpg'),
(40, 58, 'Eomuk Tang.jpg'),
(41, 58, 'Eomuk Tangt.jpg'),
(42, 58, 'Eomuk Tangtt.jpg'),
(43, 34, 'Fried rice.jpg'),
(44, 34, 'Fried ricet.jpeg'),
(45, 34, 'Fried ricett.jpg'),
(46, 53, 'Gyoza.jpg'),
(47, 53, 'Gyoza1.jpg'),
(48, 53, 'Gyozat.jpg'),
(49, 59, 'Hotteok.jpg'),
(50, 59, 'Hotteokt.jpg'),
(51, 59, 'Hotteoktt.jpg'),
(52, 9, 'Idli Sambar.jpg'),
(53, 9, 'Idli Sambart.jpg'),
(54, 9, 'idli-sambar.jpg'),
(55, 47, 'Ikan bakart.jpg'),
(56, 47, 'Ikan bakartt.jpg'),
(57, 52, 'Kare Pan.jpg'),
(58, 52, 'Kare Pant.jpg'),
(59, 52, 'Kare-Pan-Curry-Bread.jpg'),
(60, 57, 'Korean Grilled Cheese Lobster.jpg'),
(61, 57, 'Korean Grilled Cheese Lobstert.jpg'),
(62, 54, 'Korokke.jpg'),
(63, 54, 'Korokket.jpg'),
(64, 54, 'Korokkett.jpg'),
(65, 35, 'Kung Pao chickentt.jpg'),
(66, 35, 'Kung Pao chicken.jpg'),
(67, 35, 'Kung Pao chickent.jpg'),
(68, 50, 'Margherita Pizza.jpg'),
(69, 50, 'Margherita Pizzat.jpg'),
(70, 50, 'Margherita Pizzatt.jpg'),
(71, 50, 'Margherita Pizzattt.jpg'),
(72, 45, 'Martabak.jpg'),
(73, 45, 'Martabakt.jpg'),
(74, 45, 'Martabaktt.jpg'),
(75, 8, 'Masal Dosa.jpg'),
(76, 8, 'Masala-Dosa.jpg'),
(77, 8, 'South-Indian-Masala-Dosa.jpg'),
(78, 5, 'Masala Khichdit.jpg'),
(79, 5, 'masala_khichdi.jpg'),
(80, 5, 'Masala Khichdtt.jpg'),
(81, 51, 'Mushroom Risotto.jpg'),
(82, 51, 'Mushroom Risotto1.jpeg'),
(83, 51, 'Mushroom Risottott.jpg'),
(84, 38, 'Nicoise salad.jpeg'),
(85, 38, 'Nicoise saladt.jpg'),
(86, 38, 'Nicoise saladtt.jpeg'),
(87, 49, 'Pasta Carbonara.jpg'),
(88, 49, 'Pasta Carbonarat.jpg'),
(89, 49, 'Pasta Carbonaratt.jpeg'),
(90, 16, 'Pav bhaji.jpg'),
(91, 16, 'Pav bhaji1.jpg'),
(92, 16, 'Pav bhajit.jpg'),
(93, 44, 'Pepes ikan.jpg'),
(94, 44, 'Pepes ikant.jpg'),
(95, 39, 'Ratatouille.jpg'),
(96, 39, 'Ratatouillet.jpg'),
(97, 39, 'Ratatouillett.jpeg'),
(98, 40, 'Rote grutze.jpg'),
(99, 40, 'Rote grutzett.jpg'),
(100, 40, 'Rote grutzettt.jpg'),
(101, 15, 'Samosa.jpg'),
(102, 15, 'Samosat.jpg'),
(103, 15, 'Samosatt.jpg'),
(104, 42, 'Sauerbraten.jpeg'),
(105, 42, 'Sauerbratent.jpg'),
(106, 42, 'Sauerbratentt.jpg'),
(107, 25, 'Sev Tometo.jpg'),
(108, 25, 'Sev Tometot.jpg'),
(109, 25, 'Sev Tometott.jpg'),
(110, 36, 'Soupeal.jpg'),
(111, 36, 'Soupealt.jpg'),
(112, 36, 'Soupett.jpg'),
(113, 55, 'Sweet Potato.jpg'),
(114, 55, 'Sweet Potatot.jpg'),
(115, 55, 'Sweet Potatott.jpg'),
(116, 63, 'Tamales.jpeg'),
(117, 63, 'Tamalest.jpg'),
(118, 63, 'Tamalestt.jpg'),
(119, 27, 'Thepla.jpg'),
(120, 27, 'Theplat.jpg'),
(121, 27, 'Theplatt.jpg'),
(122, 62, 'Tlayudas.jpg'),
(123, 62, 'Tlayudast.jpg'),
(124, 62, 'Tlayudastt.jpg'),
(125, 60, 'Tortas.jpg'),
(126, 60, 'Tortast.jpg'),
(127, 60, 'Tortastt.jpg'),
(128, 61, 'Tostadas.jpg'),
(129, 61, 'Tostadast.jpg'),
(130, 61, 'Tostadastt.jpg'),
(131, 56, 'Tteokbokki.jpg'),
(132, 56, 'Tteokbokkit.jpg'),
(133, 56, 'Tteokbokkitt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_list`
--

CREATE TABLE `tbl_menu_list` (
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `menu_cat` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_info` text,
  `menu_image` varchar(255) DEFAULT NULL,
  `menu_price` float(11,2) NOT NULL,
  `menu_weight` varchar(100) NOT NULL,
  `special_price` decimal(10,2) NOT NULL,
  `total_rate` int(11) NOT NULL,
  `rate_avg` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu_list`
--

INSERT INTO `tbl_menu_list` (`mid`, `cid`, `menu_type`, `menu_cat`, `menu_name`, `menu_info`, `menu_image`, `menu_price`, `menu_weight`, `special_price`, `total_rate`, `rate_avg`, `status`) VALUES
(4, 7, 'veg', 5, 'Aloo Paratha', 'Aloo Paratha is a bread dish originating from the Indian subcontinent; the recipe is one of the most popular breakfast dishes throughout western, central and northern regions of India ', '69644_Aloo-paratha-stuffed.jpg', 50.00, '2 Piece', '0.00', 4, '4', 1),
(5, 7, 'veg', 5, 'Masala Khichdi', 'Khichdi, or khichri, is a dish from the Indian subcontinent made from rice and lentils, but other variations include bajra and mung dal kichri. In Indian culture, it is considered one of the first solid foods that babies eat.', '61078_masala_khichdi.jpg', 20.00, '250gm', '0.00', 6, '4', 1),
(8, 7, 'veg', 8, 'Masal Dosa', 'Masala dosa or masale dose is a variation of the popular South Indian food dosa, which has its origins in Tuluva Mangalorean cuisine made popular by the Udupi hotels all over India. It is made from rice, lentils, potato, methi, and curry leaves, and served with chutneys and sambar.', '51713_masala-dosa.1024x1024.jpg', 100.00, '1 Piece', '0.00', 4, '3', 1),
(9, 7, 'veg', 8, 'Idli Sambar', 'dli are a type of savoury rice cake, popular as breakfast foods throughout India and neighbouring countries like Sri Lanka. The cakes are made by steaming a batter consisting of fermented black lentils and rice.', '9056_idli-sambar.jpg', 70.00, '3 Piece', '0.00', 4, '5', 1),
(15, 7, 'veg', 11, 'Samosa', 'A samosa, sambusa, or samboksa is a fried or baked dish with a savoury filling, such as spiced potatoes, onions, peas, lentils, macaroni, noodles, cheese, minced lamb or minced beef. Pine nuts can also be added.', '7944_Tandoori_Paneer_Samosa.jpg', 30.00, '2 Piece', '0.00', 4, '4', 1),
(16, 7, 'veg', 11, 'Pav bhaji', 'Pav bhaji is a fast food dish from Maharashtra, India, consisting of a thick vegetable curry, fried and served with a soft bread roll.', '40001_IMG_0507.jpg', 60.00, '1 Plate', '0.00', 6, '3', 1),
(17, 3, 'veg', 12, 'Chinese noodles', 'Noodles are an essential ingredient and staple in Chinese cuisine. Chinese noodles vary widely according to the region of production, ingredients, shape or width, and manner of preparation.', '84202_images.jpg', 100.00, '250gm', '0.00', 3, '3', 1),
(18, 3, 'veg', 12, 'Chinese Sticky Rice', 'Chinese sticky rice also called is Chinese rice dish commonly made from glutinous rice and can include soy sauce, oyster sauce, scallions, cilantro and other ingredients. The dish is commonly served in dim sum.', '26236_230998.jpg', 150.00, '1 Plate', '0.00', 4, '4', 1),
(25, 7, 'veg', 15, 'Sev Tometo', 'Sev Tamatar or Sev Tamaeta (as we call it in Gujarati) is a simple sabzi made by tempering tomatoes and adding gram flour strands (sev) to it. Sev Tamatar is originally a Kathiawadi dish and you will find this dish served in all popular dhabas and restaurants in Gujarat. ', '64217_Tameta_Nu_Shaak_foodfood.jpg', 80.00, '1 Plate', '60.00', 6, '5', 1),
(27, 7, 'veg', 0, 'Thepla', 'Thepla is good menu', '48252_Thepla-e1405751991214.jpg', 50.00, '1 Piece', '40.00', 6, '3', 1),
(30, 10, 'nonveg', 0, 'Chicken nugget', 'Chicken nugget\r\nFast food chicken.jpg\r\nPlace of origin	United States\r\nCreated by	Robert C. Baker\r\n Cookbook: Chicken nugget   Media: Chicken nugget\r\n\r\nFast food chicken nuggets from McDonald\'s (McNuggets)\r\n\r\nSome home-baked chicken nuggets\r\nA chicken nugget is a chicken product made from chicken meat which is breaded or battered, then deep-fried or baked. Fast food restaurants usually fry their nuggets in vegetable oil.', '41348_chicken_nuggets.jpg', 250.00, '5 piece', '0.00', 9, '4', 1),
(31, 10, 'nonveg', 0, 'Bear claw', 'Bear claw\r\nBear claw pastry.JPG\r\nType	Pastry, doughnut or fritter\r\nPlace of origin	United States\r\nMain ingredients	Dough, almond paste\r\nIngredients generally used	Raisins\r\n Cookbook: Bear claw   Media: Bear claw\r\nA bear claw is a sweet, yeast-raised pastry, similar to a Danish, originating in the United States ', '37286_Bear_claw_pastry.JPG', 210.00, '5 Piece', '0.00', 10, '4', 1),
(32, 10, 'veg', 0, 'Cajun cuisine', 'An authentic Cajun meal is usually a three-pot affair, with one pot dedicated to the main dish, one dedicated to steamed rice, special made sausages, or some seafood dish, and the third containing whatever vegetable is plentiful or available. ', '99222_Shrimppoboy.jpg', 150.00, '150GM', '0.00', 9, '3', 1),
(33, 10, 'veg', 0, 'Chicken fried bacon', 'Chicken fried bacon consists of bacon strips dredged in batter and deep fried, like chicken fried steak.', '8776_Chicken_Fried_Bacon.jpg', 180.00, '250GM', '0.00', 12, '4', 1),
(34, 3, 'veg', 0, 'Fried rice', 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat.', '89413_Nasi_goreng_Solaria_Kuta.JPG', 120.00, '1 Plate', '0.00', 15, '4', 1),
(35, 3, 'nonveg', 0, 'Kung Pao chicken', 'Kung Pao chicken , also transcribed as Gong Bao or Kung Po, is a spicy, stir-fried Chinese dish made with chicken, peanuts, vegetables, and chili peppers.', '40764_Kung-pao-shanghai.jpg', 115.00, '1 Plate', '0.00', 12, '3', 1),
(36, 13, 'nonveg', 0, 'Soupe à l\'oignon', 'This is a traditional French soup made of onions and beef stock, usually served with croutons and melted cheese on top. The soup\'s origins can be traced as far back as the Romans – typically a poor dish – although the current version dates from the 18th century.', '56385_france1.jpg', 65.00, '1 Cup', '0.00', 15, '5', 1),
(37, 13, 'nonveg', 0, 'Cassoulet', 'Cassoulet is a comfort dish of white beans stewed slowly with meats, typically pork or duck but also sausages, goose, mutton or whatever else the chef has around.', '4649_france2.jpg', 95.00, '1 Plate', '0.00', 15, '5', 1),
(38, 13, 'veg', 0, 'Nicoise salad', 'Salade niçoise is a typical French salad from the Provence region, which can be served as a side dish or a meal on its own. It\'s typically a filling salad of lettuce, fresh tomatoes, boiled eggs, canned tuna, green beans, Nicoise Cailletier olives and anchovies, although many variations exist.', '20577_farnce3.jpg', 125.00, '1 Plate', '0.00', 20, '4', 1),
(39, 13, 'veg', 0, 'Ratatouille', 'Ratatouille is another globally known French dish, hailing from the southeastern French region of Provence. It is a stewed vegetable recipe that can be served as a side dish, meal or stuffing for other dishes, such as crepes and omelettes. ', '7351_france4.jpg', 110.00, '1 Plate', '0.00', 10, '5', 1),
(40, 14, 'veg', 0, 'Rote grutze', 'Rote grütze is a red fruit pudding that is a popular dessert in north Germany. It’s made from black and red currants, raspberries and sometimes strawberries or cherries, which are cooked in their juice and thickened with a little cornstarch or cornflour.', '26511_Rote grutzettt.jpg', 120.00, '1 Plate', '0.00', 20, '5', 1),
(41, 14, 'nonveg', 0, 'Eintopf', 'A steaming bowl of eintopf will warm anyone on a cold day. The name of this traditional German stew literally means ‘one pot’ and refers to the way of cooking rather than a specific recipe. However, most recipes contain the same basic ingredients: a broth, vegetables, potatoes or pulses and then some meat (commonly pork, beef or chicken) or sometimes fish. ', '56893_german2.jpg', 150.00, '1 Plate', '0.00', 8, '3', 1),
(42, 14, 'nonveg', 0, 'Sauerbraten', 'Germans love their meat dishes, and sauerbraten (meaning ‘sour’ or ‘pickled’ roast) is a pot roast that’s regarded as one of the country’s national dishes. It can be made from many different meats, which are marinated in wine, vinegar, spices, herbs and seasoning for up to 10 days.', '99797_german3.jpg', 145.00, '1 Plate', '0.00', 10, '4', 1),
(43, 14, 'nonveg', 0, 'Brezel', 'Brezel are soft, white pretzels made from flour water and yeast and sprinkled with salt (and sometimes different seeds). It\'s great to eat as a side dish or snack, especially with a strong German beer. They’re in every bakery and on street stands, sold plain, sliced and buttered (butterbrezel) or with slices of cold meats or cheese.', '75632_german4.jpg', 120.00, '1 Plate', '0.00', 10, '3', 1),
(44, 15, 'veg', 0, 'Pepes ikan', 'Pepes signifies the steaming of food in banana leaves, which gives it an earthy flavor that works well with the rich Manadonese spices (woku) it\'s coupled with. When matched with tuna the result is a dense, fiery dish that holds its distinct flavors, but should be eaten gingerly.', '77153_indones1.jpg', 60.00, '1 Plate', '0.00', 15, '3', 1),
(45, 15, 'veg', 0, 'Martabak', 'The sweet version looks more like a pancake filled with gooey chocolate, peanuts or cheese, while the savory one is made from crispy pulled pastry like filo that is flattened in a wok as egg and minced meats are rapidly folded in. Served with pickled cucumber and a sweet and sour vinegar.', '63681_indomes2.jpg', 85.00, '10 Piece', '0.00', 18, '5', 1),
(46, 15, 'veg', 0, ' Balado terong', 'The color of this dish is enough to set taste buds going. Nothing more than grilled purple eggplant topped with heaps of chili sauce made from dried shrimp paste (balacan), it calls for a substantial portion of rice to even out the fire engine flavor.', '48714_indpnes3.jpg', 80.00, '2 Piece', '0.00', 14, '4', 1),
(47, 15, 'nonveg', 0, 'Ikan bakar', 'Grilled fish, plain and simple. But in a country with more than 17,000 islands, fish is bound to feature prominently. While squid and prawns have a place in Indonesian cuisine, ikan bakar gets a far better showing for a fleshy texture that is great for dipping. It is usually marinated in the typical trove of spices and served with a soy and chili-based sauce.', '18427_indones4.jpg', 115.00, '2 plate', '0.00', 10, '2', 1),
(48, 9, 'nonveg', 0, 'Bruschetta', 'Country bread sliced and topped with different toppings - the evergreen tomato-basil and an inventive mushroom-garlic. The classic Italian starter!', '27959_itali1.jpg', 135.00, '2 Piece', '0.00', 15, '3', 1),
(49, 9, 'nonveg', 0, ' Pasta Carbonara', 'This simple Roman pasta dish derives its name from \'carbone\' meaning coal. It was a pasta popular with the coal miners. The original recipe calls for guanciale, which is pig\'s cheek, but since its not easily available, the chef has used bacon instead.', '5891_itali2.jpg', 85.00, '1 Plate', '0.00', 20, '4', 1),
(50, 9, 'veg', 0, 'Margherita Pizza', 'Fancy a pipping hot pizza, fresh out of the oven? Create one at home! One of the most loved Italian dishes, here\'s the recipe of \'Pizza Margherita\'! Need we say more?', '75985_itali3.jpg', 89.00, '1 piece', '0.00', 20, '4', 1),
(51, 9, 'veg', 0, 'Mushroom Risotto', 'A plateful of buttery risotto with the goodness of mushrooms. Great to feed a hungry horde!', '42375_itali4.jpg', 95.00, '1 Plate', '0.00', 20, '5', 1),
(52, 8, 'veg', 0, 'Kare Pan', 'Kare pan is a type of okazu pan, a term used to describe breads filled with different kinds of savory ingredients. Made of slightly sweet dough that has been breaded and deep fried, a kare pan has rich Japanese curry at its center.', '61626_japanies1.jpg', 65.00, '2 Piece', '0.00', 9, '3', 1),
(53, 8, 'nonveg', 0, 'Gyoza', 'Gyoza originated in China, where they’re known as jiaozi, but they’re also very popular in Japan. These deep-fried dumplings are typically filled with a mixture of ground pork, green onion, nira chives, cabbage, garlic ginger, soy sauce and sesame oil.', '84686_japan2.jpg', 55.00, '5 Piece', '0.00', 18, '3', 1),
(54, 8, 'nonveg', 0, 'Korokke', 'Similar to crêpes, korokke is a Japanese spin on a classic French dish. Consisting of mashed potatoes or cream sauce surrounded by a breaded and deep-fried patty, korokke are inspired by French croquettes. Casual and satisfyingly greasy, korokke can come with a variety of other fillings, with certain areas of the country specializing in regional variations. ', '5765_japan3.jpg', 90.00, '5 Piece', '0.00', 15, '4', 1),
(55, 8, 'nonveg', 0, 'Sweet Potato', 'Japanese sweet potatoes typically have a somewhat sweeter taste than the Western version. They’re most often seen served on the streets in autumn and winter, and can be prepared a variety of different ways.', '91403_japan4.jpg', 45.00, '10piece', '0.00', 18, '4', 1),
(56, 16, 'veg', 0, 'Tteokbokki ', 'Also known as teokbokki, ddeokbokki, topokki, these are cylinder-shaped rice cakes cooked in gochujang – a sweet, spicy red pepper sauce. Can be served in a bowl with ingredients such as egg, noodles or cheese, or in a stick. You almost find Tteokbokki EVERYWHERE.', '7290_korian1.jpg', 120.00, '100gm', '0.00', 12, '4', 1),
(57, 16, 'veg', 0, 'Korean Grilled Cheese Lobster', 'Street food goes upmarket. New York has lobster rolls, Seoul has grilled cheese lobsters. Quite an indulgent snack at ', '70138_korean2.jpg', 100.00, '100gm', '0.00', 15, '3', 1),
(58, 16, 'veg', 0, 'Eomuk Tang', 'These are fishcake on skewers served with hot broth. Best to have these skewers during the cold weather when you can keep warm by holding a cup or bowl in your hands', '58555_korean3.jpg', 110.00, '100gm', '60.00', 18, '4', 1),
(59, 16, 'nonveg', 0, 'Hotteok', 'Pronounced ‘ho-tok’, these are sweet pancakes with brown sugar syrup filling.', '6802_korean4.jpg', 80.00, '5 Piece', '0.00', 13, '3', 1),
(60, 2, 'nonveg', 0, 'Tortas', 'Tortas are a staple of Mexican street food and are basically a supersized sandwich, served in squishy bread and stuffed with meats, cheeses, salad and sauces', '5937_mexican1.jpg', 90.00, '1 Plate', '0.00', 18, '4', 1),
(61, 2, 'nonveg', 0, 'Tostadas', 'Crispy, salted tortillas are a firm street food favorite, particularly when topped with fresh fish or ceviche, plus sliced avocado and salad. Markets across the country can be found selling these light snacks that are markedly more refreshing than the often meat heavy and greasy dishes that tend to dominate the street food scene in Mexico. ', '45218_mexican2.jpg', 85.00, '1 Plate', '0.00', 19, '5', 1),
(62, 2, 'veg', 0, 'Tlayudas', 'Predominantly found in Oaxaca – one of Mexico’s best street food hubs – tlayudas are huge, baked, crispy tostadas which are spread with dark, chocolatey mole sauce, a selection of salad and the meat of your choice before being topped with the iconic, stringy Oaxaca cheese.', '58519_mexican3.jpg', 75.00, '1 Plate', '0.00', 17, '4', 1),
(63, 2, 'veg', 0, 'Tamales', 'Also popular in the rest of Latin America, the Caribbean and the US, the Mexican version is undeniably one of the best. Stodgy, steamed corn dough wrapped in corn husks or banana leaves and stuffed with all sorts – from cheese to chicken mole to pineapple. ', '48467_mexican4.jpg', 75.00, '50gm', '0.00', 15, '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_unique_id` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `total_price` decimal(10,2) DEFAULT NULL,
  `promo_code_apply` int(11) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_qty` varchar(20) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` float(11,2) NOT NULL,
  `menu_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `user_id`, `order_unique_id`, `order_date`, `status`, `total_price`, `promo_code_apply`, `menu_id`, `menu_qty`, `menu_name`, `menu_price`, `menu_image`) VALUES
(1, 3, '1ZmKE6MrBPIf', '2019-04-11 11:05:05', 'Pending', '511.50', NULL, 47, '3', 'Ikan bakar', 115.00, '18427_indones4.jpg'),
(2, 3, '1ZmKE6MrBPIf', '2019-04-11 11:05:05', 'Pending', '511.50', NULL, 44, '2', 'Pepes ikan', 60.00, '77153_indones1.jpg'),
(10, 2, '1vpoUqswPapn', '2019-04-12 05:29:53', 'Pending', '792.00', NULL, 31, '2', 'Bear claw', 210.00, '37286_Bear_claw_pastry.JPG'),
(11, 2, '1vpoUqswPapn', '2019-04-12 05:29:53', 'Pending', '792.00', NULL, 18, '2', 'Chinese Sticky Rice', 150.00, '26236_230998.jpg'),
(12, 2, 'vWqkSRmcJSUO', '2019-04-12 05:31:31', 'Pending', '440.00', NULL, 53, '2', 'Gyoza', 55.00, '84686_japan2.jpg'),
(13, 2, 'vWqkSRmcJSUO', '2019-04-12 05:31:31', 'Pending', '440.00', NULL, 52, '2', 'Kare Pan', 65.00, '61626_japanies1.jpg'),
(14, 2, 'vWqkSRmcJSUO', '2019-04-12 05:31:31', 'Pending', '440.00', NULL, 25, '2', 'Sev Tometo', 80.00, '64217_Tameta_Nu_Shaak_foodfood.jpg'),
(15, 4, 'I2oKYWvvHkmf', '2019-04-12 07:44:11', 'Pending', '2854.50', NULL, 34, '', 'Fried rice', 120.00, '89413_Nasi_goreng_Solaria_Kuta.JPG'),
(16, 4, 'I2oKYWvvHkmf', '2019-04-12 07:44:11', 'Pending', '2854.50', NULL, 52, '', 'Kare Pan', 65.00, '61626_japanies1.jpg'),
(17, 4, 'I2oKYWvvHkmf', '2019-04-12 07:44:11', 'Pending', '2854.50', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(18, 3, 'i6vH6O0S8BFe', '2019-04-12 12:08:58', 'Pending', '313.50', NULL, 51, '', 'Mushroom Risotto', 95.00, '42375_itali4.jpg'),
(19, 6, '1ps3LcbRW61S', '2019-04-12 13:20:57', 'Pending', '97.90', NULL, 50, '1', 'Margherita Pizza', 89.00, '75985_itali3.jpg'),
(20, 4, '3vLa1LKKePbw', '2019-04-12 13:58:52', 'Pending', '396.00', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(21, 7, '1Sk80ZAQOCQ7', '2019-04-12 16:17:55', 'Pending', '396.00', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(22, 7, 'jFjH6MkSMC5v', '2019-04-12 16:18:42', 'Pending', '126.50', NULL, 35, '', 'Kung Pao chicken', 115.00, '40764_Kung-pao-shanghai.jpg'),
(23, 1, 'TX9KDUb6irm3', '2019-04-13 11:20:42', 'Pending', '396.00', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(24, 9, '0VI1ub4Fz5Kc', '2019-04-13 14:59:40', 'Pending', '132.00', NULL, 34, '1', 'Fried rice', 120.00, '89413_Nasi_goreng_Solaria_Kuta.JPG'),
(25, 13, 'JLypc6yo1RrG', '2019-04-15 08:14:03', 'Pending', '759.00', NULL, 47, '', 'Ikan bakar', 115.00, '18427_indones4.jpg'),
(26, 14, 'wmDRrItShVCX', '2019-04-17 17:50:18', 'Pending', '396.00', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(27, 15, 'YL7jJcTNSJay', '2019-04-18 05:36:50', 'Pending', '792.00', NULL, 33, '4', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(28, 16, 'ZJpleKJFVeKf', '2019-04-18 05:41:08', 'Pending', '8904.50', NULL, 35, '35', 'Kung Pao chicken', 115.00, '40764_Kung-pao-shanghai.jpg'),
(29, 16, 'ZJpleKJFVeKf', '2019-04-18 05:41:08', 'Pending', '8904.50', NULL, 34, '19', 'Fried rice', 120.00, '89413_Nasi_goreng_Solaria_Kuta.JPG'),
(30, 16, 'ZJpleKJFVeKf', '2019-04-18 05:41:08', 'Pending', '8904.50', NULL, 18, '19', 'Chinese Sticky Rice', 150.00, '26236_230998.jpg'),
(31, 16, 'ZJpleKJFVeKf', '2019-04-18 05:41:08', 'Pending', '8904.50', NULL, 48, '9', 'Bruschetta', 135.00, '27959_itali1.jpg'),
(32, 17, '19tdMUshkg6W', '2019-04-19 09:03:20', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(33, 1, '1SG30rbOuXTv', '2019-04-19 09:06:26', 'Pending', '396.00', NULL, 33, '', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(34, 4, 'IORSRElP3EV0', '2019-04-19 13:53:57', 'Pending', '264.00', NULL, 34, '', 'Fried rice', 120.00, '89413_Nasi_goreng_Solaria_Kuta.JPG'),
(35, 19, '1jotOUlBcrUf', '2019-04-20 20:05:49', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(36, 19, 'idXwSYsevUkY', '2019-04-20 20:22:35', 'Pending', '275.00', NULL, 30, '1', 'Chicken nugget', 250.00, '41348_chicken_nuggets.jpg'),
(37, 20, 'nDp4DsxLRspi', '2019-04-21 05:05:52', 'Pending', '748.00', NULL, 30, '2', 'Chicken nugget', 250.00, '41348_chicken_nuggets.jpg'),
(38, 20, 'nDp4DsxLRspi', '2019-04-21 05:05:52', 'Pending', '748.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(39, 19, '1U8ETSHnUblm', '2019-04-21 10:13:35', 'Pending', '396.00', NULL, 33, '2', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(40, 22, 'tKqWYPDEKVUc', '2019-04-23 15:44:45', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(41, 23, '1e4GD6Q3S8UK', '2019-04-23 20:22:55', 'Pending', '1050.50', NULL, 39, '3', 'Ratatouille', 110.00, '7351_france4.jpg'),
(42, 23, '1e4GD6Q3S8UK', '2019-04-23 20:22:55', 'Pending', '1050.50', NULL, 38, '5', 'Nicoise salad', 125.00, '20577_farnce3.jpg'),
(43, 23, 'DJf8o422yuLf', '2019-04-23 20:25:51', 'Pending', '396.00', NULL, 34, '3', 'Fried rice', 120.00, '89413_Nasi_goreng_Solaria_Kuta.JPG'),
(44, 23, '1UAyuRkW5uI3', '2019-04-23 20:28:02', 'Pending', '489.50', NULL, 50, '5', 'Margherita Pizza', 89.00, '75985_itali3.jpg'),
(45, 19, 'loFFJSntbGMX', '2019-04-23 20:28:21', 'Pending', '126.50', NULL, 35, '1', 'Kung Pao chicken', 115.00, '40764_Kung-pao-shanghai.jpg'),
(46, 24, 'KiXXGdPb0roO', '2019-04-24 07:54:39', 'Pending', '198.00', NULL, 55, '4', 'Sweet Potato', 45.00, '91403_japan4.jpg'),
(47, 25, 'uLsdKpDdBsN1', '2019-04-24 08:44:11', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(48, 26, 'YLHFdVePpEN4', '2019-04-25 08:10:54', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(49, 27, 'sx6h1W4nIooJ', '2019-04-25 12:44:40', 'Pending', '137.50', NULL, 38, '1', 'Nicoise salad', 125.00, '20577_farnce3.jpg'),
(50, 29, 'AvxAdtwMR7Ss', '2019-04-26 18:59:12', 'Pending', '591.80', NULL, 33, '2', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(51, 29, 'AvxAdtwMR7Ss', '2019-04-26 18:59:12', 'Pending', '591.80', NULL, 50, '2', 'Margherita Pizza', 89.00, '75985_itali3.jpg'),
(52, 1, '0M527uPBt24J', '2019-04-27 09:33:36', 'Pending', '198.00', NULL, 33, '1', 'Chicken fried bacon', 180.00, '8776_Chicken_Fried_Bacon.jpg'),
(53, 1, '1HOgAhMmNfRx', '2019-04-27 09:34:13', 'Pending', '165.00', NULL, 32, '1', 'Cajun cuisine', 150.00, '99222_Shrimppoboy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_qty` int(2) NOT NULL,
  `menu_price` float(11,2) NOT NULL,
  `menu_total_price` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `order_id`, `user_id`, `menu_id`, `menu_name`, `menu_qty`, `menu_price`, `menu_total_price`) VALUES
(15, 'u275mjgMWkhA', 4, 4, 'Aloo Paratha', 3, 50.00, 150.00),
(16, 'u275mjgMWkhA', 4, 2, 'Dutch Frost large', 10, 3.00, 30.00),
(31, 'v8QzOdHupO7j', 4, 5, 'Masala Khichdi', 1, 20.00, 20.00),
(58, '0DBxIwSSG69U', 1, 14, 'Huevos Rancheros Sandwich', 1, 150.00, 150.00),
(59, '0DBxIwSSG69U', 1, 13, 'Grilled Salsa Verde Chicken', 1, 210.00, 210.00),
(84, '10JN0INdguD2', 135, 33, 'Chicken fried bacon', 1, 180.00, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `menu_qty` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `cart_id`, `order_id`, `user_id`, `menu_id`, `menu_qty`, `total_price`, `payment_id`, `payment_type`, `status`, `order_date`) VALUES
(1, '579,580', '1ZmKE6MrBPIf', '3', '47,44', '3,2', '511.5', '', 'COD', 'Pending', '2019-04-11 12:51:08'),
(7, '593,594', '1vpoUqswPapn', '2', '31,18', '2,2', '792.0', '', 'COD', 'Pending', '2019-04-12 05:29:53'),
(8, '595,596,597', 'vWqkSRmcJSUO', '2', '53,52,25', '2,2,2', '440.0', '', 'COD', 'Pending', '2019-04-12 05:31:31'),
(9, '575,588,589', 'I2oKYWvvHkmf', '4', '34,52,33', '', '2854.5', '', 'COD', 'Pending', '2019-04-12 07:44:11'),
(10, '601', 'i6vH6O0S8BFe', '3', '51', '', '313.5', '', 'COD', 'Pending', '2019-04-12 12:08:58'),
(11, '602', '1ps3LcbRW61S', '6', '50', '1', '97.9', '', 'COD', 'Pending', '2019-04-12 13:20:57'),
(12, '604', '3vLa1LKKePbw', '4', '33', '', '396.0', '', 'COD', 'Pending', '2019-04-12 13:58:52'),
(13, '606', '1Sk80ZAQOCQ7', '7', '33', '', '396.0', '', 'COD', 'Pending', '2019-04-12 16:17:55'),
(14, '607', 'jFjH6MkSMC5v', '7', '35', '', '126.5', '', 'COD', 'Pending', '2019-04-12 16:18:42'),
(15, '613', 'TX9KDUb6irm3', '1', '33', '', '396.0', '', 'COD', 'Pending', '2019-04-13 11:20:42'),
(16, '614', '0VI1ub4Fz5Kc', '9', '34', '1', '132.0', '', 'COD', 'Pending', '2019-04-13 14:59:40'),
(17, '623', 'JLypc6yo1RrG', '13', '47', '', '759.0', '', 'COD', 'Pending', '2019-04-15 08:14:03'),
(18, '625', 'wmDRrItShVCX', '14', '33', '', '396.0', '', 'COD', 'Pending', '2019-04-17 17:50:18'),
(19, '627', 'YL7jJcTNSJay', '15', '33', '4', '792.0', '', 'COD', 'Pending', '2019-04-18 05:36:50'),
(20, '629,630,631,632', 'ZJpleKJFVeKf', '16', '35,34,18,48', '35,19,19,9', '8904.5', '', 'COD', 'Pending', '2019-04-18 05:41:08'),
(21, '633', '19tdMUshkg6W', '17', '33', '1', '198.0', '', 'COD', 'Pending', '2019-04-19 09:03:20'),
(22, '634', '1SG30rbOuXTv', '1', '33', '', '396.0', '', 'COD', 'Pending', '2019-04-19 09:06:26'),
(23, '615', 'IORSRElP3EV0', '4', '34', '', '264.0', '', 'COD', 'Pending', '2019-04-19 13:53:57'),
(24, '636', '1jotOUlBcrUf', '19', '33', '1', '198.0', '', 'COD', 'Pending', '2019-04-20 20:05:49'),
(25, '637', 'idXwSYsevUkY', '19', '30', '1', '275.0', 'pay_CM2VDc8NOGqpz5', 'PAY', 'Pending', '2019-04-20 20:22:35'),
(26, '639,640', 'nDp4DsxLRspi', '20', '30,33', '2,1', '748.0', '', 'COD', 'Pending', '2019-04-21 05:05:52'),
(27, '641', '1U8ETSHnUblm', '19', '33', '2', '396.0', '', 'COD', 'Pending', '2019-04-21 10:13:35'),
(28, '647', 'tKqWYPDEKVUc', '22', '33', '1', '198.0', 'pay_CN9NKR6cQCKhJc', 'PAY', 'Pending', '2019-04-23 15:44:45'),
(29, '649,650', '1e4GD6Q3S8UK', '23', '39,38', '3,5', '1050.5', '', 'COD', 'Pending', '2019-04-23 20:22:55'),
(30, '651', 'DJf8o422yuLf', '23', '34', '3', '396.0', '', 'COD', 'Pending', '2019-04-23 20:25:51'),
(31, '652', '1UAyuRkW5uI3', '23', '50', '5', '489.5', '', 'COD', 'Pending', '2019-04-23 20:28:02'),
(32, '653', 'loFFJSntbGMX', '19', '35', '1', '126.5', '', 'COD', 'Pending', '2019-04-23 20:28:21'),
(33, '655', 'KiXXGdPb0roO', '24', '55', '4', '198.0', '', 'COD', 'Pending', '2019-04-24 07:54:39'),
(34, '656', 'uLsdKpDdBsN1', '25', '33', '1', '198.0', '', 'COD', 'Pending', '2019-04-24 08:44:11'),
(35, '657', 'YLHFdVePpEN4', '26', '33', '1', '198.0', '', 'COD', 'Pending', '2019-04-25 08:10:54'),
(36, '658', 'sx6h1W4nIooJ', '27', '38', '1', '137.5', '', 'COD', 'Pending', '2019-04-25 12:44:40'),
(37, '657,659', 'AvxAdtwMR7Ss', '29', '33,50', '2,2', '591.8', '', 'COD', 'Pending', '2019-04-26 18:59:12'),
(38, '661', '0M527uPBt24J', '1', '33', '1', '198.0', '', 'COD', 'Pending', '2019-04-27 09:33:36'),
(39, '662', '1HOgAhMmNfRx', '1', '32', '1', '165.0', '', 'COD', 'Pending', '2019-04-27 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `minimum_value` varchar(255) NOT NULL,
  `promo_percentage` float NOT NULL,
  `promo_title` varchar(255) NOT NULL,
  `promo_desc` varchar(100) NOT NULL,
  `promo_policy` text NOT NULL,
  `promo_start_date` date NOT NULL,
  `promo_end_date` date NOT NULL,
  `banner_image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promo`
--

INSERT INTO `tbl_promo` (`id`, `promo_code`, `minimum_value`, `promo_percentage`, `promo_title`, `promo_desc`, `promo_policy`, `promo_start_date`, `promo_end_date`, `banner_image`, `status`) VALUES
(2, 'BYTO20', '300', 20, 'BYTOTECH 20 ', 'Get 20% discount on minimum purchase of 300$', '<p>Coupan is valit till 10th March 2019.<br />\r\nCoupan is applicable on minimum purchase of 300$.<br />\r\n?user will get 20% discount on total cart value.</p>\r\n', '2018-11-01', '2019-07-31', '40044_promo-img.png', '1'),
(3, 'BYTO10', '150', 10, 'BYTOTECH 10', 'Get 10% Discount on minimum purchase of 150$.', '<p>Coupan is valit till 13th June 2019.<br />\r\nCoupan is applicable on minimum purchase of 150$.<br />\r\n?user will get 10% discount on total cart value.</p>\r\n', '2018-10-01', '2019-06-13', '85965_promo-img.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `menu_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `rate` int(11) NOT NULL,
  `msg` text,
  `dt_rate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`menu_id`, `cat_id`, `mid`, `restaurant_id`, `ip`, `rate`, `msg`, `dt_rate`) VALUES
(3, 2, 0, 1, '1', 4, 'test', '2017-11-23 07:17:53'),
(5, 6, 0, 2, '1', 3, 'test', '2017-11-23 12:03:03'),
(6, 4, 0, 3, '1', 3, 'test', '2017-11-23 12:04:18'),
(7, 3, 0, 2, '4', 5, 'test', '2017-11-23 12:24:44'),
(8, 5, 0, 3, '4', 5, 'test', '2017-11-23 12:30:27'),
(9, 4, 0, 4, '4', 3, 'nice', '2017-12-04 05:38:36'),
(10, 5, 0, 5, '4', 3, 'tes', '2017-12-19 07:00:58'),
(11, 6, 0, 1, '4', 3, 'fncj', '2017-12-20 05:11:04'),
(12, 3, 0, 6, '4', 5, 'test', '2017-12-20 08:58:39'),
(13, 10, 0, 8, '4', 5, 'nice', '2017-12-20 09:32:57'),
(14, 2, 0, 7, '4', 5, 'test', '2017-12-20 09:58:51'),
(15, 10, 0, 9, '4', 4, 'good', '2017-12-21 04:02:32'),
(16, 0, 0, 1, '17', 4, 'test', '2018-03-22 09:41:58'),
(17, 0, 21, 1, '49', 3, 'test menu', '2018-03-30 05:32:12'),
(18, 0, 0, 1, '48', 3, 'test menu', '2018-03-30 05:33:35'),
(19, 0, 4, 0, '48', 3, 'test menu', '2018-03-30 11:21:45'),
(21, 0, 17, 0, '68', 4, 'comment', '2018-03-30 12:56:18'),
(22, 0, 28, 0, '6', 3, 'bed', '2018-03-30 13:01:48'),
(23, 0, 16, 0, '6', 5, 'testy', '2018-03-30 14:15:51'),
(24, 0, 27, 0, '6', 5, 'helth of good', '2018-03-30 14:17:06'),
(25, 0, 25, 0, '6', 5, 'nice sak', '2018-03-30 14:17:37'),
(26, 0, 21, 0, '9', 4, 'comment ', '2018-04-03 06:30:57'),
(27, 0, 5, 0, '1', 4, 'test', '2018-04-04 09:40:14'),
(28, 0, 11, 0, '6', 3, 'mediums', '2018-04-05 12:48:34'),
(29, 0, 12, 0, '112', 5, 'sss', '2018-04-06 02:55:01'),
(30, 0, 21, 0, '112', 0, 'jokowi', '2018-04-06 02:55:12'),
(31, 0, 23, 0, '6', 3, 'hi', '2018-04-06 06:23:27'),
(32, 0, 22, 0, '6', 4, 'samosa', '2018-04-06 06:25:19'),
(33, 0, 24, 0, '6', 4, 'Ni', '2018-04-06 11:51:43'),
(34, 0, 27, 0, '9', 0, 'ff', '2018-04-06 12:32:38'),
(35, 0, 16, 0, '9', 0, 'xxx', '2018-04-06 12:38:05'),
(36, 0, 18, 0, '6', 4, 'something food', '2018-04-06 12:58:51'),
(37, 0, 11, 0, '112', 0, 'hello', '2018-04-09 06:31:14'),
(38, 0, 10, 0, '112', 0, 'hello', '2018-04-09 06:31:31'),
(39, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:42:15'),
(40, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:28'),
(41, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:29'),
(42, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:30'),
(43, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:31'),
(44, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:38'),
(45, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:39'),
(46, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:40'),
(47, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:41'),
(48, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:41'),
(49, 0, 21, 0, '1', 4, 'test', '2018-04-09 07:47:41'),
(50, 0, 27, 0, '6', 4, 'hauuaua', '2018-04-09 07:47:47'),
(51, 0, 27, 0, '6', 3, 'nanana', '2018-04-09 07:48:03'),
(52, 0, 27, 0, '6', 4, 'yes nice', '2018-04-09 07:48:28'),
(53, 0, 16, 0, '9', 2, 'ddd', '2018-04-10 03:41:46'),
(54, 0, 16, 0, '9', 0, 'kamlesh', '2018-04-10 03:57:51'),
(63, 0, 9, 0, '68', 2, 'test', '2018-04-26 02:51:53'),
(64, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:08:24'),
(65, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:09:52'),
(66, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:09:53'),
(67, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:10:07'),
(68, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:10:27'),
(69, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:10:32'),
(70, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:29:24'),
(71, 0, 21, 0, '1', 4, 'test', '2018-05-30 10:29:37'),
(72, 0, 33, 0, '116', 4, 'addes', '2018-05-30 10:34:25'),
(73, 0, 33, 0, '116', 4, 'tested', '2018-05-30 11:00:52'),
(74, 0, 33, 0, '116', 4, 'testing', '2018-05-30 12:23:38'),
(75, 0, 21, 0, '1', 4, 'test', '2018-06-12 11:19:17'),
(76, 0, 21, 0, '1', 4, 'test', '2018-08-24 06:58:08'),
(77, 0, 21, 0, '1', 4, 'test', '2018-08-27 10:26:52'),
(78, 0, 21, 0, '1', 4, 'test', '2018-10-01 09:54:36'),
(79, 0, 21, 0, '1', 4, 'test', '2018-10-02 06:07:21'),
(80, 0, 21, 0, '1', 4, 'test', '2018-10-30 07:43:50'),
(81, 0, 21, 0, '1', 5, 'test', '2018-10-30 07:45:29'),
(82, 0, 21, 0, '1', 5, 'test', '2018-10-30 07:45:34'),
(83, 0, 21, 0, '1', 5, 'test', '2018-10-30 07:45:35'),
(84, 0, 21, 0, '1', 4, 'test', '2018-10-30 09:17:33'),
(85, 0, 32, 0, '160', 4, 'pradip', '2018-10-30 09:27:23'),
(86, 0, 35, 0, '160', 4, '', '2018-10-30 09:32:08'),
(87, 0, 35, 0, '160', 5, '', '2018-10-30 09:35:04'),
(88, 0, 33, 0, '166', 2, 'nice', '2018-11-27 05:17:20'),
(89, 0, 33, 0, '166', 2, 'nice', '2018-11-27 05:34:28'),
(90, 0, 33, 0, '166', 2, 'nice', '2018-11-27 05:37:40'),
(91, 0, 33, 0, '166', 2, 'Nice', '2018-11-27 05:40:17'),
(92, 0, 33, 0, '166', 2, 'Nice', '2018-11-27 05:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `app_terms_conditions` text NOT NULL,
  `app_from_email` varchar(255) DEFAULT NULL,
  `app_admin_email` varchar(255) DEFAULT NULL,
  `api_all_order_by` varchar(255) NOT NULL,
  `api_latest_limit` int(3) NOT NULL,
  `api_cat_order_by` varchar(255) NOT NULL,
  `api_cat_post_order_by` varchar(255) NOT NULL,
  `onesignal_app_id` varchar(500) NOT NULL,
  `onesignal_rest_key` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `app_terms_conditions`, `app_from_email`, `app_admin_email`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `onesignal_app_id`, `onesignal_rest_key`) VALUES
(1, 'Restorder', 'restorder-logo.png', 'info@bytotech.com', '1.0.0', 'Bytotech Solution', '+91 9601501313', 'www.bytotech.com', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 'Bytotech Solution', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 'info@bytotech.com', 'info@bytotech.com', '', 10, 'category_name', 'ASC', '0c9dab71-428f-4ea1-bd71-4c37942aa649', 'NDRkZTVmZGMtMWZiOC00OWNkLWFiMDItOWVhNjgzYTBiOGY0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliderimage`
--

CREATE TABLE `tbl_sliderimage` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tex`
--

CREATE TABLE `tbl_tex` (
  `id` int(11) NOT NULL,
  `tex_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tex`
--

INSERT INTO `tbl_tex` (`id`, `tex_price`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `gplus_id` varchar(255) NOT NULL,
  `twiter_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `paypal_payment_id` varchar(255) NOT NULL DEFAULT '',
  `confirm_code` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `fb_id`, `gplus_id`, `twiter_id`, `name`, `email`, `password`, `phone`, `address_line_1`, `address_line_2`, `city`, `state`, `country`, `zipcode`, `user_image`, `paypal_payment_id`, `confirm_code`, `status`) VALUES
(1, 'Normal', '', '', '', 'vaishu', 'etc@gmail.com', '123', '9798998', 'bshd', 'bdbf', 'hsbd', 'bdbdh', 'bzvv', '9497', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(2, 'Normal', '', '', '', 'jitu', 'jitu@gmail.com', '1234', '834751235', 'ahmedabad', 'ahmedabad', 'ahmedabad', 'Gujarat', 'india', '380058', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(3, 'Normal', '', '', '', 'pradip', 'pradip.bytotech@gmail.com', '123', '1231231231', 'test1', 'test2', 'Ahmedabad', 'Gujarat', 'ind6', '333333', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(4, 'Normal', '', '', '', 'Saketh Reddy', 'sakethreddy996@gmail.com', 'psr12345', '9642291082', 'Unnamed Road', 'Hyderabad', 'Hyderabad', 'Telangana', 'India', '500031', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(5, 'Normal', '', '', '', '79274555872', 'mozg455@gmail.com', 'racing', '79274555872', 'ghyyy', 'yyyy', 'gt', 'yy', 'ttt', '333', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(6, 'Normal', '', '', '', 'A Smit', 'sggolakiya@gmail.com', 'smit1111', '8140444199', 'aaa', 'aa', 'surat', 'gujarat', 'india', '394101', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(7, 'Normal', '', '', '', 'Mohamed', 'mmfarghaly@hotmail.com', '123456@', '01001287466', 'at', 'at', 'Tanya', 'Tanya', 'Egypt', '31111', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(8, 'Facebook', '1176620872520667', '', '', 'Tasyo Tasyo', 'tasyoshop@yahoo.com', '', '', 'hjkhkj', 'hkjhkj', 'kljl', 'hkjhkj', 'kjlk', '', 'https://graph.facebook.com/1176620872520667/picture?type=large', '', '', '1'),
(9, 'Normal', '', '', '', 'Xhxhdjdd', 'darreback@gmail.com', '43000751', '+420777052962', 'jdjxjxxkxk', 'ddjdjdjf', 'djxjxjx', 'xnxnxx', 'djxjxjxjx', '123456', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(10, 'Normal', '', '', '', 'Deni', 'denypk1@gmail.com', 'salam2019', '085358541636', 'jl panglima polem / pelawis', 'kec sp kiri', 'subulussalam', 'aceh', 'indonesia', '24782', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(11, 'Facebook', '2440511639326202', '', '', 'Aleksandr Uspeshnyy', 'aleksandr@uspeshnyy.ru', '', '', 'мира 19 кв 8', 'мира 19', 'Волгоград', 'волгоградская', 'россия', '400005', 'https://graph.facebook.com/2440511639326202/picture?type=large', '', '', '1'),
(12, 'Normal', '', '', '', 'Sandeep', 'sandy.ghuge141@gmail.com', 'sandy141', '8793543206', 'Santacruz', 'Santacruz', 'Mumbai', 'Maharashtra', 'India', '400055', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(13, 'Normal', '', '', '', 'MD SHOHEL RANA', 'shohel01716@gmail.com', '111111', '01716920198', '213/1 W Agargaon', 'edd', 'Dhaka', 'ddd', 'Bangladesh', '1111', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(14, 'Normal', '', '', '', 'mostafa', 'mustafa.abobaker@gmail.com', '123456', '01147211106', 'giza', 'rehab 22', 'cairo', 'rehab', 'Egypt', '12345', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(15, 'Normal', '', '', '', 'vedverma', 'raunixtech@gmail.com', 'Rashig@9057', '+919664083029', '107 uit Colony', 'Bharatpur', 'Bharatpur', 'Rajasthan', 'India', '321001', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(16, 'Normal', '', '', '', 'pooja', 'agarwalpooja1997@gmail.com', '123', '8005652431', 'exgvnn', 'gvh b', 'bharatpur', 'Rajasthan', 'india', '321001', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(17, 'Normal', '', '', '', 'Yasir', 'wecuwpk@gmail.com', '12345', '5577213', 'fgg', 'ggg', 'wah', 'Punjab', 'Pakistan', '47070', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(18, 'Normal', '', '', '', 'Tayron Alves', 'tayrontj@gmail.com', '92791481', '5567993093189', 'rua dos astros', '1548', 'Três Lagoas', 'MS', 'Brasil', '79611213', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(19, 'Normal', '', '', '', 'Rahul', 'adiraj0032@gmail.com', '', '9140396434', 'hdj', 'jdj', 'patna', 'bihar', 'india', '700080', 'http://bytotech.com/envato/restorder/imagess/IMG_20190416_015455_218.jpg', '', '', '1'),
(20, 'Normal', '', '', '', 'Rajlaxmi', 'rajlaxmiburman4@gamil.com', 'louie16', '9431808022', 'ambala', 'mullana', 'ambala', 'haryana', 'india', '800006', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(21, 'Normal', '', '', '', 'Mujahid Latin', 'mujahid689@hotmail.com', '12345678', '+923218565452', 'Home 1', 'Home 2', 'Lahore', 'Punjab', 'Pakistan', '54000', 'http://bytotech.com/envato/restorder/imagess/Profile.jpeg', '', '', '1'),
(22, 'Normal', '', '', '', 'Towfeeq Ahmad', 'setowfeeq@gmail.com', 'gmail1418', '9906465216', 'Dharmahama Mantrigam', 'Bandipora', 'Srinagar', 'JK', 'In', '193502', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(23, 'Normal', '', '', '', 'naneci', 'naneci@nane.com', '123456', '2233445566', 'adrrssees', 'streer5', '9000', 'isttew', 'niger', '112233', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(24, 'Normal', '', '', '', 'nazeer', 'shaiknazeeruddin@live.com', 'qdchhu07', '7702111166', 'fyuvk', 'fiovko', 'fkvkk', 'gkkb', 'hovi', '86', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(25, 'Normal', '', '', '', 'aloia', 'ahj@gmail.com', '1234567', '09188660000', 'rchh', 'gf', 'ggb', 'hghjg', 'gfh', '086', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(26, 'Normal', '', '', '', 'Amit Chakraborty', 'amit.ac917@gmail.com', '123456', '7001744431', 'Kaiyar', 'Koyar', 'Burdwan', 'WB', 'Kaiyar', '713423', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(27, 'Normal', '', '', '', 'demo', 'webdevelopers09@gmail.com', 'admin1244', '7386401277', 'demo', 'demo', 'demo', 'demo', 'us', '12345', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(28, 'Normal', '', '', '', 'Bhanu', 'gdbspbp@gmail.com', '1115bunny', '9848199812', 'demo', 'demo', 'demo', 'demo', 'demo', '530026', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1'),
(29, 'Normal', '', '', '', 'Hasan', 'demirdoven.hh@gmail.com', 'android', '+905462196998', 'Tınaztepe Mahallesi, Eşrefpaşa Cd. 273 A', 'İzmir', 'Konak', 'İzmir', 'Türkiye', '35270', 'http://bytotech.com/envato/restorder/imagess/', '', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner_ad`
--
ALTER TABLE `tbl_banner_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_intro`
--
ALTER TABLE `tbl_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `tbl_menu_category`
--
ALTER TABLE `tbl_menu_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_menu_image`
--
ALTER TABLE `tbl_menu_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sliderimage`
--
ALTER TABLE `tbl_sliderimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tex`
--
ALTER TABLE `tbl_tex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_banner_ad`
--
ALTER TABLE `tbl_banner_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tbl_intro`
--
ALTER TABLE `tbl_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `tbl_menu_category`
--
ALTER TABLE `tbl_menu_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu_image`
--
ALTER TABLE `tbl_menu_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sliderimage`
--
ALTER TABLE `tbl_sliderimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tex`
--
ALTER TABLE `tbl_tex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
