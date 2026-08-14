-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3300
-- Tiempo de generación: 01-04-2024 a las 04:22:46
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
-- Base de datos: `zuricatas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `id_administrativo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tip_doc` varchar(50) DEFAULT NULL,
  `nu_doc` varchar(50) DEFAULT NULL,
  `telef` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(300) DEFAULT NULL,
  `usuario_habilitado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`id_administrativo`, `nombre`, `apellido`, `tip_doc`, `nu_doc`, `telef`, `usuario`, `contraseña`, `usuario_habilitado`) VALUES
(1, 'aura maria', 'rangel', '1', '41753011', '3213500082', 'aura', 'andres', 1),
(2, 'pepe', 'perez', '1', '1019123752', '3214571643', 'el pepe', '$2y$10$/mcGtag3Dqc.WwtyicukDuP0GGeqtBX.iJCu6x79e44KzvJOAPVfC', 1),
(3, 'harry', 'potter', '1', '1212121212', '3232323232', 'harry', '$2y$10$55mBFAmwjvrpNCSKtRAw4.ngRy/w29xPXwiSxp.Aeby', 0),
(4, 'armando', 'mendoza', '1', '10101010', '32323', 'don armando', 'armando', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenista`
--

CREATE TABLE `almacenista` (
  `id_almacenista` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tip_doc` varchar(50) DEFAULT NULL,
  `no_doc` varchar(15) DEFAULT NULL,
  `telef` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(300) DEFAULT NULL,
  `habilitar_almacenista` tinyint(1) NOT NULL DEFAULT 1,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacenista`
--

INSERT INTO `almacenista` (`id_almacenista`, `nombre`, `apellido`, `tip_doc`, `no_doc`, `telef`, `usuario`, `contraseña`, `habilitar_almacenista`, `id_rol`) VALUES
(1, 'sandra carolina', 'rangel', '1', '98041050403', '3219320963', 'sandra', '123456789', 1, NULL),
(2, 'zenaida', 'pulido', '1', '123123123', '321321321', 'zenaida', '$2y$10$Oo8CmxLWLCHzNNRNWvG4T.P.ZajYkHiwzQtkfQlAZrcMI3pJzPV5G', 1, NULL),
(3, 'janine', 'pulido', '1', '0303030', '3030303030', 'janine', '$2y$10$VV0ZaE4mwHx8/mEvMrlcVOdXC/6JtPWIaad5mefdsj7U/4mz1HP/C', 1, NULL),
(4, 'viky', 'cardenas', '1', '01010101', '2222222', 'viky', '$2y$10$eAqnGTxYAQPPNXfOrjGLDejxik.etv1p9136lyKVuKcLXOTW4XBia', 1, NULL),
(5, 'viviana', 'restrepo', '1', '0505050505', '31231312312', 'viviana', '$2y$10$RjUW1jzuh54peBDfcRFEVeSbJnIHDTamUcQas8TJde.VQDreUknEe', 1, NULL),
(6, 'dayana', 'prado', '1', '10101010', '32121212', 'dayana', 'dayana', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `type_doc` varchar(20) DEFAULT NULL,
  `num_doc` varchar(20) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `type_doc`, `num_doc`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `fecha`, `id_rol`) VALUES
(1, '1', '1015474301', 'andres', 'rangel ', '3125705923', 'shaggy@gmail.com', 'subayork', '2024-03-29 00:00:00', 3),
(2, '1', '96101513464', 'octavio', 'castillo', '3214571643', 'checo.ca.pa@hotmail.com', 'soacha pueblo', '2024-03-29 00:00:00', 3),
(3, '1', '1019124751', 'ezequiel octavio', 'castillo parra ', '3214571643', 'castilloparrae@gmail.com', 'soacha  amaranto real ', '2024-03-29 00:00:00', 3),
(4, '1', '1004037673', 'braulio', 'castillo', '3178888044', 'brauliocas@gmail.com', 'soacha pueblo', '2024-03-29 00:00:00', 3),
(5, '1', '98041050403', 'brian', 'rangel', '3214571643', 'briana@gmail.com', 'suba', '2024-03-29 00:00:00', 3),
(6, '1', '21118889', 'blanca', 'parra parada', '3142080325', 'blanca@hotmail.com', 'amaranto real t6 apto 805', '2024-03-31 00:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_prendas`
--

CREATE TABLE `estado_prendas` (
  `id_estado_prendas` int(11) NOT NULL,
  `nombre_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_prendas`
--

INSERT INTO `estado_prendas` (`id_estado_prendas`, `nombre_estado`) VALUES
(1, 'En proceso'),
(2, 'lista por entregar'),
(3, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gastos` int(11) NOT NULL,
  `detalle` text DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gastos`, `detalle`, `valor`, `fecha`) VALUES
(1, 'esfero', 1500.00, '2024-03-31 00:00:00'),
(2, 'calculadora', 2000.00, '2024-03-31 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `master`
--

CREATE TABLE `master` (
  `id_master` int(11) NOT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `master`
--

INSERT INTO `master` (`id_master`, `usuario`, `contraseña`) VALUES
(0, 'ezequiel', '1019124751'),
(1, 'andres', '1015474301');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE `orden_producto` (
  `id` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `nombre_prenda` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_producto`
--

INSERT INTO `orden_producto` (`id`, `id_orden`, `nombre_prenda`, `cantidad`, `observaciones`, `total`) VALUES
(1, 1, 'sweater', 3, 'sweter: amarillo koaj, gris disney, cafe tommy ', 15000.00),
(2, 2, 'zapatillas', 1, 'par zapatilas amarillas', 10000.00),
(3, 3, 'zapatillas', 1, 'par zapatilas amarillas', 10000.00),
(4, 4, 'falda', 1, ' falda: negra', 5000.00),
(5, 5, 'pantalones', 1, 'jena koaj', 5000.00),
(6, 6, 'camisetas', 1, ' camiseta blanca', 5000.00),
(7, 7, 'camisas', 1, 'camisa: blanca color sin marca ', 5000.00),
(8, 7, 'pantalones', 1, 'pantalon:negro koaj', 5000.00),
(9, 7, 'zapatillas', 1, 'par de zapatos negros  en cuero ', 10000.00),
(10, 8, 'pantalones', 1, 'pantalon', 5000.00),
(11, 8, 'vestido_paño', 1, 'vestido', 16000.00),
(12, 8, 'corbata', 1, 'corbata', 5000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE `orden_trabajo` (
  `id_orden` int(40) NOT NULL,
  `num_doc` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_estado_prendas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`id_orden`, `num_doc`, `fecha_creacion`, `id_estado_prendas`) VALUES
(1, '1019124751', '2024-03-31 05:00:00', 2),
(2, '1015474301', '2024-03-31 05:00:00', 3),
(3, '1015474301', '2024-03-31 05:00:00', 3),
(4, '21118889', '2024-03-31 05:00:00', 1),
(5, '1015474301', '2024-03-31 05:00:00', 1),
(6, '1019124751', '2024-03-31 05:00:00', 1),
(7, '1004037673', '2024-03-31 05:00:00', 3),
(8, '1015474301', '2024-03-31 05:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_prenda` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_prenda`, `precio`) VALUES
(1, 'camisas', 5000.00),
(2, 'pantalones', 5000.00),
(3, 'chaquetas', 8000.00),
(4, 'chalecos', 5000.00),
(5, 'camisetas', 5000.00),
(6, 'camiseta_polo', 5000.00),
(7, 'vestido_paño', 16000.00),
(8, 'corbata', 5000.00),
(9, 'vestido_fiesta', 20000.00),
(10, 'pantalonetas', 5000.00),
(11, 'enterizo_mono', 10000.00),
(12, 'falda', 5000.00),
(13, 'zapatillas', 10000.00),
(14, 'sweater', 5000.00),
(15, 'blusa', 5000.00),
(16, 'bufanda', 5000.00),
(17, 'pañoletas', 5000.00),
(18, 'gorras', 8000.00),
(19, 'maletas', 15000.00),
(20, 'acolchado', 20000.00),
(21, 'acolchado_semidoble', 25000.00),
(22, 'acolchado_doble', 30000.00),
(23, 'acolchado_queen', 35000.00),
(24, 'acolchado_king', 40000.00),
(25, 'cobijas', 20000.00),
(26, 'cobija_semidoble', 25000.00),
(27, 'cobija_doble', 30000.00),
(28, 'cobija_queen', 35000.00),
(29, 'cobija_king', 40000.00),
(30, 'juego_sabanas', 12000.00),
(31, 'duvet', 18000.00),
(32, 'toallas', 5000.00),
(33, 'tapetes', 100000.00),
(34, 'cubrelecho', 18000.00),
(35, 'cubrelecho_sencillo', 18000.00),
(36, 'cubrelecho_semidoble', 20000.00),
(37, 'cubrelecho_doble', 25000.00),
(38, 'cubrelecho_queen', 30000.00),
(39, 'cubrelecho_king', 35000.00),
(40, 'otros', 5000.00),
(41, 'prenda_plancha', 2500.00),
(42, 'mantel_plancha', 5000.00),
(43, 'dubet_plancha', 12000.00),
(44, 'sabanas_plancha', 5000.00),
(45, 'lavado_peso', 3000.00),
(46, 'tintura', 20000.00),
(47, 'cueros_gamusas', 100000.00),
(48, 'devoluciones', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `type_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `type_rol`) VALUES
(1, 'Administrativo'),
(2, 'Almacenista'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `tip_doc` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `alias` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`tip_doc`, `descripcion`, `alias`) VALUES
(1, 'cedula de ciudadania', 'Cc'),
(2, 'cedula de extranjeria', 'Ce'),
(3, 'pasaporte', 'Ps'),
(4, 'nit', 'Nt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `totales`
--

CREATE TABLE `totales` (
  `id` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `cantidadTotal` int(11) DEFAULT NULL,
  `totalTotal` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_estado_prendas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `totales`
--

INSERT INTO `totales` (`id`, `id_orden`, `cantidadTotal`, `totalTotal`, `fecha`, `id_estado_prendas`) VALUES
(1, 1, 3, 15000.00, '2024-03-31', 2),
(2, 2, 1, 10000.00, '2024-03-31', 3),
(3, 3, 1, 10000.00, '2024-03-31', 3),
(4, 4, 1, 5000.00, '2024-03-31', 1),
(5, 5, 1, 5000.00, '2024-03-31', 1),
(6, 6, 1, 5000.00, '2024-03-31', 1),
(7, 7, 3, 20000.00, '2024-03-31', 3),
(8, 8, 3, 26000.00, '2024-03-31', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_administrativo`);

--
-- Indices de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD PRIMARY KEY (`id_almacenista`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente_rol` (`id_rol`);

--
-- Indices de la tabla `estado_prendas`
--
ALTER TABLE `estado_prendas`
  ADD PRIMARY KEY (`id_estado_prendas`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gastos`);

--
-- Indices de la tabla `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id_master`);

--
-- Indices de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`tip_doc`);

--
-- Indices de la tabla `totales`
--
ALTER TABLE `totales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `id_administrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  MODIFY `id_almacenista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado_prendas`
--
ALTER TABLE `estado_prendas`
  MODIFY `id_estado_prendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  MODIFY `id_orden` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `totales`
--
ALTER TABLE `totales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD CONSTRAINT `almacenista_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
