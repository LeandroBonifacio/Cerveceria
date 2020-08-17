-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2019 a las 18:56:42
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcerveceria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barriles`
--

DROP TABLE IF EXISTS `barriles`;
CREATE TABLE IF NOT EXISTS `barriles` (
  `Ba_Id` int(11) NOT NULL,
  `Ba_CodigoBarril` int(11) NOT NULL,
  `Ba_Capacidad` int(11) NOT NULL,
  PRIMARY KEY (`Ba_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `Cl_Id` int(20) NOT NULL AUTO_INCREMENT,
  `Cl_RazonSocial` varchar(100) NOT NULL,
  `Cl_Ciudad` varchar(100) NOT NULL,
  `Cl_Telefono` varchar(100) NOT NULL,
  `Cl_Calle` varchar(100) NOT NULL,
  `Cl_Altura` varchar(10) NOT NULL,
  `Cl_Cuit` varchar(11) NOT NULL,
  `Cl_SituacionIVA` varchar(50) NOT NULL,
  PRIMARY KEY (`Cl_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `Co_Id` int(11) NOT NULL,
  `Co_IdProv` int(11) NOT NULL,
  `Co_IdArticulo` int(11) NOT NULL,
  `Co_Costo` int(11) NOT NULL,
  `Co_Fecha` date NOT NULL,
  `Co_Cantidad` int(11) NOT NULL,
  `Co_Comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`Co_Id`),
  KEY `Co_IdProv` (`Co_IdProv`) USING BTREE,
  KEY `Co_IdArticulo` (`Co_IdArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fermentado`
--

DROP TABLE IF EXISTS `fermentado`;
CREATE TABLE IF NOT EXISTS `fermentado` (
  `Fe_Id` int(11) NOT NULL,
  `Fe_FechaEntrada` date NOT NULL,
  `Fe_FechaSalida` date NOT NULL,
  `Fe_HoraEntrada` time NOT NULL,
  `Fe_HoraSalida` time NOT NULL,
  `Fe_LitrosEntrada` varchar(50) NOT NULL,
  `Fe_LitrosSalida` varchar(50) NOT NULL,
  PRIMARY KEY (`Fe_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `In_Id` int(11) NOT NULL,
  `In_Decripcion` varchar(50) NOT NULL,
  `In_Stock` varchar(50) NOT NULL,
  PRIMARY KEY (`In_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredlotes`
--

DROP TABLE IF EXISTS `ingredlotes`;
CREATE TABLE IF NOT EXISTS `ingredlotes` (
  `In_Id` int(11) NOT NULL,
  `In_IdLote` int(11) NOT NULL,
  `In_IdIngrediente` int(11) NOT NULL,
  `In_Cant` int(11) NOT NULL,
  `In_Extra` int(11) NOT NULL,
  PRIMARY KEY (`In_Id`),
  KEY `In_IdLote` (`In_IdLote`),
  KEY `In_IdIngrediente` (`In_IdIngrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

DROP TABLE IF EXISTS `limpieza`;
CREATE TABLE IF NOT EXISTS `limpieza` (
  `Li_id` int(11) NOT NULL,
  `Li_Fecha` date NOT NULL,
  `Li_Hora` time NOT NULL,
  `Li_ConqueLimpie` varchar(70) NOT NULL,
  `Li_QueLimpie` varchar(70) NOT NULL,
  PRIMARY KEY (`Li_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `Lo_Id` int(11) NOT NULL,
  `Lo_IdBarril` int(11) NOT NULL,
  `Lo_IdProduccion` int(11) NOT NULL,
  `Lo_FechaLlenado` date NOT NULL,
  `Lo_HoraLlenado` time NOT NULL,
  `Lo_FechaCarbonatacion` date NOT NULL,
  PRIMARY KEY (`Lo_Id`),
  KEY `Al_IdBarril` (`Lo_IdBarril`),
  KEY `Al_IdProduccion` (`Lo_IdProduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

DROP TABLE IF EXISTS `produccion`;
CREATE TABLE IF NOT EXISTS `produccion` (
  `Pr_Id` int(11) NOT NULL,
  `Pr_Fecha` date NOT NULL,
  `Pr_CantAgua` int(11) NOT NULL,
  `Pr_TemperaturaMaceración` varchar(50) NOT NULL,
  `Pr_TiempoMaseracion` varchar(50) NOT NULL,
  `Pr_TemperaturaCoccion` varchar(50) NOT NULL,
  `Pr_TiempoCoccion` varchar(50) NOT NULL,
  `Pr_Comentarios` varchar(200) NOT NULL,
  PRIMARY KEY (`Pr_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `Pr_Id` int(13) NOT NULL,
  `Pr_Nombre` varchar(70) NOT NULL,
  `Pr_Empresa` varchar(70) NOT NULL,
  `Pr_Descripcion` varchar(50) NOT NULL,
  `Pr_Extra2` int(2) NOT NULL,
  PRIMARY KEY (`Pr_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `Ve_Id` int(11) NOT NULL,
  `Ve_Fecha` date NOT NULL,
  `Ve_Costo` double NOT NULL,
  `Ve_Barriles/Choperas` int(11) NOT NULL,
  `Ve_Pagado` tinyint(1) NOT NULL,
  `Ve_Cliente` int(11) NOT NULL,
  PRIMARY KEY (`Ve_Id`),
  KEY `Ve_Barriles/Choperas` (`Ve_Barriles/Choperas`),
  KEY `Ve_Cliente` (`Ve_Cliente`),
  KEY `Ve_Cliente_2` (`Ve_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barriles`
--
ALTER TABLE `barriles`
  ADD CONSTRAINT `barriles_ibfk_1` FOREIGN KEY (`Ba_Id`) REFERENCES `lotes` (`Lo_IdBarril`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Co_IdProv`) REFERENCES `proveedores` (`Pr_Id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`Co_IdArticulo`) REFERENCES `ingredientes` (`In_Id`);

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`In_Id`) REFERENCES `ingredlotes` (`In_IdIngrediente`);

--
-- Filtros para la tabla `ingredlotes`
--
ALTER TABLE `ingredlotes`
  ADD CONSTRAINT `ingredlotes_ibfk_1` FOREIGN KEY (`In_IdLote`) REFERENCES `lotes` (`Lo_Id`);

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`Lo_IdBarril`) REFERENCES `barriles` (`Ba_Id`),
  ADD CONSTRAINT `lotes_ibfk_2` FOREIGN KEY (`Lo_IdProduccion`) REFERENCES `produccion` (`Pr_Id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Ve_Cliente`) REFERENCES `clientes` (`Cl_Id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Ve_Barriles/Choperas`) REFERENCES `barriles` (`Ba_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
