-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2020 a las 23:31:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appserveroc`
--
CREATE DATABASE IF NOT EXISTS `appserveroc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `appserveroc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ncliente` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idpais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nit`, `ncliente`, `contacto`, `idpais`) VALUES
('0315-080789-106-8', 'DALILA ELIZABETH RIVERA GUERRA', 'JVPM 15978', 1),
('0501-160320-000-1', 'REYESCO LTD', 'RENI YOHALMO REYES', 4),
('0501-999509-699-2', 'DROGUERIA KRISAN, S. DE R.L. DE C.V.', 'Rep. Legal: JOSE SANTOS MORALES SANCHEZ', 2),
('0502-131119-000-4', 'DROGUERIA IMPORTADORA SALAZAR SOCIEDAD ANONIMA', 'REP. L. GUSTAVO SEHIN SALAZAR MONT / Ing. Bertony Salazar', 1),
('0502-261118-000-1', 'VIVANT LABORATORIOS SOCIEDAD ANONIMA', 'JULIO RENE LOPEZ TURCIOS', 1),
('0502-261118-000-2', 'LADI SOCIEDAD ANONIMA', 'PAULA GIRON', 1),
('0504-290119-000-1', 'INVERSIONES PORTILLO MOLINA S. DE RL DE C.V.', 'REP. LEGAL JOSE LUIS PORTILLO MOLINA', 2),
('0505-140119-000-1', 'REPRESENTACIONES FARMACEUTICAS DE NICARAGUA, S.A.', 'REP. L. KARIM ALEJANDRO FARAJ FARACH / CONTAC. MOISES DAVID MARTINEZ', 3),
('0505-270420-000-2', 'COMERCIAL E. DETRINIDAD S.A.', 'Prop. EDGAR LEONARDO DE TRINIDAD CASTRO', 3),
('0801-900226-829-8', 'EYL COMERCIAL  S A', 'Dorys Alejandra Enamorado', 2),
('0J03-000009-327-0', 'FARMACOS INTERNACIONALES DE NICARAGUA, .S.A.', '', 3),
('1123-150515-101-5', 'BENDICION Y PROGRESO, S.A. DE C.V.', '', 5),
('1251-554K--', 'GLOBAL FARMA, SOCIEDAD ANONIMA', '', 1),
('1324-280255-001-9', 'PORFIRIO HERNÁNDEZ ROMERO', '', 5),
('230463959', 'VICTORIANO CHOGUAJ COJTI', '', 1),
('3704-8120--', 'MAJOSA / LILET, S.A.', '', 1),
('4149-262--', 'LABORATORIO Y DROGUERIA DONOVAN WERKE A.G., S.A.', '', 1),
('4275-721--', 'FARMAMEDICA. S.A.', '', 1),
('456987455222', 'pppppa', 'hola ', 2),
('6717-659--', 'KRAL PHARMACEUTICA INTERNACIONAL S.A.', '', 1),
('7793-2455--', 'DISPOSITIVOS MEDICOS DESCARTABLES, SOCIEDAD ANONIMA', 'CARLOS MIGUEL DE LA PAZ', 1),
('7898-1557--', 'PHARMACEUTICOS AREVALO, S.A.', 'LUIS ALBERTO AREVALO MELGAR', 1),
('8096-9933--', 'DISTRIBUIDORA JUCARMI, S.A.', '', 1),
('RTN0-801901-575-6028', 'DISTRIBUIDORA ALFAMEDIC, S DE R.L.', '', 2),
('RUC-CJ0300-000-93270', 'FARMACOS INTERNACIONALES DE NICARAGUA', '(Inactivado 14/10/19) Activo 0J03-000009-327-0', 3),
('RUC-J03100-000-02185', 'SUMINISTROS INTERNACIONALES, S.A.', 'SR. CARLOS LUIS HERNANDEZ', 3),
('RUC.-J03100-000-4013', 'IMPORTACIONES FARMACEUTICAS, S.A.', 'GEOVANNY JOSE JARQUIN GAGO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `idetapa` int(11) NOT NULL,
  `netapas` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo` char(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`idetapa`, `netapas`, `codigo`, `idrol`) VALUES
(1, 'EN ESPERA', '', 1),
(2, 'FINALIZADO', '', 1),
(3, 'A - OC confirmada por cliente', 'A', 2),
(4, 'B - Notificación a áreas correspondientes (memorándum)', 'B', 2),
(5, 'C - Esperando disponibilidad del producto(Se produce y/o se mueve el producto a Exportaciones)', 'C', 3),
(6, 'D - En Facturación', 'D', 2),
(7, 'E - Elaborando documentos proforma', 'E', 2),
(8, 'F - Visando facturas', 'F', 2),
(9, 'G - Esperando Lista de Empaque', 'G', 3),
(10, 'H - En tramitación de transporte', 'H', 3),
(11, 'I - Elaborando documentación (DUCA)', 'I', 2),
(12, 'J - Esperando confirmación del pago de impuestos', 'J', 2),
(13, 'K - Despachando la exportación', 'K', 3),
(14, 'L - Arribando a destino', 'L', 3),
(15, 'M - En tramite de cobro', 'M', 2),
(16, 'N - Documento liquidado (cobro realizado en totalidad)', 'N', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_oc`
--

CREATE TABLE `log_oc` (
  `idlogoc` int(11) NOT NULL,
  `oc` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ncliente` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `netapas` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `f_inicio` date NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc`
--

CREATE TABLE `oc` (
  `oc` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date DEFAULT NULL,
  `dxoc` int(3) DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idpais_etapa` int(11) NOT NULL,
  `visible` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `npais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `npais`) VALUES
(4, 'BELICE'),
(5, 'COSTA RICA'),
(1, 'GUATEMALA'),
(2, 'HONDURAS'),
(3, 'NICARAGUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais_etapa`
--

CREATE TABLE `pais_etapa` (
  `idpais_etapa` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `idetapa` int(11) NOT NULL,
  `porcentaje` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pais_etapa`
--

INSERT INTO `pais_etapa` (`idpais_etapa`, `idpais`, `idetapa`, `porcentaje`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 100),
(3, 1, 3, 7),
(4, 1, 4, 14),
(5, 1, 5, 21),
(6, 1, 6, 29),
(7, 1, 7, 36),
(8, 1, 8, 43),
(9, 1, 9, 50),
(10, 1, 10, 57),
(11, 1, 11, 64),
(12, 1, 12, 71),
(13, 1, 13, 79),
(14, 1, 14, 86),
(15, 1, 15, 93),
(16, 1, 16, 96),
(17, 2, 1, 0),
(18, 2, 2, 100),
(19, 2, 3, 10),
(20, 2, 4, 20),
(21, 2, 5, 30),
(22, 2, 6, 40),
(23, 2, 7, 50),
(24, 2, 8, 60),
(25, 2, 13, 69),
(26, 2, 14, 79),
(27, 2, 15, 89),
(28, 2, 16, 96),
(29, 3, 1, 0),
(30, 3, 2, 100),
(31, 3, 3, 8),
(32, 3, 4, 17),
(33, 3, 5, 25),
(34, 3, 6, 33),
(35, 3, 7, 42),
(36, 3, 8, 50),
(37, 3, 9, 58),
(38, 3, 10, 67),
(39, 3, 13, 75),
(40, 3, 14, 83),
(41, 3, 15, 91),
(42, 3, 16, 96),
(43, 4, 1, 0),
(44, 4, 2, 100),
(45, 4, 3, 10),
(46, 4, 4, 20),
(47, 4, 5, 30),
(48, 4, 6, 40),
(49, 4, 7, 50),
(50, 4, 8, 60),
(51, 4, 9, 69),
(52, 4, 13, 79),
(53, 4, 15, 89),
(54, 4, 16, 96),
(56, 5, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'EXPORTACIONES'),
(3, 'LOGISTICA'),
(4, 'VISITAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_user` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `pwd` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre_user`, `pwd`, `idrol`) VALUES
('administrador', 'administador', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('exportaciones', 'exportaciones', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('logistica', 'logistica', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('visitas', 'visitas', '827ccb0eea8a706c4c34a16891f84e7b', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nit`),
  ADD KEY `idpais` (`idpais`),
  ADD KEY `ncliente` (`ncliente`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`idetapa`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `netapas` (`netapas`);

--
-- Indices de la tabla `log_oc`
--
ALTER TABLE `log_oc`
  ADD PRIMARY KEY (`idlogoc`),
  ADD KEY `oc` (`oc`,`ncliente`,`netapas`,`f_inicio`,`usuario`);

--
-- Indices de la tabla `oc`
--
ALTER TABLE `oc`
  ADD PRIMARY KEY (`oc`),
  ADD KEY `nit` (`nit`,`idpais_etapa`),
  ADD KEY `idpais_etapa` (`idpais_etapa`),
  ADD KEY `finicio` (`finicio`,`estado`,`visible`,`descripcion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`),
  ADD KEY `npais` (`npais`);

--
-- Indices de la tabla `pais_etapa`
--
ALTER TABLE `pais_etapa`
  ADD PRIMARY KEY (`idpais_etapa`),
  ADD KEY `idpais` (`idpais`,`idetapa`),
  ADD KEY `idetapa` (`idetapa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idrol_2` (`idrol`),
  ADD KEY `nombre_user` (`nombre_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `idetapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `log_oc`
--
ALTER TABLE `log_oc`
  MODIFY `idlogoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pais_etapa`
--
ALTER TABLE `pais_etapa`
  MODIFY `idpais_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD CONSTRAINT `etapas_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oc`
--
ALTER TABLE `oc`
  ADD CONSTRAINT `oc_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `clientes` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oc_ibfk_2` FOREIGN KEY (`idpais_etapa`) REFERENCES `pais_etapa` (`idpais_etapa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pais_etapa`
--
ALTER TABLE `pais_etapa`
  ADD CONSTRAINT `pais_etapa_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pais_etapa_ibfk_2` FOREIGN KEY (`idetapa`) REFERENCES `etapas` (`idetapa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
