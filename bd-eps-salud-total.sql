-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2019 a las 20:23:20
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
  `horacita` time NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiapacientes`
--

CREATE TABLE `historiapacientes` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `lugarnacimiento` varchar(50) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `pkid` int(11) NOT NULL,
  `pacienteid` int(20) NOT NULL,
  `medicoid` int(20) NOT NULL,
  `fechaformula` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(1, 123, 'thor', 'midgard', '232322', 'thor@gmail.com', 'calle 4444', 'Medellin', '2019-05-17 21:18:33', '2019-05-17 21:18:33');

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
  `observaciones` varchar(255) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`pkid`, `pacienteid`, `clave`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `ciudad`, `observaciones`, `fecharegistro`, `fechamodificacion`) VALUES
(6, 123, '202cb962ac59075b964b07152d234b70', 'cristian', 'ospina', '65656', 'cris@gmail.com', 'calle 34 B', 'Caldas', '', '2019-05-19 16:21:17', '2019-05-19 16:21:17'),
(7, 666, 'fae0b27c451c728867a567e8c1bb4e53', 'thor', 'Midgard', '66666', 'thor@gmail.com', 'calle 66666', 'Asgard', '', '2019-05-19 18:08:03', '2019-05-19 18:08:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citaspacientes`
--
ALTER TABLE `citaspacientes`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `pacienteid` (`pacienteid`),
  ADD UNIQUE KEY `medicoid` (`medicoid`);

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
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiapacientes`
--
ALTER TABLE `historiapacientes`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
