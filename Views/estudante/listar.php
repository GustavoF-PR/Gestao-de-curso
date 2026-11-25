<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../models/Estudante.php";

$conexao = Conexao::conectar();
$estudanteModel = new Estudante($conexao);
$estudantes = $estudanteModel->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Public/css/style.css">
    <title>CCA - Listar estudantes</title>
</head>
<body>
    <h1>Alunos Cadastrados</h1>
    <a href="cadastrar.php">Novo estudante</a>
    <a href="../inicio.php">Voltar</a>

    <table class="table">
        <thead>
            <tr>
                <th>nome</th>
                <th>idade</th>
                <th>endereco</th>
                <th>cidade</th>
                <th>estado</th>
                <th>pais</th>
                <th>ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudantes as $estudante) { ?>
                <tr>
                    <td><?= $estudante['nome'] ?></td>
                    <td><?= $estudante['idade'] ?></td>
                    <td><?= $estudante['endereco'] ?></td>
                    <td><?= $estudante['cidade'] ?></td>
                    <td><?= $estudante['estado'] ?></td>
                    <td><?= $estudante['pais'] ?></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="../../controllers/EstudanteController.php?acao=excluir&id=<?= $estudante['_id'] ?>" onclick="return confirm('tem certeza que deseja excluir esse aluno?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>