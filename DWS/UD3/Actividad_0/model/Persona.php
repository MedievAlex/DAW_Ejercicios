<<?php

    class Persona
    {
        private int $id;
        private string $nombre;
        private int $edad;

        public function __construct(
            int $id = 0,
            string $nombre = "",
            int $edad = 0
        ) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function getEdad(): int
        {
            return $this->edad;
        }

        public function setEdad(int $edad): void
        {
            $this->edad = $edad;
        }

        public function __toString(): string
        {
            return $this->id . " - " .
                $this->nombre . " - " .
                $this->edad;
        }
    }
?>