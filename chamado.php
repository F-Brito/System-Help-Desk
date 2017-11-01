<?php 
// informações que o usuario passa atravez do homeusuario.php e support.php. 
	include "include/banco.php";

	$motivo = $_POST['motivo'];
	$descricao = $_POST['descricao'];
    $idusuario = $_POST['idusuario'];
    $numaquina = $_POST['numaquina'];

// informações do banco para juntar com as informações do usuario passadas aqui em cima, e colocar na tabela chamados.
	$query = "select setor, nome from usuario where idusuario = '$idusuario' limit 1";
	$consulta = mysqli_query($con, $query);
	
	if($usuario = mysqli_fetch_assoc($consulta)){
        $setor = $usuario['setor'];
        $nome = $usuario['nome'];
        date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");
    }
    
	$query2 = "insert into chamados(idusuario, data, setorcall, solicitacao, descricao, problema, numaquina, status) values('$idusuario','$data','$setor','$nome','$descricao','$motivo','$numaquina','Pendente')";
    mysqli_query($con, $query2);
    header("Location:homeusuario.php?msagen=right");
    
//quando o tecnico troca esse "pendente" para "Resolvido" deve se fazer o update no status.
 ?>