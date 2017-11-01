<?php
	require_once "include/banco.php";
	
    if (isset($_POST['idchamado'])){
/* RECEBE DA PÁGINA (HOME.PHP) O ID CHAMADO QUE SOLICITOU ALTERAR PARA 'RESOLVIDO '*/	
    $idchamado = $_POST['idchamado'];
    
/* CONSULTA NA TABELA CHAMADOS*/
    $query = "select idusuario from chamados where idchamado = '$idchamado' ";
    $consulta = mysqli_query($con,$query);
    
    if ($info = mysqli_fetch_assoc($consulta)) {
        /* RECEBE O ID USUARIO */
        $idusuario = $info['idusuario'];
					
        /* INSERE NA TABELA 'CONFIRMA' UM NOVO: IDCONFIRMA, ID-USUARIO, ID-CHAMADO */
        $query2 = "insert into confirma (idusuario,idchamado2) values ('$idusuario','$idchamado')";
        mysqli_query($con,$query2);
        header("Location:hometech.php?msg=solicitado");
    }
    }else{
        header("Location:index.php");
    }
 ?>