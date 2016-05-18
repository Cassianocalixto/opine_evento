<?php
/**
 * Classe responsável por consultar e manipular as informações do cliente
 * contidas na DBA "dbcliente"
 */

// Incluindo a classe a ser utilizada
include_once 'dataBase.class.php';


class pessoa_juridica extends dataBase {
   
    const tabela = "pessoa_juridica";
    public $conexao;
    public $ID_pj;
    public $razao_social;
    public $nome_fantasia;
    public $cnpj;
    public $status;
    public $FK_ID_telefone;
    public $FK_ID_logradouro;
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
    public function insert(){
          $query  = "INSERT INTO ".self::tabela.
                  " (razao_social, nome_fantasia, cnpj, status, FK_ID_telefone, FK_ID_logradouro)".
                  "VALUES".
                  "(:razao_social, :nome_fantasia, :cnpj, :status, :FK_ID_telefone, :FK_ID_logradouro)";
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":razao_social", $this->razao_social);
        $consultation->bindValue(":nome_fantasia", $this->nome_fantasia);
        $consultation->bindValue(":cnpj", $this->cpf);
        $consultation->bindValue(":status", $this->status);
        $consultation->bindValue(":FK_ID_telefone", $this->FK_ID_telefone);
        $consultation->bindValue(":FK_ID_logradouro", $this->FK_ID_logradouro);
     
        $consultation->execute();
        
        return $consultation->fetchObject();
    }
    

}
