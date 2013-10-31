-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2013 a las 03:35:46
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `areascodigo` char(6) NOT NULL,
  `areasdescripcion` varchar(100) DEFAULT NULL,
  `areasestado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`areascodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`areascodigo`, `areasdescripcion`, `areasestado`) VALUES
('G1', 'Gerencia de Desarrollo Urbano', 'Activo'),
('G2', 'Gerencia de Desarrollo Económico Local', 'Activo'),
('G3', 'Gerencia de Obras Públicas', 'Activo'),
('G4', 'Gerencia de Educación, Cultura, Juventud y Deportes', 'Activo'),
('G5', 'Gerencia de Desarrollo Social', 'Activo'),
('G6', 'Gerencia de Seguridad Ciudadana y Defensa Civil', 'Activo'),
('G7', 'Gerencia de Transporte, Tránsito y Seguridad Vial', 'Activo'),
('G8', 'Gerencia de Sistemas', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `cargocodigo` char(6) NOT NULL,
  `cargodescripcion` varchar(30) DEFAULT NULL,
  `cargoestado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`cargocodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`cargocodigo`, `cargodescripcion`, `cargoestado`) VALUES
('C1', 'Practicante', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `categoriascodigo` char(7) NOT NULL,
  `categoriasdescripcion` varchar(45) DEFAULT NULL,
  `categoriasestado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`categoriascodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoriascodigo`, `categoriasdescripcion`, `categoriasestado`) VALUES
('C1', 'Monitor', 'Activo'),
('C2', 'Impresora', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `departamentocodigo` char(5) NOT NULL,
  `departamentodescripcion` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`departamentocodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamentocodigo`, `departamentodescripcion`) VALUES
('DP1', 'Tumbes'),
('DP2', 'Piura'),
('DP3', 'Lambayeque'),
('DP4', 'La Libertad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleincidencia`
--

CREATE TABLE IF NOT EXISTS `detalleincidencia` (
  `detalleincidenciacodigo` char(5) NOT NULL,
  `detalleincidenciadescripcion` varchar(300) DEFAULT NULL,
  `detalleincidenciaestado` varchar(12) DEFAULT NULL,
  `personalasignado` char(6) NOT NULL,
  PRIMARY KEY (`detalleincidenciacodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE IF NOT EXISTS `distrito` (
  `distritocodigo` char(5) NOT NULL,
  `distritodescripcion` varchar(40) DEFAULT NULL,
  `provinciacodigo` char(5) NOT NULL,
  PRIMARY KEY (`distritocodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`distritocodigo`, `distritodescripcion`, `provinciacodigo`) VALUES
('DT1', 'Trujillo', 'PV1'),
('DT10', 'Simbal', 'PV1'),
('DT11', 'Victor Larco Herrera', 'PV1'),
('DT12', 'Paita', 'PV14'),
('DT13', 'Amotape', 'PV14'),
('DT14', 'Colan', 'PV14'),
('DT15', 'Arenal', 'PV14'),
('DT16', 'La Huaca', 'PV14'),
('DT17', 'Tamarindo', 'PV14'),
('DT18', 'Vichayal', 'PV14'),
('DT2', 'El Provenir', 'PV1'),
('DT3', 'Florencia de Mora', 'PV1'),
('DT4', 'Huanchaco', 'PV1'),
('DT5', 'La Esperanza', 'PV1'),
('DT6', 'Laredo', 'PV1'),
('DT7', 'Moche', 'PV1'),
('DT8', 'Poroto', 'PV1'),
('DT9', 'Salavarry', 'PV1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `incidenciascodigo` char(7) NOT NULL,
  `incidenciasfecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `incidenciasdescripcion` varchar(300) DEFAULT NULL,
  `personalcodigo` char(6) NOT NULL,
  `categoriascodigo` char(7) NOT NULL,
  `incidenciasresultado` varchar(300) DEFAULT NULL,
  `personalasignado` char(6) DEFAULT NULL,
  `incidenciasestado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`incidenciascodigo`),
  KEY `fk_incidencias_personal1` (`personalcodigo`),
  KEY `fk_incidencias_categorias1` (`categoriascodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`incidenciascodigo`, `incidenciasfecha`, `incidenciasdescripcion`, `personalcodigo`, `categoriascodigo`, `incidenciasresultado`, `personalasignado`, `incidenciasestado`) VALUES
('RI1', '2013-07-12 01:25:35', 'La impresora no esta funcionando', 'P2', 'C2', 'a la impresora se le hizo mantenimiento para su funcionamiento                             ', 'P3', 'A'),
('RI2', '2013-07-12 01:28:09', 'El monitor esta fallando no se puede visualizar nada ', 'P2', 'C1', 'al monitor se le hizo mantemiento para su respectivo funcionamiento                 ', 'P3', 'A'),
('RI3', '2013-07-12 02:06:55', 'no se puede imprimir ', 'P1', 'C2', '0', 'P2', 'EP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menucodigo` char(6) NOT NULL,
  `menudescripcion` varchar(100) DEFAULT NULL,
  `menuestado` varchar(12) DEFAULT NULL,
  `perfilcodigo` char(6) NOT NULL,
  PRIMARY KEY (`menucodigo`),
  KEY `fk_menu_perfil1` (`perfilcodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menucodigo`, `menudescripcion`, `menuestado`, `perfilcodigo`) VALUES
('M1', 'Mantenedores', 'Activo', 'PE1'),
('M2', 'Procesos', 'Activo', 'PE1'),
('M3', 'Reportes', 'Activo', 'PE1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `perfilcodigo` char(6) NOT NULL,
  `perfildescripcion` varchar(30) DEFAULT NULL,
  `perfilestado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`perfilcodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`perfilcodigo`, `perfildescripcion`, `perfilestado`) VALUES
('PE1', 'Administrador', 'Activo'),
('PE2', 'Usuario', 'Activo'),
('PE3', 'Sistemas', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `personalcodigo` char(6) NOT NULL,
  `personaldni` char(8) DEFAULT NULL,
  `personalnombres` varchar(30) DEFAULT NULL,
  `personalpaterno` varchar(30) DEFAULT NULL,
  `personalmaterno` varchar(30) DEFAULT NULL,
  `personalsexo` varchar(15) DEFAULT NULL,
  `personalcelular` varchar(9) DEFAULT NULL,
  `personalemail` varchar(30) DEFAULT NULL,
  `personalfechanac` date DEFAULT NULL,
  `personalestadocivil` varchar(15) DEFAULT NULL,
  `personaldireccion` varchar(30) DEFAULT NULL,
  `personalestado` varchar(12) DEFAULT NULL,
  `departamentocodigo` char(5) NOT NULL,
  `provinciacodigo` char(5) NOT NULL,
  `distritocodigo` char(5) NOT NULL,
  `cargocodigo` char(6) NOT NULL,
  `areascodigo` char(6) NOT NULL,
  `subareascodigo` char(7) NOT NULL,
  PRIMARY KEY (`personalcodigo`),
  KEY `fk_personal_departamento1` (`departamentocodigo`),
  KEY `fk_personal_provincia1` (`provinciacodigo`),
  KEY `fk_personal_distrito1` (`distritocodigo`),
  KEY `fk_personal_cargo1` (`cargocodigo`),
  KEY `fk_personal_areas1` (`areascodigo`),
  KEY `fk_personal_subareas1` (`subareascodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`personalcodigo`, `personaldni`, `personalnombres`, `personalpaterno`, `personalmaterno`, `personalsexo`, `personalcelular`, `personalemail`, `personalfechanac`, `personalestadocivil`, `personaldireccion`, `personalestado`, `departamentocodigo`, `provinciacodigo`, `distritocodigo`, `cargocodigo`, `areascodigo`, `subareascodigo`) VALUES
('P1', '48958775', 'Jose Luis', 'Gomez', 'Garcia', 'Masculino', '945869287', 'josegg@hotmail.com', '1988-05-14', 'Soltero', 'Urb. San Ines', 'Activo', 'DP4', 'PV1', 'DT1', 'C1', 'G1', 'SG1'),
('P2', '46769281', 'Carlos Enrique', 'Quineche', 'Chavez', 'Masculino', '978429587', 'carlos.quineche@hotmail.com', '1988-05-12', 'Soltero', 'Urb. San Ines N° 200', 'Activo', 'DP4', 'PV1', 'DT1', 'C1', 'G8', 'SG22'),
('P3', '42958771', 'Julio', 'Sanchez', 'Paredes', 'Masculino', '945869587', 'jsanchespa@hotmail.com', '0000-00-00', 'Casado', 'Urb. San Andres N° ', 'Activo', 'DP4', 'PV1', 'DT1', 'C1', 'G8', 'SG23'),
('P4', '45827896', 'Victor Juilo', 'Manrrique', 'Gonzales', 'Masculino', '945828681', 'victor_mg@hotmail.com', '1988-06-19', 'Soltero', 'Urb. Las quintanas N 204', 'Activo', 'DP4', 'PV1', 'DT1', 'C1', 'G8', 'SG22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `provinciacodigo` char(5) NOT NULL,
  `provinciadescripcion` varchar(45) DEFAULT NULL,
  `departamentocodigo` char(5) NOT NULL,
  PRIMARY KEY (`provinciacodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`provinciacodigo`, `provinciadescripcion`, `departamentocodigo`) VALUES
('PV1', 'Trujillo', 'DP4'),
('PV10', 'Pataz', 'DP4'),
('PV11', 'Sanchez Carrion', 'DP4'),
('PV12', 'Santiago de Chuco', 'DP4'),
('PV13', 'Piura', 'DP2'),
('PV14', 'Paita', 'DP2'),
('PV15', 'Morropon', 'DP2'),
('PV16', 'Ayabaca', 'DP2'),
('PV17', 'Huancabamba', 'DP2'),
('PV18', 'Sechura', 'DP2'),
('PV19', 'Sullana', 'DP2'),
('PV2', 'Ascope', 'DP4'),
('PV20', 'Talara', 'DP2'),
('PV3', 'Bolivar', 'DP4'),
('PV4', 'Chepen', 'DP4'),
('PV5', 'Julcan', 'DP4'),
('PV6', 'Otuzco', 'DP4'),
('PV7', 'Gran Chimu', 'DP4'),
('PV8', 'Viru', 'DP4'),
('PV9', 'Pacasmayo', 'DP4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subareas`
--

CREATE TABLE IF NOT EXISTS `subareas` (
  `subareascodigo` char(7) NOT NULL,
  `subareasdescripcion` varchar(100) DEFAULT NULL,
  `subareasestado` varchar(12) DEFAULT NULL,
  `areascodigo` char(6) NOT NULL,
  PRIMARY KEY (`subareascodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subareas`
--

INSERT INTO `subareas` (`subareascodigo`, `subareasdescripcion`, `subareasestado`, `areascodigo`) VALUES
('SG1', 'Sub Gerencia de Habilitaciones Urbanas', 'Activo', 'G1'),
('SG10', 'Sub Gerencia de Cultura', 'Activo', 'G4'),
('SG11', 'Sub Gerencia de Juventud', 'Activo', 'G4'),
('SG12', 'Sub Gerencia de Deportes', 'Activo', 'G4'),
('SG13', 'División de Biblioteca', 'Activo', 'G4'),
('SG14', 'Sub Gerencia de Salud', 'Activo', 'G5'),
('SG15', 'Sub Gerencia de Programas Alimentarios', 'Activo', 'G5'),
('SG16', 'Sub Gerencia de Participación Vecinal', 'Activo', 'G5'),
('SG17', 'Sub Gerencia de Derechos Humanos', 'Activo', 'G5'),
('SG18', 'Sub Gerencia de Seguridad Ciudadana', 'Activo', 'G6'),
('SG19', 'Sub Gerencia de Defensa Civil', 'Activo', 'G6'),
('SG2', 'Sub Gerencia de Edificaciones', 'Activo', 'G1'),
('SG20', 'Sub Gerencia de Transporte y Tránsito', 'Activo', 'G7'),
('SG21', 'Sub Gerencia de Seguridad Vial', 'Activo', 'G7'),
('SG22', 'Sub Gerencia de Soporte Tecnico', 'Activo', 'G8'),
('SG23', 'Sub Gerencia de Redes y Comunicacion', 'Activo', 'G8'),
('SG24', 'Sub Gerencia de Desarrollo', 'Activo', 'G8'),
('SG3', 'Sub Gerencia de Desarrollo Empresarial', 'Activo', 'G2'),
('SG4', 'Sub Gerencia de Turismo', 'Activo', 'G2'),
('SG5', 'Sub Gerencia de Licencias y Comercialización', 'Activo', 'G2'),
('SG6', 'Sub Gerencia de Proyectos', 'Activo', 'G3'),
('SG7', 'Sub Gerencia de Obras', 'Activo', 'G3'),
('SG8', 'Sub Gerencia de Supervisión y Liquidación de Obras', 'Activo', 'G3'),
('SG9', 'Sub Gerencia de Educación', 'Activo', 'G4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `submenucodigo` char(6) NOT NULL,
  `submenudescripcion` varchar(100) DEFAULT NULL,
  `submenuestado` varchar(12) DEFAULT NULL,
  `menucodigo` char(6) NOT NULL,
  PRIMARY KEY (`submenucodigo`),
  KEY `fk_submenu_menu1` (`menucodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`submenucodigo`, `submenudescripcion`, `submenuestado`, `menucodigo`) VALUES
('SM1', 'Areas', 'Activo', 'M1'),
('SM2', 'SubAreas', 'Activo', 'M1'),
('SM3', 'Personal', 'Activo', 'M1'),
('SM4', 'Usuarios', 'Activo', 'M1'),
('SM5', 'Categorias', 'Activo', 'M1'),
('SM6', 'Registrar Incidencia', 'Activo', 'M2'),
('SM7', 'Asginar Incidencia', 'Activo', 'M2'),
('SM8', 'Atender Incidencia', 'Activo', 'M2'),
('SM9', 'Consultar', 'Activo', 'M3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuariocodigo` char(6) NOT NULL,
  `usuariouser` varchar(30) DEFAULT NULL,
  `usuariopass` varchar(30) DEFAULT NULL,
  `usuarioestado` varchar(12) DEFAULT NULL,
  `personalcodigo` char(6) NOT NULL,
  `perfilcodigo` char(6) NOT NULL,
  PRIMARY KEY (`usuariocodigo`),
  KEY `fk_usuario_personal1` (`personalcodigo`),
  KEY `fk_usuario_perfil1` (`perfilcodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuariocodigo`, `usuariouser`, `usuariopass`, `usuarioestado`, `personalcodigo`, `perfilcodigo`) VALUES
('U1', 'jgomez', '159357', 'Activo', 'P1', 'PE2'),
('U2', 'cquineche', 'admin2015', 'Activo', 'P2', 'PE1'),
('U3', 'jsanchezp', '123456', 'Activo', 'P3', 'PE3');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `fk_incidencias_categorias1` FOREIGN KEY (`categoriascodigo`) REFERENCES `categorias` (`categoriascodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incidencias_personal1` FOREIGN KEY (`personalcodigo`) REFERENCES `personal` (`personalcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_perfil1` FOREIGN KEY (`perfilcodigo`) REFERENCES `perfil` (`perfilcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_areas1` FOREIGN KEY (`areascodigo`) REFERENCES `areas` (`areascodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_cargo1` FOREIGN KEY (`cargocodigo`) REFERENCES `cargo` (`cargocodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_departamento1` FOREIGN KEY (`departamentocodigo`) REFERENCES `departamento` (`departamentocodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_distrito1` FOREIGN KEY (`distritocodigo`) REFERENCES `distrito` (`distritocodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_provincia1` FOREIGN KEY (`provinciacodigo`) REFERENCES `provincia` (`provinciacodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_subareas1` FOREIGN KEY (`subareascodigo`) REFERENCES `subareas` (`subareascodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `fk_submenu_menu1` FOREIGN KEY (`menucodigo`) REFERENCES `menu` (`menucodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`perfilcodigo`) REFERENCES `perfil` (`perfilcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_personal1` FOREIGN KEY (`personalcodigo`) REFERENCES `personal` (`personalcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
