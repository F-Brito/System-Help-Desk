<?php
    include "include/banco.php";
    
    $senha = $_POST['senha'];
    $senha = md5($senha); 
    $id = $_POST['idusuario'];
    
    $query = "update usuario set senha = '$senha', primeira_vez = '0' where idusuario = '$id' ";
    mysqli_query($con, $query);
    
    if(isset($_COOKIE['usuario'])){
        header("Location: homeusuario.php?msagen=left");
    }else if(isset($_COOKIE['tecnico'])){
        header("Location: hometech.php?msg=altera");
    }
?>