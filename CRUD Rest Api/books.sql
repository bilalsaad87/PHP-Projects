-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 04:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `author` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `description` longtext NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `created`, `description`, `year`) VALUES
(1, 'Scrum', 'James Turner', '2021-10-23 15:40:16', 'Does your business rely on a software development framework? Is your current method failing to help you achieve your aims? Have you considered Scrum as an alternative? Most business models need a software framework that can help them to be more efficient. In the past many such frameworks failed as they were conceived as stand-alone concepts that relied on individuals. But Scrum is different and relies on teamwork to achieve its goals.', 2019),
(2, 'Software Developer Life', 'David Xiang', '2021-10-23 15:40:16', 'Software Developer Life -- Career, Learning, Coding, Daily Life, Stories\r\nWe\'ve made a dent into the 21st century and software has been eating the world. Suspenseful tech dramas play out in the news, boot camps churn out entry-level developers in a matter of months, and there\'s even an HBO show dedicated to Silicon Valley.', 2018),
(3, 'Introduction to Disciplined Agile Delivery 2nd Edition', 'Mark Lines, Scott William Ambler', '2021-10-23 15:43:57', 'Introduction to Disciplined Agile Delivery 2nd Edition provides a quick overview of how agile software development works from beginning-to-end. It describes Disciplined Agile Delivery (DAD), the first of four levels of the Disciplined Agile (DA) process improvement toolkit, and works through a case study describing a typical agile team’s experiences adopting a DA approach.The book describes how the team develops the first release of a mission-critical application while working in a legacy enterprise environment.', 2018),
(4, 'Effective Ruby', 'Peter J. Jones', '2021-10-23 15:43:57', 'New', 2014),
(5, 'Programming Beyond Practices', 'Gregory T Brown', '2021-10-23 15:46:27', 'Writing code is the easy part of your work as a software developer. This practical book lets you explore the other 90%—everything from requirements discovery and rapid prototyping to business analysis and designing for maintainability. Instead of providing neatly packaged advice from on high, author Gregory Brown presents detailed examples of the many problems developers encounter, including the thought process it takes to solve them\r\nHe does this in an unusual and entertaining fashion by making you the main character in a series of chapter-length stories.', 2016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
