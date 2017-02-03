-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2017 at 08:03 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogo_comentado`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` date NOT NULL,
  `info` text NOT NULL,
  `id_usu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autor_libro`
--

CREATE TABLE `autor_libro` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_autor` int(10) UNSIGNED NOT NULL,
  `id_libro` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ed` int(11) NOT NULL,
  `edit` varchar(50) NOT NULL,
  `anio_pub` year(4) NOT NULL,
  `lugar_pub` varchar(60) NOT NULL,
  `pags` int(10) UNSIGNED NOT NULL,
  `portada` varchar(50) NOT NULL,
  `comentario` text,
  `id_usu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(10) UNSIGNED NOT NULL,
  `nombre_usu` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usu`, `nombre`, `apellidos`, `email`, `password`, `admin`) VALUES
(1, 'Rafa', 'Rafael', 'Rivera Flores', 'rafa@hotmail.com', 'a', 1),
(2, 'Vince', 'Vicente', 'Rivera Villanueva', 'vince_trance@hotmail.com', 'z', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indexes for table `autor_libro`
--
ALTER TABLE `autor_libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `autor_libro`
--
ALTER TABLE `autor_libro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_au` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

--
-- Constraints for table `autor_libro`
--
ALTER TABLE `autor_libro`
  ADD CONSTRAINT `fk_au2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `fk_li2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_li` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
