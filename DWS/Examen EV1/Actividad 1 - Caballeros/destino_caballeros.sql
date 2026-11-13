CREATE DATABASE destino_caballeros
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
USE destino_caballeros;
CREATE TABLE caballeros (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
fuerza INT NOT NULL,
ataque INT NOT NULL,
defensa INT NOT NULL,
experiencia INT NOT NULL,
fecha_nacimiento DATE NOT NULL,
activo BOOLEAN NOT NULL
);
INSERT INTO caballeros
(nombre, fuerza, ataque, defensa, experiencia, fecha_nacimiento, activo)
VALUES
('Arturo', 95, 88, 90, 1500, '1985-03-15', TRUE),
('Lancelot', 90, 95, 80, 1200, '1988-07-22', TRUE),
('Ginebra', 70, 75, 65, 800, '1990-11-05', TRUE),
('Merlin', 60, 85, 70, 2000, '1970-01-10', TRUE),
('Percival', 85, 80, 85, 950, '1995-06-18', TRUE),
('Morgana', 75, 92, 60, 1300, '1987-09-30', FALSE),
('Gawain', 88, 82, 87, 1100, '1992-04-12', TRUE),
('Tristan', 82, 90, 75, 1000, '1991-12-20', FALSE),
('Bedivere', 78, 72, 88, 700, '1994-02-25', TRUE),
('Galahad', 98, 96, 95, 1800, '1998-08-08', TRUE);