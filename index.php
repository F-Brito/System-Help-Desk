<?php
    if(isset($_COOKIE['admin'])){
        header("Location:home.php");
}

    if(isset($_COOKIE['usuario'])){
        header("Location:homeusuario.php");
}
    
    if(isset($_COOKIE['tecnico'])){
        header("Location:hometech.php");
    }

    include "include/header.php" ;

// o erro 200 é quando desloga e o 404 é quando tenta logar.
    if(isset($_GET['mensagem'])){
        $err = $_GET['mensagem'];
        
        if($err == 200){
            echo "<script>alert('Você foi deslogado com sucesso!');</script>";    
        }else if($err == 404){
            echo "<script>alert('Login ou Senha Invalida!');</script>";
        }
}

?>
<div class="clear3"></div>
<section id="index">
    <div class="index container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
               
                <form action="login.php" method="post" class="acesso panel panel-default">
                    <div class="panel-heading text-center">
                            Acesso Restrito
                    </div>
                    
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="usuario">Login:</label>
                            <input id="usuario" name="login" class="form-control" type="text" required autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input id="senha" name="senha" class="form-control" type="password" required>
                        </div>
                    </div>

                    <div class="panel-footer pull  text-center">

                        <button type="reset" class="btn btn-danger">Limpar</button>
                        <button id="botaoLogin" type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    
                </form>  
            </div>   
        </div>
    </div>
</section>
<div class="cleardown"></div>

<?php include "include/footer.php" ?>   