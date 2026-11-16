<?php
/*
Ejercicio 01

1. Clase FiguraGeometrica.php
    Guardar la clase en un archivo llamado: FiguraGeometrica.php
    La clase tendrá los siguientes atributos:
        • nombre: nombre de la figura. Será de tipo string.
        • color: color de la figura. Será de tipo string.
2. Crear los métodos
    La clase deberá tener los siguientes métodos:
        • El constructor no recibirá ningún parámetro.
        • Un método getNombre() que devuelva el nombre.
        • Un método setNombre() que permita modificar el nombre.
        • Un método getColor() que devuelva el color.
        • Un método setColor() que permita modificar el color.
        • Un método escribir() que muestre en el navegador el nombre y
        el color de la figura.
3. Crear el programa principal
    Crear otro archivo llamado: index.php
    En este archivo se deberá:
        1. Incluir la clase FiguraGeometrica mediante require_once.
        2. Crear una instancia de FiguraGeometrica.
        3. Asignarle:
            o Nombre: A
            o Color: azul
        4. Mostrar por pantalla la información de la figura utilizando el
        método escribir().
4. Clase Triangulo.php
    Crear una clase llamada Triangulo que herede de
    FiguraGeometrica.
    La clase tendrá los siguientes atributos propios:
        • base: tipo float.
        • altura: tipo float.
    La clase deberá tener un constructor que permita recibir:
        • Nombre.
        • Color.
        • Base.
        • Altura.
    El constructor deberá utilizar el constructor de la clase padre
    mediante:
        parent::__construct()
    La clase Triangulo deberá disponer de los siguientes métodos:
        escribir(): que deberá mostrar en el navegador:
            • Nombre.
            • Color.
            • Base.
            • Altura.
        calcularArea(): que deberá calcular y devolver el área del triángulo
        utilizando: área = (base × altura) / 2
    El método deberá devolver un valor de tipo float.
5. Modificar index.php
    Modificar el archivo index.php para trabajar también con la clase
    Triangulo.
    Se deberá:
        1. Incluir Triangulo.php.
        2. Crear un objeto Triangulo con los siguientes datos:
            Nombre: B
            Color: verde
            Base: 3
            Altura: 5
        3. Mostrar los datos del triángulo utilizando escribir().
        4. Mostrar el área utilizando calcularArea(). 
*/

// Definición de la clase
abstract class FiguraGeometrica
{
    // Atributos
    private string $nombre;
    private string $color;

    public function __construct() {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void // void - Solo cambia el valor deseado
    {
        $this->nombre = $nombre;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self // self - Cambia el valor y devuelve el objeto actualizado
    {
        $this->color = $color;
        return $this;
    }

    public function escribir() 
    {
        echo ("Nombre: " . $this->nombre . "<br>");
        echo ("Color: " . $this->color . "<br>");
    }
}

?>