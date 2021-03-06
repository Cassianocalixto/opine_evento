<?php
/**
 * Bin: dataBase
 * 
 * Classe responsável por realizar a conexão com o banco de dados
 */
class dataBase {
    const host     = "localhost";//"mysql.hostinger.com.br";
    const user     = "root";//"u361206234_root";
    const password = "123456";
    const base     = "opine_evento";
     
    /**
     * Função responsável por efetivar a conexão
     * 
     * @param type $db
     * @return \PDO
     */
    static function connectionDBA(){
        $PDO = new \PDO("mysql:host=".self::host.
                        ";dbname=".self::base.
                        ";charset=utf8", 
                        self::user, 
                        self::password
                        );
        
        // define para que o PDO lance exceções caso ocorra erros
        $PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                
        return $PDO;
    }
}
