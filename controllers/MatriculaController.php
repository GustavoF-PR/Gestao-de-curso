<?php

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../models/Matricula.php";


$conexao = Conexao::conectar();
$matricula = new Matricula($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST["estudante_id"]) && isset($_POST["curso_id"])) {

        $estudanteId = $_POST["estudante_id"];
        $cursoId = $_POST["curso_id"];

        if (empty($estudanteId) || empty($cursoId)) {
            echo "Selecione um estudante e um curso!";
        } else {
            if ($matricula->cadastrar($estudanteId, $cursoId)) {
                echo "Matrícula realizada com sucesso!";
            } else {
                echo "Erro ao realizar matrícula!";
            }
        }
    } else {
        echo "Dados não recebidos!";
    }
}   

if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])){
    if ($matricula->excluir($_GET['id'])) {
        header("Location: ../views/matricula/listar.php");
        exit;
    } else {
        echo "Erro ao excluir a matricula!!";
    }
}