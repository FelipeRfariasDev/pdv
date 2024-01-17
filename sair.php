<?php
session_start();
$_SESSION['usuario_logado'] = false;
$_SESSION['id'] = '';
$_SESSION['nome'] = '';
$_SESSION['email'] = '';
session_destroy();
header("Location: index.php");
exit();