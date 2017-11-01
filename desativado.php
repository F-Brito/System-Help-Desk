<?php
    include "include/header.php"; 
    include "include/banco.php";
    
    if (empty($_COOKIE['admin'])){
        header("Location:index.php");
    }

?>
<div class="clear5"></div>
    <section>
        <div class="container ">
            <div class="col-xs-12 col-md-12">
                <form method="post" >
                    <div class="form-group inline">
                        <h3 class="ajust3">Usuários Desativados</h3>
                        <input class="form-control buscar" type="search" name="buscar" placeholder="buscar"> 
                        <input value="Buscar" type="submit" class="btn btn-info sizebtn form-control">  
                    </div>
                </form>
                <div class="table-responsive">
                    <table class=" tab table table-hover">
                        <thead>
                            <tr class="back">
                            <th>Setor: </th>
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>Data do cadastro:</th>
                            <th>Data da exclusão:</th>
                            <th>Reativar:</th>
                            </tr>
                        </thead>
                        <?php

                            if(empty($_POST['buscar'])){
                                $query = "select idusuario, nome, email, setor, datacadastro, data_exclusao from usuario where dados_status = 'desativado' order by nome";
                            }else{
                                $pesquisa = htmlspecialchars($_POST['buscar']);
                                $query = "select idusuario, nome, email, setor, datacadastro, data_exclusao from usuario where email like '%$pesquisa%' and dados_status = 'desativado' or nome like '%$pesquisa%' and dados_status = 'desativado'";
                            }
                            $consulta = mysqli_query($con,$query);
                            while ($usuario = mysqli_fetch_assoc($consulta)){
                                $setor = $usuario['setor'];
                                $nome = $usuario['nome'];
                                $email = $usuario['email'];
                                $data = $usuario['datacadastro'];
                                $dataex = $usuario['data_exclusao'];
                                $idusu = $usuario['idusuario'];
                        ?>

                                <tbody>   
                                    <tr>
                                        <td><?php echo "$setor"; ?></td>
                                        <td><strong style="color: red;"><?php echo "$nome"; ?></strong></td>
                                        <td><?php echo "$email"; ?></td>
                                        <td><?php echo "$data"; ?></td>
                                        <td><?php echo "$dataex"; ?></td>
                                        <td><a onclick="return confirma2(this)" href="reativar.php?idusu=<?php echo $idusu; ?>"><img class="icoedit" src="img/ativar.png"/></a><input class="bord" type="hidden" id="named" nome="named" value="<?php echo $nome; ?>"></td>
                                    </tr> 
                                </tbody>   

                        <?php 
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
<div class="clear3"></div>


<?php
include "include/footer.php"; 
?>