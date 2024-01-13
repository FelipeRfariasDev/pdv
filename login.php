<?php
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    //echo $senha;
    //echo $email;
    // 1. Verificar na tabela usuarios o email e a senha
    // 2. Se existir o usuario, entao coloca os dados do usuario na sessao e direciona para
    //    inicio.php
    //

