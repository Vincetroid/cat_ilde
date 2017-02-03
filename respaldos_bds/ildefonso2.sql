-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2017 a las 14:57:30
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ildefonso2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` date NOT NULL,
  `info` text NOT NULL,
  `id_usu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_autor`),
  KEY `id_usu` (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_libro`
--

CREATE TABLE IF NOT EXISTS `autor_libro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_autor` int(10) unsigned NOT NULL,
  `id_libro` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor` (`id_autor`),
  KEY `id_libro` (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id_libro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `ed` int(11) NOT NULL,
  `edit` varchar(50) NOT NULL,
  `anio_pub` year(4) NOT NULL,
  `lugar_pub` varchar(60) NOT NULL,
  `pags` int(10) unsigned NOT NULL,
  `portada` varchar(50) NOT NULL,
  `comentario` text,
  `id_usu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `id_usu` (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usu` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usu`, `nombre`, `apellidos`, `email`, `password`, `admin`) VALUES
(1, 'Rafa', 'Rafael', 'Rivera Flores', 'rafa@hotmail.com', 'a', 1),
(2, 'Vince', 'Vicente', 'Rivera Villanueva', 'vince_trance@hotmail.com', 'z', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_au` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

--
-- Filtros para la tabla `autor_libro`
--
ALTER TABLE `autor_libro`
  ADD CONSTRAINT `fk_au2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `fk_li2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_li` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
