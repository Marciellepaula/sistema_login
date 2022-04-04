
<?php

//vericar se o botão foi clicado


include_once 'mensagem.php';
include_once '../includes/header.php';
include_once 'db_connect.php';











// no final ou no inicio da string no campo nome do banco

$nome = "%" . trim($_GET['nome']) . "%";



$dbh = new PDO('mysql:host=localhost:3306;dbname=crud', 'root', '929266');
$sth = $dbh->prepare('SELECT * FROM `usuario` where  `nome` like :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();
$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

?>






<div class="row">
     <div class="col s12 m6 push-m3 ">
        <h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>email</th>
                    <th>idade</th>
                </tr>
            </thead>
            <tbody>
                <?php
         if (count($resultados)){
             foreach ($resultados as $Resultados) { 
                ?>
                    <tr>
                        <td> <?php echo  $Resultados['nome']; ?> </td>
                        <td> <?php echo  $Resultados['sobrenome']; ?> </td>
                        <td> <?php echo  $Resultados['email']; ?> </td>
                        <td> <?php echo  $Resultados['idade']; ?> </td>
                        <td> <a href="../editar.php?id=<?php echo  $Resultados['id']; ?>" class="btn-floating orange"> <i class="material-icons">edit </i></a></td>
                        <td> <a href="#modal<?php echo  $Resultados['id']; ?>" class="btn-floating red modal-trigger"> <i class="material-icons">delete </i></a></td>
                        <!-- Modal Structure -->
                        <div id="modal<?php echo  $Resultados['id']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>wait!</h4>
                                <p>Do you have sure?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                <form action="../delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo  $Resultados['id']; ?>">
                                    <button type="submit" class="btn red" name="btn-deletar"> Sim quero deletar</button>
                                </form>
                            </div>
                        </div>
                    </tr> <?php
                    }}else {

                ?>
                   <label>Não foram encontrado resultado pelo termo buscado </label> 
                 <?php
                  }
                ?>
            </tbody>

        </table>
        <br>
        <a href="../adicionar.php" class="btn">Adicionar clientes</a>
        <a href="../excluir.php" class="btn">Excluir clientes</a>

    </div>

</div>


<?php


include_once '../includes/footer.php';

?>