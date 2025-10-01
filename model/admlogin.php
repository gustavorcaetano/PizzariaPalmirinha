<?php
    $login = $_POST['cxloginadm'];
    $senha = $_POST['cxsenhaadm'];

    if($login == "administrador" && $senha == "ifsp@2024"){
        echo "<script>
                alert('Bem-vindo chefe!');
                window.location.href='../view/cadastrarvendedor.php';
            </script>";
    }
    else{
        echo "<script>
                alert('Login ou senha incorretos.');
                window.location.href='../view/loginadm.php';
            </script>";
    }
?>