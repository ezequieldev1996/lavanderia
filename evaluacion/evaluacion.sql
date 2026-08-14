-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 17:58:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tip_doc` varchar(50) NOT NULL,
  `num_doc` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `nombre`, `apellido`, `tip_doc`, `num_doc`, `telefono`, `usuario`, `contraseña`, `pais`) VALUES
(1, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'andres', 'colombia'),
(2, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'nicolas', 'colombia'),
(3, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'jhonathan', 'colombia'),
(4, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'nico', 'colombia'),
(5, 'shaggy', 'andres', '1', '2316749', '987', 'an', '6004d8ca2795db5cd5fb29426bcfaeff396b6b4067461805d8', 'colombia'),
(6, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83', 'colombia'),
(7, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'de22bf82958382848fb672bf95f675c4826c89b92339c2873d', 'colombia'),
(8, 'shaggy', 'andres', '1', '2316749', '987', 'an', '7759c425e452e4e809d194084601097168236325736c3911ba', 'colombia'),
(9, 'shaggy', 'andres', '1', '2316749', '987', 'an', '8af433c069d5b84867730238896a8fa97f07758c2ad9defba1', 'colombia'),
(10, 'shaggy', 'andres', '1', '2316749', '987', 'an', '8af433c069d5b84867730238896a8fa97f07758c2ad9defba1', 'colombia'),
(11, 'shaggy', 'andres', '1', '2316749', '987', 'an', '4774b6224b8e98b96b658092bee32c88c41b1a8c80dcfd7e1f', 'colombia'),
(12, 'shaggy', 'andres', '1', '2316749', '987', 'an', '4774b6224b8e98b96b658092bee32c88c41b1a8c80dcfd7e1f', 'colombia'),
(13, 'shaggy', 'andres', '1', '2316749', '987', 'an', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83', 'colombia'),
(14, 'shaggy', 'andres', '1', '2316749', '987', 'an', '797cfea235e87dfd44424f5f51cbb375cbc5da00f4b254667a', 'colombia'),
(15, 'shaggy', 'andres', '1', '2316749', '987', 'an', '311d3ad343b686f0d01cb1f87b9f24b80e06348f7ce8df7f3b', 'colombia'),
(16, 'shaggy', 'andres', '1', '2316749', '987', 'an', '70a41aad6946c8ad41c6a1f9c7a3b7f7d70dea96dbe85317b3', 'colombia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
