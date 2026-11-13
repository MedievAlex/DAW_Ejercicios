CREATE DATABASE biblioteca_fantastica
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
USE biblioteca_fantastica;
CREATE TABLE autores (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
nacionalidad VARCHAR(60) NOT NULL,
fecha_nacimiento DATE NOT NULL
);
Desarrollo Web en Entrono Servidor
2º DAW
Ejercicios
3
CREATE TABLE libros (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(150) NOT NULL,
genero VARCHAR(50) NOT NULL,
anio_publicacion INT NOT NULL,
id_autor INT NOT NULL,
FOREIGN KEY (id_autor)
REFERENCES autores(id)
);
USE biblioteca_fantastica;
INSERT INTO autores
(nombre, nacionalidad, fecha_nacimiento)
VALUES
('J.R.R. Tolkien', 'Britanica', '1892-01-03'),
('Ursula K. Le Guin', 'Estadounidense', '1929-10-21'),
('Laura Gallego', 'Española', '1977-10-11'),
('George R.R. Martin', 'Estadounidense', '1948-09-20'),
('Terry Pratchett', 'Britanica', '1948-04-28');
INSERT INTO libros
(titulo, genero, anio_publicacion, id_autor)
VALUES
('El Hobbit', 'Fantasia', 1937, 1),
('El Senor de los Anillos', 'Fantasia', 1954, 1),
('Un mago de Terramar', 'Fantasia', 1968, 2),
('Memorias de Idhun', 'Fantasia', 2004, 3),
('Juego de Tronos', 'Fantasia epica', 1996, 4),
('Mort', 'Fantasia comica', 1987, 5),
('La historia interminable', 'Fantasia', 1979, 3);