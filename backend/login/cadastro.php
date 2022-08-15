<?php
require_once("../database/db_connection.php");

class Cadastro
{
    private $con;

    function __construct()
    {
        $con = new Connection();
        $this->con = $con->open();
    }

    public function newUser($nome, $email, $senha)
    {
        try {
            $podeCadastrar = $this->verifyEmail($email);

            if ($podeCadastrar == 0) {
                $dados = [
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => md5($senha)
                ];

                $this->insertNewUser($dados);
                return "Email cadastrado com sucesso!";
            } else {
                return "Email já cadastrado";
            }
        } catch (PDOException $e) {
            return "Erro novo cadastro: " . $e->getMessage();
        }
    }

    private function verifyEmail($email)
    {
        try {
            $query = "SELECT * FROM dados_login WHERE email = :email";

            $params = [
                "email" => $email
            ];

            $std = $this->con->prepare($query);
            $std->execute($params);
            $linhas = $std->rowCount();

            return $linhas;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    private function insertNewUser($dados)
    {
        try {
            $query = "INSERT INTO dados_login (nome, email, senha) VALUES (:nome, :email, :senha)";
            $params = [
                "nome" => $dados['nome'],
                "email" => $dados['email'],
                "senha" => $dados['senha']
            ];

            $std = $this->con->prepare($query);
            $std->execute($params);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
