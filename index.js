const roleta = document.querySelector('.roleta');
const itens = document.querySelectorAll('.img-item');
let indiceAtual = 1; // Começa do meio
let estaAnimando = false;

function navegar(direcao) {
    if (estaAnimando) return;
    estaAnimando = true;
    
    const novoIndice = indiceAtual + direcao;
    
    // Efeito infinito - volta para o início/final
    if (novoIndice < 0) {
        indiceAtual = itens.length - 1; // Vai para a última imagem
    } else if (novoIndice >= itens.length) {
        indiceAtual = 0; // Volta para a primeira imagem
    } else {
        indiceAtual = novoIndice;
    }
    
    atualizarRoleta();
    
    // Libera para próxima animação após 600ms
    setTimeout(() => {
        estaAnimando = false;
    }, 600);
}

function atualizarRoleta() {
    const offset = -indiceAtual * 370; // 370px é a largura de cada item
    roleta.style.transform = `translateX(${offset}px)`;
    
    itens.forEach((item, index) => {
        item.classList.remove('ativo', 'lateral');
        
        if (index === indiceAtual) {
            item.classList.add('ativo');
        } else if (Math.abs(index - indiceAtual) === 1) {
            item.classList.add('lateral');
        } else if (indiceAtual === 0 && index === itens.length - 1) {
            // Quando está na primeira, a última fica à esquerda
            item.classList.add('lateral');
        } else if (indiceAtual === itens.length - 1 && index === 0) {
            // Quando está na última, a primeira fica à direita
            item.classList.add('lateral');
        }
    });
}

// Inicializa a roleta quando a página carregar
document.addEventListener('DOMContentLoaded', () => {
    atualizarRoleta();
});