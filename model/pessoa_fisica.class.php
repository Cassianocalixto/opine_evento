<?php
/**
 * Classe responsável por consultar e manipular as informações do cliente
 * contidas na DBA "dbcliente"
 */

// Incluindo a classe a ser utilizada
include_once 'dataBase.class.php';


class pessoa_fisica extends dataBase {
   
    const tabela = "pessoa_fisica";
    public $conexao;
    public $ID_pf;
    public $nome;
    public $data_nasc;
    public $cpf;
    public $email;
    public $status;
    public $FK_ID_telefone;
    
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
                  " (nome, data_nasc, cpf, FK_ID_telefone, email, status)".
                  "VALUES".
                  "(:nome, :data_nasc, :cpf, :FK_ID_telefone, :email, :status)";
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":nome", $this->nome);
        $consultation->bindValue(":data_nasc", $this->data_nasc);
        $consultation->bindValue(":cpf", $this->cpf);
        $consultation->bindValue(":FK_ID_telefone", $this->FK_ID_telefone);
        $consultation->bindValue(":email", $this->email);
        $consultation->bindValue(":status", $this->status);
        $consultation->execute();
    
        return $consultation->fetchObject();
    }
    

}
