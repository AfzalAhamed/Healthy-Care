-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: sdb-n.hosting.stackcp.net
-- Generation Time: Dec 28, 2021 at 05:24 PM
-- Server version: 10.4.21-MariaDB-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthycare`
--
CREATE DATABASE IF NOT EXISTS `healthycare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `healthycare`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `activity` int(1) NOT NULL DEFAULT 0,
  `2fa` int(1) NOT NULL DEFAULT 0,
  `pin` varchar(6) NOT NULL DEFAULT '0',
  `reset_password` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`, `activity`, `2fa`, `pin`, `reset_password`) VALUES
('afzal', '123', 'ahamedafzal45@gmail.com', 0, 1, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity`
--

CREATE TABLE `admin_activity` (
  `id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_activity`
--

INSERT INTO `admin_activity` (`id`, `device`, `ip`, `time`) VALUES
(2, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:819d:2df6:228:2343:ca91', '2021-11-21 22:51:12'),
(3, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:819d:2df6:228:2343:ca91', '2021-11-21 22:52:25'),
(4, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:819d:2df6:228:2343:ca91', '2021-11-21 23:22:07'),
(5, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:819d:2df6:228:2343:ca91', '2021-11-21 23:23:43'),
(6, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:819d:2df6:228:2343:ca91', '2021-11-22 01:34:50'),
(7, '(X11; x86_64) AppleWebKit/537.36 (KHTML, ', '2402:4000:b183:5bb:1:0:a0cb:9f08', '2021-11-22 01:35:55'),
(8, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a500:7b3f:52d:136e:24cd:c8e1', '2021-11-22 10:19:04'),
(9, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a500:7b3f:c29:3bf7:d859:3bf8', '2021-11-22 13:29:53'),
(10, '(Windows 10.0; Win64; x64) Chrome/94.0.4606.81', '112.135.77.190', '2021-11-24 14:18:42'),
(11, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:e4c1:698a:e134:4c62:c81c', '2021-11-24 14:18:43'),
(12, '(Windows 10.0; Win64; x64) Chrome/96.0.4664.45', '2402:d000:a400:5a0:e52f:1f1c:cfe4:7387', '2021-11-24 18:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `a_id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_illltype` text NOT NULL,
  `a_datetiime` date NOT NULL,
  `a_status` varchar(50) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `ch_id`, `c_id`, `a_illltype`, `a_datetiime`, `a_status`) VALUES
(80, 28, 33, 'fever', '2021-11-30', 'Appointed'),
(81, 28, 33, 'headache', '2021-11-30', 'Processing'),
(82, 28, 33, 'fever', '2021-11-29', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `chanelcenter`
--

CREATE TABLE `chanelcenter` (
  `ch_id` int(11) NOT NULL,
  `ch_name` text NOT NULL,
  `ch_email` text NOT NULL,
  `ch_password` text NOT NULL,
  `ch_telephone` text NOT NULL,
  `ch_licence` text NOT NULL,
  `ch_address` text NOT NULL,
  `ch_town` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chanelcenter`
--

INSERT INTO `chanelcenter` (`ch_id`, `ch_name`, `ch_email`, `ch_password`, `ch_telephone`, `ch_licence`, `ch_address`, `ch_town`) VALUES
(1, 'Miracle Channel center', 'ininfo@miraclehospitals.lk', 'Helth.M.!23', '377390350', 'PV89672345', '223, Dambulla Road,Kurunegala.', 'Kurunegala'),
(2, 'New Medical Laboratory And Channeling Center', 'newmedical@gmail.com', 'CoX!123', '713490729', 'PV56790091', 'J68X+4J Wariyapola', 'Wariyapola'),
(3, 'Suwasetha Medical Center', 'medical.c@gmail.com', 'BNc@O1', '379654781', 'PV78012356', 'Polgahawela-Kegalle Hwy, Polgahawela', 'Polgahawela'),
(4, 'GlobalMed Channel center', 'globalmed12@gmail.com', 'Cmd!2', '372223975', 'PV56118900', 'No:22 Katugasthota-Kurunegala-Puttalam Hwy  Kurunegala', 'Maho'),
(5, 'Suhada Channeling Center', 'suhada.c@gmail.com', 'Wen2@', '372260349', 'PV20089012', 'South, Nikaweratiya', 'Nikaweratiya'),
(6, 'The Doctor Channeling Center', 'thedoctor.c@gmail.com', 'POPns@1', '377377388', 'PV32890138', 'Melsiripura', 'Melsiripura'),
(7, 'Suwa Piyasa Medical Center', 'suwapiyasa@gmail.com', 'SrSp0', '372249245', 'PV60367891', 'No.103 Kurunegala-Narammala-Madmpe Rd, Narammala', 'Narammala'),
(8, 'Samusetha Channeling Center', 'samusetha@gmail.com', 'NQ00Pa', '374536851', 'PV56871423', 'Negambo-Kurunegala Rd, Pannala', 'Pannala'),
(9, 'Channeling Center', 'chaneling.c@gmail.com', 'Adh12', '379963145', 'PV36985214', 'Ibbagamuwa', 'Ibbagamuwa'),
(10, 'Dr Asela\'s Medical Center', 'aselamedi@gmail.com', 'CNr@1', '718055871', 'PV69874521', 'Alawwa Batuwatta Rd, Alawwatta', 'Alawwa'),
(11, 'Medical center', 'medi.c@gmail.com', 'Bons#12', '372284699', 'PV25634789', 'Madampe Rd, Kuliyapitiya', 'Kuliyapitiya'),
(12, 'Oradent Clinic', 'oradent@gmail.com', 'Com123', '775305384', 'PV56412536', 'hettipola', 'hettipola'),
(13, 'SuwaSewana Channeling Center', 'suwasewana@gmail.com', 'Pons123#', '372253478', 'PV78651496', 'Galgamuwa', 'Galgamuwa'),
(14, 'Sampatha Medical Center', 'sampatha@gmail.com', 'Xon#1', '372299119', 'PV63147896', 'Rambaththa Rd, Mawathagama', 'Mawathagama'),
(15, 'Ashoka Channeling Center', 'ashoka@gmail.com', 'Von123', '770723158', 'PV54237896', '64c A6, Pothuhera', 'Pothuhera'),
(28, 'Janith Chanel ', 'nadeerajanith97@gmail.com', '*E9BC496F090F2EF5D250655C8EDCD4D89B9BC12F', '0710718926', 'JN123', 'Kurunagala', 'Kurunegala');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_email` text NOT NULL,
  `c_password` text NOT NULL,
  `c_gender` text NOT NULL,
  `c_dob` text NOT NULL,
  `c_address` text NOT NULL,
  `c_town` text NOT NULL,
  `c_telephone` text NOT NULL,
  `c_nic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_password`, `c_gender`, `c_dob`, `c_address`, `c_town`, `c_telephone`, `c_nic`) VALUES
(32, 'Afzal ', 'afzal@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Men', '2000/10/06', 'Dont have a street', 'Kurunegala', '+11111111111', '200028003025'),
(33, 'kasun aroshana', 'kasunpremarathna244@gmail.com', '*FFCDFB8BE9146773F9011643D1088D5823250331', 'Men', '1999/9/12', 'kurunegala', 'Kurunegala', '0784939898', '992566337v'),
(34, 'Ruchira subodha', 'subodharuchira@gmail.com', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'Men', '09/05/1999', 'kalo gahawathta road bamunugedara kurunegala', 'Kurunegala', '0763312050', '199913002050'),
(35, 'Afzal Ahamed', 'ahamedafzal45@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Men', '2000/10/06', 'Nazmila farm, bandawa, polgahawela', 'Kurunegala', '+94768884879', '200028003025');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `d_id` int(11) NOT NULL,
  `d_name` text NOT NULL,
  `d_email` text NOT NULL,
  `d_password` text NOT NULL,
  `d_dob` text NOT NULL,
  `d_address` text NOT NULL,
  `d_town` varchar(50) NOT NULL,
  `d_telephone` int(11) NOT NULL,
  `d_lcence` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`d_id`, `d_name`, `d_email`, `d_password`, `d_dob`, `d_address`, `d_town`, `d_telephone`, `d_lcence`, `count`) VALUES
(36, 'Shehan', 'silvakshehan99@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '1999.10.5', 'Sundarapola, Wewagedara, Kurunegala', 'Kurunegala', 123546, 'B4414281', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_telephone` varchar(12) NOT NULL,
  `sender_subject` varchar(50) NOT NULL,
  `sender_message` varchar(255) NOT NULL,
  `email_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `sender_name`, `sender_email`, `sender_telephone`, `sender_subject`, `sender_message`, `email_datetime`, `email_status`) VALUES
(8, 'Afzal Ahamed', 'ahamedafzal45@gmail.com', '+94768884879', 'Test 1', 'Test Message 1', '2021-11-22 17:44:58', 'Read'),
(9, 'Afzal Ahamed', 'ahamedafzal45@gmail.com', '+94768884879', 'Test 2', 'This Is Test2', '2021-11-22 17:46:23', 'Read'),
(10, 'Afzal Ahamed', 'ahamedafzal45@gmail.com', '+94768884879', 'Test 3', 'This is test 3\r\n', '2021-11-22 17:46:39', 'Read'),
(12, 'Afzal Ahamed', 'ahamedafzal45@gmail.com', '+94768884879', 'Website not loading ', 'Send Message', '2021-11-29 03:34:53', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `er_id` int(11) NOT NULL,
  `er_type` text NOT NULL,
  `msg` varchar(255) NOT NULL,
  `er_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `er_status` varchar(50) NOT NULL DEFAULT 'Processing',
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`er_id`, `er_type`, `msg`, `er_datetime`, `er_status`, `c_id`) VALUES
(20, '119', '', '2021-11-22 16:44:21', 'On The Way', 32),
(21, '119', 'hi', '2021-11-25 14:31:24', 'Processing', 32);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_email` text NOT NULL,
  `e_telephone` varchar(12) NOT NULL,
  `e_name` text NOT NULL,
  `e_nic` text NOT NULL,
  `e_address` text NOT NULL,
  `e_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employeelogin`
--

CREATE TABLE `employeelogin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeelogin`
--

INSERT INTO `employeelogin` (`email`, `password`) VALUES
('ruchira@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `o_des` text DEFAULT NULL,
  `o_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `o_status` varchar(50) NOT NULL DEFAULT 'Processing',
  `o_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `c_id`, `p_id`, `d_id`, `o_des`, `o_datetime`, `o_status`, `o_image`) VALUES
(120, 33, 25, 36, 'panadol', '2021-11-29 03:10:18', 'Canceled', 'uploads/1recipe.jpg'),
(121, 33, 25, 36, 'penadol', '2021-11-29 04:43:33', 'Canceled', 'uploads/120recipe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_email` text NOT NULL,
  `p_password` text NOT NULL,
  `p_telephone` text NOT NULL,
  `p_address` text NOT NULL,
  `p_town` text NOT NULL,
  `p_licecne` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`p_id`, `p_name`, `p_email`, `p_password`, `p_telephone`, `p_address`, `p_town`, `p_licecne`, `count`) VALUES
(25, 'channa', 'channa.dhananjaya13@gmail.com', '*8D29A7BA4B42B9945D8C79479483539E54F1B067', '0771131390', 'kurunegala', 'Kurunegala', 'BR200', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `ch1` (`ch_id`),
  ADD KEY `c3` (`c_id`);

--
-- Indexes for table `chanelcenter`
--
ALTER TABLE `chanelcenter`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`er_id`),
  ADD KEY `c2` (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `employeelogin`
--
ALTER TABLE `employeelogin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `c1` (`c_id`),
  ADD KEY `p1` (`p_id`),
  ADD KEY `d1` (`d_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_activity`
--
ALTER TABLE `admin_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `chanelcenter`
--
ALTER TABLE `chanelcenter`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `er_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
