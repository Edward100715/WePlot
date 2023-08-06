-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2023 a las 04:27:31
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
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `pregunta1` text DEFAULT NULL,
  `pregunta2` text DEFAULT NULL,
  `pregunta3` text DEFAULT NULL,
  `pregunta4` text DEFAULT NULL,
  `contraseña` varchar(255) NOT NULL,
  `foto_perfil` blob DEFAULT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `pais`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `contraseña`, `foto_perfil`, `rol`) VALUES
(16, 'Admin', 'Prueba1', 'Admin@gmail.com', 1, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', '$2y$10$fWbc8kbZV66RxJx67wLoG.vy945C9Ejg4vj1UAOww2G552LR4icD2', 0x727574612f64656c2f6469726563746f72696f2f617661746172312e6a7067, 'admin'),
(20, 'John', 'Doe', 'john@example.com', 1234567890, 'United States', 'Respuesta1', 'Respuesta2', 'Respuesta3', 'Respuesta4', '$2y$10$j2ZsCw4hqScZ6zHH36hq4uvvtvfuoDh8qMfJ8a0d6M6q8zA4iQ1K.', 0x727574612f64656c2f6469726563746f72696f2f617661746172312e6a7067, 'user'),
(21, 'Jane', 'Smith', 'jane@example.com', 9876543210, 'Canada', 'RespuestaA', 'RespuestaB', 'RespuestaC', 'RespuestaD', '$2y$10$zk0YIysjj61/tMjs1KvWVed6dOM.4PK3AgppNkzPVfzj9pFhnlPNW', 0x727574612f64656c2f6469726563746f72696f2f617661746172332e6a7067, 'user'),
(22, 'Alice', 'Johnson', 'alice@example.com', 5551234567, 'United Kingdom', 'RespX', 'RespY', 'RespZ', 'RespW', '$2y$10$kiGC.tWupKEkN3WM0UZSBuVSoB4.Ti.B3hHK4qM.p0TgI6XKjlr0W', 0x727574612f64656c2f6469726563746f72696f2f617661746172322e6a7067, 'user'),
(23, 'Prueba2', 'Prueba2', 'Prueba2@gmail.com', 2, 'Prueba2', 'Prueba2', 'Prueba2', 'Prueba2', 'Prueba2', '$2y$10$PX4YoZXhpnMOSDX28iARtO6IR66TZ1pM1/uYQqbCN0DkrqEo5KCGC', 0x727574612f64656c2f6469726563746f72696f2f617661746172322e6a7067, 'user'),
(36, 'Prueba3', 'Prueba3', 'Prueba3@gmail.com', 3, 'Prueba3', 'Prueba3', 'Prueba3', 'Prueba3', 'Prueba3', '$2y$10$blLIhzmBtDAgHkJAuTRU7ejZLZ0wuotIX2uzFq6DtbUDbl5TL1uja', '', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
