<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pizzaria Palmirinha</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body id="vitrine">
    <header>
        <video autoplay muted loop id="bgvideo">
            <source src="efeito/faiscas.mp4" type="video/mp4">
        </video>

        <img id="logopalmirinha" src="img/palmirinhasemfundo.png" alt="Imagem de uma mulher idosa segurando uma pizza com um avental escrito 'Fica, vai ter pizza!'">
        <nav>
            <a href="view/loginadm.php">Acesso do Administrador</a>
            <a href="view/loginvendedor.php">Acesso do Vendedor</a>
        </nav>
        <div id="textoheader">
            <h1>AUTÊNTICO <span>FORNO A LENHA</span></h1>
            <p>Não importa a receita, comida de vó sempre tem um gostinho de quero mais!</p>
            <br><br>
            <a href="#cardapio">CARDÁPIO</a>
        </div>
    </header>
    
    <section id="cardapio">
        <h1>CARDÁPIO</h1>

		<!--Roleta Imagens com Legendas-->
        <div id="seletor" class="seletor-menu">
            <button class="btn" onclick="navegar(-1)">◀</button>
            
            <div class="roleta-container">
                <div class="roleta">
                    <div class="img-item">
                        <img src="img/imagem1.jpg" alt="Pizza de pepperoni">
                        <div class="legenda">
                            <h3>Pizza de pepperoni</h3>
                            <p>R$ 40,00</p>
                        </div>
                    </div>
                    <div class="img-item">
                        <img src="img/imagem2.jpg" alt="Pizza de frango com catupiry">
                        <div class="legenda">
                            <h3>Pizza de frango com catupiry</h3>
                            <p>R$ 40,00</p>
                        </div>
                    </div>
                    <div class="img-item">
                        <img src="img/imagem3.jpg" alt="Pizza moda da casa">
                        <div class="legenda">
                            <h3>Pizza moda da casa</h3>
                            <p>R$ 45,00</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn" onclick="navegar(1)">▶</button>
        </div>
        
        <!-- Container principal para os cards -->
        <div class="cards-container">
            <?php
                require_once('factory/conexao.php');
                $conn = new Caminho();
                $consulta = "select * from tbprodutos";
                $resultado = $conn->getConn()->prepare($consulta);
                $resultado->execute();

                while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='card' onmouseover='mostrarDescricao(this)' onmouseout='esconderDescricao(this)'>";
                    echo '<img class="fotocardapio" src="img/' . htmlspecialchars($cont['prod_foto']) . '" alt="Foto do produto.">';
                    echo '<h3>' . htmlspecialchars($cont['prod_nome']) . '</h3>';
                    echo '<p>R$ ' . $cont['prod_preco'] . '</p>';
                    echo '<div class="descricao" style="display: none;">' . htmlspecialchars($cont['prod_descricao']) . '</div>';
                    echo "</div>";
                }
            ?>
        </div>
    </section>

    <footer id="contato">
        <p>Telefone: (11) 4002-8922</p>
    </footer>

    <script>
        // Funções para mostrar e esconder a descrição
        function mostrarDescricao(elemento) {
            var descricao = elemento.querySelector('.descricao');
            descricao.style.display = 'block';
        }
        
        function esconderDescricao(elemento) {
            var descricao = elemento.querySelector('.descricao');
            descricao.style.display = 'none';
        }
    </script>
    <script src="index.js"></script>
</body>
</html>