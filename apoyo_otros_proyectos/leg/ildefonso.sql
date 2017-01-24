-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_actividades`
--

CREATE TABLE `leg_actividades` (
  `id_actividad` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `actividad` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fecha_actividad` date NOT NULL,
  `institucion` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_autores`
--

CREATE TABLE `leg_autores` (
  `id_autor` int(11) NOT NULL,
  `autor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(100) CHARACTER SET latin1 NOT NULL,
  `estado_nacimiento` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_biografias`
--

CREATE TABLE `leg_biografias` (
  `id_biografia` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `biografia` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_cargos`
--

CREATE TABLE `leg_cargos` (
  `id_cargo` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `cargo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fecha_cargo` date NOT NULL,
  `institucion` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_categorias`
--

CREATE TABLE `leg_categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_comentarios`
--

CREATE TABLE `leg_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_editoriales`
--

CREATE TABLE `leg_editoriales` (
  `id_editorial` int(11) NOT NULL,
  `editorial` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_educacion`
--

CREATE TABLE `leg_educacion` (
  `id` int(11) NOT NULL,
  `institucion` text CHARACTER SET latin1 NOT NULL,
  `fecha` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leg_libros`
--

CREATE TABLE `leg_libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(250) CHARACTER SET latin1 NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `paginas` int(11) NOT NULL,
  `sinopsis` text CHARACTER SET latin1 NOT NULL,
  `relacion_autor_acsi` text COLLATE utf8_spanish_ci NOT NULL,
  `portada` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `leg_actividades`
--
ALTER TABLE `leg_actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `leg_autores`
--
ALTER TABLE `leg_autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `leg_biografias`
--
ALTER TABLE `leg_biografias`
  ADD PRIMARY KEY (`id_biografia`);

--
-- Indices de la tabla `leg_cargos`
--
ALTER TABLE `leg_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `leg_categorias`
--
ALTER TABLE `leg_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `leg_comentarios`
--
ALTER TABLE `leg_comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `leg_editoriales`
--
ALTER TABLE `leg_editoriales`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `leg_libros`
--
ALTER TABLE `leg_libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `leg_actividades`
--
ALTER TABLE `leg_actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_autores`
--
ALTER TABLE `leg_autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_biografias`
--
ALTER TABLE `leg_biografias`
  MODIFY `id_biografia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_cargos`
--
ALTER TABLE `leg_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_categorias`
--
ALTER TABLE `leg_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_comentarios`
--
ALTER TABLE `leg_comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_editoriales`
--
ALTER TABLE `leg_editoriales`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `leg_libros`
--
ALTER TABLE `leg_libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
