<!-- <?php
// class Caminho{
    // public static $usuario = "root";
    // public static $senha = "root";
    // public static $connect = null;
    // private static function Conectar(){
        // try{
            // if(self::$connect==null){
                // self::$connect = new PDO(
                    // 'mysql:host=localhost;
                    // dbname=bdvendapizza;',
                    // self::$usuario,self::$senha
                // );
            // }
        // }catch (Exception $ex){
            // echo 'Mesagens: ' .$ex-> getMessage();
            // die;
        // }
        // return self::$connect;
        // }
        // public function getConn(){
            // return self::Conectar();
        // }
    // }
?> -->




<?php
class Caminho{
    // O usuário é 'if0_40451744'. A senha deve ser exatamente a senha do cPanel/MySQL.
    public static $usuario = "if0_40451744"; 
    
    // **AVISO:** Removi o espaço extra que estava no final da sua senha.
    // Se a senha real tiver esse espaço, adicione-o de volta. Se não, esta é a forma correta:
    public static $senha = "G1u2S3t4A5v6O7"; 
    
    public static $connect = null;
    
    private static function Conectar(){
    try {
        if(self::$connect == null){
            // 1. DSN sem espaços extras e com charset definido
            $dsn = 'mysql:host=sql202.infinityfree.com;dbname=if0_40451744_bdvendapizza;charset=utf8';
            
            self::$connect = new PDO($dsn, self::$usuario, self::$senha);
            
            // 2. Configurações essenciais para o banco funcionar bem
            self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
    } catch (PDOException $ex) {
        // Use PDOException para erros de banco
        echo 'Erro na conexão: ' . $ex->getMessage();
        die;
    }
    return self::$connect;
}
    
    public function getConn(){
        return self::Conectar();
    }
}
?>