<?php 
    require_once "include/banco.php";

	$id = $_POST['idusuario'];
	$nome = $_POST['nome'];
	$setor = $_POST['setor'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$newsenha = md5($_POST['newsenha']);
	$opcao = $_POST['opcao'];

	if ($nome == "" or $setor == "" or $login == "" or $email == "" or $senha == "" or $newsenha == "" and $opcao == "alterar" ){ header("Location:usuarios.php?msg=branco"); die();}
	 

	/* SE CLICAR NO ÍCONE (ALTERAR) SEGUE ESTE FLUXO */
	if ($opcao == "alterar") {
		$conferir = "select idusuario, senha from usuario where idusuario = $id and senha = '$senha' limit 1";
		$cons = mysqli_query($con,$conferir);
		$row = mysqli_num_rows($cons);
			if ($row < 1){
				
				header("Location:usuarios.php?msg=senhaExiste");
			}else{
				$query = "update usuario set nome = '$nome', login = '$login', email = '$email', senha = '$newsenha', setor = '$setor' where idusuario = $id ";
				mysqli_query($con,$query);
				header("Location:usuarios.php?ok=1");
		    }
	}	 /* FIM ----------- FIM */
 ?>