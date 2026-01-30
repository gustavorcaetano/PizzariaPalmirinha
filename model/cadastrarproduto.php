<?php
require_once('../factory/conexao.php');

    $conn = new Caminho();
    $query = "INSERT INTO tbprodutos (prod_nome, prod_preco, prod_descricao, prod_foto) VALUES (:cxnomepizza, :cxprecopizza, :cxdescricaopizza, :nome_imagem)";
    $foto = $_FILES["cxfotopizza"];

        $error = array();

        if (!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])) {
            $error[0] = "Isso não é uma imagem.";
        }

        if (count($error) == 0) {
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            $caminho_imagem = "../img/" . $nome_imagem;
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);

            $cadastrar = $conn->getConn()->prepare($query);
            $cadastrar->bindParam(':cxnomepizza', $_POST['cxnomepizza'], PDO::PARAM_STR);
            $cadastrar->bindParam(':cxprecopizza', $_POST['cxprecopizza'], PDO::PARAM_STR);
            $cadastrar->bindParam(':cxdescricaopizza', $_POST['cxdescricaopizza'], PDO::PARAM_STR);
            $cadastrar->bindParam(':nome_imagem', $nome_imagem, PDO::PARAM_STR);
            $cadastrar->execute();

            if ($cadastrar->rowCount()) {
                echo "
                <script> alert('Pizza cadastrada com sucesso.')
                location.href = '../view/cadastrarpizza.php';
                </script>";
            } else {
                echo ('<script>Produto não cadastrado.</script>');
            }
        }

        $totalerro = "";

        if (count($error) != 0) {
            for ($cont = 0; $cont <= sizeof($error); $cont++) {
                if (!empty($error[$cont])) $totalerro = $totalerro . $error[$cont] . '\n';
            }

            echo('<script>window.alert("' . $totalerro . '");window.location="../view/cadastrarpizza.php";</script>');
        }
?>