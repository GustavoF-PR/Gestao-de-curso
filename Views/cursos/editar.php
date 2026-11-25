<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../models/Curso.php";

$conexao = Conexao::conectar();
$cursoModel = new Curso($conexao);
$curso = $cursoModel->buscarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Public/css/style.css">
        <link rel="stylesheet" href="../../Public/css/cadastro.css">
        <title>CCA - Cadastrar curso</title>
    </head>
    <body>
        <h3 class="titulo">CCA - Cadastro de cursos e alunos</h3>

        <a href="../inicio.php" class="botao">Voltar</a>
        
        <div class="cadastro">

            <form action="../../controllers/CursoController.php" method="post">
                <input type="hidden" name="acao" value="atualizar">
                <input type="hidden" name="id" value="<?=  $curso['_id'] ?>">

                <div class="mb-3">
                <label for="nomeCurso" class="form-label">Nome curso</label>
                <input type="text" class="form-control" id="nomeCurso" placeholder="Digite o nome..." name="nome" value="<?=  $curso['nome'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="descCurso" class="form-label">Descrição do curso</label>
                <input type="text" class="form-control" id="descCurso" placeholder="Digite a descricao..." name="descricao" value="<?=  $curso['descricao'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="carga-horariaCurso" class="form-label" >Carga horária do curso</label>
                <input type="number" class="form-control" id="carga-horariaCurso" placeholder="carga horária do curso..." name="cargaHoraria" value="<?=  $curso['cargaHoraria'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="valorCurso" class="form-label">Valor do curso</label>
                <input type="number" class="form-control" id="valorCurso" placeholder="Digite o valor do curso." name="valor" value="<?=  $curso['valor'] ?>" required>
                </div>

                <label for="inicioCurso" class="form-label">Data de início</label>
                <input type="date" class="form-control" id="inicioCurso" name="dataInicio" value="<?=  $curso['dataInicio'] ?>" required>

                <label for="finalCurso" class="form-label">Data de término</label>
                <input type="date" class="form-control" id="finalCurso" name="dataFim" value="<?=  $curso['dataFim'] ?>" required>


                <div class="col-12">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
                
            </form>
        </div>
        <a href="../inicio.php" class="botao">Voltar</a>
        <footer>&copy; 2026 desenvolvido por Gustavo e Leonardo</footer>
    </body>
</html>