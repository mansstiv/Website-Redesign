-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 15 Ιαν 2021 στις 08:17:58
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `ProjectEAM`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee`
--

CREATE TABLE `employee` (
  `userName` varchar(255) NOT NULL,
  `employerAfm` int(9) NOT NULL,
  `inSuspension_startDate` date DEFAULT '0000-00-00',
  `inSuspension_endDate` date DEFAULT '0000-00-00',
  `worksRemote_startDate` date DEFAULT '0000-00-00',
  `worksRemote_endDate` date DEFAULT '0000-00-00',
  `permission_startDate` date DEFAULT '0000-00-00',
  `permission_endDate` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `employee`
--

INSERT INTO `employee` (`userName`, `employerAfm`, `inSuspension_startDate`, `inSuspension_endDate`, `worksRemote_startDate`, `worksRemote_endDate`, `permission_startDate`, `permission_endDate`) VALUES
('dim', 123456789, '0000-00-00', '0000-00-00', '1111-11-11', '1111-11-11', '0000-00-00', '0000-00-00'),
('ManosAnt', 123456789, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
('Maria', 123456789, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
('marios', 123456788, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
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
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `isEmployer`, `password`, `afm`) VALUES
(17, 'Georgios', 'kazakos', 'Gkaz', 'vasilis_kazakos@hotmail.com', 1, '$2y$10$IoS5YnOnKk.ShN7jaij7iO6w0VeX/qnlO/AmmkdyS7QlC30tkrquy', 123456789),
(18, 'Manolis', 'Stivaktas', 'manos', 'vasilis_kazakos@icloud.com', 1, '$2y$10$hrmWNjNIYr38.GglHD5oZ.HIVA9AvS3D8rdhpyi99yWpDpff.FqgS', 123456788),
(19, 'Dimitris', 'Verlekis', 'dim', 'some@gmail.com', 0, '$2y$10$oX9yNJ/jlsUEw9hLZxbqK.650o0F7EBgAsZWhiIp12bgkEjdgJ1gu', 123451234),
(20, 'Maria', 'Georgioy', 'Maria', 'maria@gmail.com', 0, '$2y$10$QTY//pbAPG4xrtGCJbCvKejv//DY1TIu9SNnf1NMEOLneaEJ88bxK', 123123321),
(21, 'Manolis', 'Antwnious', 'ManosAnt', 'sdi1700040@di.uoa.gr', 0, '$2y$10$MJRsIfFNaGztELuHi4P2geW/6iK3itJwMuDiQ9QoYZzygLxIP.C6a', 123412341),
(22, 'Marios', 'Alexiou', 'marios', 'sdi1700152@di.uoa.gr', 0, '$2y$10$tjT0/ii2s1I7RhszqmkeqeDXk9h5j7Idm4CxWhDPrkwJHdQf7CPeW', 123444444);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userName`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
