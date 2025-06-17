<?php
if (isset($_GET['evento_id'])) {
    $evento_id = $_GET['evento_id'];
} else {
    echo "Evento não encontrado.";
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
    <link rel="stylesheet" href="../styles/pageEvento.css">
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

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.moblee.com.br/blog/wp-content/uploads/sites/2/2021/11/evento-corporativo-interno.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeIAHo4Zx1hFFI079N84JIUe93SKMqSn2qBg&s" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.moblee.com.br/blog/wp-content/uploads/sites/2/2021/11/evento-corporativo-interno.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <nav>
        <div class="containerEventos">
            <div class="infoEventos">
                <h2 class="dadosEventos">Nome do evento</h2>
                <h6 class="dadosEventos"><i class="bi bi-geo-alt-fill"></i>local</h6>
                <h6 class="dadosEventos"><i class="bi bi-calendar3"></i>date</h6>
            </div>
        </div>
    </nav>

    <nav class="containerDescripition">
        <div class="card">
            <h5 class="card-header">Descricao</h5>
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo beatae sit quisquam corrupti saepe qui repellat, tempore consequuntur dolor dolorum voluptates veritatis rem cumque quibusdam omnis harum quam alias.</p>
            </div>
        </div>

        <div class="container mt-5">
        <!-- Card de Compra -->
        <div class="card cardCompra">
            <div class="card-body">
                <div class="boxIngresso">
                    <h5 class="card-title">Ingresso</h5>
                </div>

                <div class="containerQuant">
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade de ingressos</label>
                    <input type="number" id="quantidade" class="form-control" value="1" min="1">
                </div>
                

                <h6 id="valor" class="card-subtitle mb-2 text-muted">R$ 100,00</h6>

                <button class="btn btn-compra" id="comprarBtn"><i class="bi bi-bag-fill"></i>    Comprar</button>
                </div>
            </div>
        </div>
    </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="../script/adition.js"></script>
</body>

</html>