-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2021 a las 02:19:25
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectouni1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Componetes', 'descripcionk', '1636917206.jpg'),
(5, 'Procesadores', 'descripcion', '1636917220.jpg'),
(8, 'Tarjetas Graficas Geforce', 'Tarjetas Graficas Geforce', '1636870092.jpg'),
(9, 'Tarjetas Graficas genericas', 'Tarjetas Graficas economicas', '1636870325.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nombre` varchar(130) NOT NULL,
  `mensaje` varchar(266) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `nombre`, `mensaje`, `fecha`) VALUES
(14, ' Edgar miguel', 'Buen dia ', '2021-11-14 04:19:36'),
(15, ' usuario324', 'Buenassss', '2021-11-14 04:42:14'),
(17, ' miguel Bermudes', 'Si tiene alguna duda me comunidas', '2021-11-14 06:03:08'),
(18, ' prueba 324', 'Si, por que se ve tan feo el chat', '2021-11-14 06:05:21'),
(19, ' Edgar miguel', ':(\r\n', '2021-11-14 06:05:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `ciudad` varchar(10) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `email`, `telefono`, `direccion`, `estado`, `ciudad`, `id_venta`) VALUES
(92, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 58),
(93, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 59),
(94, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 60),
(95, ' miguelbermudez664@gmail.com ', '3295825', 'Calle 12 av21 #20-69', 'antioquia', 'medellin', 61),
(96, ' miguelbermudez664@gmail.com ', '3295825', 'Calle 12 av21 #20-69', 'antioquia', 'medellin', 62),
(97, ' miguelbermudez664@gmail.com ', '3295825', 'Calle 12 av21 #20-69', 'antioquia', 'medellin', 63),
(98, ' miguelbermudez664@gmail.com ', '3295825', 'Calle 12 av21 #20-69', 'antioquia', 'medellin', 64),
(99, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 65),
(100, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 66),
(101, ' 324@gmail.com ', '324', 'dire#324', 'departamento 324', 'ciudad 324', 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords`
--

CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `passwords`
--

INSERT INTO `passwords` (`id`, `email`, `token`, `codigo`, `fecha`) VALUES
(944, 'info@abelosh.com', '3f61d8600e', 9649, '2021-11-13 20:20:55'),
(945, 'gamin664@gmail.com', '52bd542c8c', 1211, '2021-11-13 20:21:50'),
(946, 'gamin664@gmail.com', '08f0a8baf9', 1076, '2021-11-13 20:24:02'),
(947, 'gamin664@gmail.com', '96804db07a', 8084, '2021-11-13 20:32:34'),
(948, 'gamin664@gmail.com', '961410b096', 8829, '2021-11-13 20:47:36'),
(949, '324@gmail.com', '64e7160e8f', 2532, '2021-11-13 20:59:12'),
(950, '324@gmail.com', '06dd5f3d37', 5062, '2021-11-13 21:10:36'),
(951, '324@gmail.com', '337ff25a64', 9697, '2021-11-13 23:36:07'),
(957, '324@gmail.com', '21c34eecfc', 1527, '2021-11-14 19:24:54'),
(958, '324@gmail.com', '388844863f', 3194, '2021-11-14 19:35:51'),
(959, '324@gmail.com', 'adec6265ee', 9812, '2021-11-14 22:12:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`) VALUES
(266, 'procesador', 'descripcion', 503, '1633738789.jpg', 2327, 1),
(267, 'i9', '32432432', 3232, '1633738826.jpg', 233224, 1),
(268, 'AMD', 'DAE', 2323, '1633738887.png', 1189, 1),
(270, 'Gabinete', 'Gabinete gamer fino', 121, '1633761533.jpg', 12299, 1),
(272, 'Prueba desde el panel', '3', 37, '1636491874.png', 95, 5),
(274, 'cornetasz', 'descripcion', 10, '1634865397.png', 99983, 5),
(275, 'Zotac Gaming GeForce RTX 3060 Ti Twin Edge LHR ', 'ZOTAC GAMING GeForce RTX 3060.', 1231, '1636870428.jpg', 99, 8),
(276, 'Yeston Radeon RX550', 'Grafica de origen dudoso', 400, '1636870531.jpg', 123, 9),
(278, 'Control ', 'Control melo ', 100, '1636917267.jpg', 995, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(25, 24, 274, 1, 10, 10),
(26, 24, 270, 2, 121, 242),
(27, 25, 268, 1, 2323, 2323),
(28, 26, 274, 1, 10, 10),
(29, 27, 268, 1, 2323, 2323),
(30, 28, 268, 2, 2323, 4646),
(31, 29, 270, 1, 121, 121),
(32, 30, 274, 1, 10, 10),
(33, 31, 274, 9, 10, 90),
(34, 32, 274, 8, 10, 80),
(35, 33, 270, 1, 121, 121),
(36, 34, 270, 1, 121, 121),
(37, 35, 270, 1, 121, 121),
(38, 36, 268, 7, 2323, 16261),
(39, 37, 274, 1, 10, 10),
(40, 38, 268, 1, 2323, 2323),
(41, 39, 268, 1, 2323, 2323),
(42, 40, 270, 1, 121, 121),
(43, 41, 268, 1, 2323, 2323),
(44, 42, 274, 1, 10, 10),
(45, 43, 274, 1, 10, 10),
(46, 44, 270, 1, 121, 121),
(47, 45, 270, 1, 121, 121),
(48, 46, 267, 1, 3232, 3232),
(49, 47, 272, 1, 37, 37),
(50, 48, 268, 1, 2323, 2323),
(51, 49, 274, 1, 10, 10),
(52, 50, 270, 1, 121, 121),
(53, 51, 272, 1, 37, 37),
(54, 52, 267, 4, 3232, 12928),
(55, 53, 266, 1, 503, 503),
(56, 54, 268, 1, 2323, 2323),
(57, 55, 274, 1, 10, 10),
(58, 56, 270, 1, 121, 121),
(59, 56, 272, 1, 37, 37),
(60, 57, 272, 1, 37, 37),
(61, 58, 272, 1, 37, 37),
(62, 59, 274, 1, 10, 10),
(63, 60, 266, 1, 503, 503),
(64, 61, 270, 1, 121, 121),
(65, 62, 267, 1, 3232, 3232),
(66, 63, 268, 3, 2323, 6969),
(67, 64, 274, 2, 10, 20),
(68, 64, 272, 1, 37, 37),
(69, 64, 270, 1, 121, 121),
(70, 64, 266, 1, 503, 503),
(71, 64, 267, 2, 3232, 6464),
(72, 64, 268, 1, 2323, 2323),
(73, 65, 272, 1, 37, 37),
(74, 66, 274, 1, 10, 10),
(75, 66, 275, 1, 1231, 1231),
(76, 66, 278, 1, 100, 100),
(77, 67, 278, 4, 100, 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_perfil` varchar(300) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `Apellido`, `telefono`, `ciudad`, `estado`, `direccion`, `email`, `password`, `img_perfil`, `nivel`) VALUES
(30, 'Edgar miguel', 'hernandez', '3295825', 'medellin', 'antioquia', 'Calle 12 av21 #20-68', 'miguelbermudez664@gmail.com', '1c988d54912a626978b095a3ecf8d2b279eef301', 'default.jpg', 'admin'),
(51, 'prueba', 'inicio', '3242', 'cichasa', 'vichasa', '', 'correodeprueba@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'default.jpg', 'admin'),
(52, 'prueba24', 'pr', '5868', 'venezuela', 'venecia', '', 'prueba@gmail.com', '$2y$10$h3acOPnnk1B/k.onuFOjf.jWUs.2FYEOQ63wu/pJ9fH6A8L1Ve6La', '', 'cliente'),
(53, 'nom', 'ape', '324', 'wedcsd', 'cucuta', '', 'gamin664@gmail.com', '$2y$10$iXibtRPgxTzRdXr74svJYu9GY2o5jesm9ggcnTPNfuCdYC5qcE8py', '', 'cliente'),
(54, 'cuenta ', 'usuario', '2332', 'cucuta', 'norte de santander', '', 'correodeprueba2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'default.jpg', 'cliente'),
(56, 'prueba', 'apellido prue', '32143', 'prueba city', 'departa city', '', 'pruebaconidsnuevas@gmail.com', '$2y$10$k.Yb7SN7LlLSh90t5tfKreHRyeZbqd7GkppLmsQjBeL7DLGilrHEa', '', 'cliente'),
(57, 'nuevo2', 'apellido nuevo', '231451', 'nuevo city', 'departa nuevo', '', 'info@abelosh.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'cliente'),
(59, 'prueba 324', 'apellido 324', '324', 'ciudad 324', 'departamento 324', 'dire#324', '324@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'default.jpg', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estadoventa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`, `estadoventa`) VALUES
(59, 59, 10, '2021-11-10 17:11:22', 'Cancelado'),
(60, 59, 503, '2021-11-10 17:11:38', 'En revision'),
(61, 30, 121, '2021-11-10 17:11:55', 'En revision'),
(62, 30, 3232, '2021-11-10 17:11:05', 'En revision'),
(63, 30, 6969, '2021-11-10 17:11:14', 'En revision'),
(64, 30, 9468, '2021-11-10 06:11:50', 'Cancelado'),
(65, 59, 37, '2021-11-14 17:11:45', 'Cancelado'),
(66, 59, 1341, '2021-11-14 13:11:45', 'Cancelado'),
(67, 59, 400, '2021-11-14 16:11:39', 'En revision');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=960;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
