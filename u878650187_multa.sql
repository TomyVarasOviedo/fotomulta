-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 20:52:28
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u878650187_multa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `dni` int(12) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `telefono` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`dni`, `nombre`, `apellido`, `contra`, `mail`, `telefono`) VALUES
(18078060, 'silvia', 'perez', 'frances', 'silviaperez@gmail.com', 2147483647),
(44837680, 'tomas', 'varas', '12345', 'tomasvarasoviedo@gmail.com', 224623456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`dni`, `nombre`, `apellido`, `contra`, `mail`, `telefono`) VALUES
(1, 'usuario1', '1', '1234', 'lacostaprovincia@gmail.com', '224678923'),
(22153197, 'Marcelo', 'Varas', 'historia71', 'varasleonardi@gmail.com', '2257530963'),
(25069309, 'Dario', 'Dell Arciprete', '12345678', 'dellaplicacioninformaticas@gmail.com', '2267417777'),
(28081603, 'Gaston', 'Pieroni', '1234', 'gastonpieroni@gmail.com', '2246789345'),
(31160254, 'Nicolas', 'La Luz', 'nico123', 'nicosoftcomputacion@gmail.com', '2246 5623459'),
(37980122, 'Ricardo', 'Ceverini', '2106', 'ricardo.ceverini.125@gmail.com', '2246 67848');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(6) NOT NULL,
  `n_articulo` int(5) NOT NULL,
  `inciso` varchar(4) NOT NULL,
  `descripcion` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `n_articulo`, `inciso`, `descripcion`) VALUES
(1, 5, 'e', 'Baliza: la señal fija o móvil con luz propia o retrorreflectora de luz, que se pone como marca de advertencia;'),
(2, 5, 'g', 'Bicicleta: vehículo de dos ruedas que es propulsado por mecanismos con el esfuerzo de quien lo utiliza, pudiendo ser múltiple de hasta cuatro ruedas a'),
(3, 5, 'g', 'Bicicleta: vehículo de dos ruedas que es propulsado por mecanismos con el esfuerzo de quien lo utiliza, pudiendo ser múltiple de hasta cuatro ruedas a'),
(4, 5, 'p', 'Parada: el lugar señalado para el ascenso y descenso de pasajeros del servicio pertinente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multa`
--

CREATE TABLE `multa` (
  `n_multa` int(11) NOT NULL,
  `n_patente` varchar(7) NOT NULL,
  `fecha` datetime NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fk_agente` int(11) NOT NULL,
  `descripcion` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `multa`
--

INSERT INTO `multa` (`n_multa`, `n_patente`, `fecha`, `latitud`, `longitud`, `foto`, `fk_agente`, `descripcion`) VALUES
(1, 'AB207ZI', '2021-11-24 19:14:51', -36.5332, -56.7075, 'fotis-fotopoulos-DuHKoV44prg-unsplash.jpg', 44837680, ''),
(2, 'AA444CC', '2021-11-24 20:19:11', -36.5314, -56.7122, 'IMG_20211123_152326188.jpg', 28081603, 'Andaba por la vereda'),
(3, 'AC123AV', '2021-11-24 20:20:07', -36.5313, -56.712, 'IMG_20210118_174042967.jpg', 28081603, 'No estaba'),
(4, 'LYP035', '2021-11-24 20:22:38', -36.5313, -56.712, 'chango-sept.jpg', 28081603, 'asdads'),
(5, '567ghj8', '2021-11-24 20:27:53', -36.5314, -56.7122, 'the-last-samurai-minimal-4k_1618126622.jpg', 1, 'Se estaciono en la puerta de un estacionamiento'),
(6, 'YOH785', '2021-11-24 20:28:56', -36.5314, -56.7122, 'fotis-fotopoulos-DuHKoV44prg-unsplash.jpg', 1, ''),
(7, '485lkg6', '2021-11-24 20:31:00', -36.5314, -56.7121, '2019-03-28-10-03-18_logo_gba.png', 1, ''),
(8, 'Mny224', '2021-11-25 14:03:17', -36.7299, -56.6748, 'IMG_20211125_132314.jpg', 25069309, 'Hwhwhw'),
(9, 'AB207ZI', '2021-11-29 19:02:51', -36.3495, -56.728, '2019-03-28-10-03-17_logo de programacion.png', 1, ''),
(10, 'YOH785', '2021-11-29 19:02:51', -36.3495, -56.728, 'fotis-fotopoulos-DuHKoV44prg-unsplash.jpg', 0, 'Bicleta que inpide el paso de la gente bloquenado una entrada'),
(11, 'WDG498', '2021-11-30 00:03:35', -36.5316, -56.7047, 'Screenshot_2021-11-29-22-46-33-638_com.google.android.youtube.jpg', 1, 'Tudum ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multa_articulo`
--

CREATE TABLE `multa_articulo` (
  `id_multa_articulo` int(11) NOT NULL,
  `fk_multa` int(11) NOT NULL,
  `fk_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `multa_articulo`
--

INSERT INTO `multa_articulo` (`id_multa_articulo`, `fk_multa`, `fk_articulo`) VALUES
(1, 10, 1),
(2, 10, 2),
(3, 11, 2),
(4, 11, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`n_multa`);

--
-- Indices de la tabla `multa_articulo`
--
ALTER TABLE `multa_articulo`
  ADD PRIMARY KEY (`id_multa_articulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `multa`
--
ALTER TABLE `multa`
  MODIFY `n_multa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `multa_articulo`
--
ALTER TABLE `multa_articulo`
  MODIFY `id_multa_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
