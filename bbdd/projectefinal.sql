-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 16:30:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projectefinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barris`
--

CREATE TABLE `barris` (
  `codiPostal` char(6) NOT NULL,
  `nomBarri` varchar(30) NOT NULL,
  `Poblacio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barris`
--

INSERT INTO `barris` (`codiPostal`, `nomBarri`, `Poblacio`) VALUES
('08012', 'Gràcia', 'Barcelona'),
('08027', 'El Clot', 'Barcelona'),
('08032', 'Horta', 'Barcelona'),
('08042', 'Nou Barris', 'Barcelona'),
('08921', 'Centre Sta.Coloma', 'Santa Coloma de Gramenet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacients`
--

CREATE TABLE `pacients` (
  `idPacient` int(11) NOT NULL,
  `NomPacient` varchar(50) NOT NULL,
  `CognomsPacient` varchar(100) NOT NULL,
  `DNI` varchar(11) NOT NULL,
  `DataNaixament` date NOT NULL,
  `Direccio` varchar(100) NOT NULL,
  `CodiPostal` char(6) NOT NULL,
  `DataPrimeraDosi` date NOT NULL,
  `DataSegonaDosi` date DEFAULT NULL,
  `idVacuna` int(11) NOT NULL,
  `Observacions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacients`
--

INSERT INTO `pacients` (`idPacient`, `NomPacient`, `CognomsPacient`, `DNI`, `DataNaixament`, `Direccio`, `CodiPostal`, `DataPrimeraDosi`, `DataSegonaDosi`, `idVacuna`, `Observacions`) VALUES
(1, 'Roger ', 'Rus Moreno', '48569871Y', '1997-05-02', 'Carrer Plaça de la Vila', '08921', '2021-05-17', NULL, 3, ''),
(3, 'Rosario', 'Fonollosa Iglesias', '45879653K', '1942-03-30', 'Carrer Valencia', '08027', '2021-04-08', '2021-04-30', 1, NULL),
(4, ' Juan', 'López Sierra', '45859610L', '1932-05-17', 'Carrer Verdi ', '08012', '2020-12-01', '2021-05-30', 1, 'Ha tingut febre'),
(5, 'Rosa Mª', 'Llaveria Fonollosa', '25479621P', '1968-01-08', 'Carrer Fabra i Puig', '08042', '2021-05-19', NULL, 3, NULL),
(6, ' José Manuel', 'Blanco Bocanegra', '41257896D', '1967-12-31', 'Carrer Baixada de la Plana', '08032', '2021-05-20', '0000-00-00', 3, 'aksjhfkajshdkja ksjadkaj kjnsdkajn kjbaskdj  akjsd a skdjabskdjnaksjdn ask nd as dka sda sdkna smdn ajgjfg gjfjgj '),
(10, 'Laia', 'Blanco Llaveria', '47965310Y', '1997-07-09', 'Carrer Mestre Serradesanferm', '08032', '2021-05-19', '0000-00-00', 1, 'lalalala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(5) NOT NULL,
  `Nom` varchar(10) NOT NULL,
  `Cognoms` varchar(200) NOT NULL,
  `DNI` varchar(13) NOT NULL,
  `DataNaixament` date NOT NULL,
  `DataRegistro` date NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Contrasenya` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `Nom`, `Cognoms`, `DNI`, `DataNaixament`, `DataRegistro`, `Username`, `Contrasenya`, `Email`) VALUES
(1, 'Laia', 'Blanco Llaveria', '43965310Y', '1997-07-09', '2021-05-14', 'laia', 'laia', 'laia@gmail.com'),
(2, 'pepi1', 'pepi', '47859612L', '2021-02-10', '2021-05-19', 'pepi', 'pepi', 'pepi@pepe.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunes`
--

CREATE TABLE `vacunes` (
  `idVacuna` int(11) NOT NULL,
  `NomVacuna` varchar(50) NOT NULL,
  `DosisNecesaries` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacunes`
--

INSERT INTO `vacunes` (`idVacuna`, `NomVacuna`, `DosisNecesaries`) VALUES
(1, 'Pfizer', 2),
(2, 'Astra Zeneca', 2),
(3, 'Moderna', 2),
(4, 'Janssen', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barris`
--
ALTER TABLE `barris`
  ADD PRIMARY KEY (`codiPostal`);

--
-- Indices de la tabla `pacients`
--
ALTER TABLE `pacients`
  ADD PRIMARY KEY (`idPacient`),
  ADD KEY `idVacuna` (`idVacuna`),
  ADD KEY `CodiPostal` (`CodiPostal`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `vacunes`
--
ALTER TABLE `vacunes`
  ADD PRIMARY KEY (`idVacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacients`
--
ALTER TABLE `pacients`
  MODIFY `idPacient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacunes`
--
ALTER TABLE `vacunes`
  MODIFY `idVacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacients`
--
ALTER TABLE `pacients`
  ADD CONSTRAINT `pacients_ibfk_2` FOREIGN KEY (`idVacuna`) REFERENCES `vacunes` (`idVacuna`),
  ADD CONSTRAINT `pacients_ibfk_3` FOREIGN KEY (`CodiPostal`) REFERENCES `barris` (`codiPostal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
