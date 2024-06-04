CREATE DATABASE cluehaven;

CREATE TABLE USUARIOS (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  apellido VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  rol VARCHAR(255) NOT NULL
);

-- Crear tabla CATEGORIAS
CREATE TABLE CATEGORIAS (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL UNIQUE
);

-- Crear tabla SALAS
CREATE TABLE SALAS (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  categoria_id INT NOT NULL,
  dimensiones INT NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  FOREIGN KEY (categoria_id) REFERENCES CATEGORIAS(id)
);

-- Crear tabla RESERVAS
CREATE TABLE RESERVAS (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  sala_id INT NOT NULL,
  num_personas INT NOT NULL,
  fecha DATETIME NOT NULL,
  precio INT NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES USUARIOS(id) ON DELETE CASCADE,
  FOREIGN KEY (sala_id) REFERENCES SALAS(id) ON DELETE CASCADE
);

-- Crear tabla VALORACIONES
CREATE TABLE VALORACIONES (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  sala_id INT NOT NULL,
  comentario TEXT,
  valor INT NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES USUARIOS(id) ON DELETE CASCADE,
  FOREIGN KEY (sala_id) REFERENCES SALAS(id)ON DELETE CASCADE
);

INSERT INTO USUARIOS (nombre, apellido, email, contrasena, rol)
VALUES ('Juan', 'Pérez', 'juan.perez@example.com', 'HUASJHkhjsajkjkJJCKSAJ@23', 'adm');
INSERT INTO USUARIOS (nombre, apellido, email, contrasena, rol)
VALUES ('Luis', 'Suarez', 'luis.suarez@example.com', 'JDASHDJAHloewiNMVNIEUT@OIEW89QW5', 'user');
INSERT INTO USUARIOS (nombre, apellido, email, contrasena, rol)
VALUES ('Miguer', 'Roman', 'miguel.roman@example.com', 'LOEUEJVMFIKDKDJKECWOE@45DA', 'user');

INSERT INTO CATEGORIAS (nombre)
VALUES ("Muestra");
INSERT INTO CATEGORIAS (nombre)
VALUES ("Terror");
INSERT INTO CATEGORIAS (nombre)
VALUES ("Misterio");

INSERT INTO SALAS (nombre, categoria_id, dimensiones, descripcion)
VALUES ('Sala de muestra', 1, 23, 'pequeña sala para mostrar las mecánicas del juego');
INSERT INTO SALAS (nombre, categoria_id, dimensiones, descripcion)
VALUES ('Sala de terror', 2, 52, 'Adéntrate en las sombrías profundidades de esta escape room de terror, donde cada paso te acerca más a tus miedos más oscuros. ¿Te atreves a desafiar lo desconocido?');
INSERT INTO SALAS (nombre, categoria_id, dimensiones, descripcion)
VALUES ('Sala de misterio', 3, 36, 'Explora los enigmáticos pasillos de esta escape room de misterio, donde cada puerta oculta secretos intrigantes y cada pista te lleva más cerca de desvelar el misterio final. ¿Te atreves a desentrañar sus secretos?');

INSERT INTO VALORACIONES (valor, sala_id, usuario_id)
VALUES (4, 1, 1);
INSERT INTO VALORACIONES (valor, sala_id, usuario_id, comentario)
VALUES (4, 1, 1, "Muy didactica");
INSERT INTO VALORACIONES (valor, sala_id, usuario_id, comentario)
VALUES (4, 1, 1, "Facil de comprender");

INSERT INTO RESERVAS (sala_id, usuario_id, fecha, num_personas, precio)
VALUES (1,1,'2024-04-23 17:30:00',2,30);
INSERT INTO RESERVAS (sala_id, usuario_id, fecha, num_personas, precio)
VALUES (3,14,'2024-07-15 10:00:00',2,30);
INSERT INTO RESERVAS (sala_id, usuario_id, fecha, num_personas, precio)
VALUES (2,2,'2024-04-12 20:30:00',3,45);

