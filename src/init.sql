CREATE DATABASE IF NOT EXISTS PracticaWebApp;
USE PracticaWebApp;

-- Crear tabla si no existe
CREATE TABLE IF NOT EXISTS mensajes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);