-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 08:05 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `colleged_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE IF NOT EXISTS `tb_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`category_id`, `category_name`) VALUES
(1, 'Housing'),
(2, 'Books'),
(3, 'Tickets'),
(4, 'Wanted'),
(5, 'Clothing'),
(6, 'Furniture'),
(7, 'Electronics'),
(8, 'Transportation'),
(9, 'Miscellaneous'),
(10, 'Pets'),
(11, 'Event'),
(12, 'Class Materials');

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE IF NOT EXISTS `tb_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(400) DEFAULT NULL,
  `item_description` text,
  `item_price` int(40) DEFAULT NULL,
  `item_type` int(11) NOT NULL DEFAULT '0',
  `item_category` int(4) DEFAULT NULL,
  `item_image` varchar(400) DEFAULT NULL,
  `item_user_id` int(10) DEFAULT NULL,
  `item_status` int(5) DEFAULT NULL,
  `item_created_date` datetime DEFAULT NULL,
  `item_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`item_id`, `item_name`, `item_description`, `item_price`, `item_type`, `item_category`, `item_image`, `item_user_id`, `item_status`, `item_created_date`, `item_modified_date`) VALUES
(13, 'Old Boat For Sale', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliq', 18000, 0, 2, 'public/uploads/itempics/4_1405427632.jpg', 4, 1, '2014-07-15 07:07:48', NULL),
(14, 'Sample name', 'Moblie', 1233, 0, 1, NULL, 4, 1, '2014-07-15 14:07:11', NULL),
(15, 'This is a sample 2', 'This is awesome', 123, 0, 1, 'public/uploads/itempics/6_1405480928.png', 6, 1, '2014-07-15 22:07:41', NULL),
(25, 'Car', '2004 gas saver for sell perfect for college students 126k miles clean interior ', 4500, 0, 8, 'public/uploads/itempics/3_1412348248.jpg', 3, 1, '2014-10-03 09:10:57', NULL),
(26, 'Game Day Event', 'Mississippi State University Game Day Event', 0, 0, 11, 'public/uploads/itempics/3_1412811356.jpg', 3, 1, '2014-10-08 18:10:09', NULL),
(27, 'Cowbell Yell', 'Rally in the stadium', 0, 0, 11, 'public/uploads/itempics/3_1412811398.jpg', 3, 1, '2014-10-08 18:10:41', NULL),
(28, 'Game Day in Starkville Bus', 'Meet the Game Day Bus', 0, 0, 11, 'public/uploads/itempics/3_1412811436.jpg', 3, 1, '2014-10-08 18:10:19', NULL),
(29, 'Jackson State Game ', 'Game day at Veterans Memorial Stadium in Jackson, MS', 25, 0, 11, 'public/uploads/itempics/3_1414079014.jpg', 3, 1, '2014-10-23 10:10:45', NULL),
(30, 'Battle of the Bands', 'See JSU and Southern battle it out this Friday!', 15, 0, 11, 'public/uploads/itempics/3_1414079159.jpg', 3, 1, '2014-10-23 10:10:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_requests_items`
--

CREATE TABLE IF NOT EXISTS `tb_requests_items` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_item_id` int(11) NOT NULL,
  `request_user_id` int(11) NOT NULL,
  `request_user_messege` text,
  `request_created_date` datetime DEFAULT NULL,
  `request_updated_date` datetime DEFAULT NULL,
  `request_watched` int(11) DEFAULT '0',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_requests_items`
--

INSERT INTO `tb_requests_items` (`request_id`, `request_item_id`, `request_user_id`, `request_user_messege`, `request_created_date`, `request_updated_date`, `request_watched`) VALUES
(4, 16, 3, 'Hey', '2014-07-17 19:07:31', NULL, 0),
(5, 18, 14, 'I like to purchase the shoes, contact me with 01xx xxxxx or sample@gmail.com\nThanks, \nMilinda', '2014-07-17 21:07:12', NULL, 1),
(6, 19, 14, 'Hi', '2014-07-17 21:07:43', NULL, 1),
(7, 19, 14, 'Hi this is a test email', '2014-07-18 11:07:12', NULL, 1),
(8, 20, 14, 'Hi i am intereseted plesas contanct 017xxx', '2014-07-18 11:07:37', NULL, 1),
(9, 19, 22, 'Hellow i need   to buy this', '2014-07-18 11:07:17', NULL, 1),
(10, 19, 14, 'a', '2014-07-18 14:07:53', NULL, 1),
(11, 19, 22, 'This is test', '2014-07-18 14:07:54', NULL, 0),
(12, 19, 22, 'This is test', '2014-07-18 14:07:35', NULL, 0),
(13, 19, 22, 'Hi This is test', '2014-07-18 14:07:11', NULL, 1),
(14, 19, 14, 'Hi there', '2014-07-18 14:07:30', NULL, 0),
(15, 18, 3, 'hey i want this ', '2014-07-18 17:07:23', NULL, 1),
(16, 19, 3, 'hey when i send you a message it won''t go to your email and the recent posts should always go to the top ', '2014-07-18 20:07:14', NULL, 0),
(17, 18, 3, 'I want this item', '2014-07-18 20:07:02', NULL, 1),
(18, 22, 10, 'Hi,\nI am Milinda, This is a sample test mail', '2014-07-21 00:07:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_email_visibility` int(11) NOT NULL,
  `user_password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` int(5) DEFAULT NULL,
  `user_dob` datetime DEFAULT NULL,
  `user_city` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_state` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_mobile` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_mobile_visibility` int(11) NOT NULL,
  `user_pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_school` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_notification` int(4) DEFAULT NULL,
  `user_gig` text COLLATE utf8_unicode_ci NOT NULL,
  `user_created_date` datetime DEFAULT NULL,
  ` 	user_modified_date` datetime NOT NULL,
  `user_activation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_firstName`, `user_lastName`, `user_email`, `user_email_visibility`, `user_password`, `user_type`, `user_dob`, `user_city`, `user_state`, `user_mobile`, `user_mobile_visibility`, `user_pic`, `user_school`, `user_notification`, `user_gig`, `user_created_date`, ` 	user_modified_date`, `user_activation`) VALUES
(38, 'Kendrick', 'Davis', 'kdd121@msstate.edu', 0, '19b8c0516883e246430aeb69a6710b08e608781a', 2, '0000-00-00 00:00:00', 'Starkville', 'Mississippi', NULL, 0, NULL, 'Mississippi State University', 2, '', '2014-07-28 13:07:10', '0000-00-00 00:00:00', ''),
(9, 'Admin', 'admin', 'admin@edu.edu', 0, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 2, '1989-04-08 00:00:00', 'Colombo', NULL, '011', 0, NULL, 'DS', NULL, '', '2014-07-16 08:07:49', '0000-00-00 00:00:00', ''),
(3, 'College ', 'Drifters', 'ma307@msstate.edu', 0, 'cadf3407e578b429bf9ea2bf8bcba4ea25e34819', 1, '1991-05-07 00:00:00', '39213', 'MS', '6013160296', 1, 'public/uploads/profpics/3_1412828018.jpg', 'Mississippi State University ', 3, 'CEO of College Drifters ', '2014-07-14 21:07:47', '0000-00-00 00:00:00', ''),
(10, 'Sampath', 'Milina', 'makas@edu.edu', 1, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 1, '1989-04-08 00:00:00', '111', NULL, '0711111111', 0, 'public/uploads/profpics/10_1405604243.jpg', 'Sample', NULL, 'Hello i am milinda', '2014-07-16 19:07:46', '0000-00-00 00:00:00', ''),
(22, 'Maka', 'Rock', 'makasrock@edu.edu', 0, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 2, '0000-00-00 00:00:00', 'Colombo', NULL, '789', 0, NULL, 'DS', NULL, '', '2014-07-18 11:07:01', '0000-00-00 00:00:00', ''),
(24, 'Sample', 'Engineer', 'sad@edu.edu', 0, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 2, '2012-05-02 00:00:00', 'Colobmo', 'Nugegoda', NULL, 0, NULL, 'DS', NULL, '', '2014-07-20 07:07:10', '0000-00-00 00:00:00', ''),
(37, 'Sampath', 'Milinda', 'hlsmilinda@gmail.com', 0, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 2, '2003-12-04 00:00:00', 'Colombo', 'Kaduwela', '1', 0, NULL, 'DS', NULL, '', '2014-07-27 02:07:52', '0000-00-00 00:00:00', ''),
(27, 'dominique', 'powell', 'dominiquepowell32689@yahoo.edu', 0, 'b59436feb8a83cce50d7fc7b9be8547dce82b6c1', 2, '0000-00-00 00:00:00', 'JACKSON', 'ms', '5043886284', 0, 'public/uploads/profpics/27_1406067748.jpg', 'jackson state', 1, '', '2014-07-22 17:07:42', '0000-00-00 00:00:00', ''),
(28, 'haley', 'shelby', 'j00638558@students.edu', 1, '48a96244195d0e73a51f711bcab6ae225728ec22', 2, '0000-00-00 00:00:00', 'jackson', 'mississippi', '6015408131', 1, 'public/uploads/profpics/28_1406173722.jpg', 'jackson state university', 2, '', '2014-07-23 22:07:58', '0000-00-00 00:00:00', ''),
(39, 'Ty', 'Wade', 'tjw127@msstate.edu', 0, 'bb1f717261d29539b88de061111f1e55c00295a2', 2, '1993-05-01 00:00:00', 'Jackson', 'Mississippi', '6017502155', 0, NULL, 'Mississippi State University', 1, '', '2014-08-23 11:08:18', '0000-00-00 00:00:00', ''),
(40, 'Dominique', 'McCraney', 'J00583459@student.jsums.edu', 0, '2256c71b642e3af0db9b7cc0402f578458c00ed6', 2, '1987-07-12 00:00:00', 'Greenville', 'MS', NULL, 0, NULL, 'Jackson State University', 2, '', '2014-10-01 23:10:35', '0000-00-00 00:00:00', '79b17f5d38be043558df3ed28633b7b3'),
(41, 'Mari', 'Johnson', 'j1675768@hindscc.edu', 0, '56ea1b638cd535f34567a2294aadfdb29f823e16', 2, '0000-00-00 00:00:00', 'jackson', 'MS', '5043005856', 0, NULL, 'Hinds', 1, '', '2014-10-20 07:10:15', '0000-00-00 00:00:00', ''),
(42, 'Melanie', 'Tran', 'mht57@msstate.edu', 1, '8ba699b4c66fe9e61ee20428960e5c1441865997', 2, '1996-07-08 00:00:00', 'Diberville', 'MS - Mississippi', NULL, 0, NULL, 'Mississippi State University', 2, '', '2014-11-09 15:11:38', '0000-00-00 00:00:00', ''),
(43, 'brittany', 'bradley', 'bbradle2@bulldogs.aamu.edu', 0, 'fbb89053bd37bb1c9671a8347b8a2e3c84dfc703', 2, '0000-00-00 00:00:00', 'HUNTSVILLE', 'AL', '6014340927', 0, NULL, 'ALABAMA A&M UNIVERSITY', NULL, '', '2015-01-08 19:01:15', '0000-00-00 00:00:00', '3e41b75c0fbf96f87572bba2dfa397f0'),
(44, 'Rachael', 'Faust', 'rtfaust@go.olemiss.edu', 0, '618a3c884ed13bb1b982114c94c2b717fc0f05bc', 2, '0000-00-00 00:00:00', 'Oxford', 'Mississippi', NULL, 0, NULL, 'University of Mississippi', 2, '', '2015-01-15 11:01:35', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
