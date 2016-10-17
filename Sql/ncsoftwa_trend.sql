/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.0.23-MariaDB : Database - ncsoftwa_trend
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ncsoftwa_trend` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`nombre`,`apellido`,`correo`,`clave`) values ('asdf','asdf','benjamin_otero@outlook.com','123'),('asdf','asdf','oterobenjamin@gmail.com','123');

UNLOCK TABLES;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

LOCK TABLES `productos` WRITE;

insert  into `productos`(`id_producto`,`descripcion`,`precio`) values (1,'Gestion',150),(2,'POS',100),(3,'E-COMMERCE',150);

UNLOCK TABLES;

/*Table structure for table `productos_clientes` */

DROP TABLE IF EXISTS `productos_clientes`;

CREATE TABLE `productos_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_alta` date DEFAULT NULL,
  `correo_cliente` varchar(50) DEFAULT NULL,
  `id_producto` int(2) DEFAULT NULL,
  `clave_producto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_productos_productos_usuarios` (`id_producto`),
  KEY `FK_clientes_productos_clientes` (`correo_cliente`),
  CONSTRAINT `FK_clientes_productos_clientes` FOREIGN KEY (`correo_cliente`) REFERENCES `clientes` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_productos_usuarios` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `productos_clientes` */

LOCK TABLES `productos_clientes` WRITE;

insert  into `productos_clientes`(`id`,`fecha_alta`,`correo_cliente`,`id_producto`,`clave_producto`) values (1,'2015-00-18','benjamin_otero@outlook.com',1,'1');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
