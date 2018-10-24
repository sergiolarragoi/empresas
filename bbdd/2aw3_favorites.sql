-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2018 a las 03:36:09
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2aw3_favorites`
--
CREATE DATABASE IF NOT EXISTS `2aw3_favorites` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2aw3_favorites`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertNewUser` (IN `_username` VARCHAR(50), IN `_password` VARCHAR(255), IN `_usertype` VARCHAR(255), IN `_name` VARCHAR(255), IN `_surname` VARCHAR(255), IN `_email` VARCHAR(255))  NO SQL
INSERT INTO `user`(
    `username`,
    `password`,
    `usertype`,
    `name`,
    `surname`,
    `email`
)
VALUES(
    _username,
    _password,
    _usertype,
    _name,
    _surname,
    _email
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectIdByUser` (IN `_user` VARCHAR(50))  NO SQL
BEGIN
    SELECT
        *
    FROM
        user
    WHERE
        username = _user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectUsuarioById` (IN `_idUsuario` INT)  NO SQL
BEGIN
    SELECT
        *
    FROM
        user
    WHERE
        idUser = _idUsuario;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fComprobarUsuario` (`pUsuario` VARCHAR(20), `pPassword` VARCHAR(50)) RETURNS TINYINT(1) NO SQL
BEGIN
    DECLARE
        existeUsuario INT;
    SET
        existeUsuario = 0;
    SET
        existeUsuario =(
        SELECT
            COUNT(*)
        FROM
            user
        WHERE
            pUsuario = username AND pPassword = password
    ); RETURN existeUsuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `idCompany` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `web` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `idSector` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`idCompany`, `name`, `tel`, `web`, `address`, `idSector`, `logo`) VALUES
(2, 'Euskaltel', '1717', 'https://www.euskaltel.com/', 'Parque Científico y Tecnológico de Bizkaia. 48160. Derio. Bizkaia', 1, 'images/02euskaltel.jpg'),
(3, 'Goenaga', '943216327 ', 'https://www.yogurgoenaga.com/', 'Pokopandegi Baserria, 36, 20018 San Sebastián, Guipúzcoa', 2, 'images/03goenaga.gif'),
(4, 'CIFP Zornotza', '946730251', 'http://www.fpzornotza.hezkuntza.net', 'Barrio Urritxe s/n, 48340 Amorebieta-Etxano, BI', 4, 'images/04fpzornotza.jpeg'),
(5, 'Lacturale', '948600449', 'https://www.lacturale.com/eu/', 'Carretera Madoz, s/n, 31868 Etxeberri Arakil', 2, 'images/05lacturale.png'),
(6, 'Baqué', '946215610', 'http://www.baque.com/es/', 'Zuaznabar Kalea, 31, 20180, Gipuzkoa', 2, 'images/06baque.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCompany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list`
--

INSERT INTO `list` (`id`, `idUser`, `idCompany`) VALUES
(9, 5, 2),
(10, 5, 3),
(13, 5, 6),
(14, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `idSector` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `€` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`idSector`, `name`, `€`) VALUES
(1, 'Telecomunications', 500000),
(2, 'Food', 450000),
(3, 'Security', 600000),
(4, 'Education', 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `usertype`, `name`, `surname`, `email`) VALUES
(5, 'iker', '$2y$10$Jr1OhNpXYmHyA68xDOHpbOBKV/kmRz/j/tVxHC8oUhYBIIrxgR59y', '', 'iker', 'Herran', 'iker@okokl.oc'),
(6, 'slarrauri', '1234', '', 'Sergio', 'Larrauri', 'slarrauri@slarrauri.sla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idCompany`),
  ADD KEY `idSector` (`idSector`);

--
-- Indices de la tabla `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCompany` (`idCompany`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`idSector`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `idCompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `idSector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sector` (`idSector`);

--
-- Filtros para la tabla `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
