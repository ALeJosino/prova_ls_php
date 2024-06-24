<?php
session_start();
include_once "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $nivel_acesso = $_POST['nivel_acesso'];

    // Atualiza os dados do usuário
    $query = "UPDATE users SET nome='$nome', email='$email', password='$senha', nivel_acesso='$nivel_acesso' WHERE id='$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo "
        <!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Sucesso</title>
        </head>
        <body>
            <div class='loader-container'>
                <div class='loader'></div>
            </div>
            <p class='msgSucess'>Operação realizada com sucesso! Redirecionando...</p>
            <script>
                setTimeout(function() {
                    window.location.href = '../views/admin.php';
                }, 2000);
            </script>
        </body>
        </html>
        ";
    } else {
        echo "<p>Erro ao atualizar os dados!</p>";
    }
}
?>
