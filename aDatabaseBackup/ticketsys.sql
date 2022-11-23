-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 23:45:31
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticketsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL COMMENT 'Valor único.',
  `correo` varchar(100) DEFAULT NULL COMMENT 'Valor único.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`cliente_id`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, 'Sakura', 'Kinomoto', '088 20 30 40', 'sakura@cardcaptor.com'),
(2, 'Harry', 'Potter', '7891234', 'hp@magic.com'),
(3, 'Emmanuel', 'Gómez', '12345', 'emm@gomez.com'),
(4, 'Bruno', 'Bucciarati', '3366998855', 'bucciarati@gmail.com'),
(5, 'Mista', 'Guido', '1122334455', 'guido@jj.com'),
(6, 'Fugo', 'Pannacotta', '23423423432', 'pannacotta@jj.com'),
(7, 'Narancia', 'Ghirga', '343453454', 'ghirga@jj.net'),
(9, 'Marias', 'DB', '078', 'mail@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comm_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cliente_id` int(11) NOT NULL,
  `comentario` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`comment_id`, `comm_date`, `cliente_id`, `comentario`) VALUES
(1, '2022-11-22 16:11:59', 1, 'Un comentario'),
(2, '2022-11-22 16:12:14', 1, 'Segundo comentario'),
(3, '2022-11-22 16:12:33', 7, 'Probando'),
(4, '2022-11-22 16:12:55', 5, 'Nuevo comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `equipo_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`equipo_id`, `tipo`, `marca`, `modelo`) VALUES
(1, 'Consola', 'Nintendo', 'Wii'),
(2, 'Laptop o PC', 'HP', 'ZBook'),
(3, 'Smartphone', 'Motorola', 'Edge Neo 30'),
(5, 'Consola', 'Sony', 'PS5'),
(6, 'Tableta', 'Apple', 'iPad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `folio` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `estimado` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estatus` enum('Abierto','Diagnóstico','Cerrado','Garantía','Cancelado') DEFAULT 'Abierto',
  `serie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`folio`, `cliente_id`, `equipo_id`, `servicio`, `estimado`, `descripcion`, `fecha`, `estatus`, `serie`) VALUES
(1, 1, 1, 'Limpieza', 200, 'Limpieza de Wii.', '2022-11-16', 'Diagnóstico', '1'),
(5, 2, 5, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Garantía', '2'),
(6, 8, 1, 'Reparacion', 2345, 'Cambio de Equipo', '2022-11-15', 'Abierto', '34'),
(7, 1, 1, 'Cambio', 345, 'Un Cambio Nuevo', '2022-11-15', 'Cerrado', '4'),
(8, 4, 1, 'Cambio', 7989, 'Reparacion de Bateria', '2022-11-15', 'Abierto', '5'),
(9, 8, 1, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Cerrado', '6'),
(10, 3, 1, 'Reparacion', 2345, 'Cambio de Equipo', '2022-11-15', 'Abierto', '7'),
(11, 2, 1, 'Reparacion', 2345, 'Reparacion de Bateria', '2022-11-15', 'Diagnóstico', '12'),
(12, 1, 3, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Abierto', '13'),
(13, 8, 2, 'Reparacion', 2345, 'Cambio de Pantalla', '2022-11-15', 'Abierto', '14'),
(14, 3, 1, 'Arreglo', 7989, 'Actualización de Software', '2022-11-15', 'Cerrado', '15'),
(15, 4, 2, 'Arreglo', 7989, 'Actualización de Software', '2022-11-15', 'Abierto', '16'),
(16, 7, 1, 'Reparacion', 2345, 'Actualización de Software', '2022-11-15', 'Abierto', '21'),
(17, 7, 2, 'Cambio', 7989, 'Reparacion de Bateria', '2022-11-15', 'Abierto', '22'),
(18, 7, 1, 'Reparacion', 7989, 'Actualización de Software', '2022-11-15', 'Garantía', '25'),
(19, 2, 1, 'Limpieza', 0, 'Limpieza de tableta.', '2022-11-16', 'Abierto', '26'),
(20, 9, 1, 'Limpieza', 0, 'Limpieza de tableta.', '2022-11-21', 'Abierto', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usuario_id`, `username`, `password`) VALUES
(1, 'Adrian', 'password'),
(2, 'Barbara', 'password'),
(3, 'Pamela', 'password');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cliente_id`),
  ADD UNIQUE KEY `cod_unicos` (`telefono`,`correo`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk__clients_id` (`cliente_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`folio`),
  ADD UNIQUE KEY `serie` (`serie`),
  ADD KEY `fk___clients_id` (`cliente_id`),
  ADD KEY `fk___devices_id` (`equipo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk__clients_id` FOREIGN KEY (`cliente_id`) REFERENCES `clients` (`cliente_id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk___devices_id` FOREIGN KEY (`equipo_id`) REFERENCES `devices` (`equipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
