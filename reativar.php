<?php
    $idusu = $_GET['idusu'];
    
    include "include/banco.php";
    
    $query = "update usuario set dados_status = 'ativo', data_exclusao = '0000-00-00 00:00:00' where idusuario = '$idusu'";
    mysqli_query($con, $query);

    header("Location:desativado.php");
?>