<?php
use MongoDB\BSON\ObjectId;

    class Curso {

        private $conexao;
        private $colecao;

        public function __construct($conexao){
            $this->conexao = $conexao;
            $this->colecao = $conexao->selectCollection("cursos");
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

        public function listar() {

            return $this->colecao->find()->toArray();
        }
        
        public function excluir($id){
            $resultado = $this->colecao->deleteOne(["_id" => new ObjectId($id)]);
            return $resultado->getDeletedCount() > 0;
        }
    }
    