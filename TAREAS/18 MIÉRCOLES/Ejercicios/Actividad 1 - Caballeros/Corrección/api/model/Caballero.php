<?php

    class Caballero
    {
        private ?int $id;
        private string $nombre;
        private int $fuerza;
        private int $ataque;
        private int $defensa;
        private int $experiencia;
        private string $fecha_nacimiento;
        private bool $activo;

        public function __construct(
            ?int $id,
            string $nombre,
            int $fuerza,
            int $ataque,
            int $defensa,
            int $experiencia,
            string $fecha_nacimiento,
            bool $activo
        ) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->fuerza = $fuerza;
            $this->ataque = $ataque;
            $this->defensa = $defensa;
            $this->experiencia = $experiencia;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->activo = $activo;
        }

        // GETTERS

        public function getId(): ?int
        {
            return $this->id;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getFuerza(): int
        {
            return $this->fuerza;
        }

        public function getAtaque(): int
        {
            return $this->ataque;
        }

        public function getDefensa(): int
        {
            return $this->defensa;
        }

        public function getExperiencia(): int
        {
            return $this->experiencia;
        }

        public function getFechaNacimiento(): string
        {
            return $this->fecha_nacimiento;
        }

        public function isActivo(): bool
        {
            return $this->activo;
        }

        // SETTERS

        public function setId(?int $id): void
        {
            $this->id = $id;
        }

        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function setFuerza(int $fuerza): void
        {
            $this->fuerza = $fuerza;
        }

        public function setAtaque(int $ataque): void
        {
            $this->ataque = $ataque;
        }

        public function setDefensa(int $defensa): void
        {
            $this->defensa = $defensa;
        }

        public function setExperiencia(int $experiencia): void
        {
            $this->experiencia = $experiencia;
        }

        public function setFechaNacimiento(string $fecha_nacimiento): void
        {
            $this->fecha_nacimiento = $fecha_nacimiento;
        }

        public function setActivo(bool $activo): void
        {
            $this->activo = $activo;
        }

        // DEVOLVER TODOS LOS DATOS COMO ARRAY

        public function toArray(): array
        {
            return [
                "id" => $this->id,
                "nombre" => $this->nombre,
                "fuerza" => $this->fuerza,
                "ataque" => $this->ataque,
                "defensa" => $this->defensa,
                "experiencia" => $this->experiencia,
                "fecha_nacimiento" => $this->fecha_nacimiento,
                "activo" => $this->activo
            ];
        }
    }
