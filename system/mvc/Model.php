<?php

namespace System\MVC;

abstract class Model
{
    protected $db;

    protected $table;
    protected $pk;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $query = "SELECT * FROM {$this->table}";

        return $this->db->query($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE {$this->pk} = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE {$this->pk} = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
