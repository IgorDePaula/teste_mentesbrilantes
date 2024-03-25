<?php

namespace MentesBrilhantes\Core;

class Model
{
    protected $pdo = null;

    public function __construct($host, $db, $user, $password)
    {
        $this->pdo = new \PDO("mysql:host={$host};dbname={$db}", $user, $password);
    }
}
