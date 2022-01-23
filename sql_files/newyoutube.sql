-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 05:08 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newyoutube`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `channel_name` text NOT NULL,
  `created_by` text NOT NULL,
  `date_created` date NOT NULL,
  `channel_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `channel_name`, `created_by`, `date_created`, `channel_icon`) VALUES
(1, 'e', 'toottoot', '2022-01-22', 'ct1CJa6l70nqBOxcard_wrapped_reddit8.png'),
(2, 'e2', 'toottoot', '2022-01-22', ''),
(3, 'e3', 'toottoot', '2022-01-22', ''),
(4, 'e4', 'toottoot', '2022-01-22', ''),
(5, 'e5', 'toottoot', '2022-01-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_commented` text NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL,
  `video_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_commented`, `comment`, `date_posted`, `video_id`) VALUES
(1, 'toottoot', 'e', '0000-00-00', 'cb15a0601278039ae00dace364ef01bb');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `videoid` text NOT NULL,
  `type` varchar(7) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `videoid`, `type`, `username`) VALUES
(1, 'cb15a0601278039ae00dace364ef01bb', 'like', 'toottoot');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_who_subscribed` text NOT NULL,
  `channel_name` text NOT NULL,
  `yes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_who_subscribed`, `channel_name`, `yes`) VALUES
(1, 'toottoot', 'e', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(111) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `dob` date NOT NULL,
  `locked` varchar(10) NOT NULL,
  `profile_pic` text NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `dob`, `yes`, `profile_pic`, `date_joined`) VALUES
(6, 'Toot-Toot', 'Mc.Bumbersnazzle', 'toottoot', 'bob', '$2y$10$a.qRO1qkjOWNQXAYiLb/k.S4RLDHA1ApsvxL6q/mWGj/E1dTfiivO', '0001-01-01', 'no', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_title` varchar(32) NOT NULL,
  `video_description` text NOT NULL,
  `video_keywords` text NOT NULL,
  `uploaded_by` text NOT NULL,
  `upload_channel` int(11) NOT NULL,
  `privacy` varchar(10) NOT NULL,
  `date_uploaded` date NOT NULL,
  `views` int(150) UNSIGNED NOT NULL,
  `video_id` text NOT NULL,
  `file_md5` text NOT NULL,
  `file_name` text NOT NULL,
  `thumbnail` text NOT NULL,
  `deleted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_description`, `video_keywords`, `uploaded_by`, `upload_channel`, `privacy`, `date_uploaded`, `views`, `video_id`, `file_md5`, `file_name`, `thumbnail`, `deleted`) VALUES
(2, 'e', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'e, e, ee', 'toottoot', 1, 'Public', '0000-00-00', 10079, 'cb15a0601278039ae00dace364ef01bb', '0c107419599d08e1fa94d8ffcc8fc9c1', 'data/users/videos/YuvVjXEFBRKJTMntrying ai - Game - PC, Mac & Linux Standalone - Unity 2019.4.18f1 Personal _DX11_ 2021-05-04 17-57-42.mp4', 'xpZthEmwiX5zLg4card_wrapped_reddit8.png', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_ibfk_1` (`video_id`(768));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
