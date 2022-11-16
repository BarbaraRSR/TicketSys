-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 06:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `comentarios` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cliente_id`, `nombre`, `apellido`, `telefono`, `correo`, `comentarios`) VALUES
(1, 'Sakura', 'Kinomoto', '12345', 'sakura@cardcaptor.com', 'Comentarios por aquí.'),
(2, 'Harry', 'Potter', '7891234', 'hp@magic.com', NULL),
(3, 'Emmanuel', 'Gómez', '12345', 'emm@gomez.com', ''),
(4, 'Bruno', 'Bucciarati', '3366998855', 'bucciarati@gmail.com', 'El comentario'),
(5, 'Mista', 'Guido', '1122334455', 'guido@jj.com', 'Nuevo Comentario'),
(7, 'Fugo', 'Pannacotta', '23423423432', 'pannacotta@jj.com', 'Modificacion Realizada Actualmente'),
(8, 'Narancia', 'Ghirga', '343453454', 'ghirga@jj.net', 'Otro comentario');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `equipo_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`equipo_id`, `tipo`, `marca`, `modelo`, `serie`) VALUES
(1, 'Consola', 'Nintendo', 'Wii', '1234'),
(2, 'Laptop o PC', 'HP', 'ZBook', 'SN1324687'),
(3, 'Smartphone', 'Motorola', 'Edge Neo 30', 'SN65487454'),
(5, 'Consola', 'Sony', 'PS5', 'SN651654'),
(6, 'Tableta', 'Apple', 'Ipad', 'SN651685854');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `folio` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `estimado` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estatus` enum('Abierto','Diagnóstico','Cerrado','Garantía','Cancelado') DEFAULT 'Abierto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`folio`, `cliente_id`, `equipo_id`, `servicio`, `estimado`, `descripcion`, `fecha`, `estatus`) VALUES
(1, 1, 1, 'Limpieza', 200, 'Limpieza de Wii.', '2022-11-13', 'Diagnóstico'),
(5, 2, 5, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Garantía'),
(6, 8, 1, 'Reparacion', 2345, 'Cambio de Equipo', '2022-11-15', 'Abierto'),
(7, 1, 3, 'Cambio', 345, 'Un Cambio Nuevo', '2022-11-15', 'Abierto'),
(8, 4, 1, 'Cambio', 7989, 'Reparacion de Bateria', '2022-11-15', 'Abierto'),
(9, 8, 1, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Cerrado'),
(10, 3, 1, 'Reparacion', 2345, 'Cambio de Equipo', '2022-11-15', 'Abierto'),
(11, 2, 1, 'Reparacion', 2345, 'Reparacion de Bateria', '2022-11-15', 'Diagnóstico'),
(12, 1, 3, 'Cambio', 651514, 'Actualización de Software', '2022-11-15', 'Abierto'),
(13, 8, 2, 'Reparacion', 2345, 'Cambio de Pantalla', '2022-11-15', 'Abierto'),
(14, 3, 1, 'Arreglo', 7989, 'Actualización de Software', '2022-11-15', 'Abierto'),
(15, 4, 2, 'Arreglo', 7989, 'Actualización de Software', '2022-11-15', 'Abierto'),
(16, 7, 1, 'Reparacion', 2345, 'Actualización de Software', '2022-11-15', 'Abierto'),
(17, 7, 2, 'Cambio', 7989, 'Reparacion de Bateria', '2022-11-15', 'Abierto'),
(18, 7, 1, 'Reparacion', 7989, 'Actualización de Software', '2022-11-15', 'Garantía');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usuario_id`, `username`, `password`) VALUES
(1, 'Adrian', 'password'),
(2, 'Barbara', 'password'),
(3, 'Pamela', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk___clients_id` (`cliente_id`),
  ADD KEY `fk___devices_id` (`equipo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk___clients_id` FOREIGN KEY (`cliente_id`) REFERENCES `clients` (`cliente_id`),
  ADD CONSTRAINT `fk___devices_id` FOREIGN KEY (`equipo_id`) REFERENCES `devices` (`equipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
