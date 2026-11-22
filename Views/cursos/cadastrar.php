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
    <title>CCA - Cadastrar curso</title>
</head>
<body>
    <h3 class="titulo">CCA - Cadastro de cursos e alunos</h3>

    <div class="cadastro">

        <form action="../../Controllers/cursoController.php" method="post">

            <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label" name="nome">Nome curso</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite o nome..." required>
            </div>

            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label" name="descricao">Descrição do curso</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a descricao..." required>
            </div>

            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label" name="cargaHoraria">Carga horária do curso</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="carga horária do curso..." required>
            </div>

            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label" name="valor">Valor do curso</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Digite o valor do curso." required>
            </div>

            <label for="formGroupExampleInput2" class="form-label" name="dataInicio">Data de início</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" required>

            <label for="formGroupExampleInput2" class="form-label" name="dataFim">Data de término</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" required>


            <div class="col-12">
            <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </div>
            
        </form>
    </div>
    <footer>&copy2026 desenvolvido por Gustavo e Leonardo</footer>
</body>
</html>