-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-02-2022 a las 19:57:02
-- Versión del servidor: 8.0.27-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gas_anzoategui`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `tipo_documento` varchar(5) NOT NULL,
  `cedula` int NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `nombre`, `apellido`, `tipo_documento`, `cedula`, `direccion`, `telefono`) VALUES
(1, 'PEDRO', 'PEREZ', 'v', 21000221, 'barcelona', '02812582585'),
(4, 'roberto', 'pelaes', 'V', 123456789, 'dasdasdasdasd', '0124585523');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `companyId` int NOT NULL,
  `name` varchar(80) NOT NULL,
  `moneda` varchar(5) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `rif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`companyId`, `name`, `moneda`, `direccion`, `telefono`, `rif`) VALUES
(1, 'Gas Anzoategui', 'BS', 'Anzoategui', '99999999', '00000000-0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precio`
--

CREATE TABLE `lista_precio` (
  `lista_id` int NOT NULL,
  `precio` int NOT NULL,
  `tipo_ventaId` int NOT NULL,
  `productoId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `lista_precio`
--

INSERT INTO `lista_precio` (`lista_id`, `precio`, `tipo_ventaId`, `productoId`) VALUES
(3, 1, 3, 17),
(4, 2, 4, 17),
(5, 3, 5, 17),
(6, 4, 6, 17),
(7, 5, 7, 17),
(8, 220, 1, 18),
(9, 320, 2, 18),
(10, 200, 1, 19),
(11, 300, 2, 19),
(12, 120, 1, 20),
(13, 25, 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int NOT NULL,
  `cliente_id` int NOT NULL,
  `tipo_pago_id` int NOT NULL,
  `total` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `isGranel` int NOT NULL DEFAULT '0',
  `tipo_ventaId` int NOT NULL,
  `refPago` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8_general_ci  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `cliente_id`, `tipo_pago_id`, `total`, `fecha`, `status`, `isGranel`, `tipo_ventaId`, `refPago`) VALUES
(23, 4, 2, 0, '2022-02-10 17:51:14', 1, 0, 0, ''),
(24, 1, 1, 70, '2022-02-14 17:09:11', 0, 0, 0, ''),
(25, 1, 1, 480, '2022-02-15 16:45:31', 0, 0, 0, ''),
(26, 1, 1, 350, '2022-02-15 16:59:35', 0, 0, 2, ''),
(27, 1, 1, 75, '2022-02-18 11:53:34', 0, 0, 2, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_item`
--

CREATE TABLE `pedido_item` (
  `item_id` int NOT NULL,
  `productoId` int NOT NULL,
  `pedido_id` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `pedido_item`
--

INSERT INTO `pedido_item` (`item_id`, `productoId`, `pedido_id`, `cantidad`, `precio_unitario`, `total`) VALUES
(3, 1, 22, 1, 100, 100),
(4, 5, 22, 3, 10, 30),
(5, 15, 24, 2, 25, 50),
(6, 5, 24, 2, 10, 20),
(7, 20, 25, 4, 120, 480),
(8, 20, 26, 4, 25, 100),
(9, 20, 26, 5, 25, 125),
(10, 20, 26, 5, 25, 125),
(11, 20, 27, 3, 25, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `productoId` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8_general_ci  NOT NULL,
  `precioUnitario` decimal(6,0) NOT NULL,
  `peso` decimal(6,0) NOT NULL,
  `unidadMetrica` varchar(15) NOT NULL,
  `isGranel` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombre`, `precioUnitario`, `peso`, `unidadMetrica`, `isGranel`) VALUES
(5, 'cilindro', '10', '40', 'kg', 0),
(15, 'cilindro', '25', '43', 'kg', 0),
(18, 'test', '0', '15', 'lt', 1),
(19, 'test', '0', '15', 'lt', 0),
(20, 'hola', '0', '222', 'kg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `rol_id` int NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`rol_id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'gerente'),
(3, 'super usuario'),
(4, 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `pago_id` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`pago_id`, `nombre`) VALUES
(1, 'efectivo'),
(2, 'pago movil'),
(3, 'tranferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_venta`
--

CREATE TABLE `tipo_venta` (
  `tipo_venta_id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `granel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `tipo_venta`
--

INSERT INTO `tipo_venta` (`tipo_venta_id`, `nombre`, `granel`) VALUES
(1, 'comercial', 0),
(2, 'comunal', 0),
(3, 'residencial', 1),
(4, 'comercial', 1),
(5, 'industriales', 1),
(6, 'publicas', 1),
(7, 'sin valor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `rol_id` int NOT NULL,
  `company_id` int NOT NULL,
  `email` varchar(80) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre_completo` varchar(40) NOT NULL,
  `cedula` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `rol_id`, `company_id`, `email`, `contrasena`, `nombre_completo`, `cedula`) VALUES
(1, 1, 1, 'admin@gmail.com', '467b617fec4d9fcb63505734ee224851', 'Fares figueroa', 999999);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyId`);

--
-- Indices de la tabla `lista_precio`
--
ALTER TABLE `lista_precio`
  ADD PRIMARY KEY (`lista_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indices de la tabla `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`productoId`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`pago_id`);

--
-- Indices de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  ADD PRIMARY KEY (`tipo_venta_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `companyId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_precio`
--
ALTER TABLE `lista_precio`
  MODIFY `lista_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pedido_item`
--
ALTER TABLE `pedido_item`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `productoId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `rol_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `pago_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  MODIFY `tipo_venta_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
