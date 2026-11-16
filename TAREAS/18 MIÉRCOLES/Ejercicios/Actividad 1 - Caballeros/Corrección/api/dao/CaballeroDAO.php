<?php

    require_once __DIR__ . "/ConexionDB.php";
    require_once __DIR__ . "/../model/Caballero.php";

    class CaballeroDAO {

        private mysqli $conexion;

        public function __construct(mysqli $conexion) {
            $this->conexion = $conexion;
        }

        /**
         * Obtiene todos los caballeros de la base de datos.
         *
         * @return Caballero[]
         */
        public function obtenerTodos(): array {

            $sql = "SELECT * FROM caballeros ORDER BY id";

            $resultado = $this->conexion->query($sql);

            $caballeros = [];

            while ($fila = $resultado->fetch_assoc()) {
                $caballeros[] = $this->crearCaballero($fila);
            }

            $resultado->free();

            return $caballeros;
        }

        /**
         * Obtiene un caballero por su identificador.
         *
         * @return Caballero|null
         */
        public function obtenerPorId(int $id): ?Caballero {

            $sql = "SELECT * FROM caballeros WHERE id = ?";

            $consulta = $this->conexion->prepare($sql);
            $consulta->bind_param("i", $id);
            $consulta->execute();

            $resultado = $consulta->get_result();
            $fila = $resultado->fetch_assoc();

            $consulta->close();

            if ($fila === null) {
                return null;
            }

            return $this->crearCaballero($fila);
        }

        /**
         * Inserta un nuevo caballero.
         *
         * @return int Identificador del caballero insertado.
         */
        public function insertar(Caballero $caballero): int {

            $sql = "INSERT INTO caballeros
                    (nombre, fuerza, ataque, defensa, experiencia,
                    fecha_nacimiento, activo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $nombre = $caballero->getNombre();
            $fuerza = $caballero->getFuerza();
            $ataque = $caballero->getAtaque();
            $defensa = $caballero->getDefensa();
            $experiencia = $caballero->getExperiencia();
            $fechaNacimiento = $caballero->getFechaNacimiento();
            $activo = (int) $caballero->isActivo();

            $consulta = $this->conexion->prepare($sql);

            $consulta->bind_param(
                "siiiisi",
                $nombre,
                $fuerza,
                $ataque,
                $defensa,
                $experiencia,
                $fechaNacimiento,
                $activo
            );

            $consulta->execute();

            $id = $this->conexion->insert_id;

            $consulta->close();

            return $id;
        }

        /**
         * Actualiza un caballero existente.
         */
        public function actualizar(int $id, Caballero $caballero): bool {

            $sql = "UPDATE caballeros
                    SET nombre = ?,
                        fuerza = ?,
                        ataque = ?,
                        defensa = ?,
                        experiencia = ?,
                        fecha_nacimiento = ?,
                        activo = ?
                    WHERE id = ?";

            $nombre = $caballero->getNombre();
            $fuerza = $caballero->getFuerza();
            $ataque = $caballero->getAtaque();
            $defensa = $caballero->getDefensa();
            $experiencia = $caballero->getExperiencia();
            $fechaNacimiento = $caballero->getFechaNacimiento();
            $activo = (int) $caballero->isActivo();

            $consulta = $this->conexion->prepare($sql);

            $consulta->bind_param(
                "siiiisii",
                $nombre,
                $fuerza,
                $ataque,
                $defensa,
                $experiencia,
                $fechaNacimiento,
                $activo,
                $id
            );

            $consulta->execute();

            // Una actualizacion puede devolver 0 si los datos no cambian.
            $exito = $consulta->affected_rows >= 0;

            $consulta->close();

            return $exito;
        }

        /**
         * Elimina un caballero por su identificador.
         */
        public function eliminar(int $id): bool {

            $sql = "DELETE FROM caballeros WHERE id = ?";

            $consulta = $this->conexion->prepare($sql);
            $consulta->bind_param("i", $id);
            $consulta->execute();

            $eliminado = $consulta->affected_rows > 0;

            $consulta->close();

            return $eliminado;
        }

        /**
         * Convierte una fila de la base de datos en un objeto Caballero.
         */
        private function crearCaballero(array $fila): Caballero {

            return new Caballero(
                (int) $fila["id"],
                $fila["nombre"],
                (int) $fila["fuerza"],
                (int) $fila["ataque"],
                (int) $fila["defensa"],
                (int) $fila["experiencia"],
                $fila["fecha_nacimiento"],
                (bool) $fila["activo"]
            );
        }
    }
