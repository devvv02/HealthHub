-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 06:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `authuser` varchar(500) NOT NULL,
  `meduser` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `callbacks`
--

INSERT INTO `callbacks` (`authuser`, `meduser`, `email`, `mob`, `datetime`) VALUES
('Adarsh Hospital', 'Dev Patel', 'mrdevilchamp37@gmail.com', '9327073171', '2024-06-11 14:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `medfacs`
--

CREATE TABLE `medfacs` (
  `authuser` varchar(500) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `type` varchar(15) NOT NULL,
  `spec` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medfacs`
--

INSERT INTO `medfacs` (`authuser`, `pass`, `address`, `type`, `spec`) VALUES
('Adarsh Hospital', '$2y$10$IhxV6nohl8aXs6noRJ2M3.gf/0ex1dAOdE8FcDrimci/4IU3zVzBm', 'Amar Sapna Aparment Adarsh Society, Nanpura, Surat.', 'hospital', 'Private Hospital'),
('Adventist Wockhardt Heart Hospital', '$2y$10$VlettQDLZpP4XJVI2j9HMOc4HrJg.k75WkLmfcnMCSU0bWV.8Hkbu', 'K Desai Marg, Opposite Chowpatty, Athwalines, Surat.', 'hospital', 'Heart Specialist'),
('Apollo Hospital', '$2y$10$YDhN1rF.Fw7IRvtTRGABAONaqaXPeqtEMQbCu9NxC0WAIwPDarWNG', 'Anand Mahal Road, Girinagar Society, Muktanand Nagar, Surat.', 'hospital', 'Private Hospital'),
('Baps Pramukh Swami Hospital', '$2y$10$Ya.NBa1hFR8BAfOLlC8g1.ZIBDBTWhG/GWDUDO7PRkYf3qsWddwn2', 'Shri Pramukh Swami Maharaj Marg, Adajan Char Rasta, Surat.', 'hospital', 'Private Hospital'),
('Bombay Maternity Hospital', '$2y$10$JxdEGBPj9an38WtY5et/veyJEos27CRpJdzuSMdd1mLsDPHJPYqAa', '2nd Floor, City Light Road, Surat.', 'hospital', 'Private Maternity Hospital'),
('Dr. Sachdev Eye Hospital', '$2y$10$z1pdEkyNlqWo.Df8HnqBE.Zo0KkTCw2mWtWrfCXIa2LeGQgif7sTK', '5th Floor, Platinum Plaza, Near Pooja Abhishek, Parle Point, Surat.', 'hospital', 'Eye Hospital'),
('Gabani Kidney Hospital', '$2y$10$R5My3wK1yGlGvpmQQail8OE44gHkItvIrNgOL2kZcX8GEZIron4re', '1st Floor, Dhan Laxmi Complex, Near Aurved College, Station-Lal Darwaja Road, Surat', 'hospital', 'Kidney Specialist'),
('Kadhiwala Orthopadic Hospital', '$2y$10$kLACdjrp2OFctwaaJit66ery54EKv30gPjs6NvGrO6CPr8UM5bPpa', 'Athugar Mohallo, Nanpura, Surat.', 'hospital', 'Private Orthopedic Hospital'),
('Metropolis Healthcare Ltd-PSC', '$2y$10$kN0SEjOqstiX0ow3j2ku.eznA4yQl2YOgrF6aOugu/ODPFiqhFkyq', 'Shop No 13 to 21, GF, Condominium Cplx, AC Market, VIP Road, Surat - 394518', 'labs', 'Pathology Lab'),
('Tulsi Pathology Laboratory', '$2y$10$Yos.Js4843qmSaLhupnmWuhN4OkDJNJoiybT2SuHtDTvXQ/ZjoVW6', 'A-12, Sarthi Complex, 1st Floor, Near Doctor House Varachha Road, Surat - 395006', 'labs', 'Pathology Lab'),
('Manav Clinical Laboratory', '$2y$10$xG9dC9i.xftPBx.PWMOYMeu4KiOhtLeSa6f6ZUmQzFD3vvG5mCfS.', '2nd Floor, Doctor House, Unapani Road LAL Darwaja, Surat - 395003', 'labs', 'Clinical Laboratory'),
('Perfect Diagnostics', '$2y$10$EUNyQJrFp89pkqC9lX8BW.jQeGhw1SBVgbwpD.06fyARL.rd4A1G6', '33/36, 2nd Floor Sheetal Shopping Square, Opposite Fire Brigade, Near Turning Point Bhatar Road, Surat - 395007', 'labs', 'MRI Scan, CT Scan'),
('Summirow Dental Clinic', '$2y$10$oC3O38kXP0pkQuHEEiWSsuhrL.2G6z84TVdH9yXvXM/XMQVwNXwG.', 'Adajan', 'clinic', 'Dentist, Orthodontist'),
(' Moon Mind Care', '$2y$10$dC6DsQjU5A1qFYK.94eobu8npKfYO1x.Z2szA8B3Rf0Bsv40HqeCC', 'Rander', 'clinic', 'Sexology Clinic'),
('Dr Batra\\\'s Positive Health Clinic Pvt Ltd', '$2y$10$Hdj.I2QZQpHF3RzA2jLoa..LZmyt3hIHko9QIbfDgfbOUKj5bmjcG', 'Athwagate, Surat', 'clinic', 'Homeopathic'),
('Bavishi Fertility Clinic', '$2y$10$xuSXpJd1dU7HR0oXXcJdSeKWJIgwzdmbRcpFSTwblG20Bw81lKRbi', 'Lal Darwaja, Surat.', 'clinic', 'Gynecology  '),
('Viradiya Skin Care & Cosmetic Clinic', '$2y$10$M5WjAOKMbI5WOjeWkZoIVelOpGLkpG4qNxMgdoCOkSaoSi.jNq8mi', 'Mota Varachha, Surat', 'clinic', 'Dermatologist, Cosmetic'),
(' Sadbhav Neuropsychiatry Clinic', '$2y$10$jHVXbouGR7bTbvjklqdzQuDdVTkFuxgemDGDEJag4LfcS2DKNEiMW', 'Vesu, Surat', 'clinic', 'Multi-Speciality Clinic');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
