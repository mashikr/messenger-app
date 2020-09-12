-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2020 at 01:43 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `type`, `seen`, `time`) VALUES
(124, 12, 11, 'hi bro', 'text', 1, '2020-09-12 09:21:14'),
(125, 11, 12, 'hlw bro', 'text', 1, '2020-09-12 09:21:28'),
(126, 12, 11, 'asset/imoji/emoji-1.png', 'emoji', 1, '2020-09-12 09:21:33'),
(127, 11, 12, 'asset/imoji/emoji-2.png', 'emoji', 1, '2020-09-12 09:21:36'),
(128, 12, 11, 'IMG_3833crop.jpg', 'image', 1, '2020-09-12 09:21:44'),
(129, 11, 12, 'mypic2.PNG', 'image', 1, '2020-09-12 09:21:53'),
(130, 12, 11, 'Every Night In My Dreams See You And Feel You.mp3', 'audio', 1, '2020-09-12 09:22:02'),
(131, 11, 12, 'Every Night In My Dreams See You And Feel You.mp3', 'audio', 1, '2020-09-12 09:22:23'),
(132, 12, 11, 'bg-video.mp4', 'video', 1, '2020-09-12 09:22:33'),
(133, 11, 12, 'bg-video.mp4', 'video', 1, '2020-09-12 09:22:53'),
(134, 12, 11, 'English cv.pdf', 'pdf', 1, '2020-09-12 09:24:57'),
(135, 11, 12, 'English cv.pdf', 'pdf', 1, '2020-09-12 09:25:43'),
(136, 12, 11, 'English cv.docx', 'doc', 1, '2020-09-12 09:26:13'),
(137, 11, 12, 'English cv.docx', 'doc', 1, '2020-09-12 09:26:33'),
(138, 12, 11, 'cmd command.txt', 'txt', 1, '2020-09-12 09:27:10'),
(139, 11, 12, 'cmd command.txt', 'txt', 1, '2020-09-12 09:27:22'),
(140, 12, 11, 'September Mess Meal.xlsx', 'excel', 1, '2020-09-12 09:27:43'),
(141, 11, 12, 'September Mess Meal.xlsx', 'excel', 1, '2020-09-12 09:27:56'),
(142, 12, 11, 'Group-1 (Ashik,Tuhin,Towhid).pptx', 'ppt', 1, '2020-09-12 09:28:15'),
(143, 11, 12, 'Group-1 (Ashik,Tuhin,Towhid).pptx', 'ppt', 1, '2020-09-12 09:28:31'),
(144, 11, 12, 'asset/imoji/emoji-4.png', 'emoji', 1, '2020-09-12 09:31:18'),
(145, 12, 11, 'asset/imoji/emoji-2.png', 'emoji', 1, '2020-09-12 09:31:59'),
(146, 11, 12, 'asset/imoji/emoji-6.png', 'emoji', 1, '2020-09-12 09:32:09'),
(147, 13, 11, 'asset/imoji/emoji-1.png', 'emoji', 1, '2020-09-12 09:33:55'),
(148, 11, 13, 'asset/imoji/emoji-2.png', 'emoji', 1, '2020-09-12 09:34:04'),
(149, 13, 11, 'asset/imoji/emoji-2.png', 'emoji', 1, '2020-09-12 09:39:58'),
(150, 13, 11, 'asset/imoji/emoji-3.png', 'emoji', 1, '2020-09-12 09:40:01'),
(151, 12, 11, 'asset/imoji/emoji-2.png', 'emoji', 1, '2020-09-12 09:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(11, 'Ashik', 'ashik@gmail.com', '$2y$10$UizdsH3XVKBpMDR8vyBUCO6qRrAtmitvdqHqerKuRL84jB5mZ6pRy', 'mypic2.PNG'),
(12, 'Sujon', 'sujon@gmail.com', '$2y$10$jQMiuLmqhBpbjU8O2/IKtObMXU8pm1efa4tN7X8zQruMZxVOx6ZSK', 'IMG_3833crop.jpg'),
(13, 'test', 'test@gmail.com', '$2y$10$lZ4LQlmsGPRQQJI3dKB4wOS07WPGwWzTOLGKXL.if8vFb0V2p6N9S', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
