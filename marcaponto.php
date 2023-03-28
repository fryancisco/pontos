<?php
    if(session_status() !== PHP_SESSION_ACTIVE){session_start();}
    include("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $hhoje = date("H:i:s");                         // 17:16:18
    
    $cod_bar = mysqli_real_escape_string($conexao, trim($_POST['codbar']));

    $sql = "SELECT * FROM funcionarios WHERE codbar = '$cod_bar'";
    $result = mysqli_query($conexao, $sql);
    $nomefuncionario = mysqli_fetch_assoc($result);
    $nomefun = $nomefuncionario['nomefunc'];
    if($cod_bar === $nomefuncionario['codbar']){
        $sql = "INSERT INTO `pontofunc`(`datah`,`hora`, `idponto`, `nomefunc`) VALUES (NOW(), '$hhoje','','$nomefun')";
    }else{
        $_SESSION['nmarcado'] = TRUE;
    }
    if($conexao->query($sql) === TRUE){
        $_SESSION['marcado'] = TRUE;
    }

    $conexao->close();

    header('Location: index.php');
    exit;
?>