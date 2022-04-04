<?php

// abrir sessão
session_start();

require_once 'db_connect.php';

if (isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);


    /** Adicionar valores no Banco de dados */

    $sql = "DELETE FROM usuario  WHERE id = '$id' ";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php?sucesso');
    else :
        $_SESSION['mensagem'] = "Error ao Deletado!";
        header('Location: ../index.php?erro');
    endif;


endif;
