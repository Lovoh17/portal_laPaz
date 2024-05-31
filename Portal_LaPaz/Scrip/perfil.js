let selectedFile;
let reader; // Declarar la variable reader aquí

document.getElementById('fileInput').addEventListener('change', function(event) {
    selectedFile = event.target.files[0];
    console.log(selectedFile); // Verificar que el archivo se esté seleccionando correctamente
    reader = new FileReader(); // Inicializar la variable reader aquí
});

document.getElementById('btnApply').addEventListener('click', function() {
    console.log('Botón clickeado'); // Verificar que el botón se esté haciendo clic correctamente
    if (selectedFile) {
        reader.onload = function(e) {
            console.log(e.target.result); // Verificar que el archivo se esté leyendo correctamente
            const img = document.getElementById('selectedImage');
            img.src = e.target.result;
            img.style.display = ''; // Mostrar la imagen
        }
        reader.readAsDataURL(selectedFile); // Leer el archivo seleccionado
    }
});