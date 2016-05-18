<?php
/**
 * Classe responsável por consultar e manipular as informações do cliente
 * contidas na DBA "dbcliente"
 */

// Incluindo a classe a ser utilizada
include_once 'dataBase.class.php';


class evento extends dataBase {
    const tabela = "evento";
    public $conexao;
    public $ID_evento;
    public $titulo;
    public $descricao;
    public $data_inicio;
    public $data_fim;
    public $status;
    public $FK_ID_categoria;
    public $FK_ID_telefone;
    public $site;
    public $email;


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
                  " (`ID_evento`, `titulo`, `descricao`, `data_inicio`, `data_fim`,"
                . " `status`, `FK_ID_categoria`, `FK_ID_telefone`, `site`, `email`) ".
                  "VALUES".
                  "(:titulo, :descricao, :data_inicio, :data_fim, :status, :FK_ID_categoria, :FK_ID_telefone, :site, :email )";
        $consultation = $this->conexao->prepare($query);
        $consultation->bindValue(":titulo", $this->titulo);
        $consultation->bindValue(":descricao", $this->descricao);
        $consultation->bindValue(":data_inicio", $this->data_inicio);
        $consultation->bindValue(":data_fim", $this->data_fim);
        $consultation->bindValue(":status", $this->status);
        $consultation->bindValue(":FK_ID_categoria", $this->FK_ID_categoria);
        $consultation->bindValue(":FK_ID_telefone", $this->FK_ID_telefone);
        $consultation->bindValue(":site", $this->site);
        $consultation->bindValue(":email", $this->email);       
        $consultation->execute();

        return $consultation->fetchObject();
    }
    

}
