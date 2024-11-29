let primera = document.querySelector(".campo-curp-primera");
let campo = document.querySelector(".campo-curp-registro");

function fecha() {
  var now = new Date();
  var datetime = now.toLocaleString();

  // Insert date and time into HTML
  document.getElementById("fecha-actual").innerHTML = datetime;
}
setInterval(fecha, 1000);

function displayCampo() {
  campo.style.display = "flex";
  campo.style.flexDirection = "row";
}

function displayPrimeraVez() {
  primera.style.display = "flex";
  primera.style.flexDirection = "row";
}

function checarRegistro() {
  if (document.getElementById("registro-existente").checked) {
    primera.style.display = "none";
    displayCampo();
  } else if (document.getElementById("nuevo").checked) {
    campo.style.display = "none";
    displayPrimeraVez();
  }
}
