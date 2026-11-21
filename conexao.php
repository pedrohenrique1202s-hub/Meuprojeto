<?php
$servidor = "localhost";
$usuario = "root";
$banco = "recife_verde";
$senha = "";
$porta = 3307;

try{
    $pdo=new Pdo("mysql:host=$servidor;port=$porta; dbname=$banco",$usuario, $senha);
    echo"Conectado com sucesso";

}
    catch(pdoexception $e)
    {
        echo("erro:" . $e -> getmessage());

    }






?>