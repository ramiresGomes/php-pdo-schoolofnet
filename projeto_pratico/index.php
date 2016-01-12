<?php

require_once 'Aluno.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo_exercicio1", "root", "root");
}catch(\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados. Erro: ". $e->getMessage());
}

$aluno = new Aluno($conexao);

echo "Buscando o aluno de id 8:<br>";
$aluno_buscado = $aluno->find(8);
echo "{$aluno_buscado['id']}. {$aluno_buscado['nome']} - {$aluno_buscado['nota']}<br>";
echo "<hr>";

echo "Inserido o aluno Jonathan com nota 72";
$aluno->setNome('Jonathan')
    ->setNota(73);
echo "<hr>";
//$aluno->insert();

echo "Excluido o aluno Jonathan com id 24";
if($aluno->delete(25))

    echo "Listando as informacoes de todos os alunos cadastrados:<br>";
foreach($aluno->lists() as $a){ // Adicionar parametro 'nota desc' para ordenar
    echo "{$a['id']}. {$a['nome']} - {$a['nota']}<br>";
}
echo "<hr>";
