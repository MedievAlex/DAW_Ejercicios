/*
Ejercicio 5. Gestión de array
A partir de una lista de precios: calcular media, máximo y mínimo, 
y generar un array con IVA aplicado.

node "UD1\1-Ejercicios Prácticos\1_5_Gestión_de_array.js"
*/

const iva = 0.21;
var precios = [15.95, 7.20, 35.99, 0.50];
var conIVA = [];
var media = 0;
var maximo = 0;
var minimo = 0;

console.log("Ejercicio 05");
console.log("-------------------------");

for (let i = 0; i < precios.length; i++) {
      media = media + precios[i];
}
media = media / precios.length;

console.log("Media de precios: ");
console.log(media + "€");

maximo = Math.max(...precios);
console.log("Maximo: ");
console.log(maximo + "€");

minimo = Math.min(...precios);
console.log("Minimo: ");
console.log(minimo + "€");

for (let i = 0; i < precios.length; i++) {
      conIVA[i] = precios[i] + (precios[i] * iva);
}

console.log("Precios con IVA: ");
for (let i = 0; i < conIVA.length; i++) {
      console.log(precios[i] + "€ -> " + conIVA[i] + "€");
}

console.log("-------------------------");
