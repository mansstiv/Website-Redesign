-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2021 at 07:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

CREATE DATABASE sdi1200013;
Use sdi1200013;

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
  `userName` varchar(255) NOT NULL,
  `employerAfm` int(9) DEFAULT NULL,
  `inSuspension_startDate` varchar(255) DEFAULT NULL,
  `inSuspension_endDate` varchar(255) DEFAULT NULL,
  `worksRemote_startDate` varchar(255) DEFAULT NULL,
  `worksRemote_endDate` varchar(255) DEFAULT NULL,
  `permission_startDate` varchar(255) DEFAULT NULL,
  `permission_endDate` varchar(255) DEFAULT NULL,
  `hasChildUnder12` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userName`, `employerAfm`, `inSuspension_startDate`, `inSuspension_endDate`, `worksRemote_startDate`, `worksRemote_endDate`, `permission_startDate`, `permission_endDate`, `hasChildUnder12`) VALUES
('dimitris', 123456789, NULL, NULL, '13/12/2020', '13/02/2021', NULL, NULL, 1),
('manos', 123456789, NULL, NULL, '10/12/2020', '10/02/2021', '20/02/2021', '21/02/2021', 1),
('vasilis', 123456789, '11/12/2020', '11/02/2021', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `isEmployer` tinyint(1) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `afm` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `isEmployer`, `password`, `afm`) VALUES
(28, 'Εμμανουήλ', 'Στιβακτάς', 'manos', 'manolis.stivaktas@gmail.com', 0, '$2y$10$LV2fzq/Bb6z68lvWVitiL.5RGT0Gcub9Iw8wri4iGAgLJ3jaffgL6', 111700152),
(29, 'Βασίλειος', 'Καζάκος', 'vasilis', 'vasilis.kazakos@gmail.com', 0, '$2y$10$55fmJj/DuOp8GfOcqs1dQ.PJzic5RWNQHQd8k95goxwcSCk5JAp4W', 111700040),
(30, 'Δημήτριος', 'Βερλέκης', 'dimitris', 'dimitris.verlekis@gmail.com', 0, '$2y$10$pwuNLROF6Hgk6/AcpBau7Oeu0cx4tiTOmMkBDxt8mf1lgwOMZOGfC', 111200013),
(32, 'Τηλέμαχος', 'Πληροφορίδης', 'tilemachos', 'tilemachos.pliroforidis@gmail.com', 1, '$2y$10$/ZQ1HbA0aRjc5kwF66Ts1eV8X/P6Cwk9YHGdIZayrTf/EVQvGiJ1y', 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userName`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
