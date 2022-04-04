<?php


require_once "conexao.php";
session_start();
$id = $_SESSION['id_usuario'];

$sql = "SELECT * FROM usuario where id = '$id' ";
$resultado = mysqli_query($connect, $sql);
// trazer os resultado que corresponde aos que o usuario preencheu com os dados do banco array fetch
$dados = mysqli_fetch_array($resultado);

// posteriomente 
if(!isset($_SESSION['logado'])):
    header('location: login');
endif;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

</head>
<body>
    <h1>Pagina restrita</h1>
    <h1>Vai pro inferno capeta <?php echo  $dados['nome'] ;?></h1>
    <a href="logout.php"> press to logout sair</a>
    
</body>
</html>