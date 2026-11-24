<?php

require_once "../Config/conexao.php";
require_once "../Models/Matricula.php";

$matricula = new Matricula($conexao);

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
