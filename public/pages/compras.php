<?php
if (isset($_GET["evento_id"]) && isset($_GET["quantidade"]) && isset($_GET["valor"])) {
    $evento_id = $_GET["evento_id"];
    $quantidade = $_GET["quantidade"];
    $valor = $_GET["valor"];
    $total = $quantidade * $valor;
} else {
    echo "Informações de compra inválidas.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Confirmação de Compra</h2>
        <p><strong>Evento:</strong> <?php echo $evento_id; ?></p>
        <p><strong>Quantidade:</strong> <?php echo $quantidade; ?></p>
        <p><strong>Valor unitário:</strong> R$<?php echo number_format($valor, 2, ',', '.'); ?></p>
        <p><strong>Total:</strong> R$<?php echo number_format($total, 2, ',', '.'); ?></p>
        <a href="index.php" class="btn btn-primary">Voltar para a Home</a>
    </div>
</body>
</html>
