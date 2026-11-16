<?php
    class personas_modelo
    {
        // Guardamos la conexión con la base de datos.
        private mysqli $db;
        // Array donde guardaremos las personas.
        private array $personas;
        // Constructor: se ejecuta al crear el modelo.
        public function __construct()
        {
            // Creamos la conexión con la base de datos.
            $this->db = Conectar::conexion();

            // Inicializamos el array vacío.
            $this->personas = array();
        }
        // Obtiene todas las personas de la base de datos.
        public function get_personas()
        {
            // Ejecutamos la consulta SQL.
            $consulta = $this->db->query(
                "SELECT * FROM personas;"
            );

            // Recorremos todos los registros obtenidos.
            while ($filas = $consulta->fetch_assoc()) {
                // Añadimos cada persona al array.
                // $filas contiene los campos de la tabla:
                // $filas['id']
                // $filas['nombre']
                // $filas['edad']
                $this->personas[] = $filas;
            }
            // Devolvemos todas las personas.
            return $this->personas;
        }
    }
?>