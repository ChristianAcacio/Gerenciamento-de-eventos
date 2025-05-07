//MOTRAR A SENHA
function Mostrar_senha(){
    const input = document.getElementById('senha');
    input.type = input.type === 'password'? 'text' : 'password';
}



//SLIDE CARROSEL
let contador = 1;
document.getElementById("radio1").checked = true;

setInterval(() => {
  contador++;
  if (contador > 4) contador = 1;
  document.getElementById("radio" + contador).checked = true;
  document.querySelector('.slides-box').style.animation = 'none';
  document.querySelector('.slides-box').offsetHeight;
  document.querySelector('.slides-box').style.animation = null;
}, 10000);



//ABRIR E FECHAR MENUS 
function pagamento(){
  document.getElementById("pagamento").style.display = "flex";
}

function concluido(){
  document.getElementById("pagamento").style.display = "none";
  document.getElementById("concluido").style.display = "flex";
}

function fechar(){
  document.getElementById("concluido").style.display = "none";
}

function mostrar_menu(){
  document.getElementById("menu_nav").style.display = "flex";
}



//Aprovar e rejeitar eventos

function aprovar(evento){
  document.getElementById(evento).className = "aprovado";
}

function rejeitar(evento){
  document.getElementById(evento).className = "rejeitado";
}


//Mostar descrição conforme o evento selecionado

window.onload = function () {
  const params = new URLSearchParams(window.location.search);
  const evento = params.get("evento");

  if (evento) {
      const elemento = document.getElementById("expocrato");
      if (elemento) {
          elemento.classList.add(evento);
      }
  }
}