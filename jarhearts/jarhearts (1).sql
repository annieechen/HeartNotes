-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 04:57 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jarhearts`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `counter` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'increments table',
  `uniqueID` char(13) NOT NULL COMMENT 'recipient''s unique id',
  `userID` int(10) unsigned NOT NULL COMMENT 'sender''s session id',
  `type` char(15) NOT NULL COMMENT 'type of message',
  `content` text NOT NULL COMMENT 'content of message',
  `status` char(20) NOT NULL DEFAULT 'unused' COMMENT 'whether note has been displayed',
  `submitTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'when note was submitted',
  `readDate` char(12) NOT NULL COMMENT 'when note was displayed',
  PRIMARY KEY (`counter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`counter`, `uniqueID`, `userID`, `type`, `content`, `status`, `submitTime`, `readDate`) VALUES
(1, '72fdb4f106c', 0, 'youtube', 'candycorn', 'used', '2015-12-04 03:18:31', '0000-00-00'),
(2, '72fdb4f106c', 0, 'youtube', 'cats', 'used', '2015-12-04 04:46:45', '12-10-2015'),
(3, '72fdb4f106c', 0, 'youtube', 'cats', 'used', '2015-12-04 04:47:08', '12-10-2015'),
(5, '72fdb4f106c', 6, 'memory', 'testing 1', 'used', '2015-12-04 18:49:33', '0000-00-00'),
(6, '72fdb4f106c', 6, 'memory', 'TEsting2!', 'used', '2015-12-04 18:49:57', '0000-00-00'),
(7, '33de3b11c51', 6, 'memory', 'still testing', 'used', '2015-12-05 02:44:40', '12-05-2015'),
(9, '33de3b11c51', 6, 'image', 'http://thecatapi.com/api/images/get?format=src&type=gif&size=small', 'used', '2015-12-05 03:24:21', 'date'),
(10, '33de3b11c51', 6, 'memory', 'more for testing', 'used', '2015-12-05 04:20:30', '12-05-2015'),
(11, '33de3b11c51', 6, 'youtube', 'https://www.youtube.com/embed/F7AyRDKMJ2c', 'potato', '2015-12-05 04:34:10', '12-05-2015'),
(12, '33de3b11c51', 6, 'memory', 'Let''s see if this works', 'potato', '2015-12-05 04:49:30', '12-05-2015'),
(15, 'b1abfc28115', 6, 'youtube', 'https://www.youtube.com/embed/F7AyRDKMJ2c', 'potato', '2015-12-05 05:01:07', '12-05-2015'),
(19, '17c55bc41c9', 12, 'memory', 'Hi Annie remember the good old days', 'used', '2015-12-05 05:06:35', '12-08-2015'),
(20, '17c55bc41c9', 13, 'memory', 'you''re my favorite this website rocks <4', 'used', '2015-12-05 05:06:45', '12-08-2015'),
(21, '17c55bc41c9', 12, 'note', 'Wow such note go Annie!', 'used', '2015-12-05 05:07:18', '12-08-2015'),
(22, '17c55bc41c9', 14, 'note', 'You are a special person, so here''s a heart for you!', 'used', '2015-12-05 06:37:03', '12-08-2015'),
(23, 'b1abfc28115', 9, 'memory', 'More Testing Notes', 'used', '2015-12-08 19:29:01', '12-09-2015'),
(24, '17c55bc41c9', 9, 'memory', 'testing userID', 'used', '2015-12-08 23:56:14', '12-09-2015'),
(25, '17c55bc41c9', 9, 'image', 'http://cdn.toonvectors.com/images/2/4021/toonvectors-4021-940.jpg', 'used', '2015-12-09 04:11:19', '12-09-2015'),
(26, '17c55bc41c9', 13, 'note', 'does this work now', 'used', '2015-12-09 04:48:47', '12-09-2015'),
(27, '17c55bc41c9', 13, 'note', 'does note work now', 'used', '2015-12-09 04:52:03', ''),
(28, '17c55bc41c9', 0, 'memory', 'Remember that time we forced kids to fight to the death over Oreos? That was fun.', 'used', '2015-12-09 04:53:23', '12-09-2015'),
(29, '17c55bc41c9', 9, 'note', 'Thanks for helping me catch bugs!', 'used', '2015-12-09 04:58:00', '12-09-2015'),
(30, '17c55bc41c9', 9, 'memory', 'pls', 'used', '2015-12-09 16:09:42', ''),
(31, '17c55bc41c9', 9, 'youtube', 'https://www.youtube.com/watch?v=l9gEGB0eOps', 'used', '2015-12-10 01:08:24', '12-10-2015'),
(32, '17c55bc41c9', 6, 'youtube', 'https://www.youtube.com/watch?v=QgIJBah8eio', 'used', '2015-12-10 02:02:41', '12-11-2015'),
(33, '72fdb4f106c', 10, 'image', 'http://24.media.tumblr.com/tumblr_lzb2aqbJRn1r7e56fo1_250.gif', 'unused', '2015-12-10 16:38:43', ''),
(34, '72fdb4f106c', 10, 'image', 'http://www.cats.org.uk/uploads/images/pages/photo_latest14.jpg', 'used', '2015-12-10 16:39:27', '12-10-2015'),
(35, '72fdb4f106c', 10, 'note', 'Hi this is a note', 'used', '2015-12-10 18:55:21', '12-11-2015'),
(36, '33de3b11c51', 6, 'note', 'Fuck', 'used', '2015-12-10 22:33:38', '12-10-2015'),
(38, '33de3b11c51', 6, 'note', 'Fucker', 'unused', '2015-12-10 22:35:28', ''),
(39, '72fdb4f106c', 10, 'memory', 'Once I ate sand. I''v''e stopped doing that now. ', 'unused', '2015-12-10 23:43:39', ''),
(40, '33de3b11c51', 9, 'note', 'Thank you for being a fantabulous friend. ', 'used', '2015-12-11 00:32:53', '12-11-2015'),
(41, '17c55bc41c9', 9, 'note', 'testing', 'used', '2015-12-11 00:36:44', ''),
(45, '17c55bc41c9', 9, 'website', 'https://cdn.cs50.net/2015/fall/project/yale/yale.html', 'used', '2015-12-11 03:05:15', '12-11-2015'),
(46, '7c1816fbffc', 9, 'youtube', 'https://www.youtube.com/watch?v=7SWtexks-dk', 'used', '2015-12-11 05:25:50', '12-11-2015'),
(47, '17c55bc41c9', 0, 'note', 'hello!', 'unused', '2015-12-11 05:29:08', ''),
(48, '036954acea8', 0, 'note', 'hello!', 'unused', '2015-12-11 05:30:13', ''),
(49, '7c1816fbffc', 9, 'image', 'http://www.cats.org.uk/uploads/images/pages/photo_latest14.jpg', 'used', '2015-12-11 05:36:39', '12-11-2015'),
(50, '7c1816fbffc', 9, 'website', 'https://cdn.cs50.net/2015/fall/project/yale/yale.html', 'used', '2015-12-11 05:36:53', '12-11-2015'),
(51, '7c1816fbffc', 9, 'note', 'First off, I had such  a good time. Just seeing you all Friday night, getting pizza, setting up, and being lost together, especially with people I’ve been comfortable with for so long was so soothing. It was incredible how after three months, it felt like it had been a week since we had last seen each other. I really hope you all enjoyed the weekend too, even if sleep deprivation and work. It was TOTALLY worth it.\r\n\r\nAlso, going back three months, thank you guys for taking me seriously (except raj) and taking the effort to apply, figure out travel, and make it all the way to sketch New Haven. I wish I could have shown you all more of my school, but next year? Also, can we please apply together to more hackathons (at minimum one in the spring). I feel proud that I made something working, but I would like to make something next time with more than twenty lines of code.', 'unused', '2015-12-11 05:37:07', ''),
(52, '7c1816fbffc', 9, 'youtube', 'https://www.youtube.com/watch?v=7SWtexks-dk', 'unused', '2015-12-11 05:37:18', ''),
(53, '17c55bc41c9', 16, 'note', 'Hey! Thank you so much for the note!', 'unused', '2015-12-11 05:48:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `uniqueID` char(12) NOT NULL,
  `lastDate` char(12) NOT NULL COMMENT 'Last note display date, to see if new note should be loaded',
  `noteNumber` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `uniqueID`, `lastDate`, `noteNumber`, `email`) VALUES
(0, 'anonymous', '', 'nouser', '', 0, ''),
(1, 'skroob', '$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK', '0fa553e210c', '', 0, ''),
(2, 'zamyla', '$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e', 'bbf754a5412', '', 0, ''),
(3, 'tester', '$2y$10$lN8YgiiiPwIfmH8Te/3MMuLCcSgd4cxY1.JrjW56/gQwaMt5t.wXy', '708ec7f04d2', '', 0, ''),
(5, 'testing', '$2y$10$EDytBMstoW1tc02omChqKeuDG2KgMjG5ojIPTrqQ0VQWxWrm3W3Ee', '86d941d2ab7', '', 0, ''),
(6, 'dennis', '$2y$10$.gqfI6iV6aUUTyCXjOyCDeklWcypaBw1g879O9YKjBr5KJWXudlHe', '33de3b11c51', '12-11-2015', 40, ''),
(7, 'annie', '$2y$10$.c/hFMpQwNiR03xX5gxUYuxIeMWFepVUiJLb/s8wLl3z/dxYgr4ui', '25a39f22c2e', '', 0, ''),
(9, 'anniee', '$2y$10$.gqfI6iV6aUUTyCXjOyCDeklWcypaBw1g879O9YKjBr5KJWXudlHe', '17c55bc41c9', '12-11-2015', 45, 'annie.chen@yale.edu'),
(10, 'hi', '$2y$10$LV92sfuldyWB5tRj0RYsQu2VuCYi2MSXIAcPuGatP7rtrX1nNxh6G', '72fdb4f106c', '12-11-2015', 35, ''),
(12, 'timd', '$2y$10$regQDO7r6oII3t2nT5ceX.EcfmSUeu4t1Wqsrc/35WeehEZENmbW.', '036954acea8', '', 0, ''),
(13, 'rajkborra', '$2y$10$FGlImweiqKFm9AKr1kpQpOCoFg9ixbbdH802GpLguFZa/2Or37KuG', 'b1abfc28115', '12-05-2015', 23, ''),
(14, 'nicenotespls', '$2y$10$Nv1uTu27LZdwqJzxnF5GAersZOxz1vRzAni4Kyd7dGcOCzq5d0sGG', '804ce8438ba', '', 0, ''),
(15, 'colin.hill', '$2y$10$z1kuPJBVRL/2d1wnEYORS.5dJfp18TYAtqmBtg56w1cEn58FOqTiS', 'd1d021bd2d4', '12-09-2015', 29, ''),
(16, 'birthdayboy', '$2y$10$P4ZWGR.kupywdQQl.QpS9.PkVE608T8GUZvEB5Dh5udIJSDeHFaVK', '7c1816fbffc', '12-11-2015', 50, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
