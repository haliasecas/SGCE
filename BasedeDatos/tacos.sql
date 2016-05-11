-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2016 a las 04:50:10
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `hinicio` varchar(20) DEFAULT NULL,
  `hfin` varchar(20) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL,
  `idinteresado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depto`
--

CREATE TABLE `depto` (
  `iddepto` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `depto`
--

INSERT INTO `depto` (`iddepto`, `nombre`) VALUES
(1, 'Departamento de Reprobados'),
(2, 'Departamento de Gaming');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horapref`
--

CREATE TABLE `horapref` (
  `idHorario` int(11) NOT NULL,
  `hinicio` varchar(20) DEFAULT NULL,
  `hfin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horasol`
--

CREATE TABLE `horasol` (
  `idHorario` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesado`
--

CREATE TABLE `interesado` (
  `idinteresado` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `appaterno` varchar(60) DEFAULT NULL,
  `apmaterno` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMensaje` int(11) NOT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `asunto` varchar(30) DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `appaterno` varchar(60) DEFAULT NULL,
  `apmaterno` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `contrasena` blob,
  `cargo` int(5) DEFAULT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `appaterno`, `apmaterno`, `correo`, `contrasena`, `cargo`, `iddepto`) VALUES
(2, 'Nathaniel', 'Cabrera', 'Herrera', 'nathaniel981@gmail.com', 0xca1f5daa97182bd802a026a132c8e8e4, 2, 1),
(3, 'Nathaniel', 'Cabrera', 'Herrera', 'nathaniel981@hotmail.com', 0xca1f5daa97182bd802a026a132c8e8e4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `idinteresado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudtoken`
--

CREATE TABLE `solicitudtoken` (
  `idtoken` int(11) NOT NULL,
  `token` varchar(20) DEFAULT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`,`iddepto`),
  ADD KEY `fk_area_depto_idx` (`iddepto`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`,`idarea`,`iddepto`,`idinteresado`),
  ADD KEY `fk_Cita_area1_idx` (`idarea`,`iddepto`),
  ADD KEY `fk_Cita_interesado1_idx` (`idinteresado`);

--
-- Indices de la tabla `depto`
--
ALTER TABLE `depto`
  ADD PRIMARY KEY (`iddepto`);

--
-- Indices de la tabla `horapref`
--
ALTER TABLE `horapref`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `horasol`
--
ALTER TABLE `horasol`
  ADD PRIMARY KEY (`idHorario`,`idSolicitud`),
  ADD KEY `fk_Horario_has_Solicitud_Solicitud1_idx` (`idSolicitud`),
  ADD KEY `fk_Horario_has_Solicitud_Horario1_idx` (`idHorario`);

--
-- Indices de la tabla `interesado`
--
ALTER TABLE `interesado`
  ADD PRIMARY KEY (`idinteresado`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMensaje`,`iddepto`),
  ADD KEY `fk_Mensaje_depto1_idx` (`iddepto`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`,`iddepto`),
  ADD KEY `fk_personal_depto1_idx` (`iddepto`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`,`idinteresado`,`idarea`,`iddepto`),
  ADD KEY `fk_Solicitud_interesado1_idx` (`idinteresado`),
  ADD KEY `fk_Solicitud_area1_idx` (`idarea`,`iddepto`);

--
-- Indices de la tabla `solicitudtoken`
--
ALTER TABLE `solicitudtoken`
  ADD PRIMARY KEY (`idtoken`,`idSolicitud`),
  ADD KEY `fk_solicitudtoken_Solicitud1_idx` (`idSolicitud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `depto`
--
ALTER TABLE `depto`
  MODIFY `iddepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horapref`
--
ALTER TABLE `horapref`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `interesado`
--
ALTER TABLE `interesado`
  MODIFY `idinteresado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudtoken`
--
ALTER TABLE `solicitudtoken`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_area_depto` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_Cita_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cita_interesado1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horasol`
--
ALTER TABLE `horasol`
  ADD CONSTRAINT `fk_Horario_has_Solicitud_Horario1` FOREIGN KEY (`idHorario`) REFERENCES `horapref` (`idHorario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Horario_has_Solicitud_Solicitud1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_Mensaje_depto1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_depto1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_Solicitud_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Solicitud_interesado1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudtoken`
--
ALTER TABLE `solicitudtoken`
  ADD CONSTRAINT `fk_solicitudtoken_Solicitud1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
