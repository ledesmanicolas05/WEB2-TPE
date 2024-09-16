-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 19:31:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ranking_canciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL,
  `nombre_artista` varchar(200) NOT NULL,
  `nacionalidad_artista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id_artista`, `nombre_artista`, `nacionalidad_artista`) VALUES
(1, 'The Weeknd', 'Canadá'),
(2, 'Dua Lipa', 'Reino Unido'),
(3, 'Adele', 'Reino Unido'),
(4, 'BTS', 'Corea del Sur'),
(5, 'Ed Sheeran', 'Reino Unido'),
(6, 'Billie Eilish', 'Estados Unidos'),
(7, 'Drake', 'Canadá'),
(8, 'Shawn Mendes', 'Canadá'),
(9, 'Cardi B', 'Estados Unidos'),
(10, 'Bruno Mars', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `titulo_cancion` varchar(200) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `cantidad_reproducciones` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `titulo_cancion`, `fecha_lanzamiento`, `cantidad_reproducciones`, `id_artista`) VALUES
(1, 'Blinding Lights', '2019-11-29', 1200000000, 1),
(2, 'Levitating', '2020-03-27', 850000000, 2),
(3, 'Hello', '2015-10-23', 1800000000, 3),
(4, 'Dynamite', '2020-08-21', 1500000000, 4),
(5, 'Shape of You', '2017-01-06', 2147483647, 5),
(6, 'Bad Guy', '2019-03-29', 1300000000, 6),
(7, 'God’s Plan', '2018-01-19', 1400000000, 7),
(8, 'In My Blood', '2018-03-22', 700000000, 8),
(9, 'I Like It', '2018-05-25', 950000000, 9),
(10, 'Uptown Funk', '2014-11-10', 2147483647, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id_premio` int(11) NOT NULL,
  `nombre_premio` varchar(200) NOT NULL,
  `año_premio` year(4) NOT NULL,
  `id_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id_premio`, `nombre_premio`, `año_premio`, `id_cancion`) VALUES
(4, 'American Music Award', '2021', 4),
(5, 'Billboard Hot 100 Song of the Year', '2018', 5),
(7, 'Billboard Music Award', '2018', 7),
(3, 'Brit Award a la Mejor Canción', '2016', 3),
(6, 'Grammy a la Canción del Año', '2020', 6),
(1, 'Grammy a la Mejor Canción del Año', '2021', 1),
(10, 'Grammy a la Mejor Performance de Grupo', '2015', 10),
(8, 'Juno Award a la Mejor Canción', '2019', 8),
(9, 'Latin Grammy a la Mejor Canción', '2019', 9),
(2, 'MTV Video Music Awards', '2021', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_pais`
--

CREATE TABLE `ventas_pais` (
  `id_venta` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `cantidad_ventas` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas_pais`
--

INSERT INTO `ventas_pais` (`id_venta`, `pais`, `cantidad_ventas`, `id_cancion`) VALUES
(1, 'Estados Unidos', 1000000, 1),
(2, 'Reino Unido', 750000, 1),
(3, 'Canadá', 500000, 1),
(4, 'Australia', 300000, 1),
(5, 'Alemania', 400000, 1),
(6, 'Estados Unidos', 800000, 2),
(7, 'Reino Unido', 600000, 2),
(8, 'Francia', 350000, 2),
(9, 'Brasil', 250000, 2),
(10, 'Italia', 200000, 2),
(11, 'Estados Unidos', 900000, 3),
(12, 'Reino Unido', 550000, 3),
(13, 'Australia', 300000, 3),
(14, 'Nueva Zelanda', 150000, 3),
(15, 'España', 200000, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id_premio`),
  ADD UNIQUE KEY `nombre_premio` (`nombre_premio`,`año_premio`,`id_cancion`),
  ADD KEY `id_cancion` (`id_cancion`);

--
-- Indices de la tabla `ventas_pais`
--
ALTER TABLE `ventas_pais`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_cancion_ventas` (`id_cancion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id_premio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas_pais`
--
ALTER TABLE `ventas_pais`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`);

--
-- Filtros para la tabla `premios`
--
ALTER TABLE `premios`
  ADD CONSTRAINT `premios_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id_cancion`);

--
-- Filtros para la tabla `ventas_pais`
--
ALTER TABLE `ventas_pais`
  ADD CONSTRAINT `fk_cancion_ventas` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id_cancion`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventas_pais_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id_cancion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
