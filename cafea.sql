-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 02:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafea`
--

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `id` int(5) NOT NULL,
  `cantitate` bigint(10) NOT NULL,
  `idSortiment` int(3) NOT NULL,
  `rasneala` varchar(10) NOT NULL,
  `dataLimita` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`id`, `cantitate`, `idSortiment`, `rasneala`, `dataLimita`, `status`) VALUES
(9, 1, 1, '', '2022-07-15', 'activa');

-- --------------------------------------------------------

--
-- Table structure for table `infocuptor`
--

CREATE TABLE `infocuptor` (
  `id` int(11) NOT NULL,
  `dataUngere` date NOT NULL,
  `timpFunctionare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infocuptor`
--

INSERT INTO `infocuptor` (`id`, `dataUngere`, `timpFunctionare`) VALUES
(1, '2022-07-05', 0),
(2, '2022-07-13', 300),
(3, '2022-07-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prajeli`
--

CREATE TABLE `prajeli` (
  `id` int(5) NOT NULL,
  `cantitateVerde` bigint(10) NOT NULL,
  `idSortiment` int(4) NOT NULL,
  `numePrajitor` varchar(15) NOT NULL,
  `dataPrajelii` date NOT NULL,
  `cantitatePrajita` bigint(10) NOT NULL,
  `temperaturaIntrare` int(11) NOT NULL,
  `temperaturaIesire` int(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  `durataPrajire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prajeli`
--

INSERT INTO `prajeli` (`id`, `cantitateVerde`, `idSortiment`, `numePrajitor`, `dataPrajelii`, `cantitatePrajita`, `temperaturaIntrare`, `temperaturaIesire`, `note`, `durataPrajire`) VALUES
(14, 100, 20, 'sare', '2022-07-04', 50, 10, 20, 'note prajire', 3),
(15, 123, 18, 'sare', '2022-07-04', 123, 22, 23, 'nu am nimic de zic', 8),
(16, 800, 19, 'sare', '2022-07-04', 500, 12, 12, 'nu am nici o nota', 11),
(17, 100, 18, 'sare', '2022-07-05', 100, 12, 12, 'nu este', 100),
(18, 10, 13, 'sare', '2022-07-05', 10, 10, 10, 'nu e', 100);

-- --------------------------------------------------------

--
-- Table structure for table `sortiment`
--

CREATE TABLE `sortiment` (
  `id` int(4) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `detalii` longtext NOT NULL,
  `detaliiPrajire` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortiment`
--

INSERT INTO `sortiment` (`id`, `nume`, `detalii`, `detaliiPrajire`) VALUES
(1, 'Halabuia', 'mare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiav', 'mare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuia'),
(2, 'Halabuia', 'mare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiav', 'mare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuiamare descriere pt halabuia'),
(13, 'cel mai mare sortiment', '', ''),
(14, '123', '', ''),
(15, 'un nou sortiment mic', '', ''),
(16, 'un nou sortiment mic', '', ''),
(17, '123', '', ''),
(18, 'Sapca', 'pui sapca', 'iei sapca'),
(19, 'sortimentTest', 'n-avem', 'n-avem'),
(20, 'ultimuSortiment', 'info sortiment', 'instructiuni prajire'),
(21, 'test', 'cafea frucrata', 'mai tare mai incet'),
(22, 'altTest', 'inca nu e prajita', 'prajeste-o');

-- --------------------------------------------------------

--
-- Table structure for table `stocprajita`
--

CREATE TABLE `stocprajita` (
  `id` int(11) NOT NULL,
  `idSortiment` int(4) NOT NULL,
  `cantitate` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocprajita`
--

INSERT INTO `stocprajita` (`id`, `idSortiment`, `cantitate`) VALUES
(1, 1, 12246),
(2, 2, 11321),
(5, 10, 0),
(6, 12, 0),
(7, 13, 10),
(8, 14, 0),
(9, 15, 0),
(10, 16, 0),
(11, 17, 0),
(12, 18, 323),
(13, 19, 0),
(14, 20, 100),
(15, 21, -1),
(16, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocverde`
--

CREATE TABLE `stocverde` (
  `id` int(5) NOT NULL,
  `idSortiment` int(4) NOT NULL,
  `cantitate` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocverde`
--

INSERT INTO `stocverde` (`id`, `idSortiment`, `cantitate`) VALUES
(1, 1, 2),
(2, 2, 321),
(5, 10, 100),
(6, 12, 10),
(7, 13, 113),
(8, 14, 123),
(9, 15, 100),
(10, 16, 100),
(11, 17, 123),
(12, 18, 9910),
(13, 19, 200),
(14, 20, 0),
(15, 21, 1000),
(16, 22, 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `tipUser` varchar(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `parola` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `tipUser`, `userName`, `parola`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'manager', 'sare', '$2y$10$CAvpfWXOLrz9mQ5CCIKYXeN/ytspduK/uUtwp3Ol7QU3v2gtiWSxa'),
(3, 'prajitor', 'rase', '$2y$10$B.fh8YTLRjRt9oCWU9U8EOK5cJiCoJnLGfcflOxHtWAHgk2HTpKbW');

-- --------------------------------------------------------

--
-- Table structure for table `vanzari`
--

CREATE TABLE `vanzari` (
  `id` int(11) NOT NULL,
  `idSortiment` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `scop` varchar(10) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vanzari`
--

INSERT INTO `vanzari` (`id`, `idSortiment`, `cantitate`, `scop`, `data`) VALUES
(1, 21, 1, 'vanzare', '2022-07-05'),
(2, 19, 710, 'vanzare', '2022-07-05'),
(3, 18, 1, 'vanzare', '2022-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infocuptor`
--
ALTER TABLE `infocuptor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prajeli`
--
ALTER TABLE `prajeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortiment`
--
ALTER TABLE `sortiment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocprajita`
--
ALTER TABLE `stocprajita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocverde`
--
ALTER TABLE `stocverde`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vanzari`
--
ALTER TABLE `vanzari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `infocuptor`
--
ALTER TABLE `infocuptor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prajeli`
--
ALTER TABLE `prajeli`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sortiment`
--
ALTER TABLE `sortiment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocprajita`
--
ALTER TABLE `stocprajita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stocverde`
--
ALTER TABLE `stocverde`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vanzari`
--
ALTER TABLE `vanzari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
