-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 03:11:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo`
--
CREATE DATABASE museo;
USE museo;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `idobjeto` int(11) NOT NULL,
  `fechaBaja` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaAlta` datetime NOT NULL,
  `posicion` varchar(11) NOT NULL,
  `motivobaja` varchar(100) NOT NULL,
  `lugar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `especialidad` varchar(12) NOT NULL,
  `posicion` varchar(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `descripcionH` text NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `mail` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
