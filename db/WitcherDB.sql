-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2020 at 10:01 PM
-- Server version: 5.7.29
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WitcherDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `commentDate` date NOT NULL,
  `postId` int(11) NOT NULL,
  `commentText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `commentDate`, `postId`, `commentText`) VALUES
(24, 9, '2020-12-18', 2, 'Great song!\r\n'),
(31, 8, '2020-12-20', 3, 'Hello'),
(34, 10, '2020-12-20', 3, 'Great post!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postName` varchar(50) NOT NULL,
  `postText` text NOT NULL,
  `postImage` text NOT NULL,
  `postDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `userId`, `postName`, `postText`, `postImage`, `postDate`) VALUES
(2, 9, 'The infamous song ', 'hhhhhhhhhh', 'coin.jpg', '2020-12-01'),
(3, 1, 'The kingdom of Nilfgaard', 'The Nilfgaardian Empire (Ceas\'raet[1] in Nilfgaardian language) is the most powerful empire in the history of the known world. It is located in the southern part of the Continent and boasts both a thriving economy and a strong, well-trained army with talented commanders. It has expanded mostly through the conquest of foreign countries, which were then turned into provinces of the Empire. The Empire\'s inhabitants believe that \"real\" Nilfgaardians are only those born in the heart of the Empire, and not those born in the conquered provinces.\r\nThe provinces are ruled by either stewards or kings (in cases in which a king willingly surrenders, he retains his throne but is subject to the Emperor or just a vassal). The empire has expanded throughout the years, conquering new lands and going as far to the north as the Yaruga River during the reign of Emperor Emhyr var Emreis.\r\n\r\nIn the Northern Kingdoms, the Empire is portrayed as an overarching antagonist, with many free people of the North expressing hatred towards it with passion.', 'nilfgaard.jpg', '2020-12-08'),
(12, 2, 'Making the Witcher', 'The making of the Witcher', 'makingOf.jpg', '2020-12-10'),
(31, 10, 'Bolzano', 'So nice', 'bozen.jpeg', '2020-12-18'),
(33, 10, 'Geralt of Rivia', 'The main character of the Witcher series!', 'geralt.jpeg', '2020-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='table of all members of the tennis club';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `isAdmin`) VALUES
(1, 'Geralt', 'of Rivia', 'witcher@magicMail.com', '$2y$10$4yE7CkytuU46fbzCkUDueer1MZsO8RevLdoDYdSnoiUxNeaDj5w5q', 0),
(2, 'Harry', 'Potter', 'potter@hogwarts-edu.com', '$2y$10$0U/..Tl7/Pse8GwULXJNu.bQJKcaNfXzgKT.RwaWzMcFXLgpmXMbS', 0),
(8, 'Romy', 'Hallo', 'romy@mail.com', '$2y$10$0lA5qporcwwSvhEYdlCcEu5qZ67SiYffKd0RlN6Re/JZ2mM69Jb22', 0),
(9, 'Ange', 'DibPav', 'ange@mail.com', '$2y$10$tngMV2zQ9PcAb5rTpSKT6ezP2QaBEWRnAwiwWebqNpxYtxl308cUO', 0),
(10, 'Admin', 'of the Witcher blog', 'admin@mail.com', '$2y$10$xRKNgme.G3/9C3wthiej4OcRbKORAOxiN37g582L7HTLCAoZuBrya', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `postId` (`postId`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `postFK` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
