-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
<<<<<<< HEAD
-- Tiempo de generación: 10-05-2016 a las 21:18:21
=======
-- Tiempo de generación: 10-05-2016 a las 21:01:29
>>>>>>> e82e06fa842e87912d0ddf431ac6dbadf2c6aaad
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

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombre`, `iddepto`) VALUES
(1, 'Area patito', 1),
(2, 'Area patito2', 1);

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

--
-- Volcado de datos para la tabla `HoraPref`
--

INSERT INTO `HoraPref` (`idHorario`, `hinicio`, `hfin`) VALUES
(1, '09:00:00', '10:00:00'),
(2, '10:00:00', '11:00:00'),
(3, '11:00:00', '12:00:00'),
(4, '12:00:00', '13:00:00'),
(5, '13:00:00', '14:00:00'),
(6, '14:00:00', '15:00:00'),
(7, '18:00:00', '19:00:00'),
(8, '19:00:00', '20:00:00'),
(9, '20:00:00', '21:00:00');

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
(1, 'Idalia', 'Overkill', 'Minions', 'idalia@minions.com', '5562172501');

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
  `fecha` varchar(20) NOT NULL,
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
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idinteresado` int(11) NOT NULL,
  `dia` date DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `asunto`, `estado`, `idinteresado`, `dia`, `idarea`, `iddepto`) VALUES
(0, 'Molestar a hali', 'ACEPTADA', 1, '2016-05-10', 2, 1);

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
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD KEY `Solicitud_ibfk_1` (`idinteresado`),
  ADD KEY `fk_Solicitud_area1` (`idarea`,`iddepto`);

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
-- AUTO_INCREMENT de la tabla `DiaPref`
--
ALTER TABLE `DiaPref`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Cita`
--
ALTER TABLE `Cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DiaPref`
--
ALTER TABLE `DiaPref`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DiaSol`
--
ALTER TABLE `DiaSol`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `HoraPref`
--
ALTER TABLE `HoraPref`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `HoraSol`
--
ALTER TABLE `HoraSol`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT;
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
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `Solicitud_ibfk_1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Solicitud_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
