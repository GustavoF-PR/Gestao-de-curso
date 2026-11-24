<?php

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

            <form action="../../Controllers/EstudanteController.php" method="post">

                <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label" name="nome">Nome do aluno:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite o nome..." required>
                </div>

                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label" name="idade">idade</label>
                <input type="number" class="form-control" id="formGroupExampleInput2" maxlength="3" placeholder="Digite a idade..." required>
                </div>

                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label" name="endereco">Endereco</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite o endereco onde o estudante reside..." required>
                </div>

                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label" name="cidade">Cidade</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a cidade onde o estudante reside..." required>
                </div>

                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label" name="estado">Estado</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite o estado onde o estudante reside..." required>
                </div>
                
                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label" name="pais">País</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite o país onde o estudante reside..." required>
                </div>


                <div class="col-12">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>

            </form>
        </div>

        <footer>&copy2026 desenvolvido por Gustavo e Leonardo</footer>
    </body>
</html>