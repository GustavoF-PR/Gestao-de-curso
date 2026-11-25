<?php

require_once __DIR__ . "/../models/Curso.php";
require_once __DIR__ . "/../config/conexao.php";

class CursoController{

    private $curso;

    public function __construct($conexao){
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
            return;
         }

        if($this->curso->cadastrar($nome, $descricao, $cargaHoraria, $valor, $dataInicio, $dataFim)){
            echo "Curso cadastrado com sucesso";
        }else{
            echo "Erro ao cadastrar o curso";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexao = Conexao::conectar();
    $controller = new CursoController($conexao);
    $controller->cadastrar();
}