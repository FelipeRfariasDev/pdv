<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $id";
    //echo $sql;
    //exit;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php include("../layout/menu.php");?>
    <h2>Editar Usuário</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?= $usuario['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $usuario['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?= $usuario['telefone'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

</body>
</html>
