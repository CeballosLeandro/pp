-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 03:30:38
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
  `idhistorial` int(11) NOT NULL,
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

INSERT INTO `objeto` (`id`, `idhistorial`, `nombre`, `especialidad`, `posicion`, `imagen`, `descripcion`, `descripcionH`, `fechaIngreso`, `estado`) VALUES
(1, 0, 'Torno Mecánico', 'Mecánica', '1SME', 'assets/imgobject/Lathe.png', 'Al comenzar la Revolución industrial en Inglaterra, durante el siglo xvii, se desarrollaron tornos capaces de dar forma a una pieza metálica. El desarrollo del torno pesado industrial para metales en el siglo xviii hizo posible la producción en serie de piezas de precisión:', 'En 1833, Joseph Whitworth se instaló por su cuenta en Mánchester. Sus diseños y realizaciones influyeron de manera fundamental en otros fabricantes de la época. En 1839 patentó un torno paralelo para cilindrar y roscar con bancada de guías planas y carro transversal automático, que tuvo una gran aceptación. Dos tornos que llevan incorporados elementos de sus patentes se conservan en la actualidad.', '2023-11-17 01:35:44', 'Activo'),
(2, 0, 'Torno Paralelo', 'Mecánica', '2SME', 'assets/imgobject/683px-HwacheonCentreLathe-headstock-mask_legend.jpg', 'El torno paralelo o mecánico es el tipo de torno que evolucionó partiendo de los tornos antiguos cuando se le fueron incorporando nuevos equipamientos que lograron convertirlo en una de las máquinas herramientas más importante que han existido. ', 'Sin embargo, en la actualidad este tipo de torno está quedando relegado a realizar tareas poco importantes, a utilizarse en los talleres de aprendices y en los talleres de mantenimiento para realizar trabajos puntuales o especiales.', '2023-11-17 01:37:44', 'Activo'),
(3, 0, 'Torno Copiador', 'Mecánica', '3SME', 'assets/imgobject/TCM-3V55.jpg', 'Se llama torno copiador a un tipo de torno que operando con un dispositivo hidráulico y electrónico permite el torneado de piezas de acuerdo a las características de la misma siguiendo el perfil de una plantilla que reproduce una réplica igual a la guía.', 'Este tipo de tornos se utiliza para el torneado de aquellas piezas que tienen diferentes escalones de diámetros, que han sido previamente forjadas o fundidas y que tienen poco material excedente. También son muy utilizados estos tornos en el trabajo de la madera y del mármol artístico para dar forma a las columnas embellecedoras.', '2023-11-17 01:39:04', 'Activo'),
(4, 0, 'Torno Revólver', 'Mecánica', '4SME', 'assets/imgobject/pittler1.jpg', 'El torno revólver es una variedad de torno diseñado para mecanizar piezas sobre las que sea posible el trabajo simultáneo de varias herramientas con el fin de disminuir el tiempo total de mecanizado.', 'Las piezas que presentan esa condición son aquellas que, partiendo de barras, tienen una forma final de casquillo o similar. Una vez que la barra queda bien sujeta mediante pinzas o con un plato de garras, se va taladrando, mandrilando, roscando o escariando la parte interior mecanizada y a la vez se puede ir cilindrando, refrentando, ranurando, roscando y cortando con herramientas de torneado exterior.', '2023-11-17 01:40:31', 'Activo'),
(5, 0, 'Torno Automático', 'Mecánica', '5SME', 'assets/imgobject/efa51331f4b861d303d481acf5f6b89d-1-1.jpg', 'Se llama torno automático a un tipo de torno cuyo proceso de trabajo está enteramente automatizado. La alimentación de la barra necesaria para cada pieza se hace también de forma automática, a partir de una barra larga que se inserta por un tubo que tiene el cabezal y se sujeta mediante pinzas de apriete hidráulico.', 'La puesta a punto de estos tornos es muy laboriosa y por eso se utilizan principalmente para grandes series de producción. El movimiento de todas las herramientas está automatizado por un sistema de excéntricas y reguladores electrónicos que regulan el ciclo y los topes de final de carrera.', '2023-11-17 01:41:38', 'Activo'),
(6, 0, 'Torno Vertical', 'Construcciones', '6SCC', 'assets/imgobject/800px-Francis_Runner_InWorkshop_300.jpg', 'El torno vertical es una variedad de torno, de eje vertical, diseñado para mecanizar piezas de gran tamaño, que van sujetas al plato de garras u otros operadores y que por sus dimensiones o peso harían difícil su fijación en un torno horizontal.', 'Los tornos verticales no tienen contrapunto sino que el único punto de sujeción de las piezas es el plato horizontal sobre el cual van apoyadas. La manipulación de las piezas para fijarlas en el plato se hace mediante grúas de puente o polipastos.', '2023-11-17 01:42:34', 'Activo'),
(7, 0, 'Torno CNC', 'Mecánica', '7SME', 'assets/imgobject/Small_CNC_Turning_Center.jpg', 'El torno CNC es un torno dirigido por control numérico por computadora.', ' Es una máquina que resulta rentable para el mecanizado de grandes series de piezas sencillas, sobre todo piezas de revolución, y permite mecanizar con precisión superficies curvas coordinando los movimientos axial y radial para el avance de la herramienta.', '2023-11-17 01:44:01', 'Activo'),
(8, 0, 'Intel Core 2', 'Computación', '12SCP', 'assets/imgobject/ASRock_945GCM-S_-_Intel_Core_2_Duo_E6300_Conroe_(SL9SA)-0322.jpg', 'La marca Intel Core 2 se refiere a una gama de CPU comerciales de Intel de 64 bits de doble núcleo y CPU 2x2 MCM (Módulo Multi-Chip) de cuatro núcleos con el conjunto de instrucciones x86-64, basado en el Core microarchitecture de Intel, derivado del Procesador portátil de doble núcleo de 32 bits Yonah.', 'La marca Core 2 fue introducida el 27 de julio de 2006, abarcando las líneas Solo (un núcleo), Duo (doble núcleo), Quad (cuádruple núcleos), y Extreme (CPU de dos o cuatro núcleos para entusiastas), durante el 2007.​ Los procesadores Intel Core 2 con tecnología vPro (diseñados para negocios) incluyen las ramas de doble núcleo y cuatro núcleos.', '2023-11-17 01:46:37', 'Activo'),
(9, 0, 'Intel Pentium 4', 'Computación', '12SCP', 'assets/imgobject/Pentium_4_Prescott_2.40GHz(1).jpg', 'El Pentium 4 fue una línea de microprocesadores de séptima generación basado en la arquitectura x86 y fabricado por Intel. Es el primer microprocesador con un diseño completamente nuevo desde el Pentium Pro de 1995. ', 'El Pentium 4 original, denominado Willamette, trabajaba a 1,4 y 1,5 GHz; y fue lanzado el 20 de noviembre de 2000.​ El 8 de agosto de 2008 se realiza el último envío de Pentium 4,​ siendo sustituido por los Intel Core Duo.', '2023-11-17 01:47:56', 'Activo'),
(10, 0, 'Intel Pentium D', 'Computación', '12SCP', 'assets/imgobject/ebf8f354276249d1b5603ed478e91692.jpg', 'Un procesador Pentium D consiste básicamente en dos chips de Pentium 4 metidos en un solo encapsulado (dos núcleos Prescott para el núcleo Smithfield y dos núcleos Cedar Mill para el núcleo Presler) y comunicados a través del FSB.', ' Fueron fabricados a 90 nm y en su segunda generación de 65 nm. El nombre en clave del Pentium D antes de su lanzamiento era Smithfield. Hubo un rumor que decía que estos chips incluían una tecnología de gestión de derechos digitales para hacer posible un sistema de protección anticopia de la mano de Microsoft, lo cual Intel desmintió, si bien aclarando que algunos de sus chipsets sí tenían dicha tecnología, pero no en la dimensión que se había planteado.', '2023-11-17 01:50:17', 'Activo'),
(11, 0, 'AMD Am386', 'Computación', '13SCP', 'assets/imgobject/1024px-Am386DX-40.jpg', 'El microprocesador Am386 fue lanzado al mercado por AMD en 1991. Era un procesador con características semejantes al Intel 80386 y compatible 100% con este último, se vendieron millones de unidades de este, y esto posicionó a AMD como un legítimo competidor de Intel, siendo más que solo la segunda fuente de microprocesadores x86 (en ese tiempo llamada la familia 8086).', 'Aunque el procesador estaba esencialmente listo para salir al mercado antes de 1991, Intel mantuvo bloqueado su lanzamiento mediante una demanda judicial. AMD había sido el segundo fabricante de los diseños de Intel, y la interpretación del contrato por parte de los de AMD era que este cubría todos sus procesadores. Intel, sin embargo, alegaba que el contrato solo cubría los modelos 80286 y anteriores. Después de algunos años, AMD finalmente ganó el caso y el derecho de vender sus Am386. Esto abrió una línea de competencia también en el mercado de los procesadores de 32 bit compatibles con el 80386, reduciendo así el costo de comprar una PC.', '2023-11-17 01:51:21', 'Activo'),
(12, 0, 'AMD Am486', 'Computación', '13SCP', 'assets/imgobject/600px-AMD_Am486.jpg', 'El Am486 fue un microprocesador de computadora compatible con el Intel 80486, producido por AMD en los años 1993.', 'En el mercado, Intel venció a AMD por casi cuatro años, pero AMD ofreció sus 486 de 40 MHz al mismo precio o por debajo del chip Intel de 33 MHz, ofreciendo, por el mismo precio, cerca de un 20% de mejora en el desempeño. Los primeros chips del AMD 486 fueron reemplazos para sus contrapartes de Intel que se enchufaban en el mismo zócalo, pero posteriormente AMD duplicó la velocidad del reloj, y además corrían a 3,3 voltios en vez de los 5 V de los procesadores de Intel, lo que limitó su capacidad para actualizar los chips de Intel hasta que en el mercado aparecieron adaptadores de voltaje hechos por terceros.', '2023-11-17 01:52:19', 'Activo'),
(13, 0, 'AMD Am286', 'Computación', '13SCP', 'assets/imgobject/AMD286.jpg', 'El AMD Am286 es procesador que es una copia del Intel 80286, creado con permiso de Intel.', 'Esto fue así porque IBM quería que Intel, que era el proveedor de procesadores para el IBM PC, tuviese una segunda fuente para poder suplir la demanda en caso de problemas, por lo que obligó a Intel a licenciar su tecnología a otro fabricante, en este caso AMD.', '2023-11-17 01:52:52', 'Activo'),
(14, 0, 'Intel 80386', 'Computación', '12SCP', 'assets/imgobject/Ic-photo-intel-A80386DX-33-IV-(386DX).png', 'Athlon II es de la familia de procesadores de AMD incluyendo versiones de 2 a 4 núcleos. Se ha desarrollado para satisfacer el mercado de prestaciones intermedias complementando la línea del Phenom II.', 'La familia Athlon II está basada en la arquitectura K10, sin embargo, a diferencia de la familia del Phenom II, no posee caché de tercer nivel L3. En estos procesadores, se ha intentado cubrir esa diferencia, aumentando el nivel de la caché de segundo nivel de 512 KiB a 1 MiB por cada núcleo en los procesadores de dos núcleos. ', '2023-11-17 01:53:42', 'Activo'),
(15, 0, 'AMD Phenom II', 'Computación', '13SCP', 'assets/imgobject/590px-AMD_Phenom_II_X4_840_(HDX840WFK42GM)_CPU-top_PNr°0374.jpg', 'Phenom II es una serie de microprocesadores x86-64 de gama alta diseñada por AMD para computadoras personales presentada en el año 2008, fabricados en 45 nm, la cual sucede al Phenom original (basado en la anterior tecnología de proceso de 65nm.', 'La versión de transición del Phenom II, compatible con el Socket AM2+, fue lanzada en diciembre de 2008, en tanto que la versión para Socket AM3 con soporte para RAM DDR3 fue lanzada el 9 de febrero de 2009. En esta última fecha también comenzaron a distribuirse a las cadenas mayorista y minorista los primeros lotes de CPUs de tres y cuatro núcleos.', '2023-11-17 01:54:26', 'Activo'),
(16, 0, 'Vatihorímetro', 'Electricidad', '16SLC', 'assets/imgobject/ElectricityMeterMechanism.jpg', 'El vatihorímetro, contador eléctrico o contador de electricidad es un dispositivo que mide el consumo de energía eléctrica de un circuito o un servicio eléctrico, siendo este su objetivo específico. Normalmente están calibrados en unidades de facturación, siendo la más común el kilovatio-hora [kWh].', 'Existen contadores electromecánicos y electrónicos siendo este el ocupado actualmente. Los electromecánicos utilizan bobinados de corriente y de tensión para crear corrientes parásitas en un disco que, bajo la influencia de los campos magnéticos, produce un giro que mueve las agujas del cuadrante. Los contadores electrónicos utilizan convertidores analógico-digitales para hacer la conversión.', '2023-11-17 01:58:39', 'Activo'),
(17, 0, 'Voltímetros Digital', 'Electrónica', '16SEL', 'assets/imgobject/Voltmeter.jpg', 'Un voltímetro es un instrumento que sirve para medir la diferencia de potencial entre dos puntos de un circuito eléctrico.', 'Dan una indicación numérica de la tensión, normalmente en una pantalla tipo LCD.2​ Suelen tener prestaciones adicionales como memoria, detección de valor de pico, verdadero valor eficaz (RMS), autorrango y otras funcionalidades. El sistema de medida emplea técnicas de conversión analógico-digital (que suele ser empleando un integrador de doble rampa) para obtener el valor numérico mostrado en una pantalla numérica LCD. El primer voltímetro digital fue inventado y producido por Andrew Kay de \"Non-Linear Systems\" (y posteriormente de Kaypro) en 1954..', '2023-11-17 02:00:26', 'Activo'),
(18, 0, 'Avómetro modelo 7. Década 1960-70', 'Electrónica', '16SEL', 'assets/imgobject/800px-Avometro7.jpg', 'Es un aparato muy versátil, que se basa en la utilización de un instrumento de medida, un galvanómetro muy sensible que se emplea para todas las determinaciones.', 'Un Avometro modelo 7, fabricado en 1965 y comprado por la ETSIT-UPM en 1966.', '2023-11-17 02:03:16', 'Activo');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
