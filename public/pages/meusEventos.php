<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/meusEventos.css">
</head>

<body>
    <script>
        function confirmarExclusao() {
            return confirm("Tem certeza que deseja excluir este evento?");
        }
    </script>

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

    <div class="container mt-5">
        <h2 class="title2">Meus Eventos</h2>
        <nav>
            <div class="container-table">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Local</th>
                            <th scope="col">Data/Hora</th>
                            <th scope="col">Valor</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['eventos']) && count($_SESSION['eventos']) > 0) {
                            foreach ($_SESSION['eventos'] as $index => $evento) {
                                echo "<tr>";
                                echo "<th scope='row'>" . ($index + 1) . "</th>";
                                echo "<td>" . $evento['nome'] . "</td>";
                                echo "<td>" . $evento['local_evento'] . "</td>";
                                echo "<td>" . $evento['data_inicio'] . "</td>";
                                echo "<td> R$" . $evento['valor_ingresso'] . "</td>";
                                echo "<td><a href='excluirEvento.php?index=$index' class='btn btn-danger' onclick='return confirmarExclusao()'>Excluir</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Nenhum evento cadastrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>