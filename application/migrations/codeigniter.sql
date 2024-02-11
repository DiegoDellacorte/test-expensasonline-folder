CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `cobros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` set('generado','enviado_a_cobrar','pagado') DEFAULT 'generado',
  `suscripcion` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `formas_de_pago` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO `formas_de_pago` (`id`, `name`) VALUES
	(1, 'debito por cbu'),
	(2, 'tarjeta');

CREATE TABLE IF NOT EXISTS `planes` (
  `id` bigint(20) unsigned NOT NULL,
  `costo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `planes` (`id`, `costo`, `name`) VALUES
	(1, 10000, 'Básico'),
	(2, 25000, 'Pro'),
	(3, 70000, 'Empresas');

CREATE TABLE IF NOT EXISTS `suscripciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` bigint(20) NOT NULL,
  `pago` bigint(20) NOT NULL,
  `plan` bigint(20) NOT NULL,
  `estado` binary(1) DEFAULT '1',
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
