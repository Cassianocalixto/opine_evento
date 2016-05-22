<?php
require_once "../model/pessoa_fisica.class.php";


// Receber Dados
$acao  = isset($_POST["ac"])    ? $_POST["ac"]                          : false;
$dados = isset($_POST["dados"]) ? (object)json_decode($_POST["dados"]) : false;

if($acao == "inserir"){
    if(!is_null($dados->tipo_telefone) && !is_null($dados->telefone)){
        var_dump("Inserir telefone");
    }
    
    if($dados->tipo_cadastro == "pessoa_fisica"){
        $pessoa_fisica       = new pessoa_fisica();
//        $pessoa_fisica->nome = $dados->nome; 
//        $pessoa_fisica->data_nasc = $dados->nome;
//        $pessoa_fisica->cpf = $dados->nome;
//        $pessoa_fisica->FK_ID_telefone = $dados->nome;
        
        var_dump("AAA");die();
    } else {
        
    }
}