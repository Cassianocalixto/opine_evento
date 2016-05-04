<?php
/**
 * Bin: dataBase
 * 
 * Classe responsável por realizar a conexão com o banco de dados
 */
class dataBase {
    const host     = "";
    const user     = "";
    const password = ".";
     
    /**
     * Função responsável por efetivar a conexão
     * 
     * @param type $db
     * @return \PDO
     */
    private function connectionStructure($db){
        $PDO = new \PDO("mysql:host=".self::host.
                        ";dbname=".$db.
                        ";charset=utf8", 
                        self::user, 
                        self::password
                        );
        
        // define para que o PDO lance exceções caso ocorra erros
        $PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $PDO;
    }
    
    
    /**
     * Função responsável pela conexão com o banco de dados do prefixo "dbconsig"
     * 
     * @param type $base
     * @return type
     */
    public function connectionDbConsig($base){
        $db = "dbconsig_".$base;
        return $this->connectionStructure($db);
    }
}
