<?php

require_once __DIR__ . "/../models/Estudante.php";
require_once __DIR__ . "/../config/conexao.php";

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
        }else{
            echo "Erro ao cadastrar o estudante";
        }
    }

    public function excluir($id){
        if ($this->estudante->excluir($id)) {
            header("Location: ../views/estudante/listar.php");
            exit;
        } else {
            echo "Erro ao excluir o curso!!";
        }
    }

    public function atualizar(){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

        if (empty($id) || empty($nome) || empty($idade) || empty($endereco) || empty($cidade) || empty($estado) || empty($pais)){
            echo "Preencha todos os campos!";
            return;
        }

        if ($this->estudante->atualizar($id, $nome, $idade, $endereco, $cidade, $estado, $pais)){
            header("Location: ../views/estudante/listar.php");
            exit;
        } else {
            echo "Erro ao atualizar o Aluno!";
        }
    }
}

if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
    $conexao =  Conexao::conectar();
    $controller = new EstudanteController($conexao);
    $controller->excluir($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexao = Conexao::conectar();
    $controller = new EstudanteController($conexao);

    if (isset($_POST['acao']) && $_POST['acao'] === 'atualizar') {
        $controller->atualizar();
    } else {
        $controller->cadastrar();
    }
}