<?php 
    if(empty($_COOKIE['admin'])){
        header("Location:index.php");
    }

//mensagens de erro 
    if(isset($_GET['erro'])){
        if ($_GET['erro'] == 1) {
            $msg = "Usuário já existe! tente com outro email ou talvez outro login.";
        } 
    }else{ $msg = ""; }

    if(isset($_GET['ok'])){
        if($_GET['ok'] == 'ok'){
            $msg2 = "Usuário cadastrado com sucesso!";
        }
    }else{ $msg2 = ""; } 
    
    include "include/header.php"; 
?>
<div class="clear4"></div>
    
   <!-- FORMULÁRIO PARA CADASTRAR USUÁRIOS -->
<div class="container">
    <div class="col-xs-12 col-md-12">
        <form  action="validarcadastro.php" method="post" >
            <div class="usuarios container">
                <div class="row">
                    <h3>Cadastro de Funcionário</h3>
                    <span style="color:blue; display: flex; justify-content: center;"><strong><?php echo $msg2; ?></strong></span>
                    <span style="color: red; display: flex; justify-content: center;"><?php echo $msg; ?></span>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Digite seu nome completo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input class="form-control" id="login" name="login" type="text" placeholder="Crie um login para o usuario ter acesso futuramente a plataforma" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input class="form-control" id="senha" name="senha" type="password" placeholder="Informe uma senha" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="csenha">Confirma Senha:</label>
                        <input class="form-control" onblur="verifica()" id="csenha" name="csenha" type="password" placeholder="Informe a mesma senha para confirmação" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="setor">Setor:</label>
                        <select name="setor" id="setor" class="form-control" required>
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
                </div>
                
                <div class="inline form-group">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form> 
    </div>
</div>
<div class="clear2"></div>

<?php include "include/footer.php"; ?>      