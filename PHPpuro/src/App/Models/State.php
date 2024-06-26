<?php

namespace MentesBrilhantes\App\Models;

use MentesBrilhantes\Core\Model;

class State extends Model
{

    public function __construct($host, $db, $user, $password)
    {
        parent::__construct($host, $db, $user, $password);
    }

    public function all()
    {
        return $this->pdo->query("SELECT * FROM states")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM states where id=:id");
        $statement->execute([':id' => $id]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
}
