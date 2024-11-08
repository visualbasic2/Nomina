-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 20:29:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `salario_base` decimal(10,2) NOT NULL,
  `fecha_contratacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) DEFAULT NULL,
  `fecha_pago` date NOT NULL,
  `salario_bruto` decimal(10,2) NOT NULL,
  `salario_neto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `percepciones`
--

CREATE TABLE `percepciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('administrador','operador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'dchavez', '$2y$10$N58OlywTyuYZEdfYBwYvdONWDQ9M/o95EnBynN3Hcgg3ad80jHNKy', 'administrador'),
(3, 'Diego Chavez', '$2y$10$BS7JAMhZrj/5Hqhb3G0HiuMLOqkpHkP/W2zkVOEm5A/5AD5bIoSsW', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- Indices de la tabla `percepciones`
--
ALTER TABLE `percepciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `percepciones`
--
ALTER TABLE `percepciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--Tablas Nominas 01

CREATE TABLE "cAreaGeografica" (
	"AreaGeografica"	INT,
	"Clave"	VARCHAR(10) NOT NULL,
	"Descripcion"	VARCHAR(50) NOT NULL,
	"Estatus"	VARCHAR(1) NOT NULL,
	PRIMARY KEY("AreaGeografica")
);


CREATE TABLE "cSatBancos" (
	"Banco"	INT,
	"ClaveSAT"	VARCHAR(5) NOT NULL,
	"DescripcionSAT"	VARCHAR(40) NOT NULL,
	"RazonSocialSAT"	VARCHAR(120) NOT NULL,
	"FechaInicioVigenciaSAT"	DATETIME,
	"FechaFinVigenciaSAT"	DATETIME,
	"ClaveABM"	INT NOT NULL,
	"Estatus"	VARCHAR(1) NOT NULL,
	PRIMARY KEY("Banco")
);

CREATE TABLE "cBaseCotizacion" (
	"BaseCotizacion"	INT,
	"Descripcion"	VARCHAR(20) NOT NULL,
	"Estatus"	VARCHAR(1) NOT NULL,
	PRIMARY KEY("BaseCotizacion")
);

--Creacion de tabla cCategoria pendiente a creacion de fk Empresa 

CREATE TABLE "cSatRiesgoPuesto" (
	"RiesgoPuesto"	INT,
	"ClaveSAT"	VARCHAR(5) NOT NULL,
	"Descripcion"	VARCHAR(20) NOT NULL,
	"FechaInicioVigencia"	DATETIME,
	"FechaFinVigencia"	DATETIME,
	"Estatus"	VARCHAR(1) NOT NULL,
	PRIMARY KEY("RiesgoPuesto")
);
