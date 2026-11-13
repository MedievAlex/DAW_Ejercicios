<?php

class Autor {

    public int $id;
    public string $nombre;
    public string $nacionalidad;
    public DateTime $fecha_nacimiento;

    public function __construct(int $id, string $nombre, string $nacionalidad, DateTime $fecha_nacimiento)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    
    public function getId(): int {
        return $this->id;
    }
    
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    
    public function getNombre(): string {
        return $this->nombre;
    }
    
    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;
        return $this;
    }
    
    public function getNacionalidad(): string {
        return $this->nacionalidad;
    }
    
    public function setNacionalidad(string $nacionalidad): self {
        $this->nacionalidad = $nacionalidad;
        return $this;
    }
    
    public function getFechaNacimiento(): DateTime {
        return $this->fecha_nacimiento;
    }
    
    public function setFechaNacimiento(DateTime $fecha_nacimiento): self {
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }
}

?>