<?php
require_once("../login/cadastro.php");
require_once("../login/login.php");
//require_once("../login/esqueceuSenha.php");

if (isset($_POST['cadastro'])) {
    $cadastro = new Cadastro();
    echo json_encode($cadastro->newUser($_POST['nome'], $_POST['email'], $_POST['senha']));
}

if (isset($_POST['login'])) {
    $login = new Login();
    echo json_encode($login->login($_POST['email'], $_POST['senha']));
}

// if (isset($_POST['esqueceuSenha'])) {
//     $senha = new esqueceuSenha();
// }
