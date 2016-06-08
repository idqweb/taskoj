-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2016 at 09:24 
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskoj`
--
#la eliminamos si existe ya en nuestra db
DROP DATABASE IF EXISTS taskoj;
# creamos nuestra db
CREATE DATABASE taskoj;

USE taskoj;
-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` smallint(6) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL,
  `nombre_subcategoria` varchar(45) DEFAULT NULL,
  `descripcion_categoria` mediumtext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Categorias posibles de las tareas.';

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `nombre_subcategoria`, `descripcion_categoria`) VALUES
(1, 'Compras', NULL, 'Para cualquier tipo de Compras.'),
(2, 'Envio', NULL, 'Envío de paqueteria'),
(3, 'Clases', NULL, 'Para enseñanza clases particulares');

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` smallint(6) NOT NULL,
  `pais_codigo_pais` char(2) NOT NULL,
  `nombre_ciudad` varchar(50) NOT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `pais_codigo_pais`, `nombre_ciudad`, `ultima_actualizacion`) VALUES
(22, 'ES', 'Cabañas Raras', '2016-06-01 12:52:28'),
(23, 'ES', 'Pamplona', '2016-06-01 12:59:44'),
(24, 'ES', 'Marbella', '2016-06-01 13:01:14'),
(25, 'FR', 'Paris', '2016-06-01 13:02:42'),
(26, 'ES', 'Ponferrada', '2016-06-01 13:11:19'),
(27, 'NZ', 'Paraparaumu', '2016-06-01 19:11:49'),
(28, 'GB', 'London', '2016-06-01 19:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sesiones`
--

CREATE TABLE IF NOT EXISTS `ci_sesiones` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sesiones`
--

INSERT INTO `ci_sesiones` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2b2d6693cf0c88b4918468648154ecf171d9bbb5', '127.0.0.1', 1464797324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739373332343b),
('c9aca808d3c53b6605a3d66e6f235bfa7d3b366f', '127.0.0.1', 1464798343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739383039303b6c6f676561646f7c623a313b6e6f6d6272657c733a363a2253616e647261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b),
('f49956dfceba628841fa66babbfecfa77afc08ee', '127.0.0.1', 1464798919, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739383634323b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224a6f73c3a9223b6170656c6c69646f737c733a31333a2250c3a972657a204cc3b370657a223b666f746f7c733a33353a226173736574732f696d672f666f746f735f70657266696c2f686f6d627265352e706e67223b656d61696c7c733a32313a2263726561646f72314063726561646f72312e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b),
('189f9c02ac7eb9360ee7d3d2182e2f7f14fd4905', '127.0.0.1', 1464799456, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739393430303b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b),
('8c63c046870c1561ea4ee4748eb72decfa0f3e08', '127.0.0.1', 1464800327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830303035303b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b),
('1a1ffa7e210919d89c8bf4efbfbf5774f176b008', '127.0.0.1', 1464800940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830303635333b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b6c6174697475647c643a34322e35343939393537393939393939393738313432313133383332323931323135363538313837383636323130393337353b6c6f6e67697475647c643a2d362e35393832353930303030303030303134323835333139353933393039363632323136393031373739313734383034363837353b),
('6c79ae7c2f81b2a4ae3ebcdfc9c5d82f7d103d95', '127.0.0.1', 1464801171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830303936353b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b6c6174697475647c643a34322e35343939393537393939393939393738313432313133383332323931323135363538313837383636323130393337353b6c6f6e67697475647c643a2d362e35393832353930303030303030303134323835333139353933393039363632323136393031373739313734383034363837353b),
('fe2e1b4c7ceb1a4bd0a39019e7dd9f49291f0faa', '127.0.0.1', 1464801655, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830313430383b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b6c6174697475647c643a34322e35343939393537393939393939393738313432313133383332323931323135363538313837383636323130393337353b6c6f6e67697475647c643a2d362e35393832353930303030303030303134323835333139353933393039363632323136393031373739313734383034363837353b),
('ed4d485e83ac54e428e683620ece63cbbc92d692', '127.0.0.1', 1464802378, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830323132323b6e6f6d6272655f7573756172696f7c733a383a224361726f6e696c61223b6170656c6c69646f735f7573756172696f7c733a31313a2248616c6c2053746576656e223b656d61696c5f7573756172696f7c733a32373a227265616c697a61646f7231407265616c697a61646f72312e636f6d223b70617373776f72645f7573756172696f7c733a36303a22243261243037245336475443546d386e6c727975696b4a54614676354f6a572f4d66644e644c7a6479326d716f6b634e4e684d6e7a54746859524965223b7469706f5f7573756172696f7c733a31303a227265616c697a61646f72223b6c6f676561646f7c623a313b6e6f6d6272657c733a383a224361726f6e696c61223b6170656c6c69646f737c733a31313a2248616c6c2053746576656e223b656d61696c7c733a32373a227265616c697a61646f7231407265616c697a61646f72312e636f6d223b666f746f7c733a33343a226173736574732f696d672f7573756172696f2d666f746f2d70657266696c2e706e67223b7469706f5573756172696f7c733a31303a227265616c697a61646f72223b),
('32046270173cd7376d34d3e998551f928751d185', '127.0.0.1', 1464802739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830323434353b6e6f6d6272655f7573756172696f7c733a363a22456e63696e61223b6170656c6c69646f735f7573756172696f7c733a31323a225a617061746120446f726e65223b656d61696c5f7573756172696f7c733a32373a227265616c697a61646f7232407265616c697a61646f72322e636f6d223b70617373776f72645f7573756172696f7c733a36303a22243261243037246d317a6f4c44346b524e5a4656723351454d6e5a64754f305a595a32624a50437755582f50386568322f6568425453505363774279223b7469706f5f7573756172696f7c733a31303a227265616c697a61646f72223b6c6f676561646f7c623a313b6e6f6d6272657c733a363a22456e63696e61223b6170656c6c69646f737c733a31323a225a617061746120446f726e65223b656d61696c7c733a32373a227265616c697a61646f7232407265616c697a61646f72322e636f6d223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572312e706e67223b7469706f5573756172696f7c733a31303a227265616c697a61646f72223b),
('7cefab7385338b322a8be9e98dc462bdeaf5c399', '127.0.0.1', 1464802973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830323837303b),
('43701c96fbd257c096d75021f00d62f1f9d70ea1', '127.0.0.1', 1464803452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830333433323b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224a6f73c3a9223b6170656c6c69646f737c733a31333a2250c3a972657a204cc3b370657a223b666f746f7c733a33353a226173736574732f696d672f666f746f735f70657266696c2f686f6d627265352e706e67223b656d61696c7c733a32313a2263726561646f72314063726561646f72312e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b),
('e23d265737f85fcc9a728d7597af74210099d484', '127.0.0.1', 1464803837, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830333739303b),
('e4a757647322d271b2a6d37907944a2fbacb9bbb', '127.0.0.1', 1464804690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830343437393b),
('c9f45b4a14f514ae965a9951329c237cc7b0dde4', '127.0.0.1', 1464806985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830363938353b),
('6b692ccd6e6c23727bb3bd41f2f75575874661d5', '127.0.0.1', 1464808341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830383138323b6c6f676561646f7c623a313b6e6f6d6272657c733a353a224c61757261223b6170656c6c69646f737c733a31353a224c756e657320446f6d696e67756573223b666f746f7c733a33343a226173736574732f696d672f666f746f735f70657266696c2f6d756a6572322e706e67223b656d61696c7c733a32313a2263726561646f72324063726561646f72322e636f6d223b7469706f5573756172696f7c733a373a2263726561646f72223b6c6174697475647c643a2d34302e39303035353639393939393939393931363337313936323137313937393234383532333731323135383230333132353b6c6f6e67697475647c643a3137342e3838353937313030303030303031323035343434323737373239383339303836353332353932373733343337353b),
('f6a8b3f8483f08d4a46faf3b20d7b9fbda76fd8d', '127.0.0.1', 1464809005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343830393030353b);

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int(11) NOT NULL,
  `ciudad_id_ciudad` smallint(6) NOT NULL,
  `nombre_direccion1` varchar(100) DEFAULT NULL,
  `nombre_direccion2` varchar(100) DEFAULT NULL,
  `longitud_direccion` float(10,6) DEFAULT NULL COMMENT 'Google maps usa float 10,6 y es de donde voy a sacar los datos',
  `latitud_direccion` float(10,6) DEFAULT NULL COMMENT 'Son los datos de google de donde voy a sacarlo\n',
  `postal_codigo_direccion` varchar(10) DEFAULT NULL,
  `telefono_direccion` varchar(20) DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `ciudad_id_ciudad`, `nombre_direccion1`, `nombre_direccion2`, `longitud_direccion`, `latitud_direccion`, `postal_codigo_direccion`, `telefono_direccion`, `ultima_actualizacion`) VALUES
(36, 22, 'Calle Carr. de Fabero,23', NULL, -6.637452, 42.620312, '24412', NULL, '2016-06-01 12:52:28'),
(37, 23, 'Plaza de la Paz,15', NULL, -1.645774, 42.812527, '31002', NULL, '2016-06-01 12:59:44'),
(38, 24, 'Av. de Nabeul,1A', NULL, -4.882447, 36.510071, '29601', NULL, '2016-06-01 13:01:14'),
(39, 25, ',', NULL, 2.352222, 48.856613, '75004', NULL, '2016-06-01 13:02:42'),
(40, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 13:11:19'),
(41, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 17:05:46'),
(42, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 17:08:00'),
(44, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 17:10:36'),
(45, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 17:12:38'),
(46, 26, 'Calle Ramon y Cajal,1', NULL, -6.598259, 42.549995, '24400', NULL, '2016-06-01 17:20:55'),
(47, 27, ',', NULL, 174.885971, -40.900558, '5034', NULL, '2016-06-01 19:11:49'),
(48, 28, 'Whitehall,', NULL, -0.127758, 51.507351, NULL, NULL, '2016-06-01 19:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `usuario_id_usuario_mensajero` int(11) NOT NULL,
  `usuario_id_usuario_receptor` int(11) NOT NULL,
  `instante_mensaje` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza',
  `texto_mensaje` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `codigo_pais` char(2) NOT NULL,
  `nombre_pais` varchar(50) NOT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`codigo_pais`, `nombre_pais`, `ultima_actualizacion`) VALUES
('A1', 'Anonymous Proxy', '2016-05-21 10:35:38'),
('A2', 'Satellite Provider', '2016-05-21 10:35:38'),
('AD', 'Andorra', '2016-05-21 10:35:38'),
('AE', 'United Arab Emirates', '2016-05-21 10:35:38'),
('AF', 'Afghanistan', '2016-05-21 10:35:38'),
('AG', 'Antigua and Barbuda', '2016-05-21 10:35:38'),
('AI', 'Anguilla', '2016-05-21 10:35:38'),
('AL', 'Albania', '2016-05-21 10:35:38'),
('AM', 'Armenia', '2016-05-21 10:35:38'),
('AO', 'Angola', '2016-05-21 10:35:38'),
('AP', 'Asia/Pacific Region', '2016-05-21 10:35:38'),
('AQ', 'Antarctica', '2016-05-21 10:35:38'),
('AR', 'Argentina', '2016-05-21 10:35:38'),
('AS', 'American Samoa', '2016-05-21 10:35:38'),
('AT', 'Austria', '2016-05-21 10:35:38'),
('AU', 'Australia', '2016-05-21 10:35:38'),
('AW', 'Aruba', '2016-05-21 10:35:38'),
('AX', 'Aland Islands', '2016-05-21 10:35:38'),
('AZ', 'Azerbaijan', '2016-05-21 10:35:38'),
('BA', 'Bosnia and Herzegovina', '2016-05-21 10:35:38'),
('BB', 'Barbados', '2016-05-21 10:35:38'),
('BD', 'Bangladesh', '2016-05-21 10:35:38'),
('BE', 'Belgium', '2016-05-21 10:35:38'),
('BF', 'Burkina Faso', '2016-05-21 10:35:38'),
('BG', 'Bulgaria', '2016-05-21 10:35:38'),
('BH', 'Bahrain', '2016-05-21 10:35:38'),
('BI', 'Burundi', '2016-05-21 10:35:38'),
('BJ', 'Benin', '2016-05-21 10:35:38'),
('BL', 'Saint Barthelemy', '2016-05-21 10:35:38'),
('BM', 'Bermuda', '2016-05-21 10:35:38'),
('BN', 'Brunei Darussalam', '2016-05-21 10:35:38'),
('BO', 'Bolivia', '2016-05-21 10:35:38'),
('BQ', 'Bonair', '2016-05-21 10:35:38'),
('BR', 'Brazil', '2016-05-21 10:35:38'),
('BS', 'Bahamas', '2016-05-21 10:35:38'),
('BT', 'Bhutan', '2016-05-21 10:35:38'),
('BW', 'Botswana', '2016-05-21 10:35:38'),
('BY', 'Belarus', '2016-05-21 10:35:38'),
('BZ', 'Belize', '2016-05-21 10:35:38'),
('CA', 'Canada', '2016-05-21 10:35:38'),
('CC', 'Cocos (Keeling) Islands', '2016-05-21 10:35:38'),
('CD', 'Cong', '2016-05-21 10:35:38'),
('CF', 'Central African Republic', '2016-05-21 10:35:38'),
('CG', 'Congo', '2016-05-21 10:35:38'),
('CH', 'Switzerland', '2016-05-21 10:35:38'),
('CI', 'Cote D''Ivoire', '2016-05-21 10:35:38'),
('CK', 'Cook Islands', '2016-05-21 10:35:38'),
('CL', 'Chile', '2016-05-21 10:35:38'),
('CM', 'Cameroon', '2016-05-21 10:35:38'),
('CN', 'China', '2016-05-21 10:35:38'),
('CO', 'Colombia', '2016-05-21 10:35:38'),
('CR', 'Costa Rica', '2016-05-21 10:35:38'),
('CU', 'Cuba', '2016-05-21 10:35:38'),
('CV', 'Cape Verde', '2016-05-21 10:35:38'),
('CW', 'Curacao', '2016-05-21 10:35:38'),
('CX', 'Christmas Island', '2016-05-21 10:35:38'),
('CY', 'Cyprus', '2016-05-21 10:35:38'),
('CZ', 'Czech Republic', '2016-05-21 10:35:38'),
('DE', 'Germany', '2016-05-21 10:35:38'),
('DJ', 'Djibouti', '2016-05-21 10:35:38'),
('DK', 'Denmark', '2016-05-21 10:35:38'),
('DM', 'Dominica', '2016-05-21 10:35:38'),
('DO', 'Dominican Republic', '2016-05-21 10:35:38'),
('DZ', 'Algeria', '2016-05-21 10:35:38'),
('EC', 'Ecuador', '2016-05-21 10:35:38'),
('EE', 'Estonia', '2016-05-21 10:35:38'),
('EG', 'Egypt', '2016-05-21 10:35:38'),
('EH', 'Western Sahara', '2016-05-21 10:35:38'),
('ER', 'Eritrea', '2016-05-21 10:35:38'),
('ES', 'Spain', '2016-05-21 10:35:38'),
('ET', 'Ethiopia', '2016-05-21 10:35:38'),
('EU', 'Europe', '2016-05-21 10:35:38'),
('FI', 'Finland', '2016-05-21 10:35:38'),
('FJ', 'Fiji', '2016-05-21 10:35:38'),
('FK', 'Falkland Islands (Malvinas)', '2016-05-21 10:35:38'),
('FM', 'Micronesi', '2016-05-21 10:35:38'),
('FO', 'Faroe Islands', '2016-05-21 10:35:38'),
('FR', 'France', '2016-05-21 10:35:38'),
('GA', 'Gabon', '2016-05-21 10:35:38'),
('GB', 'United Kingdom', '2016-05-21 10:35:38'),
('GD', 'Grenada', '2016-05-21 10:35:38'),
('GE', 'Georgia', '2016-05-21 10:35:38'),
('GF', 'French Guiana', '2016-05-21 10:35:38'),
('GG', 'Guernsey', '2016-05-21 10:35:38'),
('GH', 'Ghana', '2016-05-21 10:35:38'),
('GI', 'Gibraltar', '2016-05-21 10:35:38'),
('GL', 'Greenland', '2016-05-21 10:35:38'),
('GM', 'Gambia', '2016-05-21 10:35:38'),
('GN', 'Guinea', '2016-05-21 10:35:38'),
('GP', 'Guadeloupe', '2016-05-21 10:35:38'),
('GQ', 'Equatorial Guinea', '2016-05-21 10:35:38'),
('GR', 'Greece', '2016-05-21 10:35:38'),
('GS', 'South Georgia and the South Sandwich Islands', '2016-05-21 10:35:38'),
('GT', 'Guatemala', '2016-05-21 10:35:38'),
('GU', 'Guam', '2016-05-21 10:35:38'),
('GW', 'Guinea-Bissau', '2016-05-21 10:35:38'),
('GY', 'Guyana', '2016-05-21 10:35:38'),
('HK', 'Hong Kong', '2016-05-21 10:35:38'),
('HN', 'Honduras', '2016-05-21 10:35:38'),
('HR', 'Croatia', '2016-05-21 10:35:38'),
('HT', 'Haiti', '2016-05-21 10:35:38'),
('HU', 'Hungary', '2016-05-21 10:35:38'),
('ID', 'Indonesia', '2016-05-21 10:35:38'),
('IE', 'Ireland', '2016-05-21 10:35:38'),
('IL', 'Israel', '2016-05-21 10:35:38'),
('IM', 'Isle of Man', '2016-05-21 10:35:38'),
('IN', 'India', '2016-05-21 10:35:38'),
('IO', 'British Indian Ocean Territory', '2016-05-21 10:35:38'),
('IQ', 'Iraq', '2016-05-21 10:35:38'),
('IR', 'Ira', '2016-05-21 10:35:38'),
('IS', 'Iceland', '2016-05-21 10:35:38'),
('IT', 'Italy', '2016-05-21 10:35:38'),
('JE', 'Jersey', '2016-05-21 10:35:38'),
('JM', 'Jamaica', '2016-05-21 10:35:38'),
('JO', 'Jordan', '2016-05-21 10:35:38'),
('JP', 'Japan', '2016-05-21 10:35:38'),
('KE', 'Kenya', '2016-05-21 10:35:38'),
('KG', 'Kyrgyzstan', '2016-05-21 10:35:38'),
('KH', 'Cambodia', '2016-05-21 10:35:38'),
('KI', 'Kiribati', '2016-05-21 10:35:38'),
('KM', 'Comoros', '2016-05-21 10:35:38'),
('KN', 'Saint Kitts and Nevis', '2016-05-21 10:35:38'),
('KP', 'Kore', '2016-05-21 10:35:38'),
('KR', 'Kore', '2016-05-21 10:35:38'),
('KW', 'Kuwait', '2016-05-21 10:35:38'),
('KY', 'Cayman Islands', '2016-05-21 10:35:38'),
('KZ', 'Kazakhstan', '2016-05-21 10:35:38'),
('LA', 'Lao People''s Democratic Republic', '2016-05-21 10:35:38'),
('LB', 'Lebanon', '2016-05-21 10:35:38'),
('LC', 'Saint Lucia', '2016-05-21 10:35:38'),
('LI', 'Liechtenstein', '2016-05-21 10:35:38'),
('LK', 'Sri Lanka', '2016-05-21 10:35:38'),
('LR', 'Liberia', '2016-05-21 10:35:38'),
('LS', 'Lesotho', '2016-05-21 10:35:38'),
('LT', 'Lithuania', '2016-05-21 10:35:38'),
('LU', 'Luxembourg', '2016-05-21 10:35:38'),
('LV', 'Latvia', '2016-05-21 10:35:38'),
('LY', 'Libya', '2016-05-21 10:35:38'),
('MA', 'Morocco', '2016-05-21 10:35:38'),
('MC', 'Monaco', '2016-05-21 10:35:38'),
('MD', 'Moldov', '2016-05-21 10:35:38'),
('ME', 'Montenegro', '2016-05-21 10:35:38'),
('MF', 'Saint Martin', '2016-05-21 10:35:38'),
('MG', 'Madagascar', '2016-05-21 10:35:38'),
('MH', 'Marshall Islands', '2016-05-21 10:35:38'),
('MK', 'Macedonia', '2016-05-21 10:35:38'),
('ML', 'Mali', '2016-05-21 10:35:38'),
('MM', 'Myanmar', '2016-05-21 10:35:38'),
('MN', 'Mongolia', '2016-05-21 10:35:38'),
('MO', 'Macau', '2016-05-21 10:35:38'),
('MP', 'Northern Mariana Islands', '2016-05-21 10:35:38'),
('MQ', 'Martinique', '2016-05-21 10:35:38'),
('MR', 'Mauritania', '2016-05-21 10:35:38'),
('MS', 'Montserrat', '2016-05-21 10:35:38'),
('MT', 'Malta', '2016-05-21 10:35:38'),
('MU', 'Mauritius', '2016-05-21 10:35:38'),
('MV', 'Maldives', '2016-05-21 10:35:38'),
('MW', 'Malawi', '2016-05-21 10:35:38'),
('MX', 'Mexico', '2016-05-21 10:35:38'),
('MY', 'Malaysia', '2016-05-21 10:35:38'),
('MZ', 'Mozambique', '2016-05-21 10:35:38'),
('NA', 'Namibia', '2016-05-21 10:35:38'),
('NC', 'New Caledonia', '2016-05-21 10:35:38'),
('NE', 'Niger', '2016-05-21 10:35:38'),
('NF', 'Norfolk Island', '2016-05-21 10:35:38'),
('NG', 'Nigeria', '2016-05-21 10:35:38'),
('NI', 'Nicaragua', '2016-05-21 10:35:38'),
('NL', 'Netherlands', '2016-05-21 10:35:38'),
('NO', 'Norway', '2016-05-21 10:35:38'),
('NP', 'Nepal', '2016-05-21 10:35:38'),
('NR', 'Nauru', '2016-05-21 10:35:38'),
('NU', 'Niue', '2016-05-21 10:35:38'),
('NZ', 'New Zealand', '2016-05-21 10:35:38'),
('OM', 'Oman', '2016-05-21 10:35:38'),
('PA', 'Panama', '2016-05-21 10:35:38'),
('PE', 'Peru', '2016-05-21 10:35:38'),
('PF', 'French Polynesia', '2016-05-21 10:35:38'),
('PG', 'Papua New Guinea', '2016-05-21 10:35:38'),
('PH', 'Philippines', '2016-05-21 10:35:38'),
('PK', 'Pakistan', '2016-05-21 10:35:38'),
('PL', 'Poland', '2016-05-21 10:35:38'),
('PM', 'Saint Pierre and Miquelon', '2016-05-21 10:35:38'),
('PN', 'Pitcairn Islands', '2016-05-21 10:35:38'),
('PR', 'Puerto Rico', '2016-05-21 10:35:38'),
('PS', 'Palestinian Territory', '2016-05-21 10:35:38'),
('PT', 'Portugal', '2016-05-21 10:35:38'),
('PW', 'Palau', '2016-05-21 10:35:38'),
('PY', 'Paraguay', '2016-05-21 10:35:38'),
('QA', 'Qatar', '2016-05-21 10:35:38'),
('RE', 'Reunion', '2016-05-21 10:35:38'),
('RO', 'Romania', '2016-05-21 10:35:38'),
('RS', 'Serbia', '2016-05-21 10:35:38'),
('RU', 'Russian Federation', '2016-05-21 10:35:38'),
('RW', 'Rwanda', '2016-05-21 10:35:38'),
('SA', 'Saudi Arabia', '2016-05-21 10:35:38'),
('SB', 'Solomon Islands', '2016-05-21 10:35:38'),
('SC', 'Seychelles', '2016-05-21 10:35:38'),
('SD', 'Sudan', '2016-05-21 10:35:38'),
('SE', 'Sweden', '2016-05-21 10:35:38'),
('SG', 'Singapore', '2016-05-21 10:35:38'),
('SH', 'Saint Helena', '2016-05-21 10:35:38'),
('SI', 'Slovenia', '2016-05-21 10:35:38'),
('SJ', 'Svalbard and Jan Mayen', '2016-05-21 10:35:38'),
('SK', 'Slovakia', '2016-05-21 10:35:38'),
('SL', 'Sierra Leone', '2016-05-21 10:35:38'),
('SM', 'San Marino', '2016-05-21 10:35:38'),
('SN', 'Senegal', '2016-05-21 10:35:38'),
('SO', 'Somalia', '2016-05-21 10:35:38'),
('SR', 'Suriname', '2016-05-21 10:35:38'),
('SS', 'South Sudan', '2016-05-21 10:35:38'),
('ST', 'Sao Tome and Principe', '2016-05-21 10:35:38'),
('SV', 'El Salvador', '2016-05-21 10:35:38'),
('SX', 'Sint Maarten (Dutch part)', '2016-05-21 10:35:38'),
('SY', 'Syrian Arab Republic', '2016-05-21 10:35:38'),
('SZ', 'Swaziland', '2016-05-21 10:35:38'),
('TC', 'Turks and Caicos Islands', '2016-05-21 10:35:38'),
('TD', 'Chad', '2016-05-21 10:35:38'),
('TF', 'French Southern Territories', '2016-05-21 10:35:38'),
('TG', 'Togo', '2016-05-21 10:35:38'),
('TH', 'Thailand', '2016-05-21 10:35:38'),
('TJ', 'Tajikistan', '2016-05-21 10:35:38'),
('TK', 'Tokelau', '2016-05-21 10:35:38'),
('TL', 'Timor-Leste', '2016-05-21 10:35:38'),
('TM', 'Turkmenistan', '2016-05-21 10:35:38'),
('TN', 'Tunisia', '2016-05-21 10:35:38'),
('TO', 'Tonga', '2016-05-21 10:35:38'),
('TR', 'Turkey', '2016-05-21 10:35:38'),
('TT', 'Trinidad and Tobago', '2016-05-21 10:35:38'),
('TV', 'Tuvalu', '2016-05-21 10:35:38'),
('TW', 'Taiwan', '2016-05-21 10:35:38'),
('TZ', 'Tanzani', '2016-05-21 10:35:38'),
('UA', 'Ukraine', '2016-05-21 10:35:38'),
('UG', 'Uganda', '2016-05-21 10:35:38'),
('UM', 'United States Minor Outlying Islands', '2016-05-21 10:35:38'),
('US', 'United States', '2016-05-21 10:35:38'),
('UY', 'Uruguay', '2016-05-21 10:35:38'),
('UZ', 'Uzbekistan', '2016-05-21 10:35:38'),
('VA', 'Holy See (Vatican City State)', '2016-05-21 10:35:38'),
('VC', 'Saint Vincent and the Grenadines', '2016-05-21 10:35:38'),
('VE', 'Venezuela', '2016-05-21 10:35:38'),
('VG', 'Virgin Island', '2016-05-21 10:35:38'),
('VI', 'Virgin Island', '2016-05-21 10:35:38'),
('VN', 'Vietnam', '2016-05-21 10:35:38'),
('VU', 'Vanuatu', '2016-05-21 10:35:38'),
('WF', 'Wallis and Futuna', '2016-05-21 10:35:38'),
('WS', 'Samoa', '2016-05-21 10:35:38'),
('YE', 'Yemen', '2016-05-21 10:35:38'),
('YT', 'Mayotte', '2016-05-21 10:35:38'),
('ZA', 'South Africa', '2016-05-21 10:35:38'),
('ZM', 'Zambia', '2016-05-21 10:35:38'),
('ZW', 'Zimbabwe', '2016-05-21 10:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `id_tarea` int(11) NOT NULL,
  `usuario_id_usuario_creador` int(11) NOT NULL,
  `direccion_id_direccion` int(11) NOT NULL,
  `categoria_id_categoria` smallint(6) NOT NULL,
  `nombre_tarea` varchar(50) NOT NULL,
  `descripcion_tarea` mediumtext,
  `fecha_creacion_tarea` datetime NOT NULL,
  `frecuencia_tarea` enum('Puntual','Diaria','Semanal','Mensual','Anual') DEFAULT NULL,
  `estado_tarea` enum('En Cola','En Proceso','Realizada','Caducada') DEFAULT NULL COMMENT 'Tabla donde se crean tareas, estas podrán ser o no realizadas.',
  `precio_inicial_tarea` decimal(7,2) DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `usuario_id_usuario_creador`, `direccion_id_direccion`, `categoria_id_categoria`, `nombre_tarea`, `descripcion_tarea`, `fecha_creacion_tarea`, `frecuencia_tarea`, `estado_tarea`, `precio_inicial_tarea`, `ultima_actualizacion`) VALUES
(24, 44, 36, 3, 'Aprender chino madarin', 'Necesito que un profesor se pueda desplazar todas las semanas los viernes, para enseñarme chino manarin. Por la noche a las 22h.', '2016-06-01 14:52:28', 'Semanal', 'En Cola', '20.00', '2016-06-01 12:52:28'),
(25, 44, 37, 2, 'Enviar castañas para San Fermin', 'Necesito enviar un saco de castañas. Si alguien va a Pamplona y me lo puede llevar,', '2016-06-01 14:59:44', 'Puntual', 'En Cola', '5.00', '2016-06-01 12:59:44'),
(26, 44, 38, 1, 'Comprar un yate', 'Necesito alguien me acompañe que entienda de navíos pues quiero comprar un yate a un sultán.', '2016-06-01 15:01:14', 'Puntual', 'En Cola', '5000.00', '2016-06-01 13:01:14'),
(27, 44, 39, 3, 'Clases particulares de Francés', 'Necesito un curso intensivo de Francés, acabo de llegar a Paris y no se nada.', '2016-06-01 15:02:42', 'Diaria', 'En Cola', '5.00', '2016-06-01 13:02:42'),
(28, 45, 40, 2, 'Comida a mi hijo', 'Todos los meses debo enviar comida a mi hijo que esta estudiando en Salamanca. Busco un transporte barato.', '2016-06-01 15:11:19', 'Mensual', 'En Cola', '15.00', '2016-06-01 13:11:19'),
(29, 45, 41, 1, 'Comprarme el pan', 'Quisiera que alguien me comprara el pan y me lo traiga a casa todos los dias. Ha de comprarlo en el despacho "Peña".', '2016-06-01 19:05:46', 'Puntual', 'En Cola', '0.50', '2016-06-01 17:05:46'),
(30, 45, 42, 1, 'Comprarme la prensa', 'Que em compren el "Diario de León" y me lo traigan a la oficina.', '2016-06-01 19:08:00', 'Diaria', 'En Cola', '1.00', '2016-06-01 17:08:00'),
(32, 45, 44, 2, 'LLevarme unos planos a imprimir', 'Llevar hasta una fotocopisteria unos planos para que nos los impriman.', '2016-06-01 19:10:36', 'Puntual', 'En Cola', '5.00', '2016-06-01 17:10:36'),
(33, 45, 45, 1, 'Comprarme Patatas Bravas', 'Que me traigan para las 22:00 unas patatas bravas del "Bodegon".', '2016-06-01 19:12:38', 'Puntual', 'En Cola', '2.00', '2016-06-01 17:12:38'),
(34, 45, 46, 3, 'Recibir instrucciones de alpinismo', 'Alguien que sepa de alpinismo, quisiera que me diera clases, una vez al mes preferiblemente en fin de semana.', '2016-06-01 19:20:55', 'Mensual', 'En Cola', '20.00', '2016-06-01 17:20:55'),
(35, 45, 47, 1, 'Quiero una Hamburguesa de Kobe', 'Quien me traiga una hamburguesa de Kobe le pagare mucho.', '2016-06-01 21:11:49', 'Puntual', 'En Cola', '50.00', '2016-06-01 19:11:49'),
(36, 45, 48, 1, 'Comprar Te', 'Comprarme bolsas de Te de la mejor tienda de Londres.\r\nY que me las lleven a la oficina.', '2016-06-01 21:22:55', 'Semanal', 'En Cola', '4.00', '2016-06-01 19:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `trabajo`
--

CREATE TABLE IF NOT EXISTS `trabajo` (
  `id_trabajo` int(11) NOT NULL,
  `tarea_id_tarea` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `precio_final` decimal(7,2) NOT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza',
  `fecha_inicio_trabajo` datetime DEFAULT NULL,
  `fecha_final_trabajo` datetime DEFAULT NULL,
  `codigo_verifica_trabajo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `direccion_id_direccion` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `apellidos_usuario` varchar(60) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `fecha_creacion_usuario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(100) DEFAULT NULL,
  `fecha_token` datetime DEFAULT NULL,
  `foto` varchar(150) DEFAULT 'ets/img/usuario-foto-perfil.png',
  `tipo_usuario` enum('realizador','creador') DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'para saber cuando se actualiza'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `direccion_id_direccion`, `nombre_usuario`, `apellidos_usuario`, `email_usuario`, `password_usuario`, `fecha_creacion_usuario`, `token`, `fecha_token`, `foto`, `tipo_usuario`, `ultima_actualizacion`) VALUES
(44, NULL, 'José', 'Pérez López', 'creador1@creador1.com', '$2a$07$kssGWNiJw1DIsCA8Xbn7tunuxYi8YNYNyF8yhkH82x.gw/U.kRv9.', '2016-06-01 14:37:45', NULL, NULL, 'assets/img/fotos_perfil/hombre5.png', 'creador', '2016-06-01 16:21:21'),
(45, NULL, 'Laura', 'Lunes Domingues', 'creador2@creador2.com', '$2a$07$l1GYa6NxPyM0ob24IMTQvOAD474rqYGAIDhE77SAy9vuHOwglXZGq', '2016-06-01 15:05:39', NULL, NULL, 'assets/img/fotos_perfil/mujer2.png', 'creador', '2016-06-01 16:44:16'),
(46, NULL, 'Caronila', 'Hall Steven', 'realizador1@realizador1.com', '$2a$07$S6GTCTm8nlryuikJTaFv5OjW/MfdNdLzdy2mqokcNNhMnzTthYRIe', '2016-06-01 19:30:07', NULL, NULL, 'ets/img/usuario-foto-perfil.png', 'realizador', '2016-06-01 17:30:07'),
(47, NULL, 'Maria Encina', 'Zapata Dorne', 'realizador2@realizador2.com', '$2a$07$m1zoLD4kRNZFVr3QEMnZduO0ZYZ2bJPCwUX/P8eh2/ehBTSPScwBy', '2016-06-01 19:34:52', NULL, NULL, 'assets/img/fotos_perfil/mujer1.png', 'realizador', '2016-06-01 17:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_categoria`
--

CREATE TABLE IF NOT EXISTS `usuario_categoria` (
  `id_usuario_categoria` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `categoria_id_categoria` smallint(6) NOT NULL,
  `alerta_usuario_categoria` enum('Si','No') NOT NULL DEFAULT 'Si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fk_ciudad_pais1_idx` (`pais_codigo_pais`);

--
-- Indexes for table `ci_sesiones`
--
ALTER TABLE `ci_sesiones`
  ADD KEY `ci_sesiones_timestamp` (`timestamp`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `fk_direccion_ciudad1_idx` (`ciudad_id_ciudad`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_mensaje_usuario1_idx` (`usuario_id_usuario_mensajero`),
  ADD KEY `fk_mensaje_usuario2_idx` (`usuario_id_usuario_receptor`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`codigo_pais`);

--
-- Indexes for table `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `fk_tarea_usuario1_idx` (`usuario_id_usuario_creador`),
  ADD KEY `fk_tarea_direccion1_idx` (`direccion_id_direccion`),
  ADD KEY `fk_tarea_categoria1_idx` (`categoria_id_categoria`);

--
-- Indexes for table `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `fk_trabajo_tarea1_idx` (`tarea_id_tarea`),
  ADD KEY `fk_trabajo_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_direccion1_idx` (`direccion_id_direccion`);

--
-- Indexes for table `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD PRIMARY KEY (`id_usuario_categoria`),
  ADD KEY `fk_usuario_categoria_categoria1_idx` (`categoria_id_categoria`),
  ADD KEY `fk_usuario_categoria_usuario1_idx` (`usuario_id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  MODIFY `id_usuario_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_pais1` FOREIGN KEY (`pais_codigo_pais`) REFERENCES `pais` (`codigo_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_direccion_ciudad1` FOREIGN KEY (`ciudad_id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_usuario1` FOREIGN KEY (`usuario_id_usuario_mensajero`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_usuario2` FOREIGN KEY (`usuario_id_usuario_receptor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_categoria1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarea_direccion1` FOREIGN KEY (`direccion_id_direccion`) REFERENCES `direccion` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarea_usuario1` FOREIGN KEY (`usuario_id_usuario_creador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `fk_trabajo_tarea1` FOREIGN KEY (`tarea_id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabajo_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_direccion1` FOREIGN KEY (`direccion_id_direccion`) REFERENCES `direccion` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD CONSTRAINT `fk_usuario_categoria_categoria1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_categoria_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
