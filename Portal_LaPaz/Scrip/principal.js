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
    const myDiv = document.getElementById('Filter_notas');
    if (window.innerWidth <= 600) {
        myDiv.style.display = 'none';
    } else {
        myDiv.style.display = 'block';
    }
    if (window.innerWidth <= 800) {
        myDiv.style.display = 'none';
    } else {
        myDiv.style.display = 'block';
    }
    if (window.innerWidth <= 1000) {
        myDiv.style.display = 'none';
    } else {
        myDiv.style.display = 'block';
    }
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
function principal(){
    window.location.replace("/Portal_LaPaz/Web/Principal.php");
}
function Salir(){
    window.location.replace("/Portal_LaPaz/Web/index.html");
}
function openPerfil(){
    window.location.href = "/Portal_LaPaz/Web/perfil.php";
}

const frases = [
    "DIOS ME VE",
    "ADELANTE SIEMPRE ADELANTE, PUES LO QUIERE SAN JOSE",
    "TODO POR LA GLORIA DE JESUS MARIA Y JOSE",
    "YO AMO SER JOSEFINO",
    "PRESENCIA DE DIOS, ESTIMA DE SI MISMO Y AMOR AL PROJIMO",
    "BENDITO SEAS JESUS",
    "INFINITAMENTE SEAS ALABADO, MI JESUS SACRAMENTADO",
    "SAN JOSE LUZ DE LOS PATRIARCAS",
];

const indiceAleatorio = Math.floor(Math.random() * frases.length);
const fraseAleatoria = frases[indiceAleatorio];

document.addEventListener("DOMContentLoaded", () => {
    const fraseElemento = document.createElement("span");
    fraseElemento.setAttribute("id", "salmo");
    fraseElemento.textContent = fraseAleatoria;
    document.body.appendChild(fraseElemento);
});



