CREATE TABLE `Clientes` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `licencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



CREATE TABLE `Vehiculos` (
  `vehiculo_id` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `año` year NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vehiculo_id`),
  UNIQUE KEY `marca` (`marca`,`modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



CREATE TABLE `Alquileres` (
  `alquiler_id` int NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int NOT NULL,
  `cliente_id` int NOT NULL,
  `fecha_alquiler` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`alquiler_id`),
  UNIQUE KEY `idx_cliente_vehiculo` (`vehiculo_id`,`cliente_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `Alquileres_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `Vehiculos` (`vehiculo_id`),
  CONSTRAINT `Alquileres_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `Clientes` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;