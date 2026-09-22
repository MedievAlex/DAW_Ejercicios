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

console.log("Ejercicio 04");
console.log("-------------------------");

function saludar(nombre) {
    return "Hola, " + nombre;
}

function esPar(n) {
    let par;
    if (n % 2 == 0) {
        par = true;
        return n + " es par";
    } else {
        par = false;
        return n + " es impar";
    }
}

function maximo(a, b) {
    if (a > b) {
        return a + " es mayor";
    } else if (a < b) {
        return b + " es mayor";
    } else {
        return " ambos numeros son iguales";
    }
}

console.log(saludar(nombre));

console.log(esPar(5));

console.log(maximo(5, 10));

console.log("-------------------------");
