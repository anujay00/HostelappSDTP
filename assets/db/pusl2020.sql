-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 08:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusl2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `property_name` varchar(55) NOT NULL,
  `property_images` varchar(255) NOT NULL,
  `property_location` varchar(255) NOT NULL,
  `property_cost` decimal(55,0) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `price_per_room` decimal(55,0) NOT NULL,
  `status` varchar(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `landlord_id`, `property_name`, `property_images`, `property_location`, `property_cost`, `no_of_rooms`, `price_per_room`, `status`, `uploaded_date`) VALUES
(8, 6, 'testproperty1', 'pexels-photo-106399.jpeg', 'testlocation1', '5000', 5, '600', 'pending', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reservation_status` varchar(55) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `property_id`, `student_id`, `reservation_status`, `date`) VALUES
(1, 8, 7, 'pending', '2024-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `created_date`) VALUES
(6, 'testlandlord', 'testlandlord@gmail.com', '$2y$10$beDLAIgNdHNmsm9sIMBjLOf/T4u6YYlFXNVLTrNA3aKcerKaVvzpq', 'landlord', '2024-03-08'),
(7, 'teststudent', 'teststudent@gmail.com', '$2y$10$sx0Rv.zDWbCMXyvk0b56neNFoif7OLsUKGfAnXGjed.Gvkhj2NtRa', 'student', '2024-03-08'),
(8, 'testwarden', 'testwarden@gmail.com', '$2y$10$CAWBTkJTJBorccc9S8ZHy.4jRbRyJzwqkoS60abDSWdstIWiD8NL.', 'warden', '2024-03-08'),
(9, 'testadmin', 'testadmin@gmail.com', '$2y$10$MUZW5gyWF14xIVi/bX5iY.PzjNCnA8/T7QAeIKn9siodEhw7e4tnu', 'admin', '2024-03-08'),
(10, 'testlandlord2', 'testlandlordad2@gmail.com', '$2y$10$i.TeikvOVn12WxdqSCZ3JOXYQ.py0gsoK8X7g31mCYVr.gHqXFf7S', 'landlord', '2024-03-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
