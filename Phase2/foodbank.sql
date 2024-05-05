-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:24 PM
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
  `address` varchar(150) DEFAULT NULL,
  `distributorid` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `name`, `address`, `distributorid`) VALUES
(1, 'Al-Rahma', 'july23 - Abbasiya Square', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Al-Aswaq', 'Al-Gomhouria Street - Assiut', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Emdad', 'Saad Zaghloul Street - Fayoum', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Rawabi', 'Corniche Street - Aswan', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Al-Meera', 'Al-Galaa Street - Tanta', 'e4da3b7fbbce2345d7772b0674a318d5');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_cost` float UNSIGNED NOT NULL,
  `donation_date` date NOT NULL,
  `donationid` varchar(222) DEFAULT NULL,
  `donor_id` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `total_cost`, `donation_date`, `donationid`, `donor_id`) VALUES
(1, 800, '2024-03-22', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 500, '2024-05-04', 'c81e728d9d4c2f636f067f89cc14862c', '8f14e45fceea167a5a36dedd4bea2543'),
(5, 500, '2024-05-04', 'e4da3b7fbbce2345d7772b0674a318d5', '8f14e45fceea167a5a36dedd4bea2543'),
(41, 500, '2024-05-05', '3416a75f4cea9109507cacd8e2f2aefc', '8f14e45fceea167a5a36dedd4bea2543'),
(51, 500, '2024-05-05', '2838023a778dfaecdc212708f721b788', '8f14e45fceea167a5a36dedd4bea2543'),
(52, 100, '2024-05-05', '9a1158154dfa42caddbd0694a4e9bdc8', '8f14e45fceea167a5a36dedd4bea2543'),
(53, 1000, '2024-05-05', 'd82c8d1619ad8176d665453cfb2e55f0', '8f14e45fceea167a5a36dedd4bea2543');

-- --------------------------------------------------------

--
-- Table structure for table `donation_details`
--

CREATE TABLE `donation_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `Qty` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `dd_id` varchar(222) DEFAULT NULL,
  `item_id` varchar(222) DEFAULT NULL,
  `donation_id` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_details`
--

INSERT INTO `donation_details` (`id`, `Qty`, `price`, `dd_id`, `item_id`, `donation_id`) VALUES
(1, 3, 300, 'c4ca4238a0b923820dcc509a6f75849b', 'c81e728d9d4c2f636f067f89cc14862c', NULL),
(2, 1, 500, 'c81e728d9d4c2f636f067f89cc14862c', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL),
(3, 1, 500, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL),
(48, 1, 500, '642e92efb79421734881b53e1e1b18b6', 'c4ca4238a0b923820dcc509a6f75849b', '3416a75f4cea9109507cacd8e2f2aefc'),
(49, 1, 100, 'f457c545a9ded88f18ecee47145a72c0', 'c81e728d9d4c2f636f067f89cc14862c', '3416a75f4cea9109507cacd8e2f2aefc'),
(50, 2, 500, 'c0c7c76d30bd3dcaefc96f40275bdc0a', 'c4ca4238a0b923820dcc509a6f75849b', '3416a75f4cea9109507cacd8e2f2aefc');

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
  `gender` tinyint(1) DEFAULT NULL,
  `donorid` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `username`, `birthdate`, `email`, `password`, `phone_number`, `gender`, `donorid`) VALUES
(1, 'Aya', '1992-08-25', 'aya17@hotmail.com', 'ohyeah', '01098765432', 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Youssef', '1985-12-10', 'youssefH@gmail.com', 'youssef_pass', '01198765432', 0, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Nour', '1998-04-03', 'nourBassel22@gmail.com', 'nour123', '01298765432', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Ahmed', '1990-05-15', 'ahmedelwazeer90@hotmail.com', 'password123', '01012345678', 0, 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Fatma', '1988-10-20', 'fatmawaked19@gmail.com', 'fatma_password', '01123456789', 1, 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Mohamed', '1995-03-08', 'mohamed6677@gmail.com', 'mohamed_pass', '01234567890', 0, '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'alaa2003', '2003-10-18', 'alaay318@gmail.com', '551dcdc16748c3db1bb1f97136622d048d855186', '01099155389', 1, '8f14e45fceea167a5a36dedd4bea2543');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(128) DEFAULT NULL,
  `item_cost` float UNSIGNED DEFAULT NULL,
  `amount` mediumint(128) UNSIGNED DEFAULT NULL,
  `program_id` varchar(222) DEFAULT NULL,
  `itemid` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_cost`, `amount`, `program_id`, `itemid`) VALUES
(1, 'Monthly Carton', 500, 600, 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Orphan meal', 100, 2000, 'c81e728d9d4c2f636f067f89cc14862c', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Gaza family box', 500, 1080, 'e4da3b7fbbce2345d7772b0674a318d5', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'kafara meal', 65, 1000, 'a87ff679a2f3e71d9181a67b7542122c', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Sheep', 8500, 200, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Calf', 20000, 170, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1679091c5a880faf6fb5e6087eb1b2dc'),
(9, 'test', 40, 12, 'c4ca4238a0b923820dcc509a6f75849b', '45c48cce2e2d7fbdea1afc51c7c6ad26');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_name` varchar(128) DEFAULT NULL,
  `description` varchar(1024) NOT NULL,
  `programid` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program_name`, `description`, `programid`) VALUES
(1, 'Feed a Family', 'Provides dry food to eligible cases and families, they receive the carton on a monthly basis.', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Feed an Orphan', 'Enhance the growth of orphan children by providing healthy food to improve their mental and physical abilities.', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Fido and Aqeeqah', 'For the newborn, the purchase of a new asset such as a car or something else.', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Al-Kafara', 'The Egyptian Food Bank accepts the Kafara, and distributes it in the form of a meal', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Help for Gaza', 'The Egyptian Food Bank launches an urgent humanitarian relief campaign to help our affected families in the Gaza.', 'e4da3b7fbbce2345d7772b0674a318d5');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `supplierid` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `supplierid`) VALUES
(1, 'Hay Day', 'European countryside - Cairo', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Sunshine Acres', 'Helmeyat Al-zaytoon', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'AlBaik', 'Juhayna Square - Cairo', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Al-Hassan and Al-Hus', 'Saad Zaghloul - Tanta', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Sheikh Al-Mandi', 'Al-Andalus - 5th settelment', 'e4da3b7fbbce2345d7772b0674a318d5');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donationid` (`donationid`),
  ADD KEY `fk_donations_donor_id` (`donor_id`);

--
-- Indexes for table `donation_details`
--
ALTER TABLE `donation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donation_details_item_id` (`item_id`),
  ADD KEY `fk_donation_details_donation_id` (`donation_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donorid` (`donorid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemid` (`itemid`),
  ADD KEY `fk_program_id` (`program_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programid` (`programid`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `donation_details`
--
ALTER TABLE `donation_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `fk_donations_donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donorid`);

--
-- Constraints for table `donation_details`
--
ALTER TABLE `donation_details`
  ADD CONSTRAINT `fk_donation_details_donation_id` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`donationid`),
  ADD CONSTRAINT `fk_donation_details_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemid`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_program_id` FOREIGN KEY (`program_id`) REFERENCES `program` (`programid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;