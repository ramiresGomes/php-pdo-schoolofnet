<?php

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");

    //$query = "insert into clientes(nome,email) values ('Pedro', 'predro@gmail.com'), ('Joao', 'joao@gmail.com')";
    $query = "Select * from clientes;";

    $stmt = $conexao->query($query);
    $resultado = $stmt->fetchAll();

    echo $resultado[0]['nome'];

    //print_r( $resultado );
}
catch(\PDOException $e) {
    echo "Não foi possível estabelecer a conexão com o banco de dados. Erro código:".$e->getCode().": ".$e->getMessage();
}
