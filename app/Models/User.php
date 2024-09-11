<?php

namespace App\Models;

use Config\Database;

class User {
    protected $pdo;

    public function __construct() {
        $this->pdo = (new Database())->getConnection();
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function create($name, $email, $password) {
        $token = bin2hex(random_bytes(32)); 
        
        $sql = "INSERT INTO users (nome, email, senha, token) VALUES (:nome, :email, :senha, :token)";
        $stmt = $this->pdo->prepare($sql);

        // Bind os parâmetros e execute
        return $stmt->execute([
            ':nome' => $name,
            ':email' => $email,
            ':senha' => password_hash($password, PASSWORD_BCRYPT), // Hash de senha
            ':token' => $token // Armazena o token
        ]);
    }
}
