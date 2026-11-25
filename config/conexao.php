<?php
require_once __DIR__ . '/../vendor/autoload.php';
use MongoDB\Client;
use Dotenv\Dotenv;
Dotenv::createImmutable(__DIR__ . '/..') -> load();

class Conexao{
    public static function conectar(){
        try {
            $client = new Client($_ENV['MONGO_URI']);
            return $client -> selectDatabase($_ENV['MONGO_DB']);
        } catch (Exception $e) {
            die("Erro ao se conectar ao mongoDB: " .  $e -> getMessage());
        }
    }
}