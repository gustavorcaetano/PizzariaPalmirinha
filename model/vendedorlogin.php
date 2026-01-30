<?php
    require_once "../factory/conexao.php";

    if($_POST['cxloginvendedor'] != "" && $_POST['cxsenhavendedor'] != ""){
    
    $conn = new Caminho;
    
    $query = "SELECT * FROM tbvendedores WHERE ven_nome = :nome AND ven_senha = :senha";
    $validar = $conn->getConn()->prepare($query);
    
    $validar->bindParam(':nome', $_POST['cxloginvendedor'], PDO::PARAM_STR);
    $validar->bindParam(':senha', $_POST['cxsenhavendedor'], PDO::PARAM_STR);
    
    $validar->execute();
    
    if($validar->rowCount() > 0){
        echo "<script>
            alert('Bem-vindo!');
            window.location.href='../view/cadastrarpizza.php';
        </script>";
    } else {
        echo "<script>
            alert('Login ou senha incorretos.');
            window.location.href='../view/loginvendedor.php';
        </script>";
    }
    } else {
        echo "<script>
            alert('Dados incompletos.');
            window.location.href='../view/loginvendedor.php';
        </script>";
    }
?>