-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 10:53 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writerdom`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verif_key` varchar(256) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `rating` smallint(6) NOT NULL DEFAULT '0',
  `orders_complited` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `type`, `verified`, `verif_key`, `created_on`, `status`, `rating`, `orders_complited`) VALUES
(9, 'kasuku', 'kasuku96@gmail.com', '$2y$10$CTebPZT4sV8HQlhpLlPUFuzEmYtKKYbrtRItjD3vyneE8iDRpaNii', 2, 0, 'DrErbXmJtZkxJKsOVXaD9ZgYZ22azu', '2018-12-18 21:14:33pm', 0, 10, 0),
(12, 'wilson', 'gatheruwilson@gmail.com', '$2y$10$Eg3pmti55Q0KrqaC2gHs4ukbt5T1gYguzw9eQ/S8gwtTwmrjSmifG', 1, 0, '8ZjQ0WkpUKgrzeCgr9bhaLkwJVKTeq', '2018-12-18 21:29:00pm', 0, 0, 0),
(13, 'admin', 'hustlemail96@gmail.com', '$2y$10$yarqdpru.hC0tYGDyEnHpeAqAs3HmL3v1edOcY8IdpIiw5H5Ps9Fe', 3, 0, 'vpQvhbS54XXeHkc6KD28h.Iq9gXlJ/', '2019-01-06 17:43:37pm', 0, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
