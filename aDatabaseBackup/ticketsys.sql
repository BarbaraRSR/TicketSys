-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 10:34 PM
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
(4, 'Bruno', 'Bucciarati', '3366998855', 'abc@gmail.com', 'El comentario'),
(5, 'Mista', 'Guido', '1122334455', 'guido@jj.com', 'Nuevo Comentario'),
(7, 'Fugo', 'Pannacotta', '23423423432', 'Pannacotta@jj.com', 'Este es un Comentario nuevo');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `equipo_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`equipo_id`, `tipo`, `modelo`, `serie`) VALUES
(1, 'Celular', 'Motorola', 'NS4851684514'),
(2, 'Computadora', 'Lenovo', 'SN51654564151');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `folio` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `estimado` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estatus` enum('Abierto','Diagnóstico','Cerrado','Garantía','Cancelado') DEFAULT 'Abierto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`folio`, `cliente_id`, `tipo`, `marca`, `modelo`, `serie`, `servicio`, `estimado`, `descripcion`, `fecha`, `estatus`) VALUES
(1, 1, 'Consola', 'Nintendo', 'Wii', '1234', 'Limpieza', 200, 'Limpieza de Wii.', '2022-11-13', 'Abierto');

-- --------------------------------------------------------

--
-- Table structure for table `tickets2`
--

CREATE TABLE `tickets2` (
  `folio` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `estimado` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `creacion` date NOT NULL DEFAULT current_timestamp(),
  `estatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets2`
--

INSERT INTO `tickets2` (`folio`, `cliente`, `correo`, `telefono`, `equipo`, `serie`, `servicio`, `estimado`, `descripcion`, `creacion`, `estatus`) VALUES
(1, 'Joel', 'abc@gmail.com', '3366998855', 'Motorola', 'NR4564356456', 'Arreglo', 103, 'Reparacion de Bateria', '2022-10-11', 'Cerrado'),
(2, 'Bruno', 'abc@gmail.com', '3366998855', 'Motorola', 'NR4564356456', 'Arreglo', 103, 'Reparacion de Bateria', '2022-10-11', 'Abierto'),
(4, 'Joel', 'abc@gmail.com', '3366998855', 'Motorola', 'NR4564356456', 'Arreglo', 0, 'Actualización de Software', '0000-00-00', 'Abierto'),
(5, 'Maria', 'adg@email.com', '3344223344', 'Motorola', 'ND354663565', 'Cambio', 651514, 'Cambio de Equipo', '2022-11-15', 'Cerrado'),
(6, 'Josue', 'dcg@gmail.com', '23423423432', 'Nokia', 'NR4564356456', 'Cambio', 651514, 'Reparacion de Bateria', '0000-00-00', 'Abierto');

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
  ADD KEY `fk___clients_id` (`cliente_id`);

--
-- Indexes for table `tickets2`
--
ALTER TABLE `tickets2`
  ADD PRIMARY KEY (`folio`);

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
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets2`
--
ALTER TABLE `tickets2`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk___clients_id` FOREIGN KEY (`cliente_id`) REFERENCES `clients` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
