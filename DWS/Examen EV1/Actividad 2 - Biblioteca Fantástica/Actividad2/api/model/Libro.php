<?php

class Libro
{
    private int $id;
    private string $titulo;
    private string $genero;
    private DateTime $anio_publicacion;
    private int $id_autor;

    public function __construct(int $id, string $titulo, string $genero, DateTime $anio_publicacion, int $id_autor)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->anio_publicacion = $anio_publicacion;
        $this->id_autor = $id_autor;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self {
        $this->titulo = $titulo;
        return $this;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    public function setGenero(string $genero): self {
        $this->genero = $genero;
        return $this;
    }

    public function getAnioPublicacion(): DateTime {
        return $this->anio_publicacion;
    }

    public function setAnioPublicacion(DateTime $anio_publicacion): self {
        $this->anio_publicacion = $anio_publicacion;
        return $this;
    }

    public function getIdAutor(): int {
        return $this->id_autor;
    }

    public function setIdAutor(int $id_autor): self {
        $this->id_autor = $id_autor;
        return $this;
    }
}
