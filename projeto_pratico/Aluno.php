<?php

class Aluno
{

    private $db;
    private $id;
    private $nome;
    private $nota;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function insert()
    {
        $query = "Insert into aluno (nome, nota) values (:nome, :nota)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":nota", $this->getNota());

        if($stmt->execute()){
            return true;
        }
    }

    public function update()
    {
        $query = "Update aluno set nome = :nome, nota = :nota where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->getId());
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":nota", $this->getNota());

        if($stmt->execute()){
            return true;
        }
    }

    public function lists($order = null)
    {
        if($order)
            $query = "Select * from aluno order by $order";
        else
            $query = "Select * from aluno";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "Delete from aluno where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);

        if($stmt->execute()){
            return true;
        }
    }

    public function find($id)
    {
        $query = "Select * from aluno where id = :id";

        $stmt= $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }






}