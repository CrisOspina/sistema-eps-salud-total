-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 01:28:53
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd-eps-salud-total`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaspacientes`
--

CREATE TABLE `citaspacientes` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `fechacita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` varchar(255) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citaspacientes`
--

INSERT INTO `citaspacientes` (`pkid`, `pacienteid`, `medicoid`, `fechacita`, `observaciones`, `fecharegistro`, `fechamodificacion`) VALUES
(60, 6, 2, '2019-05-01 06:00:00', '', '2019-05-21 17:31:03', '2019-05-21 17:31:03'),
(73, 6, 2, '2019-05-01 06:00:00', '', '2019-05-21 19:02:24', '2019-05-21 19:02:24'),
(74, 6, 2, '2019-05-01 06:00:00', '', '2019-05-21 19:08:22', '2019-05-21 19:08:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiapacientes`
--

CREATE TABLE `historiapacientes` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estatura` double NOT NULL,
  `peso` int(11) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `motivoconsulta` varchar(255) NOT NULL,
  `antecedentes` varchar(255) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `fechaingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historiapacientes`
--

INSERT INTO `historiapacientes` (`pkid`, `pacienteid`, `medicoid`, `ciudad`, `estatura`, `peso`, `profesion`, `motivoconsulta`, `antecedentes`, `diagnostico`, `tratamiento`, `fechaingreso`, `fecharegistro`, `fechamodificacion`) VALUES
(1, 6, 2, '6', 1.8, 66, 'dev', 'urgencia', 'ninguno', 'crisis', 'citas posteriores', '2019-05-01 06:00:00', '2019-05-21 20:07:17', '2019-05-21 20:07:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `fechacita` varchar(19) NOT NULL,
  `referencia1` varchar(100) NOT NULL,
  `cantidad1` int(11) NOT NULL,
  `referencia2` varchar(100) NOT NULL,
  `cantidad2` int(11) NOT NULL,
  `referencia3` varchar(100) NOT NULL,
  `cantidad3` int(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`pkid`, `pacienteid`, `medicoid`, `fechacita`, `referencia1`, `cantidad1`, `referencia2`, `cantidad2`, `referencia3`, `cantidad3`, `observaciones`, `fecharegistro`, `fechamodificacion`) VALUES
(1, 60, 60, '60', 'medicamento A', 3, 'medicamento A', 2, 'medicamento A', 4, '1 diaria', '2019-05-21 19:41:26', '2019-05-21 19:41:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `pkid` int(11) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`pkid`, `medicoid`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `ciudad`, `fecharegistro`, `fechamodificacion`) VALUES
(1, 123, 'thor', 'midgard', '232322', 'thor@gmail.com', 'calle 4444', 'Medellin', '2019-05-17 21:18:33', '2019-05-17 21:18:33'),
(2, 333, 'odin', 'midgard', '4545455', 'odin@gmail.com', 'calle 45', 'Asgard', '2019-05-20 00:26:48', '2019-05-20 00:26:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`pkid`, `pacienteid`, `clave`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `ciudad`, `fecharegistro`, `fechamodificacion`) VALUES
(6, 123, '202cb962ac59075b964b07152d234b70', 'cristian', 'ospina', '65656', 'cris@gmail.com', 'calle 34 B', 'Caldas', '2019-05-19 16:21:17', '2019-05-19 16:21:17'),
(7, 666, 'fae0b27c451c728867a567e8c1bb4e53', 'thor', 'Midgard', '66666', 'thor@gmail.com', 'calle 66666', 'Asgard', '2019-05-19 18:08:03', '2019-05-19 18:08:03'),
(12, 333, '12345', 'kat', 'mid', '45445', 'ka@gmail.com', 'djdjdj', 'medellin', '2019-05-19 23:22:41', '2019-05-19 23:22:41'),
(14, 777, 'f1c1592588411002af340cbaedd6fc33', 'hel', 'hel', '545454', 'hel@gmail.com', 'calle midgard', 'Asgard', '2019-05-21 16:24:59', '2019-05-21 16:24:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citaspacientes`
--
ALTER TABLE `citaspacientes`
  ADD PRIMARY KEY (`pkid`);

--
-- Indices de la tabla `historiapacientes`
--
ALTER TABLE `historiapacientes`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `pacienteid` (`pacienteid`),
  ADD UNIQUE KEY `medicoid` (`medicoid`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `pacienteid` (`pacienteid`),
  ADD UNIQUE KEY `medicoid` (`medicoid`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `medicoid` (`medicoid`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `paciente_id` (`pacienteid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citaspacientes`
--
ALTER TABLE `citaspacientes`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `historiapacientes`
--
ALTER TABLE `historiapacientes`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
