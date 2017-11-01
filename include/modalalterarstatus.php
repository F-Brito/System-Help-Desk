<?php include 'banco.php'; ?>
<!-- MODAL ALTERAR 'STATUS' -->
    <div class="modal fade" id="janela<?php echo "$idchamado"; ?>">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ALTERAR STATUS:</h4>  
                </div>

                <div class="modal-body">
                    <p style="border: 1px solid lightgray;"><?php echo $quero['descricao']; ?></p>
                    <p><strong> DATA: </strong>
                        <?php echo $quero['data']; ?>
                        </br>
                        
                        <form action="alterarstatus.php" method="post">
                            <strong>Status:</strong>
                            <select name="status" >
                                <option readonly   disabled>Pendente</option>
                                <option value="resolvido" required>Resolvido</option>
                            </select>
                            
                            </br>
                    </p>
                </div>

                <div class="modal-footer">
                    <button style="border: 2px solid black;" class="btn btn-default" data-dismiss="modal">Cancelar</button>                            
                    <button type="submit" data-toggle="modal" title="tem certeza?" style="border: 2px solid black;" class="btn btn-primary" data-dismiss="modal" data-target="#janela3<?php echo "$idchamado"; ?>">Alterar</button>
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
                    <button data-dismiss="modal" class="btn btn-default">Não</button>
                    <button href="alterarstatus.php" class="btn btn-primary">Sim</button>
                </div>
            </div>
        </div>
                        </form>
    </div>
                                </span>