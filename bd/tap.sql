-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.12-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para bd_sgcma
CREATE DATABASE IF NOT EXISTS `bd_sgcma` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_sgcma`;


-- Volcando estructura para tabla bd_sgcma.album
CREATE TABLE IF NOT EXISTS `album` (
  `codAlbum` char(9) NOT NULL,
  `nombAlbum` varchar(255) DEFAULT NULL,
  `fechaGrabacion` datetime DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.album: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`codAlbum`, `nombAlbum`, `fechaGrabacion`, `link`) VALUES
	('1', 'Album 1', '2014-10-30 21:32:11', 'link de nuevo album');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.articulo
CREATE TABLE IF NOT EXISTS `articulo` (
  `codArticulo` char(9) NOT NULL,
  `nombArticulo` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT '1',
  `precio` decimal(10,2) DEFAULT NULL,
  `tipoarticulo_id` char(9) DEFAULT NULL,
  `igv_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codArticulo`),
  KEY `fk_tipoarticulo_id_codTipoArticulo` (`tipoarticulo_id`),
  KEY `fk_igv_id_codIgv` (`igv_id`),
  CONSTRAINT `fk_igv_id_codIgv` FOREIGN KEY (`igv_id`) REFERENCES `igv` (`codIGV`),
  CONSTRAINT `fk_tipoarticulo_id_codTipoArticulo` FOREIGN KEY (`tipoarticulo_id`) REFERENCES `tipo_articulo` (`codTipoArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.articulo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` (`codArticulo`, `nombArticulo`, `descripcion`, `activo`, `precio`, `tipoarticulo_id`, `igv_id`, `created_at`, `updated_at`) VALUES
	('737148b34', 'Polo Azul', 'Polito Azul de algodon', 1, 21.00, '1', 1, '2015-01-03 06:46:39', '2015-01-03 06:46:39'),
	('9ce90b218', 'Yellow T-Shirt', 'wwwwwwwwwwwww', 1, 21.00, '1', 1, '2014-11-16 17:46:33', '2014-11-16 17:46:33');
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.articulo_imagen
CREATE TABLE IF NOT EXISTS `articulo_imagen` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `articulo_id` char(9) DEFAULT NULL,
  `imagen_id` char(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagen_id_codImagen` (`imagen_id`),
  KEY `fk_articulo_id_codArticulo` (`articulo_id`),
  CONSTRAINT `fk_articulo_id_codArticulo` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`codArticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_imagen_id_codImagen` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`codImagen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.articulo_imagen: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `articulo_imagen` DISABLE KEYS */;
INSERT INTO `articulo_imagen` (`id`, `articulo_id`, `imagen_id`) VALUES
	(28, '9ce90b218', '14c02a'),
	(29, '737148b34', '49ace4af5ae1');
/*!40000 ALTER TABLE `articulo_imagen` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.cancion
CREATE TABLE IF NOT EXISTS `cancion` (
  `codCancion` char(9) NOT NULL,
  `nombCancion` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `descripcion` text,
  `cancion_archivo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codCancion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.cancion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cancion` DISABLE KEYS */;
INSERT INTO `cancion` (`codCancion`, `nombCancion`, `fecha`, `activo`, `descripcion`, `cancion_archivo`, `created_at`, `updated_at`) VALUES
	('0d22a48a3', 'Heaven W', '2098-09-13', 0, '<p><strong>To much heaven</strong></p>\r\n', '/TAP/tap/public/musica/Warrant - heaven.mp3', '2014-11-01 22:42:59', '2014-11-25 02:29:00'),
	('28b18a35f', 'Canción de prueba', '2015-01-17', 1, '<p>cccccccccccccccccccccc</p>\r\n', '/TAP/tap/public/musica/ACDC - Back In Black.mp3', '2015-01-03 06:48:07', '2015-01-03 06:48:07'),
	('66b1579a0', 'asdasdsd', '2013-11-05', 0, 'ssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '/TAP/tap/public/musica/ACDC - BLACK ICE.mp3', '2014-11-01 22:56:13', '2014-11-25 02:29:03'),
	('9a79ce592', 'llllllllllll', '2029-09-07', 1, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjkjjjjjjjjjjjjjjjjjjjjj', '/TAP/tap/public/musica/Bacilos - Caraluna.mp3', '2014-11-04 02:06:20', '2014-11-13 21:06:35');
/*!40000 ALTER TABLE `cancion` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.cancionxalbum
CREATE TABLE IF NOT EXISTS `cancionxalbum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cancion_id` char(9) DEFAULT NULL,
  `album_id` char(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cancion_id_codCancion` (`cancion_id`),
  KEY `fk_album_id_codAlbum` (`album_id`),
  CONSTRAINT `fk_album_id_codAlbum` FOREIGN KEY (`album_id`) REFERENCES `album` (`codAlbum`),
  CONSTRAINT `fk_cancion_id_codCancion` FOREIGN KEY (`cancion_id`) REFERENCES `cancion` (`codCancion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.cancionxalbum: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cancionxalbum` DISABLE KEYS */;
/*!40000 ALTER TABLE `cancionxalbum` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `codCliente` char(9) NOT NULL DEFAULT '',
  `razonSocial` varchar(150) DEFAULT NULL,
  `representante` varchar(150) DEFAULT NULL,
  `dniRepresentante` varchar(8) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`codCliente`, `razonSocial`, `representante`, `dniRepresentante`, `direccion`, `ruc`, `telefono`) VALUES
	('111qqq111', 'Iguana Producciones', 'Pamela Sanchez', '21221255', 'Av Javier Prado Este 2100', '10212212551', '911998822'),
	('123qwe123', 'Eventos IRL', 'Jorge Ruiz', '71704944', 'Av arequipa 321', '10717049441', '998877669');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `codContrato` char(9) NOT NULL,
  `evento_id` char(9) DEFAULT NULL,
  `cliente_id` char(9) DEFAULT NULL,
  `fechaPresentacion` datetime DEFAULT NULL,
  `horaPresentacion` varchar(5) DEFAULT NULL,
  `cantidadHoras` varchar(50) DEFAULT NULL,
  `cantDias` int(11) DEFAULT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`codContrato`),
  KEY `FK_CONTRATO_EVENTO` (`evento_id`),
  KEY `fk_cliente_id_codCliente` (`cliente_id`),
  CONSTRAINT `fk_cliente_id_codCliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`codCliente`),
  CONSTRAINT `FK_CONTRATO_EVENTO` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`codEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.contrato: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` (`codContrato`, `evento_id`, `cliente_id`, `fechaPresentacion`, `horaPresentacion`, `cantidadHoras`, `cantDias`, `monto`, `descripcion`) VALUES
	('2605b9b62', 'a984231f2', '123qwe123', '2014-12-28 00:00:00', '15:15', '3', 2, 2000.00, 'El evento es para promover algo'),
	('813a2d7', '926e06cc9', '111qqq111', '2014-11-06 00:00:00', '15:15', '14', 3, 1212.00, 'deeeeeeeeeeeeeeeeeeeeeeee');
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.contratoxsingle
CREATE TABLE IF NOT EXISTS `contratoxsingle` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `codContrato` char(9) NOT NULL DEFAULT '0',
  `codCancion` char(9) NOT NULL DEFAULT '0',
  `fechaFirmaContrato` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `fk_codContrato_codContrato` (`codContrato`),
  KEY `fk_codSingle_codSingle` (`codCancion`),
  CONSTRAINT `fk_codContrato_codContrato` FOREIGN KEY (`codContrato`) REFERENCES `contrato` (`codContrato`),
  CONSTRAINT `fk_codSingle_codSingle` FOREIGN KEY (`codCancion`) REFERENCES `cancion` (`codCancion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.contratoxsingle: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `contratoxsingle` DISABLE KEYS */;
INSERT INTO `contratoxsingle` (`id`, `codContrato`, `codCancion`, `fechaFirmaContrato`) VALUES
	(4, '2605b9b62', '0d22a48a3', '2014-11-05'),
	(5, '2605b9b62', '66b1579a0', '2014-11-05'),
	(6, '2605b9b62', '9a79ce592', '2014-11-05'),
	(7, '813a2d7', '0d22a48a3', '2014-11-13'),
	(8, '813a2d7', '66b1579a0', '2014-11-13'),
	(9, '813a2d7', '9a79ce592', '2014-11-13');
/*!40000 ALTER TABLE `contratoxsingle` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `codDepartamento` int(11) NOT NULL,
  `codPais` int(11) DEFAULT NULL,
  `nombDepartamento` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codDepartamento`),
  KEY `FK_DEPARTAMENTO_PAIS` (`codPais`),
  CONSTRAINT `FK_DEPARTAMENTO_PAIS` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.departamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`codDepartamento`, `codPais`, `nombDepartamento`, `descripcion`) VALUES
	(1, 1, 'Lima', 'Capital');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.distrito
CREATE TABLE IF NOT EXISTS `distrito` (
  `codDistrito` int(11) NOT NULL,
  `nombDistrito` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `codProvincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`codDistrito`),
  KEY `FK_DISTRITO_PROVINCIA` (`codProvincia`),
  CONSTRAINT `FK_DISTRITO_PROVINCIA` FOREIGN KEY (`codProvincia`) REFERENCES `provincia` (`codProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.distrito: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` (`codDistrito`, `nombDistrito`, `descripcion`, `codProvincia`) VALUES
	(1, 'Surco', 'un distrito', 1);
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.establecimiento
CREATE TABLE IF NOT EXISTS `establecimiento` (
  `codEstablecimiento` char(9) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `capacidadAsistencia` int(7) DEFAULT NULL,
  `nombEstablecimiento` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `codDistrito` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codEstablecimiento`),
  KEY `FK_ESTABLECIMIENTO_DISTRITO` (`codDistrito`),
  CONSTRAINT `FK_ESTABLECIMIENTO_DISTRITO` FOREIGN KEY (`codDistrito`) REFERENCES `distrito` (`codDistrito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.establecimiento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `establecimiento` DISABLE KEYS */;
INSERT INTO `establecimiento` (`codEstablecimiento`, `descripcion`, `capacidadAsistencia`, `nombEstablecimiento`, `direccion`, `codDistrito`, `created_at`, `updated_at`, `latitud`, `longitud`) VALUES
	('1', 'Discoteca Bar', 200, 'DiskoBar', 'Av Caminos del Inca 111', 1, NULL, '2015-01-04 02:47:17', '-12.140625972363933', '-76.9921875'),
	('490787cd0', 'asdasdasdasdasd', 333, 'DiscoBar', 'aaaaaaaaaaaaaa', 1, '2015-01-04 02:40:57', '2015-01-04 02:47:28', '-12.143646752317258', '-76.99115753173828');
/*!40000 ALTER TABLE `establecimiento` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `codEvento` char(9) NOT NULL,
  `nombEvento` varchar(100) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `fechaEvento` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `establecimiento_id` char(9) DEFAULT NULL,
  `horaEvento` varchar(5) DEFAULT NULL,
  `tipoevento_id` char(9) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`codEvento`),
  KEY `fk_idTipoEvento_idTipoEvento` (`tipoevento_id`),
  KEY `FK2_establecimiento_id_codEstablecimiento` (`establecimiento_id`),
  CONSTRAINT `FK2_establecimiento_id_codEstablecimiento` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`codEstablecimiento`),
  CONSTRAINT `fk_idTipoEvento_idTipoEvento` FOREIGN KEY (`tipoevento_id`) REFERENCES `tipo_evento` (`idTipoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.evento: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` (`codEvento`, `nombEvento`, `descripcion`, `fechaEvento`, `activo`, `establecimiento_id`, `horaEvento`, `tipoevento_id`, `created_at`, `updated_at`) VALUES
	('926e06cc9', 'Entrevista radio rpp', 'a las 8 pm en punto', '2014-11-05', 0, '1', '22:00', '1', '2015-01-02 23:58:53', '0000-00-00 00:00:00'),
	('9f37e8b1e', 'wwwwwwwwwwwwwwwwww', 'fffff', '2015-01-01', 1, '490787cd0', '01:15', '1', '2015-01-04 01:19:55', '0000-00-00 00:00:00'),
	('a984231f2', 'Evento Privado', 'Es un evento privado', '2014-10-31', 1, '1', '18:45', '1', '2014-11-16 23:02:27', '0000-00-00 00:00:00'),
	('e8d818414', 'sssssssssssssss', NULL, '2015-01-03', 1, '1', NULL, '2', '2015-01-03 23:39:07', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `codGaleria` char(9) NOT NULL,
  `nombGaleria` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codGaleria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.galeria: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` (`codGaleria`, `nombGaleria`, `fecha`, `descripcion`, `updated_at`, `created_at`) VALUES
	('056294671', 'Tienda 2', '2014-11-08', 'ssssssssssssssssssssssssss', '2014-11-17 05:25:02', '2014-11-17 05:25:02'),
	('37beb40b4', 'Forever 21', '2014-11-13', 'ropapoapaoapoaapoapaoa', '2014-11-17 04:24:30', '2014-11-17 04:24:30'),
	('da9761e53', 'sssssssssss', '2013-10-26', 'eeeeeeeeeeeeeeeeeeeeeeeeeeee', '2014-11-17 05:26:46', '2014-11-17 05:26:46');
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.galeria_imagen
CREATE TABLE IF NOT EXISTS `galeria_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_id` char(12) DEFAULT '0',
  `galeria_id` char(9) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_IG_imagen` (`imagen_id`),
  KEY `FK_IG_galeria` (`galeria_id`),
  CONSTRAINT `FK_IG_galeria` FOREIGN KEY (`galeria_id`) REFERENCES `galeria` (`codGaleria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_IG_imagen` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`codImagen`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.galeria_imagen: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `galeria_imagen` DISABLE KEYS */;
INSERT INTO `galeria_imagen` (`id`, `imagen_id`, `galeria_id`) VALUES
	(1, '14c02a', '37beb40b4'),
	(2, '492df977cdca', '37beb40b4'),
	(3, '49ace4af5ae1', '37beb40b4'),
	(4, '7c940dc5ad', '056294671'),
	(5, 'a769234adf4d', '056294671'),
	(6, 'aba4b1be01e7', '056294671'),
	(7, 'e5e4ed98ecee', '056294671'),
	(12, '66e9074226e3', 'da9761e53'),
	(13, '7c940dc5ad', 'da9761e53'),
	(16, '9f11c67d3999', 'da9761e53');
/*!40000 ALTER TABLE `galeria_imagen` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.igv
CREATE TABLE IF NOT EXISTS `igv` (
  `codIGV` tinyint(4) NOT NULL,
  `IGV` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codIGV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.igv: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `igv` DISABLE KEYS */;
INSERT INTO `igv` (`codIGV`, `IGV`, `created_at`, `updated_at`) VALUES
	(1, 0.18, NULL, NULL);
/*!40000 ALTER TABLE `igv` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.imagen
CREATE TABLE IF NOT EXISTS `imagen` (
  `codImagen` char(12) NOT NULL,
  `tipoimagen_id` int(11) NOT NULL,
  `imagen_archivo` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codImagen`),
  KEY `FK_imagen_tipoimagen` (`tipoimagen_id`),
  CONSTRAINT `FK_imagen_tipoimagen` FOREIGN KEY (`tipoimagen_id`) REFERENCES `tipoimagen` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.imagen: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
INSERT INTO `imagen` (`codImagen`, `tipoimagen_id`, `imagen_archivo`, `created_at`, `updated_at`) VALUES
	('14c02a', 3, '2LixrTBzlomvbQ7.jpg', '2014-11-16 17:45:10', '2014-11-16 17:45:10'),
	('492df977cdca', 3, 'JuY4PrurD4v4vot.jpg', '2014-11-16 17:45:10', '2014-11-16 17:45:10'),
	('49ace4af5ae1', 3, 'QiJQTx7lqQYuBE4.jpg', '2014-11-16 17:45:10', '2014-11-16 17:45:10'),
	('66e9074226e3', 4, '5NEoyBle6YtyTls.jpg', '2014-11-16 17:58:36', '2014-11-16 17:58:36'),
	('67f506ff69ac', 2, 'CbjXaPilF5frjsH.jpg', '2014-11-16 15:52:09', '2014-11-16 15:52:09'),
	('721a484cb09d', 4, '5aZZDw6iKEnSbD2.jpg', '2014-11-16 17:55:56', '2014-11-16 17:55:56'),
	('7c940dc5ad', 1, 'TvLcSbEJprh34lx.jpg', '2014-11-16 15:51:45', '2014-11-16 15:51:45'),
	('93eb910f348b', 1, '7vLcldttAqQLQk6.jpg', '2014-11-16 17:55:44', '2014-11-16 17:55:44'),
	('974cb04bd395', 5, 'FXTUU5xG4G4Em0a.jpg', '2014-11-21 09:52:55', '2014-11-21 09:52:55'),
	('9f11c67d3999', 6, 'qM4kzkGm0BAYlLS.jpg', '2014-11-25 16:55:48', '2014-11-25 16:55:48'),
	('a65f081ad153', 6, '9wrmUExnh69axbu.jpg', '2014-11-25 16:51:47', '2014-11-25 16:51:47'),
	('a769234adf4d', 3, 'r2dEzotSpFjh6aC.jpg', '2014-11-16 17:45:00', '2014-11-16 17:45:00'),
	('aba4b1be01e7', 3, 'P33lA2m1w5OvFQG.jpg', '2014-11-16 17:45:10', '2014-11-16 17:45:10'),
	('bf17c8e5d1e', 6, 'U03JXUqFaHfXj00.jpg', '2014-11-25 16:51:53', '2014-11-25 16:51:53'),
	('c5fe7c8604a7', 6, 'lxGxPf2e7tkvqmg.jpg', '2014-11-25 16:43:28', '2014-11-25 16:43:28'),
	('d707a539ccbe', 6, 'dJr4XZSP8Xv2Qmn.jpg', '2014-11-25 16:43:35', '2014-11-25 16:43:35'),
	('e5e4ed98ecee', 2, 'goxY3U4NxWt0HEQ.jpg', '2014-11-16 15:57:34', '2014-11-16 15:57:34');
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.imagen_noticia
CREATE TABLE IF NOT EXISTS `imagen_noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_id` char(9) NOT NULL,
  `imagen_id` char(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkni_imagen_id_codImagen` (`imagen_id`),
  KEY `fkni_noticia_id_codNoticia` (`noticia_id`),
  CONSTRAINT `fkni_imagen_id_codImagen` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`codImagen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkni_noticia_id_codNoticia` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`codNoticia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.imagen_noticia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `imagen_noticia` DISABLE KEYS */;
INSERT INTO `imagen_noticia` (`id`, `noticia_id`, `imagen_id`) VALUES
	(4, '5b508b847', '67f506ff69ac');
/*!40000 ALTER TABLE `imagen_noticia` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.modulo
CREATE TABLE IF NOT EXISTS `modulo` (
  `codModulo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codModuloPadre` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`codModulo`),
  KEY `FK_Modulo_ModuloPadre` (`codModuloPadre`),
  CONSTRAINT `FK_Modulo_ModuloPadre` FOREIGN KEY (`codModuloPadre`) REFERENCES `modulopadre` (`codModuloPadre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.modulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.modulopadre
CREATE TABLE IF NOT EXISTS `modulopadre` (
  `codModuloPadre` int(11) NOT NULL,
  `nombreExterno` varchar(150) DEFAULT NULL,
  `nombreInterno` varchar(150) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `iconoCss` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codModuloPadre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.modulopadre: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `modulopadre` DISABLE KEYS */;
INSERT INTO `modulopadre` (`codModuloPadre`, `nombreExterno`, `nombreInterno`, `descripcion`, `iconoCss`, `created_at`, `updated_at`) VALUES
	(1, 'Noticia', 'Gestionar Noticia', 'Gestion de las Noticias', 'icon-tag', NULL, NULL),
	(2, 'Video', 'Gestionar Video', 'Gestion de los Videos', 'icon-film', NULL, NULL),
	(3, 'Image', 'Gestionar Image', 'Gestion de las Imagenes', 'icon-picture', NULL, NULL),
	(4, 'Cancio', 'Gestionar Cancio', 'Gestion de Cancio', 'icon-headphones', NULL, NULL),
	(5, 'Articulo', 'Gestionar Articulo', 'Gestion de Articulo', 'icon-shopping-cart', NULL, NULL),
	(6, 'Contrato', 'Gestionar Contrato', 'Gestion del Contrato de Artista', 'icon-file', NULL, NULL),
	(7, 'Evento', 'Gestionar Evento', 'Gestion de Evento a realizarse', 'icon-star', NULL, NULL),
	(8, 'Agenda', 'Gestionar Agenda', 'Gestion de Agenda de artista', 'icon-calendar', NULL, NULL);
/*!40000 ALTER TABLE `modulopadre` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.modulopadrexperfil
CREATE TABLE IF NOT EXISTS `modulopadrexperfil` (
  `codPerfil` int(11) DEFAULT NULL,
  `codModuloPadre` int(11) DEFAULT NULL,
  KEY `FK_ModuloPadreXPerfil_ModuloPadre` (`codModuloPadre`),
  KEY `FK_ModuloPadreXPerfil_Perfil` (`codPerfil`),
  CONSTRAINT `FK_ModuloPadreXPerfil_ModuloPadre` FOREIGN KEY (`codModuloPadre`) REFERENCES `modulopadre` (`codModuloPadre`),
  CONSTRAINT `FK_ModuloPadreXPerfil_Perfil` FOREIGN KEY (`codPerfil`) REFERENCES `perfil` (`codPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.modulopadrexperfil: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modulopadrexperfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulopadrexperfil` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.noticia
CREATE TABLE IF NOT EXISTS `noticia` (
  `codNoticia` char(9) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `breveDescripcion` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.noticia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` (`codNoticia`, `titulo`, `descripcion`, `breveDescripcion`, `fecha`, `activo`, `created_at`, `updated_at`) VALUES
	('5b508b847', 'ssssssssss', '<p>sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p>\r\n', 'adasdasdasdasdasdsad', '2020-01-01', NULL, '2014-11-16 16:11:05', '2014-11-16 16:11:05');
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `codPais` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nombPais` varchar(50) DEFAULT NULL,
  `codigoPostal` char(4) DEFAULT NULL,
  PRIMARY KEY (`codPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.pais: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`codPais`, `descripcion`, `nombPais`, `codigoPostal`) VALUES
	(1, 'Peru', 'Peru', '0051');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `codPerfil` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.perfil: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`codPerfil`, `descripcion`) VALUES
	(1, 'Admin'),
	(2, 'Fan');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.provincia
CREATE TABLE IF NOT EXISTS `provincia` (
  `codProvincia` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `nombProvincia` varchar(50) DEFAULT NULL,
  `codDepartamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`codProvincia`),
  KEY `FK_PROVINCIA_DEPARTAMENTO` (`codDepartamento`),
  CONSTRAINT `FK_PROVINCIA_DEPARTAMENTO` FOREIGN KEY (`codDepartamento`) REFERENCES `departamento` (`codDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.provincia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` (`codProvincia`, `descripcion`, `nombProvincia`, `codDepartamento`) VALUES
	(1, 'adasdsad', 'Lima', 1);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `codTema` char(14) NOT NULL,
  `user_id` char(14) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `tema_id` char(14) DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`codTema`),
  KEY `FK_tema_user` (`user_id`),
  KEY `fk_tema_respuesta` (`tema_id`),
  CONSTRAINT `fk_tema_respuesta` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`codTema`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tema_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.tema: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` (`codTema`, `user_id`, `titulo`, `tema_id`, `descripcion`, `created_at`, `updated_at`) VALUES
	('123456', '4d31124f01e', 'Nuevo tema', NULL, 'adasdadas', '2014-11-21 00:18:52', '0000-00-00 00:00:00'),
	('2222', 'f59c0f8f0b', NULL, '4444444', 'esta es una respuesta', '2014-11-21 02:10:20', '0000-00-00 00:00:00'),
	('29a3a5501', 'ce115002fece2f', NULL, '9d82c9cc2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, odit, ex, quasi quos labore nisi aut consectetur libero dolor minima natus doloribus amet accusamus asperiores sunt? Illum minus rerum expedita.</p>\r\n', '2014-11-21 16:33:11', '2014-11-21 16:33:11'),
	('4444444', '4d31124f01e', 'asdasdsdasd', NULL, 'ddddddddddddddddddd', '2014-11-21 00:22:12', '0000-00-00 00:00:00'),
	('5b4d3967b', '4d31124f01e', NULL, '4444444', '<p>Esta es una nueva respuesta</p>\r\n', '2014-11-21 07:37:51', '2014-11-21 07:37:51'),
	('9d82c9cc2', 'ce115002fece2f', 'Nuevo tema', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, laboriosam, consequatur, magnam ipsum voluptates autem iure quibusdam laborum eius vel asperiores repellendus voluptatem saepe accusamus iusto corporis assumenda quisquam sed.</p>\r\n', '2014-11-21 16:31:22', '2014-11-21 16:31:22');
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.tipoimagen
CREATE TABLE IF NOT EXISTS `tipoimagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.tipoimagen: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoimagen` DISABLE KEYS */;
INSERT INTO `tipoimagen` (`id`, `nombre`) VALUES
	(1, 'Tipo Evento'),
	(2, 'Tipo Noticia'),
	(3, 'Tipo Articulo'),
	(4, 'Tipo Slider'),
	(5, 'Tipo Avatar'),
	(6, 'Tipo Galería');
/*!40000 ALTER TABLE `tipoimagen` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.tipo_articulo
CREATE TABLE IF NOT EXISTS `tipo_articulo` (
  `codTipoArticulo` char(9) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codTipoArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.tipo_articulo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_articulo` DISABLE KEYS */;
INSERT INTO `tipo_articulo` (`codTipoArticulo`, `descripcion`) VALUES
	('1', 'VESTIMENTA'),
	('2', 'RECUERDO'),
	('3', 'DISCO');
/*!40000 ALTER TABLE `tipo_articulo` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.tipo_documento_identidad
CREATE TABLE IF NOT EXISTS `tipo_documento_identidad` (
  `codTipoDoc` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codTipoDoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.tipo_documento_identidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento_identidad` DISABLE KEYS */;
INSERT INTO `tipo_documento_identidad` (`codTipoDoc`, `descripcion`) VALUES
	(1, 'DNI');
/*!40000 ALTER TABLE `tipo_documento_identidad` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.tipo_evento
CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `idTipoEvento` char(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTipoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.tipo_evento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */;
INSERT INTO `tipo_evento` (`idTipoEvento`, `nombre`, `descripcion`) VALUES
	('1', 'Privado', NULL),
	('2', 'Publico', NULL);
/*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(14) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `docIdentidad` char(10) DEFAULT NULL,
  `imagen_id` char(12) DEFAULT NULL,
  `codTipoDoc` int(11) DEFAULT NULL,
  `codPerfil` int(11) DEFAULT NULL,
  `codDistrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_Usuario_Perfil` (`codPerfil`),
  KEY `FK_Usuario_TIPO_DOCUMENTO_IDENTIDAD` (`codTipoDoc`),
  KEY `FK3_usuario_imagen` (`imagen_id`),
  CONSTRAINT `FK3_usuario_imagen` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`codImagen`),
  CONSTRAINT `FK_Usuario_Perfil` FOREIGN KEY (`codPerfil`) REFERENCES `perfil` (`codPerfil`),
  CONSTRAINT `FK_Usuario_TIPO_DOCUMENTO_IDENTIDAD` FOREIGN KEY (`codTipoDoc`) REFERENCES `tipo_documento_identidad` (`codTipoDoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `nombre`, `apellidoP`, `apellidoM`, `sexo`, `fechaNacimiento`, `email`, `telefono`, `direccion`, `docIdentidad`, `imagen_id`, `codTipoDoc`, `codPerfil`, `codDistrito`) VALUES
	('1', 'Admin', '$2y$10$JhbhPZLVg5cQCDkHp.Drv.gm5cS6jM5Cdrye6rYU9ah7ruluzoRKq', '2014-10-27 04:42:15', '2014-10-27 04:42:15', 'Luisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL),
	('4d31124f01e', 'maria@hotmail.com', '123456', '2014-11-18 16:47:42', '2014-11-21 09:52:55', 'Marias', 'Lopes', 'Perez', 'f', '1992-11-22', 'maria@hotmail.com', '999888777', '09876543', '09876543', '974cb04bd395', 1, 2, NULL),
	('ce115002fece2f', 'rosa@hotmail.com', '$2y$10$53QInB/8aTU2rqvkNfuSSe3Bf19mVSfCR7o8gjWRPtsS4ldsJ1Fna', '2014-11-21 16:29:43', '2014-11-21 16:29:43', NULL, NULL, NULL, NULL, NULL, 'rosa@hotmail.com', NULL, NULL, NULL, NULL, 1, 2, NULL),
	('f59c0f8f0b', 'renatos@hotmail.com', '$2y$10$8BV27LrLhiMA47jOQ609PeeF7tpadxeIf5lC5FeDdH1Vp6B2Kj8pe', '2014-11-18 16:40:03', '2014-11-18 16:40:03', NULL, NULL, NULL, NULL, NULL, 'renatos@hotmail.com', NULL, NULL, NULL, NULL, 1, 2, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.users_imagen
CREATE TABLE IF NOT EXISTS `users_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` char(14) DEFAULT '0',
  `imagen_id` char(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_xuserimagen` (`imagen_id`),
  KEY `FK_users` (`users_id`),
  CONSTRAINT `FK_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_xuserimagen` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`codImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.users_imagen: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users_imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_imagen` ENABLE KEYS */;


-- Volcando estructura para tabla bd_sgcma.video
CREATE TABLE IF NOT EXISTS `video` (
  `codVideo` char(9) NOT NULL,
  `anio` char(4) DEFAULT NULL,
  `mes` char(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `nombVideo` varchar(150) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`codVideo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sgcma.video: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`codVideo`, `anio`, `mes`, `fecha`, `link`, `activo`, `descripcion`, `nombVideo`, `fechaRegistro`) VALUES
	('123qwe123', NULL, NULL, '2014-11-13', '1FlEfrkbjm8', NULL, 'Hace mucho - Presentación 2014 L', 'Hace mucho', '2014-11-13 16:14:08');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
