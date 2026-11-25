<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../models/Estudante.php";

$conexao = Conexao::conectar();
$estudanteModel = new Estudante($conexao);
$estudante = $estudanteModel->buscarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Public/css/style.css">
        <link rel="stylesheet" href="../../Public/css/cadastro.css">
        <title>CCA - Cadastro de Alunos</title>
    </head>
    <body>
        <h3 class="titulo">CCA - Cadastro de Alunos</h3>
        
        <a href="../inicio.php" class="botao">Voltar</a>
        
        <div class="cadastro">

            <form action="../../controllers/EstudanteController.php" method="post">
                <input type="hidden" name="acao" value="atualizar">
                <input type="hidden" name="id" value="<?=  $estudante['_id'] ?>">

                <div class="mb-3">
                <label for="nomeAluno" class="form-label">Nome do aluno:</label>
                <input type="text" class="form-control" id="nomeAluno" placeholder="Digite o nome..." name="nome" value="<?=  $estudante['nome'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="idadeAluno" class="form-label">idade</label>
                <input type="number" class="form-control" id="idadeAluno" maxlength="3" placeholder="Digite a idade..." name="idade" value="<?=  $estudante['idade'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="enderecoAluno" class="form-label">Endereco</label>
                <input type="text" class="form-control" id="enderecoAluno" placeholder="Digite o endereco onde o estudante reside..." name="endereco" value="<?=  $estudante['endereco'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="cidadeAluno" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidadeAluno" placeholder="Digite a cidade onde o estudante reside..." name="cidade" value="<?=  $estudante['cidade'] ?>" required>
                </div>

                <div class="mb-3">
                <label for="estadoAluno" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estadoAluno" placeholder="Digite o estado onde o estudante reside..." name="estado" value="<?=  $estudante['estado'] ?>" required>
                </div>
                
                <div class="mb-3">
                <label for="paisAluno" class="form-label">País</label>
                <input type="text" class="form-control" id="paisAluno" placeholder="Digite o país onde o estudante reside..." name="pais" value="<?=  $estudante['pais'] ?>" required>
                </div>


                <div class="col-12">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>

            </form>
        </div>

        <footer>&copy; 2026 desenvolvido por Gustavo e Leonardo</footer>
    </body>
</html>