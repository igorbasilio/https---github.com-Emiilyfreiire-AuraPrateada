<!doctype html>
<html lang="pt-BR">
 
   ```
   <style>
        .mensagem {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
   <?php
include "Modelo/DAO/Conexao.php";

// Processar o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conexao = Conexao::getInstance();

        // Verifica qual formulário foi enviado
        if ($_POST["acao"] === "login") {
            // Dados de login
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            // Consulta para verificar o usuário no banco
            $sql = "SELECT * FROM cadastro WHERE email = :email";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            // Verifica se encontrou o usuário e se a senha está correta
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario && $senha === $usuario["senha"]) { // Comparação direta da senha
                // Exibir mensagem de sucesso e redirecionar
                echo "<div class='mensagem'>Login bem-sucedido!</div>";
                
                // Redirecionar para a tela principal (index.php)
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='mensagem'>Email ou senha incorretos.</div>";
            }
            

        } elseif ($_POST["acao"] === "cadastro") {
            // Dados de cadastro
            $nome = $_POST["nome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $senha = $_POST["senha"]; // Armazena a senha como está

            // Consulta para inserir o usuário no banco
            $sql = "INSERT INTO cadastro (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            if ($stmt->execute()) {
                echo "<div class='mensagem'>Cadastro realizado com sucesso!</div>";
            } else {
                echo "<div class='mensagem'>Erro ao realizar cadastro.</div>";
            }
        }
    } catch (PDOException $e) {
        echo "<div class='mensagem'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>

<head>
    <title>Aura </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="Visao/CSS/style.css">
    <link rel="shortcut icon" href="Visao/imagem/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="img">
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Entrar </span><span>Cadrastar</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Conecte-se</h4>
                                                <form action="logincad.php" method="POST">
                                                    <input type="hidden" name="acao" value="login">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-style" placeholder="Email" required>
                                                        <i class="input-icon uil uil-at"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="senha" class="form-style" placeholder="Senha" required>
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <button type="submit" class="btn mt-4">Entrar</button>
                                                    <p class="mb-0 mt-4 text-center"><a href="redefiniçao.php" class="link">Esqueceu sua senha?</a></p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-3 pb-3">Criar conta</h4>
                                                <form action="logincad.php" method="POST">
                                                    <input type="hidden" name="acao" value="cadastro">
                                                    <div class="form-group">
                                                        <input type="text" name="nome" class="form-style" placeholder="Nome completo" required>
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="tel" name="telefone" class="form-style" placeholder="Número">
                                                        <i class="input-icon uil uil-phone"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="email" name="email" class="form-style" placeholder="Email" required>
                                                        <i class="input-icon uil uil-at"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="senha" class="form-style" placeholder="Senha" required>
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <button type="submit" class="btn mt-4">Registrar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
