//preço do ingresso
const precoIngresso = 100;

// Atualizar o valor total com base na quantidade
document.getElementById('quantidade').addEventListener('input', function() {
    const quantidade = parseInt(this.value);
    const valorTotal = precoIngresso * quantidade;
    document.getElementById('valor').textContent = 'R$ ' + valorTotal.toFixed(2);
});

// Lógica do botão de compra
document.getElementById('comprarBtn').addEventListener('click', function() {
    const quantidade = parseInt(document.getElementById('quantidade').value);
    const valorTotal = precoIngresso * quantidade;
    alert('Você comprou ' + quantidade + ' ingresso(s) por R$ ' + valorTotal.toFixed(2));
});