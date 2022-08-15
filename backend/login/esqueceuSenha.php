<?php
require_once("../database/db_connection.php");
require_once("../vendor/phpmailer/phpmailer/src/EnviaEmail.php");

class esqueceuSenha
{
    private $con;

    function __construct()
    {
        $con = new Connection();
        $this->con = $con->open();
    }

    public function dadosEmail()
    {

        $teste = new EnviaEmail();
        $teste->enviaEmail('izabellajuliasantos@gmail.com', 'Izabella', 'oie');
    }
}

$teste = new esqueceuSenha();
$teste->dadosEmail();
