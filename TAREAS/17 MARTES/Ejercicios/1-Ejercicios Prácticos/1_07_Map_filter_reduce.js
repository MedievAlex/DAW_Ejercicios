/*
Ejercicio 07. map, filter, reduce
Con un array de productos {nombre, categoria, precio}, obtener: solo 
categoría "informática", nombres en mayúsculas y coste total del carrito.

node "UD1\1-Ejercicios Prácticos\1_07_Map_filter_reduce.js"
*/

var productos = [
    {
        nombre: "Leche condensada",
        categoria: "Alimento",
        precio: 4.95
    },
    {
        nombre: "Raton inalambrico",
        categoria: "Informatica",
        precio: 15.99
    },
    {
        nombre: "Fregona",
        categoria: "Hogar",
        precio: 1.2
    },
    {
        nombre: "Tarjeta grafica",
        categoria: "Informatica",
        precio: 4000
    }
];
var carrito = [];
var coste = 0.0;

console.log("Ejercicio 07");
console.log("-------------------------");

carrito = productos.filter(function (item) {
    return item.categoria == "Informatica";
})

for (let i = 0; i < carrito.length; i++) {
    console.log("- " + carrito[i].nombre.toUpperCase());
    coste = coste + carrito[i].precio;
}

console.log("Total carrito: " + coste + "€");

console.log("-------------------------");