<?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if($msg == "senhaExiste"){
            $msg1 = "Antiga senha incorreta!";}
        if($msg == "2"){
            $msg2 = "Usuário removido com sucesso!";} 
        if($msg == "branco"){
            echo "<script> alert ('Valores em branco, impossível continuar!');</script>";
            header("Refresh:0, usuarios.php");
        }
    }
    
    if (isset($_GET['ok'])) {
        $ok = "Dados alterados com sucesso!";
    }

    include "include/header.php"; 
    include "include/banco.php";
    if (empty($_COOKIE['admin'])){
        header("Location:index.php");
    }
    
?>
<style>
    @keyframes slidein {
        from {
            /*margin-left: -200%;
            margin-bottom: 45px;*/
            font-size: 18px;
        }

        to {
            text-align: center;
           /* margin-bottom: 45px;*/
            font-size: 30px; 
        }
    }
</style>
<div class="clear5"></div>
<section >
    <div class="container ">
        <div class="col-xs-12 col-md-12">
            <form method="post" id="document" name="document">
                <div class="form-group inline">
                    <h3 class="ajust3">Usuários Ativos</h3>
                    <input class="form-control buscar" type="search" name="buscar" placeholder="buscar"> 
                    <input value="Buscar" type="submit" class="btn btn-info sizebtn form-control">  
                </div>
           
            </form>
            <div class="table-responsive">
                <form method="POST">
                    <p style="color: red; font-size: 18px; animation-direction: alternate; animation-iteration-count: 2;  text-align: center; animation-duration: 3s;  animation-name: slidein; "><?php if(isset($msg1)){ echo "$msg1"; } ?></p>
                    <p style="color: blue; font-size: 18px; animation-direction: alternate; animation-iteration-count: 2;  text-align: center; animation-duration: 3s;  animation-name: slidein; "><?php if(isset($ok)){ echo "$ok"; } ?></p>
                    <p style="color: green; font-size: 18px; animation-direction: alternate; animation-iteration-count: 2;  text-align: center; animation-duration: 3s;  animation-name: slidein; "><?php if(isset($msg2)){ echo "$msg2"; } ?></p>

                    <table class=" tab table table-hover">
                        <thead>
                            <tr class="back">
                            <th>Setor: </th>
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>Data de cadastro:</th>
                            <th>Alterar dados:</th>
                            <th>Remover:</th>
                            </tr>
                        </thead>
                    <?php
                        if(empty($_POST['buscar'])){
                            $query = "select * from usuario where dados_status = 'ativo' order by nome";
                        }else{
                            $pesquisa = htmlspecialchars($_POST['buscar']);
                            $query = "select * from usuario where email like '%$pesquisa%' and dados_status = 'ativo' or nome like '%$pesquisa%' and dados_status = 'ativo'";
                        }

                        $consulta = mysqli_query($con,$query);
                        while ($usuario = mysqli_fetch_assoc($consulta)){
                            $setor = $usuario['setor'];
                            $nome = $usuario['nome'];
                            $email = $usuario['email'];
                            $data = $usuario['datacadastro'];
                            $id= $usuario['idusuario'];
                            $login= $usuario['login'];
                    ?>

                        <tbody>   
                            <tr>
                                <td><?php if($setor=="administrativo"){echo "<img data-toggle='tooltip' data-placement='top' title='USUÁRIO ADMIN' class='icoedit' src='img/admin.jpg'"; } else { echo "$setor"; } ?></td>

                                <td><strong style="color: red;"><?php echo "$nome"; ?></strong></td>
                                <td><?php echo "$email"; ?></td>
                                <td><?php echo "$data"; ?></td>
                                <!-- ALTERAR -->
                                <td>
                                  <a style="cursor: pointer;" data-toggle="modal" title='ALTERAR DADOS'  data-target="#janelaAlt<?php echo $id; ?>"><img class="icoedit" src="img/change.jpg"/></a>
                                </td>
                                 <!-- REMOVER USUARIO -->
                                <td><a style="cursor: pointer;"  data-toggle="modal" title='REMOVER USUARIO' data-target="#janela<?php echo $id; ?>" ><img class="icoedit" src="img/no.jpg"/></a></td>
                            </tr> 

                                <?php 
                                    include 'include/modalalterar-excluir.php';
                                 ?>

                        </tbody>   
                    <?php 
                        }
                    ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
    
<div class="clear3"></div>
<?php
include "include/footer.php"; ?>  