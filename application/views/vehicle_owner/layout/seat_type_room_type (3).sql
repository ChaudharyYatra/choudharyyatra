-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 02:05 PM
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
-- Database: `git_choudhary_yatra`
--

-- --------------------------------------------------------

--
-- Table structure for table `seat_type_room_type`
--

CREATE TABLE `seat_type_room_type` (
  `id` int(11) NOT NULL,
  `domestic_enquiry_id` varchar(255) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `seat_count` varchar(255) NOT NULL,
  `seperate_seat` varchar(255) NOT NULL,
  `total_seperate_seat` varchar(255) NOT NULL,
  `child_seperate_seat` varchar(255) NOT NULL,
  `total_child_seperate_seat` varchar(255) NOT NULL,
  `two_child_share_one_seat` varchar(255) NOT NULL,
  `total_two_child_share_one_seat` varchar(255) NOT NULL,
  `child_no_seat_needed` varchar(255) NOT NULL,
  `total_child_no_seat_needed` varchar(255) NOT NULL,
  `child_noo_seat_needed` varchar(255) NOT NULL,
  `total_child_noo_seat_needed` varchar(255) NOT NULL,
  `total_busseattype` varchar(255) NOT NULL,
  `total_seat` varchar(255) NOT NULL,
  `onebed_oneroom_cost` varchar(255) NOT NULL,
  `onebed_oneroom_cost_adult` varchar(255) NOT NULL,
  `onebed_oneroom_cost_90` varchar(255) NOT NULL,
  `onebed_oneroom_count_60` varchar(255) NOT NULL,
  `onebed_oneroom_40` varchar(255) NOT NULL,
  `onebed_oneroom_0` varchar(255) NOT NULL,
  `total_onebed_oneroom` varchar(255) NOT NULL,
  `twobed_oneroom_cost` varchar(255) NOT NULL,
  `twobed_oneroom_cost_adult` varchar(255) NOT NULL,
  `twobed_oneroom_count_90` varchar(255) NOT NULL,
  `twobed_oneroom_count_60` varchar(255) NOT NULL,
  `twobed_oneroom_count_40` varchar(255) NOT NULL,
  `twobed_oneroom_count_0` varchar(255) NOT NULL,
  `total_twobed_oneroom` varchar(255) NOT NULL,
  `threebed_oneroom_cost` varchar(255) NOT NULL,
  `threebed_oneroom_cost_adult` varchar(255) NOT NULL,
  `threebed_oneroom_count_90` varchar(255) NOT NULL,
  `threebed_oneroom_count_60` varchar(255) NOT NULL,
  `threebed_oneroom_count_40` varchar(255) NOT NULL,
  `threebed_oneroom_count_0` varchar(255) NOT NULL,
  `total_threebed_oneroom` varchar(255) NOT NULL,
  `fourbed_oneroom_cost` varchar(255) NOT NULL,
  `fourbed_oneroom_cost_adult` varchar(255) NOT NULL,
  `fourbed_oneroom_count_90` varchar(255) NOT NULL,
  `fourbed_oneroom_count_60` varchar(255) NOT NULL,
  `fourbed_oneroom_count_40` varchar(255) NOT NULL,
  `fourbed_oneroom_count_0` varchar(255) NOT NULL,
  `total_fourbed_oneroom` varchar(255) NOT NULL,
  `total_hotel_amount` varchar(255) NOT NULL,
  `total_travaller_count` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_type_room_type`
--

INSERT INTO `seat_type_room_type` (`id`, `domestic_enquiry_id`, `package_id`, `seat_count`, `seperate_seat`, `total_seperate_seat`, `child_seperate_seat`, `total_child_seperate_seat`, `two_child_share_one_seat`, `total_two_child_share_one_seat`, `child_no_seat_needed`, `total_child_no_seat_needed`, `child_noo_seat_needed`, `total_child_noo_seat_needed`, `total_busseattype`, `total_seat`, `onebed_oneroom_cost`, `onebed_oneroom_cost_adult`, `onebed_oneroom_cost_90`, `onebed_oneroom_count_60`, `onebed_oneroom_40`, `onebed_oneroom_0`, `total_onebed_oneroom`, `twobed_oneroom_cost`, `twobed_oneroom_cost_adult`, `twobed_oneroom_count_90`, `twobed_oneroom_count_60`, `twobed_oneroom_count_40`, `twobed_oneroom_count_0`, `total_twobed_oneroom`, `threebed_oneroom_cost`, `threebed_oneroom_cost_adult`, `threebed_oneroom_count_90`, `threebed_oneroom_count_60`, `threebed_oneroom_count_40`, `threebed_oneroom_count_0`, `total_threebed_oneroom`, `fourbed_oneroom_cost`, `fourbed_oneroom_cost_adult`, `fourbed_oneroom_count_90`, `fourbed_oneroom_count_60`, `fourbed_oneroom_count_40`, `fourbed_oneroom_count_0`, `total_fourbed_oneroom`, `total_hotel_amount`, `total_travaller_count`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(76, '89', '1', '2', '0', '0', '1', '1', '0', '0', '1', '0', '0', '0', '2', '1', '3701', '0', '0', '0', '0', '1', '0', '3251', '0', '0', '0', '0', '0', '0', '3161', '0', '0', '0', '0', '1', '0', '3161', '0', '0', '0', '0', '0', '0', '0', '2', 'no', 'yes', '2023-03-30 09:00:03', '0000-00-00'),
(77, '90', '1', '2', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '2', '1', '3701', '1', '0', '0', '0', '0', '3701', '3251', '0', '0', '0', '0', '0', '0', '3161', '0', '0', '0', '0', '0', '0', '3161', '1', '0', '0', '0', '0', '3161', '6862', '2', 'no', 'yes', '2023-03-30 10:23:28', '0000-00-00'),
(78, '92', '1', '2', '2', '2', '0', '0', '0', '0', '0', '0', '0', '0', '2', '2', '3701', '0', '2', '0', '0', '0', '6662', '3251', '0', '0', '0', '0', '0', '0', '3161', '0', '0', '0', '0', '0', '0', '3161', '0', '0', '0', '0', '0', '0', '6662', '2', 'no', 'yes', '2023-03-30 11:30:56', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seat_type_room_type`
--
ALTER TABLE `seat_type_room_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seat_type_room_type`
--
ALTER TABLE `seat_type_room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
