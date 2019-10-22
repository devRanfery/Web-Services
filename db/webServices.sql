-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2019 a las 08:39:40
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
-- Base de datos: `webServices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Admin`
--

INSERT INTO `Admin` (`id`, `user`, `email`, `password`, `phone`) VALUES
(3, 'Ranfery Alvarez', 'ranfery99@hotmail.com', '$2y$10$zQ.8rs8S6F6dyB/6NptQMOfA0FdkelCrCDlHGQQToQw.eu9fIGmcK', '2291870114'),
(5, 'Everardo Bautista', 'ever@gmail.com', '$2y$10$rhU2avaaH.gX4HoWIJGwo.fH/lP/.8l7BCHTde7Rj/EyD35S0uf/e', '2291870115'),
(6, 'SuperUsuario', 'admin@gmail.com', '$2y$10$DU9fOB4tOC9awKYVm./asuDZcFLn2yQwrgmIRM2TTdsA4lkWBIWSa', '7821229383');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Libros`
--

CREATE TABLE `Libros` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `hall` varchar(255) NOT NULL,
  `uantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Libros`
--

INSERT INTO `Libros` (`id`, `title`, `author`, `editorial`, `gender`, `hall`, `uantity`) VALUES
(1, 'EL principito', 'Antoine Saint', 'Andina', 'Aventura', 'A23', 7),
(2, 'El corazon de la piedra', 'Jose Maria Garcia Lopez', 'Nocturna', 'Aventura', 'A23', 5),
(5, 'Sinsajo', 'Suzanne Collins', 'RBA Libros', 'Distopico / Ciencia FicciÃ³n', 'A1', 5),
(7, 'Viaje al corazÃ³n del hambre', 'Xavier Aldekoa', 'Ebooks de Vanguardia - EdiciÃ³n 2011', 'PeriodÃ­stico', 'A2', 5),
(8, 'Cry Wolf (Alfa y Omega I) ', 'Patricia Briggs', 'VersÃ¡til', 'Ciencia Ficcion', 'A4', 5),
(9, 'AmÃ©rica fotografiada (AmÃ©rica del Sur y CentroamÃ©rica)', 'David Flecha', 'LFB', 'Libro de fotografÃ­as - papel fotogrÃ¡fico', 'A12', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prestamos`
--

CREATE TABLE `Prestamos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `departure_date` date NOT NULL,
  `entry_date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `Prestamos`
--
DELIMITER $$
CREATE TRIGGER `Devolver` BEFORE DELETE ON `Prestamos` FOR EACH ROW BEGIN
	UPDATE Libros SET Libros.uantity = Libros.uantity + 1
	WHERE Libros.id = (SELECT id FROM `Prestamos` WHERE Prestamos.time <= CURRENT_TIME ORDER BY TIME(time) DESC LIMIT 1);
	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Restar` AFTER INSERT ON `Prestamos` FOR EACH ROW BEGIN
	UPDATE Libros SET Libros.uantity = Libros.uantity -1
	WHERE Libros.id = (SELECT id FROM `Prestamos` WHERE Prestamos.time     	 <= CURRENT_TIME ORDER BY TIME(time) DESC LIMIT 1);	
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Libros`
--
ALTER TABLE `Libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Prestamos`
--
ALTER TABLE `Prestamos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Libros`
--
ALTER TABLE `Libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Prestamos`
--
ALTER TABLE `Prestamos`
  ADD CONSTRAINT `Prestamos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
