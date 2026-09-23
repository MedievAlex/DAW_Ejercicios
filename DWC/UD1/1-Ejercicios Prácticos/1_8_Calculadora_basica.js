/*
Ejercicio 8. Calculadora básica
Diseñar interfaz con dos inputs y botones de sumar, restar, multiplicar 
y dividir. Mostrar resultado en pantalla y validar divisiones por cero.

*/

var numUno;
var numDos;
var suma;
var resta;
var multiplicacion;
var division;
var resultado;

function obtenerNumUno(){
    return document.getElementById("numUno").valueAsNumber;
}

function obtenerNumDos(){
    return document.getElementById("numDos").valueAsNumber;
}

function obtenerHistorial(){
    return document.getElementById("pHistorial");
}

function suma() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    suma = numUno + numDos;

    resultado = numUno + " + " + numDos + " = " + suma + "</br>";
    mostrarResultado(resultado);
}

function resta() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    resta = numUno - numDos;

    resultado = numUno + " - " + numDos + " = " + resta + "</br>";
    mostrarResultado(resultado);
}

function multiplicacion() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    multiplicacion = numUno * numDos;

    resultado = numUno + " x " + numDos + " = " + multiplicacion + "</br>";
    mostrarResultado(resultado);
}

function division() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();

    if (comprobarDivision(numUno, numDos)) {
        division = numUno / numDos;

        resultado = numUno + " / " + numDos + " = " + division + "</br>";
    } else {
        resultado = "[ERROR]: No se puede dividir con 0." + "</br>";
    }

    mostrarResultado(resultado);
}

function comprobarDivision(numA, numB) {
    if (numA == 0 || numB == 0) {
        return false;
    } else {
        return true;
    }
}

function mostrarResultado(res) {
    //alert(res);
    obtenerHistorial().insertAdjacentHTML("afterbegin", res);
}