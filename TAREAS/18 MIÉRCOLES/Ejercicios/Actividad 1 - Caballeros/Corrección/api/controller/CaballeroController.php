<?php

    require_once __DIR__ . "/../dao/CaballeroDAO.php";
    require_once __DIR__ . "/../model/Caballero.php";

    class CaballeroController {

        private CaballeroDAO $dao;

        public function __construct(CaballeroDAO $dao) {
            $this->dao = $dao;
        }

        /**
         * GET: obtiene todos los caballeros o uno por su id.
         */
        public function obtener(): array {

            if (isset($_GET["id"])) {

                $id = $this->obtenerIdURL();

                if ($id === null) {
                    return [
                        "codigo" => 400,
                        "datos" => [
                            "error" => "El identificador no es valido."
                        ]
                    ];
                }

                $caballero = $this->dao->obtenerPorId($id);

                if ($caballero === null) {
                    return [
                        "codigo" => 404,
                        "datos" => [
                            "error" => "No se ha encontrado el caballero."
                        ]
                    ];
                }

                return [
                    "codigo" => 200,
                    "datos" => $caballero->toArray()
                ];
            }

            $caballeros = $this->dao->obtenerTodos();

            // Convertimos cada objeto Caballero en un array para el JSON.
            $datos = [];

            foreach ($caballeros as $caballero) {
                $datos[] = $caballero->toArray();
            }

            return [
                "codigo" => 200,
                "datos" => $datos
            ];
        }

        /**
         * POST: crea un nuevo caballero.
         */
        public function insertar(): array {

            $datos = $this->leerJSON();

            if ($datos === null) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "El cuerpo de la peticion no contiene un JSON valido."
                    ]
                ];
            }

            $errores = $this->validar($datos);

            if (!empty($errores)) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "Los datos del caballero no son validos.",
                        "detalles" => $errores
                    ]
                ];
            }

            $caballero = $this->crearDesdeDatos($datos);

            $id = $this->dao->insertar($caballero);

            return [
                "codigo" => 201,
                "datos" => [
                    "mensaje" => "Caballero creado correctamente.",
                    "id" => $id
                ]
            ];
        }

        /**
         * PUT: actualiza un caballero existente.
         */
        public function actualizar(): array {

            $id = $this->obtenerIdURL();

            if ($id === null) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "Es necesario indicar un identificador valido."
                    ]
                ];
            }

            $datos = $this->leerJSON();

            if ($datos === null) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "El cuerpo de la peticion no contiene un JSON valido."
                    ]
                ];
            }

            $errores = $this->validar($datos);

            if (!empty($errores)) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "Los datos del caballero no son validos.",
                        "detalles" => $errores
                    ]
                ];
            }

            // Comprobamos que el caballero exista.
            $existente = $this->dao->obtenerPorId($id);

            if ($existente === null) {
                return [
                    "codigo" => 404,
                    "datos" => [
                        "error" => "No se ha encontrado el caballero."
                    ]
                ];
            }

            // Creamos el objeto con los nuevos datos y el id existente.
            $caballero = $this->crearDesdeDatos($datos, $id);

            $actualizado = $this->dao->actualizar($id, $caballero);

            if (!$actualizado) {
                return [
                    "codigo" => 200,
                    "datos" => [
                        "mensaje" => "No se ha modificado ninguna fila. Los datos son iguales a los existentes."
                    ]
                ];
            }

            return [
                "codigo" => 200,
                "datos" => [
                    "mensaje" => "Caballero actualizado correctamente."
                ]
            ];
        }

        /**
         * DELETE: elimina un caballero por su id.
         */
        public function eliminar(): array {

            $id = $this->obtenerIdURL();

            if ($id === null) {
                return [
                    "codigo" => 400,
                    "datos" => [
                        "error" => "Es necesario indicar un identificador valido."
                    ]
                ];
            }

            $eliminado = $this->dao->eliminar($id);

            if (!$eliminado) {
                return [
                    "codigo" => 404,
                    "datos" => [
                        "error" => "No se ha encontrado el caballero."
                    ]
                ];
            }

            return [
                "codigo" => 200,
                "datos" => [
                    "mensaje" => "Caballero eliminado correctamente."
                ]
            ];
        }

        /**
         * Lee el cuerpo JSON enviado por el cliente.
         */
        private function leerJSON(): ?array {

            $contenido = file_get_contents("php://input");

            if ($contenido === false || trim($contenido) === "") {
                return null;
            }

            $datos = json_decode($contenido, true);

            if (
                json_last_error() !== JSON_ERROR_NONE ||
                !is_array($datos)
            ) {
                return null;
            }

            return $datos;
        }

        /**
         * Valida los datos recibidos antes de crear el objeto.
         */
        private function validar(array &$datos): array {

            $errores = [];

            // Nombre
            if (
                !isset($datos["nombre"]) ||
                !is_string($datos["nombre"]) ||
                trim($datos["nombre"]) === ""
            ) {
                $errores[] = "El nombre es obligatorio.";
            } else {
                $datos["nombre"] = trim($datos["nombre"]);

                if (mb_strlen($datos["nombre"]) > 100) {
                    $errores[] =
                        "El nombre no puede superar los 100 caracteres.";
                }
            }

            // Estadisticas numericas
            $camposNumericos = [
                "fuerza",
                "ataque",
                "defensa",
                "experiencia"
            ];

            foreach ($camposNumericos as $campo) {

                if (
                    !array_key_exists($campo, $datos) ||
                    !is_int($datos[$campo]) ||
                    $datos[$campo] < 0
                ) {
                    $errores[] =
                        "El campo " . $campo .
                        " debe ser un entero mayor o igual que cero.";
                }
            }

            // Fecha de nacimiento
            if (
                !isset($datos["fecha_nacimiento"]) ||
                !is_string($datos["fecha_nacimiento"])
            ) {
                $errores[] = "La fecha de nacimiento es obligatoria.";
            } else {

                $fecha = DateTime::createFromFormat(
                    "!Y-m-d",
                    $datos["fecha_nacimiento"]
                );

                $fechaValida =
                    $fecha !== false &&
                    $fecha->format("Y-m-d") === $datos["fecha_nacimiento"];

                if (!$fechaValida) {
                    $errores[] =
                        "La fecha debe tener el formato YYYY-MM-DD.";
                }
            }

            // Estado activo
            if (
                !array_key_exists("activo", $datos) ||
                !is_bool($datos["activo"])
            ) {
                $errores[] =
                    "El campo activo debe ser verdadero o falso.";
            }

            return $errores;
        }

        /**
         * Construye un objeto Caballero a partir de los datos validados.
         */
        private function crearDesdeDatos(
            array $datos,
            ?int $id = null
        ): Caballero {

            return new Caballero(
                $id,
                $datos["nombre"],
                $datos["fuerza"],
                $datos["ataque"],
                $datos["defensa"],
                $datos["experiencia"],
                $datos["fecha_nacimiento"],
                $datos["activo"]
            );
        }

        /**
         * Obtiene el id de la URL y comprueba que sea un entero positivo.
         */
        private function obtenerIdURL(): ?int {

            if (!isset($_GET["id"])) {
                return null;
            }

            $id = filter_var(
                $_GET["id"],
                FILTER_VALIDATE_INT
            );

            if ($id === false || $id === null || $id <= 0) {
                return null;
            }

            return $id;
        }
    }
