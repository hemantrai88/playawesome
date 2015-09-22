-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2015 at 09:56 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbAwesome`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlistsDB`
--

CREATE TABLE IF NOT EXISTS `playlistsDB` (
  `plID` int(11) NOT NULL,
  `plName` varchar(50) NOT NULL,
  `plDescription` varchar(200) NOT NULL,
  `plCover` varchar(25) NOT NULL,
  `plTag1` int(11) NOT NULL,
  `plTag2` int(11) NOT NULL,
  `plTag3` int(11) NOT NULL,
  `plTag4` int(11) NOT NULL,
  `plTag5` int(11) NOT NULL,
  `plStatus` int(11) NOT NULL,
  `plOwner` int(11) NOT NULL,
  `plOrigin` int(11) NOT NULL,
  `plCreatedAt` timestamp NULL DEFAULT NULL,
  `plLastEdited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistsDB`
--

INSERT INTO `playlistsDB` (`plID`, `plName`, `plDescription`, `plCover`, `plTag1`, `plTag2`, `plTag3`, `plTag4`, `plTag5`, `plStatus`, `plOwner`, `plOrigin`, `plCreatedAt`, `plLastEdited`) VALUES
(1, 'A Rocking Psychedelia', 'Songs I''ve been listening to (on and off) forever now! 30 Rock songs that transport you to an unknown dimension of Psychedelia if you know what I mean! I''ll keep updating this playlist regularly!', '29144257153910.png', 3, 6, 12, 0, 0, 1, 1, 1, '2015-09-17 22:25:55', '2015-09-17 22:25:55'),
(2, 'Recycled classics', 'Love classics? Obviously.. You''ll love this playlist!', '32144257664260.png', 4, 3, 10, 0, 0, 1, 1, 1, '2015-09-17 23:44:20', '2015-09-17 23:44:20'),
(3, 'Sounds Of Music', 'A playlist that contains an amazing  mix of music from different genres.', '66144265399766.jpg', 3, 4, 7, 8, 0, 1, 1, 1, '2015-09-18 21:13:57', '2015-09-18 21:13:57'),
(4, 'Sounds Of Music', 'A playlist that contains an amazing  mix of music from different genres.', '66144265399766.jpg', 3, 4, 7, 8, 0, 1, 1, 1, '2015-09-18 21:13:57', '2015-09-18 21:13:57'),
(5, 'Love & Happiness', 'Need say more? Love and happiness , happiness and love...', '4144266102768.jpg', 3, 4, 5, 10, 6, 1, 1, 1, '2015-09-18 23:10:43', '2015-09-18 23:10:43'),
(6, 'Brain Damage', 'You lock the door, throw away the keys,\nThere''s someone in my head, but it''s not me', '39144268334491.jpg', 3, 4, 6, 5, 0, 1, 1, 1, '2015-09-19 05:22:37', '2015-09-19 05:22:37'),
(7, 'One Love', 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '15144268896875.jpg', 7, 8, 9, 4, 0, 1, 1, 1, '2015-09-20 06:56:20', '2015-09-20 06:56:20'),
(8, 'Pigs on the wing', 'And searching, for pigs on the wing... pigs on the wing', '98144274666639.jpg', 3, 12, 4, 0, 0, 1, 1, 1, '2015-09-19 22:58:01', '2015-09-19 22:58:01'),
(9, 'fgsgfgfg', 'fdhfghgfghgf hjgf hgfhgh gfh gf h fg hg hgf hrfg r tr tr', '4144274980234.jpg', 3, 4, 5, 6, 7, 1, 1, 1, '2015-09-19 23:50:10', '2015-09-19 23:50:10'),
(10, 'mdfkds d fdio f', 'JMIOF IDFJPOF PO FONS kms  of k ;okd;of d;o fod;fdf dfdjfds', '1414427509416.png', 9, 8, 11, 10, 7, 1, 1, 1, '2015-09-20 00:09:14', '2015-09-20 00:09:14'),
(11, 'lmsdflds', 'ijnij i jiu ihioujoiuotg9uolhyfouvbb kjbn h oui bngiuyg ', '714427510756.png', 12, 10, 11, 8, 9, 1, 1, 1, '2015-09-20 00:11:32', '2015-09-20 00:11:32'),
(12, 'dgfgfd', 'ndfl  eiueh odfgjdifjd if u dofudsifhs offios fdf dig fjspofups', '75144275131054.png', 7, 9, 8, 6, 5, 1, 1, 1, '2015-09-20 00:15:26', '2015-09-20 00:15:26'),
(13, 'bhfgfhghgh', 'ghgfghgf ghgh gfhgfd gfg fg fgg dfg fdg ffdgfgfgg sdg sd s', '49144275155166.jpg', 7, 8, 9, 6, 3, 1, 1, 1, '2015-09-20 00:19:22', '2015-09-20 00:19:22'),
(14, 'sdnflsdkfn', 'j iosdfi  sdif is fd sifd sfdi fdsd lidsjfdsjfli djfldsjfdsjf', '96144275182810.png', 3, 4, 5, 6, 7, 1, 1, 1, '2015-09-20 00:24:04', '2015-09-20 00:24:04'),
(15, 'f dsf dkfjdf', 'nl fj sd f\ndfdsmfd sfdkfd fkds fjdjd fdjf ldkfj dlkfjdlkfhdk fhdk', '66144275190257.png', 9, 6, 5, 7, 8, 1, 1, 1, '2015-09-20 00:25:23', '2015-09-20 00:25:23'),
(16, 'ksdnfdsjf', 'dsinfdsoi \ndfd\nsfd\nfd\nfd\nfddfmdisfdif diofjdoif diofdoimfudo ifu', '214427519756.png', 3, 4, 5, 6, 7, 1, 1, 1, '2015-09-20 00:26:23', '2015-09-20 00:26:23'),
(17, 'sandf', 'ijj ijsidsif eifeifeoiuf ewufe iugfbewfhe fiew fhewoifewo ife wiugf', '42144275212740.jpg', 9, 11, 10, 12, 5, 1, 1, 1, '2015-09-20 00:28:58', '2015-09-20 00:28:58'),
(18, 'asklak', 'nks jshf dsifl d fid fdufhdk fdkufh dkufh difhdkfhdkkgdifi', '64144275219546.png', 9, 8, 6, 5, 3, 1, 1, 1, '2015-09-20 00:30:03', '2015-09-20 00:30:03'),
(19, 'ksjdbfksd', 'bksd fhdsdshf dkfhdksfhdkufh dk uffh dfd uifdkfhdkf dgfdsfg', '90144275240678.png', 10, 9, 6, 4, 7, 1, 1, 1, '2015-09-20 00:33:33', '2015-09-20 00:33:33'),
(20, 'jsdnfdjf dfdf djf h', 'ns jfdkj fdfh dkhf dk fdfdkfdlfjdlkfhdfhdk ff sdfdfdlfjfgjh ', '27144275255928.png', 7, 6, 10, 9, 8, 1, 1, 1, '2015-09-20 00:36:06', '2015-09-20 00:36:06'),
(21, 'ksdjfdksjfsdlk', 'kslkjfslakjj lsl dsldjsldjsldj sdjslkdjsldjsldjslkjdlfjdslfdlsk', '98144275261469.png', 7, 5, 11, 10, 9, 1, 1, 1, '2015-09-20 00:37:01', '2015-09-20 00:37:01'),
(22, 'ndsfjirjgoir rei', 'j eijfekufh h uefhkf hdkfhdl fd kfgdkfslfjdlifjd slfdfdl fj', '18144275269785.png', 6, 4, 5, 3, 9, 1, 1, 1, '2015-09-20 00:38:23', '2015-09-20 00:38:23'),
(23, 'Sensible naam', 'samaj me aayi tumhari playlist thi bhari toh\nullu\n', '15144275280494.png', 6, 8, 9, 10, 0, 1, 1, 1, '2015-09-20 00:41:30', '2015-09-20 00:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `plStatusDB`
--

CREATE TABLE IF NOT EXISTS `plStatusDB` (
  `plStatusId` int(11) NOT NULL,
  `plStatusName` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plStatusDB`
--

INSERT INTO `plStatusDB` (`plStatusId`, `plStatusName`) VALUES
(1, 'Draft'),
(2, 'Not Published'),
(3, 'Published'),
(4, 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `plTagsDB`
--

CREATE TABLE IF NOT EXISTS `plTagsDB` (
  `plTagId` int(11) NOT NULL,
  `plTagLabel` varchar(25) NOT NULL,
  `plTagCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plTagsDB`
--

INSERT INTO `plTagsDB` (`plTagId`, `plTagLabel`, `plTagCount`) VALUES
(3, 'Rock', 0),
(4, 'Pop', 0),
(5, 'Jazz', 0),
(6, 'Blues', 0),
(7, 'Hip-hop', 0),
(8, 'EDM', 0),
(9, 'Dance', 0),
(10, '90''s', 0),
(11, 'Rap', 0),
(12, 'Grunge', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersDB`
--

CREATE TABLE IF NOT EXISTS `usersDB` (
  `userID` int(11) NOT NULL,
  `userFirstName` varchar(50) NOT NULL,
  `userLastName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userIdentification` varchar(200) NOT NULL,
  `userAvatar` varchar(25) NOT NULL,
  `userJoined` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userLastActive` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersDB`
--

INSERT INTO `usersDB` (`userID`, `userFirstName`, `userLastName`, `userEmail`, `userIdentification`, `userAvatar`, `userJoined`, `userLastActive`) VALUES
(1, 'Hemant', 'Rai', 'in.hemant.r@gmail.com', 'helloworld', '', '2015-09-18 08:50:00', '2015-09-18 08:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlistsDB`
--
ALTER TABLE `playlistsDB`
  ADD PRIMARY KEY (`plID`);

--
-- Indexes for table `plStatusDB`
--
ALTER TABLE `plStatusDB`
  ADD PRIMARY KEY (`plStatusId`);

--
-- Indexes for table `plTagsDB`
--
ALTER TABLE `plTagsDB`
  ADD PRIMARY KEY (`plTagId`);

--
-- Indexes for table `usersDB`
--
ALTER TABLE `usersDB`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlistsDB`
--
ALTER TABLE `playlistsDB`
  MODIFY `plID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `plStatusDB`
--
ALTER TABLE `plStatusDB`
  MODIFY `plStatusId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usersDB`
--
ALTER TABLE `usersDB`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
