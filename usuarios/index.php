<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP e Bootstrap</title>

</head>
<body>

<div class="container mt-5">
    <?php include("../layout/menu.php");?>
    <h2>Lista de Usuários    <a href="adicionar.php" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-plus"></span></a></h2>

    <!-- <a href="adicionar.php" class="btn btn-primary mb-3">Adicionar Usuário</a> -->
    <!-- https://www.w3schools.com/icons/bootstrap_icons_glyphicons.asp -->

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once '../conexao.php';
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telefone']}</td>
                        <td>
                            <a href='editar.php?id={$row['id']}' class='btn btn-warning btn-lg'>
                                    <span class='glyphicon glyphicon-pencil'></span> Editar </a> 
                            <a href='excluir.php?id={$row['id']}' class='btn btn-danger btn-lg'>
                                    <span class='glyphicon glyphicon-trash'></span> Excluir </a>
                        </td>
                      </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
