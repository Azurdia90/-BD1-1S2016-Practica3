CREATE TABLE Usuarios (
    id MEDIUMINT(8) UNSIGNED NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(30) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    pass VARCHAR(16) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Tipo_Usuario(
	id SMALLINT(3) UNSIGNED NOT NULL,
	tipo varchar(15),
	PRIMARY KEY(id)
);

INSERT INTO Usuarios VALUES(201020331, 'Cristian', 'Azurdia', 'Villa Flor', 'mipass');
INSERT INTO Tipo_Usuario VALUES(1,'Estudiante');
INSERT INTO Tipo_Usuario VALUES(2,'Catedratico');
INSERT INTO Tipo_Usuario VALUES(3,'Personal');