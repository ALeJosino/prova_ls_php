<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
          <style>
        /* Estilizando o corpo da página */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; /* Cor de fundo */
}

/* Estilizando o contêiner principal */
.box {
    background-color: #ffffff; /* Fundo branco para o contêiner */
    width: 400px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
    filter: grayscale(100%); /* Escala de cinza */
}

/* Estilizando o formulário dentro do contêiner */
.form-container {
    max-width: 100%;
}

/* Estilizando os campos de entrada */
.inputBox {
    position: relative;
    margin-bottom: 20px;
}

.inputUser {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    color: #333; /* Cor do texto */
}

.labelInput {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 16px;
    color: #999; /* Cor do texto de rótulo */
    pointer-events: none;
    transition: 0.3s;
}

.inputUser:focus ~ .labelInput,
.inputUser:valid ~ .labelInput {
    top: -15px;
    font-size: 12px;
    color: #666; /* Cor do texto de rótulo quando focado ou preenchido */
}

/* Estilizando o botão de envio */
.submit-btn {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff; /* Cor de fundo do botão */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
}

/* Estilizando o link de voltar */
.back-link {
    display: inline-block;
    margin-bottom: 20px;
    color: #007bff; /* Cor do link */
    text-decoration: none;
}

.back-link:hover {
    text-decoration: underline;
}

/* Estilizando o título de edição */
.edit-title {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333; /* Cor do título */
}

/* Estilizando o seletor de nível de acesso */
#nivel_acesso {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    color: #333; /* Cor do texto */
}

/* Estilizando a etiqueta do seletor de nível de acesso */
#nivel_acesso + label {
    margin-top: 10px;
    display: block;
    color: #333; /* Cor da etiqueta */
}

/* Estilizando as opções do seletor de nível de acesso */
#nivel_acesso option {
    color: #333; /* Cor do texto das opções */
}

    </style>
</head>
<body>
    <a href="../views/admin.php">Voltar</a>
    <div class="box">
        <form action="add.php" method="POST">
            <h2>adicionar</h2>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome completo</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="email" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="nivel_acesso">Nível de Acesso</label>
                <select name="nivel_acesso" id="nivel_acesso" class="inputUser" required>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
            <br><br>
          
            <input type="submit" name="submit" id="submit" value="Adicionar"/>
        </form>
    </div>
</body>
</html>
