<?php include 'include/banco.php'; ?>
    <div class="modal fade" id="janela<?php echo "$idchamado"; ?>">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">DESCRIÇÃO - CHAMADO<br/>
                        <span style="color: red;"><?php echo $quero['solicitacao']; ?></span>:
                    </h4>  
                </div>
            
                <div class="modal-body">
                    <p style="border: 1px solid lightgray;"><?php echo $quero['descricao']; ?></p>
                    <p>
                        <strong>Solicitação:</strong> <?php echo $quero['problema']; ?>
                        </br>
                        <strong>Usuário:</strong> <?php echo $quero['solicitacao']; ?>
                        </br>
                        <strong>Setor:</strong> <?php echo $quero['setorcall']; ?>
                        </br>
                        <strong>Status:</strong> <?php echo "<span style='color: red;'>".$quero['status']."</span>"; ?>
                        </br>
                        <strong>DATA:</strong> <?php echo $quero['data']; ?>
                        </p>
                </div>
                
                <div class="modal-footer">
                    <button style="border: 2px solid black;" class="btn btn-primary" data-dismiss="modal">Fechar</button>  
                </div>
                
            </div>
        </div>
    </div>