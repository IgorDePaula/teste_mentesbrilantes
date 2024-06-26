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

    public function getById($id)
    {
        $sql = "SELECT * FROM users where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO users (name, address_id, city_id, state_id)
                VALUES (:name, :address_id, :city_id, :state_id)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([
            ':name' => $data['name'],
            ':address_id' => $data['address_id'],
            ':city_id' => $data['city_id'],
            ':state_id' => $data['state_id'],
        ]);

        if ($result) {
            $sql = 'Select * FROM users order by id limit 1';
            return $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
        }
        return 0;
    }

    public function update(array $data)
    {
        $sql = "UPDATE users set ";
        $parameters = [];
        if (isset($data['name'])) {
            $parameters[] = "name = :name ";
        }
        if (isset($data['address_id'])) {
            $parameters[] = "address_id = :address_id ";
        }
        if (isset($data['city_id'])) {
            $parameters[] = "city_id = :city_id ";
        }
        if (isset($data['state_id'])) {
            $parameters[] = "state_id = :state_id ";
        }
        $parameters = implode(', ', $parameters);
        $sql = $sql . $parameters . " where id = :id";

        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([
            ':id' => $data['user'],
            ':name' => $data['name'],
            ':address_id' => $data['address_id'],
            ':city_id' => $data['city_id'],
            ':state_id' => $data['state_id'],
        ]);
        if ($result) {
            return $data['user'];
        }
        return false;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        if (isset($user['id'])) {

            $sql = "DELETE from users where id = :id ";

            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute([
                ':id' => $id,
            ]);
            if ($result) {
                return $id;
            }
        }
        return false;
    }
}
