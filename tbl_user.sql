-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 11:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(230) NOT NULL,
  `username` varchar(230) NOT NULL,
  `email` varchar(230) NOT NULL,
  `password` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Rubel Hossain', 'rubel', 'rubelphp94@gmail.com', '124bd1296bec0d9d93c7b52a71ad8d5b'),
(2, 'Md Sabbir Ahmed', 'sabbir', 'sabbir@gmail.com', '781e5e245d69b566979b86e28d23f2c7'),
(3, 'Rubel Hossain', 'rble', 'emrirubel421@gmail.com', '781e5e245d69b566979b86e28d23f2c7'),
(4, 'Rasel Hossain', 'rasel', 'rasel1@gmail.com', '781e5e245d69b566979b86e28d23f2c7'),
(5, 'Rakibul', 'rakibul', 'rakib10@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a'),
(6, 'asdfasa', 'sdfdff', 'rakib@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, 'Ash', 'asharaful', 'ashraful@gmail.com', '670b14728ad9902aecba32e22fa4f6bd'),
(8, 'Amin Mahmudul', 'Aminm', 'amin@gmail.com', '781e5e245d69b566979b86e28d23f2c7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
