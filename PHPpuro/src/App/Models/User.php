<?php

namespace MentesBrilhantes\App\Models;

use MentesBrilhantes\Core\Model;

class User extends Model
{
    public function all()
    {
        $sql = "SELECT u.id, u.name, a.street as address, c.name as city, s.name as state 
                FROM users as u, addresses as a, cities as c, states as s 
                where u.address_id = a.id and
                      u.city_id = c.id and
                      u.state_id = s.id";
        return $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
