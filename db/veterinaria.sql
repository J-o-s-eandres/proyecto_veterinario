-- Creación de la Base de Datos
CREATE DATABASE veterinaria ;

-- Usamos la Base de Datos
USE veterinaria;

-- Creación de la tabla Mascotas
CREATE TABLE mascotas(
idmascota SMALLINT AUTO_INCREMENT PRIMARY KEY,
idraza	SMALLINT NOT NULL,
nombre VARCHAR(30),
fechaNac DATE NOT NULL,
peso DECIMAL(4,2) NOT NULL,
vive CHAR(1) NOT NULL DEFAULT(1),
color VARCHAR(30),
fotografia VARCHAR(100) NULL
)ENGINE = INNODB;

-- Inserción de mascotas

INSERT INTO mascotas(idraza,nombre,fechaNac,peso,color)VALUES (1,'Peluza','2020-11-11',1.6,'Negro')
INSERT INTO mascotas(idraza,nombre,fechaNac,peso,color)VALUES (1,'Gordin','2022-11-11',34.8,'Negro')
INSERT INTO mascotas(idraza,nombre,fechaNac,peso,color,vive)VALUES (2,'Muertin','2022-01-10',34.8,'Negro',0)

-- consulta a la tabla mascotas
SELECT * FROM mascotas

-- Creación de la tabla razas

CREATE TABLE razas(
idraza SMALLINT AUTO_INCREMENT PRIMARY KEY,
nombreRaza VARCHAR (30) NOT NULL UNIQUE 
)ENGINE = INNODB;


SELECT * FROM razas ;
INSERT INTO razas(nombreRaza)VALUES ('Bombay'),('Angora'),('Birmano'),('Korat');


-- Creación d elos precedimientos almacenados

DELIMITER $$ 
CREATE PROCEDURE spu_listarMascotas()
BEGIN 

SELECT razas.nombreRaza, mas.nombre, mas.fechaNac, mas.peso, mas.color , mas.fotografia
	FROM mascotas mas
	INNER JOIN razas razas ON mas.idraza = razas.idraza
		WHERE vive = 1;

END $$
CALL spu_listarMascotas();




DELIMITER $$
CREATE PROCEDURE spu_mascota_registrar(
IN _idraza SMALLINT,
IN _nombre VARCHAR(30),
IN _fechaNac DATE ,
IN _peso DECIMAL(4,2) ,
IN _color VARCHAR(30),
IN _fotografia VARCHAR(100) 
)
BEGIN 
	IF _fotografia = '' THEN SET _fotografia = NULL; END IF;

		INSERT INTO mascotas(idraza,nombre,fechaNac,peso,color,fotografia) VALUES
			(_idraza,_nombre,_fechaNac,_peso,_color,_fotografia);

END $$


CALL spu_mascota_registrar(4,'Fifí','2018-05-11',2.4,'negro','');


