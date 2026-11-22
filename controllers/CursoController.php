<?php

require_once "..Models/Curso.php";

class CursoController{

    private $curso;

    public function __construct($conecao){
           $this->curso = new Curso ($conexao);
    }
    
    public function cadastrar(){
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $cargaHoraria = $_POST["cargaHoraria"];
        $valor = $_POST["valor"];
        $dataInicio = $_POST["dataInicio"];
        $dataFim = $_POST["dataFim"];


         if(empty($nome) || empty($descricao) || empty($cargaHoraria) || empty($valor) || empty($dataInicio) || empty($dataFim)){
            echo "Preencha todos os campos";

        if($this->curso->cadastrar($nome, $descricao, $cargaHoraria, $valor, $dataInicio, $dataFim)){
            echo "Estudante cadastrado com sucesso";
        }
        }else{
            echo "Erro ao cadastrar o curso";
        }

    }
}