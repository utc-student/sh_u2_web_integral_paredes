// Datos iniciales
let currentData = {
    students: 100, // Inicialmente 100 alumnos
    courses: 40,   // Inicialmente 40 cursos
    teachers: 10   // Inicialmente 10 profesores
};

// Función para incrementar los datos de manera aleatoria
function incrementData() {
    currentData.students += Math.floor(Math.random() * 20) + 1; // Suma entre 1 y 20
    currentData.courses += Math.floor(Math.random() * 20) + 1;  // Suma entre 1 y 20
    currentData.teachers += Math.floor(Math.random() * 20) + 1; // Suma entre 1 y 20
}

// Función para actualizar el DOM con los datos actuales
function updateDashboard() {
    document.getElementById('studentsCount').textContent = currentData.students;
    document.getElementById('coursesCount').textContent = currentData.courses;
    document.getElementById('teachersCount').textContent = currentData.teachers;
}

// Inicializar los datos y configurar la actualización periódica
function initDashboard() {
    // Actualizar el DOM con los datos iniciales
    updateDashboard();

    // Configurar actualización periódica cada minuto
    setInterval(() => {
        incrementData(); // Incrementar los datos
        updateDashboard(); // Actualizar el DOM con los nuevos datos
    }, 60 * 1000); // Cada 1 minuto (60,000 ms)
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', initDashboard);
