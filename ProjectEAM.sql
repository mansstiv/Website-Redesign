-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2021 at 02:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ProjectEAM`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employerId` int(11) NOT NULL,
  `inSuspension_startDate` date DEFAULT '0000-00-00',
  `inSuspension_endDate` date DEFAULT '0000-00-00',
  `worksRemote_startDate` date DEFAULT '0000-00-00',
  `worksRemote_endDate` date DEFAULT '0000-00-00',
  `permission_startDate` date DEFAULT '0000-00-00',
  `permission_endDate` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isEmployer` tinyint(1) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `afm` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `isEmployer`, `password`, `afm`) VALUES
(3, 'Vasiliss', 'Vazakos', 'vazakos', 'vazakos@gmail.com', 0, '$2y$10$r7yOlECLFC57Gb2hM7qNMu9TrxGE2NC6uCdrHr1sox1aDDFuGAOuq', 525252525),
(6, 'asdsda', 'asddas', 'asffsdafdas', 'sdi1700152@di.uoa.gr', 0, '$2y$10$z93ZQZwVqpArQ6W8a9q18OP5drhJjV4b0jOf5cy05rs7HW3JCEiZq', 525252525),
(7, 'ΧΡΙΣΤΙΝΑ-ΘΕΑΝΩ', 'ΚΥΛΑΦΗ', 'doYouEvenExist', 'te_ti_na@hotmail.com', 0, '$2y$10$HVP47zKhVLfwQ1IsrGfhKOySIF4kdLzWyxuTsS8u2z57jLp.Pfuka', 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employerId` (`employerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`employerId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
