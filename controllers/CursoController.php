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

    public function excluir($id){
        if ($this->curso->excluir($id)) {
            header("Location: ../views/cursos/listar.php");
            exit;
        } else {
            echo "Erro ao excluir o curso!!";
        }
    }

    public function atualizar(){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $cargaHoraria = $_POST["cargaHoraria"];
        $valor = $_POST["valor"];
        $dataInicio = $_POST["dataInicio"];
        $dataFim = $_POST["dataFim"];

        if (empty($id) || empty($nome) || empty($descricao) || empty($cargaHoraria) || empty($valor) || empty($dataInicio) || empty($dataFim)){
            echo "Preencha todos os campos!";
            return;
        }

        if ($this->curso->atualizar($id, $nome, $descricao, $cargaHoraria, $valor, $dataInicio, $dataFim)){
            header("Location: ../views/cursos/listar.php");
            exit;
        } else {
            echo "Erro ao atualizar o curso!";
        }
    }
}

if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
    $conexao =  Conexao::conectar();
    $controller = new CursoController($conexao);
    $controller->excluir($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexao = Conexao::conectar();
    $controller = new CursoController($conexao);

    if (isset($_POST['acao']) && $_POST['acao'] === 'atualizar') {
        $controller->atualizar();
    } else {
        $controller->cadastrar();
    }
}