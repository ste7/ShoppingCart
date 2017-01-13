-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 05:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `img`) VALUES
(1, 'ACER Aspire V15 Nitro VN7-591G-737L', 'The Acer Aspire V15 Nitro Black Edition combines elegant looks with solid gaming gaming performance, but you''ll sacrifice some battery life.', 1019.59, 'app\\img\\image558d5ad31f2c8.jpg'),
(2, 'ACER Aspire E5-573G-39DZ - NX.MW4EX.019', 'A variety of vivid colors and a stylish metallic textile pattern are enjoyable to the eye and pleasant to touch. Additional edge highlights emphasize the stylish look of the entire series and complement the distinctive design.', 466.99, 'app\\img\\1078720_l.jpg'),
(3, 'DELL Inspiron 11 3162 - NOT10016', 'technology:Up to 6th Gen Intel Core processors offer speed and efficiency for responsive performance whether you''re surfing the web, writing a paper or uploading photos. Get the Intel®-level performance you’ve come to expect.', 505.00, 'app\\img\\image581dfa20791f2.png'),
(4, 'APPLE MacBook Air 13" - MMGG2ZE/A', 'MacBook Air lasts up to an incredible 12 hours between charges. So from your morning coffee till your evening commute, you can work unplugged. When it’s time to kick back and relax, you can get up to 12 hours of iTunes movie playback. And with up to 30 days of standby time, you can go away for weeks and pick up right where you left off.', 1525.00, 'app\\img\\image57ff4501b456e.png'),
(5, 'ACER Aspire E15 E5-575G-594P', 'Included are faster wireless networking, high-speed DDR4 system memory, powerful NVIDIA GeForce GTX 950M1 (GDDR5) 1 graphics and support for the new reversible USB Type-C™1 standard. Plus you’ll go unplugged for longer with up to 12 hours2 of battery life.', 680.79, 'app\\img\\1078720_l.jpg'),
(6, 'APPLE MacBook 12" (Space Gray) - MLH72CR/A', 'When it''s time to kick back and relax, you can get up to 12 hours of iTunes movie playback. And with up to 30 days of standby time, you can go away for weeks and pick up right where you left off.', 2032.99, 'app\\img\\image57e6df0fdcf43.png'),
(7, 'APPLE MacBook Pro 13" - MLL42ZE/A', '2.0GHz dual-core Intel Core i5, Turbo Boost up to 3.1GHz, with 4MB shared L3 cache\r\nConfigurable to 2.4GHz dual-core Intel Core i7, Turbo Boost up to 3.4GHz, with 4MB shared L3 cache', 2070.89, 'app\\img\\image581d107ddb40f.png'),
(8, 'APPLE MacBook 12" (Gold) - MLHF2CR/A', '1.2GHz dual-core Intel Core m5 processor (Turbo Boost up to 2.7GHz) with 4MB L3 cache.Configurable to 1.3GHz dual-core Intel Core m7 processor (Turbo Boost up to 3.1GHz) with 4MB L3 cache.', 2690.00, 'app\\img\\image581d14758e2db.png'),
(9, 'HP ENVY 15-as104nm - Z6J32EA', 'The G752VM showcases the evolution of the brand, with a revolutionary design finished in an Armor Titanium and Plasma Copper color scheme. With the latest NVIDIA® GeForce® GTX™ 10 series graphics, Windows 10 Pro.\r\n', 1780.00, 'app\\img\\image558d5ad31f2c8.jpg'),
(10, 'HP Pavilion 17-ab005nm - Z5A04EA', 'Get ready to unleash your inner content-creating, media-craving, game-crushing potential, because this Pavilion Laptop was built to handle everything you’ve got. With turbocharged performance you can go from immersive streaming sessions to lag-free video editing, and do it all from wherever you want.', 1892.00, 'app\\img\\image584164e96e150.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `price`, `total`, `item_id`, `user_id`) VALUES
(1, 4, 1019.59, 4078.36, 1, 1),
(2, 5, 2690.00, 13450.00, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_offline`
--

CREATE TABLE `orders_offline` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `hash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `salt`) VALUES
(1, 'Stefan', 'Stefan', '8326090449d97a5f3e7dde4e1b4e3e35aed89f9129195b1a9a4389908abcf083', 'x½¢÷\n×njþ¦é4wI¸E•À#eG}¯Üô{~Î');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders_offline`
--
ALTER TABLE `orders_offline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders_offline`
--
ALTER TABLE `orders_offline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `orders_offline`
--
ALTER TABLE `orders_offline`
  ADD CONSTRAINT `orders_offline_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
