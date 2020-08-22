-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2020 a las 23:01:22
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udec_wjbt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_wjbt`
--

CREATE TABLE `encuesta_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `identificacion_wjbt` int(11) NOT NULL,
  `nombre_wjbt` varchar(90) NOT NULL,
  `apellido_wjbt` varchar(90) NOT NULL,
  `correo_wjbt` varchar(90) NOT NULL,
  `id_zona_wjbt` int(11) NOT NULL,
  `direccion_wjbt` varchar(90) NOT NULL,
  `id_genero_wjbt` int(11) NOT NULL,
  `id_estadoCivil_wjbt` int(11) NOT NULL,
  `fechaNacimiento_wjbt` date NOT NULL,
  `insEducativaProcedente_wjbt` varchar(90) NOT NULL,
  `fechaCulminacion_wjbt` date NOT NULL,
  `id_nivelacademicopadres_wjbt` int(11) NOT NULL,
  `trabajoPadre_wjbt` varchar(90) NOT NULL,
  `trabajoMadre_wjbt` varchar(90) NOT NULL,
  `id_tipoVivienda_wjbt` int(11) NOT NULL,
  `id_ingresoHogar_wjbt` int(11) NOT NULL,
  `nivelPrograma_wjbt` int(11) NOT NULL,
  `asignaturasMatriculadas_wjbt` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuesta_wjbt`
--

INSERT INTO `encuesta_wjbt` (`id_wjbt`, `identificacion_wjbt`, `nombre_wjbt`, `apellido_wjbt`, `correo_wjbt`, `id_zona_wjbt`, `direccion_wjbt`, `id_genero_wjbt`, `id_estadoCivil_wjbt`, `fechaNacimiento_wjbt`, `insEducativaProcedente_wjbt`, `fechaCulminacion_wjbt`, `id_nivelacademicopadres_wjbt`, `trabajoPadre_wjbt`, `trabajoMadre_wjbt`, `id_tipoVivienda_wjbt`, `id_ingresoHogar_wjbt`, `nivelPrograma_wjbt`, `asignaturasMatriculadas_wjbt`) VALUES
(4, 1461088539, 'Jose Manuel', 'Arango Rivero', 'jose@gmail.com', 1, 'Bicentenario', 5, 1, '2020-05-19', 'La salle', '2020-05-26', 1, 'Ingeniero Civil', 'Abogada', 1, 1, 10, '15'),
(5, 1461098862, 'Veronica Yisel', 'Acevedo Vasquez', 'vero@gmail.com', 3, 'La princesa ', 2, 2, '2020-05-22', 'Holaaa', '2020-05-27', 3, 'Ingeniero de sistemas', 'Administradora de empresas', 1, 1, 10, '15'),
(7, 1401615007, 'Jhon Dario', 'Volibar Zaraza ', 'jhon@gmail.com', 2, 'bicentnario', 1, 2, '1999-07-05', 'Moderno Del Norte ', '2012-12-06', 3, 'Vigilante', 'Independiente', 1, 3, 10, '15'),
(8, 422055999, 'Daniela', 'Garcia Castillo', 'Daniela@hotmail.com', 2, 'Urbanizacion Soledad', 2, 1, '2001-03-07', 'Fe y alegria', '2018-12-04', 3, 'Vigilante', 'Cajera', 2, 4, 5, '15'),
(11, 1411160955, 'Neiser Alberto', 'Diaz Gutierrez', 'Neiser@gmail.com', 2, 'bicentnario', 6, 3, '2020-05-22', 'La salle', '2020-05-13', 4, 'Comerciante', 'Ama de casa', 3, 3, 10, '15'),
(13, 11, 'Jose Luis', 'Bru Torres', 'joseBru@gmail.com', 3, 'bicentnario', 1, 4, '2020-06-23', 'Moderno Del Norte ', '2020-06-30', 4, 'Ingeniero de sistemas', 'Administradora de empresas', 3, 4, 2, '12'),
(14, 100333, 'Wilfer Jose', 'Bru Torres', 'wilfer@gmail.com', 2, 'bicentnario', 1, 3, '2020-07-09', 'Moderno Del Norte ', '2020-06-30', 4, 'Ingeniero', 'Independiente', 2, 3, 4, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil_wjbt`
--

CREATE TABLE `estadocivil_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `estadoCivil_wjbt` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadocivil_wjbt`
--

INSERT INTO `estadocivil_wjbt` (`id_wjbt`, `estadoCivil_wjbt`) VALUES
(1, 'soltero/a'),
(2, 'casado/a'),
(3, 'divorciado/a'),
(4, 'viudo/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero_wjbt`
--

CREATE TABLE `genero_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `genero_wjbt` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero_wjbt`
--

INSERT INTO `genero_wjbt` (`id_wjbt`, `genero_wjbt`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'No Binario'),
(4, 'Sin género'),
(5, 'No estoy seguro'),
(6, 'Prefiero no decir'),
(7, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresohogar_wjbt`
--

CREATE TABLE `ingresohogar_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `ingreso_wjbt` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresohogar_wjbt`
--

INSERT INTO `ingresohogar_wjbt` (`id_wjbt`, `ingreso_wjbt`) VALUES
(1, 'Salario minimo'),
(2, 'Dos salarios minimos'),
(3, 'Tres salarios minimos'),
(4, 'Mas de tres salarios minimos'),
(5, 'Mas de cinco salarios minimos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelacademicopadres_wjbt`
--

CREATE TABLE `nivelacademicopadres_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `nivel_wjbt` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivelacademicopadres_wjbt`
--

INSERT INTO `nivelacademicopadres_wjbt` (`id_wjbt`, `nivel_wjbt`) VALUES
(1, 'Profecionales'),
(2, 'Tecnicos'),
(3, 'Tencologos'),
(4, 'Basica secundaria'),
(5, 'Basica primaria'),
(6, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionadmin_wjbt`
--

CREATE TABLE `sesionadmin_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `nombre_wjbt` varchar(90) NOT NULL,
  `apellido_wjbt` varchar(90) NOT NULL,
  `usuario_wjbt` varchar(90) NOT NULL,
  `password_wjbt` varchar(32) NOT NULL,
  `id_genero_wjbt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesionadmin_wjbt`
--

INSERT INTO `sesionadmin_wjbt` (`id_wjbt`, `nombre_wjbt`, `apellido_wjbt`, `usuario_wjbt`, `password_wjbt`, `id_genero_wjbt`) VALUES
(1234567890, 'Miguel Romero', 'Peñaranda Romero', 'Miguelpr', 'ZElhcGs1dVBZR3QwcVBKWlBFZlJrZz09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_wjbt`
--

CREATE TABLE `sesion_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `identificacion_wjbt` int(11) NOT NULL,
  `nombre_wjbt` varchar(90) NOT NULL,
  `usuario_wjbt` varchar(90) NOT NULL,
  `password_wjbt` varchar(32) NOT NULL,
  `id_genero_wjbt` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesion_wjbt`
--

INSERT INTO `sesion_wjbt` (`id_wjbt`, `identificacion_wjbt`, `nombre_wjbt`, `usuario_wjbt`, `password_wjbt`, `id_genero_wjbt`) VALUES
(1, 1461088539, 'Jose Arango', 'Jarango', 'ajdsOEVaOW5US0QyUnRMSERJNTVyQT09', 1),
(4, 1461098862, 'Veronica Acevedo', 'Vacevedo', 'OTdHWDZNZXIyMXZzWUxlMUR2UnM0Zz09', 2),
(5, 1401615007, 'Jhon Volivar', 'Jvolibar', 'ajdsOEVaOW5US0QyUnRMSERJNTVyQT09', 1),
(6, 422055999, 'Daniela Garcia', 'Dgarcia', 'VmRUb011a2ppd1RHeWVYVWZqRjd1QT09', 2),
(11, 1411160955, 'Neiser Diaz', 'Ndiaz', 'eGF0b1loVmI3MWIyT3BsdS83Smc1UT09', 5),
(14, 100333, 'Wilfer Bru  ', 'wilfer123', 'MU54Y3U0dlhDdmhhQ212Q1g3NGZTdz09', 1),
(15, 11, 'Jose Bru ', 'JBru', 'ajdsOEVaOW5US0QyUnRMSERJNTVyQT09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovivienda_wjbt`
--

CREATE TABLE `tipovivienda_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `tipo_wjbt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipovivienda_wjbt`
--

INSERT INTO `tipovivienda_wjbt` (`id_wjbt`, `tipo_wjbt`) VALUES
(1, 'Propia'),
(2, 'Alquilada'),
(3, 'Familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_wjbt`
--

CREATE TABLE `zona_wjbt` (
  `id_wjbt` int(11) NOT NULL,
  `zona_wjbt` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona_wjbt`
--

INSERT INTO `zona_wjbt` (`id_wjbt`, `zona_wjbt`) VALUES
(1, 'Historica y del caribe norte'),
(2, 'De la virgen y turistica'),
(3, 'Industrial de la bahia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta_wjbt`
--
ALTER TABLE `encuesta_wjbt`
  ADD PRIMARY KEY (`id_wjbt`),
  ADD UNIQUE KEY `correo_wjbt` (`correo_wjbt`),
  ADD UNIQUE KEY `identificacion_wjbt` (`identificacion_wjbt`),
  ADD KEY `id_genero_wjbt` (`id_genero_wjbt`),
  ADD KEY `id_estadoCivil_wjbt` (`id_estadoCivil_wjbt`),
  ADD KEY `id_nivelacademicopadres_wjbt` (`id_nivelacademicopadres_wjbt`),
  ADD KEY `id_tipoVivienda_wjbt` (`id_tipoVivienda_wjbt`),
  ADD KEY `id_zona_wjbt` (`id_zona_wjbt`);

--
-- Indices de la tabla `estadocivil_wjbt`
--
ALTER TABLE `estadocivil_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- Indices de la tabla `genero_wjbt`
--
ALTER TABLE `genero_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- Indices de la tabla `ingresohogar_wjbt`
--
ALTER TABLE `ingresohogar_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- Indices de la tabla `nivelacademicopadres_wjbt`
--
ALTER TABLE `nivelacademicopadres_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- Indices de la tabla `sesionadmin_wjbt`
--
ALTER TABLE `sesionadmin_wjbt`
  ADD PRIMARY KEY (`id_wjbt`),
  ADD UNIQUE KEY `usuario_wjbt` (`usuario_wjbt`),
  ADD KEY `id_genero_wjbt` (`id_genero_wjbt`);

--
-- Indices de la tabla `sesion_wjbt`
--
ALTER TABLE `sesion_wjbt`
  ADD PRIMARY KEY (`id_wjbt`),
  ADD UNIQUE KEY `identificacion_wjbt` (`identificacion_wjbt`),
  ADD KEY `id_genero_wjbt` (`id_genero_wjbt`),
  ADD KEY `usuario_wjbt` (`usuario_wjbt`);

--
-- Indices de la tabla `tipovivienda_wjbt`
--
ALTER TABLE `tipovivienda_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- Indices de la tabla `zona_wjbt`
--
ALTER TABLE `zona_wjbt`
  ADD PRIMARY KEY (`id_wjbt`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta_wjbt`
--
ALTER TABLE `encuesta_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estadocivil_wjbt`
--
ALTER TABLE `estadocivil_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `genero_wjbt`
--
ALTER TABLE `genero_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ingresohogar_wjbt`
--
ALTER TABLE `ingresohogar_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nivelacademicopadres_wjbt`
--
ALTER TABLE `nivelacademicopadres_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sesionadmin_wjbt`
--
ALTER TABLE `sesionadmin_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567891;

--
-- AUTO_INCREMENT de la tabla `sesion_wjbt`
--
ALTER TABLE `sesion_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipovivienda_wjbt`
--
ALTER TABLE `tipovivienda_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zona_wjbt`
--
ALTER TABLE `zona_wjbt`
  MODIFY `id_wjbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
