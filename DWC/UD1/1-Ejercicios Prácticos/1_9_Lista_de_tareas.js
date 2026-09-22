/*
Ejercicio 9. Lista de tareas
Crear app To-Do con añadir, marcar completada y eliminar tarea. 
Guardar estado en localStorage.

node "UD1\1-Ejercicios Prácticos\1_9_Lista_de_tareas.js"
*/

// Obtener referencias a elementos del DOM
const taskInput = document.getElementById("inpTarea");
const addTaskButton = document.getElementById("btnAgregar");
const taskList = document.getElementById("ulLista");

// Cargar tareas del Local Storage
let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

// Función para actualizar la lista de tareas en el DOM
function renderTasks() {
    taskList.innerHTML = "";
    tasks.forEach((task, index) => {
        const li = document.createElement("li");
        li.textContent = task.text;
        li.className = task.completed ? "completed" : "";

        // Marcar tarea como completada al hacer click
        li.addEventListener("click", () => {
            task.completed = !task.completed;
            saveTasks();
            renderTasks();
        });

        // Botón para eliminar tarea
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Eliminar";
        deleteButton.addEventListener("click", (e) => {
            e.stopPropagation(); // Evita que se marque como completado
            tasks.splice(index, 1);
            saveTasks();
            renderTasks();
        });

        li.appendChild(deleteButton);
        taskList.appendChild(li);
    });
}

// Guardar tareas en el Local Storage
function saveTasks() {
    localStorage.setItem("tasks", JSON.stringify(tasks));
}

// Agregar nueva tarea
addTaskButton.addEventListener("click", () => {
    const taskText = taskInput.value.trim();
    if (taskText) {
        tasks.push({ text: taskText, completed: false });
        taskInput.value = "";
        saveTasks();
        renderTasks();
    }
});

// Renderizar tareas al cargar la página
renderTasks();