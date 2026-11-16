
CREATE DATABASE IF NOT EXISTS reservas_espacios
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE reservas_espacios;

-- =====================================================
-- ELIMINACION DE TABLAS PARA REINICIAR EL EJERCICIO
-- =====================================================

DROP TABLE IF EXISTS reservas;
DROP TABLE IF EXISTS salas;
DROP TABLE IF EXISTS usuarios;

-- =====================================================
-- TABLA: usuarios
-- =====================================================

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    rol ENUM('ADMIN', 'EMPLEADO') NOT NULL DEFAULT 'EMPLEADO'
) ENGINE=InnoDB;

-- =====================================================
-- TABLA: salas
-- =====================================================

CREATE TABLE salas (
    id_sala INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ubicacion VARCHAR(150) NOT NULL,
    capacidad INT NOT NULL,
    tipo ENUM('REUNION', 'FORMACION', 'TRABAJO') NOT NULL,
    activa TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT chk_salas_capacidad
        CHECK (capacidad > 0)
) ENGINE=InnoDB;

-- =====================================================
-- TABLA: reservas
-- =====================================================

CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_sala INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    numero_personas INT NOT NULL,
    motivo VARCHAR(250) NOT NULL,
    estado ENUM('CONFIRMADA', 'CANCELADA')
        NOT NULL DEFAULT 'CONFIRMADA',
    fecha_creacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_reservas_salas
        FOREIGN KEY (id_sala)
        REFERENCES salas(id_sala)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_reservas_usuarios
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id_usuario)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT chk_reservas_horario
        CHECK (hora_inicio < hora_fin),

    CONSTRAINT chk_reservas_personas
        CHECK (numero_personas > 0),

    INDEX idx_reservas_fecha_sala (fecha, id_sala),
    INDEX idx_reservas_usuario (id_usuario),
    INDEX idx_reservas_estado (estado)
) ENGINE=InnoDB;

-- =====================================================
-- DATOS INICIALES: USUARIOS
-- =====================================================

INSERT INTO usuarios (nombre, email, rol) VALUES
('Administrador del centro', 'admin@centro.es', 'ADMIN'),
('Ane Garcia', 'ane.garcia@centro.es', 'EMPLEADO'),
('Mikel Lopez', 'mikel.lopez@centro.es', 'EMPLEADO'),
('Nerea Sanchez', 'nerea.sanchez@centro.es', 'EMPLEADO'),
('Iker Martinez', 'iker.martinez@centro.es', 'EMPLEADO');

-- =====================================================
-- DATOS INICIALES: SALAS
-- =====================================================

INSERT INTO salas (nombre, ubicacion, capacidad, tipo, activa) VALUES
('Sala Artea', 'Edificio A - Planta 1', 8, 'REUNION', 1),
('Sala Euskadi', 'Edificio A - Planta 2', 16, 'REUNION', 1),
('Aula Informatica 1', 'Edificio B - Planta 1', 25, 'FORMACION', 1),
('Aula Informatica 2', 'Edificio B - Planta 2', 20, 'FORMACION', 1),
('Espacio Coworking', 'Edificio C - Planta 1', 12, 'TRABAJO', 1),
('Sala en mantenimiento', 'Edificio C - Planta 2', 10, 'REUNION', 0);

-- =====================================================
-- DATOS INICIALES: RESERVAS
-- Se utilizan fechas futuras relativas al momento
-- de ejecucion del script.
-- =====================================================

INSERT INTO reservas (
    id_sala,
    id_usuario,
    fecha,
    hora_inicio,
    hora_fin,
    numero_personas,
    motivo,
    estado
) VALUES
(
    1, 2,
    DATE_ADD(CURDATE(), INTERVAL 1 DAY),
    '09:00:00', '10:00:00',
    5, 'Reunion del equipo de desarrollo',
    'CONFIRMADA'
),
(
    1, 3,
    DATE_ADD(CURDATE(), INTERVAL 1 DAY),
    '10:00:00', '11:30:00',
    6, 'Planificacion del proyecto',
    'CONFIRMADA'
),
(
    2, 4,
    DATE_ADD(CURDATE(), INTERVAL 1 DAY),
    '09:30:00', '11:00:00',
    12, 'Reunion de coordinacion',
    'CONFIRMADA'
),
(
    3, 2,
    DATE_ADD(CURDATE(), INTERVAL 2 DAY),
    '11:00:00', '13:00:00',
    20, 'Formacion interna',
    'CONFIRMADA'
),
(
    1, 5,
    DATE_ADD(CURDATE(), INTERVAL 1 DAY),
    '12:00:00', '13:00:00',
    4, 'Seguimiento de tareas',
    'CANCELADA'
);
