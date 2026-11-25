CREATE DATABASE centro_veterinario
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE centro_veterinario;

CREATE TABLE propietarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(120) NOT NULL
);

CREATE TABLE mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    especie VARCHAR(40) NOT NULL,
    raza VARCHAR(60) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    id_propietario INT NOT NULL,
    FOREIGN KEY (id_propietario)
        REFERENCES propietarios(id)
);

INSERT INTO propietarios
    (nombre, telefono, email)
VALUES
    ('Ana García', '600123456', 'ana@gmail.com'),
    ('Carlos López', '611234567', 'carlos@gmail.com'),
    ('Marta Fernández', '622345678', 'marta@gmail.com'),
    ('David Pérez', '633456789', 'david@gmail.com'),
    ('Laura Sánchez', '644567890', 'laura@gmail.com');



INSERT INTO mascotas
    (nombre, especie, raza, fecha_nacimiento, id_propietario)
VALUES
    ('Luna', 'Perro', 'Labrador', '2020-03-15', 1),
    ('Milo', 'Gato', 'Siamés', '2021-06-20', 2),
    ('Rocky', 'Perro', 'Pastor alemán', '2019-11-10', 3),
    ('Nala', 'Gato', 'Persa', '2022-01-25', 1),
    ('Toby', 'Perro', 'Beagle', '2018-08-12', 4),
    ('Coco', 'Ave', 'Periquito', '2023-04-05', 5),
    ('Simba', 'Gato', 'Común europeo', '2021-09-17', 3);