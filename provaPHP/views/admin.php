<?php
session_start();

if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
    header("Location: ./tela-login.php");
    exit();
}

$userLogado = $_SESSION["email"];
include_once "../config/connect.php";

$queryNameUser = "SELECT nome FROM users WHERE email = '$userLogado'";
$resultNameUser = mysqli_query($conexao, $queryNameUser);

if ($resultNameUser) {
    if (mysqli_num_rows($resultNameUser) > 0) {
        $row = mysqli_fetch_assoc($resultNameUser);
        $nameUser = $row["nome"];
    } else {
        header("Location: ./tela-login.php");
        exit();
    }
} else {
    echo "Erro ao obter o nome do usuário: " . mysqli_error($conexao);
}

$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conexao, $query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tela-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Navbar com título e botão Sair</title>
</head>
<body>
<div class="navbar">
    <h2>Sistema PHP | <?php echo "$nameUser"?></h2>
    <a href="../controllers/logout.php" class="logout-btn">Sair</a>
</div>
<div class="main">
<div class="title-btn-add">
<h2>Usuários:</h2>
<div>
    <button class="btn btn-add btn-primary">
        <a href="../controllers/add.php"><span class="material-symbols-outlined">
add
</span></a>
    </button>
</div>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Nível de Acesso</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $nivel_acesso = $row['nivel_acesso'] == 1 ? 'Adminstrador' : 'Cliente';
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $nivel_acesso . "</td>";
                echo "<td>
                          <button class='btn btn-primary'>
                              <a href='../controllers/edit.php?id=$row[id]'>Editar</a>
                          </button>
                          <button class='btn btn-danger'>
                              <a href='../controllers/delete.php?id=$row[id]'>Excluir</a>
                          </button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</div>
</body>
</html>

