-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 11:55 PM
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
(1, 2100, '2024-05-05', 'c4ca4238a0b923820dcc509a6f75849b', 'c9f0f895fb98ab9159f51fd0297e236d');

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
(1, 1, 100, 'c4ca4238a0b923820dcc509a6f75849b', 'c81e728d9d4c2f636f067f89cc14862c', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 4, 500, 'c81e728d9d4c2f636f067f89cc14862c', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'c4ca4238a0b923820dcc509a6f75849b');

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
(1, 'Aya', '1992-08-25', 'aya17@hotmail.com', '35e9a3f0dab724451bd956db409c2c9e96f795c9', '01098765432', 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Youssef', '1985-12-10', 'youssefH@gmail.com', '85aa942b709a86f6b5d8a572444a09d993fbf266', '01198765432', 0, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Nour', '1998-04-03', 'nourBassel22@gmail.com', 'f3e7bf682ec4c9f04bbc29f2c884dea9d2b30cb5', '01298765432', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Ahmed', '1990-05-15', 'ahmedelwazeer90@hotmail.com', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', '01012345678', 0, 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Fatma', '1988-10-20', 'fatmawaked19@gmail.com', '5e927503d30f50bd44c9a31c6625984c442b78ae', '01123456789', 1, 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Mohamed', '1995-03-08', 'mohamed6677@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '01234567890', 0, '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'alaa2003', '2003-10-18', 'alaay318@gmail.com', '551dcdc16748c3db1bb1f97136622d048d855186', '01099155389', 1, '8f14e45fceea167a5a36dedd4bea2543'),
(8, 'Omar', '1999-04-19', 'omar12@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '01011111122', 0, 'c9f0f895fb98ab9159f51fd0297e236d');

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
(6, 'Calf', 20000, 170, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1679091c5a880faf6fb5e6087eb1b2dc');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
