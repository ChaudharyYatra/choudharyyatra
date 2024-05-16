-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:13 AM
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
-- Database: `chaudharyyatra`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `years_experiences` varchar(50) NOT NULL,
  `tour_packages` varchar(50) NOT NULL,
  `happy_customers` varchar(50) NOT NULL,
  `award_winning` varchar(50) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us`, `years_experiences`, `tour_packages`, `happy_customers`, `award_winning`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '<div class=\"m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf\" style=\"overflow-wrap: break-word; margin: 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><b>Choudhary Yatra Company</b> is founded out of Hon’ble Bajaranglalji’s blessing on 1st May 1983 in Nashik. It was lacking experience, capital, services and environment to begin with. It was a real test of character for Premchand, Chaturbhuja, Mahendrapal, and Brijmohan- the sons of Hon’ble Bajaranglalji. They all thought only one thing that the Choudhary Yatra Company would grow only if the tourist is satisfied with the service. From that day the motto of the company is <b>‘tourists’ satisfaction is the real profit’.</b></div><div dir=\"auto\" style=\"font-family: inherit;\">All of them strive hard to prove that <b>‘nothing is impossible’.</b></div><div dir=\"auto\" style=\"font-family: inherit;\">Their efforts paid off and the rare sight that all four brothers working together wholeheartedly for the prosperity of company.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><b>The company has got national honour as it is recognized as the domestic tour operator by the Govt. of India.</b></div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Shri. Chaturbhuj Choudhary, the vice chairman of the company has worked as the vice president of Maharashtra Tours Organisers Association. He was honoured in 2000, with a memento by the hands of former minister of state for transport Shri. Subhash Thakre</div><div dir=\"auto\" style=\"font-family: inherit;\">and in the presence of former minister of transport Shri. Shivajirao Moghe by Maharashtra Railway, S.T. (City) and Water transport tourists organisation. For providing 10% concession more to senior citizens’ tours. Shri. Chaturbhuja Choudhary was felicitated for the second</div><div dir=\"auto\" style=\"font-family: inherit;\">time by Shri. Patangrao Kadam, former Industry and Trade Minister, with a certificate and memento in 2001.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Shri. Brijmohan Choudhary, the managing director of the company, was felicitated with ‘Sevaratna Award’ by Shri Seva Samrat Gunawant Baba Charate Pratishthan at the hands of Mahamandaleshwar Santashreshtha Mauli Devbappa (Farashiuwle) on 26 December 2005. He was honoured for organising Dynaneshwari parayan (recitation) programme and Akhand Harinam saptaha (continuous singing of Harinam for a week) as well as voicing the problems of transporters and tourists at the government level. This was a receipt of the great accomplishment he has done in the field religious tourism.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">The special interview of Shri. Brijmohan Choudhary was telecasted on Zee Marathi, in a program titled ‘Zee 24 Tas Battnya Khas’ discussing the problems and solutions of roads and tourism centres in Maharashtra.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">From 1st April 2004 the Ashtavinak tour is being run on ‘No profit No loss’ basis to make the people enables to visit religious places like Ashtavinayak, Bhimashankar, Dehu, Aalandee, Jejuri and others. Choudhary Yatra Company has created a unique place in the minds and hearts of people in Maharashtra by way of respect and affection.</div><div dir=\"auto\" style=\"font-family: inherit;\"><b>Choudhary Yatra Company</b> always carries this attitude of care and caution. It gives highest preference to the safety and efficiency of</div><div dir=\"auto\" style=\"font-family: inherit;\">its vehicles. It has got its own department of bus body building. The company has got 47 luxury buses including 45 large and 2 mini buses having ABS. Total 8 buses are running at present and there will be additions in this in the coming year.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">The company is providing facilities like breakfast and lunch (along with plate and bowl), refreshing tea, lodging with beds. The company has provided all the drivers or tour managers with mobiles to avoid things like miscommunication, losing track, problems created out of natural disasters and accidents.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">From last few year\'s the Amarnath yatra was hit by the bloodshed done by the terrorists. In this critical situation, the company courageously took 558 pilgrims to Amarnath in 2008.</div><div dir=\"auto\" style=\"font-family: inherit;\">This tour proves the company’s ability to work in dangerous and unfavourable conditions before the world. The company withstands the social commitment than commercial attitude.</div><div dir=\"auto\" style=\"font-family: inherit;\">That is why the company has run the free-of-cost service every time on the occasion of Mahashivaratri from Nashik to Trimbakeshwar, one of the twelve ‘Jyoteerlingas’ in India.</div></div><div class=\"l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">The joy and pleasure created by Choudhary Yatra Company are immeasurable. The one gets this pleasure when one experiences it. Choudhary Yatra Company is making all possible efforts to provide the tourists with best of the facilities. To get the experience at least once,</div><div dir=\"auto\" style=\"font-family: inherit;\"><b>let us join the tourism venture with Choudhary Yatra Company by selecting any one tour of our choice.</b></div></div>', '50', '1100', '1000', '3', 'no', 'yes', '2022-09-15 09:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` int(11) NOT NULL,
  `year` varchar(50) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `year`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '2022-2023', 'no', 'yes', '2022-09-12 14:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `is_deleted` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `contact`, `password`, `is_active`, `is_deleted`) VALUES
(1, 'admin', 'admin@gmail.com', '1234578906', '123456', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `arrange_id` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `booking_center` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile_number1` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile_number2` varchar(50) CHARACTER SET utf8 NOT NULL,
  `is_deleted` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `arrange_id`, `department`, `city`, `agent_name`, `email`, `password`, `booking_center`, `mobile_number1`, `mobile_number2`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, 2, 'Nashik', 'M G Road Nashik', 'agent@gmail.com', '123456', 'M. G. Road, Nashik.', '7588383838', '9699829373', 'no', 'yes', '2022-09-06 11:34:28'),
(2, 2, 2, 'Nashik', 'Jalgon', 'nsk_jal@gmail.com', '123456', 'Choudhary Farm, Aurangabad Road, Nashik.', '9699813921', '9699813921', 'no', 'yes', '2022-09-06 11:44:14'),
(3, 3, 2, 'Nashik Road', 'Bitco Point', 'bitco_point@gmail.com', '123456', 'Bitco Point, Nashik Road, Nashik.', '9699829374', '7499414797', 'no', 'yes', '2022-09-06 11:44:54'),
(4, 4, 2, 'Nashik', NULL, NULL, NULL, 'Tirupati Bldg., Nasardi River Road, Bhabha Nagar, Mumbai Naka, Nashik.', '9699829375', '7588484848, 8806442341', 'no', 'yes', '2022-09-06 11:46:02'),
(5, 7, 2, 'Ozar Mig', NULL, NULL, NULL, 'Ozar Mig Tal Niphad Nashik', '9699829376', '7798772162', 'no', 'yes', '2022-09-06 11:50:03'),
(6, 8, 2, ' Sangamner', NULL, NULL, NULL, 'Near Tahasil Court, Sangamner.', '9699829392', '9850136993', 'no', 'yes', '2022-09-06 11:51:01'),
(7, 9, 2, 'Satana', NULL, NULL, NULL, 'Opp. Maharashtra Bank, Satana.', '9699829377', '9403009343', 'no', 'yes', '2022-09-06 11:51:38'),
(8, 10, 2, 'Malegaon', NULL, NULL, NULL, 'Panjrapol Shoping Centre, Malegaon.', '9699829378', '9325145216', 'no', 'yes', '2022-09-06 12:46:35'),
(9, 11, 2, 'Dhule', NULL, NULL, NULL, 'Opp. Court, Station Road, Dhule.', '9699829379', '9403496277', 'no', 'yes', '2022-09-06 12:47:15'),
(10, 12, 2, 'Nandurbar', NULL, NULL, NULL, 'Neharu Chowk, Station Road, Nandurbar.', '9699829380', '9423094641', 'no', 'yes', '2022-09-06 12:48:06'),
(11, 13, 2, 'Shahada', NULL, NULL, NULL, 'Behind ST Bus Stand, Shahada.', '9699829381', '9421889289', 'no', 'yes', '2022-09-06 12:48:56'),
(12, 14, 2, ' Parola', NULL, NULL, NULL, '20-21, Undir Kheda Road, Parola.', '9699829382', '7588815830', 'no', 'yes', '2022-09-06 12:49:54'),
(13, 15, 2, 'Amalner', NULL, NULL, NULL, 'Pdmalay, Behind Swami Samarth Temple, Amalner.', '9699829383', '9422618393', 'no', 'yes', '2022-09-06 12:51:03'),
(14, 16, 2, 'Erandol', NULL, NULL, NULL, 'Ganesh Nagar, Near Police Ground, Erandol.', '9699829384', '9421182258', 'no', 'yes', '2022-09-06 12:52:07'),
(15, 17, 2, 'Jalgaon', NULL, NULL, NULL, 'Shop No. 21, B Wing, Basement, Stadium Complex, Jalgaon.', '9699829385', '7841833111', 'no', 'yes', '2022-09-06 12:53:59'),
(16, 18, 2, 'Bhusawal', NULL, NULL, NULL, 'Deep Nagar, Bhusawal.', '9699829386', '8983228537', 'no', 'yes', '2022-09-06 12:54:40'),
(17, 19, 2, 'Pachora', NULL, NULL, NULL, 'Near Gajanan Petrol Pump, Bhadgaon Road, Pachora.', '9699829387', '9970049449', 'no', 'yes', '2022-09-06 12:55:31'),
(18, 20, 2, ' Jamner', NULL, NULL, NULL, 'B O T Complex, Pachora Road, Jamner.', '9699813929', '9421685416', 'no', 'yes', '2022-09-06 12:56:18'),
(19, 21, 2, 'Chalisgaon', NULL, NULL, NULL, 'Netaji Chowk, Chalisgaon.', '9699829388', '9850325902', 'no', 'yes', '2022-09-06 12:57:08'),
(20, 22, 2, 'Shrirampur', NULL, NULL, NULL, 'Near Sawata Temple, Shrirampur.', '9699829389', '9890251301', 'no', 'yes', '2022-09-06 12:58:15'),
(21, 23, 2, 'Ahamadnagar', NULL, NULL, NULL, 'Opp. Dada Choudhary School, Court Galli, Ahamadnagar.', '9699829390', '9420641332', 'no', 'yes', '2022-09-06 12:59:27'),
(22, 24, 2, 'Karjat', NULL, NULL, NULL, 'Bhaji Mandai, Karjat.', '9699829391', '9423389621, 9511400700', 'no', 'yes', '2022-09-06 13:00:12'),
(23, 25, 3, 'Nagpur', NULL, NULL, NULL, 'Lokmat Chowk, Vardha Road, Nagpur.', '9699829393', '7755961515', 'no', 'yes', '2022-09-06 13:18:14'),
(24, 26, 3, 'Chandrapur', NULL, NULL, NULL, 'Haveli Complex, Chandrapur.', '9699829394', '9850288219', 'no', 'yes', '2022-09-06 13:19:01'),
(25, 27, 3, 'Yawatmal', NULL, NULL, NULL, 'Datt Chowk, Yawatmal.', '9699829395', '8208070736', 'no', 'yes', '2022-09-06 13:20:08'),
(26, 28, 3, 'Umarkhed', NULL, NULL, NULL, 'Wankhede Market, Umarkhed.', '9699829396', '9028350585', 'no', 'yes', '2022-09-06 13:21:42'),
(27, 29, 3, 'Pusad', NULL, NULL, NULL, 'Opp. Gajanan Maharaj Temple, Pusad.', '9699829397', '9423131423', 'no', 'yes', '2022-09-06 13:22:50'),
(28, 30, 3, 'Vashim', NULL, NULL, NULL, 'Near LIC Office, Vashim.', '9699829398', '9422193103', 'no', 'yes', '2022-09-06 13:23:46'),
(29, 31, 3, 'Buldhana', NULL, NULL, NULL, 'Rajrshee Shahu Nagar, Buldhana.', '9699829399', '9421463032', 'no', 'yes', '2022-09-06 13:24:48'),
(30, 32, 3, 'Khamgaon', NULL, NULL, NULL, 'Balaji Plot, Khamgaon.', '9699829400', '7447579999', 'no', 'yes', '2022-09-06 13:25:52'),
(31, 33, 3, ' Akola', NULL, NULL, NULL, 'Shastri Stadium, Akola.', '9699813927', '9028689709', 'no', 'yes', '2022-09-06 13:26:58'),
(32, 34, 3, 'Amaravati', NULL, NULL, NULL, 'Near Railway Station, Amaravati.', '9699829402', '8999428014', 'no', 'yes', '2022-09-06 13:27:37'),
(33, 35, 4, 'Aurangabad', NULL, NULL, NULL, 'Tapadiya Terraces, Adalat Road, Aurangabad.', '9699829403', '9021287859', 'no', 'yes', '2022-09-06 13:28:49'),
(34, 36, 4, 'Aurangabad', NULL, NULL, NULL, 'Kalindi Nivas, MTI Hospital, Cidco, Aurangabad.', '9699829404', '8208602068', 'no', 'yes', '2022-09-06 13:30:26'),
(35, 37, 4, ' Jalana', NULL, NULL, NULL, 'Shastri Road, Near Maruti Temple, Jalana.', '9699829405', '9423931131', 'no', 'yes', '2022-09-06 13:31:14'),
(36, 38, 4, 'Jalana', NULL, NULL, NULL, 'Gandhi Chaman, Jalana.', '9699813922', '8275556119', 'no', 'yes', '2022-09-06 13:32:08'),
(37, 39, 4, 'Parabhani', NULL, NULL, NULL, 'Near Lalit Kala Bhavan, Parabhani.', '9699829406', '9422176862', 'no', 'yes', '2022-09-06 13:32:59'),
(38, 40, 4, 'Nanded', NULL, NULL, NULL, 'Shiv Vijay Colony, Chaitanya Nagar Chowk, Nanded.', '9699829407', '9423917401', 'no', 'yes', '2022-09-06 13:34:08'),
(39, 41, 4, 'Nanded', NULL, NULL, NULL, 'Near P N Highschool, Nanded.', '9699829408', '9403692426', 'no', 'yes', '2022-09-06 13:35:05'),
(40, 42, 4, 'Latur', NULL, NULL, NULL, 'Vyapari Dharmshala Complex, Gandhi Chowk, Latur.', '9699829409', '9822373791', 'no', 'yes', '2022-09-06 13:36:11'),
(41, 43, 4, 'Usmanabad', NULL, NULL, NULL, 'Tulaja Bhavani Shopping Centre, Usmanabad.', '9699829410', '8767244206', 'no', 'yes', '2022-09-06 13:37:29'),
(42, 44, 4, 'Parali Vaijnath', NULL, NULL, NULL, 'Opp. ST Bus Stand, Parali Vaijnath.', '9699829411', '9422742982', 'no', 'yes', '2022-09-06 13:38:27'),
(43, 45, 4, 'Beed', NULL, NULL, NULL, 'Tambare Complex, Pangari Road, Beed.', '9699829412', '9960701880', 'no', 'yes', '2022-09-06 13:39:32'),
(44, 46, 5, 'Pune', NULL, NULL, NULL, 'Amar Sanket Building, Near Natraj Hotel, Swargate Chowk, Pune.', '9699829413', '8484819631', 'no', 'yes', '2022-09-06 13:42:00'),
(45, 47, 4, 'Pradhikaran', NULL, NULL, NULL, 'Koyana Nagar, Pradhikaran.', '9699829414', '9822600553', 'no', 'yes', '2022-09-06 13:42:55'),
(46, 48, 5, 'Chinchwadgaon', NULL, NULL, NULL, 'Chafekar Chowk, Chinchwadgaon.', '9699829415', '9371000299', 'no', 'yes', '2022-09-06 13:44:24'),
(47, 49, 5, 'Hadapsar', NULL, NULL, NULL, 'Near Bhekari Mata School, Hadapsar.', '9699829416', '9822850062', 'no', 'yes', '2022-09-06 13:45:27'),
(48, 50, 5, 'Baramati', NULL, NULL, NULL, 'Bigvan Road, Baramati.', '9699829417', '9890808169', 'no', 'yes', '2022-09-06 13:48:22'),
(49, 51, 5, 'Barshi', NULL, NULL, NULL, 'Near Shree Magvant Tample, Barshi.', '9699829418', '9422647580', 'no', 'yes', '2022-09-06 13:50:00'),
(50, 52, 5, 'Solapur', NULL, NULL, NULL, 'Near Hotel Pratham, Solapur.', '9699829419', '0217-2314121', 'no', 'yes', '2022-09-06 13:56:48'),
(51, 53, 5, 'Solapur', NULL, NULL, NULL, '2, Prachi Parking, Near Bus Stand, Solapur.', '9699813923', '9561559229', 'no', 'yes', '2022-09-06 13:57:54'),
(52, 54, 5, 'Pandharpur', NULL, NULL, NULL, 'Opp. Darshan Mandap, Mahadwar, Pandharpur.', '9699829420', '9423329224', 'no', 'yes', '2022-09-06 13:59:04'),
(53, 55, 5, 'Sangali', NULL, NULL, NULL, 'Near Apata Police Chowky, Sangali.', '9699829421', '9823771890', 'no', 'yes', '2022-09-06 14:00:28'),
(54, 56, 5, 'Ichalkaranji', NULL, NULL, NULL, 'Opp. Vyapari Pathsanstha, Ichalkaranji.', '9699829422', '9607969798', 'no', 'yes', '2022-09-06 14:01:40'),
(55, 57, 5, 'Kolhapur', NULL, NULL, NULL, 'Opp. Binkhambi Ganpati, Kolhapur.', '9699813924', '9403604943', 'no', 'yes', '2022-09-06 14:02:44'),
(56, 58, 5, 'Kolhapur', NULL, NULL, NULL, 'Dabholkar Corner, Kolhapur.', '9699813902', '9881861588', 'no', 'yes', '2022-09-06 14:03:40'),
(57, 59, 5, 'Pathvadgaon', NULL, NULL, NULL, 'Hanuman Road, Pathvadgaon.', '9699813903', '8605716207', 'no', 'yes', '2022-09-06 14:04:33'),
(58, 60, 5, 'Islampur', NULL, NULL, NULL, 'Opp. ST Bus Stand, Islampur.', '9699813904', '9421655099', 'no', 'yes', '2022-09-06 14:05:24'),
(59, 61, 5, 'Karad', NULL, NULL, NULL, 'Near Santsakhubai Temple Karad', '9699813905', '9028744017', 'no', 'yes', '2022-09-06 14:07:39'),
(60, 62, 5, 'Veeta', NULL, NULL, NULL, 'Bank Colony Road, Bhavani Mal, Veeta.', '9699813906', '8180803824', 'no', 'yes', '2022-09-06 14:08:35'),
(61, 63, 5, 'Pusegaon', NULL, NULL, NULL, 'Behind Sevagiri Temple,  At Post Pusegaon.', '9699813907', '9763452915', 'no', 'yes', '2022-09-06 14:09:36'),
(62, 64, 5, 'Satara', NULL, NULL, NULL, 'Opp. Goreram Temple, Satara.', '9699813908', '9822609045', 'no', 'yes', '2022-09-06 14:10:32'),
(63, 65, 6, 'Dadar E', NULL, NULL, NULL, 'Opp. Kailas Lassi, Near Railway Station, Dadar (E), Mumbai.', '9699813910', '9420840292', 'no', 'yes', '2022-09-06 14:20:15'),
(64, 66, 6, 'Mulund W Mumbai', NULL, NULL, NULL, 'Near Sarojini Naidu MCC Collage, Mulund (W), Mumbai.', '9699813926', '7666343721', 'no', 'yes', '2022-09-06 14:22:58'),
(65, 67, 6, 'Kalava', NULL, NULL, NULL, 'Vastu Anand, Parsik Nagar, Kalava, Mumbai.', '9699813925', '8169486839', 'no', 'yes', '2022-09-06 14:24:14'),
(66, 68, 6, 'Dombivali E', NULL, NULL, NULL, 'Near Ganpati Temple, Near Anil Eye Hospital, Dombivali (E), Mumbai.', '9699813925', '8169486839', 'no', 'yes', '2022-09-06 14:28:43'),
(67, 69, 6, 'Kalyan W', NULL, NULL, NULL, '1, Navsadhan Apartment, Lal Chowk, Kalyan (W), Mumbai.', '9699813912', '9702200885', 'no', 'yes', '2022-09-06 14:32:21'),
(68, 70, 6, 'Badalapur W', NULL, NULL, NULL, 'Govind Dham Complex, Majarli, Badalapur (W), Mumbai.', '9699813913', '9322420990', 'no', 'yes', '2022-09-06 14:34:24'),
(69, 71, 6, 'Badalapur E', NULL, NULL, NULL, 'Shivaji Chowk, Badalapur (E), Mumbai.', '9699813914', '9028874950', 'no', 'yes', '2022-09-06 14:35:54'),
(70, 72, 6, 'Mumbai', NULL, NULL, NULL, 'Khanda Colony, New Panvel (W), New Mumbai.', '9699813915', '9890366615', 'no', 'yes', '2022-09-08 09:36:12'),
(71, 73, 6, 'Mahad', NULL, NULL, NULL, 'New Peth, Shimpi Aali, Mahad.', '9699813916', '02145-222588', 'no', 'yes', '2022-09-08 10:10:03'),
(72, 74, 7, 'Ahmedabad', NULL, NULL, NULL, 'Ahmedabad', '9699813919', '9157586309', 'no', 'yes', '2022-09-08 10:12:16'),
(73, 76, 8, 'Indore', NULL, NULL, NULL, 'Raghuvanshi Colony, VIP Road, Indore.', '9699813928', '9893069704', 'no', 'yes', '2022-09-08 10:13:01'),
(74, 75, 7, 'Badoda', NULL, NULL, NULL, 'Bhavdas Street, Siyabag, Badoda.', '9699813920', '9998768892', 'no', 'yes', '2022-09-08 10:14:14'),
(75, 5, 2, 'Nashik', NULL, NULL, NULL, 'Lakhalgaon, Nashik.', '9699813918', '9422272024', 'no', 'yes', '2022-09-10 09:01:06'),
(76, 6, 2, 'Nashik', NULL, NULL, NULL, 'Makhmalabad Road, Panchavati, Nashik.', '9699813927', '9422272027, 9422272037', 'no', 'yes', '2022-09-10 09:02:02'),
(77, 1, 2, 'NSK', 'Vishal', 'vishal@gmail.com', '123456', 'trimurti chowk', '9864567393', '8674025367', 'no', 'yes', '2022-11-24 04:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `agent_old`
--

CREATE TABLE `agent_old` (
  `id` int(11) NOT NULL,
  `arrange_id` varchar(50) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `booking_center` varchar(255) CHARACTER SET utf8 NOT NULL,
  `agent_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile_number1` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile_number2` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `is_deleted` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_old`
--

INSERT INTO `agent_old` (`id`, `arrange_id`, `city`, `department`, `booking_center`, `agent_name`, `mobile_number1`, `mobile_number2`, `email`, `password`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '1', 'Mumbai', 1, 'M. G. Road, Nashik.', 'Ravindra Barde', '7588383838', '9422272034', '', '123', 'no', 'yes', '2022-09-15 09:57:46'),
(2, '2', 'Pune', 2, 'Indira Nagar', 'Ramchandra Sharma', '9954125632', '9699829373', '', '123456', 'no', 'yes', '2022-09-16 09:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `agent_percentage`
--

CREATE TABLE `agent_percentage` (
  `id` int(11) NOT NULL,
  `from_amt` int(255) NOT NULL,
  `to_amt` int(255) NOT NULL,
  `from_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `to_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `agent_percentage` int(255) NOT NULL,
  `is_deleted` enum('no','yes') CHARACTER SET utf8 DEFAULT 'no',
  `is_active` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_percentage`
--

INSERT INTO `agent_percentage` (`id`, `from_amt`, `to_amt`, `from_date`, `to_date`, `agent_percentage`, `is_deleted`, `is_active`, `created_at`) VALUES
(4, 10000, 50000, '2022-11-29', '2023-02-28', 10, 'no', 'yes', '2022-11-29 07:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `title`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Award', 'chaudhary_yatra1668868415award.jpeg', 'no', 'yes', '2022-11-19 14:33:35'),
(2, 'Award', 'chaudhary_yatra1668868509A2.jpeg', 'no', 'yes', '2022-11-19 14:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `booking_enquiry`
--

CREATE TABLE `booking_enquiry` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `package_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_status` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_view` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_enquiry`
--

INSERT INTO `booking_enquiry` (`id`, `agent_id`, `first_name`, `last_name`, `email`, `mobile_number`, `gender`, `package_id`, `booking_date`, `comment_status`, `is_view`, `is_deleted`, `created_at`) VALUES
(1, 1, 'pratiksha', 'Patil', 'pratiksha@gmail.com', '9867465789', 'Male', 16, '2022-11-23 06:20:33', 'no', 'yes', 'yes', '2022-11-23 06:20:33'),
(3, 1, 'Radhe', 'Vasu', 'radha@gmail.com', '9856789068', 'Female', 3, '2022-11-23 10:35:14', 'no', 'yes', 'yes', '2022-11-23 10:35:14'),
(5, 1, 'rupali', 'patil', 'rupa@gmail.com', '9987654324', 'Female', 5, '2022-11-29 11:31:40', 'no', 'yes', 'no', '2022-11-29 11:31:40'),
(6, 1, 'mahesh', 'Agrawal', 'asd@gamil.com', '8767565450', 'Male', 4, '2022-11-29 11:51:47', 'no', 'yes', 'no', '2022-11-29 11:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `bus_master`
--

CREATE TABLE `bus_master` (
  `id` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `bus_seat_count` varchar(255) NOT NULL,
  `bus_type` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_master`
--

INSERT INTO `bus_master` (`id`, `bus_number`, `bus_seat_count`, `bus_type`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'MH 15 HD 7655', '41', 'Non-AC', 'no', 'yes', '2022-11-17 12:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `state_name` int(100) DEFAULT NULL,
  `city_name` varchar(255) NOT NULL,
  `halting_place` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `region_name`, `state_name`, `city_name`, `halting_place`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '0', 2, 'Nashik', '', 'yes', 'yes', '2022-11-18 08:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `client_reviews`
--

CREATE TABLE `client_reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_reviews`
--

INSERT INTO `client_reviews` (`id`, `review`, `name`, `designation`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Fantastic tour planners..!', 'Ramesh Patel', 'supervisor', 'chaudhary_yatra1668867973london.jpg', 'no', 'yes', '2022-11-19 14:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_booking`
--

CREATE TABLE `confirm_booking` (
  `id` int(32) NOT NULL,
  `traveler_id` int(11) NOT NULL,
  `package_date_id` varchar(50) NOT NULL,
  `package_booked_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `core_features`
--

CREATE TABLE `core_features` (
  `id` int(11) NOT NULL,
  `feature_one_title` varchar(255) NOT NULL,
  `feature_two_title` varchar(255) NOT NULL,
  `feature_three_title` varchar(255) NOT NULL,
  `feature_four_title` varchar(255) NOT NULL,
  `feature_one_description` text NOT NULL,
  `feature_two_description` text NOT NULL,
  `feature_three_description` text NOT NULL,
  `feature_four_description` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `core_features`
--

INSERT INTO `core_features` (`id`, `feature_one_title`, `feature_two_title`, `feature_three_title`, `feature_four_title`, `feature_one_description`, `feature_two_description`, `feature_three_description`, `feature_four_description`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Hotel', 'Transport', 'Food', 'Tour Manager', 'Best in class hotels at all your favorites destinations', 'All internal transfers and flights for Air In.', 'All meals i.e. Breakfast, Lunch & Dinner available.', 'Dedicated expert throughout the tour.', 'no', 'yes', '2022-09-15 09:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_no_need`
--

CREATE TABLE `customer_service_no_need` (
  `id` int(11) NOT NULL,
  `customer_service` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_information_no_need`
--

CREATE TABLE `delivery_information_no_need` (
  `id` int(11) NOT NULL,
  `delivery_information` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Puney', 'yes', 'no', '2022-09-06 11:26:32'),
(2, 'NASHIK / JALGAON ', 'no', 'yes', '2022-09-06 11:33:09'),
(3, 'Nagpur / Amaravati VIDARBH', 'no', 'yes', '2022-09-06 11:46:57'),
(4, 'AURANGABAD', 'no', 'yes', '2022-09-06 11:47:20'),
(5, 'PUNE / KOLHAPUR', 'no', 'yes', '2022-09-06 11:47:32'),
(6, 'MUMBAI / THANE', 'no', 'yes', '2022-09-06 11:47:48'),
(7, 'GUJARAT', 'no', 'yes', '2022-09-06 11:48:02'),
(8, 'MADHYA PRADESH', 'no', 'yes', '2022-09-06 11:48:17'),
(9, '1', 'yes', 'yes', '2022-11-17 11:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `department_old`
--

CREATE TABLE `department_old` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_old`
--

INSERT INTO `department_old` (`id`, `department`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Branch Manager', 'no', 'yes', '2022-09-15 09:56:12'),
(2, 'Tour Manager', 'no', 'yes', '2022-09-15 09:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `domestic_followup`
--

CREATE TABLE `domestic_followup` (
  `id` int(11) NOT NULL,
  `booking_enquiry_id` varchar(255) NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `follow_up_time` time DEFAULT NULL,
  `follow_up_comment` varchar(255) NOT NULL,
  `is_followup_status` enum('yes','no') CHARACTER SET utf8 DEFAULT 'no',
  `is_last` enum('yes','no') NOT NULL DEFAULT 'yes',
  `is_view` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_deleted` enum('no','yes') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domestic_followup`
--

INSERT INTO `domestic_followup` (`id`, `booking_enquiry_id`, `follow_up_date`, `follow_up_time`, `follow_up_comment`, `is_followup_status`, `is_last`, `is_view`, `is_deleted`, `created_at`) VALUES
(3, '1', '2022-11-25', '17:25:00', 'hellohhhhhh', 'no', 'yes', 'no', 'no', '2022-11-25 09:55:26'),
(4, '3', '2022-11-01', '20:27:00', 'hiiiiiiiiiiiiiiii', 'no', 'yes', 'no', 'no', '2022-11-25 09:57:07'),
(5, '4', '2022-11-26', '23:27:00', 'hiiiiiiiiiiiiiiiihgfhfgh', 'no', 'yes', 'no', 'no', '2022-11-25 09:58:05'),
(6, '5', '2022-11-22', '18:43:00', 'sadasdasdfasfd', 'no', 'yes', 'no', 'no', '2022-11-25 10:14:02'),
(7, '5', '2022-11-30', '21:47:00', 'dasdadasdadds', 'no', 'yes', 'no', 'no', '2022-11-25 10:17:46'),
(9, '4', '2022-11-23', '20:52:00', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'no', 'yes', 'no', 'no', '2022-11-25 10:22:59'),
(10, '1', '2022-11-01', '20:52:00', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'no', 'yes', 'no', 'no', '2022-11-25 10:25:05'),
(12, '7', '2022-11-16', '20:10:00', 'choudhary yatra', 'no', 'yes', 'no', 'no', '2022-11-25 10:40:44'),
(15, '2', '2022-11-10', '20:51:00', 'followup 8.51', 'no', 'yes', 'no', 'no', '2022-11-28 10:21:54'),
(16, '1', '2022-11-29', '18:28:00', 'take followup 6pm', 'no', 'yes', 'no', 'no', '2022-11-29 10:58:24'),
(17, '3', '2022-11-30', '20:35:00', 'helloooooooooooooooooo', 'no', 'yes', 'no', 'no', '2022-11-29 11:05:16'),
(18, '3', '2022-11-30', '22:39:00', 'yyyyyyyyyyyyyyyyyyyyyyy', 'no', 'yes', 'no', 'no', '2022-11-29 11:09:52'),
(19, '3', '2022-10-01', '13:42:00', 'ggggggggggg', 'no', 'yes', 'no', 'no', '2022-11-29 11:12:21'),
(20, '3', '2022-11-09', '18:42:00', 'helllooooooooooooooooooooooo', 'no', 'yes', 'no', 'no', '2022-11-29 11:13:46'),
(21, '1', '2022-11-30', '18:45:00', 'hello', 'no', 'yes', 'no', 'no', '2022-11-29 11:15:36'),
(22, '4', '2022-11-24', '20:56:00', 'jjjjjjjjjjjjjjjjjjjjj', 'no', 'yes', 'no', 'no', '2022-11-30 10:26:33'),
(23, '6', '2022-12-03', '22:24:00', 'chudhary yatra company', 'no', 'yes', 'no', 'no', '2022-12-03 10:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `domestic_package_review`
--

CREATE TABLE `domestic_package_review` (
  `id` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domestic_package_review`
--

INSERT INTO `domestic_package_review` (`id`, `package_id`, `name`, `email`, `review`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '3', 'Hardik Nikhil Patil', 'hardik@gmail.com', 'Fantastic tour with choudhary yatra ....!!', 'no', 'yes', '2022-11-25 12:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Singapur', 'chaudhary_yatra1668868894CYC-1.png', 'no', 'yes', '2022-11-19 14:41:33'),
(2, 'Greece', 'chaudhary_yatra1668868965CYC-3.png', 'no', 'yes', '2022-11-19 14:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE `hotel_master` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_location` varchar(255) NOT NULL,
  `hotel_mobile_number` varchar(255) NOT NULL,
  `hotel_mobile_number2` varchar(255) NOT NULL,
  `hotel_landline_number` varchar(255) NOT NULL,
  `hotel_landline_number2` varchar(255) NOT NULL,
  `hotel_contact_person` varchar(255) NOT NULL,
  `hotel_email_address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `hotel_photo` varchar(255) NOT NULL,
  `hotel_password` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`id`, `hotel_name`, `hotel_location`, `hotel_mobile_number`, `hotel_mobile_number2`, `hotel_landline_number`, `hotel_landline_number2`, `hotel_contact_person`, `hotel_email_address`, `type`, `facility`, `payment_mode`, `class`, `state`, `city`, `hotel_address`, `hotel_photo`, `hotel_password`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Hotel Sai Saya', 'Nashik', '9875678988', '', '', '', '', 'hotelsaya@gmail.com', '', '', '', '', '', '', 'Hotel Sai Saya, Indira nager, Nashik -422009', '', '12345678', 'no', 'yes', '2022-11-18 06:31:31'),
(2, 'sddas', 'dsasd', '9874432987', '', '', '', '', 'sdsd', '', '', '', '', '', '', 'sdsad', '', 'sdasd', 'yes', 'yes', '2022-11-18 09:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `international_booking_enquiry`
--

CREATE TABLE `international_booking_enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `package_id` varchar(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_view` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `international_booking_enquiry`
--

INSERT INTO `international_booking_enquiry` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `gender`, `agent_id`, `package_id`, `booking_date`, `is_view`, `is_deleted`, `created_at`) VALUES
(3, 'Joti', 'Patil', 'joti@gmail.com', '9899078897', 'Female', 1, '4', '2022-11-24 10:22:48', 'yes', 'no', '2022-11-24 10:22:48'),
(5, 'Hey', 'yjtyj', 'yhy@gmail.com', '9876789436', 'Male', 1, '1', '2022-11-24 10:27:53', 'yes', 'no', '2022-11-24 10:27:53'),
(8, 'Hardik', 'panj', 'panj@gmail.com', '9087978978', 'Male', 1, '100', '2022-11-24 12:19:45', 'yes', 'no', '2022-11-24 12:19:45'),
(9, 'Anil', 'hire', 'hare@gmail.com', '9889797999', 'Male', 1, '4', '2022-11-24 12:38:07', 'yes', 'yes', '2022-11-24 12:38:07'),
(10, 'rupali', 'patil', 'rupa1@gmail.com', '9987654324', 'Female', 1, '1', '2022-11-28 09:46:06', 'yes', 'yes', '2022-11-28 09:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `international_followup`
--

CREATE TABLE `international_followup` (
  `id` int(11) NOT NULL,
  `international_booking_enquiry_id` varchar(255) NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `follow_up_time` time DEFAULT NULL,
  `follow_up_comment` varchar(255) NOT NULL,
  `is_view` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_followup_status` enum('yes','no') CHARACTER SET utf8 DEFAULT 'no',
  `is_last` enum('yes','no') NOT NULL DEFAULT 'yes',
  `is_deleted` enum('no','yes') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `international_followup`
--

INSERT INTO `international_followup` (`id`, `international_booking_enquiry_id`, `follow_up_date`, `follow_up_time`, `follow_up_comment`, `is_view`, `is_followup_status`, `is_last`, `is_deleted`, `created_at`) VALUES
(1, '', '2022-11-01', '10:41:00', 'take followup 10.41am dfsdf', 'no', 'no', 'yes', 'no', '2022-11-28 10:11:32'),
(2, '', '2022-11-10', '15:54:00', 'hiiiiiiiiiiiiiiiiiiiiii', 'no', 'no', 'yes', 'no', '2022-11-28 10:24:58'),
(3, '', '2022-10-08', '01:05:00', 'gggggggggggggggggggggg', 'no', 'no', 'yes', 'yes', '2022-11-28 10:31:33'),
(4, '', '2022-11-10', '00:05:00', 'rrrrrrrrrrrrrrrrr', 'no', 'no', 'yes', 'no', '2022-11-28 10:36:27'),
(5, '9', '2022-12-22', '22:22:00', 'helllooo', 'no', 'no', 'yes', 'no', '2022-12-03 12:52:17'),
(6, '9', '2022-12-03', '13:40:00', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'no', 'no', 'yes', 'no', '2022-12-03 13:10:53'),
(7, '9', '2022-12-22', '22:49:00', 'hhhhhhhhhhhhhhhhh', 'no', 'no', 'yes', 'no', '2022-12-03 13:19:45'),
(8, '9', '2022-12-01', '12:54:00', 'rrrrrrrrrrrrrrrrrrr', 'no', 'no', 'yes', 'no', '2022-12-03 13:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `international_packages`
--

CREATE TABLE `international_packages` (
  `id` int(11) NOT NULL,
  `academic_year` int(11) DEFAULT NULL,
  `tour_number` varchar(50) DEFAULT NULL,
  `tour_title` text DEFAULT NULL,
  `destinations` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `tour_number_of_days` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `iternary` text DEFAULT NULL,
  `inclusion` text DEFAULT NULL,
  `terms_conditions` text DEFAULT NULL,
  `contact_us` text DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `international_packages`
--

INSERT INTO `international_packages` (`id`, `academic_year`, `tour_number`, `tour_title`, `destinations`, `rating`, `cost`, `tour_number_of_days`, `image_name`, `short_description`, `full_description`, `iternary`, `inclusion`, `terms_conditions`, `contact_us`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, '1', 'Singapur', 'Toa Payoh, Singapur, Tampines', 5, '18000', '05', 'chaudhary_yatra1668864933chaudhary_yatra1664620828i1.jpg', 'Singapur', '<p>Toa Payoh, Singapur, Tampines<br></p>', NULL, '<p>Hello</p>', '<p>Terms and conditions</p>', '<p>Call : 7588383838</p><p>Mail : chaoudharyyatra@gmail.com</p>', 'no', 'yes', '2022-11-19 13:35:32'),
(2, 1, '100', 'America', 'America, Tampines, Toa Payoh', 4, '15000', '04', 'chaudhary_yatra1668866938chaudhary_yatra1663583346the-ridge.jpg', 'America', '<p>America,&nbsp;Tampines, Toa Payoh<br></p>', NULL, '<p>inclusion</p>', '<p>Terms and condition</p>', '<p>Call : 7588383838</p>', 'no', 'yes', '2022-11-19 14:08:58'),
(3, 1, '4', 'London', 'London, Camden,  Hackney', 5, '15800', '08', 'chaudhary_yatra1668867132chaudhary_yatra1663582431download_(4)_-_Copy.jpg', 'London', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">London, the capital of England and the United Kingdom, is a 21st-century city with history stretching back to Roman times. At its centre stand the imposing Houses of Parliament, the iconic ‘Big Ben’ clock tower and Westminster Abbey, site of British monarch coronations.</span>', NULL, '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">At its centre stand the imposing Houses of Parliament, the iconic ‘Big Ben’ clock tower.</span><br></p>', '<p>terms</p>', '<p>Call : 7588383838</p>', 'no', 'yes', '2022-11-19 14:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `international_packages_dates`
--

CREATE TABLE `international_packages_dates` (
  `id` int(32) NOT NULL,
  `package_id` int(32) NOT NULL,
  `journey_date` varchar(100) NOT NULL,
  `available_seats` int(32) NOT NULL,
  `single_seat_cost` varchar(50) NOT NULL,
  `twin_seat_cost` varchar(50) NOT NULL,
  `three_four_sharing_cost` varchar(50) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `international_packages_dates`
--

INSERT INTO `international_packages_dates` (`id`, `package_id`, `journey_date`, `available_seats`, `single_seat_cost`, `twin_seat_cost`, `three_four_sharing_cost`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, '2022-09-22', 3, '10000', '5000', '3000', 'no', 'yes', '2022-09-19 10:14:13'),
(2, 1, '2022-12-10', 22, '1111', '1111', '1111', 'no', 'yes', '2022-11-21 06:00:34'),
(3, 1, '2022-12-15', 11, '1111', '1111', '1111', 'no', 'yes', '2022-11-21 06:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `international_package_iternary`
--

CREATE TABLE `international_package_iternary` (
  `id` int(50) NOT NULL,
  `package_id` int(50) NOT NULL,
  `total_days` int(50) NOT NULL,
  `day_number` int(50) NOT NULL,
  `iternary_desc` longtext NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `international_package_iternary`
--

INSERT INTO `international_package_iternary` (`id`, `package_id`, `total_days`, `day_number`, `iternary_desc`, `is_active`, `is_deleted`, `created_at`) VALUES
(1, 1, 3, 1, 'aaa', 'yes', 'no', '2022-09-19 10:20:36'),
(2, 1, 3, 2, 'aaa', 'yes', 'no', '2022-09-19 10:20:36'),
(3, 1, 3, 3, 'aaa', 'yes', 'no', '2022-09-19 10:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `live_agents`
--

CREATE TABLE `live_agents` (
  `id` int(11) NOT NULL,
  `arrange_id` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `booking_center` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile_number1` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile_number2` varchar(50) CHARACTER SET utf8 NOT NULL,
  `is_deleted` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_agents`
--

INSERT INTO `live_agents` (`id`, `arrange_id`, `department`, `city`, `booking_center`, `mobile_number1`, `mobile_number2`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, 2, 'Nashik', 'M. G. Road, Nashik.', '7588383838', '9699829373', 'no', 'yes', '2022-09-06 11:34:28'),
(2, 2, 2, 'Nashik', 'Choudhary Farm, Aurangabad Road, Nashik.', '9699813921', '9699813921', 'no', 'yes', '2022-09-06 11:44:14'),
(3, 3, 2, 'Nashik Road', 'Bitco Point, Nashik Road, Nashik.', '9699829374', '7499414797', 'no', 'yes', '2022-09-06 11:44:54'),
(4, 4, 2, 'Nashik', 'Tirupati Bldg., Nasardi River Road, Bhabha Nagar, Mumbai Naka, Nashik.', '9699829375', '7588484848, 8806442341', 'no', 'yes', '2022-09-06 11:46:02'),
(5, 7, 2, 'Ozar Mig', 'Ozar Mig Tal Niphad Nashik', '9699829376', '7798772162', 'no', 'yes', '2022-09-06 11:50:03'),
(6, 8, 2, ' Sangamner', 'Near Tahasil Court, Sangamner.', '9699829392', '9850136993', 'no', 'yes', '2022-09-06 11:51:01'),
(7, 9, 2, 'Satana', 'Opp. Maharashtra Bank, Satana.', '9699829377', '9403009343', 'no', 'yes', '2022-09-06 11:51:38'),
(8, 10, 2, 'Malegaon', 'Panjrapol Shoping Centre, Malegaon.', '9699829378', '9325145216', 'no', 'yes', '2022-09-06 12:46:35'),
(9, 11, 2, 'Dhule', 'Opp. Court, Station Road, Dhule.', '9699829379', '9403496277', 'no', 'yes', '2022-09-06 12:47:15'),
(10, 12, 2, 'Nandurbar', 'Neharu Chowk, Station Road, Nandurbar.', '9699829380', '9423094641', 'no', 'yes', '2022-09-06 12:48:06'),
(11, 13, 2, 'Shahada', 'Behind ST Bus Stand, Shahada.', '9699829381', '9421889289', 'no', 'yes', '2022-09-06 12:48:56'),
(12, 14, 2, ' Parola', '20-21, Undir Kheda Road, Parola.', '9699829382', '7588815830', 'no', 'yes', '2022-09-06 12:49:54'),
(13, 15, 2, 'Amalner', 'Pdmalay, Behind Swami Samarth Temple, Amalner.', '9699829383', '9422618393', 'no', 'yes', '2022-09-06 12:51:03'),
(14, 16, 2, 'Erandol', 'Ganesh Nagar, Near Police Ground, Erandol.', '9699829384', '9421182258', 'no', 'yes', '2022-09-06 12:52:07'),
(15, 17, 2, 'Jalgaon', 'Shop No. 21, B Wing, Basement, Stadium Complex, Jalgaon.', '9699829385', '7841833111', 'no', 'yes', '2022-09-06 12:53:59'),
(16, 18, 2, 'Bhusawal', 'Deep Nagar, Bhusawal.', '9699829386', '8983228537', 'no', 'yes', '2022-09-06 12:54:40'),
(17, 19, 2, 'Pachora', 'Near Gajanan Petrol Pump, Bhadgaon Road, Pachora.', '9699829387', '9970049449', 'no', 'yes', '2022-09-06 12:55:31'),
(18, 20, 2, ' Jamner', 'B O T Complex, Pachora Road, Jamner.', '9699813929', '9421685416', 'no', 'yes', '2022-09-06 12:56:18'),
(19, 21, 2, 'Chalisgaon', 'Netaji Chowk, Chalisgaon.', '9699829388', '9850325902', 'no', 'yes', '2022-09-06 12:57:08'),
(20, 22, 2, 'Shrirampur', 'Near Sawata Temple, Shrirampur.', '9699829389', '9890251301', 'no', 'yes', '2022-09-06 12:58:15'),
(21, 23, 2, 'Ahamadnagar', 'Opp. Dada Choudhary School, Court Galli, Ahamadnagar.', '9699829390', '9420641332', 'no', 'yes', '2022-09-06 12:59:27'),
(22, 24, 2, 'Karjat', 'Bhaji Mandai, Karjat.', '9699829391', '9423389621, 9511400700', 'no', 'yes', '2022-09-06 13:00:12'),
(23, 25, 3, 'Nagpur', 'Lokmat Chowk, Vardha Road, Nagpur.', '9699829393', '7755961515', 'no', 'yes', '2022-09-06 13:18:14'),
(24, 26, 3, 'Chandrapur', 'Haveli Complex, Chandrapur.', '9699829394', '9850288219', 'no', 'yes', '2022-09-06 13:19:01'),
(25, 27, 3, 'Yawatmal', 'Datt Chowk, Yawatmal.', '9699829395', '8208070736', 'no', 'yes', '2022-09-06 13:20:08'),
(26, 28, 3, 'Umarkhed', 'Wankhede Market, Umarkhed.', '9699829396', '9028350585', 'no', 'yes', '2022-09-06 13:21:42'),
(27, 29, 3, 'Pusad', 'Opp. Gajanan Maharaj Temple, Pusad.', '9699829397', '9423131423', 'no', 'yes', '2022-09-06 13:22:50'),
(28, 30, 3, 'Vashim', 'Near LIC Office, Vashim.', '9699829398', '9422193103', 'no', 'yes', '2022-09-06 13:23:46'),
(29, 31, 3, 'Buldhana', 'Rajrshee Shahu Nagar, Buldhana.', '9699829399', '9421463032', 'no', 'yes', '2022-09-06 13:24:48'),
(30, 32, 3, 'Khamgaon', 'Balaji Plot, Khamgaon.', '9699829400', '7447579999', 'no', 'yes', '2022-09-06 13:25:52'),
(31, 33, 3, ' Akola', 'Shastri Stadium, Akola.', '9699813927', '9028689709', 'no', 'yes', '2022-09-06 13:26:58'),
(32, 34, 3, 'Amaravati', 'Near Railway Station, Amaravati.', '9699829402', '8999428014', 'no', 'yes', '2022-09-06 13:27:37'),
(33, 35, 4, 'Aurangabad', 'Tapadiya Terraces, Adalat Road, Aurangabad.', '9699829403', '9021287859', 'no', 'yes', '2022-09-06 13:28:49'),
(34, 36, 4, 'Aurangabad', 'Kalindi Nivas, MTI Hospital, Cidco, Aurangabad.', '9699829404', '8208602068', 'no', 'yes', '2022-09-06 13:30:26'),
(35, 37, 4, ' Jalana', 'Shastri Road, Near Maruti Temple, Jalana.', '9699829405', '9423931131', 'no', 'yes', '2022-09-06 13:31:14'),
(36, 38, 4, 'Jalana', 'Gandhi Chaman, Jalana.', '9699813922', '8275556119', 'no', 'yes', '2022-09-06 13:32:08'),
(37, 39, 4, 'Parabhani', 'Near Lalit Kala Bhavan, Parabhani.', '9699829406', '9422176862', 'no', 'yes', '2022-09-06 13:32:59'),
(38, 40, 4, 'Nanded', 'Shiv Vijay Colony, Chaitanya Nagar Chowk, Nanded.', '9699829407', '9423917401', 'no', 'yes', '2022-09-06 13:34:08'),
(39, 41, 4, 'Nanded', 'Near P N Highschool, Nanded.', '9699829408', '9403692426', 'no', 'yes', '2022-09-06 13:35:05'),
(40, 42, 4, 'Latur', 'Vyapari Dharmshala Complex, Gandhi Chowk, Latur.', '9699829409', '9822373791', 'no', 'yes', '2022-09-06 13:36:11'),
(41, 43, 4, 'Usmanabad', 'Tulaja Bhavani Shopping Centre, Usmanabad.', '9699829410', '8767244206', 'no', 'yes', '2022-09-06 13:37:29'),
(42, 44, 4, 'Parali Vaijnath', 'Opp. ST Bus Stand, Parali Vaijnath.', '9699829411', '9422742982', 'no', 'yes', '2022-09-06 13:38:27'),
(43, 45, 4, 'Beed', 'Tambare Complex, Pangari Road, Beed.', '9699829412', '9960701880', 'no', 'yes', '2022-09-06 13:39:32'),
(44, 46, 5, 'Pune', 'Amar Sanket Building, Near Natraj Hotel, Swargate Chowk, Pune.', '9699829413', '8484819631', 'no', 'yes', '2022-09-06 13:42:00'),
(45, 47, 4, 'Pradhikaran', 'Koyana Nagar, Pradhikaran.', '9699829414', '9822600553', 'no', 'yes', '2022-09-06 13:42:55'),
(46, 48, 5, 'Chinchwadgaon', 'Chafekar Chowk, Chinchwadgaon.', '9699829415', '9371000299', 'no', 'yes', '2022-09-06 13:44:24'),
(47, 49, 5, 'Hadapsar', 'Near Bhekari Mata School, Hadapsar.', '9699829416', '9822850062', 'no', 'yes', '2022-09-06 13:45:27'),
(48, 50, 5, 'Baramati', 'Bigvan Road, Baramati.', '9699829417', '9890808169', 'no', 'yes', '2022-09-06 13:48:22'),
(49, 51, 5, 'Barshi', 'Near Shree Magvant Tample, Barshi.', '9699829418', '9422647580', 'no', 'yes', '2022-09-06 13:50:00'),
(50, 52, 5, 'Solapur', 'Near Hotel Pratham, Solapur.', '9699829419', '0217-2314121', 'no', 'yes', '2022-09-06 13:56:48'),
(51, 53, 5, 'Solapur', '2, Prachi Parking, Near Bus Stand, Solapur.', '9699813923', '9561559229', 'no', 'yes', '2022-09-06 13:57:54'),
(52, 54, 5, 'Pandharpur', 'Opp. Darshan Mandap, Mahadwar, Pandharpur.', '9699829420', '9423329224', 'no', 'yes', '2022-09-06 13:59:04'),
(53, 55, 5, 'Sangali', 'Near Apata Police Chowky, Sangali.', '9699829421', '9823771890', 'no', 'yes', '2022-09-06 14:00:28'),
(54, 56, 5, 'Ichalkaranji', 'Opp. Vyapari Pathsanstha, Ichalkaranji.', '9699829422', '9607969798', 'no', 'yes', '2022-09-06 14:01:40'),
(55, 57, 5, 'Kolhapur', 'Opp. Binkhambi Ganpati, Kolhapur.', '9699813924', '9403604943', 'no', 'yes', '2022-09-06 14:02:44'),
(56, 58, 5, 'Kolhapur', 'Dabholkar Corner, Kolhapur.', '9699813902', '9881861588', 'no', 'yes', '2022-09-06 14:03:40'),
(57, 59, 5, 'Pathvadgaon', 'Hanuman Road, Pathvadgaon.', '9699813903', '8605716207', 'no', 'yes', '2022-09-06 14:04:33'),
(58, 60, 5, 'Islampur', 'Opp. ST Bus Stand, Islampur.', '9699813904', '9421655099', 'no', 'yes', '2022-09-06 14:05:24'),
(59, 61, 5, 'Karad', 'Near Santsakhubai Temple Karad', '9699813905', '9028744017', 'no', 'yes', '2022-09-06 14:07:39'),
(60, 62, 5, 'Veeta', 'Bank Colony Road, Bhavani Mal, Veeta.', '9699813906', '8180803824', 'no', 'yes', '2022-09-06 14:08:35'),
(61, 63, 5, 'Pusegaon', 'Behind Sevagiri Temple,  At Post Pusegaon.', '9699813907', '9763452915', 'no', 'yes', '2022-09-06 14:09:36'),
(62, 64, 5, 'Satara', 'Opp. Goreram Temple, Satara.', '9699813908', '9822609045', 'no', 'yes', '2022-09-06 14:10:32'),
(63, 65, 6, 'Dadar E', 'Opp. Kailas Lassi, Near Railway Station, Dadar (E), Mumbai.', '9699813910', '9420840292', 'no', 'yes', '2022-09-06 14:20:15'),
(64, 66, 6, 'Mulund W Mumbai', 'Near Sarojini Naidu MCC Collage, Mulund (W), Mumbai.', '9699813926', '7666343721', 'no', 'yes', '2022-09-06 14:22:58'),
(65, 67, 6, 'Kalava', 'Vastu Anand, Parsik Nagar, Kalava, Mumbai.', '9699813925', '8169486839', 'no', 'yes', '2022-09-06 14:24:14'),
(66, 68, 6, 'Dombivali E', 'Near Ganpati Temple, Near Anil Eye Hospital, Dombivali (E), Mumbai.', '9699813925', '8169486839', 'no', 'yes', '2022-09-06 14:28:43'),
(67, 69, 6, 'Kalyan W', '1, Navsadhan Apartment, Lal Chowk, Kalyan (W), Mumbai.', '9699813912', '9702200885', 'no', 'yes', '2022-09-06 14:32:21'),
(68, 70, 6, 'Badalapur W', 'Govind Dham Complex, Majarli, Badalapur (W), Mumbai.', '9699813913', '9322420990', 'no', 'yes', '2022-09-06 14:34:24'),
(69, 71, 6, 'Badalapur E', 'Shivaji Chowk, Badalapur (E), Mumbai.', '9699813914', '9028874950', 'no', 'yes', '2022-09-06 14:35:54'),
(70, 72, 6, 'Mumbai', 'Khanda Colony, New Panvel (W), New Mumbai.', '9699813915', '9890366615', 'no', 'yes', '2022-09-08 09:36:12'),
(71, 73, 6, 'Mahad', 'New Peth, Shimpi Aali, Mahad.', '9699813916', '02145-222588', 'no', 'yes', '2022-09-08 10:10:03'),
(72, 74, 7, 'Ahmedabad', 'Ahmedabad', '9699813919', '9157586309', 'no', 'yes', '2022-09-08 10:12:16'),
(73, 76, 8, 'Indore', 'Raghuvanshi Colony, VIP Road, Indore.', '9699813928', '9893069704', 'no', 'yes', '2022-09-08 10:13:01'),
(74, 75, 7, 'Badoda', 'Bhavdas Street, Siyabag, Badoda.', '9699813920', '9998768892', 'no', 'yes', '2022-09-08 10:14:14'),
(75, 5, 2, 'Nashik', 'Lakhalgaon, Nashik.', '9699813918', '9422272024', 'no', 'yes', '2022-09-10 09:01:06'),
(76, 6, 2, 'Nashik', 'Makhmalabad Road, Panchavati, Nashik.', '9699813927', '9422272027, 9422272037', 'no', 'yes', '2022-09-10 09:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `live_department`
--

CREATE TABLE `live_department` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_department`
--

INSERT INTO `live_department` (`id`, `department`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Puney', 'yes', 'yes', '2022-09-06 11:26:32'),
(2, 'NASHIK / JALGAON ', 'no', 'yes', '2022-09-06 11:33:09'),
(3, 'Nagpur / Amaravati VIDARBH', 'no', 'yes', '2022-09-06 11:46:57'),
(4, 'AURANGABAD', 'no', 'yes', '2022-09-06 11:47:20'),
(5, 'PUNE / KOLHAPUR', 'no', 'yes', '2022-09-06 11:47:32'),
(6, 'MUMBAI / THANE', 'no', 'yes', '2022-09-06 11:47:48'),
(7, 'GUJARAT', 'no', 'yes', '2022-09-06 11:48:02'),
(8, 'MADHYA PRADESH', 'no', 'yes', '2022-09-06 11:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `main_category_no_need`
--

CREATE TABLE `main_category_no_need` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `academic_year` int(11) DEFAULT NULL,
  `tour_number` varchar(50) DEFAULT NULL,
  `tour_title` text DEFAULT NULL,
  `destinations` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `twin_sharing_per_seat` varchar(50) NOT NULL,
  `three_or_four_sharing_per_seat` varchar(50) NOT NULL,
  `tour_number_of_days` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `pdf_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `iternary` text DEFAULT NULL,
  `inclusion` text DEFAULT NULL,
  `terms_conditions` text DEFAULT NULL,
  `contact_us` text DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `academic_year`, `tour_number`, `tour_title`, `destinations`, `rating`, `cost`, `twin_sharing_per_seat`, `three_or_four_sharing_per_seat`, `tour_number_of_days`, `image_name`, `pdf_name`, `short_description`, `full_description`, `iternary`, `inclusion`, `terms_conditions`, `contact_us`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, '01', 'Ashtavinayak Darshan, Alandi, Jejuri', 'Ozar, Laynyadri, Bhimashankar, Alandi, Dehu, Mahad, Pali, Ranjangaon, Theur, Jejuri, Morgaon, Sidhhtek.', 5, '3251', '', '', '03', 'chaudhary_yatra1663767834T10A.jpg', 'chaudhary_yatra166961684815.pdf', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span></p>', 'Iternary</span><br></p>\"><p><span style=\"font-weight: 700;\">Iternary</span><br></p>', '<p><span style=\"font-weight: 700;\">Inclusion</span></p>', '<p><span style=\"font-weight: 700;\">Terms & Conditions</span></p>', 'MOBILE : 7588 18 18 18 / 7588 48 48 48', 'no', 'yes', '2022-09-12 14:27:09'),
(2, 1, '03', 'Goa, KokanDarshan, Ganpatipule, Sindhudurg, Tarkarli', 'Kolhapur, Goa, Deobag, Tarkarli, Malvan, Sindudurg, Ganpatipule, Old Kokan (Misaim) Dervan, Raygadh, Shivthargal, Mahabaleshwar.', 4, '18165', '', '', '09', 'chaudhary_yatra1669615596chaudhary_yatra1664618819T148.jpg', NULL, 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span></p>', 'Iternary</span><br></p>\"><p><span style=\"font-weight: 700;\">Iternary</span><br></p>', '<p><span style=\"font-weight: 700;\">Inclusion</span></p>', '<p><span style=\"font-weight: 700;\">Terms & Conditions</span></p>', '<p><span style=\"font-weight: 700;\">MOBILE : 7588 18 18 18 / 7588 48 48 48</span><br></p>', 'no', 'yes', '2022-09-12 14:51:40'),
(3, 1, '04', 'Special Goa Darshan', 'Goa, Kalangut Beach, Donapawala, Miramar, Sent Francis Charch, Mangeshi Temple, Old Goa.', 4, '11045', '', '', '05', 'chaudhary_yatra1663767834T10A.jpg', 'chaudhary_yatra166961703522.pdf', 'Short Description', 'Full Description / Overview', NULL, 'Inclusion', 'Terms & Conditions', '<p><span style=\"font-weight: 700;\">MOBILE : 7588 18 18 18 / 7588 48 48 48</span><br></p>', 'no', 'yes', '2022-09-14 08:21:24'),
(4, 1, '05', 'Kokan Darshan, Tarkarli, Ganpatipule, Mahabaleshwar', 'Kankavali, Deobag, Tarkarli, Malvan, Sindhudurg, Ganpatipule, Prachin Kokan Museum, Dervan, Raigadh, Shivthargal, Mahableshwar.', 4, '11865', '', '', '06', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Short Description', 'Full Description / Overview<br><p></p><p><br></p>', NULL, 'Inclusion<br><p></p><p><br></p>', 'Terms &amp; Conditions<br><p></p><p><br></p>', '<p><span style=\"font-weight: 700;\">MOBILE : 7588 18 18 18 / 7588 48 48 48</span><br></p>', 'no', 'yes', '2022-09-14 08:34:24'),
(5, 1, '06', 'Dwarka, Kuberbhandari, Somnath, Sardar Sarovar', 'Nilkanthdham (Swami Narayan Temple), Kuber Bhandari, Sardar Sarovar, Statue of Unity, Dakorji, Junagadh, | Sasangir Devalia Safari, Somnath, Bhaluka Tirth, Porbandar, Muldwarka, Dwarka, Rukmini Temple, Okha, Betdwarka, Nageshwar, Gopitalav, Sudamapuri, Prabhaspatan Siddharpur (Matrugaya). Ambaji, Akshardham (Swami Narayan Temple)', 4, '15375', '', '', '08', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Dwarka, Kuberbhandari, Somnath, Sardar Sarovar', '<p>Dwarka, Kuberbhandari<br></p>', NULL, '<p>Inclusion</p>', '<p>Terms and condition</p>', '<p>call : 7588383838</p>', 'no', 'yes', '2022-09-21 13:05:31'),
(6, 1, '111', 'Kuber Bhandari, Statue of Unity, Ahmedabad', 'Nilkanthdham (Swami Narayan Temple) Kuber Bhandari, Statue of Unity, Dakorji, Ahmedabad.', 4, '8175', '', '', '02', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Short Description', 'Full Description / Overview<br><p></p><p><br></p>', NULL, 'Inclusion<br><p></p><p><br></p>', 'Terms &amp; Conditions<br><p></p><p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<b>MOBILE : 7588 18 18 18 / 7588 48 48 48</b>', 'no', 'yes', '2022-09-21 13:35:01'),
(7, 1, '10', 'Mini Rajasthan, Chittorgarh, Jaipur, Agra', 'Nathdwara Udaipur, Chittorgarh, Pushkar, Jaipur, Agra, Vrindavan, Mathura', 4, '16205', '', '', '08', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Short Description', 'Full Description / Overview<br><p></p><p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', 'Terms &amp; Conditions<br><p></p><p><br></p>', '<p><span style=\"font-weight: 700;\">MOBILE : 7588 18 18 18 / 7588 48 48 48</span><br></p>', 'no', 'yes', '2022-09-21 13:37:55'),
(8, 1, '10A', 'Nathdwara, Mount Abu, Udaipur, Chittorgarh', 'Nathdwara, Mount Abu, Udaipur, Chittorgarh', 4, '12521', '', '', '05', 'chaudhary_yatra1663767834T10A.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p><b>Mobile : 7588 18 18 18 / 7588 48 48 48</b><br></p>', 'no', 'yes', '2022-09-21 13:43:53'),
(9, 1, '10B', 'Chittorgarh, Pushkar, Ajmer, Agra, Mathura, Vrindavan', 'Chittogarh, Pushkar, Jaipur, Agra, Mathura, Vrindavan', 4, '12521', '', '', '05', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Short Description', 'Full Description / Overview<br><p></p><p><br></p>', NULL, 'Inclusion<br><p></p><p><br></p>', 'Terms &amp; Conditions<br><p></p><p><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-21 14:02:41'),
(10, 1, '11', 'Special Rajasthan, Jaipur, Jaisalmer, Mount Abu', 'Mathura, Vrindavan, Agra, Jaipur, (Badi Chowpad, Chhoti Chaupad, Raj Mandir, Chowki Dhani) Ghana World Century, Pushkar, Deshnok (Karni Mata Temple of Rats), Bikaner, Jaisalmer, Some Desert, Jodhpur, Ranakpur, Kumbhalgarh, Mount Abu, Nathdwara, Udaipur, Chittorgarh', 5, '31025', '', '', '14', 'chaudhary_yatra1663769915T11.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p><b>Mobile : 7588 18 18 18 / 7588 48 48 48</b><br></p>', 'no', 'yes', '2022-09-21 14:18:35'),
(11, 1, '12', 'East Rajasthan, Agra, Jaipur, Jaisalmer, Bikaner', 'Mathura, Vrindavan, Agra, Jaipur, (Badi Chowpad, Chhoti Chowpad, Raj Mandir, Chowki Dhani) Ghana World Century, Pushkar, Deshnok (Karni Mata Temple of Rats) Bikaner, Jaisalmer, Some Desert', 4, '25031', '', '', '10', 'chaudhary_yatra1663826200T12.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 05:56:39'),
(12, 1, '12A', 'Jaipur, Jaisalmer, Ranakpur, Kumbhalgarh, Mount Abu', 'Jaipur (Badi Chopard, Chhoti Chopad, Raj Mandir, Chowki Dhani) Pushkar, Deshnok (Karni Mata Temple of Rats), Bikaner, Ramdevra, Jaisalmer, Sam Desert, Jodhpur, Ranakpur Kumbhalgarh, Mount Abu, Nathdwara, Udaipur, Chittorgarh', 4, '28001', '', '', '12', 'chaudhary_yatra1663828047T12A.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 06:27:27'),
(13, 1, '12B', 'Jaipur, Pushkar, Vikaner, Jaisalmer Some Desert', 'Jaipur, Pushkar, Deshnok (Karni Mata Temple of Rats). Bikaner Ramdevra, Jaisalmer, Sum Desert', 4, '18831', '', '', '07', 'chaudhary_yatra1663832275T12B.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 07:37:55'),
(14, 1, '13', 'Western Rajasthan, Jaisalmer, Ranakpur, Kumbhalgarh, Mount Abu', 'Jaisalmer, Sum Desert, Jodhpur, Ranakpur, Kumbhalgarh, Mount Abu, Nathdwara, Udaipur, Chittorgarh', 4, '17715', '', '', '08', 'chaudhary_yatra1663833058T13.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 07:50:57'),
(15, 1, '14', 'Delhi, Agra, Mathura, Vrindavan, Fatehpur Sikri', 'Delhi, Agra, Mathura, Vrindavan, Fatehpur Sikri, Ghana World Century', 4, '19461', '', '', '06', 'chaudhary_yatra1663833414T14.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 07:56:54'),
(16, 1, '15', 'Vaishnodevi, Delhi, Agra, Shivkhodi, Patnitop', 'Mathura, Vrindavan, Agra, Delhi, Kurukshetra, Amritsar, Wagah Border, Katra (Vaishnodevi), Shivkhodi, Patnitop', 5, '25301', '', '', '11', 'chaudhary_yatra1663833874T15.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 08:04:33'),
(17, 1, '16', 'Kashmir, Vaishnodevi, Agra, Delhi, Pahelgam', 'Mathura, Vrindavan, Agra, Delhi, Kurukshetra, Amritsar, Wagah', 5, '36921', '', '', '15', 'chaudhary_yatra1663834372T16.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 08:12:51'),
(18, 1, '17', 'Vaishno Devi, Delhi, Agra, Kurukshetra, Wagahwarder', 'Mathura, Vrindavan, Agra, Delhi. Kurukshetra, Amritsar, Wagah Border, Katra-Vaishnodevi', 5, '22421', '', '', '09', 'chaudhary_yatra1663834983T17.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 08:23:02'),
(19, 1, '18', 'Delhi, Agra, Kurukshetra, Amritsar', 'Mathura, Vrindavan, Agra, Delhi, Kurukshetra, Amritsar, Wagah Border', 4, '17481', '', '', '07', 'chaudhary_yatra1663835412T18.jpg', '', 'Short Description', '<p><span style=\"font-weight: 700;\">Full Description / Overview</span><br></p>', NULL, '<p><span style=\"font-weight: 700;\">Inclusion</span><br></p>', '<p><span style=\"font-weight: 700;\">Terms &amp; Conditions</span><br></p>', '<p>Mobile : 7588 18 18 18 / 7588 48 48 48<br></p>', 'no', 'yes', '2022-09-22 08:30:12'),
(20, 1, '19', 'Amritsar, Wagah Border, Vaishnodevi, Shivkhodi, Patnitop', 'Amritsar, Wagha Border, Katra (Vaishnodevi) Shivkhodi, Patnitop', 5, '19731', '', '', '08', 'chaudhary_yatra1663767834T10A.jpg', NULL, 'Short DescriptionThe prosperous land of Punjab beckons! A short yet incredible tour to the rich, flourishing land of Punjab to experience sprituality, history and culture at its best.', '<font color=\"#000000\">The prosperous land of Punjab beckons! A short yet incredible tour to the rich, flourishing land of Punjab to experience sprituality, history and culture at its best. Visit the sacred Golden Temple, feel a surge of pride at Attari- Wagah Border and enjoy a unique farmstay that will invigorate your senses!</font>', NULL, '<b><font color=\"#000000\">Travel by comfortable A/C or non A/C small cars or Tempo Travellers or Mini Buses or big buses depending on the respective tour group size</font></b><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">Accommodation in comfortable hotels on twin/triple/Single sharing basis</font></li><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">All Meals – Morning tea/coffee, breakfast, lunch, evening tea/coffee with cookies/snacks, dinner and Water Bottle (1 Litre) per person per day</font></li><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">Guide & driver tips, hotel & restaurants tips</font></li><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">Permits/ entrance fees of all sightseeing places which is to be visited from inside</font></li><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">Accompanied local guide/s services wherever require</font></li><li style=\"text-align: justify; font-size: 14px; position: relative; padding-left: 20px; margin-top: 12px;\"><font color=\"#000000\">Veena World Tour Manager Services from Day 01 Meeting point till the dropping point on last day</font></li>', '<b><font color=\"#000000\">Remarks</font></b><ul _ngcontent-veenaworld-c252=\"\" class=\"package-section-list bullet ng-star-inserted\" style=\"font-family: Muli, sans-serif; margin-right: 0px; margin-bottom: 16px; margin-left: 20px; padding: 0px; font-size: 13px; letter-spacing: 0.4px;\"><li _ngcontent-veenaworld-c252=\"\" class=\"list-item ng-star-inserted\" style=\"font-size: 14px;\"><font color=\"#000000\">All meals are provided by Veena World in case the flight reaches the stipulated destination early morning or leaves destination late in the evening.</font></li><li _ngcontent-veenaworld-c252=\"\" class=\"list-item ng-star-inserted\" style=\"font-size: 14px; margin-top: 12px;\"><font color=\"#000000\">The tour price mentioned for this tour is for Indian nationals only.</font></li><li _ngcontent-veenaworld-c252=\"\" class=\"list-item ng-star-inserted\" style=\"font-size: 14px; margin-top: 12px;\"><font color=\"#000000\">The tour price varies for NRI’s or foreign nationals, for more details kindly contact your travel advisor</font></li><li _ngcontent-veenaworld-c252=\"\" class=\"list-item ng-star-inserted\" style=\"font-size: 14px; margin-top: 12px;\"><font color=\"#000000\">NRIs and Foreign nationals please ensure proper identity is conveyed to booking executive at the time of booking and all details along with passport copies are handed over to the booking executive.</font></li><li _ngcontent-veenaworld-c252=\"\" class=\"list-item ng-star-inserted\" style=\"font-size: 14px; margin-top: 12px;\"><font color=\"#000000\">Standard Check-in and check-out time of hotels in India is generally 1.30 PM and 10 AM respectively.</font></li></ul>', '<font color=\"#000000\">Mobile : 7088383838</font><p></p><p><font color=\"#000000\">E-mail : chaudharyyatra@gmai.com</font></p>', 'no', 'yes', '2022-09-22 08:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `packages_new_old`
--

CREATE TABLE `packages_new_old` (
  `id` int(11) NOT NULL,
  `academic_year` int(11) DEFAULT NULL,
  `tour_number` varchar(50) DEFAULT NULL,
  `tour_title` text DEFAULT NULL,
  `destinations` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `double_person_cost` varchar(50) NOT NULL,
  `triple_person_cost` varchar(50) NOT NULL,
  `tour_number_of_days` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `iternary` text DEFAULT NULL,
  `inclusion` text DEFAULT NULL,
  `terms_conditions` text DEFAULT NULL,
  `contact_us` text DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package_date`
--

CREATE TABLE `package_date` (
  `id` int(32) NOT NULL,
  `package_id` int(32) NOT NULL,
  `journey_date` varchar(100) NOT NULL,
  `available_seats` int(32) NOT NULL,
  `single_seat_cost` varchar(50) NOT NULL,
  `twin_seat_cost` varchar(50) NOT NULL,
  `three_four_sharing_cost` varchar(50) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_date`
--

INSERT INTO `package_date` (`id`, `package_id`, `journey_date`, `available_seats`, `single_seat_cost`, `twin_seat_cost`, `three_four_sharing_cost`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 1, '2022-09-22', 50, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:29:27'),
(2, 1, '2022-09-29', 50, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(3, 1, '2022-10-06', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(4, 1, '2022-10-12', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(5, 1, '2022-10-20', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(6, 1, '2022-10-27', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(7, 1, '2022-11-03', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(8, 1, '2022-11-10', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(9, 1, '2022-11-17', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(10, 1, '2022-11-24', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(11, 1, '2022-12-01', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(12, 1, '2022-12-08', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(13, 1, '2022-12-15', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(14, 1, '2022-12-22', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(15, 1, '2022-12-29', 100, '4701', '3701', '3611', 'no', 'yes', '2022-09-12 14:48:35'),
(16, 2, '2022-09-27', 50, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(17, 2, '2022-10-07', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(18, 2, '2022-10-18', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(19, 2, '2022-10-27', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(20, 2, '2022-11-05', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(21, 2, '2022-11-14', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(22, 2, '2022-11-23', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(23, 2, '2022-12-02', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(24, 2, '2022-12-11', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:30'),
(25, 2, '2022-12-23', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-12 14:54:31'),
(26, 3, '2022-09-18', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(27, 3, '2022-09-27', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(28, 3, '2022-10-07', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(29, 3, '2022-10-18', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(30, 3, '2022-10-27', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(31, 3, '2022-11-05', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(32, 3, '2022-11-14', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(33, 3, '2022-11-23', 50, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(34, 3, '2022-12-02', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(35, 3, '2022-12-11', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(36, 3, '2022-12-23', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(37, 3, '2023-01-01', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(38, 3, '2023-01-18', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(39, 3, '2023-02-10', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(40, 3, '2023-02-24', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(41, 3, '2023-03-10', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(42, 3, '2023-03-24', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(43, 3, '2023-03-24', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(44, 3, '2023-04-08', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(45, 3, '2023-04-17', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(46, 3, '2023-05-03', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(47, 3, '2023-05-12', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(48, 3, '2023-05-21', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(49, 3, '2023-05-30', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(50, 3, '2023-06-08', 200, '15645', '11315', '11045', 'no', 'yes', '2022-09-14 08:32:56'),
(51, 4, '2022-09-30', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(52, 4, '2022-10-10', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(53, 4, '2022-10-21', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(54, 4, '2022-10-30', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(55, 4, '2022-11-08', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(56, 4, '2022-11-17', 50, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(57, 4, '2022-11-26', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(58, 4, '2022-12-05', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(59, 4, '2022-12-14', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(60, 4, '2022-11-26', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(61, 4, '2023-01-04', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(62, 4, '2023-01-21', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(63, 4, '2023-02-13', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(64, 4, '2023-02-27', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(65, 4, '2023-02-27', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(66, 4, '2023-03-13', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(67, 4, '2023-03-27', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(68, 4, '2023-04-11', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(69, 4, '2023-04-20', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(70, 4, '2023-05-06', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(71, 4, '2023-05-15', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(72, 4, '2023-05-24', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(73, 4, '2023-06-02', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(74, 4, '2023-06-11', 100, '16905', '12251', '11865', 'no', 'yes', '2022-09-14 08:42:49'),
(75, 1, '2022-09-23', 231, '10000', '18000', '25000', 'yes', 'yes', '2022-09-22 05:17:53'),
(76, 2, '2022-10-07', 55, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(77, 2, '2022-10-18', 50, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(78, 2, '2022-10-27', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(79, 2, '2022-11-05', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(80, 2, '2022-11-14', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(81, 2, '2022-11-23', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(82, 2, '2022-12-02', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(83, 2, '2022-12-11', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(84, 2, '2022-12-23', 100, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(85, 2, '2023-01-01', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(86, 2, '2023-01-18', 150, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(87, 2, '2023-02-10', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(88, 2, '2023-02-24', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(89, 2, '2023-03-10', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(90, 2, '2023-03-24', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(91, 2, '2023-04-08', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(92, 2, '2023-04-17', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(93, 2, '2023-05-03', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(94, 2, '2023-05-12', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(95, 2, '2023-05-21', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(96, 2, '2023-05-30', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(97, 2, '2023-06-08', 200, '25851', '18705', '18165', 'no', 'yes', '2022-09-22 12:36:54'),
(98, 3, '2022-10-07', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(99, 3, '2022-10-18', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(100, 3, '2022-10-27', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(101, 3, '2022-11-05', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(102, 3, '2022-11-14', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(103, 3, '2022-11-23', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(104, 3, '2022-12-02', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(105, 3, '2022-12-11', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(106, 3, '2022-12-23', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(107, 3, '2023-01-01', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(108, 3, '2023-01-18', 100, '15645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(109, 3, '2023-02-10', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(110, 3, '2023-02-24', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(111, 3, '2023-03-10', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(112, 3, '2023-03-24', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(113, 3, '2023-04-08', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(114, 3, '2023-04-17', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(115, 3, '2023-05-03', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(116, 3, '2023-05-12', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(117, 3, '2023-05-21', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(118, 3, '2023-05-30', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(119, 3, '2023-06-08', 100, '11645', '11315', '11045', 'no', 'yes', '2022-09-22 14:59:39'),
(120, 7, '2022-11-29', 22, '10000', '13000', '16500', 'no', 'yes', '2022-11-19 05:28:45'),
(121, 7, '2022-12-07', 30, '10000', '13000', '16500', 'no', 'yes', '2022-11-19 05:28:45'),
(122, 7, '2022-12-06', 2, '30000', '40000', '50000', 'no', 'yes', '2022-11-19 05:40:04'),
(123, 7, '2022-12-10', 7, '30000', '40000', '50000', 'no', 'yes', '2022-11-19 05:40:04'),
(124, 7, '2022-12-30', 21, '30000', '40000', '50000', 'no', 'yes', '2022-11-19 05:40:04'),
(125, 20, '2022-12-01', 4, '22000', '25000', '30000', 'no', 'yes', '2022-11-26 06:56:34'),
(126, 20, '2022-12-23', 15, '22000', '25000', '30000', 'no', 'yes', '2022-11-26 06:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `package_iternary`
--

CREATE TABLE `package_iternary` (
  `id` int(50) NOT NULL,
  `package_id` int(50) NOT NULL,
  `total_days` int(50) NOT NULL,
  `day_number` int(50) NOT NULL,
  `iternary_desc` longtext NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_iternary`
--

INSERT INTO `package_iternary` (`id`, `package_id`, `total_days`, `day_number`, `iternary_desc`, `is_active`, `is_deleted`, `created_at`) VALUES
(1, 1, 2, 1, 'testing iternary data 1', 'yes', 'no', '2022-09-13 12:01:48'),
(2, 1, 2, 2, 'testing iternary data 2', 'yes', 'no', '2022-09-13 12:01:48'),
(3, 20, 4, 1, 'Tour guests will arrive at Amritsar Airport as per their scheduled flight. Upon arrival they will meet Veena World tour manager at the airport and proceed to hotel.\r\nJallianwala Bagh – a historic garden and memorial of national importance preserved in the memory of those who were killed in the Jallianwala Massacre that happened on 13th April 1919 and Partition Museum – world\'s first Museum dedicated to the Partition of 1947. We then visit Golden Temple – also known as Harmandir Sahib or Darbar Sahib is the holiest Gurdwara and the most important pilgrimage site of Sikhism, here we also see Akal Takht – throne of immortal and highest seat of authority of Khalsa. Golden temple at night is certainly a treat for the eyes & soul.', 'yes', 'no', '2022-11-26 06:52:42'),
(4, 20, 4, 2, 'Today we visit to Attari Wagah Border (subject to operation) – to witness the prestigious lowering of the flags ceremony daily military practice that the security forces of India and Pakistan have jointly followed since 1959. Later in the evening we enjoy the Sound & Light Show at Gobindgarh Fort. We then have free time for shopping.', 'yes', 'no', '2022-11-26 06:52:42'),
(5, 20, 4, 3, 'Today morning we visit the Punjab State War Heroes Memorial & Museum, built to showcase the supreme sacrifices made by the Punjabis while serving in the armed forces. Later we proceed to Amritsar Farm. Here we enjoy the local cuisines of Punjab. Here we indulge in the local experience of Farm, wherein, we can enjoy the Bullock Cart Ride, Tractor Ride, followed by the Walking Tour of the Farm and the Dairy Farm.', 'yes', 'no', '2022-11-26 06:52:42'),
(6, 20, 4, 4, 'It’s time now to say goodbye to our travel companions. Let’s stay in touch with each other through email, phone, WhatsApp, Facebook, Instagram and meet again on yet another memorable tour. See you all!!\r\nTour Guests will proceed to Amritsar airport as per their schedule flight and start their return journey back home.', 'yes', 'no', '2022-11-26 06:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `package_mapping`
--

CREATE TABLE `package_mapping` (
  `id` int(11) NOT NULL,
  `package_title` text DEFAULT NULL,
  `academic_year` int(20) DEFAULT NULL,
  `package_id` varchar(255) NOT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `tour_number_of_days` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_mapping`
--

INSERT INTO `package_mapping` (`id`, `package_title`, `academic_year`, `package_id`, `rating`, `tour_number_of_days`, `description`, `cost`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Goa', 1, '2,3', '4', '4 days', 'testing', '34545', 'chaudhary_yatra1663672738p1.jpg', 'no', 'yes', '2022-09-20 11:18:57'),
(2, 'Vrindavan', 1, '5,19', '5', '05', 'Vrindavan dham, Barsana', '11500', 'chaudhary_yatra1668864228chaudhary_yatra1663765531T6.jpg', 'no', 'yes', '2022-11-19 13:23:48'),
(3, 'Delhi', 1, '19,20', '4', '07', 'Delhi, Taj mahal, Laal kilha', '15000', 'chaudhary_yatra1668864352chaudhary_yatra1663826200T12.jpg', 'no', 'yes', '2022-11-19 13:25:52'),
(4, 'Kashmir', 1, '11,17', '4', '04', 'Kashmir,Jaipur', '8000', 'chaudhary_yatra1668864497chaudhary_yatra1663992113T25.jpg', 'no', 'yes', '2022-11-19 13:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `privacy_policy` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `privacy_policy`, `pdf`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '<p><u>Privacy Policy</u></p>', 'chaudhary_yatra1663671807chaudhary_yatra1662532825Rupali_(1).pdf', 'no', 'yes', '2022-09-20 11:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `state_name` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_policy_no_need`
--

CREATE TABLE `return_policy_no_need` (
  `id` int(11) NOT NULL,
  `return_policy` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seat_reservation_rules`
--

CREATE TABLE `seat_reservation_rules` (
  `id` int(11) NOT NULL,
  `rules` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat_reservation_rules`
--

INSERT INTO `seat_reservation_rules` (`id`, `rules`, `pdf`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '<p><span style=\"font-weight: 700;\">Seat Reservation rules</span><br></p>', 'chaudhary_yatra1663143562Seat_Resevation_Rs_NIYAM___CYC.pdf', 'no', 'yes', '2022-09-14 08:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `description`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'First time Third Prize Winner', 'NATIONAL AWARD WINNER', 'ALL IN ONE IN INDIA', 'chaudhary_yatra16631451651ST_TIME___3RD.jpg', 'no', 'yes', '2022-09-14 08:46:04'),
(2, 'Second time second Prize Winner', 'NATIONAL AWARD WINNER', 'ALL IN ONE IN INDIA', 'chaudhary_yatra16631452132ND_TIME___2ND.jpg', 'no', 'yes', '2022-09-14 08:46:52'),
(3, 'Third time First Prize Winner', 'NATIONAL AWARD WINNER', 'ALL IN ONE IN INDIA', 'chaudhary_yatra16631452493ND_TIME___1ST.jpg', 'no', 'yes', '2022-09-14 08:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_link`
--

CREATE TABLE `social_media_link` (
  `id` int(11) NOT NULL,
  `social_media_link` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_media_link`
--

INSERT INTO `social_media_link` (`id`, `social_media_link`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'https://www.youtube.com/channel/UCSTgeACzSZkBgw83OdwcJLQ', 'chaudhary_yatra1669439321chaudhary_yatra1662978877CYC-5.png', 'no', 'yes', '2022-11-26 05:08:41'),
(2, 'https://www.instagram.com/choudharyyatracompanypvtltd/', 'chaudhary_yatra1669439339chaudhary_yatra1662978657CYC-1.png', 'no', 'yes', '2022-11-26 05:08:58'),
(3, 'https://www.youtube.com/channel/UCSTgeACzSZkBgw83OdwcJLQ', 'chaudhary_yatra1669439352chaudhary_yatra1662978685CYC-2.png', 'no', 'yes', '2022-11-26 05:09:11'),
(4, 'https://www.instagram.com/choudharyyatracompanypvtltd/', 'chaudhary_yatra1669439381chaudhary_yatra1662978718CYC-3.png', 'no', 'yes', '2022-11-26 05:09:40'),
(5, 'https://m.facebook.com/ChoudharyYatra/', 'chaudhary_yatra1669439396chaudhary_yatra1662978762CYC-4.png', 'no', 'yes', '2022-11-26 05:09:55'),
(6, 'https://www.youtube.com/channel/UCSTgeACzSZkBgw83OdwcJLQ', 'chaudhary_yatra1669439410chaudhary_yatra1662978614CYC.png', 'no', 'yes', '2022-11-26 05:10:10'),
(7, 'https://m.facebook.com/ChoudharyYatra/', 'chaudhary_yatra1669439669so1.jpeg', 'no', 'yes', '2022-11-26 05:14:29'),
(8, 'https://www.instagram.com/choudharyyatracompanypvtltd/', 'chaudhary_yatra1669439682so2.jpeg', 'no', 'yes', '2022-11-26 05:14:41'),
(9, 'https://www.youtube.com/channel/UCSTgeACzSZkBgw83OdwcJLQ', 'chaudhary_yatra1669439695so3.jpeg', 'no', 'yes', '2022-11-26 05:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `state_name` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL,
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_name`, `state_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '0', 'Maharastra', 'yes', 'yes', '2022-11-18 06:43:09'),
(2, '0', 'Maharastra', 'no', 'yes', '2022-11-18 08:44:52'),
(3, '0', 'Gujarat123', 'yes', 'yes', '2022-11-18 09:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `terms_conditions` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `terms_conditions`, `pdf`, `is_deleted`, `is_active`, `created_at`) VALUES
(4, '<p><span style=\"font-weight: 700;\">Terms Conditions</span><br></p>', 'chaudhary_yatra1663141365NIYAM___CYC.pdf', 'no', 'yes', '2022-09-14 07:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `tour_cancel_rules`
--

CREATE TABLE `tour_cancel_rules` (
  `id` int(11) NOT NULL,
  `rules` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_cancel_rules`
--

INSERT INTO `tour_cancel_rules` (`id`, `rules`, `pdf`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, '<p><span style=\"font-weight: 700;\">Tour cancel rules</span><br></p>', 'chaudhary_yatra1663143539Cancellation_NIYAM___CYC.pdf', 'no', 'yes', '2022-09-14 08:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guides`
--

CREATE TABLE `tour_guides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_guides`
--

INSERT INTO `tour_guides` (`id`, `name`, `designation`, `image_name`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'Shamesh Patel', 'Tour Guide', 'chaudhary_yatra1669026497g1.jpg', 'no', 'yes', '2022-11-21 10:28:16'),
(2, 'Pranav Patil', 'Manager', 'chaudhary_yatra1669439880Tour_guide-1.jpg', 'no', 'yes', '2022-11-26 05:18:00'),
(3, 'Shubhangi Mahajan', 'Team Lead', 'chaudhary_yatra1669439904Tour_guide-2.jpg', 'no', 'yes', '2022-11-26 05:18:23'),
(4, 'Vikas Kothawade', 'Tour Guide', 'chaudhary_yatra1669439955Tour_guide_-3.jpg', 'no', 'yes', '2022-11-26 05:19:14'),
(5, 'Shweta Tiwari', 'supervisor', 'chaudhary_yatra1669440044T_G-4.jpg', 'no', 'yes', '2022-11-26 05:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

CREATE TABLE `travelers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `website_basic_structure`
--

CREATE TABLE `website_basic_structure` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website_link` varchar(50) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `map` text NOT NULL,
  `is_deleted` enum('no','yes') NOT NULL DEFAULT 'no',
  `is_active` enum('no','yes') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website_basic_structure`
--

INSERT INTO `website_basic_structure` (`id`, `email`, `contact_number`, `location`, `website_link`, `company_name`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `image_name`, `short_description`, `map`, `is_deleted`, `is_active`, `created_at`) VALUES
(1, 'enq@choudhayyatra.co.in', '7588383838', 'Mumbai Naka, Bhabha Nagar, Nashik.', 'www.choudharyyatra.co.in', 'CHOUDHARY YATRA COMPANY PVT LTD', 'https://business.facebook.com/latest/home?asset_id=176728005737152', 'https://business.facebook.com/latest/home?asset_id=176728005737152', 'https://business.facebook.com/latest/home?asset_id=176728005737152', 'https://business.facebook.com/latest/home?asset_id=176728005737152', 'chaudhary_yatra166322586750x216_png_LOGO___cyco.png', 'Choudhary Yatra Company Pvt Ltd is Nashik based reliable name in tourism.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.549326245814!2d73.78431983292106!3d19.985446647758344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeb1b8d069849%3A0x8650696e6f0a5455!2sChoudhary%20Yatra%20Company!5e0!3m2!1sen!2sin!4v1663225604071!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"', 'no', 'yes', '2022-09-15 07:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_old`
--
ALTER TABLE `agent_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_percentage`
--
ALTER TABLE `agent_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_enquiry`
--
ALTER TABLE `booking_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_master`
--
ALTER TABLE `bus_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_reviews`
--
ALTER TABLE `client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_booking`
--
ALTER TABLE `confirm_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_features`
--
ALTER TABLE `core_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service_no_need`
--
ALTER TABLE `customer_service_no_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_information_no_need`
--
ALTER TABLE `delivery_information_no_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_old`
--
ALTER TABLE `department_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domestic_followup`
--
ALTER TABLE `domestic_followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domestic_package_review`
--
ALTER TABLE `domestic_package_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_booking_enquiry`
--
ALTER TABLE `international_booking_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_followup`
--
ALTER TABLE `international_followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_packages`
--
ALTER TABLE `international_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_packages_dates`
--
ALTER TABLE `international_packages_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_package_iternary`
--
ALTER TABLE `international_package_iternary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_agents`
--
ALTER TABLE `live_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_department`
--
ALTER TABLE `live_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category_no_need`
--
ALTER TABLE `main_category_no_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_new_old`
--
ALTER TABLE `packages_new_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_date`
--
ALTER TABLE `package_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_iternary`
--
ALTER TABLE `package_iternary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_mapping`
--
ALTER TABLE `package_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_policy_no_need`
--
ALTER TABLE `return_policy_no_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_reservation_rules`
--
ALTER TABLE `seat_reservation_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_link`
--
ALTER TABLE `social_media_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_cancel_rules`
--
ALTER TABLE `tour_cancel_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guides`
--
ALTER TABLE `tour_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travelers`
--
ALTER TABLE `travelers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_basic_structure`
--
ALTER TABLE `website_basic_structure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `agent_old`
--
ALTER TABLE `agent_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agent_percentage`
--
ALTER TABLE `agent_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_enquiry`
--
ALTER TABLE `booking_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_master`
--
ALTER TABLE `bus_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_reviews`
--
ALTER TABLE `client_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `confirm_booking`
--
ALTER TABLE `confirm_booking`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_features`
--
ALTER TABLE `core_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_service_no_need`
--
ALTER TABLE `customer_service_no_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_information_no_need`
--
ALTER TABLE `delivery_information_no_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department_old`
--
ALTER TABLE `department_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `domestic_followup`
--
ALTER TABLE `domestic_followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `domestic_package_review`
--
ALTER TABLE `domestic_package_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `international_booking_enquiry`
--
ALTER TABLE `international_booking_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `international_followup`
--
ALTER TABLE `international_followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `international_packages`
--
ALTER TABLE `international_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `international_packages_dates`
--
ALTER TABLE `international_packages_dates`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `international_package_iternary`
--
ALTER TABLE `international_package_iternary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `live_agents`
--
ALTER TABLE `live_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `live_department`
--
ALTER TABLE `live_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_category_no_need`
--
ALTER TABLE `main_category_no_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages_new_old`
--
ALTER TABLE `packages_new_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_date`
--
ALTER TABLE `package_date`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `package_iternary`
--
ALTER TABLE `package_iternary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_mapping`
--
ALTER TABLE `package_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_policy_no_need`
--
ALTER TABLE `return_policy_no_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_reservation_rules`
--
ALTER TABLE `seat_reservation_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media_link`
--
ALTER TABLE `social_media_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_cancel_rules`
--
ALTER TABLE `tour_cancel_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_guides`
--
ALTER TABLE `tour_guides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travelers`
--
ALTER TABLE `travelers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_basic_structure`
--
ALTER TABLE `website_basic_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
