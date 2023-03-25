-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2023 a las 05:56:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gomovies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `idcli` int(11) NOT NULL,
  `nomcli` varchar(35) NOT NULL,
  `apecli` varchar(35) NOT NULL,
  `gener` varchar(15) NOT NULL,
  `tele` char(14) NOT NULL,
  `status` char(1) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `corr` text NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` text NOT NULL,
  `rol` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cust_serv`
--

CREATE TABLE `cust_serv` (
  `idcusser` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `idserv` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `idserv` int(11) NOT NULL,
  `idsus` int(11) NOT NULL,
  `nameserv` text NOT NULL,
  `prec` decimal(10,2) NOT NULL,
  `cont` text NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setting`
--

CREATE TABLE `setting` (
  `idstn` int(11) NOT NULL,
  `rucm` char(16) NOT NULL,
  `namstn` text NOT NULL,
  `direc1` text NOT NULL,
  `direc2` text NOT NULL,
  `telstn` char(9) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `setting`
--

INSERT INTO `setting` (`idstn`, `rucm`, `namstn`, `direc1`, `direc2`, `telstn`, `foto`) VALUES
(1, '1099939393333333', 'GoMovies', 'Avenida Salaverry', 'Avenida Salaverry', '988844434', '414390.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `idsup` int(11) NOT NULL,
  `rucsup` char(14) NOT NULL,
  `namsup` text NOT NULL,
  `corrsup` text NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscrp`
--

CREATE TABLE `suscrp` (
  `idsus` int(11) NOT NULL,
  `noms` varchar(25) NOT NULL,
  `descr` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `status` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `clave`, `rol`, `estado`, `foto`, `fere`) VALUES
(1, 'admin05', 'administrador', 'admin@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', '1', '627743.png', '2023-03-04 02:08:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcli`);

--
-- Indices de la tabla `cust_serv`
--
ALTER TABLE `cust_serv`
  ADD PRIMARY KEY (`idcusser`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `idserv` (`idserv`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idserv`),
  ADD KEY `idsus` (`idsus`);

--
-- Indices de la tabla `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idstn`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsup`);

--
-- Indices de la tabla `suscrp`
--
ALTER TABLE `suscrp`
  ADD PRIMARY KEY (`idsus`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cust_serv`
--
ALTER TABLE `cust_serv`
  MODIFY `idcusser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `idserv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `setting`
--
ALTER TABLE `setting`
  MODIFY `idstn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscrp`
--
ALTER TABLE `suscrp`
  MODIFY `idsus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cust_serv`
--
ALTER TABLE `cust_serv`
  ADD CONSTRAINT `cust_serv_ibfk_1` FOREIGN KEY (`idcli`) REFERENCES `customer` (`idcli`),
  ADD CONSTRAINT `cust_serv_ibfk_2` FOREIGN KEY (`idserv`) REFERENCES `service` (`idserv`);

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idsus`) REFERENCES `suscrp` (`idsus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
