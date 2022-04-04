<?php

// abrir sessão
session_start();


require_once 'db_connect.php';

if (isset($_POST['btn-editar'])) :

    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $id = mysqli_escape_string($connect, $_POST['id']);


    /** Adicionar valores no Banco de dados */

    $sql = "UPDATE  usuario  SET nome = '$nome' , sobrenome = '$sobrenome', email = '$email', idade =  '$idade' WHERE id = '$id' ";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php?sucesso');
    else :
        $_SESSION['mensagem'] = "Error ao atualizar!";
        header('Location: ../index.php?erro');
    endif;


endif;
