<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../models/Curso.php";

$conexao = Conexao::conectar();
$cursoModel = new Curso($conexao);
$cursos = $cursoModel->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Public/css/style.css">
    <title>CCA - Listar Cursos</title>
</head>
<body>
    <h1>Cursos Cadastrados</h1>
    <a href="cadastrar.php">Novo Curso</a>
    <a href="../inicio.php">Voltar</a>

    <table class="table">
        <thead>
            <tr>
                <th>nome</th>
                <th>descrição</th>
                <th>carga horaria</th>
                <th>valor</th>
                <th>data inicial</th>
                <th>data final</th>
                <th>ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso) { ?>
                <tr>
                    <td><?= $curso['nome'] ?></td>
                    <td><?= $curso['descricao'] ?></td>
                    <td><?= $curso['cargaHoraria'] ?></td>
                    <td><?= $curso['valor'] ?></td>
                    <td><?= $curso['dataInicio'] ?></td>
                    <td><?= $curso['dataFim'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $curso['_id'] ?>">Editar</a>
                        <a href="../../controllers/CursoController.php?acao=excluir&id=<?= $curso['_id'] ?>" onclick="return confirm('tem certeza que deseja excluir esse curso?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>