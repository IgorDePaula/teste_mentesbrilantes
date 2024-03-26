<?php

namespace MentesBrilhantes\App\Models;

use MentesBrilhantes\Core\Model;

class Address extends Model
{
    public function all()
    {
        $sql = "SELECT a.id, a.street, c.name as city FROM addresses as a, cities as c where c.id = a.city_id";
        return $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT a.id, a.street, c.name as city FROM addresses as a, cities as c where c.id = a.city_id and a.id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
}
