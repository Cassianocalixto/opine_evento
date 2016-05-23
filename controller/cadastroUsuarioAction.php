<?php
require_once "../model/pessoa_fisica.class.php";
require_once "../model/telefone.class.php";

// Receber Dados
$acao  = isset($_POST["ac"])    ? $_POST["ac"]                          : false;
$dados = isset($_POST["dados"]) ? (object)json_decode($_POST["dados"]) : false;

if($acao == "inserir"){
    if(!is_null($dados->tipo_telefone) && !is_null($dados->telefone)){
        if($dados->tipo_telefone == "Celular"){
            $num_tel = substr($dados->telefone, 4, 5).substr($dados->telefone, 10, 10);
        } else {
            $num_tel = substr($dados->telefone, 4, 4).substr($dados->telefone, 9,10);
        }
        
        $telefone = new telefone();
        $telefone->classifica = $dados->tipo_telefone;
        $telefone->dd         = substr($dados->telefone, 1, 2);
        $telefone->numero     = $num_tel;
        $result_telefone      = $telefone->selectTelefone();
        
        if(!$result_telefone){
            $telefone->insert();
            $id_telefone = $telefone->lastInsertId();
        } else {
            $id_telefone = $result_telefone->ID_telefone;
        }
    }
    
    if($dados->tipo_cadastro == "pessoa_fisica"){
        // verificar se cliente já possui cadastro
        $pessoa_fisica                 = new pessoa_fisica();
        $pessoa_fisica->nome           = trim($dados->nome); 
        $pessoa_fisica->data_nasc      = date("Y-m-d",strtotime(str_replace("/", "-",$dados->dt_nasc)));
        $pessoa_fisica->cpf            = $dados->cpf;
        $pessoa_fisica->FK_ID_telefone = isset($id_telefone) ? $id_telefone : NULL;
        
        
        var_dump($pessoa_fisica);die();
    } else {
        
    }
}