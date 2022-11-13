-- Generation Time: Nov 12, 2022 at 08:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `ticketsys`

CREATE TABLE `tickets` (
  `folio` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `estimado` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `estatus` ENUM('Abierto', 'Diagnóstico', 'Cerrado', 'Garantía', 'Cancelado')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `tickets`
  ADD PRIMARY KEY (`folio`);

ALTER TABLE `tickets`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE tickets
  ADD CONSTRAINT FOREIGN KEY (`clienteid`) REFERENCES clients (`clienteid`);

ALTER TABLE `tickets` CHANGE `estatus` `estatus` ENUM('Abierto','Diagnóstico','Cerrado','Garantía','Cancelado')
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Abierto';

ALTER TABLE `tickets` CHANGE `fecha` `fecha` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;

INSERT INTO `tickets` (`folio`, `clienteid`, `tipo`, `marca`, `modelo`, `serie`, `servicio`, `estimado`, `descripcion`, `fecha`, `estatus`)
  VALUES ('1', '1', 'Consola', 'Nintendo', 'Wii', '1234', 'Limpieza', '200', 'Limpieza de Wii.', '2022-11-13', 'Abierto');