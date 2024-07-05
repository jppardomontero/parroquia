-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2021 a las 18:36:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parroquia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bautizo`
--

CREATE TABLE `bautizo` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tomo` varchar(50) NOT NULL,
  `pagina` varchar(50) NOT NULL,
  `acta` varchar(50) DEFAULT NULL,
  `nota_marginal` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `id_parroquia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bautizo`
--

INSERT INTO `bautizo` (`id`, `id_persona`, `id_familia`, `id_usuario`, `tomo`, `pagina`, `acta`, `nota_marginal`, `lugar`, `fecha`, `id_parroquia`) VALUES
(3, 22, 7, 13, 'I', '1', '00122665', '', 'sacapalca', '08/12/1988', 16),
(4, 27, 8, 15, 'II', '0000001', '', '', 'sacapalca', '20/10/2007', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmacion`
--

CREATE TABLE `confirmacion` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_niveles` int(11) NOT NULL,
  `libro` int(11) NOT NULL,
  `acta` int(11) NOT NULL,
  `pagiinas` int(11) NOT NULL,
  `lugar` int(11) NOT NULL,
  `fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eucaristias`
--

CREATE TABLE `eucaristias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eucaristias`
--

INSERT INTO `eucaristias` (`id`, `nombre`, `fecha`, `hora`, `descripcion`) VALUES
(6, 'Domingo', '16/05/2021', '', 'Domingo'),
(7, 'Lunes', '15/05/2021', '18:00', 'Lunes\r\n'),
(8, 'Lunes', '17/05/2021', '18:00', 'Lunes'),
(9, 'Martes', '18/05/2021', '18:00', 'Martes'),
(10, 'Miercoles', '19/05/2021', '18:00', 'Miercoles'),
(11, 'Martes', '18/05/2021', '8:00', 'Martes '),
(12, 'Martes', '18/05/2021', '10:00', 'Martes'),
(13, 'Martes ', '18/05/2021', '14:00', 'Martes ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `nombres`, `descripcion`) VALUES
(5, 'donoso ragel ', 'Familia 1 sacapalca'),
(6, 'herrera quesada ', 'familia 2 sacapalca '),
(7, 'donoso herrera ', 'familia 3 sacapalca '),
(8, 'soto acaro  ', 'familia 4 sacapalca'),
(9, 'soto encarnación ', 'familia 5 sacapalca'),
(10, 'acaro neira ', 'familia 6 sacapalca'),
(11, 'correo soto ', 'padrinos 1 sacapalca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_familia`
--

CREATE TABLE `formacion_familia` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `rol` enum('Padre','Madre','Hijo','Hija') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formacion_familia`
--

INSERT INTO `formacion_familia` (`id`, `id_persona`, `id_familia`, `rol`) VALUES
(8, 20, 7, 'Padre'),
(9, 21, 7, 'Madre'),
(10, 22, 7, 'Hijo'),
(14, 23, 5, 'Padre'),
(15, 24, 5, 'Madre'),
(16, 20, 5, 'Hijo'),
(17, 18, 6, 'Padre'),
(18, 19, 6, 'Madre'),
(19, 21, 6, 'Hija'),
(20, 28, 8, 'Padre'),
(21, 29, 8, 'Madre'),
(22, 27, 8, 'Hija'),
(23, 31, 9, 'Padre'),
(24, 30, 9, 'Madre'),
(25, 29, 9, 'Hija'),
(26, 32, 10, 'Padre'),
(27, 33, 10, 'Madre'),
(28, 29, 10, 'Hija'),
(29, 34, 11, 'Hijo'),
(30, 35, 11, 'Hija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intenciones`
--

CREATE TABLE `intenciones` (
  `id` int(11) NOT NULL,
  `id_eucaristia` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas_catesismo`
--

CREATE TABLE `matriculas_catesismo` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_nivel_catesismo` int(11) NOT NULL,
  `partida_matrimonio` enum('Si','No') NOT NULL,
  `fe_bautimo` enum('Si','No') NOT NULL,
  `tarjeta_parroquial` enum('Si','No') NOT NULL,
  `estado` enum('Aprovado','Reprovado','En curso') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matrimonio`
--

CREATE TABLE `matrimonio` (
  `id` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `libro` int(50) NOT NULL,
  `pagina` varchar(50) NOT NULL,
  `acta` varchar(50) NOT NULL,
  `nota_marginal` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_catesismo`
--

CREATE TABLE `niveles_catesismo` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `requisito` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles_catesismo`
--

INSERT INTO `niveles_catesismo` (`id`, `nombres`, `requisito`, `descripcion`) VALUES
(3, 'primer nivel catesismo ', 'ninguno', 'primer nivel catesismo '),
(4, 'segundo nivel catesismo ', 'aprobación del primer nivel', 'al termino del segundo se realiza la primera comunión '),
(5, 'tercero nivel catesismo ', 'aprobación del segundo nivel', 'tercero nivel catesismo '),
(6, 'cuerto nivel catesismo ', 'aprobación del tercer nivel', 'cuerto nivel catesismo '),
(7, 'Quinto nivel catesismo ', 'aprobación del cuarto nivel', 'al termino de se realiza la confirmación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrimos_matrimonio`
--

CREATE TABLE `padrimos_matrimonio` (
  `id` int(11) NOT NULL,
  `id_matrimonio` int(11) NOT NULL,
  `id_perona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrinos_bautizo`
--

CREATE TABLE `padrinos_bautizo` (
  `id` int(11) NOT NULL,
  `id_bautizo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `padrinos_bautizo`
--

INSERT INTO `padrinos_bautizo` (`id`, `id_bautizo`, `id_persona`) VALUES
(25, 3, 20),
(26, 3, 21),
(27, 4, 34),
(28, 4, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padrinos_confirmaciones`
--

CREATE TABLE `padrinos_confirmaciones` (
  `id` int(11) NOT NULL,
  `id_confirmacion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE `parroquias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `wallpapers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`id`, `nombre`, `logo`, `wallpapers`) VALUES
(1, 'Administración General del Sitio', 'vistas/img/Administración General del Sitio_logo.ico', 'vistas/img/Administración General del Sitio_wallpapers.png'),
(16, 'Parroquia Nuestra Señora Madre de los Desamparados ', 'vistas/img/Parroquia Nuestra Señora Madre de los Desamparados _logo.ico', 'vistas/img/Parroquia Nuestra Señora Madre de los Desamparados _wallpapers.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `f_nacimiento` varchar(50) NOT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombres`, `apellidos`, `f_nacimiento`, `genero`, `estado_civil`, `nacionalidad`, `profesion`) VALUES
(18, '', 'floresmilo', 'Herrera Luzón ', '10/08/1990', 'Masculino', 'casado', 'ecuatoriano', 'agricultor'),
(19, '', 'Rosario ', 'Quesada  ', '26/07/1990', 'Femenino', 'casada', 'ecuatoriana', 'sastre '),
(20, '', 'Guillermo ', 'donoso ragel ', '05/03/1980', 'Masculino', 'casado', 'ecuatoriano', 'agricultor'),
(21, '', 'eufemia de jesus ', 'Herrera ', '05/09/1980', 'Femenino', 'casado', 'ecuatoriana', 'agricultor'),
(22, '', 'cesar fernando ', 'donoso herrera ', '08/12/1988', 'Masculino', 'soltero', 'ecuatoriano', 'estudiante'),
(23, '', 'guillermo ', 'ramon donoso ', '06/11/1987', 'Masculino', 'casado', 'ecuatoriano', 'agricultor'),
(24, '', 'aurelia ', 'ragel ', '08/11/1987', 'Femenino', 'casado', 'ecuatoriano', 'agricultor'),
(25, '', 'luis alfredo ', 'palacios ', '31/05/1990', 'Masculino', 'casado', 'ecuatoriano', 'agricultor'),
(26, '', 'teresa de jesus ', 'galvan ', '23/05/1998', 'Masculino', 'casado', 'ecuatoriano', 'agricultor'),
(27, '', 'Katherine Lizbeth ', 'soto acaro ', '20/03/2007', 'Femenino', 'soltero', 'ecuatoriana', 'ninguna'),
(28, '', 'Edgar Hernán ', 'soto encarnación ', '08/05/1998', 'Masculino', 'casado', 'ecuatoriano', 'por definir '),
(29, '', 'Amelia Maribel ', 'acaro neira', '05/10/1998', 'Femenino', 'casado', 'ecuatoriana', 'por definir '),
(30, '', 'maría ', 'encarnación', '16/07/1987', 'Femenino', 'casado', 'ecuatoriana', 'por definir '),
(31, '', 'Héctor ', ' soto ', '07/12/1987', 'Masculino', 'casado', 'ecuatoriano', 'por definir '),
(32, '', 'miguel ', 'acaro', '16/06/1997', 'Masculino', 'casado', 'ecuatoriano', 'por definir '),
(33, '', 'amelia ', 'Neira ', '05/06/1987', 'Femenino', 'casado', 'ecuatoriana', 'por definir '),
(34, '', 'lorgio ', 'corre ', '07/08/1978', 'Masculino', 'casado', 'ecuatoriano', 'por definir '),
(35, '', 'mercedes ', 'soto ', '08/11/1989', 'Femenino', 'casado', 'ecuatoriana', 'por definir ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `primera_comunion`
--

CREATE TABLE `primera_comunion` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_matriculas_catesismo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador\r\n'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_parroquial`
--

CREATE TABLE `tarjeta_parroquial` (
  `id` int(11) NOT NULL,
  `id_familia` int(11) NOT NULL,
  `anio` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombres_apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `tipo_empleado` enum('Sacerdote','Secretari@') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_parroquia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombres_apellidos`, `correo`, `telefono`, `tipo_empleado`, `username`, `password`, `estado`, `id_rol`, `id_parroquia`) VALUES
(1, '1105671761', 'Juan Pablo Pardo Montero', 'juanppardom@gmail.com', '099999999', 'Secretari@', 'admin', 'admin', 'Activo', 1, 1),
(11, '1150310595', 'Edison Tinitana', 'etinitanasantorum@gmail.com', '0967060361', 'Secretari@', 'edison', '1234', 'Activo', 2, 16),
(13, '1111111111', 'Mario García Restrepo', 'marioG@gmai.com', '08978567', 'Sacerdote', 'mario', '1234', 'Activo', 2, 16),
(15, '2222222222', 'Silvio Hernán vega', 'silvio@gmai.com', '0222222222', 'Sacerdote', 'silvio ', 'silvio', 'Activo', 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `id` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `costo` decimal(10,0) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bautizo`
--
ALTER TABLE `bautizo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_ministro` (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_ministro` (`id_usuario`),
  ADD KEY `id_niveles` (`id_niveles`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `eucaristias`
--
ALTER TABLE `eucaristias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formacion_familia`
--
ALTER TABLE `formacion_familia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `intenciones`
--
ALTER TABLE `intenciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eucaristia` (`id_eucaristia`);

--
-- Indices de la tabla `matriculas_catesismo`
--
ALTER TABLE `matriculas_catesismo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nivel_catesismo` (`id_nivel_catesismo`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_ministro` (`id_usuario`);

--
-- Indices de la tabla `niveles_catesismo`
--
ALTER TABLE `niveles_catesismo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `padrimos_matrimonio`
--
ALTER TABLE `padrimos_matrimonio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matrimonio` (`id_matrimonio`),
  ADD KEY `id_perona` (`id_perona`);

--
-- Indices de la tabla `padrinos_bautizo`
--
ALTER TABLE `padrinos_bautizo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bautizo` (`id_bautizo`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `padrinos_confirmaciones`
--
ALTER TABLE `padrinos_confirmaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_confirmacion` (`id_confirmacion`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `primera_comunion`
--
ALTER TABLE `primera_comunion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_matriculas_catesismo` (`id_matriculas_catesismo`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_ministro` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta_parroquial`
--
ALTER TABLE `tarjeta_parroquial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familia` (`id_familia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bautizo`
--
ALTER TABLE `bautizo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eucaristias`
--
ALTER TABLE `eucaristias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `formacion_familia`
--
ALTER TABLE `formacion_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `intenciones`
--
ALTER TABLE `intenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas_catesismo`
--
ALTER TABLE `matriculas_catesismo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `niveles_catesismo`
--
ALTER TABLE `niveles_catesismo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `padrimos_matrimonio`
--
ALTER TABLE `padrimos_matrimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `padrinos_bautizo`
--
ALTER TABLE `padrinos_bautizo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `padrinos_confirmaciones`
--
ALTER TABLE `padrinos_confirmaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `primera_comunion`
--
ALTER TABLE `primera_comunion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjeta_parroquial`
--
ALTER TABLE `tarjeta_parroquial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bautizo`
--
ALTER TABLE `bautizo`
  ADD CONSTRAINT `bautizo_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `bautizo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `bautizo_ibfk_4` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD CONSTRAINT `confirmacion_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `confirmacion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `confirmacion_ibfk_3` FOREIGN KEY (`id_niveles`) REFERENCES `niveles_catesismo` (`id`),
  ADD CONSTRAINT `confirmacion_ibfk_5` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `formacion_familia`
--
ALTER TABLE `formacion_familia`
  ADD CONSTRAINT `formacion_familia_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `formacion_familia_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `intenciones`
--
ALTER TABLE `intenciones`
  ADD CONSTRAINT `intenciones_ibfk_1` FOREIGN KEY (`id_eucaristia`) REFERENCES `eucaristias` (`id`);

--
-- Filtros para la tabla `matriculas_catesismo`
--
ALTER TABLE `matriculas_catesismo`
  ADD CONSTRAINT `matriculas_catesismo_ibfk_1` FOREIGN KEY (`id_nivel_catesismo`) REFERENCES `niveles_catesismo` (`id`),
  ADD CONSTRAINT `matriculas_catesismo_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `matrimonio`
--
ALTER TABLE `matrimonio`
  ADD CONSTRAINT `matrimonio_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `matrimonio_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `padrimos_matrimonio`
--
ALTER TABLE `padrimos_matrimonio`
  ADD CONSTRAINT `padrimos_matrimonio_ibfk_1` FOREIGN KEY (`id_matrimonio`) REFERENCES `matrimonio` (`id`),
  ADD CONSTRAINT `padrimos_matrimonio_ibfk_2` FOREIGN KEY (`id_perona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `padrinos_bautizo`
--
ALTER TABLE `padrinos_bautizo`
  ADD CONSTRAINT `padrinos_bautizo_ibfk_1` FOREIGN KEY (`id_bautizo`) REFERENCES `bautizo` (`id`),
  ADD CONSTRAINT `padrinos_bautizo_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `padrinos_confirmaciones`
--
ALTER TABLE `padrinos_confirmaciones`
  ADD CONSTRAINT `padrinos_confirmaciones_ibfk_1` FOREIGN KEY (`id_confirmacion`) REFERENCES `confirmacion` (`id`),
  ADD CONSTRAINT `padrinos_confirmaciones_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `primera_comunion`
--
ALTER TABLE `primera_comunion`
  ADD CONSTRAINT `primera_comunion_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `primera_comunion_ibfk_2` FOREIGN KEY (`id_matriculas_catesismo`) REFERENCES `matriculas_catesismo` (`id`),
  ADD CONSTRAINT `primera_comunion_ibfk_3` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `primera_comunion_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `tarjeta_parroquial`
--
ALTER TABLE `tarjeta_parroquial`
  ADD CONSTRAINT `tarjeta_parroquial_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
