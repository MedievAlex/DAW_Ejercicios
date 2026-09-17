/*

node "UD1\1-Ejercicios Prácticos\1_0_Introduccion_JavaScript.js"
*/

const nombre = "Edurne";
let edad = 26;
var activo = true;

// CONDICIONAL: if
console.log("-------------------------");
console.log("CONDICIONAL: if");

if (edad >= 18) {
  console.log(nombre + " es mayor de edad");
} else {
  console.log(nombre + " es menor de edad");
}

// BUCLES: for
console.log("-------------------------");
console.log("BUCLES: for");

for (let i = 1; i <= 3; i++) {
  let edad = 26 + i;
    console.log("Proxima edad: " + edad);
}

// ARRAYS
console.log("-------------------------");
console.log("ARRAYS");

const modulos = ["HTML", "CSS", "JavaScript"];
console.log(modulos[2]);

// OBJETOS
console.log("-------------------------");
console.log("OBJETOS");

const alumno = {
  nombre: nombre,
  edad: edad,
  activo: activo
};
console.log("La edad de " + alumno.nombre + " es " + alumno.edad);

// FUNCIONES
console.log("-------------------------");
console.log("FUNCIONES");

function saludar(nombre) {
  return "Hola, " + nombre;
}

const resultado = saludar(nombre);
console.log(resultado);