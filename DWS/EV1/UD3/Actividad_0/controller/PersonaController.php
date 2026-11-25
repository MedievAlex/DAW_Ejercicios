<?php
    // Importamos el modelo.
    require_once("dao/PersonaDAO.php");
    // Creamos un objeto del modelo.
    $dao = new PersonaDAO();
    // Pedimos al DAO todos los datos de las personas.

    $personas = $dao->buscarTodos();
    // Incluimos la vista.
    // La variable $personas está disponible en la vista porque
    // el controlador la ha creado antes de incluirla.
    require_once("view/personas_vista1.php");
    //require_once("view/personas_vista2.php");
?>