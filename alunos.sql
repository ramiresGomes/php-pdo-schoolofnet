create database pdo_exercicio1;
use pdo_exercicio1;

create table aluno (
	`id` int(11) NOT NULL auto_increment,
    `nome` varchar(255),
    `nota` int(11),
    primary key (`id`)
);

insert into aluno (nome, nota) values ("Luana",83), ("Juliano",85), ("Samara",90), ("André",69), ("Samanta",78), ("Saulo",15), ("David",88), ("Gustavo",100), ("Iris",98), ("Janaina",78), ("Antonio",87), ("Cristovão",80), ("Tabata",44), ("Tatiana",45), ("Igor",49), ("Paula",57), ("Lucas",25), ("Lindoval",66), ("Lorival",48), ("Renis",58);