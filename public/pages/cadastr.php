<?php

require __DIR__ . '/../../data/databteste.php';
require __DIR__ . '/../../vendor/autoload.php';

use Src\Model\Usuario;
use Illuminate\Database\Capsule\Manager as DB;

session_start();

$erro = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        if (isset($_POST['usuario_cad']) && isset($_POST['senha_cad'])) {
            $usuarioCadastro = trim($_POST["usuario_cad"]);
            $senhaCadastro = trim($_POST["senha_cad"]);
            $confirmarSenha = trim($_POST["confirmar_senha"]);
            $nomeCadastro = trim($_POST["nome"]);
            $emailCadastro = trim($_POST["email"]);
            $dataNascimento = $_POST["data_nascimento"];

            if ($senhaCadastro !== $confirmarSenha) {
                $erro = "As senhas não coincidem!";
            } else {
                $existe = Usuario::where('usuario', $usuarioCadastro)->exists();
                if ($existe) {
                    $erro = "Usuário já cadastrado!";
                } else {
                    $senhaHash = password_hash($senhaCadastro, PASSWORD_DEFAULT);

                    $usuario = Usuario::create([
                        'usuario' => $usuarioCadastro,
                        'senha_hash' => $senhaHash,
                        'nome' => $nomeCadastro,
                        'email' => $emailCadastro,
                        'data_nascimento' => $dataNascimento,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);

                    if ($usuario) {
                        $_SESSION["usuario"] = $usuario->usuario;
                        header("Location: ../index.php");
                        exit();
                    } else {
                        $erro = "Erro ao cadastrar usuário.";
                    }
                }
            }
        }

        if (isset($_POST['usuario_log']) && isset($_POST['senha_log'])) {
            $usuarioLogin = trim($_POST["usuario_log"]);
            $senhaLogin = trim($_POST["senha_log"]);

            $usuario = Usuario::where('usuario', $usuarioLogin)->first();

            if ($usuario && password_verify($senhaLogin, $usuario->senha_hash)) { 
                $_SESSION["usuario"] = $usuario->usuario;
                header("Location: ../index.php");
                exit();
            } else {
                $erro = "Usuário ou senha incorretos.";
            }
        }
    } catch (Exception $e) {
        $erro = "Erro: " . $e->getMessage();
    }

    try {
        DB::connection()->getPdo();
    } catch (Exception $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <form id="formulario" class="formulario-login" method="POST">
        <h2>Login</h2>
        <?php if ($erro) echo "<p style='color: red; text-align: center;'>$erro</p>"; ?>
        <input type="text" name="usuario_log" placeholder="Usuário" required>
        <input type="password" name="senha_log" placeholder="Senha" required>
        <input type="submit" value="Entrar">
        <a href="#" onclick="mudarParaCadastro()">Cadastro</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../script/cadastro.js"></script>
</body>
</html>
