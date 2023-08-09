-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 08:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `sno` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`sno`, `username`, `email`, `password`) VALUES
(1, 'admin', 'sandeep607532@gmail.com', '$2y$10$Ra4jcR1efU03/Lz9.3HrAu1egLxb6fHiCrML2hWG2ZJixAbcBU3Tm'),
(2, 'codewithjdk', 'codewithjdk@gmail.com', '$2y$10$CjJLscaxUQBwkE1L8faVfO6gtlqGI9XckM5h5sb9v6hAgXzVoj0kG'),
(3, 'satendra', 'satendra@gmail.com', '$2y$10$g7wjx5TtW14a8EiMZDXQdePVyQPLkdPh2aZPLTR/AVE.T6Q3mfk1i'),
(4, 'jfkdj', 'jkfdjk@gmail.com', '$2y$10$wb6XyDF2FjdXhRUQh9GO0.wjPWV3YpQNrHt/9xqXEqU6Qer/AS65O'),
(5, 'hrendra bhai', 'hrendra@gmail.com', '$2y$10$sSJ./4daxRoMlyvtnGP6QOgpI3PzcUdbs/7zvvGMMVYZHg3o6.wB2'),
(6, 'shanusingh', 'shanusingh@gmail.com', '$2y$10$aeeFL0O7CbEDee5an9HOU.AyMyyJsm0MS9Kx84lH6MAZFuRCNxLXe'),
(7, 'jdk', 'jdk@gmail.com', '$2y$10$aNp8BvChKfatP0XQR3x2M.FS4bJGVffJOBs3mlGBf2uQBVSCnXXkK'),
(8, 'suraj', 'suraj@gmail.com', '$2y$10$JSZaJwP8nvtJzv8iNwRlKOwnTv3sLE7/INOVNjDx.RY348nh96okW'),
(9, 'sjdk', 'sjdk@gmail.com', '$2y$10$qdUJGvNsC37keuiozvJTIeapAtAX8SKQMk3qsvIm18diA54qzAdmK'),
(10, 'shivam', 'shivam@gmail.com', '$2y$10$FlgYOP77MTf1W3MQkxPJq.JV.iiGM6pDs0QsdBKganNwMkIxUOwMW'),
(11, '', '', '$2y$10$z1.6nkOCqOJaOOAap4rMGuWBzwmtpBTmZF0zneaBWoJX1q2jo1ekC'),
(12, '1', '2@gmail.com', '$2y$10$r70DJILvhSL6365qsM7iMuhM5K33BCbgsteEgbZvAG8vAE64hchs.'),
(13, 'sonu', 'sonu@gmail.com', '$2y$10$BhYYxFFGQM5fhDcdE084aeC5LG3zW9/r5JKYEahlCnBUM/SK/m2qy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
