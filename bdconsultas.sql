
------------------------------------------------------------------------------------------------------------------------------------------
 Este procedimiento agrega las habitaciones por hoteles y sus respectivas habitaciones, ademas edita el valor de la variable en hotel n_hab

DELIMITER //
CREATE PROCEDURE add_habxhotel (hotel_cod INT(11), cat_hab INT(11), precio int (11), cant int(11), n_adi int(11), descrp varchar(150))
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


END //
DELIMITER ;





------------------------------------------------------------------------------------------------------------------------------------------
//Aqui esta mmgvo

DELIMITER //
CREATE PROCEDURE sel_rooms (hotel_cod INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 

SELECT reserva_hospedaje.cod_hotel, reserva_hospedaje.cod_CH,COUNT(reserva_hospedaje.cod_CH) AS ocupadas, 
       habitacion_hotel.cantidad, habitacion_hotel.descripcion, habitacion_hotel.precio_dia, habitacion_hotel.NroAdicionales
FROM reserva_hospedaje INNER JOIN habitacion_hotel ON reserva_hospedaje.cod_hotel=habitacion_hotel.Hotel_cod AND 
                                                      reserva_hospedaje.cod_CH=habitacion_hotel.catalogo_habitacion_cod_ch
WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
      (reserva_hospedaje.rc="1" OR reserva_hospedaje.rc="2" OR  reserva_hospedaje.rc="0") AND
      reserva_hospedaje.f_inicio<fh_fin AND 
      reserva_hospedaje.f_fin>fh_ini
GROUP BY reserva_hospedaje.cod_CH;

END //
DELIMITER ;

CALL sel_rooms (2, '2015-05-25', '2015-06-08');


-------------------------------------------------------------------------------------------------------------------------------------------
//Query de reservar

DELIMITER //
CREATE PROCEDURE resyhos (ci INT(11), hotel_cod INT(11), cod_ch INT(11), num_paq INT(11), num_hab INT(11), fh_ini DATE, fh_fin DATE, f_res DATE, pagado INT(11), rc INT(11), camas_ad INT(11), precio_cama INT(11))
BEGIN 

INSERT INTO reserva_hospedaje (id_reserva, Cliente_CI, cod_hotel, cod_CH, numero_paquete, numero_hab, f_inicio, f_fin, f_reserva, pagado, rc, camas_adicionales, p_cd)
VALUES (1, ci, hotel_cod, cod_ch, num_paq, num_hab, fh_ini, fh_fin, f_res, pagado, rc, camas_ad, camas_ad*precio_cama);

UPDATE hotel SET numero_camas_disp = numero_camas_disp - camas_ad WHERE cod_hotel = hotel_cod;


END //
DELIMITER ;

CALL resyhos (2233166, 3, 110, 3, 15, '2015-05-25', '2015-05-30', '2015-05-22', 1500, 1, 3, 2500);


-------------------------------------------------------------------------------------------------------------------------------------------

//Query que busca las habitaciones disponibles segun un hotel y el catalogo de habitacion

DELIMITER //
CREATE PROCEDURE free_rooms (hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
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


END //
DELIMITER ;


CALL free_rooms (2, 90,'2015-05-25', '2015-06-08');


------------------------------------------------------------------------------------------------------------------------------
//Devuelve las habitaciones ocupadas de un hotel y catalogo
DELIMITER //
CREATE PROCEDURE occu_rooms_ht (hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT reserva_hospedaje.numero_hab
FROM reserva_hospedaje
WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
   reserva_hospedaje.cod_CH=cod_cat AND
   (reserva_hospedaje.rc="1" OR reserva_hospedaje.rc="2" OR  reserva_hospedaje.rc="0") AND
   reserva_hospedaje.f_inicio<fh_fin AND reserva_hospedaje.f_fin>fh_ini;

END //
DELIMITER ;

//Devuelve todas las habitaciones de un hotel por catalogo
DELIMITER //
CREATE PROCEDURE all_rooms_ht (hotel_cod INT(11), cod_cat INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT habitacion.n_hab
FROM habitacion
WHERE habitacion.cod_hotel=hotel_cod AND 
      habitacion.cod_CH=cod_cat;

END //
DELIMITER ;

CALL all_rooms_ht (2, 90,'2015-05-25', '2015-06-08');
CALL occu_rooms_ht (2, 90,'2015-05-25', '2015-06-08');
-------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
//Devuelve las habitaciones de una persona que aun no ha confirmado
DELIMITER //
CREATE PROCEDURE conf_rooms (hotel_cod INT(11), ci INT(11), fh_ini DATE, fh_fin DATE)
BEGIN 
      
SELECT reserva_hospedaje.numero_hab, habitacion.nPuerta
FROM reserva_hospedaje INNER JOIN habitacion ON reserva_hospedaje.numero_hab=habitacion.n_hab
WHERE reserva_hospedaje.cod_hotel=hotel_cod AND 
   reserva_hospedaje.Cliente_CI=ci AND
   reserva_hospedaje.rc="0" AND
   reserva_hospedaje.f_inicio<=fh_fin AND reserva_hospedaje.f_fin>=fh_ini;

END //
DELIMITER ;

CALL conf_rooms (2, 2233166,'2015-05-25', '2015-06-08');