<?php
require_once '../conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM fornecedores WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header("Location: index.php");
exit;
