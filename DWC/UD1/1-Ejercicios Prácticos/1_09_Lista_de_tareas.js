/*
Ejercicio 09. Lista de tareas
Crear app To-Do con añadir, marcar completada y eliminar tarea. 
Guardar estado en localStorage.

*/

// -----------------------------------------------------Obtener elementos del DOM
const inpTarea = document.getElementById("inpTarea");
const btnAgregar = document.getElementById("btnAgregar");
const ulLista = document.getElementById("ulLista");

// -----------------------------------------------------Variables
// Cargar tareas del Local Storage
let tareas = JSON.parse(localStorage.getItem("tareas")) || [];

// -----------------------------------------------------Event Listeners
btnAgregar.addEventListener("click", () => {
    const taskText = inpTarea.value.trim();
    if (taskText) {
        tareas.push({ nombre: taskText, completa: false });
        inpTarea.value = "";
        saveTasks();
        renderTasks();
    }
});

// -----------------------------------------------------Funciones
// Función para actualizar la lista de tareas en el DOM
function renderTasks() {
    ulLista.innerHTML = "";
    tareas.forEach((tarea, index) => {
        const li = document.createElement("li");

        // Botón para eliminar tarea
        const checkBox = document.createElement("checkbox");
        checkBox.addEventListener("change", (e) => {
            if (tarea.completa) {
                checkBox.value = 1;
            }

            saveTasks();
            renderTasks();
        });
        li.appendChild(checkBox);

        li.textContent = tarea.nombre;


        // Marcar tarea como completada al hacer click
        li.addEventListener("click", () => {
            tarea.completa = !tarea.completa;

            saveTasks();
            renderTasks();
        });

        // Botón para eliminar tarea
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Eliminar";
        deleteButton.addEventListener("click", (e) => {
            e.stopPropagation(); // Evita que se marque como completado
            tareas.splice(index, 1);

            saveTasks();
            renderTasks();
        });
        li.appendChild(deleteButton);

        ulLista.appendChild(li);
    });
}

// Guardar tareas en el Local Storage
function saveTasks() {
    localStorage.setItem("tareas", JSON.stringify(tareas));
}

// Renderizar tareas al cargar la página
renderTasks();