<?php


$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '226605ez';
$dbName = 'Air';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($conexao -> connect_error)
{
    echo "Erro";
}

else
{

}

?>