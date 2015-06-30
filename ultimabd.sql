
/*
SQLyog Community v12.09 (32 bit)
MySQL - 5.6.21 : Database - proyecto_bd2_hotel
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto_bd2_hotel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `proyecto_bd2_hotel`;

/*Table structure for table `catalogo_habitacion` */

DROP TABLE IF EXISTS `catalogo_habitacion`;

CREATE TABLE `catalogo_habitacion` (
  `cod_ch` int(11) NOT NULL COMMENT 'Identificador de la habitacion en catalogo',
  `king` int(11) NOT NULL COMMENT 'numero de camas King que posee la habitacion',
  `queen` int(11) NOT NULL COMMENT 'Numero de camas Queen que posee la habitacion',
  `b_clase_a` int(11) NOT NULL COMMENT 'el tipo de baño',
  `matrimonial` int(11) NOT NULL COMMENT 'Cuantas camas matrimoniales',
  `individual` int(11) NOT NULL COMMENT 'cuantas camas individuales hay',
  `b_clase_b` int(11) NOT NULL COMMENT 'tipo de baño',
  `b_clase_s` int(11) NOT NULL COMMENT 'tipo de baño',
  `Maxper` int(11) NOT NULL COMMENT 'numero de personas maximo que pueden entrar en una habitacion',
  PRIMARY KEY (`cod_ch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `catalogo_habitacion` */

insert  into `catalogo_habitacion`(`cod_ch`,`king`,`queen`,`b_clase_a`,`matrimonial`,`individual`,`b_clase_b`,`b_clase_s`,`Maxper`) values (90,0,0,1,0,1,0,0,1),(110,1,2,0,1,5,0,1,7),(232,232,2,2,2,2,2,0,122),(9901,1,2,2,3,2,2,1,20);

/*Table structure for table `catalogo_paquete` */

DROP TABLE IF EXISTS `catalogo_paquete`;

CREATE TABLE `catalogo_paquete` (
  `cod_cp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'El identificador del paquete.',
  `vigencia` int(11) NOT NULL DEFAULT '1' COMMENT '0 o 1 si es vigente o no',
  `descripcion` varchar(100) NOT NULL COMMENT 'la descripcion del paquete',
  `descuento` int(11) DEFAULT NULL COMMENT 'El porcentaje que se le descuenta',
  PRIMARY KEY (`cod_cp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `catalogo_paquete` */

insert  into `catalogo_paquete`(`cod_cp`,`vigencia`,`descripcion`,`descuento`) values (1,1,'Dia de los enamorados',20),(2,1,'Carnavales',40),(3,1,'Paquete de 3x2',40),(4,2,'Metamorfosis',40),(5,2,'Camacaro',40),(6,0,'Paquete para el dia de reyes',20);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `CI` int(11) NOT NULL COMMENT 'Cedula de del cliente',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre cliente',
  `n_tlf` varchar(15) NOT NULL COMMENT 'Numero de telefono',
  `direccion` varchar(100) NOT NULL COMMENT 'Direccion del cliente',
  `dir_elec` varchar(45) DEFAULT NULL COMMENT 'correo',
  `f_nac` date DEFAULT NULL COMMENT 'Fecha de nacimiento',
  PRIMARY KEY (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`CI`,`nombre`,`n_tlf`,`direccion`,`dir_elec`,`f_nac`) values (2233166,'Mario','0289443221','San felix','MarioelL@gmail.com','1995-02-10'),(8144908,'Marilu Machado','041452223','Maracay','marilu@hotmail.com','1960-02-11'),(25620021,'Rafael','04249127309','Puerto Ordaz','Rafaelarturo16@gmail.com','1994-09-16');

/*Table structure for table `habitacion` */

DROP TABLE IF EXISTS `habitacion`;

CREATE TABLE `habitacion` (
  `n_hab` int(11) NOT NULL AUTO_INCREMENT COMMENT 'El numero de la habitacion',
  `cod_hotel` int(11) NOT NULL COMMENT 'el rif del hotel al que pertenece la habitacion',
  `cod_CH` int(11) NOT NULL COMMENT 'el numero del tipo de habitacion del catalogo',
  `nPuerta` int(11) NOT NULL COMMENT 'Numero en la pueerta, fisico',
  PRIMARY KEY (`n_hab`),
  KEY `rif_del_hotel_idx` (`cod_hotel`,`cod_CH`),
  CONSTRAINT `forania_habitacion` FOREIGN KEY (`cod_hotel`, `cod_CH`) REFERENCES `habitacion_hotel` (`Hotel_cod`, `catalogo_habitacion_cod_ch`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `habitacion` */

insert  into `habitacion`(`n_hab`,`cod_hotel`,`cod_CH`,`nPuerta`) values (2,2,90,0),(3,2,90,0),(4,2,90,0),(5,1,110,0),(6,1,90,0),(12,1,110,12121),(13,1,110,222),(14,5,232,11111),(15,3,110,22122),(16,1,90,10202),(17,1,9901,1),(18,1,9901,2),(19,1,9901,3),(20,1,9901,4),(21,1,9901,5);

/*Table structure for table `habitacion_hotel` */

DROP TABLE IF EXISTS `habitacion_hotel`;

CREATE TABLE `habitacion_hotel` (
  `Hotel_cod` int(11) NOT NULL COMMENT 'El Rif del hotel',
  `catalogo_habitacion_cod_ch` int(11) NOT NULL COMMENT 'El codigo del tipo de habitacion en el catalogo.',
  `precio_dia` int(11) NOT NULL COMMENT 'Precio del dia para este tipo de habitacion',
  `cantidad` int(11) NOT NULL COMMENT 'numero de habitaciones que hay de este tipo',
  `NroAdicionales` int(11) NOT NULL DEFAULT '0' COMMENT 'El numero de camas adicionales que se le puede asignar',
  `descripcion` char(20) NOT NULL COMMENT 'Ejemplo: habitacion con vista al mar',
  `poseeHab` int(5) DEFAULT '0' COMMENT '0 si no posee habitaciones individual, 1 si si posee habiaciones individuales',
  PRIMARY KEY (`Hotel_cod`,`catalogo_habitacion_cod_ch`),
  KEY `tipo_idx` (`catalogo_habitacion_cod_ch`),
  CONSTRAINT `rifdelhotel` FOREIGN KEY (`Hotel_cod`) REFERENCES `hotel` (`cod_hotel`) ON UPDATE CASCADE,
  CONSTRAINT `tipo` FOREIGN KEY (`catalogo_habitacion_cod_ch`) REFERENCES `catalogo_habitacion` (`cod_ch`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `habitacion_hotel` */

insert  into `habitacion_hotel`(`Hotel_cod`,`catalogo_habitacion_cod_ch`,`precio_dia`,`cantidad`,`NroAdicionales`,`descripcion`,`poseeHab`) values (1,90,2300,5,5,'no',1),(1,110,5000,7,10,'hol',1),(1,9901,2000,5,10,'Habitacion Matrimoni',0),(2,90,1400,30,2,'no',1),(3,110,12212,22,100,'habitacion Mateim',1),(5,232,12000,12,1,'vista al mar',1);

/*Table structure for table `hotel` */

DROP TABLE IF EXISTS `hotel`;

CREATE TABLE `hotel` (
  `cod_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(15) NOT NULL COMMENT 'Rif del hotel.',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre del hotel.',
  `n_tlf` varchar(15) NOT NULL COMMENT 'Numero de Telefono para reservas al hotel',
  `direccion` varchar(100) NOT NULL COMMENT 'La direccion del hotel',
  `dir_elec` varchar(30) NOT NULL COMMENT 'Y el correo del hotel.',
  `numero_camas_dips` int(11) NOT NULL,
  `numero_camas_totales` int(11) NOT NULL,
  `n_hab` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `hotel` */

insert  into `hotel`(`cod_hotel`,`rif`,`nombre`,`n_tlf`,`direccion`,`dir_elec`,`numero_camas_dips`,`numero_camas_totales`,`n_hab`) values (1,'rif-E343GE','Cascada','02869612133','Frente a la churruata','Cascadaelhotel@gmail.com',100,100,5),(2,'rif-123432DDD','El Balde','02556322','Ucab','Ucabelhotel@gmail.com',30,30,0),(3,'Merucho','RIF-223223','CAse','02867782223','meruchohotel@gmail.com',120,120,0),(4,'RIF-22322sds','Meruchin','028677832','CAsesss','mel@gmail.com',124,124,0),(5,'RIF-223223','Hotel los Conquistadores','0223312342','Av nuevo mexico, espaÃ±a','losConqui@gmail.com',100,100,0),(6,'RIF-223223','Hotel los Conquistadores','0223312342','Av nuevo mexico, espaÃ±a','losConqui@gmail.com',100,100,0),(7,'rif','Ho','232','wdwd','sds',111,111,0),(8,'gfewf','dgfds','323','vew','vewv',3232,3232,0);

/*Table structure for table `paquetes` */

DROP TABLE IF EXISTS `paquetes`;

CREATE TABLE `paquetes` (
  `numero_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `catalogo_paquete_cod_cp` int(11) NOT NULL COMMENT 'El tipo de Paquete quje es',
  `cod_hotel` int(11) NOT NULL COMMENT 'El rif del hotel al que pertenece',
  `vigencia` int(11) NOT NULL COMMENT 'La vigencia del paquete en este hotel',
  PRIMARY KEY (`numero_paquete`),
  KEY `codigoenelcatalogo_idx` (`catalogo_paquete_cod_cp`),
  KEY `rifdelhotel_idx` (`cod_hotel`),
  CONSTRAINT `codigoenelcatalogo` FOREIGN KEY (`catalogo_paquete_cod_cp`) REFERENCES `catalogo_paquete` (`cod_cp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rifdelhotelpaquete` FOREIGN KEY (`cod_hotel`) REFERENCES `hotel` (`cod_hotel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `paquetes` */

insert  into `paquetes`(`numero_paquete`,`catalogo_paquete_cod_cp`,`cod_hotel`,`vigencia`) values (1,1,1,1),(2,2,1,1),(3,2,2,1),(4,3,3,1);

/*Table structure for table `reserva_hospedaje` */

DROP TABLE IF EXISTS `reserva_hospedaje`;

CREATE TABLE `reserva_hospedaje` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente_CI` int(11) NOT NULL COMMENT 'CI del cliente que hacer la reseerva o hospedaje',
  `cod_hotel` int(11) NOT NULL COMMENT 'Rif del hotel donde reservo o se hospeda',
  `cod_CH` int(11) NOT NULL COMMENT 'Tipo de habitacion y habitacion',
  `numero_paquete` int(11) NOT NULL COMMENT 'El codigo del paquete, si es 0 entonces no tiene paqeute.',
  `numero_hab` int(11) NOT NULL,
  `f_inicio` date NOT NULL COMMENT 'Fecha de inicio de reserva',
  `f_fin` date NOT NULL COMMENT 'fecha fin de la reserca',
  `f_reserva` date NOT NULL COMMENT 'Fecha en la que reservo',
  `pagado` int(11) NOT NULL COMMENT 'monto pagado por el usuario',
  `rc` int(11) NOT NULL COMMENT 'preservacion y reservacion \n0- si esta en reserva\n1- si el pago esta confirmado\n2- la cancelo y no vendra',
  `camas_adicionales` int(11) NOT NULL DEFAULT '0',
  `p_cd` int(11) NOT NULL DEFAULT '0' COMMENT 'el monto pagado mas las camas adicionales',
  PRIMARY KEY (`Cliente_CI`,`cod_hotel`,`cod_CH`,`numero_paquete`,`numero_hab`,`f_inicio`),
  KEY `numerohabitacion_idx` (`numero_hab`,`cod_CH`,`cod_hotel`),
  KEY `paqueteescogido_idx` (`numero_paquete`),
  KEY `habitaciones+paquete+hotel` (`cod_hotel`,`cod_CH`,`numero_hab`),
  KEY `id_reserva` (`id_reserva`),
  CONSTRAINT `clienteareservar` FOREIGN KEY (`Cliente_CI`) REFERENCES `cliente` (`CI`) ON UPDATE CASCADE,
  CONSTRAINT `habitaciones+paquete+hotel` FOREIGN KEY (`cod_hotel`, `cod_CH`, `numero_hab`) REFERENCES `habitacion` (`cod_hotel`, `cod_CH`, `n_hab`) ON UPDATE CASCADE,
  CONSTRAINT `numerodepaqueteescogido` FOREIGN KEY (`numero_paquete`) REFERENCES `paquetes` (`numero_paquete`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `reserva_hospedaje` */

insert  into `reserva_hospedaje`(`id_reserva`,`Cliente_CI`,`cod_hotel`,`cod_CH`,`numero_paquete`,`numero_hab`,`f_inicio`,`f_fin`,`f_reserva`,`pagado`,`rc`,`camas_adicionales`,`p_cd`) values (3,2233166,1,90,3,6,'2015-05-15','2015-05-16','2015-05-15',1,1,1,200),(2,2233166,2,90,2,4,'2015-05-30','2015-06-02','2015-05-15',0,0,0,0),(1,25620021,1,110,1,5,'2016-06-15','2015-05-23','2015-05-15',1,1,2,400);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `Ci` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `Permisos` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`Ci`,`nombre`,`apellido`,`Permisos`) values ('123','admin','admin',255);

/* Procedure structure for procedure `addPaquete` */

/*!50003 DROP PROCEDURE IF EXISTS  `addPaquete` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `addPaquete`(a int(1), b varchar(100), c int(5))
BEGIN
    INSERT INTO catalogo_paquete (vigencia,descripcion,descuento)
    VALUES (a, b, c);    
END */$$
DELIMITER ;

/* Procedure structure for procedure `add_habxhotel` */

/*!50003 DROP PROCEDURE IF EXISTS  `add_habxhotel` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `add_habxhotel`(hotel_cod INT(11), cat_hab INT(11), precio int (11), cant int(11), n_adi int(11), descrp varchar(30))
BEGIN 
DECLARE v1 INT DEFAULT 0;
DECLARE number_found INT DEFAULT 0;
INSERT INTO habitacion_hotel (Hotel_cod, catalogo_habitacion_cod_ch, precio_dia, cantidad, NroAdicionales, descripcion)
VALUES (hotel_cod, cat_hab, precio, cant, n_adi, descrp);
  SELECT n_hab INTO number_found
  FROM  hotel
  WHERE cod_hotel = hotel_cod;
  WHILE v1 < cant DO
    SET number_found = number_found+1;
    SET v1 = v1+1;
    
    INSERT INTO habitacion (cod_hotel, cod_CH, nPuerta)
    VALUES (hotel_cod, cat_hab, number_found);
    
  END WHILE;
   UPDATE hotel
   SET n_hab=number_found
   WHERE cod_hotel=hotel_cod;
END */$$
DELIMITER ;

/* Procedure structure for procedure `agregarCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `agregarCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarCliente`(cedula INT,nombre VARCHAR(50), telefono VARCHAR(15),dire VARCHAR(100), dir_e VARCHAR(45), naci DATE)
BEGIN 
INSERT INTO cliente(CI,nombre,n_tlf,direccion,dir_elec,f_nac) VALUES(cedula,nombre,telefono,dire,dir_e,naci);
END */$$
DELIMITER ;

/* Procedure structure for procedure `all_rooms_ht` */

/*!50003 DROP PROCEDURE IF EXISTS  `all_rooms_ht` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `all_rooms_ht`(hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT habitacion.n_hab
FROM habitacion
WHERE habitacion.cod_hotel=hotel_cod AND 
      habitacion.cod_CH=cod_cat;
END */$$
DELIMITER ;

/* Procedure structure for procedure `cambiarPoseeHab` */

/*!50003 DROP PROCEDURE IF EXISTS  `cambiarPoseeHab` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarPoseeHab`(hotel int, cod int )
BEGIN 
update habitacion_hotel
set poseeHab="1"
where Hotel_cod=hotel and catalogo_habitacion_cod_ch=cod;
END */$$
DELIMITER ;

/* Procedure structure for procedure `free_rooms` */

/*!50003 DROP PROCEDURE IF EXISTS  `free_rooms` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `free_rooms`(hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT habitacion.n_hab
FROM habitacion
WHERE habitacion.cod_hotel=hotel_cod AND 
      habitacion.cod_CH=cod_cat AND
      habitacion.n_hab!=( SELECT reserva_hospedaje.numero_hab
                          FROM reserva_hospedaje
                          WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
                                reserva_hospedaje.cod_CH=cod_cat AND
                                (reserva_hospedaje.rc="1" OR reserva_hospedaje.rc="2" OR  reserva_hospedaje.rc="0") AND
                                reserva_hospedaje.f_inicio<fh_fin AND reserva_hospedaje.f_fin>fh_ini);
END */$$
DELIMITER ;

/* Procedure structure for procedure `free_rooms_rafa` */

/*!50003 DROP PROCEDURE IF EXISTS  `free_rooms_rafa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `free_rooms_rafa`(hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT habitacion.n_hab
FROM habitacion,reserva_hospedaje
WHERE habitacion.cod_hotel=hotel_cod AND 
      habitacion.cod_CH=cod_cat AND
      habitacion.n_hab!=reserva_hospedaje.numero_hab and 
                                reserva_hospedaje.cod_hotel=hotel_cod AND 
                                reserva_hospedaje.cod_CH=cod_cat AND
                                reserva_hospedaje.rc!="3" AND
                                reserva_hospedaje.f_inicio<fh_fin AND reserva_hospedaje.f_fin>fh_ini;
END */$$
DELIMITER ;

/* Procedure structure for procedure `habitacionesXhotelSinHab` */

/*!50003 DROP PROCEDURE IF EXISTS  `habitacionesXhotelSinHab` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `habitacionesXhotelSinHab`(hotel int)
BEGIN 
select habitacion_hotel.Hotel_cod, habitacion_hotel.catalogo_habitacion_cod_ch, habitacion_hotel.cantidad
from habitacion_hotel
where habitacion_hotel.poseeHab="0" and habitacion_hotel.Hotel_cod=hotel;
END */$$
DELIMITER ;

/* Procedure structure for procedure `habitacionPorFecha` */

/*!50003 DROP PROCEDURE IF EXISTS  `habitacionPorFecha` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `habitacionPorFecha`(hotel int)
BEGIN
    
    select reserva_hospedaje.cod_hotel,reserva_hospedaje.cod_CH, habitacion_hotel.descripcion,habitacion_hotel.precio_dia,habitacion_hotel.NroAdicionales, count(reserva_hospedaje.cod_CH) as cuentaRe, count(habitacion.cod_Ch) as cuentaH
    from reserva_hospedaje inner join habitacion on reserva_hospedaje.cod_CH = habitacion.cod_CH and reserva_hospedaje.cod_hotel = habitacion.cod_hotel inner join habitacion_hotel on reserva_hospedaje.cod_CH = habitacion_hotel.catalogo_habitacion_cod_ch AND reserva_hospedaje.cod_hotel = habitacion_hotel.Hotel_cod 
    where reserva_hospedaje.cod_hotel=hotel;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `occu_rooms_ht` */

/*!50003 DROP PROCEDURE IF EXISTS  `occu_rooms_ht` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `occu_rooms_ht`(hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT reserva_hospedaje.numero_hab
FROM reserva_hospedaje
WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
   reserva_hospedaje.cod_CH=cod_cat AND
   (reserva_hospedaje.rc="1" OR reserva_hospedaje.rc="2" OR  reserva_hospedaje.rc="0") AND
   reserva_hospedaje.f_inicio<fh_fin AND reserva_hospedaje.f_fin>fh_ini;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resyhos` */

/*!50003 DROP PROCEDURE IF EXISTS  `resyhos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `resyhos`(ci INT(11), hotel_cod INT(11), cod_ch INT(11), num_paq INT(11), num_hab INT(11), fh_ini DATE, fh_fin DATE, f_res DATE, pagado INT(11), rc INT(11), camas_ad INT(11), precio_cama INT(11))
BEGIN 
INSERT INTO reserva_hospedaje (id_reserva, Cliente_CI, cod_hotel, cod_CH, numero_paquete, numero_hab, f_inicio, f_fin, f_reserva, pagado, rc, camas_adicionales, p_cd)
VALUES (1, ci, hotel_cod, cod_ch, num_paq, num_hab, fh_ini, fh_fin, f_res, pagado, rc, camas_ad, camas_ad*precio_cama);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sel_rooms` */

/*!50003 DROP PROCEDURE IF EXISTS  `sel_rooms` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sel_rooms`(hotel_cod INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
SELECT reserva_hospedaje.cod_hotel, reserva_hospedaje.cod_CH,COUNT(reserva_hospedaje.cod_CH) AS ocupadas, 
       habitacion_hotel.cantidad, habitacion_hotel.descripcion, habitacion_hotel.precio_dia, habitacion_hotel.NroAdicionales
FROM reserva_hospedaje INNER JOIN habitacion_hotel ON reserva_hospedaje.cod_hotel=habitacion_hotel.Hotel_cod AND 
                                                      reserva_hospedaje.cod_CH=habitacion_hotel.catalogo_habitacion_cod_ch
WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
      reserva_hospedaje.rc!="3" AND 
      reserva_hospedaje.f_inicio<fh_fin AND 
      reserva_hospedaje.f_fin>fh_ini
GROUP BY reserva_hospedaje.cod_CH;
END */$$
DELIMITER ;

/* Procedure structure for procedure `unirHabitacionesAgre` */

/*!50003 DROP PROCEDURE IF EXISTS  `unirHabitacionesAgre` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `unirHabitacionesAgre`(hotel INT)
BEGIN 
SELECT habitacion.cod_hotel,habitacion.cod_CH,COUNT(habitacion.cod_ch) AS cuenta, habitacion_hotel.cantidad
FROM habitacion INNER JOIN habitacion_hotel ON habitacion.cod_hotel=habitacion_hotel.Hotel_cod and habitacion.cod_CH=habitacion_hotel.catalogo_habitacion_cod_ch
WHERE habitacion.cod_hotel=hotel
GROUP BY cod_CH;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
