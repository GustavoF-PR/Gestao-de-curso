<?php

require_once "/../Models/Estudante.php";

class EstudanteController{

    private $estudante;

    public function __construct($conexao){
           $this->estudante = new Estudante ($conexao);
    }
    
    public function cadastrar(){
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];


        if(empty($nome) || empty($idade) || empty($endereco) || empty($cidade) || empty($estado) || empty($pais)){
            echo "Preencha todos os campos";
            return;
        }
        

        if($this->estudante->cadastrar($nome, $idade, $endereco, $cidade, $estado, $pais)){
            echo "Estudante cadastrado com sucesso";
        }
        else{
            echo "Erro ao cadastrar o estudante";
        }

    }
}