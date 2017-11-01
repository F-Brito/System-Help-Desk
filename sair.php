<?php 
	if(isset($_COOKIE['admin'])){
		setcookie("admin","admin", time()-1);
	}

	if(isset($_COOKIE['usuario'])){
		setcookie("usuario","", time()-1);
	}
    if(isset($_COOKIE['tecnico'])){
		setcookie("tecnico","", time()-1);
	}
    
//mensagem de saida para a pagina index
	header("Refresh:0.9, index.php?mensagem=200");
//	echo "<img src='img/andre.gif.gif' />";
 ?>