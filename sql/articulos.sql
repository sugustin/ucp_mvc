-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 12:15:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siga_seewald`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_leu` int(11) DEFAULT NULL,
  `nro_articulo` text NOT NULL,
  `inciso` text DEFAULT NULL,
  `descripcion` text NOT NULL,
  `cantidad_mensual` int(11) DEFAULT NULL,
  `cantitad_anual` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `inasistencias` int(11) NOT NULL DEFAULT 0,
  `licencias` int(11) NOT NULL DEFAULT 0,
  `retiro` int(11) NOT NULL DEFAULT 0,
  `tardanza` int(11) NOT NULL DEFAULT 0,
  `excluye_feria` int(11) NOT NULL DEFAULT 0,
  `tipo_licencias` text DEFAULT NULL,
  `sin_fecha_fin` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) DEFAULT 1,
  `cobra_presentismo` int(11) DEFAULT 1,
  `usuario_abm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
