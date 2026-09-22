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

function suma() {
    numUno = document.getElementById('numUno').valueAsNumber;
    numDos = document.getElementById('numDos').valueAsNumber;
    suma = numUno + numDos;

    alert(numUno + " + " + numDos + " = " + suma);
}

function resta() {
    numUno = document.getElementById('numUno').valueAsNumber;
    numDos = document.getElementById('numDos').valueAsNumber;
    resta = numUno - numDos;

    alert(numUno + " - " + numDos + " = " + resta);
}

function multiplicacion() {
    numUno = document.getElementById('numUno').valueAsNumber;
    numDos = document.getElementById('numDos').valueAsNumber;
    multiplicacion = numUno * numDos;

    alert(numUno + " x " + numDos + " = " + multiplicacion);
}

function division() {
    numUno = document.getElementById('numUno').valueAsNumber;
    numDos = document.getElementById('numDos').valueAsNumber;

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