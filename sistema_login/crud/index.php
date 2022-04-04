<?php


include_once 'includes/header.php';
include_once 'php_action/db_connect.php';
include_once 'php_action/mensagem.php';




?>



<div class="row">
    <div  style="margin-left:22px; margin-top:12px">
        <form action="./php_action/buscar.php" method="GET">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="nome" id="nome" style=" width: 10%;left: 34px; border-radius: 10%;position: absolute;top: -14px;">
        </form>
    </div>

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
                $sql = "SELECT * FROM usuario";
                $resultado = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_array($resultado)) :
                ?>
                    <tr>
                        <td> <?php echo $dados['nome']; ?> </td>
                        <td> <?php echo $dados['sobrenome']; ?> </td>
                        <td> <?php echo $dados['email']; ?> </td>
                        <td> <?php echo $dados['idade']; ?> </td>
                        <td> <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"> <i class="material-icons">edit </i></a></td>
                        <td> <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"> <i class="material-icons">delete </i></a></td>



                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>wait!</h4>
                                <p>Do you have sure?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit" class="btn red" name="btn-deletar"> Sim quero deletar</button>
                                </form>
                            </div>
                        </div>
                    </tr>
                    <?php endwhile  ?>;
            </tbody>

        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar clientes</a>
        <a href="excluir.php" class="btn">Excluir clientes</a>

    </div>

</div>


<?php


include_once 'includes/footer.php';

?>