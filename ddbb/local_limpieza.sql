-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 00:08:08
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
-- Base de datos: `local_limpieza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `nombre` varchar(50) NOT NULL,
  `id_categoria` int(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `categoria` (`nombre`, `id_categoria`, `img`, `descripcion`) VALUES
('Cocina', 1, 'css/img/cocina.jpg', 'Productos para hacer brillar tu cocina');
('Baño', 2, 'css/img/bano.jpg', 'Todo lo que necesitas para dejar tu baño brillante y desinfectado');
('Casa', 3, 'css/img/casa.jpg', 'Todo para tu casa');
('Jardin', 4, 'css/img/jardin.jpg', 'Deja tu jardin en orden');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `cliente` (`username`, `password`) VALUES
('webadmin', '$2a$12$xexZ4dLHKwo48pzzOPVwdeIrcXeGmnPq2/LJzgKQKXM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `username_cliente` varchar(200) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `id_categoria`) VALUES
(1, 'Detergente Magistral', '', 799, 'css/img/magistral.jpg', 1);
(2, 'Mr. Musculo Antigrasa', '', 649, 'css/img/antigrasa.jpg', 1);
(3, 'Papel higienico Felpita', '', 390, 'css/img/papel-higienico.jpg', 2);
(4, 'Shampoo Fructis', '', 399, 'css/img/shampoo.jpg', 2);
(5, 'Cera Suiza', '', 3300, 'css/img/cera.jpg', 3);
(6, 'Escobillon', '', 1199, 'css/img/escobillon-liso-plastico.jpg', 3);
(7, 'Manguera', '', 11250, 'css/img/manguera.jpg', 4);
(8, 'Limpiador Jardin', '', 1999, 'css/img/limpiador-jardin.jpg', 4);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
