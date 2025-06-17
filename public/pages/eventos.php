<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $data_inicio = $_POST["data_inicio"];
    $data_termino = $_POST["data_termino"];
    $local_evento = $_POST["local_evento"];
    $valor_ingresso = $_POST["valor_ingresso"];
    $redes_sociais = $_POST["redes_sociais"];

    // Diretório onde as imagens serão salvas
    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imagemPath = "";
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $extensao;
        $imagemPath = $uploadDir . $nomeArquivo;

        if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagemPath)) {
            die("Erro ao salvar a imagem.");
        }
    }

    $evento = [
        'nome' => $nome,
        'descricao' => $descricao,
        'data_inicio' => $data_inicio,
        'data_termino' => $data_termino,
        'local_evento' => $local_evento,
        'valor_ingresso' => $valor_ingresso,
        'redes_sociais' => $redes_sociais,
        'imagem' => $imagemPath
    ];

    if (!isset($_SESSION['eventos'])) {
        $_SESSION['eventos'] = [];
    }

    $_SESSION['eventos'][] = $evento;

    header("Location: meusEventos.php");
    exit();
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
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/eventos.php"><i class="bi bi-plus-lg"></i> Criar um Evento</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <form id="formulario" class="formulario-login" method="POST" enctype="multipart/form-data">
        <h2>Evento</h2>

        <label for="nome">Nome do evento:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>

        <label for="data_inicio">Data e Horário de início:</label>
        <input type="datetime-local" id="data_inicio" name="data_inicio" required>

        <label for="data_termino">Data e Horário do término:</label>
        <input type="datetime-local" id="data_termino" name="data_termino" required>

        <label for="local_evento">Local do Evento:</label>
        <input type="text" id="local_evento" name="local_evento" required>

        <label for="valor_ingresso">Valor do ingresso:</label>
        <input type="text" id="valor_ingresso" name="valor_ingresso" required>

        <label for="redes_sociais">Link das Redes Sociais:</label>
        <textarea id="redes_sociais" name="redes_sociais"></textarea>

        <label for="imagem">Imagem do Evento:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required>

        <input type="submit" value="Cadastrar">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>