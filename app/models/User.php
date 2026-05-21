<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':username', $username);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
