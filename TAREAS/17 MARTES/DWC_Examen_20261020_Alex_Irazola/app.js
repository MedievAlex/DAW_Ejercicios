// ----------------------------------------------------- Obtener elementos del DOM
const title = document.getElementById("title");
const category = document.getElementById("category");
const priority = document.getElementById("priority");

const message = document.getElementById("message");
const taskList = document.getElementById("taskList");

const btnSave = document.querySelectorAll("button")[0];
const btnDel = document.getElementById("clearAllBtn");

// Cargar tareas del Local Storage
let tareas = JSON.parse(localStorage.getItem("tareas")) || [];

// ----------------------------------------------------- Event Listeners
btnSave.addEventListener("click", () => {
    const taskTitle = title.value.trim();
    const taskCategory = category.value.trim();
    const taskPriority = priority.value.trim();

    if (taskTitle) {
        tareas.push({ title: taskTitle, category: taskCategory, priority: taskPriority });
        title.value = "";

        message.classList.add("ok"); // Clase
        message.textContent = "Tarea guardada correctamente.";

        guardar();
        cargar();
    } else {
        message.classList.add("error"); // Clase
        message.textContent = "No se permite guardar una tarea sin sombre.";
    }
});

btnDel.addEventListener("click", () => {
    localStorage.clear();

    cargar();
});

// ----------------------------------------------------- Funciones
// Función para actualizar la lista de tareas en el DOM
function cargar() {
    taskList.innerHTML = "";
    tareas = JSON.parse(localStorage.getItem("tareas")) || [];

    tareas.forEach((tarea, index) => {
        const article = document.createElement("article");
        article.classList.add("task-item"); // Clase

        const div = document.createElement("div");
        article.appendChild(div);

        const strong = document.createElement("strong");
        strong.textContent = tarea.title.toUpperCase();
        div.appendChild(strong);

        const small = document.createElement("small");
        small.textContent = "[ Categoría: " + tarea.category + " | Prioridad: " + tarea.priority + " ]";
        div.appendChild(small);

        // Botón para eliminar tarea
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Eliminar";
        deleteButton.addEventListener("click", (e) => {
            e.stopPropagation();
            tareas.splice(index, 1);

            guardar();
            cargar();
        });
        article.appendChild(deleteButton);

        taskList.appendChild(article);
    });
}

// Guardar tareas en el Local Storage
function guardar() {
    localStorage.setItem("tareas", JSON.stringify(tareas));
}

cargar();