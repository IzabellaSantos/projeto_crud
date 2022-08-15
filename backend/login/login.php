<?php
require_once("../database/db_connection.php");
session_start();

class Login
{

    private $con;

    function __construct()
    {
        $con = new Connection();
        $this->con = $con->open();
    }

    public function login($email, $senha)
    {
        try {
            $senhaBanco = $this->verifyEmail($email);

            if ($senhaBanco) {
                if ($senhaBanco[0] == md5($senha)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    return "Pode acessar";
                } else
                    return "Senha não compatível";
            } else
                return "Email não cadastrado!";
        } catch (PDOException $e) {
            echo "Erro cadastro" . $e->getMessage();
        }
    }

    private function verifyEmail($email)
    {
        try {
            $query = "SELECT senha FROM dados_login WHERE email = :email";
            $params = [
                "email" => $email
            ];

            $std = $this->con->prepare($query);

            if ($std->execute($params))
                return $std->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
