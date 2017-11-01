
    <div class='modal fade' id='modalSenha' data-backdrop='static'> 
        <div class='modal-dialog text-center'>
            <div class='modal-content text-center'>
                <div class='modal-header'> 
                    <button type='submit' class='close' href='usuarios.php'>&times;</button>
                    <h4 class='modal-title'>Alterar dados de usuário: (<span style='color: red;'><?php echo '$login'; ?></span>)</h4>
                </div>
                
                <form method='post' class='text-center' action='alterarsenha.php' enctype='multipart/form-data'>
                    <div class='modal-body'>
                        <div class='form-group'>
                            <label for='senha'>Nova senha:</label>
                            <input class='form-control' type='password' id="senha" name='senha' required placeholder="Digite uma nova senha">
                        </div>
                    
                        <div class='form-group'>
                            <label for='csenha'>Confirmar nova senha:</label>
                            <input class='form-control' onblur="verifica()" type='password' id="csenha" name='csenha' required placeholder="confirme a senha">
                        </div>
                    </div>
                    
                <div class='modal-footer '>
                    <input type='hidden' name='idusuario' value='<?php echo $id; ?>'>
                    <button type='submit' class='btn btn-primary one' name='opcao' value='alterar' >Alterar</button>
                </form>  
                </div>  
            </div>    
        </div>      
    </div>