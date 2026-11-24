<?php
require_once __DIR__ . "../../config/conexao.php";
require_once __DIR__ . "../../models/Estudante.php";
require_once __DIR__ . "../../models/Curso.php";
require_once __DIR__ . "../../models/Matricula.php";

$conexao = Conexao::conectar();
$estudante = new Estudante($conexao);
$curso = new Curso($conexao);
$matricula = new Matricula($conexao);

$estudantes = $estudante->listar();
$cursos = $curso->listar();
$matriculas = $matricula->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CCA - Matrícula</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/style.css">
        <link rel="stylesheet" href="../../public/css/cadastro.css">
    </head>
    <body>
            <h1>CCA - Matrícula</h1>
            
            <a href="../inicio.php" class="botao">Voltar</a>

            <p>Realize e consulte as matrículas dos estudantes</p>


            <div class="cadastro">

                <h2>Nova Matrícula</h2>

                <form action="../../controllers/MatriculaController.php" method="POST">

                    <label>Estudante</label>
                    <select name="estudante_id" class="form-control" required>
                        <option value="">Selecione um estudante</option>

                        <?php foreach ($estudantes as $item) { ?>
                            <option value="<?php echo $item["_id"]; ?>">
                                <?php echo $item["nome"]; ?>
                            </option>
                        <?php } ?>

                    </select>

                    <label>Curso</label>
                    <select name="curso_id" class="form-control" required>
                        <option value="">Selecione um curso</option>

                        <?php foreach ($cursos as $item) { ?>
                            <option value="<?php echo $item["_id"]; ?>">
                                <?php echo $item["nome"]; ?>
                            </option>
                        <?php } ?>

                    </select>

                    <button type="submit" name="cadastrar">Matricular</button>

                </form>

            </div>

            <div class="lista">

                <h2>Matrículas realizadas</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Estudante</th>
                            <th>Curso</th>
                            <th>Data da matrícula</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($matriculas as $item) { ?>
                            <tr>
                                <td><?php echo $item["estudante_id"]; ?></td>
                                <td><?php echo $item["curso_id"]; ?></td>
                                <td><?php echo $item["data_matricula"]; ?></td>
                                <td>
                                    <button>Excluir</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>

            <footer>&copy; 2026 desenvolvido por Gustavo e Leonardo</footer>

    </body>
</html>