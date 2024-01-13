-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 08:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `sender` int(100) NOT NULL,
  `reciever` int(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `reciever`, `message`, `type`, `file_path`, `timestamp`, `date`) VALUES
(1, 36322625, 79465752, 'hi', 'text', '', '2023-05-27 17:55:13', '2023-05-27'),
(2, 79465752, 36322625, 'hello', 'text', '', '2023-05-27 17:55:23', '2023-05-27'),
(4, 36322625, 79465752, '2jr5emw.jpg', 'image', 'uploads/18195120.jpg', '2023-05-27 18:09:48', '2023-05-27'),
(5, 79465752, 36322625, 'second.txt', 'document', 'uploads/44210276.txt', '2023-05-27 18:10:07', '2023-05-27'),
(6, 36322625, 79465752, 'hello', 'text', '', '2023-05-27 18:10:36', '2023-05-27'),
(7, 79465752, 36322625, 'hii', 'text', '', '2023-05-27 18:10:50', '2023-05-27'),
(8, 36322625, 79465752, 'opheem new.jpg', 'image', 'uploads/16724193.jpg', '2023-05-27 18:34:43', '2023-05-27'),
(9, 36322625, 79465752, 'hello', 'text', '', '2023-05-27 18:34:58', '2023-05-27'),
(10, 36322625, 79465752, 'hii', 'text', '', '2023-05-27 18:35:30', '2023-05-27'),
(11, 36322625, 79465752, 'hii', 'text', '', '2023-05-27 18:44:08', '2023-05-27'),
(12, 79465752, 36322625, 'hii', 'text', '', '2023-05-27 18:44:33', '2023-05-27'),
(13, 36322625, 79465752, 'hhhhhhhhh', 'text', '', '2023-05-27 18:44:46', '2023-05-27'),
(14, 79465752, 36322625, 'nav.txt', 'document', 'uploads/89868646.txt', '2023-05-27 18:54:17', '2023-05-27'),
(15, 79465752, 36322625, 'hii', 'text', '', '2023-05-28 07:47:08', '2023-05-28'),
(16, 79465752, 36322625, '2 nd feb.jpg', 'image', 'uploads/27335542.jpg', '2023-05-28 08:17:04', '2023-05-28'),
(17, 79465752, 36322625, 'settings.txt', 'document', 'uploads/51764021.txt', '2023-05-28 08:17:54', '2023-05-28'),
(18, 79465752, 36322625, '2 nd feb.jpg', 'image', 'uploads/48526165.jpg', '2023-05-28 08:35:19', '2023-05-28'),
(20, 79465752, 36322625, 'new video.mp4', 'video', 'uploads/32394771.mp4', '2023-05-28 08:51:16', '2023-05-28'),
(21, 79465752, 36322625, 'hiii', 'text', '', '2023-05-28 17:15:10', '2023-05-28'),
(22, 79465752, 36322625, 'tree', 'text', '', '2023-05-28 17:15:16', '2023-05-28'),
(23, 79465752, 36322625, 'Compile Module Video.mp4', 'video', 'uploads/30250207.mp4', '2023-05-28 17:41:33', '2023-05-28'),
(24, 79465752, 36322625, 'Compile Module Video.mp4', 'video', 'uploads/15930202.mp4', '2023-05-28 17:48:35', '2023-05-28'),
(25, 79465752, 36322625, 'Compile Module Video.mp4', 'video', 'uploads/53689687.mp4', '2023-05-28 17:49:58', '2023-05-28'),
(26, 79465752, 36322625, '😷🙊😎', 'text', '', '2023-05-29 06:16:13', '2023-05-29'),
(27, 79465752, 36322625, '😵', 'text', '', '2023-05-29 06:16:28', '2023-05-29'),
(28, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:16:43', '2023-05-29'),
(29, 79465752, 36322625, 'hello', 'text', '', '2023-05-29 06:18:40', '2023-05-29'),
(30, 79465752, 36322625, 'ok', 'text', '', '2023-05-29 06:18:59', '2023-05-29'),
(31, 79465752, 36322625, 'op', 'text', '', '2023-05-29 06:20:55', '2023-05-29'),
(32, 79465752, 36322625, 'hi', 'text', '', '2023-05-29 06:21:50', '2023-05-29'),
(33, 79465752, 36322625, 'rr', 'text', '', '2023-05-29 06:21:56', '2023-05-29'),
(34, 79465752, 36322625, 'lk', 'text', '', '2023-05-29 06:22:02', '2023-05-29'),
(35, 79465752, 36322625, '25oct9.jpg', 'image', 'uploads/22101443.jpg', '2023-05-29 06:22:36', '2023-05-29'),
(36, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:24:17', '2023-05-29'),
(37, 79465752, 36322625, 'ok', 'text', '', '2023-05-29 06:24:25', '2023-05-29'),
(38, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:25:25', '2023-05-29'),
(39, 79465752, 36322625, '😴', 'text', '', '2023-05-29 06:25:39', '2023-05-29'),
(40, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:26:37', '2023-05-29'),
(41, 79465752, 36322625, '🙆', 'text', '', '2023-05-29 06:27:24', '2023-05-29'),
(42, 79465752, 36322625, 'ko', 'text', '', '2023-05-29 06:27:34', '2023-05-29'),
(43, 79465752, 36322625, 'hhhhh', 'text', '', '2023-05-29 06:29:15', '2023-05-29'),
(44, 79465752, 36322625, 'ok', 'text', '', '2023-05-29 06:29:21', '2023-05-29'),
(45, 79465752, 36322625, 'll', 'text', '', '2023-05-29 06:29:26', '2023-05-29'),
(46, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:31:43', '2023-05-29'),
(47, 79465752, 36322625, '😷', 'text', '', '2023-05-29 06:31:55', '2023-05-29'),
(48, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:46:37', '2023-05-29'),
(49, 79465752, 36322625, '🙄', 'text', '', '2023-05-29 06:47:53', '2023-05-29'),
(50, 79465752, 36322625, 'yy', 'text', '', '2023-05-29 06:48:20', '2023-05-29'),
(51, 79465752, 36322625, 'hi', 'text', '', '2023-05-29 06:51:04', '2023-05-29'),
(52, 79465752, 36322625, 'ok', 'text', '', '2023-05-29 06:51:11', '2023-05-29'),
(53, 79465752, 36322625, '🙊', 'text', '', '2023-05-29 06:51:46', '2023-05-29'),
(54, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:52:52', '2023-05-29'),
(55, 79465752, 36322625, 'hello', 'text', '', '2023-05-29 06:53:02', '2023-05-29'),
(56, 79465752, 36322625, 'dr', 'text', '', '2023-05-29 06:55:14', '2023-05-29'),
(57, 79465752, 36322625, '😩', 'text', '', '2023-05-29 06:55:37', '2023-05-29'),
(58, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 06:56:43', '2023-05-29'),
(59, 79465752, 36322625, '😵', 'text', '', '2023-05-29 07:00:25', '2023-05-29'),
(60, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 07:00:33', '2023-05-29'),
(61, 79465752, 36322625, 'w', 'text', '', '2023-05-29 07:07:04', '2023-05-29'),
(62, 79465752, 36322625, '😷', 'text', '', '2023-05-29 07:08:01', '2023-05-29'),
(63, 79465752, 36322625, 'h', 'text', '', '2023-05-29 07:08:50', '2023-05-29'),
(64, 79465752, 36322625, 'koko', 'text', '', '2023-05-29 07:08:57', '2023-05-29'),
(65, 79465752, 36322625, 'hii', 'text', '', '2023-05-29 07:18:46', '2023-05-29'),
(66, 79465752, 36322625, '😎', 'text', '', '2023-05-29 07:19:21', '2023-05-29'),
(67, 79465752, 36322625, 'hii', 'text', '', '2023-05-30 16:18:02', '2023-05-30'),
(68, 40993784, 34963151, 'hiii', 'text', '', '2023-05-31 10:36:38', '2023-05-31'),
(69, 34963151, 40993784, 'hello', 'text', '', '2023-05-31 10:36:48', '2023-05-31'),
(70, 40993784, 34963151, 'close-up-portrait-smiling-young-bearded-man.jpg', 'image', 'uploads/87735604.jpg', '2023-05-31 10:37:11', '2023-05-31'),
(71, 40993784, 34963151, 'php.txt', 'document', 'uploads/17496235.txt', '2023-05-31 10:37:32', '2023-05-31'),
(72, 40993784, 34963151, '😴😳hihihiii', 'text', '', '2023-05-31 10:38:08', '2023-05-31'),
(73, 79465752, 96585899, 'hiiiii', 'text', '', '2023-05-31 10:49:22', '2023-05-31'),
(74, 96585899, 79465752, 'hello', 'text', '', '2023-05-31 10:49:50', '2023-05-31'),
(75, 96585899, 79465752, '😎', 'text', '', '2023-05-31 10:49:55', '2023-05-31'),
(76, 96585899, 79465752, 'pexels-ketut-subiyanto-4307869.jpg', 'image', 'uploads/26489695.jpg', '2023-05-31 10:50:09', '2023-05-31'),
(77, 51822464, 40993784, 'hii', 'text', '', '2023-08-09 08:15:11', '2023-08-09'),
(78, 47430361, 40993784, 'tgml', 'text', '', '2023-10-09 12:34:31', '2023-10-09'),
(79, 47430361, 96585899, 'tgml', 'text', '', '2023-10-09 12:34:55', '2023-10-09'),
(80, 96585899, 47430361, 'hello bro', 'text', '', '2023-10-09 12:35:05', '2023-10-09'),
(81, 47430361, 96585899, 'tgml', 'text', '', '2023-10-09 12:35:12', '2023-10-09'),
(82, 47430361, 96585899, 'instamd_white_logo.png', 'image', 'uploads/49760782.png', '2023-10-09 12:35:21', '2023-10-09'),
(83, 96585899, 47430361, '😎', 'text', '', '2023-10-09 12:35:21', '2023-10-09'),
(84, 47430361, 96585899, 'tgmhkl', 'text', '', '2023-10-09 12:35:30', '2023-10-09'),
(85, 96585899, 47430361, 'atb-poster.png', 'image', 'uploads/23357382.png', '2023-10-09 12:35:53', '2023-10-09'),
(86, 47430361, 96585899, '😬', 'text', '', '2023-10-09 12:36:12', '2023-10-09'),
(87, 47430361, 96585899, 'kya lavde', 'text', '', '2023-10-09 12:36:19', '2023-10-09'),
(88, 96585899, 47430361, 'gali mat do', 'text', '', '2023-10-09 12:36:37', '2023-10-09'),
(89, 96585899, 47430361, 'behave yourself', 'text', '', '2023-10-09 12:36:45', '2023-10-09'),
(90, 47430361, 96585899, 'kele', 'text', '', '2023-10-09 12:36:49', '2023-10-09'),
(91, 96585899, 47430361, 'Stamp-removebg-preview.png', 'image', 'uploads/16475281.png', '2023-10-09 12:37:03', '2023-10-09'),
(92, 47430361, 96585899, '628 498 517 - AnyDesk 2023-01-25 18-41-20.mp4', 'video', 'uploads/77204003.mp4', '2023-10-09 12:37:27', '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(255) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `reciever_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sender_id`, `reciever_id`, `status`) VALUES
(2, 79465752, 36322625, 'friend'),
(3, 96585899, 79465752, 'friend'),
(11, 79465752, 34963151, 'block'),
(12, 34963151, 40993784, 'block'),
(13, 40993784, 96585899, 'request'),
(14, 40993784, 51822464, 'friend'),
(15, 47430361, 96585899, 'block'),
(16, 47430361, 34963151, 'request'),
(17, 47430361, 51822464, 'request'),
(18, 47430361, 40993784, 'friend');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(260) NOT NULL,
  `pin` int(4) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `unique_id`, `name`, `email`, `password`, `image`, `pin`, `status`) VALUES
(5, 96585899, 'John', 'test@gmail.com', 'j', 'uploads/96585899.jpg', 9898, 'Offline'),
(6, 34963151, 'Adam', 'adam@gmail.com', 'a', 'uploads/34963151.png', 9898, 'Online'),
(7, 51822464, 'Chris Dev', 'chris@gmail.com', 'c', 'uploads/51822464.jpg', 1234, 'Online'),
(8, 40993784, 'Adam', 'pradnya.chaudhari.15@gmail.com', 'drd', 'uploads/16237748.jpg', 2222, 'Online'),
(9, 47430361, 'Chetan', 'chetan.pujari86@gmail.com', '52336837', 'uploads/47430361.png', 5233, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `email`, `code`) VALUES
(1, 'mandar@gmail.com', 2238),
(2, 'abc@gmail.com', 8400),
(3, 'r@gmail.com', 3026),
(4, 'd@gmail.com', 1245),
(13, 'pradnya.chaudhari.15@gmail.com', 4184),
(14, 'mkalangutkar13@gmail.com', 4299),
(15, 'mkalangutkar13@gmail.com', 9906),
(16, 'mkalangutkar13@gmail.com', 1057),
(17, 'mkalangutkar13@gmail.com', 4351),
(18, 'mkalangutkar13@gmail.com', 5449),
(19, 'mkalangutkar13@gmail.com', 8632),
(20, 'mkalangutkar13@gmail.com', 1456),
(21, 'mkalangutkar13@gmail.com', 7819),
(22, 'mkalangutkar13@gmail.com', 9232),
(23, 'mkalangutkar13@gmail.com', 5356),
(24, 'mk@gmail.com', 7878),
(25, 'mkalangutkar13@gmail.com', 4384),
(26, 'mkalangutkar13@gmail.com', 5924),
(27, 'mkalangutkar13@gmail.com', 9183),
(28, 'mkalangutkar13@gmail.com', 1118),
(29, 'mkalangutkar13@gmail.com', 3579),
(30, 'mkalangutkar13@gmail.com', 5281),
(31, 'mkalangutkar13@gmail.com', 4866),
(32, 'mkalangutkar13@gmail.com', 6524),
(33, 'mkalangutkar13@gmail.com', 6700),
(34, 'chetan.pujari86@gmail.com', 8192);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
