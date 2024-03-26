<?php

namespace MentesBrilhantes\App\Models;

use MentesBrilhantes\Core\Model;

class City extends Model
{
    public function all()
    {
        $sql = "SELECT c.id, c.name, s.name as state FROM cities as c, states as s where s.id = c.state_id";
        return $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT c.id, c.name, s.name as state FROM cities as c, states as s where s.id = c.state_id and c.id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
}
