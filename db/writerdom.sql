-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 09:06 PM
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
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` bigint(20) NOT NULL,
  `tutor_id` text NOT NULL,
  `project_id` text NOT NULL,
  `student_id` text NOT NULL,
  `bid_amount` bigint(20) NOT NULL,
  `bid_fee` bigint(20) NOT NULL,
  `bid_total_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `tutor_id`, `project_id`, `student_id`, `bid_amount`, `bid_fee`, `bid_total_amount`) VALUES
(1, '9', '31', '12', 196, 20, 216),
(2, '9', '30', '12', 196, 20, 216),
(8, '9', '24', '12', 32, 4, 36),
(9, '9', '25', '12', 33, 4, 37),
(10, '9', '26', '12', 34, 4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `user_type` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_sent` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `tutor_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`user_type`, `message`, `date_sent`, `project_id`, `status`, `student_id`, `tutor_id`) VALUES
(2, 'jjj', '2019-02-14 21:58:27', 14, 1, 12, 9),
(1, 'plis be quick', '2019-02-14 21:59:42', 14, 1, 12, 9),
(2, 'okay i will', '2019-02-14 22:00:07', 14, 1, 12, 9),
(1, 'hello there', '2019-02-19 12:44:27', 15, 1, 12, 9),
(2, 'i\'m fine', '2019-02-19 12:44:35', 15, 1, 12, 9),
(1, 'hello', '2019-02-19 13:07:10', 15, 1, 12, 9),
(1, 'hheee', '2019-02-19 13:07:23', 15, 1, 12, 9),
(2, 'heheheh', '2019-02-19 13:21:08', 16, 1, 12, 9),
(2, 'hello there', '2019-02-28 10:06:25', 22, 1, 12, 9),
(1, 'how are you today wilson', '2019-02-28 10:31:52', 22, 1, 12, 9),
(1, 'holla\n', '2019-02-28 10:33:14', 22, 1, 12, 9),
(2, 'that\'s life mehn', '2019-02-28 11:51:02', 22, 1, 12, 9),
(2, 'just uploaded a draft', '2019-02-28 11:52:23', 22, 1, 12, 9),
(1, 'okay boy', '2019-02-28 11:53:42', 22, 1, 12, 9),
(2, 'okay girl', '2019-02-28 11:54:03', 22, 1, 12, 9),
(1, 'holla\n', '2019-02-28 12:07:06', 22, 1, 12, 9),
(1, 'hello there', '2019-03-05 09:17:24', 41, 1, 12, 9),
(2, 'very fine', '2019-03-05 09:20:30', 41, 1, 12, 9),
(1, 'how is the going', '2019-03-05 09:20:46', 41, 1, 12, 9),
(1, 'i saw the order', '2019-03-05 09:20:56', 41, 1, 12, 9),
(2, 'yeah i worked on it perfectly well', '2019-03-05 09:21:18', 41, 1, 12, 9),
(2, 'and thanks a lot for the assing', '2019-03-05 09:21:34', 41, 1, 12, 9),
(1, 'i didn\'t at all like what you did', '2019-03-05 10:06:03', 20, 0, 12, 9),
(1, 'hello there', '2019-03-08 09:01:38', 17, 1, 12, 9),
(2, 'hello back i\'m very fine', '2019-03-08 09:03:26', 17, 1, 12, 9),
(1, 'that\'s good to hear', '2019-03-08 09:03:39', 17, 1, 12, 9),
(2, 'ghghghghyty', '2019-03-08 12:29:33', 19, 1, 12, 9),
(2, 'ghghghghyty', '2019-03-08 12:29:34', 19, 1, 12, 9),
(2, 'ghghghghyty', '2019-03-08 12:29:35', 19, 1, 12, 9),
(2, 'ghghghghyty', '2019-03-08 12:29:35', 19, 1, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `closed`
--

CREATE TABLE `closed` (
  `comment` text NOT NULL,
  `rating` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `tutor_id` int(255) NOT NULL,
  `date_closed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed`
--

INSERT INTO `closed` (`comment`, `rating`, `project_id`, `student_id`, `tutor_id`, `date_closed`) VALUES
('excellent', 2, 14, 12, 9, '14-02-2019 10:10:26 PM'),
('hrhrhr', 4, 15, 12, 9, '19-02-2019 01:10:24 PM'),
('owesome...', 0, 22, 12, 9, '28-02-2019 12:09:22 PM'),
('Awesome', 9, 28, 12, 9, '28-02-2019 09:54:12 PM'),
('weldone boy', 3, 40, 12, 9, '04-03-2019 01:36:54 PM'),
('hello world', 10, 37, 12, 9, '04-03-2019 11:58:29 PM'),
('wow great work', 7, 16, 12, 9, '08-03-2019 09:05:17 AM'),
('perfect work', 7, 21, 12, 9, '08-03-2019 09:05:49 AM'),
('hththt', 4, 19, 12, 9, '08-03-2019 12:33:14 PM');

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `project_num` int(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `tutor_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `note_num` int(11) NOT NULL,
  `user_type` varchar(212) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`note_num`, `user_type`, `note`) VALUES
(1, '1', 'User ID: 12 posted project ID: 44 at 2019-02-28 15:59:20pm'),
(2, '1', 'User ID: 12 posted project ID: 45 at 2019-02-28 16:01:55pm'),
(3, '1', 'User ID: 12 posted project ID: 46 at 2019-02-28 16:04:38pm'),
(4, '3', 'You posted project ID: 46 at 2019-02-28 16:04:38pm'),
(5, '1', 'Student Id: 12 deleted project id: 45 at 2019-02-28 16:21:02'),
(6, '1', 'Student Id: 12 deleted project id: 42 at 2019-02-28 16:21:34'),
(7, '1', 'You deleted project id: 42 at 2019-02-28 16:21:34'),
(8, '1', 'Student Id: 12 deleted project id: 34 at 2019-02-28 16:22:12'),
(9, '2', 'You deleted project id: 34 at 2019-02-28 16:22:12'),
(10, '1', 'Student Id: 12 deleted project id: 33 at 2019-02-28 16:22:44'),
(11, '3', 'You deleted project id: 33 at 2019-02-28 16:22:44'),
(12, '1', 'Student Id: 12 edited project id: 28 at 2019-02-28 16:28:41pm'),
(13, '3', 'You Edited project id: 28 at 2019-02-28 16:28:41pm'),
(14, '1', 'Student Id: 12 assigned project id: 28to Tutor id:9 at 2019-02-28 16:59:27'),
(15, '3', 'You Assigned project id: 28 to Tutor id:9 at 2019-02-28 16:59:27'),
(16, '1', 'Student Id: 12 assigned project id: 46 to Tutor id:9 at 2019-02-28 17:15:33'),
(17, '3', 'You Assigned project id: 46 to Tutor id:9 at 2019-02-28 17:15:33'),
(18, '1', 'Student Id: 12 assigned project id: 41 to Tutor id:9 at 2019-02-28 17:20:43'),
(19, '3', 'You Assigned project id: 41 to Tutor id:9 at 2019-02-28 17:20:43'),
(20, '1', 'Student Id: 12 assigned project id: 40 to Tutor id:9 at 2019-02-28 17:25:05'),
(21, '3', 'You Assigned project id: 40 to Tutor id:9 at 2019-02-28 17:25:05'),
(22, '1', 'Student Id: 12 sent project id: 21 back for revision at 2019-02-28 21:48:04'),
(23, '3', 'You sent project id: 21 back for revision at 2019-02-28 21:48:04'),
(24, '1', 'Student Id: 12 approved project id: 28 on 2019-02-28 21:54:12'),
(25, '3', 'You approved project id: 28 on 2019-02-28 21:54:12'),
(26, '1', 'Student Id: 12 edited project id: 39 at 2019-02-28 22:20:19pm'),
(27, '3', 'You Edited project id: 39 at 2019-02-28 22:20:19pm'),
(28, '1', 'Student Id: 12 deleted project id: 39 at 2019-02-28 22:20:33'),
(29, '3', 'You deleted project id: 39 at 2019-02-28 22:20:33'),
(30, '1', 'Student Id: 12 edited project id: 37 at 2019-03-02 21:08:48pm'),
(31, '3', 'You Edited project id: 37 at 2019-03-02 21:08:48pm'),
(32, '2', 'User ID: 9 has placed a bid for project ID: 37 at 2019-03-02 21:24:05bid amnt: 216'),
(33, '3', 'You have placed a bid for project ID: 37 at 2019-03-02 21:24:05bid amnt: 216'),
(34, '2', 'User ID: 9 has deleted his bid for project ID: 37 at 2019-03-02 21:25:37'),
(35, '3', 'You have deleted your bid for project ID: 37 at 2019-03-02 21:25:37'),
(36, '2', 'Tutor ID: 9 has submited a draft for project ID: 20 at 2019-03-02 21:34:00'),
(37, '3', 'You have submited a draft for project ID: 20 at 2019-03-02 21:34:00'),
(38, '2', 'Tutor ID: 9 has submited a final results for project ID: 20 at 2019-03-02 21:34:40'),
(39, '3', 'You have submited final results for project ID: 20 at 2019-03-02 21:34:40'),
(40, '2', 'Tutor ID: 9 has submited draft revision results for project ID: 16 at 2019-03-02 21:55:05'),
(41, '3', 'You have submited draft revision results for project ID: 16 at 2019-03-02 21:55:05'),
(42, '2', 'Tutor ID: 9 has submited final revision results for project ID: 16 at 2019-03-02 21:55:22'),
(43, '3', 'You have submited final revision results for project ID: 16 at 2019-03-02 21:55:22'),
(44, '2', 'Tutor ID: 9 has placed a bid for project ID: 37 at 2019-03-03 17:41:40bid amnt: 216'),
(45, '3', 'You have placed a bid for project ID: 37 at 2019-03-03 17:41:40bid amnt: 216'),
(46, '2', 'Tutor ID: 9 has deleted his bid for project ID: 37 at 2019-03-03 17:42:06'),
(47, '3', 'You have deleted your bid for project ID: 37 at 2019-03-03 17:42:06'),
(48, '2', 'Tutor ID: 9 has placed a bid for project ID: 37 at 2019-03-03 17:42:12bid amnt: 216'),
(49, '3', 'You have placed a bid for project ID: 37 at 2019-03-03 17:42:12bid amnt: 216'),
(50, '1', 'Student Id: 12 assigned project id: 37 to Tutor id:9 at 2019-03-03 17:47:12'),
(51, '3', 'You Assigned project id: 37 to Tutor id:9 at 2019-03-03 17:47:12'),
(52, '2', 'Tutor ID: 9 has submited final results for project ID: 40 at 2019-03-04 13:35:57'),
(53, '3', 'You have submited final results for project ID: 40 at 2019-03-04 13:35:57'),
(54, '1', 'Student Id: 12 approved project id: 40 on 2019-03-04 13:36:54'),
(55, '3', 'You approved project id: 40 on 2019-03-04 13:36:54'),
(56, '1', 'Student Id: 12 sent project id: 16 back for revision at 2019-03-04 13:38:16'),
(57, '3', 'You sent project id: 16 back for revision at 2019-03-04 13:38:16'),
(58, '2', 'Tutor ID: 9 has submited final revision results for project ID: 16 at 2019-03-04 13:39:18'),
(59, '3', 'You have submited final revision results for project ID: 16 at 2019-03-04 13:39:18'),
(60, '2', 'Tutor ID: 9 has submited draft revision results for project ID: 21 at 2019-03-04 13:50:18'),
(61, '3', 'You have submited draft revision results for project ID: 21 at 2019-03-04 13:50:18'),
(62, '2', 'Tutor ID: 9 has submited draft revision results for project ID: 21 at 2019-03-04 13:50:52'),
(63, '3', 'You have submited draft revision results for project ID: 21 at 2019-03-04 13:50:52'),
(64, '2', 'Tutor ID: 9 has submited draft revision results for project ID: 21 at 2019-03-04 13:52:48'),
(65, '3', 'You have submited draft revision results for project ID: 21 at 2019-03-04 13:52:48'),
(66, '2', 'Tutor ID: 9 has submited final revision results for project ID: 21 at 2019-03-04 14:05:58'),
(67, '3', 'You have submited final revision results for project ID: 21 at 2019-03-04 14:05:58'),
(68, '2', 'Tutor ID: 9 has submited a draft for project ID: 37 at 2019-03-04 14:10:19'),
(69, '3', 'You have submited a draft for project ID: 37 at 2019-03-04 14:10:19'),
(70, '2', 'Tutor ID: 9 has submited a draft for project ID: 37 at 2019-03-04 14:12:29'),
(71, '3', 'You have submited a draft for project ID: 37 at 2019-03-04 14:12:29'),
(72, '2', 'Tutor ID: 9 has submited final results for project ID: 37 at 2019-03-04 14:12:48'),
(73, '3', 'You have submited final results for project ID: 37 at 2019-03-04 14:12:48'),
(74, '1', 'Student Id: 12 approved project id: 37 on 2019-03-04 23:58:29'),
(75, '3', 'You approved project id: 37 on 2019-03-04 23:58:29'),
(76, '2', 'Tutor ID: 9 has submited a draft for project ID: 41 at 2019-03-05 09:24:01'),
(77, '3', 'You have submited a draft for project ID: 41 at 2019-03-05 09:24:01'),
(78, '1', 'Student Id: 12 sent project id: 20 back for revision at 2019-03-05 09:57:05'),
(79, '3', 'You sent project id: 20 back for revision at 2019-03-05 09:57:05'),
(80, '1', 'Student ID: 12 posted project ID: 47 at 2019-03-08 08:41:37am'),
(81, '3', 'You posted project ID: 47 at 2019-03-08 08:41:37am'),
(82, '1', 'Student ID: 12 posted project ID: 48 at 2019-03-08 08:42:30am'),
(83, '3', 'You posted project ID: 48 at 2019-03-08 08:42:30am'),
(84, '1', 'Student Id: 12 edited project id: 17 at 2019-03-08 08:44:38am'),
(85, '3', 'You Edited project id: 17 at 2019-03-08 08:44:38am'),
(86, '1', 'Student Id: 12 edited project id: 23 at 2019-03-08 08:45:50am'),
(87, '3', 'You Edited project id: 23 at 2019-03-08 08:45:50am'),
(88, '1', 'Student Id: 12 edited project id: 24 at 2019-03-08 08:46:31am'),
(89, '3', 'You Edited project id: 24 at 2019-03-08 08:46:31am'),
(90, '1', 'Student Id: 12 edited project id: 25 at 2019-03-08 08:47:07am'),
(91, '3', 'You Edited project id: 25 at 2019-03-08 08:47:07am'),
(92, '1', 'Student Id: 12 edited project id: 26 at 2019-03-08 08:48:01am'),
(93, '3', 'You Edited project id: 26 at 2019-03-08 08:48:01am'),
(94, '1', 'Student Id: 12 edited project id: 27 at 2019-03-08 08:49:17am'),
(95, '3', 'You Edited project id: 27 at 2019-03-08 08:49:17am'),
(96, '1', 'Student Id: 12 edited project id: 29 at 2019-03-08 08:50:17am'),
(97, '3', 'You Edited project id: 29 at 2019-03-08 08:50:17am'),
(98, '1', 'Student Id: 12 edited project id: 30 at 2019-03-08 08:51:08am'),
(99, '3', 'You Edited project id: 30 at 2019-03-08 08:51:08am'),
(100, '1', 'Student Id: 12 edited project id: 31 at 2019-03-08 08:52:05am'),
(101, '3', 'You Edited project id: 31 at 2019-03-08 08:52:05am'),
(102, '1', 'Student Id: 12 edited project id: 32 at 2019-03-08 08:52:56am'),
(103, '3', 'You Edited project id: 32 at 2019-03-08 08:52:56am'),
(104, '2', 'Tutor ID: 9 has placed a bid for project ID: 17 at 2019-03-08 08:54:26bid amnt: 36'),
(105, '3', 'You have placed a bid for project ID: 17 at 2019-03-08 08:54:26bid amnt: 36'),
(106, '2', 'Tutor ID: 9 has placed a bid for project ID: 23 at 2019-03-08 08:55:28bid amnt: 36'),
(107, '3', 'You have placed a bid for project ID: 23 at 2019-03-08 08:55:28bid amnt: 36'),
(108, '2', 'Tutor ID: 9 has placed a bid for project ID: 24 at 2019-03-08 08:55:49bid amnt: 36'),
(109, '3', 'You have placed a bid for project ID: 24 at 2019-03-08 08:55:49bid amnt: 36'),
(110, '2', 'Tutor ID: 9 has placed a bid for project ID: 25 at 2019-03-08 08:56:22bid amnt: 37'),
(111, '3', 'You have placed a bid for project ID: 25 at 2019-03-08 08:56:22bid amnt: 37'),
(112, '2', 'Tutor ID: 9 has placed a bid for project ID: 26 at 2019-03-08 08:56:40bid amnt: 38'),
(113, '3', 'You have placed a bid for project ID: 26 at 2019-03-08 08:56:40bid amnt: 38'),
(114, '1', 'Student Id: 12 assigned project id: 17 to Tutor id:9 at 2019-03-08 09:00:37'),
(115, '3', 'You Assigned project id: 17 to Tutor id:9 at 2019-03-08 09:00:37'),
(116, '1', 'Student Id: 12 approved project id: 16 on 2019-03-08 09:05:17'),
(117, '3', 'You approved project id: 16 on 2019-03-08 09:05:17'),
(118, '1', 'Student Id: 12 approved project id: 21 on 2019-03-08 09:05:49'),
(119, '3', 'You approved project id: 21 on 2019-03-08 09:05:49'),
(120, '1', 'Student Id: 12 assigned project id: 23 to Tutor id:9 at 2019-03-08 12:27:40'),
(121, '3', 'You Assigned project id: 23 to Tutor id:9 at 2019-03-08 12:27:40'),
(122, '2', 'Tutor ID: 9 has submited final results for project ID: 19 at 2019-03-08 12:30:22'),
(123, '3', 'You have submited final results for project ID: 19 at 2019-03-08 12:30:22'),
(124, '1', 'Student Id: 12 approved project id: 19 on 2019-03-08 12:33:14'),
(125, '3', 'You approved project id: 19 on 2019-03-08 12:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `on_progress`
--

CREATE TABLE `on_progress` (
  `project_num` int(11) NOT NULL,
  `project_id` varchar(212) NOT NULL,
  `student_id` varchar(212) NOT NULL,
  `tutor_id` varchar(212) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_progress`
--

INSERT INTO `on_progress` (`project_num`, `project_id`, `student_id`, `tutor_id`) VALUES
(12, '18', '12', '9'),
(15, '46', '12', '9'),
(16, '41', '12', '9'),
(19, '17', '12', '9'),
(20, '23', '12', '9');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `payment_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`payment_date`) VALUES
('1553334350');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `item_no` text NOT NULL,
  `transaction_id` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_status` text NOT NULL,
  `invoice_id` text NOT NULL,
  `createdtime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`item_no`, `transaction_id`, `payment_amount`, `payment_status`, `invoice_id`, `createdtime`) VALUES
('21', 'PAYID-LR3C4PY7AT285626W1330105', '36.00', 'approved', '5c762e38d7956', '2019-02-27 09:30:01'),
('20', 'PAYID-LR3C57Q0U409251E0001884X', '116.00', 'approved', '5c762ef92e2b5', '2019-02-27 09:33:05'),
('19', 'PAYID-LR3DBEA2VA824938D182481K', '36.00', 'approved', '5c7630885c69f', '2019-02-27 09:40:06'),
('18', 'PAYID-LR3DPQQ34C83707F5605610J', '36.00', 'approved', '5c7637bc31794', '2019-02-27 10:10:33'),
('22', 'PAYID-LR3D7CY4YN89614K7538071G', '36.00', 'approved', '5c763f83a5813', '2019-02-27 10:45:44'),
('28', 'PAYID-LR36RZQ24A328525P468773B', '36.00', 'approved', '5c77e8ddc939d', '2019-02-28 16:59:40'),
('46', 'PAYID-LR36ZSI46Y7545816359432F', '36.00', 'approved', '5c77ecc2c1cf7', '2019-02-28 17:15:46'),
('41', 'PAYID-LR364DY53F42632L31768522', '216.00', 'approved', '5c77ee09b87bc', '2019-02-28 17:20:57'),
('40', 'PAYID-LR3655Q4MV37144YT0768213', '216.00', 'approved', '5c77eeefdeef1', '2019-02-28 17:25:16'),
('37', 'PAYID-LR56QGI99W23744RX255664E', '216.00', 'approved', '5c7be8140f6eb', '2019-03-03 17:47:23'),
('17', 'PAYID-LSBAJNQ4KJ28964K91335245', '36.00', 'approved', '5c8204af63dd1', '2019-03-08 09:00:49'),
('23', 'PAYID-LSBDKIQ0FF87965SD4211646', '36.00', 'approved', '5c82351667b75', '2019-03-08 12:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `deadline` text NOT NULL,
  `subject` text NOT NULL,
  `instructions` longtext NOT NULL,
  `style` text NOT NULL,
  `type_of_paper` text NOT NULL,
  `pages` tinyint(11) NOT NULL,
  `slides` tinyint(11) NOT NULL,
  `problems` tinyint(11) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `charges` varchar(255) NOT NULL DEFAULT '0',
  `cost` varchar(255) NOT NULL DEFAULT '0',
  `bids` tinyint(100) NOT NULL DEFAULT '0',
  `academic_level` text NOT NULL,
  `sources` tinyint(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `DATE_CREATED` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `student_id`, `title`, `deadline`, `subject`, `instructions`, `style`, `type_of_paper`, `pages`, `slides`, `problems`, `budget`, `charges`, `cost`, `bids`, `academic_level`, `sources`, `status`, `DATE_CREATED`) VALUES
(14, 12, 'rules of the game', '1550257165', 'Accounting', '<p>Sharing third party communication methods (including emails,&nbsp; you s,phone numbers, and Skype address)pp</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$750', '525', '578', 2, 'College', 0, 5, '1550169712'),
(15, 12, 'bserve this. See our T.O.S', '1551173083', 'Accounting', '<p>munication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Article Critique/Review', 1, 1, 1, '$150', '105', '116', 1, 'College', 0, 5, '1550568283'),
(16, 12, 'java program', '1551868696', 'Accounting', '<p>munication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 9, 1, '$150', '105', '116', 1, 'College', 0, 5, '1550571153'),
(17, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1552805078', 'Accounting', '<p>haring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 1, '$45', '32', '36', 3, 'College', 0, 1, '1550665203'),
(18, 12, 'mhjv', '1551554459', 'Accounting', '<p>help me</p>\r\n', 'APA', 'Admission Essay', 1, 1, 1, '$45', '32', '36', 2, 'College', 2, 1, '1550677182'),
(19, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1551384182', 'Accounting', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$45', '32', '36', 2, 'College', 1, 5, '1551209284'),
(20, 12, 'bserve this. See our T.O.S', '1551956225', 'Accounting', '<p>http://localhost/writerdom/tutor/in-progress</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$150', '105', '116', 2, 'College', 0, 3, '1551209635'),
(21, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1551466084', 'Accounting', '<p>http://localhost/writerdom/tutor/in-progress</p>\r\n', 'APA', 'Admission Essay', 4, 3, 3, '$45', '32', '36', 3, 'College', 3, 5, '1551209839'),
(22, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1551297713', 'Accounting', '<p>http://localhost/writerdom/tutor/in-progress ls, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.</p>\r\n', 'APA', 'Admission Essay', 7, 76, 6, '$45', '32', '36', 2, 'College', 5, 5, '1551210112'),
(23, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1552628750', 'Anthropology', '<p>hello wilson is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 1, 1, '$45', '32', '36', 1, 'Undergraduate', 0, 1, '1551356415'),
(24, 12, 'Sharing third party communication methods (including emails,  you s,phone numbers, and Skype address)', '1552106791', 'Anthropology', '<p>hello wilson is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 1, 1, '$45', '0', '0', 1, 'Undergraduate', 0, 0, '1551356505'),
(25, 12, 'Project is Live and Open for Bidding', '1552200427', 'Architecture', '<p>ring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 0, 1, '$45', '0', '0', 1, 'Masters', 0, 0, '1551356561'),
(26, 12, 'Project is Live and Open for Bidding', '1552463281', 'Architecture', '<p>ring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 0, 1, '$45', '0', '0', 1, 'Masters', 0, 0, '1551356636'),
(27, 12, 'Project is Live and Open for Bidding', '1552456157', 'Architecture', '<p>ring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 0, 1, '$45', '0', '0', 0, 'Masters', 0, 0, '1551356658'),
(28, 12, 'Project is Live and Open for Bidding', '1551443321', 'Architecture', '<p>ring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 0, 1, '$45', '32', '36', 1, 'Masters', 2, 5, '1551356680'),
(29, 12, 'Project is Live and Open for Bidding', '1552297817', 'Architecture', '<p>ring third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 0, 1, '$45', '0', '0', 0, 'Masters', 0, 0, '1551356758'),
(30, 12, 'Project is Live and Open for Bidding', '1552888268', 'Architecture', '<p>$user_type$user_type$user_type$user_type$user_type$user_type$user_type$user_type</p>\r\n', 'Oscola', 'Editing', 0, 1, 1, '$150', '0', '0', 1, 'Masters', 1, 0, '1551357037'),
(31, 12, 'hello world', '1552456325', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$150', '0', '0', 1, 'College', 0, 0, '1551357362'),
(32, 12, 'hello world', '1552629176', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$150', '0', '0', 0, 'College', 0, 0, '1551357458'),
(35, 12, 'hello world', '1551533938', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$280', '0', '0', 0, 'College', 0, 0, '1551357538'),
(36, 12, 'hello world', '1551533978', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$280', '0', '0', 0, 'College', 0, 0, '1551357578'),
(37, 12, 'hello world', '1551895728', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 6, '$280', '196', '216', 1, 'College', 0, 5, '1551357607'),
(40, 12, 'hello world', '1551534864', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$280', '196', '216', 1, 'College', 0, 5, '1551358464'),
(41, 12, 'hello world', '1551534950', 'Agricultural Studies', '<p>Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 1, 0, 0, '$280', '196', '216', 1, 'College', 0, 1, '1551358550'),
(46, 12, 'Project is Live and Open for Bidding', '1551445478', 'Anthropology', '<p>&nbsp;$querys=&quot;INSERT INTO notifications(user_type, note) VALUES(&#39;$user_type&#39;,&#39;$note&#39;)&quot;;<br />\r\n&nbsp; $db-&gt;query($querys); Sharing third party communication methods (including emails, phone numbers, and Skype address) is against our user guidelines and we shall therefore NOT be held liable failure to observe this. See our T.O.S</p>\r\n', 'APA', 'Admission Essay', 0, 1, 0, '$45', '32', '36', 1, 'College', 0, 1, '1551359078'),
(47, 12, 'hello there my name is', '1552293697', 'Accounting', '<p>https://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUe</p>\r\n', 'APA', 'Admission Essay', 1, 0, 1, '$45', '0', '0', 0, 'College', 0, 0, '1552023697'),
(48, 12, 'Project is Live and Open for Bidding', '1552196550', 'Architecture', '<p>https://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUehttps://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUehttps://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUehttps://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUehttps://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUehttps://www.youtube.com/watch?v=YbTu_4scuIQ&amp;list=PLEXedA_rYzg_AHAVHOqFqdGefP6HxtcUe</p>\r\n', 'MLA', 'Admission Essay', 2, 0, 0, '$45', '0', '0', 0, 'College', 0, 0, '1552023750');

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `student_id` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `tutor_id` varchar(255) NOT NULL,
  `revision_instructions` text NOT NULL,
  `revision_deadline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisions`
--

INSERT INTO `revisions` (`student_id`, `project_id`, `tutor_id`, `revision_instructions`, `revision_deadline`) VALUES
('12', '20', '9', '<p>poorly&nbsp; done instructions, not at all followed</p>\r\n', '1551956225');

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
  `orders_complited` bigint(20) NOT NULL DEFAULT '0',
  `dues` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `type`, `verified`, `verif_key`, `created_on`, `status`, `rating`, `orders_complited`, `dues`) VALUES
(9, 'kasuku', 'kasuku96@gmail.com', '$2y$10$CTebPZT4sV8HQlhpLlPUFuzEmYtKKYbrtRItjD3vyneE8iDRpaNii', 2, 1, 'DrErbXmJtZkxJKsOVXaD9ZgYZ22azu', '2018-12-18 21:14:33pm', 1, 10, 0, '0'),
(12, 'wilson', 'gatheruwilson@gmail.com', '$2y$10$Eg3pmti55Q0KrqaC2gHs4ukbt5T1gYguzw9eQ/S8gwtTwmrjSmifG', 1, 0, '8ZjQ0WkpUKgrzeCgr9bhaLkwJVKTeq', '2018-12-18 21:29:00pm', 1, 0, 0, '0'),
(13, 'admin', 'hustlemail96@gmail.com', '$2y$10$Rvqk.OtJ/uwV3WXKl50bo.mcHL0l2.ZMhF2669k6ESNmzpJ3PaL82', 3, 1, 'vpQvhbS54XXeHkc6KD28h.Iq9gXlJ/', '2019-01-06 17:43:37pm', 1, 3, 0, '0'),
(14, 'jymo', 'james.dilligan@gmail.com', '$2y$10$EFwexGsGCQTC2g5wdDYi.e6195XhsbTuXEGjaoYLOsNuUVaONrJj.', 2, 1, 'wDFp8WXJKwAUFc5zh4MMAi6Zb/Zlvt', '2019-03-03 13:08:37pm', 0, 0, 0, '0'),
(19, 'gerald', 'gerald@gmail.com', '$2y$10$T.DzskpulouuVspTAHUDdOVtmh054rqN5RaKgKudcvAbxskJKeoca', 2, 0, '6lcOCqxSZmSnOihpCNsIvpHdHPB2W7', '2019-03-05 09:18:53am', 1, 0, 0, '0'),
(20, 'test1', 'test1@gmail.com', '$2y$10$y8Vv4Ae0Hx17INF/QemhHeMLuq9DtBJSbYImuQ/eoch1FN2OYMCg2', 1, 0, 'a9IKQaHqaEWIjOFPA5ZuylzUzT/xEG', '2019-03-10 13:48:29pm', 1, 0, 0, '0'),
(21, 'tutortest', 'tutor1@gmail.com', '$2y$10$fg18oVRr6Iqub68r.ZCuRuCJ8qYLbmLcYZRmmO3EU8/f/C.Xrh3Km', 2, 0, 'a/WPH6ScxGwVAbCIXcLJ6teCUC.UYK', '2019-03-10 14:38:37pm', 1, 0, 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`project_num`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`note_num`);

--
-- Indexes for table `on_progress`
--
ALTER TABLE `on_progress`
  ADD PRIMARY KEY (`project_num`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `project_num` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `note_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `on_progress`
--
ALTER TABLE `on_progress`
  MODIFY `project_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
