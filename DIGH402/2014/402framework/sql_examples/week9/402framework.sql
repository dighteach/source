-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2014 at 04:53 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `402framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `contentid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contentname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contentdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `contenttext` text COLLATE utf8_unicode_ci NOT NULL,
  `contentcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `contentname`, `contentdesc`, `contenttext`, `contentcreated`) VALUES
(1, 'home page', 'default home page for the 402 framework', 'Welcome to the home page of the DIGH 402 framework.', '2014-01-28 01:16:40'),
(2, 'About', 'Information about the 402 framework', 'Project information for the DIGH 402 framework.', '2014-01-28 01:16:40'),
(3, 'contact', 'contact page for 402 framework', 'Contact Page', '2014-01-28 22:49:28'),
(4, 'project logo', 'project logo for 402 framework', '<img src="logo.jpg" />', '2014-01-28 23:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `content_lookup`
--

CREATE TABLE IF NOT EXISTS `content_lookup` (
  `content_id` int(10) unsigned NOT NULL,
  `content_type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`content_id`,`content_type_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content_lookup`
--

INSERT INTO `content_lookup` (`content_id`, `content_type_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 3),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE IF NOT EXISTS `content_type` (
  `content_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_type_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_type_desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`content_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`content_type_id`, `content_type_name`, `content_type_desc`) VALUES
(1, 'text', 'content defined as textual or text based'),
(2, 'image', 'content defined as image or visually based');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usercreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `firstname`, `lastname`, `usercreated`) VALUES
(1, 'ancientlives', 'ancient', 'lives', '2014-01-22 05:37:30'),
(2, 'yvaine08', 'yvaine', 'wall', '2014-01-22 05:42:36'),
(3, 'yvaine14', 'yvaine', 'stormhold', '2014-01-22 05:42:49'),
(4, 'tristan27', 'tristan', 'issit', '2014-01-22 05:44:03'),
(5, 'emma97', 'emma', 'bernau', '2014-01-22 22:58:09'),
(6, 'cat05', 'catherine', 'smith', '2014-01-22 22:58:09'),
(7, 'amelie01', 'amelie', 'poulain', '2014-01-27 22:22:50'),
(8, 'adele10', 'adele', 'blanc-sec', '2014-01-27 22:22:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
