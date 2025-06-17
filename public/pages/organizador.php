<?php

require __DIR__ . '/../../data/databteste.php';

require __DIR__ . '/../../vendor/autoload.php';

use Src\Model\Organizador;


session_start();

$arquivo = "bd/organizadores.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        
        $senhaHash = password_hash($_POST["senha_hash"], PASSWORD_DEFAULT);

        $dados = [
            'usuario' => $_POST["usuario"] ?? '',
            'senha_hash' => $senhaHash,
            'nome' => $_POST["nome"] ?? '',
            'email' => $_POST["email"] ?? '',
            'telefone' => $_POST["telefone"] ?? '',
            'data_nascimento' => $_POST['data_nascimento'] ?? null,
            'nome_empresa' => $_POST["nome_empresa"] ?? 'Não informado',
            'CNPJ' => $_POST["CNPJ"] ?? 'Não informado',
            'endereco' => $_POST["endereco"] ?? 'Não informado',
            'midias_sociais' => $_POST["midias_sociais"] ?? 'Não informado'
        ];

        if (empty($dados['data_nascimento'])) {
            throw new Exception("Data de nascimento é obrigatória");
        }

        // Formata os dados para salvar
        $conteudo = "Nome: {$dados['nome']}\n" .
                   "Usuário: {$dados['usuario']}\n" .
                   "Senha: {$dados['senha_hash']}\n" .
                   "E-mail: {$dados['email']}\n" .
                   "Telefone: {$dados['telefone']}\n" .
                   "Data de Nascimento: {$dados['data_nascimento']}\n" .
                   "Empresa: {$dados['nome_empresa']}\n" .
                   "CNPJ: {$dados['CNPJ']}\n" .
                   "Endereço: {$dados['endereco']}\n" .
                   "Redes Sociais/Site: {$dados['midias_sociais']}\n" .
                   "------------------------------------\n";

                   $organizador = Organizador::create($dados);
                   error_log("ID do novo registro: " . $organizador->id);

        file_put_contents($arquivo, $conteudo, FILE_APPEND);
        $_SESSION['is_organizer'] = true;
        
        header("Location: user.php");
        exit();
        
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }

    try {
        \Illuminate\Database\Capsule\Manager::connection()->getPdo();
        echo "Conexão com o banco estabelecida com sucesso!";
    } catch (\Exception $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/organizador.css">
</head>

<body>

    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-ticket-detailed"></i> ReserveNow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php"><i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php"><i class="bi bi-person-lines-fill"></i> Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-bag-fill"></i> Minhas compras</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php if (!empty($erro)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
<?php endif; ?>

    <form id="formulario" class="formulario-login" method="POST">
        <h2>Cadastro de Organizador</h2>

        <label>Nome Completo:</label><br>
        <input type="text" name="nome" required><br>

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br>

        <label>Senha:</label><br>
        <input type="password" name="senha_hash" required><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br>

        <label>Data de nascimento:</label><br>
        <input type="date" name="data_nascimento" required><br>

        <label>Nome da Empresa (opcional):</label><br>
        <input type="text" name="nome_empresa"><br>

        <label>CNPJ (opcional):</label><br>
        <input type="text" name="CNPJ"><br>

        <label>Endereço (opcional):</label><br>
        <textarea name="endereco"></textarea><br>

        <label>Redes Sociais/Site (opcional):</label><br>
        <input type="text" name="midias_sociais"><br>
        <input type="submit" value="Cadastrar">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
