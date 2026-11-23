<?php 

    class Estudante {

        private $conexao;
        private $colecao;

        public function __construct($conexao){
            $this->conexao = $conexao;
            $this->colecao = $conexao->selectCollection("GestaoCursos", "estudantes");
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
        
    }
    