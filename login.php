<?php
	include "include/banco.php";
    
    $login = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['senha']);
    $senha = md5($senha);

    $query = "select setor from usuario where login = '$login' and senha = '$senha' and dados_status = 'ativo' limit 1";
	$cons = mysqli_query($con, $query);
	$total = mysqli_num_rows($cons);
    
    if($usuario = mysqli_fetch_assoc($cons)){
        $setor = $usuario['setor'];
    }
    if($total > 0){
        // esse helpdesk criei para ter a pagina do tecnico, felipe fez de um jeito que perdi a logica.
        if($setor == "administrativo"){
            setcookie ("admin", "$login", (time() + (24 * 3600)));
            header("Location: home.php");
        }else if($setor == "helpdesk"){
            setcookie ("tecnico", "$login", (time() +(24 * 3600)));
            header("Location: hometech.php");
        }else{
            setcookie ("usuario", "$login", (time() + (24 * 3600)));
            header("Location: homeusuario.php");
        }
    }else{
        //mensagem de erro que vai para o script no index
        header("Location:index.php?mensagem=404");
    }
 ?>