var tabla = document.getElementById("tabla_mostrar");
tabla.style.display = "none";

function ocultar() {
    document.getElementById("inicio").style.display = "none";
    tabla.style.display = "";
}

function aparecer() {
    document.getElementById("inicio").style.display = "block";
    document.getElementById("tabla_mostrar").style.display = "none";
}

function buscarNotas() {
    document.getElementById("tabla_mostrar").style.display = "block";
}
function cambiarSelectores() {
    const selectNivel = document.getElementById('nivel');
    const selectTrimestre = document.getElementById('trimestre');
    const selectPeriodo = document.getElementById('periodo');
    

    const nivelSeleccionado = selectNivel.value;

    // Mostrar u ocultar los selectores según la selección de nivel académico
    if (nivelSeleccionado === 'bach' || nivelSeleccionado === 'bach') {
        selectPeriodo.style.display = '';
        selectTrimestre.style.display = 'none';
    } else {
        selectPeriodo.style.display = 'none';
        selectTrimestre.style.display = '';
    }
}

document.getElementById('nivel').addEventListener('change', cambiarSelectores);

// Llamar a la función inicialmente para configurar los selectores correctamente
cambiarSelectores();


var tabla = document.getElementById("tabla");
tabla.style.display = "none";
function ocultar(){
    document.getElementById("inicio").style.display = "none";
    document.getElementById("tabla").style.display = "";
}
var o = document.getElementById("inicio");
function ocultar(){
    o.style.display = "none";
    tabla.style.display = "";
}
function aparecer(){
    o.style.display = "block";
    tabla.style.display = "none";

}
function Salir(){
    window.history.back();
}
function openPerfil(){
    window.open("/web/perfil.php");
}