-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2016 a las 22:02:50
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cita`
--

CREATE TABLE `Cita` (
  `idCita` int(11) NOT NULL,
  `hinicio` time DEFAULT NULL,
  `hfin` time DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL,
  `idinteresado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depto`
--

CREATE TABLE `depto` (
  `iddepto` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depto`
--

INSERT INTO `depto` (`iddepto`, `nombre`) VALUES
(1, 'Departamento patito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DiaPref`
--

CREATE TABLE `DiaPref` (
  `idDia` int(11) NOT NULL,
  `dia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DiaSol`
--

CREATE TABLE `DiaSol` (
  `idDia` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HoraPref`
--

CREATE TABLE `HoraPref` (
  `idHorario` int(11) NOT NULL,
  `hinicio` time DEFAULT NULL,
  `hfin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HoraSol`
--

CREATE TABLE `HoraSol` (
  `idHorario` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `interesado`
--

INSERT INTO `interesado` (`idinteresado`, `nombre`, `appaterno`, `apmaterno`, `correo`, `telefono`) VALUES
(1, 'DODO', 'DEDE', 'UDU', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mensaje`
--

CREATE TABLE `Mensaje` (
  `idMensaje` int(11) NOT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `asunto` varchar(30) DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `depto_iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `contrasena` blob NOT NULL,
  `iddepto` int(11) NOT NULL,
  `cargo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `appaterno`, `apmaterno`, `correo`, `contrasena`, `iddepto`, `cargo`) VALUES
(1, 'Nathaniel', 'Cabrera', 'Herrera', 'nathaniel981@gmail.com', 0xca1f5daa97182bd802a026a132c8e8e4, 1, 2),
(2, 'Nathaniel', 'Cabrera', 'Herrera', 'nathaniel981@hotmail.com', 0xca1f5daa97182bd802a026a132c8e8e4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solicitud`
--

CREATE TABLE `Solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idinteresado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SolicitudToken`
--

CREATE TABLE `SolicitudToken` (
  `idtoken` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `token` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `Cita`
--
ALTER TABLE `Cita`
  ADD PRIMARY KEY (`idCita`,`idarea`,`iddepto`,`idinteresado`),
  ADD KEY `fk_Cita_area1_idx` (`idarea`,`iddepto`),
  ADD KEY `fk_Cita_interesado1_idx` (`idinteresado`);

--
-- Indices de la tabla `depto`
--
ALTER TABLE `depto`
  ADD PRIMARY KEY (`iddepto`);

--
-- Indices de la tabla `DiaPref`
--
ALTER TABLE `DiaPref`
  ADD PRIMARY KEY (`idDia`);

--
-- Indices de la tabla `DiaSol`
--
ALTER TABLE `DiaSol`
  ADD PRIMARY KEY (`idSolicitud`,`idDia`),
  ADD KEY `fk_Dia_has_Solicitud_Solicitud1_idx` (`idSolicitud`),
  ADD KEY `fk_Dia_has_Solicitud_Dia1_idx` (`idDia`);

--
-- Indices de la tabla `HoraPref`
--
ALTER TABLE `HoraPref`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `HoraSol`
--
ALTER TABLE `HoraSol`
  ADD PRIMARY KEY (`idSolicitud`,`idHorario`),
  ADD KEY `fk_Horario_has_Solicitud_Solicitud1_idx` (`idSolicitud`),
  ADD KEY `fk_Horario_has_Solicitud_Horario1_idx` (`idHorario`);

--
-- Indices de la tabla `interesado`
--
ALTER TABLE `interesado`
  ADD PRIMARY KEY (`idinteresado`);

--
-- Indices de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD PRIMARY KEY (`idMensaje`,`depto_iddepto`),
  ADD KEY `fk_Mensaje_depto1_idx` (`depto_iddepto`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`,`iddepto`),
  ADD KEY `fk_personal_depto1_idx` (`iddepto`);

--
-- Indices de la tabla `Solicitud`
--
ALTER TABLE `Solicitud`
  ADD PRIMARY KEY (`idSolicitud`,`idinteresado`,`idarea`,`iddepto`),
  ADD KEY `fk_Solicitud_interesado1_idx` (`idinteresado`),
  ADD KEY `fk_Solicitud_area1_idx` (`idarea`,`iddepto`);

--
-- Indices de la tabla `SolicitudToken`
--
ALTER TABLE `SolicitudToken`
  ADD PRIMARY KEY (`idtoken`),
  ADD KEY `idSolicitud` (`idSolicitud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Cita`
--
ALTER TABLE `Cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `interesado`
--
ALTER TABLE `interesado`
  MODIFY `idinteresado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Solicitud`
--
ALTER TABLE `Solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `SolicitudToken`
--
ALTER TABLE `SolicitudToken`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_area_depto` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Cita`
--
ALTER TABLE `Cita`
  ADD CONSTRAINT `Cita_ibfk_1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cita_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DiaSol`
--
ALTER TABLE `DiaSol`
  ADD CONSTRAINT `DiaSol_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `Solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Dia_has_Solicitud_Dia1` FOREIGN KEY (`idDia`) REFERENCES `DiaPref` (`idDia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `HoraSol`
--
ALTER TABLE `HoraSol`
  ADD CONSTRAINT `HoraSol_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `Solicitud` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Horario_has_Solicitud_Horario1` FOREIGN KEY (`idHorario`) REFERENCES `HoraPref` (`idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD CONSTRAINT `fk_Mensaje_depto1` FOREIGN KEY (`depto_iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_depto1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Solicitud`
--
ALTER TABLE `Solicitud`
  ADD CONSTRAINT `Solicitud_ibfk_1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Solicitud_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
