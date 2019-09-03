-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2019 at 06:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_valentina_panetta_travelmatic`
--
CREATE DATABASE IF NOT EXISTS `cr11_valentina_panetta_travelmatic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_valentina_panetta_travelmatic`;

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

DROP TABLE IF EXISTS `concerts`;
CREATE TABLE `concerts` (
  `conc_id` int(11) NOT NULL,
  `conc_name` varchar(55) DEFAULT NULL,
  `conc_price` varchar(55) DEFAULT NULL,
  `conc_date` date DEFAULT NULL,
  `conc_time` time DEFAULT NULL,
  `conc_web` varchar(55) DEFAULT NULL,
  `fk_loc` int(11) DEFAULT NULL,
  `venue` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`conc_id`, `conc_name`, `conc_price`, `conc_date`, `conc_time`, `conc_web`, `fk_loc`, `venue`) VALUES
(1, 'Hozier', '50', '2019-09-10', '20:00:00', 'https://konzerthaus.at/concert/eventid/56712', 9, 'Wiener Konzerthaus'),
(2, 'Mitski', '30', '2019-08-13', '20:00:00', 'https://mitski.com/', 10, 'Flex'),
(3, 'Weyes Blood', '20', '2019-11-13', '20:00:00', 'https://www.binuu.de/events/2019-11-13-weyes-blood', 11, 'Bi Nuu'),
(4, 'Florence and the Machine', '268', '2019-07-13', '20:00:00', 'https://florenceandthemachine.net/', 12, 'Hyde Park');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `address` varchar(55) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `loc_img` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `address`, `zipcode`, `city`, `loc_img`, `lat`, `lng`) VALUES
(1, 'Lislorkan North', 37111, 'County Clare', 'resources/img/cliffs.jpg', 52.9721, -9.42624),
(2, 'Svensksundsvaegen 13', 11149, 'Stockholm', 'resources/img/skeppsholmen.jpg', 59.325, 18.0849),
(3, '83 Swains Lane', 16634, 'London', 'resources/img/highgate.jpg', 51.5671, -0.146534),
(4, 'Canongate 8DX', 16234, 'Edinburgh', 'resources/img/holyrood.jpg', 55.9534, -3.17123),
(5, '116 Ebury Street', 16224, 'London', 'resources/img/peggyporschen.jpg', 51.4933, -0.150545),
(6, '12 Tavistock Street', 16224, 'London', 'resources/img/milkinsta.jpg', 51.5115, -0.121583),
(7, '53 Lexington Street', 16224, 'London', 'resources/img/bao.jpeg', 51.5133, -0.136546),
(8, '231 Ebury Street', 16224, 'London', 'resources/img/saint.jpg', 51.5143, -0.166741),
(9, 'Lothringerstrasse 20', 1030, 'Vienna', 'resources/img/hozier.jpg', 48.2007, 16.3776),
(10, 'Augartenbruecke 1', 1010, 'Vienna', 'resources/img/mitski.jpg', 48.2178, 16.3709),
(11, 'Schlesisches Tor', 10977, 'Berlin', 'resources/img/weyes.jpg', 52.501, 13.4416),
(12, 'Hyde Park', 16224, 'London', 'resources/img/florence.jpg', 51.5074, -0.166281),
(13, 'Zentrum-Bozner Boden-Rentsch', 39100, 'Bolzano', 'https://i1.wp.com/www.mylifelongholiday.com/wp-content/uploads/2018/08/img_2398.jpg?resize=1000%2C1000&ssl=1', 46.5009, 11.3606);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(55) DEFAULT NULL,
  `res_tel` varchar(55) DEFAULT NULL,
  `res_type` varchar(55) DEFAULT NULL,
  `res_descr` text,
  `res_web` varchar(55) DEFAULT NULL,
  `fk_loc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`res_id`, `res_name`, `res_tel`, `res_type`, `res_descr`, `res_web`, `fk_loc`) VALUES
(1, 'Peggy Porschen', '+44 20 7730 1316', 'Bakery', 'Chic bakery featuring creative cupcakes, fancy cakes and other sweet treats.', 'https://www.peggyporschen.com/', 5),
(2, 'Milk Train', '+44 20 7730 1316', 'Ice Cream Parlour', 'Funky spot for an inventive selection of fresh ice creams, candyfloss and pop corn.', 'https://www.milktraincafe.com/', 6),
(3, 'Bao Soho', '+44 90 7870 5316', 'Taiwanese', 'Intimate, wood-furnished space for steamed milk buns & other inventive Taiwanese eats & drinks.', 'https://baolondon.com/', 7),
(4, 'Saint Aymes', '+44 20 7262 1185', 'Coffee Shop', 'Social media friendly coffee shop & bakery with signature coffee drinks, milkshakes, & sweets.', 'https://www.saintaymes.com/', 8);

-- --------------------------------------------------------

--
-- Table structure for table `things_to_do`
--

DROP TABLE IF EXISTS `things_to_do`;
CREATE TABLE `things_to_do` (
  `t_id` int(11) NOT NULL,
  `t_type` varchar(55) DEFAULT NULL,
  `t_descr` text,
  `t_web` varchar(55) DEFAULT NULL,
  `fk_loc` int(11) DEFAULT NULL,
  `t_name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `things_to_do`
--

INSERT INTO `things_to_do` (`t_id`, `t_type`, `t_descr`, `t_web`, `fk_loc`, `t_name`) VALUES
(1, 'Sightseeing', 'The Cliffs of Moher are sea cliffs located at the southwestern edge of the Burren region in County Clare, Ireland. They run for about 14 kilometres.', 'https://www.cliffsofmoher.ie/about-the-cliffs/geology/', 1, 'Cliffs of Moher'),
(2, 'Sightseeing', 'Compact Skeppsholmen island is known for its peaceful vibe and cultural attractions, including the Moderna Museet, which exhibits works by Picasso.', 'https://en.wikipedia.org/wiki/Skeppsholmen', 2, 'Skeppsholmen Island'),
(3, 'Landmark', 'Beautiful Victorian cemetery near to Hampstead Heath. Highgate Cemetery has some of the finest funerary architecture in the country.', 'https://highgatecemetery.org/', 3, 'Highgate Cemetery'),
(4, 'Historic Site', 'Holyrood Abbey is a ruined abbey of the Canons Regular in Edinburgh, Scotland. The abbey was founded in 1128 by King David I.', 'https://www.historicenvironment.scot/visit-a-place/', 4, 'Holyrood Abbey');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT 'resources/img/user.png',
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pw`, `img_path`, `role`) VALUES
(1, 'Valentina', 'Panetta', 'vp@gmail.com', '3336e457470f8356b52e6cc8c94d9da2f8a42a3b43c98f668564c6c69c4705db', 'resources/img/admin.png', 'admin'),
(2, 'Jane', 'Doe', 'jdoe@gmail.com', '3336e457470f8356b52e6cc8c94d9da2f8a42a3b43c98f668564c6c69c4705db', 'resources/img/user.png', 'user'),
(7, 'bibi', 'bubi', 'b@b.b', '3336e457470f8356b52e6cc8c94d9da2f8a42a3b43c98f668564c6c69c4705db', 'resources/img/user.png', 'user'),
(8, 'Valentina', 'Panetta', 'apricocot@gmail.com', '3336e457470f8356b52e6cc8c94d9da2f8a42a3b43c98f668564c6c69c4705db', 'resources/img/user.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`conc_id`),
  ADD KEY `fk_loc` (`fk_loc`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `fk_loc` (`fk_loc`);

--
-- Indexes for table `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `fk_loc` (`fk_loc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `conc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `things_to_do`
--
ALTER TABLE `things_to_do`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
 

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`fk_loc`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`fk_loc`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD CONSTRAINT `things_to_do_ibfk_1` FOREIGN KEY (`fk_loc`) REFERENCES `locations` (`loc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
