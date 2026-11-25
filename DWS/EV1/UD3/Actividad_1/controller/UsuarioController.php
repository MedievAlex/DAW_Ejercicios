<?php

class UsuarioController
{
    private UsuarioDAO $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function cargarUsuarios()
    {
        $usuarios = $this->usuarioDAO->cargarUsuarios();

        $datos = [];

        foreach ($usuarios as $usuario) {
            $datos[] = [
                "id" => $usuario->getId(),
                "nombre" => $usuario->getNombre(),
                "email" => $usuario->getEmail()
            ];
        }
        return $datos;
    }
}
