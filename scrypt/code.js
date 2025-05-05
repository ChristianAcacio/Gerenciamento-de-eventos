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