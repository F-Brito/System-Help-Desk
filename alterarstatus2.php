<?php 
	include 'include/banco.php';

	/* RECEBE IDCHAMADO */
	if(isset($_POST['idchamado'])){		
		$idchamado = $_POST['idchamado'];
        date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");

		/* ATUALIZA O STATUS NA TABELA 'CHAMADOS' PARA 'RESOLVIDO'*/
		$query = "update chamados set status = 'Resolvido', data_resolvido = '$data' where idchamado = $idchamado";
        mysqli_query($con,$query);
		/* DELETA O RESPECTIVO CHAMADO NA TABELA 'CONFIRMA'*/
		$query2 = "delete from confirma where idchamado2 = $idchamado";
        mysqli_query($con,$query2);
        header("Location:homeusuario.php?msg=resolvido");
	}else{
        header("Location:index.php");
	} 
 ?>