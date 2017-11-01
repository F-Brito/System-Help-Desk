<?php 
	if(isset($_POST['login'])){
		$nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
		$login = htmlspecialchars($_POST['login']);
		$senha = htmlspecialchars($_POST['senha']);
		$senha = md5($senha);
		$setor = $_POST['setor'];
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");  
            
        include "include/banco.php";
        
	    $query = "select nome from usuario where login = '$login' or email = '$email' limit 1";
	    $consulta = mysqli_query($con, $query);
	    $total = mysqli_num_rows($consulta);
	
		if($total > 0){
			header("Location:cadastro.php?erro=1");
		} else {
			$query2 = "insert into usuario(nome, email, login, senha, setor, datacadastro, dados_status, primeira_vez) values('$nome','$email','$login','$senha','$setor','$data','ativo','1')";
			mysqli_query($con, $query2);
			header("Location:cadastro.php?ok=ok");
		}
//----------------------------------------------------------
    // precisa de um dominio para enviar a mensagem <<<<< 
    //$myemail = "douglas.sevenx@hotmail.com"; 

    //$from = $myemail; // o email da empresa indo para o email do funcionario
    //$to = $email; // email do funcionario que esta recebendo
    //$first_name = $nome;
    //$subject = "Mensagem";
    //$subject2 = "Cópia da sua mensagem"; 
    //$message = " Enviou o seguinte:" . "\n\n" . "Bem-vindo a empresa Sr.$first_name. Esse é um email contendo suas informações: Seu login: $login Sua senha: $senha";
    //$message2 = "Aqui está uma cópia da sua mensagem" . $first_name . "\n\n" . $_POST['message'];

    //$headers = "De:" . $from;
    //$headers2 = "Para:" . $to;
    //mail($to,$subject,$message,$headers);
        
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    //echo "E-mail enviado, muito obrigado!" . $first_name . ", Entraremos em contato em breve.";
      
	}
 ?>