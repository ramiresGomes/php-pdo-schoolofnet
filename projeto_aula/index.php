<?php

require_once 'EntidadeInterface.php';
require_once 'Cliente.php';
require_once 'ServiceDb.php';

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}
catch(\PDOException $e) {
    die("Não foi possível estabelecer a conexão com o banco de dados. Erro código:".$e->getCode().": ".$e->getMessage());
}

$cliente = new Cliente();

$cliente->setNome("Maria")
        ->setEmail("maria.nunes@gmail.com");

$serviceDb = new ServiceDb($conexao, $cliente);


foreach($serviceDb->listar() as $c){
    echo $c['nome']."<br>";
}