<?php
require_once 'db_connect.php';

// abrir sessão
session_start();

function clear($connect,$input){
    $var = mysqli_escape_string($connect,$input);
    $var = htmlspecialchars($var);
    return $var;

};




if (isset($_POST['btn-cadastrar'])) :
    
    $nome = clear($connect, $_POST['nome']);
    $sobrenome = clear($connect, $_POST['sobrenome']);
    $email = clear($connect, $_POST['email']);
    $idade = clear($connect, $_POST['idade']);


    /** Adicionar valores no Banco de dados */

    $sql = "INSERT INTO usuario (nome, sobrenome, email, idade) VALUES ('$nome','$sobrenome','$email','$idade')";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php?sucesso');
    else :
        $_SESSION['mensagem'] = "Error ao cadstrar!";
        header('Location: ../index.php?erro');
    endif;


endif;
