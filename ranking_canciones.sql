-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2024 a las 22:46:29
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
(1, 'Taylor Swift', 'USA'),
(2, 'Bad Bunny', 'Puerto Rico'),
(3, 'Dua Lipa', 'UK'),
(4, 'The Weeknd', 'Canada'),
(5, 'J Balvin', 'Colombia'),
(6, 'Ariana Grande', 'USA'),
(7, 'BTS', 'South Korea'),
(8, 'Post Malone', 'USA'),
(9, 'Billie Eilish', 'USA'),
(10, 'Drake', 'Canada'),
(11, 'Ed Sheeran', 'UK'),
(12, 'Shakira', 'Colombia'),
(13, 'Rihanna', 'Barbados'),
(14, 'Justin Bieber', 'Canada'),
(15, 'Selena Gomez', 'USA'),
(16, 'Katy Perry', 'USA'),
(17, 'Imagine Dragons', 'USA'),
(18, 'Maluma', 'Colombia'),
(19, 'Jhay Cortez', 'Puerto Rico'),
(20, 'Anitta', 'Brazil'),
(21, 'Doja Cat', 'USA'),
(22, 'Miley Cyrus', 'USA'),
(23, 'SZA', 'USA'),
(24, 'Travis Scott', 'USA'),
(25, 'Karol G', 'Colombia'),
(26, 'Becky G', 'USA'),
(27, 'Ozuna', 'Puerto Rico'),
(28, 'Lil Nas X', 'USA'),
(29, 'Bruno Mars', 'USA'),
(30, 'Shawn Mendes', 'Canada'),
(31, 'Blackpink', 'South Korea'),
(32, 'Lady Gaga', 'USA'),
(33, 'Nicki Minaj', 'USA'),
(34, 'Daddy Yankee', 'Puerto Rico'),
(35, 'Luis Fonsi', 'Puerto Rico'),
(36, 'Camila Cabello', 'Cuba'),
(37, 'Jhayco', 'Puerto Rico'),
(38, 'Panic! At The Disco', 'USA'),
(39, 'Maroon 5', 'USA'),
(40, 'Coldplay', 'UK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `titulo_cancion` varchar(200) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `cantidad_reproducciones` bigint(20) DEFAULT NULL,
  `id_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `titulo_cancion`, `fecha_lanzamiento`, `cantidad_reproducciones`, `id_artista`) VALUES
(1, 'Anti-Hero', '2022-10-21', 1500000000, 1),
(2, 'Titi Me Preguntó', '2022-05-06', 1800000000, 2),
(3, 'Levitating', '2020-10-01', 1700000000, 3),
(4, 'Save Your Tears', '2020-08-09', 1400000000, 4),
(5, 'In Da Getto', '2021-07-01', 1000000000, 5),
(6, 'Positions', '2020-10-30', 1200000000, 6),
(7, 'Butter', '2021-05-21', 2000000000, 7),
(8, 'Circles', '2019-09-03', 1800000000, 8),
(9, 'Bad Guy', '2019-03-29', 1900000000, 9),
(10, 'Hotline Bling', '2015-07-31', 2100000000, 10),
(11, 'Shape of You', '2017-01-06', 2500000000, 11),
(12, 'Waka Waka', '2010-06-10', 1600000000, 12),
(13, 'Umbrella', '2007-03-29', 2300000000, 13),
(14, 'Sorry', '2015-10-22', 2200000000, 14),
(15, 'Wolves', '2017-10-25', 1400000000, 15),
(16, 'Roar', '2013-08-10', 2300000000, 16),
(17, 'Believer', '2017-03-07', 1900000000, 17),
(18, 'Felices los 4', '2017-04-21', 1700000000, 18),
(19, 'Dákiti', '2020-10-30', 2100000000, 19),
(20, 'Envolver', '2021-11-11', 2200000000, 20),
(21, 'Say So', '2020-01-28', 1900000000, 21),
(22, 'Flowers', '2023-01-12', 1600000000, 22),
(23, 'Kill Bill', '2022-12-09', 1500000000, 23),
(24, 'Sicko Mode', '2018-08-03', 2300000000, 24),
(25, 'Provenza', '2022-04-22', 1400000000, 25),
(26, 'Mamiii', '2022-02-10', 1300000000, 26),
(27, 'Taki Taki', '2018-09-28', 2400000000, 27),
(28, 'Old Town Road', '2019-03-15', 2900000000, 28),
(29, 'Just The Way You Are', '2010-07-20', 2800000000, 29),
(30, 'Señorita', '2019-06-21', 2000000000, 30),
(31, 'Pink Venom', '2022-08-19', 1800000000, 31),
(32, 'Shallow', '2018-10-05', 2100000000, 32),
(33, 'Super Bass', '2011-04-05', 1900000000, 33),
(34, 'Con Calma', '2019-01-24', 2400000000, 34),
(35, 'Despacito', '2017-01-12', 7100000000, 35),
(36, 'Havana', '2017-08-03', 2600000000, 36),
(37, 'Christian Dior', '2021-06-11', 1300000000, 37),
(38, 'High Hopes', '2018-05-22', 1700000000, 38),
(39, 'Memories', '2019-09-20', 2100000000, 39),
(40, 'Yellow', '2000-06-26', 2400000000, 40),
(41, 'Blank Space', '2014-11-10', 3200000000, 1),
(42, 'Safaera', '2020-02-29', 3500000000, 2),
(43, 'Don’t Start Now', '2019-11-01', 2800000000, 3),
(44, 'Starboy', '2016-09-22', 3400000000, 4),
(45, 'I Like It', '2018-05-25', 3000000000, 5),
(46, 'Thank U, Next', '2018-11-03', 3300000000, 6),
(47, 'Fake Love', '2018-05-18', 2900000000, 7),
(48, 'Rockstar', '2020-04-24', 3200000000, 8),
(49, 'When the Party’s Over', '2018-10-17', 2500000000, 9),
(50, 'God’s Plan', '2018-01-19', 4000000000, 10),
(51, 'Bad Habits', '2021-06-25', 3500000000, 11),
(52, 'Chantaje', '2016-10-28', 3100000000, 12),
(53, 'What Do You Mean?', '2015-08-28', 3500000000, 14),
(54, 'Lose You to Love Me', '2019-10-23', 3000000000, 15),
(55, 'Firework', '2010-10-26', 3300000000, 16),
(56, 'Radioactive', '2012-02-10', 3800000000, 17),
(57, 'Felices los 4', '2017-04-21', 3200000000, 18),
(58, 'Dákiti', '2020-10-30', 4100000000, 19),
(59, 'Poker Face', '2008-09-26', 3500000000, 32),
(60, 'Sorry', '2015-10-22', 4200000000, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'webadmin@gmail.com', '$2y$10$JZFamarDkYhqiJY9GM6SVus0WPuMvKrPVzCkdhrgurncwyBsHi5a6');

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
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
