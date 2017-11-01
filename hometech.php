<?php
    if(empty($_COOKIE['tecnico'])){
        header("Location:index.php");
    }

    include "include/banco.php";

    if(isset($_GET['msg'])){
        if($_GET['msg'] == "solicitado"){
            echo "<script> alert ('Alteração de status solicitada, aguarde o retorno do usuário!');</script>";
            header("Location: hometech.php");
        }else if($_GET['msg'] == "altera"){
            echo "<script> alert('Senha alterada com sucesso! Obs: use esta senha para acessar a plataforma.');</script>";
            header("Location: hometech.php");
        }
    }
    
    $login = $_COOKIE['tecnico'];
    $query = "select idusuario, primeira_vez from usuario where login = '$login' limit 1";
    $consulta = mysqli_query($con, $query);

    if($usuario = mysqli_fetch_assoc($consulta)){
        $id = $usuario['idusuario'];
        $vez = $usuario['primeira_vez'];
    }
    
    if(isset($_POST['selecionar'])){
        $selecionar = $_POST['selecionar'];
        $status = $_POST['status'];
        
        
        if($selecionar == "todos"){
            $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where status = '$status' order by idchamado";
        }else{
            $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where setorcall = '$selecionar' and status = '$status' order by idchamado";
        }
        
    }else{ $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where status = 'Pendente' order by idchamado"; }
    $cons = mysqli_query($con, $query);
    $total = mysqli_num_rows($cons);

    include "include/header.php";   
?>
<div class="clear4"></div>
    <section class="overx">
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <h3 class="ajust2">Chamados</h3>
              
                <form action="" method="post" >
                    <div class="setor form-group">
                        <label style="color: black;" for="selecionar">Selecionar por:</label>
                        <select class="form-control" name="selecionar" id="selecionar" required>
                            <option value="todos">Todos</option>
                            <option value="RH">Recursos Humanos</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="admin_no_privilege">Administrativo(Sem Privilégios)</option>
                            <option value="contabil">Contábil</option>
                            <option value="operacao">Operação</option>
                            <option value="seguranca do trabalho">Segurança do Trabalho</option>
                            <option value="auxiliar servicos gerais">Auxiliar de Serviços Gerais</option>
                        </select>
                        
                    </div>
                    
                    <div class="tipo form-group ">
                        <label style="color: black;" for="status">Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Selecione:</option>
                            <option  style="color: red;" value="Pendente">Pendentes</option>
                            <option style="color: blue;" value="Resolvido">Resolvidos</option>
                        </select>
                        <div class="form-control botao">
                            <button class="btn btn-default pesq"> Pesquisar</button>
                        </div>
                    </div>
                </form>
                
                <div class='table-responsive'> 
                    <?php if($total != 0){
                        echo "<table class='tab table table-hover'>
                                <thead>
                                    <tr class='back'>
                                        <th>Setor:</th>
                                        <th>Nº da Máquina</th>
                                        <th>Motivo:</th>
                                        <th>Data:</th>
                                        <th>Solicitação:</th>
                                        <th>Status:</th>
                                        <th>Visualizar:</th>
                                    </tr>
                                </thead>";

                        while($quero = mysqli_fetch_array($cons)){
                            $idchamado = $quero['idchamado'];
                            echo "<tbody>   
                                    <tr>
                                        <td>" .$quero['setorcall']. "</td>
                                        <td>" .$quero['numaquina']. "</td>
                                        <td>" .$quero['problema']. "</td>
                                        <td>" .$quero['data']. "</td>
                                        <td>" .$quero['solicitacao']. "</td>
                                        <td>" ?>
                                            <?php if($quero['status'] == 'Pendente'){
                                                $query4 = "select * from confirma where idchamado2 = $idchamado";
                                                $consulta4 = mysqli_query($con,$query4);
                                                $rows = mysqli_num_rows($consulta4);
                                            
                                                if ($rows > 0) {
                                                    echo "<p style='color: red; '>".$quero['status']."</br><span style='font-style: italic;'>(Alteração</span></br>solicitada)</p>";
                                                } else {
                                                    echo "<span style='color: red;'>".$quero['status']."</span>";
                                             ?>
                                                    <a style="cursor: pointer;" data-toggle="modal"  data-target="#janela<?php echo "$idchamado"; ?>"><img  style="display: inline; height: 20px; width: 20px;" src="img/refresh.png"></a>
                                            <?php 
                                                    include 'include/modalalterarstatus.php';
                                                } 
                                            }
                                            
                                            if($quero['status'] == 'Resolvido') {
                                                echo "<span style='color:blue;'>Resolvido</span>"; 
                                            }
                            
                                        ?><?php echo "</td>";  ?>
                                        <?php
                                            echo"<td>";?>
                                            <a title="Visualizar detalhes" style="cursor: pointer;" data-toggle="modal"  data-target="#janela<?php echo "$idchamado"; ?>"><img width="50px" height="50px" src="img/descricao.jpg"/></a>
                                        <?php
                                            include 'include/modaldescricao.php';
                                            echo "</td>
                                            </tr> 
                                        </tbody>"; ?>   
                    <?php     
                        }
                        echo "</table>";
                    }
                    ?>
            
                </div> 
            </div>
        </div>
    </section>
<div class="clear3"></div>

<?php
    include "include/footer.php";
    
    if($vez == 1){
        include "include/modalsenha.php";
?>
        <script>
            $(document).ready(function(){
            $('#modalSenha').modal('show');
            });
        </script>
<?php } ?>