<?php

class UsuarioDAO
{
    private mysqli $conexion;

    public function __construct()
    {
        $this->conexion = ConexionDB::conexion();
    }

    public function cargarUsuarios(): array
    {
        $usuarios = array();
        $sql = "SELECT id, nombre, email
                    FROM usuarios";
        $resultado = $this->conexion->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = new Usuario(
                $fila["id"],
                $fila["nombre"],
                $fila["email"]
            );
        }

        return $usuarios;
    }

    public function buscarUsuarioPorId(int $id): ?Usuario
    {
        $sql = "SELECT id, nombre, email
                    FROM usuarios
                    WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario(
                $fila["id"],
                $fila["nombre"],
                $fila["email"]
            );
            return $usuario;
        }

        return null;
    }
}
