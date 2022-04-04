<?php

require_once "conexao.php";

if (mysqli_connect_error()):
    echo"falha na conexao:".mysqli_connect_error();
endif;
session_start();

// ira verificar se o usuario submeteu os dados 

if (isset($_POST['btn-entrar'])) :
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    if (empty($login) or empty($senha)):
          $erros[] = "<li> O campo login senha/login esta vazio <li>";
    else:
        $sql = "SELECT login from usuario where login = '$login' ";
        $resultado = mysqli_query($connect, $sql);
// verificando os dados do usuario
        if(mysqli_num_rows($resultado) > 0):
            $sql = "SELECT * FROM usuario where login = '$login' and senha = '$senha' ";
            $resultado = mysqli_query($connect, $sql);
           // verificando se tem dados no banco
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    // redicrecionando..
                    header('Location: home.php');
                else:
                    $erros[] = "<li>usuario inexistente</li>";
                endif;
        else:
            $erros[] = "<li>Usuario inexistente</li>";
        endif;

    endif;
endif;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <H1>lOGIN</H1>
    <?php
       if (!empty($erros)) :
           foreach($erros as $erro):
               echo $erro;
           endforeach;
        endif;

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Logim: <input type="text" name="login">
        senha: <input type="password" name="senha">
        <button type="submit" name="btn-entrar">Entrar</button>
    </form>

</body>

</html>