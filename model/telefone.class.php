<?php
/**
 * Classe responsável por consultar e manipular as informações do cliente
 * contidas na DBA "dbcliente"
 */

// Incluindo a classe a ser utilizada
include_once 'dataBase.class.php';


class telefone extends dataBase {
    const tabela = "telefone";

    public $conexao;
    public $ID_telefone;
    public $dd;
    public $numero;
    public $classifica;
    /**
     * Função responsável pela realização da conexão com o banco de dados
     * está é iniciada assim que a classe é inicializada.
     *
     * Veja mais sobre a função construct:
     * http://php.net/manual/pt_BR/language.oop5.decon.php
     */
    function __construct() {
        $this->conexao = dataBase::connectionDBA();
    }
    
    
    public function selectTelefone(){
        $query  = "SELECT * FROM ".self::tabela." WHERE dd =:dd AND ".
                  "numero =:numero AND classifica =:classifica";
        
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":dd",         $this->dd);
        $consultation->bindValue(":numero",     $this->numero);
        $consultation->bindValue(":classifica", $this->classifica);
        $consultation->execute();

        return $consultation->fetchObject();
    }
    
    public function insert(){
        $query  = "INSERT INTO ".self::tabela. " (dd, numero, classifica)".
                  " VALUES (:dd, :numero, :classifica)";
                
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":dd",         $this->dd);
        $consultation->bindValue(":numero",     $this->numero);
        $consultation->bindValue(":classifica", $this->classifica);
        $consultation->execute();
    }

}
