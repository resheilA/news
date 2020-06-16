-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 06:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(255) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_summary` varchar(550) NOT NULL,
  `article_key` varchar(255) NOT NULL,
  `article_content` blob NOT NULL,
  `article_category` int(255) NOT NULL,
  `article_create` datetime NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_unique_key` varchar(10) NOT NULL,
  `article_block` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_summary`, `article_key`, `article_content`, `article_category`, `article_create`, `article_image`, `article_unique_key`, `article_block`) VALUES
(33, 'An Article on football', 'Something', '', 0x3c703e536f6d657468696e6720636f6f6c20616e6420736f6d653c2f703e0a, 41, '2020-06-07 17:27:26', 'Profile.jpg', 'a3jo21fwwj', 0),
(34, 'An Article on football2', 'dsadsa', '', 0x3c703e6473616473736473616473616473613c2f703e0a, 41, '2020-06-16 12:00:34', 'Profile.jpg', '4jlyiphu5y', 0),
(35, 'An Article on football3', 'ssadwadwdwa', '', 0x3c703e68657920686f772061726520646f696e673c2f703e0a, 41, '2020-06-16 12:01:47', 'Profile.jpg', '1l6doa02ar', 0),
(36, 'An Article on football4', 'dsadsa', '', 0x3c703e64736164736164736164617364736161777777777777777777777777773c2f703e0a, 41, '2020-06-16 12:02:22', 'Profile.jpg', 'lhi439k913', 0),
(37, 'An Article on football4', 'sdadwwead', '', 0x3c703e64737373736177646177643c2f703e0a, 41, '2020-06-16 12:02:47', 'Profile.jpg', '33wj8ar101', 0),
(38, 'An Article on football5', 'dsads', '', 0x3c703e647361647361647361643c2f703e0a, 41, '2020-06-16 12:03:26', 'Profile.jpg', 'yr2a3jljdp', 0),
(39, 'An Article on Basketball', 'Basketball is pretty cool', '', 0x3c703e536c616d2064756e6b3c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e3c696d6720616c743d2222207372633d2268747470733a2f2f732e79696d672e636f6d2f6e792f6170692f7265732f312e322f7a5a492e796d4c5f624f5f6648624c4f3079744359672d2d7e412f595842776157513961476c6e61477868626d526c636a747a625430784f3363394e6a45324f3267394e4445782f68747470733a2f2f6d656469612e7a656e66732e636f6d2f656e2f676f6c665f6469676573745f372f663235353864343161373134383132356539653365343031326466663866633122207374796c653d22666c6f61743a6c6566743b206865696768743a31333370783b2077696474683a323030707822202f3e3c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e4c6562726f6e2064696420746861743c2f703e0a, 42, '2020-06-16 13:56:50', 'Profile.jpg', '1a8kasihe0', 0),
(40, 'Test', 'Shouldnt', 'ds,hey', 0x3c703e68656c6c6f7373733c2f703e0a, 41, '2020-06-16 18:01:41', 'Profile.jpg', '1rpjdalpw4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category` (`article_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_category`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
