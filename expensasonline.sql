-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla db_test.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_test.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla db_test.cobros
CREATE TABLE IF NOT EXISTS `cobros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` set('generado','enviado_a_cobrar','pagado') DEFAULT 'generado',
  `suscripcion` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_test.cobros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cobros` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobros` ENABLE KEYS */;

-- Volcando estructura para tabla db_test.formas_de_pago
CREATE TABLE IF NOT EXISTS `formas_de_pago` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_test.formas_de_pago: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `formas_de_pago` DISABLE KEYS */;
INSERT INTO `formas_de_pago` (`id`, `name`) VALUES
	(1, 'debito por cbu'),
	(2, 'tarjeta');
/*!40000 ALTER TABLE `formas_de_pago` ENABLE KEYS */;

-- Volcando estructura para tabla db_test.planes
CREATE TABLE IF NOT EXISTS `planes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `costo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_test.planes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `planes` DISABLE KEYS */;
INSERT INTO `planes` (`id`, `costo`, `name`) VALUES
	(1, 10000, 'Básico'),
	(2, 25000, 'Pro'),
	(3, 70000, 'Empresas');
/*!40000 ALTER TABLE `planes` ENABLE KEYS */;

-- Volcando estructura para tabla db_test.suscripciones
CREATE TABLE IF NOT EXISTS `suscripciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` bigint(20) NOT NULL,
  `pago` bigint(20) NOT NULL,
  `plan` bigint(20) NOT NULL,
  `estado` binary(1) DEFAULT '1',
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_test.suscripciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
