
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
      reserva_hospedaje.rc!="3" AND 
      reserva_hospedaje.f_inicio<fh_fin AND 
      reserva_hospedaje.f_fin>fh_ini
GROUP BY reserva_hospedaje.cod_CH;

END //
DELIMITER ;

CALL sel_rooms (2, '2015-05-25', '2015-06-08')


-------------------------------------------------------------------------------------------------------------------------------------------
//