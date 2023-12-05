const MENSAGEM = 50
const TEMPO_INICIAL = 5
var pontos
var tempo

function iniciarJogo() {
    
    pontos = 0
    tempo = TEMPO_INICIAL
    var tela = document.getElementById("tela")
    tela.classList.remove('d-none')
   /* tela.innerHTML = ""
    for(let i=0; i < BANDEIRAS; i++)
    {
        var bandeira = document.createElement("img")
        bandeira.src = "img/bandeirazul.png"
        bandeira.id = 'm' + i
        
        bandeira.onclick = function(){
            pegarBandeira(this);            
         

        }
        tela.appendChild(bandeira)
    }*/
    timer = setInterval(contarTempo, 1000);
}

/*function pegarBandeira(elemento){
    elemento.src = "img/bandeiravermelha.png"
    elemento.onclick = null
    pontos++
}*/

function contarTempo()
{
        tempo--
        document.getElementById("tempo").innerHTML = tempo
    
    if(tempo< 0){
        clearInterval(timer)
        alert("Você só conseguiu atender "+pontos+" mensagens. Com o chatbot isso seria muito mais fácil")
        location.reload();
        iniciarJogo()
    }
}


function pegou(mensagem) {
    pontos++
    document.getElementById("pontos").innerHTML = pontos
    mensagem.style.position = 'absolute';
    mensagem.style.bottom = geraPosicao(10, 90);
    mensagem.style.left = geraPosicao(10, 90);
    console.log('mensagem atendida');
}
function mudarPos(mensagem){
    mensagem.style.position = 'absolute';
    mensagem.style.bottom = geraPosicao(10, 90);
    mensagem.style.left = geraPosicao(10, 90);

}
function geraPosicao(min, max) {
    const ajusteMin = -20; 
    return (Math.random() * (max - ajusteMin) + ajusteMin) + "%";
}
