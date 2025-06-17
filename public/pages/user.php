<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/user.css">
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
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/meusEventos.php"><i class="bi bi-tags-fill"></i> Meu Eventos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <nav class="nav-container">
        <div class="box-container">
            <div class="user">
                <img class="perfilUser" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb8tupm38Iihgnacmqk1cOe0NZDKoIhi3ijw&s">
            </div>

            <div class="containerIformacoes">
                <h4 class="ajuda">Quer ajuda?</h4>
                <div class="APS">
                    <h6 class="servicos"><i class="bi bi-question-circle"></i>  Atendimento</h6>
                    <h6 class="servicos"><i class="bi bi-list-ol"></i>  Politicas e regras</h6>
                    <h6 class="servicos"><i class="bi bi-info-circle-fill"></i>  Sobre</h6>
                </div>
            </div>
            <div class="container-organizador">
                <h4>Quer torna-se organizador?</h4>
                <div class="containerOrg">
                    <a href="organizador.php">
                        <button class="btn btn-primary" type="button">Torna-se agora</button>
                    </a>
                </div>
                <div class="container-login">
                <h4>Faça o Login</h4>
                <div class="containerUsr">
                    <a href="cadastr.php">
                        <button class="btn btn-primary" type="button">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>