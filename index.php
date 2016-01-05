<?php

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}
catch(\PDOException $e) {
    echo "Não foi possível estabelecer a conexão com o banco de dados. Erro código:".$e->getCode().": ".$e->getMessage();
}
