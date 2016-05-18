<?php
/**
 * Classe responsável por consultar e manipular as informações do cliente
 * contidas na DBA "dbcliente"
 */

// Incluindo a classe a ser utilizada
include_once 'dataBase.class.php';


class telefone extends dataBase {
   
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
    
    
    /**
     * Função responsável por resgatar as informações do cliente, por meio do
     * atributo ID_cliente
     * 
     * @return type
     */
    public function selectID(){
        $query        = "SELECT * FROM ".self::tabela." WHERE ID_cliente = :ID_cliente";
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":ID_cliente", $this->ID_cliente);
        $consultation->execute();

        return $consultation->fetchObject();
    }
    

}
