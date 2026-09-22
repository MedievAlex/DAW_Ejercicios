/* 
Ejercicio 6. Objetos literales
Modelar un objeto alumno con nombre, módulo, notaMedia y método resumen(). 
Mostrar resumen por consola.

node "UD1\1-Ejercicios Prácticos\1_6_Objetos_literales.js" 
*/

var alumno = {
    nombre: "Edurne",
    modulo: "MEL",
    notaMedia: 9.5,
    resumen(){
        return this.nombre + " del modulo " + this.modulo + " tiene de nota media un " + this.notaMedia;
    }  
};

console.log("Ejercicio 06");
console.log("-------------------------");

console.log(alumno.resumen());

console.log("-------------------------");
