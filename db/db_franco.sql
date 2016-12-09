-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2016 a las 04:56:42
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_compu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cat_gasto`
--

CREATE TABLE `tb_cat_gasto` (
  `id_cat_gasto` int(11) NOT NULL,
  `nomb_cat_gasto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_cat_gasto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cat_ingreso`
--

CREATE TABLE `tb_cat_ingreso` (
  `id_cat_ingreso` int(11) NOT NULL,
  `nombre_cat_ingreso` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_cat_ingreso` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cedula_cl` int(12) NOT NULL,
  `nombre_cl` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_cl` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_cl` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_cl` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `detalle_cl` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg_cl` date NOT NULL,
  `autor_reg_cl` int(12) NOT NULL,
  `direccion_cl` text COLLATE utf8_spanish_ci NOT NULL,
  `actualizado_el` date DEFAULT NULL,
  `actualizado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_equipo`
--

CREATE TABLE `tb_equipo` (
  `dni_eqp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_cliente` int(12) NOT NULL,
  `titulo_eqp` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca_eqp` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo_eqp` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripccion_eqp` text COLLATE utf8_spanish_ci NOT NULL,
  `facha_registro_eqp` datetime DEFAULT NULL,
  `fecha_entrega_eqp` date NOT NULL,
  `hora_entrega` time DEFAULT NULL,
  `precio_rep_eqp` decimal(7,0) DEFAULT NULL,
  `autor_reg_eqp` int(12) DEFAULT NULL,
  `actualizado_el` datetime DEFAULT NULL,
  `actualizado_por` int(12) DEFAULT NULL,
  `estado_rep_eqp` varchar(20) COLLATE utf8_spanish_ci DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo_evento` text COLLATE utf8_spanish_ci NOT NULL,
  `nota_eveto` text COLLATE utf8_spanish_ci,
  `desde_evento` date NOT NULL,
  `hora_evento_d` time DEFAULT NULL,
  `hasta_evento` date DEFAULT NULL,
  `hora_evento_h` time DEFAULT NULL,
  `autor_evento` int(11) NOT NULL,
  `prioridad_eveto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_evento` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'Activo',
  `fecha_eveto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_gastos`
--

CREATE TABLE `tb_gastos` (
  `id_gasto` int(11) NOT NULL,
  `id_cat_gasto` int(11) NOT NULL,
  `titulo_gasto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nota_gasto` text COLLATE utf8_spanish_ci,
  `monto_gasto` decimal(7,0) NOT NULL,
  `fecha_reg_gasto` date DEFAULT NULL,
  `mes_reg_gasto` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `autor_gasto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `actualizado_por` int(20) DEFAULT NULL,
  `actualizado_el` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos`
--

CREATE TABLE `tb_ingresos` (
  `id_ingreso` int(11) NOT NULL,
  `id_cat_ingreso` int(11) NOT NULL,
  `titulo_ingreso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nota_ingreso` text COLLATE utf8_spanish_ci,
  `monto_ingreso` decimal(7,0) NOT NULL,
  `fecha_reg_ingreso` date DEFAULT NULL,
  `mes_reg_ingreso` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `autor_ingreso` int(20) DEFAULT NULL,
  `actualizado_por` int(20) DEFAULT NULL,
  `actualizado_el` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_login`
--

CREATE TABLE `tb_login` (
  `cedula` int(12) NOT NULL,
  `nivel` int(3) NOT NULL,
  `email_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password_user` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `avatar_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `estado_user` varchar(12) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_login`
--

INSERT INTO `tb_login` (`cedula`, `nivel`, `email_user`, `password_user`, `nombre_user`, `apellido_user`, `avatar_user`, `fecha_reg`, `estado_user`) VALUES
(8745521, 1, 'admin561@gmail.com', '01f8ac712375efd777217bae19682c52', 'Juan', 'Franco', '1479948252_sam_3897.jpg', '2016-11-23', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_cat_gasto`
--
ALTER TABLE `tb_cat_gasto`
  ADD PRIMARY KEY (`id_cat_gasto`);

--
-- Indices de la tabla `tb_cat_ingreso`
--
ALTER TABLE `tb_cat_ingreso`
  ADD PRIMARY KEY (`id_cat_ingreso`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cedula_cl`);

--
-- Indices de la tabla `tb_equipo`
--
ALTER TABLE `tb_equipo`
  ADD PRIMARY KEY (`dni_eqp`);

--
-- Indices de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `tb_gastos`
--
ALTER TABLE `tb_gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `tb_ingresos`
--
ALTER TABLE `tb_ingresos`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_cat_gasto`
--
ALTER TABLE `tb_cat_gasto`
  MODIFY `id_cat_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_cat_ingreso`
--
ALTER TABLE `tb_cat_ingreso`
  MODIFY `id_cat_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_gastos`
--
ALTER TABLE `tb_gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_ingresos`
--
ALTER TABLE `tb_ingresos`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
