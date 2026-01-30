const roleta = document.querySelector('.roleta');
const itens = document.querySelectorAll('.img-item');
const container = document.querySelector('.roleta-container');

let indiceAtual = 1; 
let estaAnimando = false;

function navegar(direcao) {
    if (estaAnimando) return;
    estaAnimando = true;
    
    // Calcula o novo índice com loop infinito
    indiceAtual = (indiceAtual + direcao + itens.length) % itens.length;
    
    atualizarRoleta();
    
    setTimeout(() => {
        estaAnimando = false;
    }, 600);
}

function atualizarRoleta() {
    // 1. Pegamos a largura de UM item e do CONTAINER
    const larguraItem = itens[0].offsetWidth; 
    const larguraContainer = container.offsetWidth;

    // 2. O cálculo mágico:
    // Movemos a roleta para o item atual, mas somamos metade do container 
    // e subtraímos metade do item para ele ficar no CENTRO exato.
    const offset = -(indiceAtual * larguraItem) + (larguraContainer / 2) - (larguraItem / 2);
    
    roleta.style.transform = `translateX(${offset}px)`;
    
    // 3. Gerenciamento de classes (Ativo e Lateral)
    itens.forEach((item, index) => {
        item.classList.remove('ativo', 'lateral');
        
        if (index === indiceAtual) {
            item.classList.add('ativo');
        } else {
            // Verifica se é vizinho (incluindo o loop entre o último e o primeiro)
            const dist = Math.abs(index - indiceAtual);
            if (dist === 1 || dist === itens.length - 1) {
                item.classList.add('lateral');
            }
        }
    });
}

// Reajusta a posição se a janela mudar de tamanho (importante para responsividade)
window.addEventListener('resize', atualizarRoleta);

document.addEventListener('DOMContentLoaded', () => {
    atualizarRoleta();
});