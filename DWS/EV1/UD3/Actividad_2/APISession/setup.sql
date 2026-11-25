-- Ejecuta este archivo en phpMyAdmin o en la consola de MySQL.
-- Crea la base de datos y la tabla de usuarios para la practica.

CREATE DATABASE IF NOT EXISTS api_login
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE api_login;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    password_hash VARCHAR(255) NOT NULL,
    last_login DATETIME NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
