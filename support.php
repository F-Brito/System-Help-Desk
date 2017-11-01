<?php 
    if(empty($_COOKIE['admin'])){
        header("Location:index.php");
    }

    include "include/banco.php";

    $login = $_COOKIE['admin'];
    $query = "select idusuario from usuario where login = '$login' limit 1";
    $consulta = mysqli_query($con, $query);

    if($usuario = mysqli_fetch_array($consulta)){
        $id = $usuario['idusuario'];
    }


    $query2 = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where idusuario = '$id'";
    $cons = mysqli_query($con, $query2);
    $total = mysqli_num_rows($cons);

    include "include/header.php";

//Mensagens de Sucesso 
    if(isset($_GET['msagen'])){
        $msagen = $_GET['msagen'];
        $down = "down2";
        if($msagen == "right"){
            echo "<script>alert('Problema relatado com Sucesso!');</script>";  
        }else if($msagen == "up"){
            echo "<script>alert('Obrigado pela confirmação!');</script>";   
        }
    }
    
 ?>
<div class="clearbit2"></div>
	<section >
        <div class="container <?php echo "$down"; ?> down ">
            <div class="col-xs-12 col-md-12">
                <h3 class="ajust">Abrir chamado</h3>
                <div class="clearbit0"></div>
        <?php
                if($total != 0){
                    echo "<div class='table-responsive'>";
                    echo "<table  class='tab table table-hover'>
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
                    ?>        
                    <?php  
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
                                        echo "<span style='color:red;'>Pendente</span>";
                                    ?>
                                        <?php
                                        $query3 = "select * from confirma where idchamado2 = ('$idchamado')";
                                        $consulta3 = mysqli_query($con,$query3);
                                        $row3 = mysqli_num_rows($consulta3);
                                        if ($row3 > 0 ) { 
                                    ?>
                                            <span style="display: inline-block;">
                                            <a title="Nova Solicitação: ALTERAR STATUS" style="cursor: pointer;" data-toggle="modal"  data-target="#janela<?php echo "$idchamado"; ?>"><img style="display: inline; height: 50px; width: 50px;" src="img/novanotificacao2.jpg"></a>
                                    <?php 
                                            include 'include/modalconfirma.php'; 
                                        } 
                                    } else {
                                        echo "<span style='color:blue;'>Resolvido</span>"; 
                                    }
                                    ?>
                    <?php
                               echo "</td>
                                    <td>"; 
                    ?>
                        <a title="Visualizar detalhes" style="cursor: pointer;" data-toggle="modal"  data-target="#janela<?php echo "$idchamado"; ?>"><img width="50px" height="50px" src="img/descricao.jpg"/></a>
                    
                    <?php  
                        include 'include/modaldescricao.php';
                        echo "</td> 
                            </tr> 
                        </tbody>"; 
                    }       
                    ?> 
                    <?php  
                    echo "</table>";
                    echo "</div>";
                }  ?>    
                    <hr>  
                      
                <form action="chamado.php" method="post" name="chamado" id="chamado" oninput="ajustes(this)" >
                    <div class="form-group text-center">
                        <label for="numaquina">Código da Máquina:</label>
                        <input class="form-control" type="text" id="numaquina" name="numaquina" placeholder="Digite o código do computador que está na etiqueta preso ao gabinete." onkeyup="salto(this.name,this.value)" onkeypress="masc_phone(this)" required>
                    </div>
                    
                    <div class="form-group text-center">
                        <label for="motivo" >Problema:</label>
                            <select name="motivo" id="motivo" class="form-control" required>
                                <option value="">Selecione: </option>
                                <option value="mouse" >Mouse com defeito</option>
                                <option value="teclado" >Teclado com defeito </option>
                                <option value="impressora" >Impressora com defeito </option>
                                <option value="monitor">Monitor com defeito </option>
                                <option value="computador" >Computador não liga </option>
                                <option value="internet">Sem internet </option>
                                <option value="outro">Outro.. </option>
                            </select>
                    </div>

                    <div  class="form-group text-center">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" maxlength="300" name="descricao" placeholder="Descreva o problema aqui..." rows="5" id="comment"></textarea>
                    </div>
                   
                    <input type="submit" style="border: 1px solid black; margin-top: 10px;" class=" btn btn-default" name="">
                    <input type='hidden' name="idusuario" value="<?php echo $id; ?>" ></input>
                   <input style="border: 1px solid black; margin-top: 10px;" class="btn btn-danger" type="reset">
                </form>
            </div>
        </div>
    </section>
<div class="clear4"></div>

 <?php 
    include "include/footer.php";
 ?>