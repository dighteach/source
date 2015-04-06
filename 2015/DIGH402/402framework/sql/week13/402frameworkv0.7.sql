-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2015 at 10:00 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `402framework14`
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
  `contentimage` text COLLATE utf8_unicode_ci NOT NULL,
  `contentcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `contentname`, `contentdesc`, `contenttext`, `contentimage`, `contentcreated`) VALUES
(1, 'home', 'default home page for the 402 framework', 'welcome to the home page of the DIGH 402 framework.', '', '2014-01-28 01:16:40'),
(2, 'about', 'information about the 402 framework', 'project information for the DIGH 402 framework.', '', '2014-01-28 01:16:40'),
(3, 'contact', 'contact page for 402 framework', 'contact Page', '', '2014-01-28 22:49:28'),
(4, 'copyright', 'copyright notice for the site', '<h5>Copyright Notice</h5>', '', '2014-01-28 23:20:14'),
(5, 'help', 'helpful information for using the site', '<h5>Helpful Information</h5>', '', '2014-03-22 23:33:54'),
(6, 'site content', 'an overview of current site content', '<h5>Site Content</h5>', '', '2014-03-31 00:27:45'),
(7, 'image galleries', 'an overview of current site image galleries', '<h5>image galleries</h5>', '', '2014-04-05 22:03:01'),
(8, 'books', 'an overview of current site books', '<h5>books</h5>', '', '2014-04-05 22:03:01'),
(9, 'collections', 'an overview of the organised site collections', '<h5>collections</h5>', '', '2014-04-07 01:27:38'),
(10, 'Fishing at sunset', 'father and son fishing at sunset on the Breakwater, Brixham', '', 'img7.jpg', '2014-04-07 01:27:38'),
(11, 'Mind the edge', 'mind the edge of the coastal path, Brixham', '', 'img8.jpg', '2014-04-07 01:30:12'),
(12, 'Ships in the night', 'across Brixham marina as the sun finally sets', '', 'img9.jpg', '2014-04-07 20:17:00'),
(13, 'Fishing boats', 'Fishing boats moored in the inner harbour, Brixham', '', 'img10.jpg', '2014-04-07 20:17:00'),
(14, 'Rose', 'a beautiful sunset over the Breakwater and marina, Brixham', '', 'img11.jpg', '2014-04-07 20:17:00'),
(15, 'Into town', 'across the marina to the inner harbour, Brixham', '<p>\r\nAlthough there is evidence of Ice age inhabitants here[citation needed], and probable trading in the Bronze Age, the first evidence of a town comes from the Saxon times. It is possible that Saxon settlement originated by sea from Hampshire in the Sixth Century, or overland around the year 800.[2]\r\n</p>\r\n<p>\r\nBrixham was called Briseham in the Domesday Book.[3] Its population then was 39.[4]\r\n</p>\r\n<p>\r\nBrixham was part of the former Haytor Hundred. The population was 3,671 in 1801[citation needed] and 8,092 in 1901. In 1334, the town''s value was assessed at one pound, twelve shillings and eightpence; by 1524, the valuation had risen to £24 and sixteen shillings. It is recorded as a borough from 1536, and a market is recorded from 1822.[5]\r\n</p>\r\n<p>\r\nWilliam Prince of Orange (afterwards King William III of Great Britain & Ireland) landed in Brixham, with his mainly Dutch army, on 5 November 1688 during the Glorious Revolution, and issued his famous declaration "The Liberties of England and The Protestant Religion I Will Maintain". Many local people still have Dutch surnames, being direct descendants of soldiers in that army.[citation needed] A road leading from the harbour up a steep hill, to where the Dutch made their camp, is still called Overgang, meaning ''passage'' in Dutch.[6]\r\n</p>\r\n<p>\r\nThe coffin house reflects Brixham humour: it is coffin-shaped and when a father was asked for the hand in marriage of his daughter, he said he would ''see her in a coffin, before she wed''. The future son-in-law bought the coffin-shaped property, called it the Coffin House, and went back to the father and said ''Your wishes will be met, you will see your daughter in a coffin, the Coffin House''. Amazed by this, the father gave his blessing.[7]\r\n</p>\r\n<p>\r\nThe street names reflect the town''s history. Pump Street is where the village pump stood. Monksbridge was a bridge built by the monks of Totnes Priory. Lichfield Drive was the route that the dead (from the Anglo-Saxon ''lich'' meaning a corpse) were taken for burial at St Mary’s churchyard. Salutation Mews, near the church, dates from when England was Catholic, and the salutation was to the Virgin Mary. Similarly, Laywell Road recalls Our Lady’s Well. The first building seen when coming into Brixham from Paignton is the old white-boarded Toll House where all travellers had to pay a fee to keep the roads repaired.\r\n</p>\r\n<p>\r\nThe tower of All Saints'' Church, founded in 1815, stands guard over the town. The composer of Abide With Me, Rev. Francis Lyte was a vicar at the church. He lived at Berry Head House, now a hotel, and when he was a very sick man, near to dying, he looked out from his garden as dusk fell over Torbay, and the words of that hymn came into his mind.\r\n</p>\r\n<p>\r\nThe main church is St. Mary''s, about a mile from the sea. It is the third to have been on the site (which was an ancient Celtic burial ground). The original wooden Saxon church was replaced by a stone Norman church that was, in its turn, built over in about 1360. Many of the important townspeople are buried in the churchyard.\r\n</p>\r\n<p>\r\nMany of Brixham''s photogenic cottages above the harbour were originally inhabited by fishermen and their families. Near the harbour is the famous Coffin House mentioned earlier. Many of the dwellings towards Higher Brixham were built largely between the 1930s to 1970s. Several holiday camps were built in this area, for example Pontin''s Wall Park and Dolphin. The Dolphin was one of the company''s biggest camps. The camp closed in 1991 after fire destroyed the main entertainments building.\r\n</p>\r\n<p>\r\nBrixham was served by the short Torbay and Brixham Railway from Churston. The line, opened in February 1868 to carry passengers and goods (mainly fish), was closed in May 1963 as a result of the Beeching Axe cuts. Although the former line to Brixham is deserted and overgrown, the branch line through nearby Churston is now maintained and operated as a heritage railway by a team of volunteers as the Paignton and Dartmouth Steam Railway.\r\n</p>\r\n<p>\r\nThe British Seaman’s Boys'' Home was founded in 1863 by William Gibbs of Tyntesfield for the orphan sons of deceased British seamen. It was closed in 1988 after 125 years.[8]\r\n</p>', 'img12.jpg', '2014-04-07 20:17:00'),
(16, 'Breakwater', 'along the Breakwater, Brixham', '', 'img13.jpg', '2014-04-07 20:17:00'),
(17, 'Lighthouse', 'Lighthouse at the end of the Breakwater, Brixham', '', 'img14.jpg', '2014-04-07 20:17:00'),
(18, 'Low tide', 'low tide in the inner harbour, Brixham', '', 'img15.jpg', '2014-04-07 20:17:00'),
(19, 'Storm brewing', 'a storm is brewing in Tor Bay, Brixham', '', 'img16.jpg', '2014-04-07 20:17:00'),
(20, 'Café', 'Breakwater Café, Brixham', '', 'img17.jpg', '2014-04-07 20:17:00'),
(21, 'Fish market', 'the new fish market and quay, Brixham', '', 'img18.jpg', '2014-04-07 20:17:00'),
(22, 'An overview of Brixham', 'a brief introduction to the fishing town of Brixham, Devon.', '<p>Brixham /ˈbrɪksəm/ is a small fishing town and civil parish in the county of Devon, in the south-west of England. Brixham is at the southern end of Torbay, across the bay (Tor Bay) from Torquay, and is a fishing port. Fishing and tourism are its major industries. At the time of the 2011 census it had a population of 16,693.[1]\r\n</p>\r\n<p>\r\nIt is thought that the name ''Brixham'' came from Brioc''s village. ''Brioc'' was an old English or Brythonic personal name and ''-ham'' is an ancient term for village.\r\n</p>\r\n<p>\r\nThe town is hilly and built around the harbour which remains in use as a dock for fishing trawlers. It has a focal tourist attraction in the replica of Sir Francis Drake''s ship the Golden Hind that is permanently moored there.\r\n</p>\r\n<p>\r\nIn summer the Cowtown carnival is held, a reminder of when Brixham was two separate communities with only a marshy lane to connect them. Cowtown was the area on top of the hill where the farmers lived, while a mile away in the harbour was Fishtown where the seamen lived. Cowtown, the St Mary''s Square area, is on the road leaving Brixham to the south west, in the direction of Kingswear, upon which stands a church built on the site of a Saxon original. The local Royal British Legion club is also here. The town holds a yearly pirate event which competes for the title of most pirates in one place and this draws visitors from far and wide.\r\n</p>', '', '2014-04-08 21:24:15'),
(23, 'A brief history of Brixham', 'a brief introductory history of the fishing town of Brixham, Devon.', '<p>\r\nAlthough there is evidence of Ice age inhabitants here[citation needed], and probable trading in the Bronze Age, the first evidence of a town comes from the Saxon times. It is possible that Saxon settlement originated by sea from Hampshire in the Sixth Century, or overland around the year 800.[2]\r\n</p>\r\n<p>\r\nBrixham was called Briseham in the Domesday Book.[3] Its population then was 39.[4]\r\n</p>\r\n<p>\r\nBrixham was part of the former Haytor Hundred. The population was 3,671 in 1801[citation needed] and 8,092 in 1901. In 1334, the town''s value was assessed at one pound, twelve shillings and eightpence; by 1524, the valuation had risen to £24 and sixteen shillings. It is recorded as a borough from 1536, and a market is recorded from 1822.[5]\r\n</p>\r\n<p>\r\nWilliam Prince of Orange (afterwards King William III of Great Britain & Ireland) landed in Brixham, with his mainly Dutch army, on 5 November 1688 during the Glorious Revolution, and issued his famous declaration "The Liberties of England and The Protestant Religion I Will Maintain". Many local people still have Dutch surnames, being direct descendants of soldiers in that army.[citation needed] A road leading from the harbour up a steep hill, to where the Dutch made their camp, is still called Overgang, meaning ''passage'' in Dutch.[6]\r\n</p>\r\n<p>\r\nThe coffin house reflects Brixham humour: it is coffin-shaped and when a father was asked for the hand in marriage of his daughter, he said he would ''see her in a coffin, before she wed''. The future son-in-law bought the coffin-shaped property, called it the Coffin House, and went back to the father and said ''Your wishes will be met, you will see your daughter in a coffin, the Coffin House''. Amazed by this, the father gave his blessing.[7]\r\n</p>\r\n<p>\r\nThe street names reflect the town''s history. Pump Street is where the village pump stood. Monksbridge was a bridge built by the monks of Totnes Priory. Lichfield Drive was the route that the dead (from the Anglo-Saxon ''lich'' meaning a corpse) were taken for burial at St Mary’s churchyard. Salutation Mews, near the church, dates from when England was Catholic, and the salutation was to the Virgin Mary. Similarly, Laywell Road recalls Our Lady’s Well. The first building seen when coming into Brixham from Paignton is the old white-boarded Toll House where all travellers had to pay a fee to keep the roads repaired.\r\n</p>\r\n<p>\r\nThe tower of All Saints'' Church, founded in 1815, stands guard over the town. The composer of Abide With Me, Rev. Francis Lyte was a vicar at the church. He lived at Berry Head House, now a hotel, and when he was a very sick man, near to dying, he looked out from his garden as dusk fell over Torbay, and the words of that hymn came into his mind.\r\n</p>\r\n<p>\r\nThe main church is St. Mary''s, about a mile from the sea. It is the third to have been on the site (which was an ancient Celtic burial ground). The original wooden Saxon church was replaced by a stone Norman church that was, in its turn, built over in about 1360. Many of the important townspeople are buried in the churchyard.\r\n</p>\r\n<p>\r\nMany of Brixham''s photogenic cottages above the harbour were originally inhabited by fishermen and their families. Near the harbour is the famous Coffin House mentioned earlier. Many of the dwellings towards Higher Brixham were built largely between the 1930s to 1970s. Several holiday camps were built in this area, for example Pontin''s Wall Park and Dolphin. The Dolphin was one of the company''s biggest camps. The camp closed in 1991 after fire destroyed the main entertainments building.\r\n</p>\r\n<p>\r\nBrixham was served by the short Torbay and Brixham Railway from Churston. The line, opened in February 1868 to carry passengers and goods (mainly fish), was closed in May 1963 as a result of the Beeching Axe cuts. Although the former line to Brixham is deserted and overgrown, the branch line through nearby Churston is now maintained and operated as a heritage railway by a team of volunteers as the Paignton and Dartmouth Steam Railway.\r\n</p>\r\n<p>\r\nThe British Seaman’s Boys'' Home was founded in 1863 by William Gibbs of Tyntesfield for the orphan sons of deceased British seamen. It was closed in 1988 after 125 years.[8]\r\n</p>', '', '2014-04-08 23:18:30'),
(25, 'Brixham inner harbour', 'Brixham inner harbour at dusk', '', 'img3.jpg', '2014-04-15 21:18:25'),
(26, 'Benches', 'enjoy a rest at the Breakwater, Brixham, Devon', '', 'img4.jpg', '2014-04-15 21:21:06'),
(27, 'Across the harbour', 'across the inner harbour, Brixham, Devon', '', 'img5.jpg', '2014-04-15 21:24:57'),
(28, 'Masts at sunset', 'the sun sets over Brixham marina, Devon', '', 'img6.jpg', '2014-04-15 21:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `content_group`
--

CREATE TABLE IF NOT EXISTS `content_group` (
  `content_group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_group_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_group_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`content_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content_group`
--

INSERT INTO `content_group` (`content_group_id`, `content_group_name`, `content_group_description`) VALUES
(1, 'gallery', 'organised collections of images'),
(2, 'work', 'collection of textual material'),
(3, 'transcriptions', 'transcribed material'),
(4, 'catalogue', 'list of items, typically in alphabetical or other systematic order'),
(5, 'book', 'a collection of textual documents, not necessarily by the same author etc, but considered inter-related and connected.');

-- --------------------------------------------------------

--
-- Table structure for table `content_lookup`
--

CREATE TABLE IF NOT EXISTS `content_lookup` (
  `content_id` int(10) unsigned NOT NULL,
  `content_group_id` int(11) NOT NULL,
  `content_type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `meta_id` int(10) unsigned NOT NULL,
  `taxa_id` int(11) NOT NULL,
  PRIMARY KEY (`content_id`,`content_group_id`,`content_type_id`,`user_id`,`meta_id`,`taxa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content_lookup`
--

INSERT INTO `content_lookup` (`content_id`, `content_group_id`, `content_type_id`, `user_id`, `meta_id`, `taxa_id`) VALUES
(1, 0, 1, 1, 0, 0),
(2, 0, 1, 1, 0, 0),
(3, 0, 1, 1, 0, 0),
(4, 0, 1, 1, 0, 0),
(5, 0, 1, 1, 0, 0),
(6, 0, 1, 1, 0, 0),
(7, 0, 1, 1, 0, 0),
(8, 0, 1, 1, 0, 0),
(9, 0, 1, 1, 0, 0),
(10, 1, 2, 1, 3, 3),
(11, 1, 2, 1, 3, 3),
(12, 1, 2, 1, 3, 3),
(13, 1, 2, 1, 3, 3),
(14, 1, 2, 1, 3, 3),
(15, 1, 2, 1, 3, 3),
(16, 1, 2, 1, 3, 3),
(17, 1, 2, 1, 3, 3),
(18, 1, 2, 1, 3, 3),
(19, 1, 2, 1, 3, 3),
(20, 1, 2, 1, 3, 3),
(21, 1, 2, 1, 3, 3),
(22, 5, 1, 1, 5, 3),
(23, 5, 1, 1, 5, 3),
(25, 1, 2, 1, 3, 3),
(26, 1, 2, 1, 3, 3),
(27, 1, 2, 1, 3, 3),
(28, 1, 2, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `content_meta`
--

CREATE TABLE IF NOT EXISTS `content_meta` (
  `meta_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_source` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_creator` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content_meta`
--

INSERT INTO `content_meta` (`meta_id`, `meta_subject`, `meta_source`, `meta_creator`) VALUES
(1, 'chicago river', 'photo album', 'ancientlives'),
(2, 'cannes harbour', 'photo album', 'ancientlives'),
(3, 'brixham, devon, boats, golden hind', 'photo album', 'ancientlives'),
(4, 'brixham, harbour, boats, st mary''s, church, gold hind', 'digital', 'ancientlives'),
(5, 'brixham, devon', 'textual, digital, wikipedia', 'ancientlives');

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE IF NOT EXISTS `content_type` (
  `content_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_type_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_type_desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`content_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`content_type_id`, `content_type_name`, `content_type_desc`) VALUES
(1, 'text', 'content defined as textual or text based'),
(2, 'image', 'content defined as image or visually based'),
(3, 'audio', 'content defined as audio based for output and playback'),
(4, 'video', 'content defined as video based for output and playback'),
(5, 'bibliography', 'content defined as a bibliographical record or data'),
(6, 'tei', 'textual material marked up using the XML schema TEI P5');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `menu_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_description`) VALUES
(1, 'main menu', 'main menu for persistent static site links - normally rendered in the header section of the framework template'),
(2, 'site content', 'a menu for site wide content links');

-- --------------------------------------------------------

--
-- Table structure for table `menu_lookup`
--

CREATE TABLE IF NOT EXISTS `menu_lookup` (
  `menu_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`,`node_id`,`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_lookup`
--

INSERT INTO `menu_lookup` (`menu_id`, `node_id`, `parent_id`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 2),
(1, 5, 0),
(1, 6, 0),
(1, 7, 6),
(1, 8, 6),
(2, 6, 0),
(2, 7, 0),
(2, 8, 0),
(2, 9, 7),
(2, 10, 8),
(2, 11, 0),
(2, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `node_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `node_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `node_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `node_link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`node_id`, `node_name`, `node_desc`, `node_link`) VALUES
(1, 'home', 'return to the home page', 'content/text&id=1'),
(2, 'about', 'about the site', 'content/text&id=2'),
(3, 'contact', 'contact information for the site', 'content/text&id=3'),
(4, 'copyright', 'copyright information for site material', 'content/text&id=4'),
(5, 'help', 'helpful information for using the site', 'content/text&id=5'),
(6, 'site content', 'an overview of current site content', 'content/text&id=6'),
(7, 'image galleries', 'an overview of site image galleries', 'content/text&id=7'),
(9, 'Brixham gallery', 'an image gallery of Brixham, Devon', 'content/image/gallery&id=3'),
(8, 'books', 'an overview of site books', 'content/text&id=8'),
(10, 'Brixham book', 'a book about Brixham, Devon', 'content/text/book&id=3'),
(11, 'collections', 'an overview of site collections', 'content/text&id=9'),
(12, 'Brixham', 'all material for the collection ''Brixham''', 'taxonomy&id=3');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
  `plugin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_directory` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`plugin_id`, `plugin_name`, `plugin_desc`, `plugin_directory`) VALUES
(1, 'image_zoom', 'zoom tool for rendered images', 'image_zoom'),
(2, 'image_magnify', 'magnify tool for images', 'image_magnify'),
(3, 'image_popup', 'popup viewer for images', 'image_popup'),
(4, 'pager', 'page through a returned set of results', 'pager'),
(5, 'xml_style', 'style XML elements rendered in a HTML document', 'xml_style');

-- --------------------------------------------------------

--
-- Table structure for table `plugins_lookup`
--

CREATE TABLE IF NOT EXISTS `plugins_lookup` (
  `plugin_id` int(10) unsigned NOT NULL,
  `plugin_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_group` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`plugin_id`,`plugin_type`,`content_type`,`content_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plugins_lookup`
--

INSERT INTO `plugins_lookup` (`plugin_id`, `plugin_type`, `content_type`, `content_group`) VALUES
(1, 'content', 'image', ''),
(2, 'content', 'image', ''),
(3, 'content', 'image', 'gallery'),
(3, 'taxonomy', '', ''),
(4, 'content', '', 'book'),
(4, 'content', 'image', 'gallery'),
(4, 'taxonomy', '', ''),
(5, 'content', 'text', '');

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE IF NOT EXISTS `taxonomy` (
  `taxa_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taxa_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `taxa_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`taxa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`taxa_id`, `taxa_name`, `taxa_description`) VALUES
(1, 'devon', 'a county in the south west of England'),
(2, 'cornwall', 'a county in the south west of England'),
(3, 'brixham', 'a town in Devon - famous for its fishing and picturesque harbour, marina, and sea wall');

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy_lookup`
--

CREATE TABLE IF NOT EXISTS `taxonomy_lookup` (
  `taxa_id` int(10) unsigned NOT NULL,
  `taxa_parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`taxa_id`,`taxa_parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxonomy_lookup`
--

INSERT INTO `taxonomy_lookup` (`taxa_id`, `taxa_parent_id`) VALUES
(3, 1);

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
