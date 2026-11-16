<?php

    require_once("model/Persona.php");
    require_once("dao/ConexionDB.php");

    class PersonaDAO
    {
        private mysqli $conexion;
        public function __construct()
        {
            $this->conexion = ConexionDB::conexion();
        }
        // BUSCAR TODAS
        public function buscarTodos(): array
        {
            $personas = array();
            $sql = "SELECT id, nombre, edad
                    FROM personas";
            $resultado = $this->conexion->query($sql);
            while ($fila = $resultado->fetch_assoc()) {
                $persona = new Persona();
                $persona->setId($fila["id"]);
                $persona->setNombre($fila["nombre"]);
                $persona->setEdad($fila["edad"]);
                $personas[] = $persona;
            }
            return $personas;
        }

        // BUSCAR POR ID
        public function buscarPorId(int $id): ?Persona
        {
            $sql = "SELECT id, nombre, edad
                    FROM personas
                    WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($fila = $resultado->fetch_assoc()) {
                $persona = new Persona();
                $persona->setId($fila["id"]);
                $persona->setNombre($fila["nombre"]);
                $persona->setEdad($fila["edad"]);
                return $persona;
            }
            return null;
        }
        // INSERTAR
        public function insertar(Persona $persona): bool
        {
            $sql = "INSERT INTO personas (nombre, edad)
                    VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $nombre = $persona->getNombre();
            $edad = $persona->getEdad();
            $stmt->bind_param(
                "si",
                $nombre,
                $edad
            );
            return $stmt->execute();
        }
        // ACTUALIZAR
        public function actualizar(Persona $persona): bool
        {
            $sql = "UPDATE personas
                    SET nombre = ?,
                        edad = ?
                    WHERE id = ?";

            $stmt = $this->conexion->prepare($sql);
            $nombre = $persona->getNombre();
            $edad = $persona->getEdad();
            $id = $persona->getId();
            $stmt->bind_param(
                "sii",
                $nombre,
                $edad,
                $id
            );
            return $stmt->execute();
        }
        // ELIMINAR
        public function eliminar(int $id): bool
        {
            $sql = "DELETE FROM personas
                    WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }
?>