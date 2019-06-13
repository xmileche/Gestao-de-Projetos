<?php
    session_start();
    unset($_SESSION['usuario_cpf']);
    unset($_SESSION['usuario_nome']);
    session_destroy();
    header("Location: ../cadastro_login/login.php");
?>