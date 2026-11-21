<?php
require_once __DIR__ . '/../config/conexao.php';
use MongoDB\BSON\ObjectId; /*se o ObjectId estiver vermelho nas funções, vai nas configs do vsCode
                            pesquisa por intelephense.stubs e la no final adiciona o item chamado "mongodb"*/

class Curso{
    private $colecao;

    public function __construct(){
        $db = conexao::conectar();
        $this->colecao = $db->selectCollection('cursos');
    }

    public function cadastrar($dados){
        return $this->colecao->insertOne($dados);
    }

    public function listar(){
        return $this->colecao->find()->toArray();
    }

    public function atualizar($id, $dados){
        return $this->colecao->updateOne(['_id' => new  ObjectId($id)], ['$set' => $dados]);
    }

    public function excluir($id){
        return $this->colecao->deleteOne(['_id' => new ObjectId($id)]);
    }

    public function buscarId($id){
        return $this->colecao->findOne(['_id' => new ObjectId($id)]);
    }
}