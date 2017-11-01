<?php include 'include/banco.php'; ?>
 <!-- JANELA MODAL EXCLUIR -->
    <div class="modal fade" id="janela<?php echo $id; ?>"> 
        <div class="modal-dialog ">
            <div class="modal-content text-center">
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tem certeza que deseja excluir?</h4>
                </div>
    
                <form method="post"  action="remover-alterar.php" >
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
    </div>
<!-- FIM JANELA MODAL EXCLUIR -->                     