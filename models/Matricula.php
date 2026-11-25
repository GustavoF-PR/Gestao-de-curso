<?php 

class Matricula {
    private $conexao;
    private $colecao;

    public function __construct($conexao){
        $this->conexao = $conexao;
        $this->colecao = $conexao->selectCollection("matriculas");
    }

    public function cadastrar($estudanteId, $cursoId){
        $resultado = $this->colecao->insertOne([
            "estudante_id" => new MongoDB\BSON\ObjectId($estudanteId),
            "curso_id" => new MongoDB\BSON\ObjectId($cursoId),
            "data_matricula" => date("Y-m-d")
        ]);
        return $resultado->getInsertedCount() > 0;
    }

    public function listar() {
        return $this->colecao->aggregate([
            [
                '$lookup' => [
                    'from' => 'estudantes',
                    'localField' => 'estudante_id',
                    'foreignField' => '_id',
                    'as' => 'estudante'
                ]
            ],
            [
                '$lookup' => [
                    'from' => 'cursos',
                    'localField' => 'curso_id',
                    'foreignField' => '_id',
                    'as' => 'curso'
                ]
            ],
            [
                '$unwind' => [
                    'path' => '$estudante',
                    'preserveNullAndEmptyArrays' => true
                ]
            ],
            [
                '$unwind' => [
                    'path' => '$curso',
                    'preserveNullAndEmptyArrays' => true
                ]
            ]
        ])->toArray();
    }

    public function excluir($id) {
        $resultado = $this->colecao->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $resultado->getDeletedCount() > 0;
    }
    
}
