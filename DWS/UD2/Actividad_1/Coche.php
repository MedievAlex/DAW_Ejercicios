<?php
/*
Ejercicio 01
Crear una clase llamada Coche para representar un coche y
controlar su velocidad.
1. Crear la clase Coche
    Guardar la clase en un archivo llamado: Coche.php
    La clase deberá tener los siguientes atributos:
        • marca: marca del coche.
        • modelo: modelo del coche.
        • velocidad: velocidad actual del coche. Este atributo deberá ser
        privado y comenzar con valor 0.
    La clase deberá disponer de un constructor que reciba la marca y el
    modelo y los almacene en sus correspondientes atributos.
2. Crear los métodos
    La clase deberá tener los siguientes métodos:
        • acelerar($incremento): aumenta la velocidad del coche según
        el valor recibido.
        • frenar($decremento): disminuye la velocidad según el valor
        recibido. La velocidad nunca podrá ser inferior a 0.
        • getVelocidad(): devuelve la velocidad actual.
        • mostrarInfo(): devuelve un texto indicando la marca, el modelo
        y la velocidad actual.

3. Crear el programa principal
    Crear otro archivo llamado: principal.php
    En este archivo:
        1. Incluir la clase Coche utilizando require_once.
        2. Crear un objeto Coche con:
            o Marca: Ford
            o Modelo: Mustang
        3. Hacer que el coche acelere 80 km/h.
        4. Hacer que el coche frene 30 km/h.
        5. Mostrar por pantalla la información del coche utilizando el
        método mostrarInfo()
*/

// Definición de la clase
class Coche
{
    // Atributos
    private string $marca;
    private string $modelo;
    private float $velocidad = 0;

    public function __construct(string $marca, string $modelo, float $velocidad)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getVelocidad(): float
    {
        return $this->velocidad;
    }

    public function acelerar(float $incremento)
    {
        $this->velocidad += $this->velocidad + $incremento;
    }

    public function frenar(float $decremento)
    {
        $this->velocidad += $this->velocidad - $decremento;
    }

    public function mostrarInfo()
    {
        echo ("Marca: " . $this->marca . "<br>");
        echo ("Modelo: " . $this->modelo . "<br>");
        echo ("Velocidad: " . $this->velocidad . "km/h<br>");
    }
}

?>