// Funções recebem os parâmetros do ID e ação
function aprovar(id_evento) {
    enviarAcao(id_evento, 'APROVADO');
}

function negar(id_evento) {
    enviarAcao(id_evento, 'NEGADO');
}

// Recebe os parâmetros e envia o POST para 'aprovacao_eventos.php' com o Fetch
function enviarAcao(id_evento, acao) {
    fetch('aprovacao_eventos.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        // Corpo da requisição com os dados do id e ação
        // encodeURICOmponent para garantir que os valores sejam seguros para envio por URL
        body: `id_evento=${encodeURIComponent(id_evento)}&acao=${encodeURIComponent(acao)}`,
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById(`evento_${id_evento}`).innerHTML = data;
    });
}