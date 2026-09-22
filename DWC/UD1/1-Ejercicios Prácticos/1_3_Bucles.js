/*
Ejercicio 3. Bucles
Imprimir la tabla de multiplicar de un número y calcular la suma de 1 
a n con for.

node "UD1\1-Ejercicios Prácticos\1_3_Bucles.js"
*/

var numero = 5;
var n = 12;
var suma = 0;

console.log("Ejercicio 03");
console.log("-------------------------------");

for(let i = 1; i <= n; i++){
    suma = suma + numero * i;
    console.log(numero + " x " + i + " = " + numero * i);
}

console.log("La suma es: " + suma);

console.log("-------------------------------");
