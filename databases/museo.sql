-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 14:02:39
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` int(3) NOT NULL,
  `sector` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `descripcionH` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivoBaja` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `retorno` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` int(3) NOT NULL,
  `sector` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `descripcionH` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`id`, `nombre`, `especialidad`, `ubicacion`, `sector`, `descripcion`, `descripcionH`, `fechaIngreso`) VALUES
(1, 'cccccc', 'Construccion', 4, 'Sala Construcciones', 'cccccccccccccccccccccc', 'cccccccccccccccccccccccc', '2023-11-03 11:55:45'),
(2, 'pc', 'ComputaciÃ³n', 1, 'Sala ComputaciÃ³n', 'una pc', 'tjkedtkreh', '2023-11-03 11:58:17'),
(3, 'ladrillo', 'Construccion', 1, 'Sala Construcciones', 'un ladrillo ', 'hrshrsjherwjej', '2023-11-03 11:58:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(155) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `mail`, `password`) VALUES
(1, 'carlos', 'carlos@g.com', '1234upc');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
