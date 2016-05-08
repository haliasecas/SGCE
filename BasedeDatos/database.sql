-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2016 at 02:09 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Cita`
--

CREATE TABLE `Cita` (
  `idCita` int(11) NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `hinicio` time DEFAULT NULL,
  `hfin` time DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL,
  `idinteresado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `depto`
--

CREATE TABLE `depto` (
  `iddepto` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depto`
--

INSERT INTO `depto` (`iddepto`, `nombre`) VALUES
(1, 'Departamento patito');

-- --------------------------------------------------------

--
-- Table structure for table `DiaPref`
--

CREATE TABLE `DiaPref` (
  `idDia` int(11) NOT NULL,
  `dia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DiaSol`
--

CREATE TABLE `DiaSol` (
  `idDia` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HoraPref`
--

CREATE TABLE `HoraPref` (
  `idHorario` int(11) NOT NULL,
  `hinicio` time DEFAULT NULL,
  `hfin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HoraSol`
--

CREATE TABLE `HoraSol` (
  `idHorario` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interesado`
--

CREATE TABLE `interesado` (
  `idinteresado` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `appaterno` varchar(60) DEFAULT NULL,
  `apmaterno` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Mensaje`
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
-- Table structure for table `personal`
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
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `appaterno`, `apmaterno`, `correo`, `contrasena`, `iddepto`, `cargo`) VALUES
(1, 'Nathaniel', 'Cabrera', 'Herrera', 'nathaniel981@gmail.com', 0xca1f5daa97182bd802a026a132c8e8e4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Solicitud`
--

CREATE TABLE `Solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idinteresado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`,`iddepto`),
  ADD KEY `fk_area_depto_idx` (`iddepto`);

--
-- Indexes for table `Cita`
--
ALTER TABLE `Cita`
  ADD PRIMARY KEY (`idCita`,`idarea`,`iddepto`,`idinteresado`),
  ADD KEY `fk_Cita_area1_idx` (`idarea`,`iddepto`),
  ADD KEY `fk_Cita_interesado1_idx` (`idinteresado`);

--
-- Indexes for table `depto`
--
ALTER TABLE `depto`
  ADD PRIMARY KEY (`iddepto`);

--
-- Indexes for table `DiaPref`
--
ALTER TABLE `DiaPref`
  ADD PRIMARY KEY (`idDia`);

--
-- Indexes for table `DiaSol`
--
ALTER TABLE `DiaSol`
  ADD PRIMARY KEY (`idDia`,`idSolicitud`),
  ADD KEY `fk_Dia_has_Solicitud_Solicitud1_idx` (`idSolicitud`),
  ADD KEY `fk_Dia_has_Solicitud_Dia1_idx` (`idDia`);

--
-- Indexes for table `HoraPref`
--
ALTER TABLE `HoraPref`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indexes for table `HoraSol`
--
ALTER TABLE `HoraSol`
  ADD PRIMARY KEY (`idHorario`,`idSolicitud`),
  ADD KEY `fk_Horario_has_Solicitud_Solicitud1_idx` (`idSolicitud`),
  ADD KEY `fk_Horario_has_Solicitud_Horario1_idx` (`idHorario`);

--
-- Indexes for table `interesado`
--
ALTER TABLE `interesado`
  ADD PRIMARY KEY (`idinteresado`);

--
-- Indexes for table `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD PRIMARY KEY (`idMensaje`,`depto_iddepto`),
  ADD KEY `fk_Mensaje_depto1_idx` (`depto_iddepto`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`,`iddepto`),
  ADD KEY `fk_personal_depto1_idx` (`iddepto`);

--
-- Indexes for table `Solicitud`
--
ALTER TABLE `Solicitud`
  ADD PRIMARY KEY (`idSolicitud`,`idinteresado`,`idarea`,`iddepto`),
  ADD KEY `fk_Solicitud_interesado1_idx` (`idinteresado`),
  ADD KEY `fk_Solicitud_area1_idx` (`idarea`,`iddepto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_area_depto` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Cita`
--
ALTER TABLE `Cita`
  ADD CONSTRAINT `fk_Cita_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_interesado1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DiaSol`
--
ALTER TABLE `DiaSol`
  ADD CONSTRAINT `fk_Dia_has_Solicitud_Dia1` FOREIGN KEY (`idDia`) REFERENCES `DiaPref` (`idDia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Dia_has_Solicitud_Solicitud1` FOREIGN KEY (`idSolicitud`) REFERENCES `Solicitud` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HoraSol`
--
ALTER TABLE `HoraSol`
  ADD CONSTRAINT `fk_Horario_has_Solicitud_Horario1` FOREIGN KEY (`idHorario`) REFERENCES `HoraPref` (`idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Horario_has_Solicitud_Solicitud1` FOREIGN KEY (`idSolicitud`) REFERENCES `Solicitud` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD CONSTRAINT `fk_Mensaje_depto1` FOREIGN KEY (`depto_iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_depto1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Solicitud`
--
ALTER TABLE `Solicitud`
  ADD CONSTRAINT `fk_Solicitud_area1` FOREIGN KEY (`idarea`,`iddepto`) REFERENCES `area` (`idarea`, `iddepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_interesado1` FOREIGN KEY (`idinteresado`) REFERENCES `interesado` (`idinteresado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
