<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../models/Matricula.php";

$conexao = Conexao::conectar();
$matriculaModel = new Matricula($conexao);
$matriculas = $matriculaModel->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Public/css/style.css">
        <title>CCA - Listar Matriculas</title>
    </head>
    <body>
        <h1>Matriculas Cadastradas</h1>
        <a href="matricula.php">Nova Matricula</a>
        <a href="../inicio.php">Voltar</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Estudante</th>
                    <th>curso</th>
                    <th>data da matricula</th>
                    <th>ações</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($matriculas as $matricula) { ?>
                        <tr>
                            <td><?= $matricula['estudante']['nome'] ?? 'Estudante não encontrado' ?></td>
                            <td><?= $matricula['curso']['nome'] ?? 'Curso não encontrado' ?></td>
                            <td><?= $matricula['data_matricula'] ?></td>
                            <td>
                                <a href="../../controllers/MatriculaController.php?acao=excluir&id=<?= $matricula['_id'] ?>" onclick="return confirm('Tem certeza que deseja exluir essa matricula??')">excluir</a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
        </table>
    </body>
</html>