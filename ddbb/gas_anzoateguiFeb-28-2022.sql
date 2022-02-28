

CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `tipo_documento` varchar(5) NOT NULL,
  `cedula` int NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cliente` (`cliente_id`, `nombre`, `apellido`, `tipo_documento`, `cedula`, `direccion`, `telefono`) VALUES
	(1,'PEDRO','PEREZ','v',21000221,'barcelona','02812582585'),
	(4,'roberto','pelaes','V',123456789,'dasdasdasdasd','0124585523');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `company` (
  `companyId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `moneda` varchar(5) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `rif` varchar(20) NOT NULL,
  PRIMARY KEY (`companyId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `company` (`companyId`, `name`, `moneda`, `direccion`, `telefono`, `rif`) VALUES
	(1,'Gas Anzoategui','BS','Anzoategui','99999999','00000000-0');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `lista_precio` (
  `lista_id` int NOT NULL AUTO_INCREMENT,
  `precio` int NOT NULL,
  `tipo_ventaId` int NOT NULL,
  `productoId` int NOT NULL,
  PRIMARY KEY (`lista_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `lista_precio` (`lista_id`, `precio`, `tipo_ventaId`, `productoId`) VALUES
	(3,1,3,17),
	(4,2,4,17),
	(5,3,5,17),
	(6,4,6,17),
	(7,5,7,17),
	(8,220,1,18),
	(9,320,2,18),
	(10,200,1,19),
	(11,300,2,19),
	(12,120,1,20),
	(13,25,2,20);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `tipo_pago_id` int NOT NULL,
  `total` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `isGranel` int NOT NULL DEFAULT '0',
  `tipo_ventaId` int NOT NULL,
  `refPago` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`pedido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `pedido` (`pedido_id`, `cliente_id`, `tipo_pago_id`, `total`, `fecha`, `status`, `isGranel`, `tipo_ventaId`, `refPago`) VALUES
	(23,4,2,'0','2022-02-10 17:51:14',1,'0','0',''),
	(24,1,1,70,'2022-02-14 17:09:11','0','0','0',''),
	(25,1,1,480,'2022-02-15 16:45:31','0','0','0',''),
	(26,1,1,350,'2022-02-15 16:59:35','0','0',2,''),
	(27,1,1,75,'2022-02-18 11:53:34','0','0',2,'N/A'),
	(28,1,1,'0','2022-02-28 15:41:30','0','0',2,'N/A'),
	(29,1,1,'0','2022-02-28 15:41:47','0','0',2,'N/A');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `pedido_item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `productoId` int NOT NULL,
  `pedido_id` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `pedido_item` (`item_id`, `productoId`, `pedido_id`, `cantidad`, `precio_unitario`, `total`) VALUES
	(3,1,22,1,100,100),
	(4,5,22,3,10,30),
	(5,15,24,2,25,50),
	(6,5,24,2,10,20),
	(7,20,25,4,120,480),
	(8,20,26,4,25,100),
	(9,20,26,5,25,125),
	(10,20,26,5,25,125),
	(11,20,27,3,25,75);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `producto` (
  `productoId` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `precioUnitario` decimal(6,0) NOT NULL,
  `peso` decimal(6,0) NOT NULL,
  `unidadMetrica` varchar(15) NOT NULL,
  `isGranel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productoId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `producto` (`productoId`, `nombre`, `precioUnitario`, `peso`, `unidadMetrica`, `isGranel`) VALUES
	(5,'cilindro',10,40,'kg','0'),
	(15,'cilindro',25,43,'kg','0'),
	(18,'test','0',15,'lt',1),
	(19,'test','0',15,'lt','0'),
	(20,'hola','0',222,'kg','0');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `rol_usuario` (`rol_id`, `nombre`) VALUES
	(1,'administrador'),
	(2,'gerente'),
	(3,'super usuario'),
	(4,'normal');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `tipo_pago` (
  `pago_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tipo_pago` (`pago_id`, `nombre`) VALUES
	(1,'efectivo'),
	(2,'pago movil'),
	(3,'tranferencia');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `tipo_venta` (
  `tipo_venta_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `granel` tinyint(1) NOT NULL,
  PRIMARY KEY (`tipo_venta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tipo_venta` (`tipo_venta_id`, `nombre`, `granel`) VALUES
	(1,'comercial','0'),
	(2,'comunal','0'),
	(3,'residencial',1),
	(4,'comercial',1),
	(5,'industriales',1),
	(6,'publicas',1),
	(7,'sin valor',1);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `rol_id` int NOT NULL,
  `company_id` int NOT NULL,
  `email` varchar(80) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre_completo` varchar(40) NOT NULL,
  `cedula` int NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `usuario` (`usuario_id`, `rol_id`, `company_id`, `email`, `contrasena`, `nombre_completo`, `cedula`) VALUES
	(1,1,1,'admin@gmail.com','467b617fec4d9fcb63505734ee224851','Fares figueroa',999999);

-- ------------------------------------------------ 

