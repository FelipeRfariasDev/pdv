<?php
session_start();
if($_SESSION['usuario_logado']==false) {
    header("Location: index.php");
    exit();
}
