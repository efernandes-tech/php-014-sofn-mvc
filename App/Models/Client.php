<?php

namespace App\Models;

class Client
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $query = "SELECT * FROM clients";

        return $this->db->query($query);
    }
}
