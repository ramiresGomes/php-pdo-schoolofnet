<?php


class ServiceDb
{
    private $db;
    private $entity;

    public function __construct(\PDO $db, EntidadeInterface $entity)
    {
        $this->db = $db;
        $this->entity = $entity;
    }

    public function find($id)
    {
        $query = "Select * from {$this->entity->getTable()} where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null)
    {
        if($ordem)
            $query = "Select * from {$this->entity->getTable()} order by $ordem";
        else
            $query = "Select * from {$this->entity->getTable()}";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir()
    {
        $query = "Insert into {$this->entity->getTable()} (nome, email) VALUES (:nome, :email)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":email", $this->entity->getEmail());

        if($stmt->execute()){
            return true;
        }

    }

    public function alterar()
    {
        $query = "Update {$this->entity->getTable()} set nome = :nome, email = :email where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->entity->getId());
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":email", $this->entity->getEmail());

        if($stmt->execute()){
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "Delete from {$this->entity->getTable()} where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);

        if($stmt->execute()){
            return true;
        }
    }

}