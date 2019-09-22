# Host: 127.0.0.1  (Version 5.5.5-10.1.36-MariaDB)
# Date: 2018-11-29 09:24:40
# Generator: MySQL-Front 6.1  (Build 1.21)


#
# Structure for table "t_direcciones"
#

DROP TABLE IF EXISTS `t_direcciones`;
CREATE TABLE `t_direcciones` (
  `Id_direcciones` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_direcciones`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "t_direcciones"
#

INSERT INTO `t_direcciones` VALUES (1,'DIRECCIÃ“N DEL SISTEMA PARA EL DESARROLLO INTEGRAL DE LA FAMILIA'),(2,'CONTRALORIA MUNICIPAL');

#
# Structure for table "t_coordinaciones"
#

DROP TABLE IF EXISTS `t_coordinaciones`;
CREATE TABLE `t_coordinaciones` (
  `Id_coordinacion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_direcciones` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_coordinacion`),
  KEY `Id_direccion` (`Id_direcciones`),
  CONSTRAINT `Id_direccion` FOREIGN KEY (`Id_direcciones`) REFERENCES `t_direcciones` (`Id_direcciones`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "t_coordinaciones"
#

INSERT INTO `t_coordinaciones` VALUES (1,1,'PROCURADORIA DE PROTECCION '),(2,1,'COORDINACIÃ“N TÃ‰CNICA ADMINISTRATIVA'),(3,2,'DEPARTAMENTO DEFENSOR');

#
# Structure for table "t_expediente"
#

DROP TABLE IF EXISTS `t_expediente`;
CREATE TABLE `t_expediente` (
  `Id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id_expediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_expediente"
#


#
# Structure for table "t_usuarios"
#

DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE `t_usuarios` (
  `Id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "t_usuarios"
#

INSERT INTO `t_usuarios` VALUES (5,'ebert','$2y$10$GNXalx56fc3LrQjZrwtPBuoQ59I/TGkqZlQ8d5kgtLR0i5igkaphG');
