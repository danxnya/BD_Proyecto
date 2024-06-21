CREATE TABLE persona (
    id_persona SERIAL PRIMARY KEY,
	nombre VARCHAR(30),
	apellido_paterno VARCHAR(30),
	apellido_materno VARCHAR(30),
	correo VARCHAR(30),
	contrasena VARCHAR(30),
	telefono BIGINT,
	municipio VARCHAR,
	calle VARCHAR(30),
	cp INT
);


CREATE TABLE usuario (
    id_usuario serial PRIMARY KEY,
	id_persona INT,
    suscripcion BOOLEAN NOT NULL
);

CREATE TABLE trabajador (
    id_trabajador SERIAL PRIMARY KEY,
	area VARCHAR(30),
    id_persona INT
);

CREATE TABLE area (
    id_area SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    id_trabajador INT
);

--CREAR TABLA INTERMEDIA PARA LA 3RA FORMA NORMAL
CREATE TABLE trabajador_area (
    id_trabajador INT,
    id_area INT,
    PRIMARY KEY (id_trabajador, id_area),
    FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador),
    FOREIGN KEY (id_area) REFERENCES area(id_area)
);
-- HACER DROP A id_trabajador en tabla area
ALTER TABLE area DROP COLUMN id_trabajador;


CREATE TABLE turno (
    id_turno SERIAL PRIMARY KEY,
    id_trabajador INT,
    turno CHAR(1) NOT NULL

);

CREATE TABLE suscripcion (
    id_suscripcion SERIAL PRIMARY KEY,
    id_usuario INT,
    precio FLOAT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL
);

CREATE TABLE servicios (
    id_servicio SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    area VARCHAR(30) NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    id_area INT
);
--DROP A ATRIBUTO AREA
ALTER TABLE servicios DROP COLUMN area;
CREATE TABLE equipo(
    id_equipo SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    id_servicio INT
);

CREATE TABLE insumos (
    id_insumo SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    cantidad INT NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    id_servicio INT
);

CREATE TABLE proveedor (
    id_proveedor SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(30) NOT NULL,
    id_insumo INT,
    id_equipo INT
);

ALTER TABLE usuario 
ADD CONSTRAINT fk_usuario_persona 
FOREIGN KEY (id_persona) REFERENCES persona(id_persona);

ALTER TABLE trabajador
ADD CONSTRAINT fk_trabajador_persona
FOREIGN KEY (id_persona) REFERENCES persona(id_persona);

ALTER TABLE area
ADD CONSTRAINT fk_area_trabajador
FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador);

ALTER TABLE turno
ADD CONSTRAINT fk_turno_trabajador
FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador);

ALTER TABLE suscripcion
ADD CONSTRAINT fk_suscripcion_usuario
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);

ALTER TABLE servicios
ADD CONSTRAINT fk_servicios_suscripcion
FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio);

ALTER TABLE servicios
ADD CONSTRAINT fk_servicios_area
FOREIGN KEY (id_area) REFERENCES area(id_area);

ALTER TABLE equipo
ADD CONSTRAINT fk_equipo_servicios
FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio);

ALTER TABLE insumos
ADD CONSTRAINT fk_insumos_servicios
FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio);

ALTER TABLE proveedor
ADD CONSTRAINT fk_proveedor_insumos
FOREIGN KEY (id_insumo) REFERENCES insumos(id_insumo);

ALTER TABLE proveedor
ADD CONSTRAINT fk_proveedor_equipo
FOREIGN KEY (id_equipo) REFERENCES equipo(id_equipo);



