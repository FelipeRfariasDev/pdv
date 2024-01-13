<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos SET nome = '$nome', valor ='$valor', quantidade = $quantidade WHERE id = $id";
    //echo $sql;
    //exit;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php include("../layout/menu.php");?>
    <h2>Editar Pordutos</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $produtos['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Descricao</label>
            <input type="text" class="form-control" name="nome" value="<?= $produtos['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" name="valor" value="<?= $produtos['valor'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" value="<?= $produtos['quantidade'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

</body>
</html>
