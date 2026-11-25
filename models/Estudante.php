<?php 
use MongoDB\BSON\ObjectId;

    class Estudante {

        private $conexao;
        private $colecao;

        public function __construct($conexao){
            $this->conexao = $conexao;
            $this->colecao = $conexao->selectCollection("estudantes");
        }

        public function cadastrar($nome, $idade, $endereco, $cidade, $estado, $pais) {

        $resultado = $this->colecao->insertOne([
            "nome" => $nome,
            "idade" => $idade,
            "endereco" => $endereco,
            "cidade" => $cidade,
            "estado" => $estado,
            "pais" => $pais
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
    