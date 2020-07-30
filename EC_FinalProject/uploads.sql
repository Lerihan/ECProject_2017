-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 03:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uploads`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `ID` int(5) NOT NULL,
  `video_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`ID`, `video_id`, `user_id`) VALUES
(1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(5) NOT NULL,
  `video_id` int(5) NOT NULL,
  `commentor_id` int(5) NOT NULL,
  `comment_message` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `video_id`, `commentor_id`, `comment_message`) VALUES
(6, 2, 6, ''),
(7, 2, 6, 'asd'),
(8, 2, 6, 'asdasdasdasd'),
(9, 2, 5, ''),
(10, 2, 7, 'Ohhhh daaaaamn, I like there one better than mine\'s. How\'d you get the quality to be like that?');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `ID` int(5) NOT NULL,
  `game_name` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`ID`, `game_name`) VALUES
(1, 'Overwatch'),
(2, 'League of Legends'),
(4, 'CS:GO');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `ID` int(5) NOT NULL,
  `subscriber_id` int(5) NOT NULL,
  `subscribedto_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID`, `subscriber_id`, `subscribedto_id`) VALUES
(2, 5, 6),
(3, 7, 6),
(4, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID` int(3) NOT NULL,
  `user_id` int(5) NOT NULL,
  `title` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(72) COLLATE latin1_general_ci NOT NULL,
  `email_address` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `first_name`, `last_name`, `username`, `password`, `email_address`) VALUES
(5, 'a', 'a', 'a', '$2y$10$CV45IKM3wydwCPnyvsi5EOxPIyBxxr5fRZtBpXKvSU9qpY6hpoOpa', 'a'),
(6, 'Roijan', 'Caballero', 'roijan', '$2y$10$id1nvaiNna0YePJMCkcjB.gTqHL85aB/0SePvDe/vWbk850VFZ0DS', 'caballero.roijan@gmail.com'),
(7, 'meow', 'meow', 'meow', '$2y$10$juaIdXkktqF7YgUfgLMro.rdhRIq4pJnONHshUr.HqThMf/e.Pexq', 'meow'),
(8, 'Raymond', 'Wu', 'Raymoonmoon', '$2y$10$wpz46/u9A6InG1VTqojO6uDzOGlUkoBN9hpc621Z8FEP/IvBFj8kS', 'ray@wu.com'),
(9, 'League', 'Player', 'Woof', '$2y$10$X6R22SvdYUfCigDHxyG4QeR5yBgI8POD3jlgkzaOYRdC2jQCksnxu', 'woof@woof.com'),
(10, 'Meri', 'Phan', 'meri', '$2y$10$j92fREE1J7HkJ309alGDw.IEDSivRkJ4J0KecJZgkRsCJ/o3.1kwG', 'meri@phan.com');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `ID` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `game_id` int(5) NOT NULL,
  `filename` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `fileextension` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `video_title` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `video_description` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`ID`, `user_id`, `game_id`, `filename`, `fileextension`, `video_title`, `video_description`, `date_uploaded`) VALUES
(2, 6, 1, '2017-01-15 20-19-21.mp4', 'mp4', 'dva', 'dva bomb owwww', '2017-04-17 21:44:47'),
(8, 6, 1, 'VID_20160924_230356.mp4', 'mp4', 'z', 'z', '2017-04-22 05:39:29'),
(9, 5, 2, 'Another Xayah Play.mp4', 'mp4', 'Xayah Play', 'Another Xayah Play I stole from reddit. This wasn\'t my own video. I actually didn\'t do that play hah', '2017-04-24 01:12:10'),
(10, 7, 1, 'VID_20160928_202204.mp4', 'mp4', 'New to DVA', 'I\'m new to DVA hope you guys like this, very low quality yeah I know.', '2017-04-24 01:14:01'),
(11, 8, 1, 'video-1492808158.mp4', 'mp4', 'OP Rein', 'I\'m a one trick Reihardt player,  cause noone else wants to play him. Still hope you guys enjoy it.', '2017-04-24 01:16:24'),
(12, 9, 2, 'Lucian Penta - iiLLi.mp4', 'mp4', 'Lucian Penta', 'Watch as I 1v9 the other team and get a penta :D', '2017-04-24 01:19:03'),
(13, 6, 1, 'VID_20160924_230425.mp4', 'mp4', 'Zarya Highlight', 'Here\'s one of my very first zarya highlight. Not very good but hope you guys still like it.', '2017-04-24 01:24:48'),
(14, 9, 2, 'Kled Calculated.mp4', 'mp4', 'Kled Calculated', 'Another one of my plays, a kled calculated game', '2017-04-24 01:25:35'),
(15, 7, 1, 'VID_20160924_230529.mp4', 'mp4', 'Another DVA Highlight', 'Here\'s another bad quality DVA Highlight.', '2017-04-24 01:26:35'),
(16, 8, 1, 'video-1492808052.mp4', 'mp4', 'Another OP Rein Highlight', 'Watch another Rein Highlight from yours truly Rein one trick!', '2017-04-24 01:28:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `commentor_id` (`commentor_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `subscriber_id` (`subscriber_id`),
  ADD KEY `subscribedto_id` (`subscribedto_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `filename` (`filename`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `bookmark_video_id_fk` FOREIGN KEY (`video_id`) REFERENCES `video` (`ID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_commentor_id_fk` FOREIGN KEY (`commentor_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `comment_video_id_fk` FOREIGN KEY (`video_id`) REFERENCES `video` (`ID`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `sub_sub_id` FOREIGN KEY (`subscriber_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `sub_subto_id` FOREIGN KEY (`subscribedto_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_game_id_fk` FOREIGN KEY (`game_id`) REFERENCES `game` (`ID`),
  ADD CONSTRAINT `video_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
