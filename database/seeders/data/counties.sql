-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Generation Time: Nov 18, 2022 at 11:31 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`) VALUES
(33, 'Alba'),
(34, 'Arad'),
(35, 'Arges'),
(36, 'Bacau'),
(37, 'Bihor'),
(38, 'Bistrita-Nasaud'),
(39, 'Botosani'),
(40, 'Braila'),
(41, 'Brasov'),
(42, 'Bucuresti'),
(43, 'Buzau'),
(44, 'Calarasi'),
(45, 'Caras-Severin'),
(46, 'Cluj'),
(47, 'Constanta'),
(48, 'Covasna'),
(49, 'Dambovita'),
(50, 'Dolj'),
(51, 'Galati'),
(52, 'Giurgiu'),
(53, 'Gorj'),
(54, 'Harghita'),
(55, 'Hunedoara'),
(56, 'Ialomita'),
(57, 'Iasi'),
(58, 'Ilfov'),
(59, 'Maramures'),
(60, 'Mehedinti'),
(61, 'Mures'),
(62, 'Neamt'),
(63, 'Olt'),
(64, 'Prahova'),
(65, 'Salaj'),
(66, 'Satu Mare'),
(67, 'Sibiu'),
(68, 'Suceava'),
(69, 'Teleorman'),
(70, 'Timis'),
(71, 'Tulcea'),
(72, 'Valcea'),
(73, 'Vaslui'),
(74, 'Vrancea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
