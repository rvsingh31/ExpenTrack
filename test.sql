-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 09:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `friends_id` int(255) NOT NULL,
  `request_status` varchar(15) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`index`, `user_id`, `friends_id`, `request_status`) VALUES
(5, 13, 31, 'friends'),
(6, 13, 12, 'friends'),
(13, 13, 3, 'friends'),
(24, 36, 22, 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `groupevent`
--

CREATE TABLE IF NOT EXISTS `groupevent` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `group_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `groupevent`
--

INSERT INTO `groupevent` (`index`, `group_name`, `group_id`, `user_id`) VALUES
(4, 'Udaipur', 2, 14),
(5, 'Udaipur', 2, 32),
(6, 'Udaipur', 2, 53),
(8, 'Goa', 3, 3),
(9, 'Goa', 3, 4),
(20, 'udaipur', 4, 3),
(21, 'udaipur', 4, 7),
(22, 'Rajasthan', 5, 12),
(23, 'Rajasthan', 5, 8),
(24, 'Rajasthan', 5, 11),
(25, 'Manipur', 6, 11),
(26, 'Manipur', 6, 12),
(27, 'Shillong', 7, 7),
(28, 'Shillong', 7, 11),
(29, 'Shillong', 7, 12),
(30, 'Diu', 8, 12),
(31, 'Diu', 8, 3),
(32, 'Diu', 8, 11),
(44, 'Agra', 9, 4),
(45, 'Agra', 9, 8),
(46, 'Agra', 9, 12),
(47, 'Quebec', 10, 3),
(48, 'Quebec', 10, 7),
(49, 'Quebec', 10, 8),
(50, 'Quebec', 10, 11),
(59, 'Abc', 13, 0),
(60, 'Abc', 13, 7),
(61, 'Abc', 13, 8),
(62, 'Delhi', 14, 7),
(63, 'Delhi', 14, 3),
(64, 'Delhi', 14, 8),
(78, 'Beijing', 21, 13),
(79, 'Beijing', 21, 16),
(80, 'asdf', 22, 16),
(81, 'asdf', 22, 3),
(82, 'asdf', 22, 11),
(86, 'xyz', 24, 3),
(88, 'xyz', 24, 8),
(89, 'ioa', 25, 3),
(90, 'ioa', 25, 4),
(91, 'ioa', 25, 7),
(92, 'ioa', 25, 13),
(97, 'Singapore', 27, 16),
(98, 'Singapore', 27, 7),
(99, 'Singapore', 27, 13),
(173, 'aaa', 43, 30),
(174, 'aaa', 43, 30),
(175, 'aaa', 43, 25);

-- --------------------------------------------------------

--
-- Table structure for table `singleevent`
--

CREATE TABLE IF NOT EXISTS `singleevent` (
  `client_id` int(255) NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(300) NOT NULL,
  `expense` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `exp_limit` int(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `singleevent`
--

INSERT INTO `singleevent` (`client_id`, `no`, `note`, `expense`, `date`, `exp_limit`) VALUES
(13, 2, '', 0, '', 150),
(13, 4, 'fruits', 30, '03/14/2016', 150),
(13, 5, 'xyz', 20, '03/14/2016', 150),
(13, 8, 'foodmart', 30, '03/15/2016', 150),
(3, 10, '', 0, '', 200),
(13, 11, 'travel', 40, '03/15/2016', 150),
(15, 12, '', 0, '', 250),
(15, 13, 'movie', 200, '03/15/2016', 250),
(11, 14, '', 0, '', 120),
(11, 15, 'movie', 100, '03/15/2016', 120),
(13, 16, 'lunch', 100, '03/16/2016', 150),
(13, 17, 'xerox', 40, '03/15/2016', 150),
(13, 18, 'puff', 10, '03/15/2016', 150),
(13, 19, 'coke', 10, '03/15/2016', 150),
(13, 20, 'xyz', 5, '03/15/2016', 150),
(13, 22, 'def', 10, '03/23/2016', 150),
(13, 23, 'puff', 10, '03/24/2016', 150),
(13, 24, 'cheese puff', 20, '03/25/2016', 150),
(13, 25, 'bhel', 50, '03/17/2016', 150),
(13, 27, 'movie', 180, '03/08/2016', 150),
(12, 28, '', 0, '', 100),
(12, 29, 'fruits', 75, '03/16/2016', 100),
(12, 30, 'xerox', 15, '03/16/2016', 100),
(13, 31, 'colddrinks', 120, '03/30/2016', 150),
(13, 32, 'colddrinks', 35, '03/16/2016', 150),
(12, 33, 'lunch', 50, '03/16/2016', 100),
(13, 38, 'pasta', 50, '03/18/2016', 150),
(13, 39, 'chips', 20, '03/17/2016', 150),
(13, 40, 'rolls', 60, '03/18/2016', 150),
(13, 41, 'lunch', 120, '03/19/2016', 150),
(17, 46, '', 0, '', 150),
(4, 47, '', 0, '', 150),
(0, 48, 'parantha', 20, '03/19/2016', 200),
(13, 49, 'parantha', 20, '03/19/2016', 150),
(13, 50, 'travel', 50, '03/23/2016', 150),
(13, 51, 'hkhl', 50, '03/24/2016', 150),
(13, 52, 'lunch', 80, '03/27/2016', 150),
(13, 53, 'dinner', 60, '03/27/2016', 150),
(13, 54, 'xerox', 30, '03/27/2016', 150),
(13, 55, 'dsbfjsk', 50, '04/13/2016', 150),
(13, 56, 'dnsfjj', 80, '04/01/2016', 150),
(13, 57, 'lunch', 50, '04/03/2016', 150),
(13, 58, 'askjbj', 40, '04/19/2016', 150),
(13, 59, 'fjbjfm', 40, '04/03/2016', 150),
(24, 60, '', 0, '', 120),
(13, 61, 'icecream', 10, '04/03/2016', 150),
(13, 62, 'cake', 30, '04/03/2016', 150),
(13, 63, 'gjdfkh', 50, '04/04/2016', 150),
(13, 64, 'bdshbhj', 80, '04/04/2016', 150),
(25, 65, '', 0, '', 200),
(25, 66, 'asad', 100, '04/04/2016', 200),
(13, 67, 'lunch', 50, '05/24/2016', 150),
(13, 68, 'dfndkf', 80, '05/24/2016', 150),
(13, 71, 'pepsi', 45, '06/03/2016', 150),
(13, 72, 'puff', 30, '06/03/2016', 150),
(13, 73, 'pen', 25, '06/03/2016', 150),
(13, 74, 'cake', 20, '06/03/2016', 150),
(13, 75, 'ghjk', 50, '05/18/2016', 150),
(13, 76, 'fndsfkj', 50, '06/07/2016', 150),
(13, 77, 'djghdfijgk', 100, '06/07/2016', 150),
(13, 78, 'ndfngdmgk', 140, '06/14/2016', 150),
(13, 79, 'vnvjn', 50, '06/15/2016', 150),
(33, 80, '', 0, '', 150),
(30, 81, '', 0, '', 150),
(22, 82, '', 0, '', 150),
(22, 83, 'dklf', 50, '07/12/2016', 150),
(13, 84, 'ifjokgmf', 40, '07/05/2016', 150),
(13, 85, 'cnskjcn', 100, '07/05/2016', 150);

-- --------------------------------------------------------

--
-- Table structure for table `single_friend_expense`
--

CREATE TABLE IF NOT EXISTS `single_friend_expense` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `friends_id` int(255) NOT NULL,
  `expense` int(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `single_friend_expense`
--

INSERT INTO `single_friend_expense` (`index`, `user_id`, `friends_id`, `expense`, `note`) VALUES
(1, 13, 12, 50, 'njdsf'),
(2, 13, 31, 50, 'kjsfk'),
(3, 13, 3, 50, 'DSD'),
(5, 0, 13, 50, 'gmdfkgnm'),
(7, 0, 13, 50, 'nsjdn'),
(10, 36, 22, 50, 'sdskdl'),
(11, 13, 3, 56, 'dklmdfkm'),
(12, 13, 31, 100, 'fvhdf'),
(13, 13, 31, 5120, 'dnkkm'),
(14, 13, 3, 50, 'dsfkdsfk');

-- --------------------------------------------------------

--
-- Table structure for table `split_settle`
--

CREATE TABLE IF NOT EXISTS `split_settle` (
  `user_id` int(255) NOT NULL,
  `index` int(255) NOT NULL AUTO_INCREMENT,
  `group_id` int(255) NOT NULL,
  `owe_id` int(255) NOT NULL,
  `money` float NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `split_settle`
--

INSERT INTO `split_settle` (`user_id`, `index`, `group_id`, `owe_id`, `money`) VALUES
(3, 20, 8, 12, 43.75),
(3, 21, 8, 11, 43.75),
(13, 54, 22, 16, 12.5),
(13, 55, 22, 3, 12.5),
(13, 56, 22, 11, 12.5),
(16, 57, 22, 3, 15),
(16, 58, 22, 11, 15),
(13, 73, 24, 3, 20),
(13, 74, 24, 0, 20),
(13, 75, 24, 8, 10),
(13, 76, 25, 3, 37.5),
(13, 77, 25, 4, 57.5),
(7, 79, 25, 13, 42.5),
(3, 85, 3, 4, 35),
(13, 86, 29, 3, 10),
(13, 88, 29, 12, 17.5),
(13, 99, 12, 8, 107),
(13, 108, 35, 24, 45),
(26, 111, 42, 30, 37),
(26, 113, 42, 13, 60),
(26, 114, 42, 22, 60),
(27, 115, 42, 30, 80),
(27, 116, 42, 13, 80),
(27, 117, 42, 22, 80),
(27, 118, 42, 26, 20),
(25, 119, 43, 30, 133.333),
(13, 120, 21, 16, 531),
(13, 121, 27, 16, 33.3333),
(13, 122, 27, 7, 33.3333);

-- --------------------------------------------------------

--
-- Table structure for table `usersdb`
--

CREATE TABLE IF NOT EXISTS `usersdb` (
  `name` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `client_id` int(255) NOT NULL AUTO_INCREMENT,
  `contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `usersdb`
--

INSERT INTO `usersdb` (`name`, `username`, `password`, `client_id`, `contact`, `email`) VALUES
('Vaibhav', 'vj', 'joshi01', 3, 7874829992, 'qwertyu@yahoo.com'),
('Raju', 'rajeshb', 'bhanu296', 4, 456781526, 'xcvbn@gmail.com'),
('Harshal', 'hs', 'sheth23', 7, 9375670407, 'vbnm,12@gmail.com'),
('Rishi', 'rishis', 'sheth27', 8, 58213219511, 'ftrvbhjiugvtbhj@yahoo.in'),
('Harsh', 'sodi', 'sodi21', 11, 21541554942, 'weqweq@gmail.com'),
('Akshit', 'akki', 'asdfg', 12, 15184512313, 'bhdah@hotmail.com'),
('Ravinder', 'rvsingh', 'singh31', 13, 8460348865, 'rvsingh_31@yahoo.com'),
('Davinder', 'davindersingh', 'xcfg', 14, 8866505109, 'davindersingh@gmail.com'),
('Keyur', 'kd', 'kd123', 15, 8460348865, 'keyurdhanesha@gmail.com'),
('Jay Joshi', 'jaygoku', 'joshi123', 16, 9426288882, 'jay.goku1997@gmail.com'),
('Khushi', 'khush', 'desai', 17, 1234543665, 'nsfkdsfm@gmail.com'),
('bdbjn', 'asnfjnk', 'abcd', 21, 8475154, 'hasuf@gmail.com'),
('Sagar', 'sagar', 'das123', 22, 9638438648, 'bfhabfjas@gmail.com'),
('Rushit', 'rush', 'jasani', 24, 8866324686, 'dsgfdsfsduf@gmail.com'),
('yash', 'yash01', 'patel', 25, 8460887218, 'sdsabdkj@gmail.com'),
('foram', 'fr', 'foram', 26, 7698904215, 'hadsk@gmail.com'),
('vidhi', 'vs', 'vidhi', 27, 8758694101, 'dgsaj@gmail.com'),
('hardik', 'hr', 'hardik', 28, 8460661770, 'sagdj@gmail.com'),
('aditi', 'ar', 'aditi', 29, 9825274317, 'asdgahs@gmail.com'),
('margi', 'mr', 'margi', 30, 7622001440, 'saf@gmail.com'),
('Mom', 'mom', 'mom123', 31, 7405289155, 'dskf@ndfjd.com'),
('Karamjit Singh', 'karam12', 'karamjit', 32, 9824337284, 'dskjncsjcnj@gmail.com'),
('Shubham Jain', 'shubhamdhanetia', 'shubham123456', 33, 9173059830, 'cshubhamdhanetia@gmail.com'),
('Sagar', 'sagar0207', '987', 36, 9662537149, 'sagar@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
