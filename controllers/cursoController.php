<?php
require_once __DIR__ . '/../models/curso.php';

$cursoModel = new Curso();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dados = [
        'nome' => $_POST['nomeCurso'],
        'descricao' => $_POST['desc']
    ];
    $cursoModel->cadastrar($dados);
    header('Location: ../views/curso/listar.php');
    exit;
}