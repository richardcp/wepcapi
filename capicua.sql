-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para gestor_descargas
CREATE DATABASE IF NOT EXISTS `gestor_descargas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gestor_descargas`;

-- Volcando estructura para tabla gestor_descargas.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `idcontacto` int(11) NOT NULL,
  PRIMARY KEY (`idalumno`,`idcontacto`),
  KEY `fk_alumnos_contactos1_idx` (`idcontacto`),
  CONSTRAINT `fk_alumnos_contactos1` FOREIGN KEY (`idcontacto`) REFERENCES `contactos` (`idcontacto`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.alumnos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `posicion` varchar(45) NOT NULL,
  `orden` int(11) NOT NULL,
  `imagen` varchar(80) NOT NULL,
  `target` varchar(45) NOT NULL,
  `visible` int(11) NOT NULL,
  `fecha_add` datetime NOT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.banners: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion_corta` mediumtext,
  `descripcion_detallada` longtext,
  `id_categoria_blog` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `target` varchar(45) NOT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  `fecha_add` datetime NOT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_categoria_blog1_idx` (`id_categoria_blog`),
  CONSTRAINT `fk_blog_categoria_blog1` FOREIGN KEY (`id_categoria_blog`) REFERENCES `categoria_blog` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.blog: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
REPLACE INTO `blog` (`id`, `nombre`, `descripcion_corta`, `descripcion_detallada`, `id_categoria_blog`, `visible`, `target`, `imagen`, `fecha_add`, `fecha_upd`) VALUES
	(1, 'jhkjhkjhkjhkh', 'hkjhkjhkh', 'kjhkjhjh\r\nkhkjhjkhk\r\nmmmm', 1, 0, '_blank', '', '2019-02-17 21:15:22', NULL);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `descripcion_corta` longtext,
  `descripcion_detallada` longtext,
  `visible` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha_add` datetime DEFAULT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla gestor_descargas.categorias: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
REPLACE INTO `categorias` (`id`, `nombre`, `id_padre`, `descripcion_corta`, `descripcion_detallada`, `visible`, `imagen`, `fecha_add`, `fecha_upd`) VALUES
	(7, 'Prinipal', NULL, NULL, NULL, 'S', '', NULL, NULL),
	(8, 'Electronicos', 7, '                    ', '', 'S', '', '2019-02-17 21:44:28', '2019-02-17 21:45:03');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.categoria_blog
CREATE TABLE IF NOT EXISTS `categoria_blog` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.categoria_blog: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_blog` DISABLE KEYS */;
REPLACE INTO `categoria_blog` (`id`, `nombre`) VALUES
	(1, 'Inicio');
/*!40000 ALTER TABLE `categoria_blog` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.categoria_cms
CREATE TABLE IF NOT EXISTS `categoria_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.categoria_cms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_cms` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_cms` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.cms
CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria_cms` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion_corta` mediumtext,
  `descripcion_detallada` longtext,
  `visible` int(11) NOT NULL,
  `target` varchar(45) NOT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  `fecha_add` datetime NOT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cms_categoria_cms1_idx` (`id_categoria_cms`),
  CONSTRAINT `fk_cms_categoria_cms1` FOREIGN KEY (`id_categoria_cms`) REFERENCES `categoria_cms` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.cms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `idtipo_document` int(11) NOT NULL,
  `nro_documento` varchar(45) DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `watsapp` varchar(60) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idcontacto`),
  KEY `fk_contactos_tipo_documento_idx` (`idtipo_document`),
  CONSTRAINT `fk_contactos_tipo_documento` FOREIGN KEY (`idtipo_document`) REFERENCES `tipo_documento` (`idtipo_document`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.contactos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.descargas
CREATE TABLE IF NOT EXISTS `descargas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `descripcion_corta` longtext,
  `descripcion_detallada` longtext,
  `link_descarga` varchar(255) DEFAULT NULL,
  `link_video` varchar(255) NOT NULL,
  `link_pdf` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `visible` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `fecha_add` datetime DEFAULT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.descargas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `descargas` DISABLE KEYS */;
REPLACE INTO `descargas` (`id`, `nombre`, `descripcion_corta`, `descripcion_detallada`, `link_descarga`, `link_video`, `link_pdf`, `imagen`, `visible`, `target`, `fecha_add`, `fecha_upd`) VALUES
	(3, 'firmwhare', 'hkjh', 'jhkh', 'https://mega.nz/#!ZJoWgagT!QsAgZ9IyzdgHYWA508kG0OP9MN3i6kyfKF6nltg63C0', '#', '#', '', 'S', '_parent', '2019-02-17 21:18:18', NULL),
	(4, 'firmwhare', 'hkjh', 'jhkh', 'https://mega.nz/#!ZJoWgagT!QsAgZ9IyzdgHYWA508kG0OP9MN3i6kyfKF6nltg63C0', '#', '#', '', 'S', '_parent', '2019-02-17 21:18:19', NULL),
	(5, 'firmwhare', 'hkjh', 'jhkh', 'https://mega.nz/#!ZJoWgagT!QsAgZ9IyzdgHYWA508kG0OP9MN3i6kyfKF6nltg63C0', '#', '#', '', 'S', '_parent', '2019-02-17 21:18:20', NULL),
	(6, 'HP FIRM', 'hkjh                    ', 'jhkh', 'https://mega.nz/#!ZJoWgagT!QsAgZ9IyzdgHYWA508kG0OP9MN3i6kyfKF6nltg63C0', '#', '#', '', 'S', '_parent', '2019-02-17 21:18:22', '2019-02-17 21:24:23'),
	(7, 'vvv', '<p>hola</p>\r\n', '<p>jkkljklj</p>\r\n', 'link', 'vide', 'pdf', 'imagen_1553039457.jpg', 'S', '_parent', '2019-03-19 20:51:00', NULL);
/*!40000 ALTER TABLE `descargas` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `fecha_add` date DEFAULT NULL,
  `fecha_upd` date DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.links: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `visible` varchar(5) DEFAULT 'S',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.marcas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `horarios` longtext,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `map` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.parametros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `descripcion_corta` longtext,
  `descripcion_detallada` longtext,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `visible` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `fecha_add` datetime DEFAULT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_productos_marcas1_idx` (`id_marca`),
  KEY `fk_productos_categorias1_idx` (`id_categoria`),
  CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_marcas1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla gestor_descargas.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.productos_img
CREATE TABLE IF NOT EXISTS `productos_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `imagen` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__productos` (`idproducto`),
  CONSTRAINT `FK__productos` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.productos_img: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_img` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `idtipo_document` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.tipo_documento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla gestor_descargas.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `fecha_add` date DEFAULT NULL,
  `fecha_act` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla gestor_descargas.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `nombre`, `email`, `password`, `avatar`, `activo`, `fecha_add`, `fecha_act`) VALUES
	(1, 'juan', 'juan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, '2019-03-08', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
