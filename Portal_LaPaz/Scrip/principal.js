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
function Salir(){
    window.open("/Portal_LaPaz/Web/index.html");
}
function openPerfil(){
    window.open("/Portal_LaPaz/Web/perfil.php");
}

const salmos = [
    "Salmo 1: El justo y el impío",
    "Salmo 23: El Señor es mi pastor",
    "Salmo 27: El Señor es mi luz y mi salvación",
    "Salmo 34: Bendeciré al Señor en todo tiempo",
    "Salmo 37: El destino de los malvados y de los justos",
    "Salmo 51: Misericordia, Dios mío, por tu bondad",
    "Salmo 91: Bajo la sombra del Altísimo",
    "Salmo 103: Bendice, alma mía, al Señor",
    "Salmo 121: El Señor es tu guardián",
    "Salmo 139: Señor, tú me sondeas y me conoces",
    "Salmo 150: Alabad al Señor",
    "Salmo 19: La gloria de Dios en la creación y en la ley",
    "Salmo 42: Como el ciervo anhela las corrientes de agua",
    "Salmo 46: Dios es nuestro refugio y fortaleza",
    "Salmo 62: En Dios solo descansa mi alma",
    "Salmo 63: Oh Dios, tú eres mi Dios",
    "Salmo 84: Qué amable es tu morada, Señor de los ejércitos",
    "Salmo 95: Venid, aclamemos al Señor",
    "Salmo 100: Aclama al Señor, toda la tierra",
    "Salmo 119: Tu palabra es una lámpara a mis pies"
];

const indiceAleatorio = Math.floor(Math.random() * salmos.length);
const salmo_rdm = salmos[indiceAleatorio];

document.addEventListener("DOMContentLoaded", () => {
    const salmoElemento = document.createElement("spam");
    salmoElemento.setAttribute("id","salmo")
    salmoElemento.textContent = salmo_rdm;
    document.body.appendChild(salmoElemento);
});


