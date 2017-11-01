<?php
    $idusu = $_POST['idusuario'];
    
    include "include/banco.php";

    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d H:i:s");

    $query = "update usuario set dados_status = 'desativado', data_exclusao = '$data' where idusuario = '$idusu'";
    mysqli_query($con, $query);
    header("Location:usuarios.php");
?>