/*
Ejercicio 8. Calculadora básica
Diseñar interfaz con dos inputs y botones de sumar, restar, multiplicar 
y dividir. Mostrar resultado en pantalla y validar divisiones por cero.

*/

const numUno = document.getElementById("numUno");
const numDos = document.getElementById("numDos");
const pHistorial = document.getElementById("pHistorial");

const btnSuma = document.getElementById("btnSuma");
const btnResta = document.getElementById("btnResta");
const btnMult = document.getElementById("btnMult");
const btnDiv = document.getElementById("btnDiv");
const btnBor = document.getElementById("btnBor");

var numeroUno;
var numeroDos;
var suma;
var resta;
var multiplicacion;
var division;
var resultado;

btnSuma.addEventListener("click", function () {
    numeroUno = numUno.valueAsNumber;
    numeroDos = numDos.valueAsNumber;
    suma = numeroUno + numeroDos;

    resultado = numeroUno + " + " + numeroDos + " = " + suma + "</br>";
    mostrarResultado(resultado);
});

btnResta.addEventListener("click", function () {
    numeroUno = numUno.valueAsNumber;
    numeroDos = numDos.valueAsNumber;
    resta = numeroUno - numeroDos;

    resultado = numeroUno + " - " + numeroDos + " = " + resta + "</br>";
    mostrarResultado(resultado);
});

btnMult.addEventListener("click", function () {
    numeroUno = numUno.valueAsNumber;
    numeroDos = numDos.valueAsNumber;
    multiplicacion = numeroUno * numeroDos;

    resultado = numeroUno + " x " + numeroDos + " = " + multiplicacion + "</br>";
    mostrarResultado(resultado);
});

btnDiv.addEventListener("click", function () {
    numeroUno = numUno.valueAsNumber;
    numeroDos = numDos.valueAsNumber;

    if (comprobarDivision(numeroUno, numeroDos)) {
        division = numeroUno / numeroDos;

        resultado = numeroUno + " / " + numeroDos + " = " + division + "</br>";
    } else {
        resultado = "[ERROR]: No se puede dividir con 0." + "</br>";
    }

    mostrarResultado(resultado);
});

btnBor.addEventListener("click", function () {
    numUno.value = "";
    numDos.value = "";
});

function comprobarDivision(numA, numB) {
    if (numA == 0 || numB == 0) {
        return false;
    } else {
        return true;
    }
}

function mostrarResultado(res) {
    //alert(res);
    pHistorial.insertAdjacentHTML("afterbegin", res);
}