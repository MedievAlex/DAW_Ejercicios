<?php

class Usuario
{
    private int $id;
    private string $nombre;
    private string $email;
    
    public function __construct(int $id, string $nombre, string $email){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
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
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }
}