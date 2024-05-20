-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 01:16 PM
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
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'arthur', 'grey@gmail.com', '$2y$10$meYjtT6l8wxCzWcHv20O/etW6FLLr1pLsxeJeGGlFZeX2negDQM12'),
(9, 'jean', 'jean@gmail.com', '$2y$10$jOtn4iqeZkNs0MfsGFjW.ONDttjuR9RS1yWZywdP0CZ0eTd93R0bq'),
(10, 'Rovic', 'rov@gmail.com', '$2y$10$QhBbL3xHAV.CjJIQZ7mGK.2JsB1BRQiC/UgkKNXffiWlyyWFbV/qu'),
(11, 'Cat', 'cat@gmail.com', '$2y$10$KDWTeTtOYM8NBic8YVJTKOlbwtWn5sSnbl0zvoCkmm7EUSg3PCgj2'),
(12, 'cha', 'cha@gmail.com', '$2y$10$.9ISY3lWStQg8jLGhjZS/en1WQzksBrJFjvFrhAOVSaQdaLmCKhqC');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
