<?php


// conexao com banco de dados
$servername = "localhost:3306";
$username = "root";
$password = "929266";
$db_name = "sistemalogin";



$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) :
    echo "falha na conexao:" . mysqli_connect_error();
endif;
