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

function obtenerNumUno(){
    return document.getElementById("numUno").valueAsNumber;
}

function obtenerNumDos(){
    return document.getElementById("numDos").valueAsNumber;
}

function suma() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    suma = numUno + numDos;

    alert(numUno + " + " + numDos + " = " + suma);
}

function resta() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    resta = numUno - numDos;

    alert(numUno + " - " + numDos + " = " + resta);
}

function multiplicacion() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();
    multiplicacion = numUno * numDos;

    alert(numUno + " x " + numDos + " = " + multiplicacion);
}

function division() {
    numUno = obtenerNumUno();
    numDos = obtenerNumDos();

    if (comprobarDivision(numUno, numDos)) {
        division = numUno / numDos;

        alert(numUno + " / " + numDos + " = " + division);
    } else {
        alert("[ERROR]: No se puede dividir con 0.");
    }
}

function comprobarDivision(numA, numB) {
    if (numA == 0 || numB == 0) {
        return false;
    } else {
        return true;
    }
}