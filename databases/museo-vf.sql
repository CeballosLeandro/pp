-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 23:52:35
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
  `fechaAlta` datetime NOT NULL,
  `fechaBaja` timestamp NULL DEFAULT NULL,
  `posicion` varchar(11) NOT NULL,
  `motivobaja` varchar(100) DEFAULT NULL,
  `lugar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `idobjeto`, `fechaAlta`, `fechaBaja`, `posicion`, `motivobaja`, `lugar`) VALUES
(1, 1, '2023-11-23 15:29:11', '2023-11-23 18:32:15', '12SCP', 'Reparación', 'Depósito'),
(2, 1, '2023-11-23 15:34:47', '2023-11-23 18:36:02', '12SCP', 'Reparación', 'Depósito'),
(3, 1, '2023-11-23 15:36:49', NULL, '11SCP', NULL, NULL),
(4, 2, '2023-11-23 15:39:04', NULL, '10SME', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `posicion` varchar(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `descripcionH` text NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`id`, `nombre`, `especialidad`, `posicion`, `imagen`, `descripcion`, `descripcionH`, `fechaIngreso`, `estado`) VALUES
(1, 'AMD Am286', 'Computación', '11SCP', 'assets/imgobject/AMD286.jpg', 'El AMD Am286 es procesador que es una copia del Intel 80286, creado con permiso de Intel.', 'Esto fue así porque IBM quería que Intel, que era el proveedor de procesadores para el IBM PC, tuviese una segunda fuente para poder suplir la demanda en caso de problemas, por lo que obligó a Intel a licenciar su tecnología a otro fabricante, en este caso AMD. Por lo tanto el Am286 es idéntico al Intel 80286. Posteriormente AMD lo vendió como procesador embebido. Como curiosidad, los Am286 está marcados con la frase (M) (C) INTEL 1982, como se puede ver en la foto.', '2023-11-23 18:29:11', 'Activo'),
(2, 'Torno paralelo', 'Mecánica', '10SME', 'assets/imgobject/683px-HwacheonCentreLathe-headstock-mask_legend.jpg', 'El torno paralelo o mecánico es el tipo de torno que evolucionó partiendo de los tornos antiguos cuando se le fueron incorporando nuevos equipamientos que lograron convertirlo en una de las máquinas herramientas más importante que han existido. ', 'Para la fabricación en serie y de precisión han sido sustituidos por tornos copiadores, revólver, automáticos y de CNC. Para manejar bien estos tornos se requiere la pericia de profesionales muy bien cualificados, ya que el manejo manual de sus carros puede ocasionar errores, a menudo, en la geometría de las piezas torneadas.', '2023-11-23 18:39:04', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expiration` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'carlos', 'carlos@g.com', '$2y$10$EQ/GG0ZNLjuBQw3rZFb5kOAUlIzCPO6U7BK2mcAaB3LLgEbSAUCuy'),
(3, 'Carlitos', 'carlitos@gmail.com', '$2y$10$/OQc2szNARkODgUP132iPuWO/suoT48E6kRCwx1mDArjCOF5e668G'),
(4, 'lea', 'leancm@gmail.com', '$2y$10$7bwNMXPU9QrthzTRWU8XVuphTed1auqpRtNtdCRfc..afIdmc3L3y');

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
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
