<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    public function index() {
        $userModel = new User();
        $users = $userModel->all();

        // Inclui a view e passa os dados
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function store(){
        // Obtendo dados da requisição POST
        $data['name'] = $_POST['name']; 
        $data['email'] = $_POST['email']; 
        $data['password'] = $_POST['password']; 

        // Verifique se os dados estão presentes
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Dados incompletos']);
            return;
        }

        // Instanciar o modelo User e chamar o método para criar o usuário
        $userModel = new User();
        $result = $userModel->create($data['name'], $data['email'], $data['password']);

        // Verificar se a inserção foi bem-sucedida
        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => 'Usuário criado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erro ao criar usuário']);
        }
    }



}

