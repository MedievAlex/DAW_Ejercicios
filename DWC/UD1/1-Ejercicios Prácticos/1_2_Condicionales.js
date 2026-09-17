/*
Ejercicio 2. Condicionales
Dado un número, indicar si es positivo, negativo o cero. Después clasificar 
nota numérica en suspenso, aprobado, notable y sobresaliente.

node "UD1\1-Ejercicios Prácticos\1_2_Condicionales.js"
*/

var nota = 1.75;
var resultado = "indefinido";

console.log("La nota: " + nota);

if(1 <= nota && nota <= 4.9){
    resultado = "suspenso";

} else if(5 <= nota && nota <= 5.9){
    resultado = "suficiente";

} else if(6 <= nota && nota <= 6.9){
    resultado = "bien";

} else if(7 <= nota && nota <= 8.9){
    resultado = "muy bien";

} else if(9 <= nota && nota <= 10){
    resultado = "sobresaliente";

} else {
    resultado = "ERROR";

}

console.log("Resultado: " + resultado);