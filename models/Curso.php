<?php 

    class Curso {

        private $conexao;
        private $colecao;

        public function __construct($conexao){
            $this->conexao = $conexao;
            $this->colecao = $conexao->selectCollection("GestaoCursos", "cursos");
        }

        public function cadastrar($nome, $descricao, $cargaHoraria, $valor, $dataInicio, $dataFim) {

        $resultado = $this->colecao->insertOne([
            "nome" => $nome,
            "descricao" => $descricao,
            "cargaHoraria" => $cargaHoraria,
            "valor" => $valor,
            "dataInicio" => $dataInicio,
            "dataFim" => $dataFim
        ]);

        return $resultado->getInsertedCount() > 0;
        }
    }
    