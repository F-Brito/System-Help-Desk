<?php include 'include/banco.php'; ?>
 <!-- MODAL ALTERAR 'STATUS' -->
    <div class="modal fade" id="janela<?php echo "$idchamado"; ?>">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">SOLICITAÇÃO </br>ALTERAR 'STATUS':</h4>  
                </div>
                
                <div class="modal-body">
                    <H5>Olá, <?php echo $quero['solicitacao']; ?> - Confirma o reparo do chamado a seguir:</H5>
                    <p style="border: 1px solid lightgray;"><?php echo $quero['descricao'];; ?></p>
                    <p>
                        <strong>Motivo:</strong>
                        <?php echo $quero['problema']; ?>
                        </br>
                        <strong>DATA:</strong> <?php echo $quero['data']; ?>
                    </p>
                    <form action="alterarstatus2.php" method="post">                          
                </div>
                        
                <div class="modal-footer">
                    <button style="border: 2px solid black;" class="btn btn-default" data-dismiss="modal">Não</button>
                    <button data-toggle="modal" title="tem certeza?" style="border: 2px solid black;" class="btn btn-primary" data-dismiss="modal" data-target="#janela3<?php echo "$idchamado"; ?>">Sim </button>
                </div>    
            </div>
        </div>
    </div>

<!-- MODAL 'TEM CERTEZA? ' -->
    <div class="modal fade" id="janela3<?php echo "$idchamado"; ?>">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h3><strong>Tem certeza?</strong></h3>
                    <input type="hidden" name="idchamado" value="<?php echo $idchamado; ?>"></input> 
                    <input type="hidden" name="idusuario" value="<?php echo $id; ?>"></input>   
                    <button data-dismiss="modal" class="btn btn-default">Cancelar</button>
                    <button class="btn btn-primary">Sim, confirmo a efetuação.</button>
                </div>
            </div>
        </div>
                    </form>
    </div>                                      
</span>