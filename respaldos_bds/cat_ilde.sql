-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2017 a las 09:52:07
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cat_ilde`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(40) NOT NULL,
  `info` text NOT NULL,
  `id_usu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellidos`, `fecha_nac`, `lugar_nac`, `info`, `id_usu`) VALUES
(1, 'Chente', 'Suskind', '1994-11-25', 'Mexico', 'The tag defines a multi-line text input control. A text area can hold an unlimited number of \r\ncharacters, and the text renders in a fixed-width font (usually Courier). The size of a text', 1),
(4, 'Alan', 'Villanueva', '1996-08-14', 'Mexico', 'HOla ke ase', 1),
(6, 'Vero', 'Villanueva', '1999-06-16', 'Mex', 'Cristiana', 1),
(7, 'Carlos', 'Sanchez', '1984-07-23', 'Mexi', 'Los ojos de mi princesa', 1),
(8, 'Will', 'Smith', '1987-04-26', 'EUA', 'Soy actor', 1),
(40, 'Fulano', 'Sutano', '1990-12-15', 'Penjamo', 'Vamo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
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
  `id_usu` int(10) UNSIGNED NOT NULL,
  `id_autor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `ed`, `edit`, `anio_pub`, `lugar_pub`, `pags`, `portada`, `comentario`, `id_usu`, `id_autor`) VALUES
(1, 'El Perfume', 5, 'Trillas', 1996, 'Suiza', 214, 'perfume.png', 'Francia, siglo XVIII. Adaptación del famoso best-seller de Patrick Süskind. Jean Baptiste Grenouille nació en medio del hedor de los restos de pescado de un mercado y fue abandonado por su madre en la basura. Las autoridades se hicieron cargo de él y lo mandaron a un hospicio. Creció en un ambiente hostil; nadie le quería, porque había en él algo excepcional: carecía por completo de olor. Estaba, sin embargo, dotado de un extraordinario sentido del olfato. A los veinte años, después de trabajar en una curtiduría, consiguió trabajo en casa del perfumista Bandini, que le enseñó a destilar esencias. Pero él vivía obsesionado con la idea de atrapar otros olores: el olor del cristal, del cobre, pero, sobre todo, el olor de algunas mujeres.', 1, 1),
(2, 'Nacistes para trinufar', 3, 'Limusa', 2014, 'Chile', 123, '', 'Lalalalalal', 1, 1),
(4, 'sdas', 1, 'qwewqwq', 2012, 'lkllk;l', 12, '', 'lfsdjflksajfklsjfksldjflsaf', 1, 1),
(6, 'popop', 2, '1234', 2016, 'EUA', 432, '', 'jsdklfjslkdafjal', 1, 4),
(8, 'casa', 2, 'qw', 2015, 'Brasil', 454, '', 'sadfhjkhsafljk', 1, 4),
(9, 'tretre', 2, 'aweqeqw', 2000, 'aksdfjlks', 5, '', 'lsdkfpoireojlkfsd', 1, 4),
(10, 'tretre', 2, 'aweqeqw', 2000, 'aksdfjlks', 5, '', 'lsdkfpoireojlkfsd', 1, 6),
(14, 'Frankenstein', 7, 'Alfa', 2016, 'Inglaterra', 500, '', 'lkdsjhfjdshfskdahfsalklkhsadf', 1, 4),
(16, 'Software', 1, 'Sin editr', 2017, 'México', 15, '', 'Software libre', 1, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usu`, `nombre`, `apellidos`, `email`, `password`, `admin`) VALUES
(1, 'Rafa', 'Rafael', 'Rivera Flores', 'rafa@hotmail.com', 'a', 1),
(2, 'Vince', 'Vicente', 'Rivera Villanueva', 'vince_trance@hotmail.com', 'z', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_au` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_li` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
