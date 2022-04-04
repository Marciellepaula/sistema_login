<?php

include_once 'includes/header.php';
// verificar se existe sessão no create php
session_start();
if (isset($_SESSION['mensagem'])) :
    echo $_SESSION['mensagem'];
endif;
session_unset();


?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Novo clientes</h3>

        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
    
                <input type="text" name="nome" id="nome" >
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" >
                <label for="email">email</label>
            </div>
            <div class="input-field col s12">
                <input type="number" name="idade" id="idade" >
                <label for="idade">idade</label>
            </div>
            <br>
            <button type="submit" name="btn-cadastrar" class="btn">Adicionar clientes</button>
            <a href="index.php" class="btn green">Lista de clientes</a>
        </form>


    </div>

</div>


<?php


include_once 'includes/footer.php';

?>