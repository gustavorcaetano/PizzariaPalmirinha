<?php
    require_once "../factory/conexao.php";
    
    if($_POST['cxproduto'] != ""){
       $conn = new Caminho;
       $query = "insert into tbprodutos
       (prod_nome,prod_descricao,prod_preco)
       values
       (:nome,:descricao,:preco,)"; 

       $cadastrar=$conn->getConn()->
       prepare($query);
       
       $cadastrar->
       bindParam(':nome',$_POST['cxnomepizza'],
       PDO::PARAM_STR);

       $cadastrar->
       bindParam(':descricao',$_POST['cxdescricaopizza'],
       PDO::PARAM_STR);
       
       $cadastrar->
       bindParam(':preco',$_POST['cxprecopizza'],
       PDO::PARAM_INT);
       
       $cadastrar->execute();
       
       if($cadastrar->rowcount()){
           echo "Produto cadastrado com sucesso!";
       }else{
           echo "Produto não cadastrado";
       }
    }else{
        echo "Dados incompletos";
    }
?>