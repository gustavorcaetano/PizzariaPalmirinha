<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="./img/palmirinhasemfundo.png" />
    <title>Pizzaria Palmirinha</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body id="vitrine" style="overflow-x: hidden;">
    <header>
        <video style="width: 100%;" autoplay muted loop id="bgvideo">
            <source src="efeito/faiscas.mp4" type="video/mp4">
        </video>

        <img id="logopalmirinha" src="img/palmirinhasemfundo.png" alt="Imagem de uma mulher idosa segurando uma pizza">
        <nav>
            <a href="view/loginadm.php">Acesso do Administrador</a>
            <a href="view/loginvendedor.php">Acesso do Vendedor</a>
        </nav>
        <div id="textoheader">
            <h1>AUTÊNTICO <span>FORNO A LENHA</span></h1>
            <p>Não importa a receita, comida de vó sempre tem um gostinho de quero mais!</p>
            <br><br>
            <a href="#cardapio-total">CARDÁPIO</a>
        </div>
    </header>
    
    <section id="cardapio">
        <h1>ESPECIAIS DO DIA</h1>

        <div id="seletor" class="seletor-menu">
    <button class="btn btn-prev" onclick="navegar(-1)">❮</button>
    
    <div class="roleta-container">
        <div class="roleta" id="roleta-pizzas">
            <div class="img-item ativo">
                <img src="img/imagem1.png" alt="Pizza de Pepperoni">
                <div class="legenda">
                    <h3>Pizza de Pepperoni</h3>
                    <p>R$ 69,99</p>
                </div>
            </div>
            <div class="img-item">
                <img src="img/imagem2.png" alt="Pizza de Frango com Catupiry">
                <div class="legenda">
                    <h3>Pizza de Frango com Catupiry</h3>
                    <p>R$ 69,99</p>
                </div>
            </div>
            <div class="img-item">
                <img src="img/imagem3.png" alt="Pizza Moda da Casa">
                <div class="legenda">
                    <h3>Pizza Moda da Casa</h3>
                    <p>R$ 54,99</p>
                </div>
            </div>
        </div>
    </div>
    
    <button class="btn btn-next" onclick="navegar(1)">❯</button>
</div>
                
                <div id="cardapio-total">
                	<h2>Cardápio</h2>
                </div>
        
        <div class="cards-container">
            <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                
                require_once('factory/conexao.php');
                $conn = new Caminho();
                $consulta = "select * from tbprodutos";
                $resultado = $conn->getConn()->prepare($consulta);
                $resultado->execute();

               while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='card-hut'>";
        // Lado Esquerdo: Conteúdo
        echo "<div class='card-hut-content'>";
            echo "<div class='card-hut-header'>";
                echo "<h3>" . htmlspecialchars($cont['prod_nome']) . "</h3>";
                echo "<p class='descricao'>Aproveite! " . htmlspecialchars($cont['prod_nome']) . " com ingredientes selecionados e massa fresquinha.</p>";
            echo "</div>";
            
            echo "<div class='card-hut-footer'>";
                echo "<p class='preco-tag'>A partir de <br> <strong>R$ " . number_format($cont['prod_preco'], 2, ',', '.') . "</strong></p>";
                echo "<div class='acoes'>";
                    echo "<button class='btn-detalhes'>Detalhes</button>";
                    echo "<button class='btn-adicionar'>Adicionar</button>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

        // Lado Direito: Imagem
        echo "<div class='card-hut-thumb'>";
            echo "<img src='img/" . htmlspecialchars($cont['prod_foto']) . "' alt='Pizza'>";
        echo "</div>";
    echo "</div>";
}
            ?>
        </div>
    </section>

    <footer id="contato" style="background-color: #000; color: #fff; padding: 40px 20px; font-family: Arial, sans-serif; text-align: center;">
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; max-width: 1000px; margin: 0 auto; padding-bottom: 30px;">
            <div style="flex: 1; min-width: 150px;">
                <h3 style="font-size: 14px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">Quem somos</h3>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">Nossa história</p>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">Seja um franqueado</p>
            </div>
            <div style="flex: 1; min-width: 150px;">
                <h3 style="font-size: 14px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">Atendimento</h3>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">(11) 4002-8922</p>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">palmirinhapizzaria@hotmail.com</p>
            </div>
            <div style="flex: 1; min-width: 150px;">
                <h3 style="font-size: 14px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">Termos</h3>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">Política de Privacidade</p>
                <p style="font-size: 13px; color: #ccc; margin: 5px 0;">Termos de uso</p>
            </div>
        </div>
        <hr style="border: 0; border-top: 1px solid #333; max-width: 1000px; margin: 0 auto 30px auto;">
        <div style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <div style="border: 1px solid #333; border-radius: 50%; width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                <img src="./img/palmirinhasemfundo.png" alt="Logo da pizzaria" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <p style="font-size: 10px; color: #666; max-width: 600px; text-align: left; margin: 0;">
                COPYRIGHT © @2026 PIZZARIA Palmirinha - CNPJ: 00.000.000/0001-00 - AVENIDA EXEMPLO, Nº 1234 - SÃO PAULO/SP. TODOS OS DIREITOS RESERVADOS.
            </p>
        </div>
    </footer>

    <script src="./index.js"></script>
</body>
</html>