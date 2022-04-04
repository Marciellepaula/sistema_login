<?php

$servername = "localhost:3306";
$username = "root";
$password = "929266";
$db_name = "crud";



$connect = mysqli_connect($servername, $username, $password, $db_name);


if (mysqli_connect_error()) :
    echo "falha na conexao:" . mysqli_connect_error();
endif;
