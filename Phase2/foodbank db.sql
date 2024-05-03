-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 03:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `name`, `address`) VALUES
(1, 'Al-Rahma', 'july23 - Abbasiya Square'),
(2, 'Al-Aswaq', 'Al-Gomhouria Street - Assiut'),
(3, 'Emdad', 'Saad Zaghloul Street - Fayoum'),
(4, 'Rawabi', 'Corniche Street - Aswan'),
(5, 'Al-Meera', 'Al-Galaa Street - Tanta');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `donor_id` int(10) UNSIGNED DEFAULT NULL,
  `total_cost` float UNSIGNED NOT NULL,
  `donation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_id`, `total_cost`, `donation_date`) VALUES
(1, 1, 800, '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `donation_details`
--

CREATE TABLE `donation_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `donation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Qty` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_details`
--

INSERT INTO `donation_details` (`id`, `donation_id`, `item_id`, `Qty`, `price`) VALUES
(1, 1, 2, 3, 300),
(2, 1, 3, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `username`, `birthdate`, `email`, `password`, `phone_number`, `gender`) VALUES
(1, 'Aya', '1992-08-25', 'aya17@hotmail.com', 'aya_pass123', '01098765432', 1),
(2, 'Youssef', '1985-12-10', 'youssefH@gmail.com', 'youssef_pass', '01198765432', 0),
(3, 'Nour', '1998-04-03', 'nourBassel22@gmail.com', 'nour123', '01298765432', 1),
(4, 'Ahmed', '1990-05-15', 'ahmedelwazeer90@hotmail.com', 'password123', '01012345678', 0),
(5, 'Fatma', '1988-10-20', 'fatmawaked19@gmail.com', 'fatma_password', '01123456789', 1),
(6, 'Mohamed', '1995-03-08', 'mohamed6677@gmail.com', 'mohamed_pass', '01234567890', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(128) DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `item_cost` float UNSIGNED DEFAULT NULL,
  `amount` mediumint(128) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `program_id`, `item_cost`, `amount`) VALUES
(1, 'Monthly Carton', 1, 500, 600),
(2, 'Orphan meal', 2, 100, 2000),
(3, 'Gaza family box', 5, 500, 1080),
(4, 'kafara meal', 4, 65, 1000),
(5, 'Sheep', 3, 8500, 200),
(6, 'Calf', 3, 20000, 170);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_name` varchar(128) DEFAULT NULL,
  `description` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program_name`, `description`) VALUES
(1, 'Feed a Family', 'Provides dry food to eligible cases and families, they receive the carton on a monthly basis.'),
(2, 'Feed an Orphan', 'Enhance the growth of orphan children by providing healthy food to improve their mental and physical abilities.'),
(3, 'Fido and Aqeeqah', 'For the newborn, the purchase of a new asset such as a car or something else.'),
(4, 'Al-Kafara', 'The Egyptian Food Bank accepts the Kafara, and distributes it in the form of a meal'),
(5, 'Help for Gaza', 'The Egyptian Food Bank launches an urgent humanitarian relief campaign to help our affected families in the Gaza.');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`) VALUES
(1, 'Farm Village', 'European countryside - Cairo'),
(2, 'Sunshine Acres', 'Helmeyat Al-zaytoon'),
(3, 'AlBaik', 'Juhayna Square - Cairo'),
(4, 'Al-Hassan and Al-Hus', 'Saad Zaghloul - Tanta'),
(5, 'Sheikh Al-Mandi', 'Al-Andalus - 5th settelment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_details`
--
ALTER TABLE `donation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation_details`
--
ALTER TABLE `donation_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
