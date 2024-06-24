<?php
session_start();
include_once "../config/connect.php";
if (
  isset($_POST["submit"]) &&
  !empty($_POST["email"]) &&
  !empty($_POST["password"])
) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Consulta SQL para obter os dados do usuário
  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conexao, $query);

  if (mysqli_num_rows($result) > 0) {
    // Usuário encontrado, obtenha o nível de acesso
    $usuario = mysqli_fetch_assoc($result);
    $nivel_acesso = $usuario["nivel_acesso"];

    // Redirecionamento com base no nível de acesso
    if ($nivel_acesso == 1) {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
            <!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Usuário Deletado</title>
            </head>
            <body>
                <div class='loader-container'>
                    <div class='loader'></div>
                </div>
                <div class='msgSucess'>Redirecionando...</div>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
    } else {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      /*header("Location: ../views/client.php");
      exit();*/
      echo "
      <!DOCTYPE html>
      <html lang='pt-BR'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Cadastro Sucesso</title>
      </head>
      <body>
          <div class='loader-container'>
              <div class='loader'></div>
          </div>
          <p class='msgSucess' style='text-align: center;'>Redirecionando...</p>
          <script>
              setTimeout(function() {
                  window.location.href = '../views/client.php';
              }, 1000);
          </script>
      </body>
      </html>
      ";
    }
  } else {
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location: ../views/tela-login.php");
  }
}
?>
