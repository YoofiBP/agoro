-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2018 at 12:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agoro`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(11001, 'PlayStation'),
(11002, 'Xbox'),
(11003, 'Windows'),
(11004, 'OSX'),
(11005, 'Wii'),
(11006, 'Balenciaga');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(3, '::1', 1),
(8, '::1', 1),
(9, '::1', 1),
(10, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(12001, 'Trainers'),
(12002, 'Slippers'),
(12003, 'Sneakers'),
(12004, 'Plimsoles');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(200) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order-date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_image1` text NOT NULL,
  `product_image2` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image1`, `product_image2`, `product_keywords`) VALUES
(3, 12001, 11001, 'Fifa 19', 100, 'EA SPORTS™ FIFA 19 delivers a champion-caliber experience on and off the pitch. Led by the prestigious UEFA Champions League, FIFA 19 offers enhanced gameplay features that allow you to control the pitch in every moment.', 'images/games/PS4/sports/fifa.jpeg', 'images/games/PS4/sports/fifa.jpeg', 'images/games/PS4/sports/fifa.jpeg', 'fifa'),
(4, 12002, 11002, 'Uncharted 4 : A Thief\'s End', 20, 'Uncharted 4: A Thief\'s End is an action-adventure game developed by Naughty Dog and published by Sony Computer Entertainment for PlayStation 4 in May 2016. Following Uncharted 3: Drake\'s Deception, it is the final Uncharted game to feature protagonist Nathan Drake (portrayed by Nolan North).', 'images/games/PS4/simulation/uncharted.jpeg', 'images/games/PS4/simulation/uncharted.jpeg', 'images/games/PS4/simulation/uncharted.jpeg', 'ps4'),
(5, 12002, 11002, 'Final Fantasy XV', 20, 'Final Fantasy XV is an open world, action role-playing game in which players assume control of Noctis Lucis Caelum, a prince who can perform a variety of actions related to both field exploration and combat. The kingdom of Lucis is a single, connected landmass that is explored primarily in the party\'s car, the Regalia.', 'images/games/PS4/fantasy/final.jpg', 'images/games/PS4/fantasy/final.jpg', 'images/games/PS4/fantasy/final.jpg', 'ps4'),
(6, 12002, 11002, 'NBA 2K19', 20, 'NBA 2K celebrates 20 years of redefining what sports gaming can be, from best in class graphics & gameplay to groundbreaking game modes and an immersive open-world “Neighborhood.” NBA 2K19 continues to push limits as it brings gaming one step closer to real-life basketball excitement and culture.', 'images/games/PS4/sports/2k.jpeg', 'images/games/PS4/sports/2k.jpeg', 'images/games/PS4/sports/2k.jpeg', 'slips'),
(8, 12003, 11002, 'Sims 2', 120, 'The Sims 2 is a 2004 strategic life simulation video game developed by Maxis and published by Electronic Arts. It is the sequel to The Sims. The game has the same concept as its predecessor: players control their Sims in various activities and form relationships in a manner similar to real life', 'images/games/PC/simulation/sims.jpg', 'images/games/PC/simulation/sims.jpg', 'images/games/PC/simulation/sims.jpg', 'pc'),
(9, 12003, 11001, 'Call of Duty : Black Ops', 110, 'The hallmark intensity of Call of Duty returns with an epic single-player campaign that takes players deep behind enemy lines as an elite Black Ops soldier engaging in covert warfare, classified operations, and explosive conflicts across the globe.', 'images/games/PS4/fantasy/cod.png', 'images/games/PS4/fantasy/cod.png', 'images/games/PS4/fantasy/cod.png', 'urban, casual'),
(10, 12004, 11003, 'UFC 3', 45, 'EA Sports UFC 3 is a mixed martial arts fighting game, similar to previous installments, the game is based on Ultimate Fighting Championship (UFC), while also retaining realism with respect to physics, sounds and movements.', 'images/games/xbox/sports/ufc.jpg', 'images/games/xbox/sports/ufc.jpg', 'images/games/xbox/sports/ufc.jpg', 'xbox'),
(11, 12001, 11001, 'Fortnite', 160, 'Fortnite has up to four players cooperating on various missions on randomly-generated maps to collect resources, build fortifications around defensive objectives that are meant to help fight the storm and protect survivors, and construct weapons', 'images/games/xbox/simulation/fortnite.jpg', 'images/games/xbox/simulation/fortnite.jpg', 'images/games/xbox/simulation/fortnite.jpg', 'sports, trainers, basketball ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11007;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12005;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
