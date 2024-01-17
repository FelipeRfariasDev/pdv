<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pdo = new PDO("mysql:host=localhost;dbname=pdv", 'root', '');

    $email = $_POST['email'];
    $senha = md5($_POST["senha"]);

    $stmt = $pdo->prepare("SELECT id,nome,email FROM usuarios WHERE email = '$email' and senha = '$senha'");
    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario['id']) {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        header("Location: inicio.php");
        exit();
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}

