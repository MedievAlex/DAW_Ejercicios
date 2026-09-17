/*
Ejercicio 4. Funciones
Implementar funciones: saludar(nombre), esPar(n), maximo(a,b). 
Probar con distintos datos y documentar salidas esperadas.

node "UD1\1-Ejercicios Prácticos\1_4_Funciones.js" 
*/

let nombre = "Edurne";
let n = "7";
let a = "3";
let b = "5";


function saludar(nombre) {
    return "Hola, " + nombre;
}

function esPar(n) {
    let par;
    if (n % 2 == 0) {
        par = true;
    } else {
        par = false;
    }
}

function maximo(a, b) {
    return "???";
}

const resultado = saludar(nombre);
console.log(resultado);