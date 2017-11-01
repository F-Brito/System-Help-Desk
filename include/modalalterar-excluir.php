<?php include 'include/banco.php'; ?>
<!-- JANELA MODAL ALTERAR -->
    <div class="modal fade" id="janelaAlt<?php echo $id; ?>" data-backdrop="static"> 
        <div class="modal-dialog text-center">
            <div class="modal-content text-center">
                <div class="modal-header"> 
                    <button type="submit" class="close" href="usuarios.php">&times;</button>
                    <h4 class="modal-title">Alterar dados de usuário: (<span style="color: red;"><?php echo "$login"; ?></span>)</h4>
                </div>
                
                <form method="post" class="text-center" action="alterardados.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $nome; ?>">
                        </div>

                        <div class="form-group">
                            <label>Login:</label>
                            <input class="form-control" type="text" name="login" value="<?php echo $login; ?>">
                        </div>

                        <div class="form-group">
                            <label for="setor">Selecione um novo Setor:</label>
                            <select  name="setor" id="setor" class="form-control" >
                                <option value="" readonly>Selecione:</option>
                                <option value="helpdesk">Técnico Help Desk</option>
                                <option value="RH">Recursos Humanos</option>
                                <option value="administrativo">Administrativo</option>
                                <option value="admin_no_privilege">Administrativo(Sem Privilégios)</option>
                                <option value="contabil">Contábil</option>
                                <option value="operacao">Operação</option>
                                <option value="seguranca do trabalho">Segurança do Trabalho</option>
                                <option value="auxiliar servicos gerais">Auxiliar de Serviços Gerais</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>email:</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" placeholder="Por favor, insira seu e-mail atual!">      
                        </div>

                        <div class="form-group">
                            <label>Digite a senha anterior:</label>
                            <input class="form-control" type="password" name="senha" >
                        </div>

                        <div class="form-group">
                            <label>Nova senha:</label>
                            <input class="form-control" type="password" name="newsenha" >
                        </div>

                    </div> 
                
                    <div class="modal-footer ">
                        <input type="hidden" name="idusuario" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary one" name="opcao" value="alterar" >Alterar</button>
                </form>
                        <button value="cancel" type="submit" class="btn btn-default two" href="usuarios.php">Cancelar</button>  
                    </div>            
            </div>                
        </div>      
    </div> <!-- FIM JANELA MODAL ALTERAR -->
                    

<!-- JANELA MODAL EXCLUIR -->
    <div class="modal fade" id="janela<?php echo $id; ?>"> 
        <div class="modal-dialog ">
            <div class="modal-content text-center">
                <div class="modal-header pull2"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tem certeza que deseja excluir este usuário?</h4>
                </div>
        
                <form method="post" action="excluir.php" >
                    <div class="modal-body">
                        <p>Usuário: <strong><?php echo $login; ?></strong>  </p>
                        <p>Setor: <strong><?php echo $setor; ?></strong> </p>                    
                    </div>
                     
                    <div class="modal-footer ">
                        <input type="hidden" name="idusuario" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-default" data-dismiss='modal'>Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="opcao" value="excluir" >Remover</button>
                    </div>
                </form>  
            </div>                
        </div>      
    </div> <!-- FIM JANELA MODAL EXCLUIR -->