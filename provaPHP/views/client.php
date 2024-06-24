<?php
session_start();
if (
  !isset($_SESSION["email"]) == true &&
  !isset($_SESSION["password"]) == true
) {
  unset($_SESSION["email"]);
  unset($_SESSION["password"]);
  header("Location: ./tela-login.php");
}

$userLogado = $_SESSION["email"];
include_once "../config/connect.php";

$queryNameUser = "SELECT nome FROM users WHERE email = '$userLogado'";
$resultNameUser = mysqli_query($conexao, $queryNameUser);

if ($resultNameUser) {
    if (mysqli_num_rows($resultNameUser) > 0) {
        $row = mysqli_fetch_assoc($resultNameUser);
        $nameUser = $row["nome"];
        
// Conexão com o banco de dados

// Consulta para selecionar todos os usuários
$query = "SELECT * FROM users";
$result = mysqli_query($conexao, $query);

// Array para armazenar os usuários
$users = [];

// Verifica se há resultados
if (mysqli_num_rows($result) > 0) {
    // Loop através dos resultados e armazena-os no array $users
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

// Inclui o arquivo HTML

        
    } else {
        header("Location: ./tela-login.php");
        exit();
    }
} else {
    echo "Erro ao obter o nome do usuário: " . mysqli_error($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/client.css">
    <title>Navbar com título e botão Sair</title>
    <style>
      

    </style>
</head>
<body>
<div class="navbar">
    <h1><?php
    echo "$nameUser";
  ?></h1>
    <a href="../controllers/logout.php" class="logout-btn">Sair</a>
</div>

 <div class="container">
        <h2>Lista de Usuários</h2>
        <?php foreach ($users as $user): ?>
        <?php $nivel_acesso = $user['nivel_acesso'] == 1 ? 'Admin' : 'Cliente'?>
            <div class="card">
                <div class="card-item"><label>ID:</label> <?php echo $user['id']; ?></div>
                <div class="card-item"><label>Nome:</label> <?php echo $user['nome']; ?></div>
                <div class="card-item"><label>Email:</label> <?php echo $user['email']; ?></div>
                <div class="card-item"><label>Nível de Acesso:</label> <?php echo $nivel_acesso; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
