<?php
require_once "../factory/conexao.php";

if($_POST['cxnomeven'] != "" && $_POST['cxnovasenhaven'] != "" && $_POST['cxcpfven'] != ""){
   $conn = new Caminho;
   $query = "insert into tbvendedores
   (ven_nome, ven_senha, ven_cpf)
   values
   (:nome, :senha, :cpf)"; 

   $cadastrar = $conn->getConn()->prepare($query);
   
   $cadastrar->bindParam(':nome', $_POST['cxnomeven'], PDO::PARAM_STR);
   $cadastrar->bindParam(':senha', $_POST['cxnovasenhaven'], PDO::PARAM_STR);
   $cadastrar->bindParam(':cpf', $_POST['cxcpfven'], PDO::PARAM_STR);
   
   $cadastrar->execute();
   
   if($cadastrar->rowCount()){
       echo "<script>
       alert('Vendedor cadastrado com sucesso!');
       window.location.href='../view/cadastrarvendedor.php';
       </script>";
   } else {
       echo "<script>
       alert('Vendedor não cadastrado, ocorreu um erro.');
       window.location.href='../view/cadastrarvendedor.php';
       </script>";
   }
} else {
    echo "Dados incompletos";
}
?>