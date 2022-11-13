-- Generation Time: Nov 12, 2022 at 08:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `ticketsys`
-- --------------------------------------------------------
-- Table structure for table `clients`

CREATE TABLE `clients` (
  `clienteid` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `comentarios` varchar(300) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `clients`
  ADD PRIMARY KEY (`clienteid`);

ALTER TABLE `clients`
  MODIFY `clienteid` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `tickets` (`nombre`, `apellido`, `correo`, `telefono`, `comentarios`) VALUES
('Juan', 'Perez', 'juan_perez@email.com', '3856748596', 'Algún comentario por aquí.'),
('Sakura', 'Kinomoto', 'sakura@gmail.com', '3366998855', ' '),
('Hotarou', 'Oreki', 'hyouka@animefans.com', '4455667788', 'Deja anticipo.');
