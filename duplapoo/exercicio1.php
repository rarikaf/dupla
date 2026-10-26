
<h1>Sistema de Caixa</h1>
<form method="POST">
    Produto: <input name="produto" required><br>
    Quantidade: <input type="number" name="quantidade" min="1" required><br>
    Preço unitário: <input type="number" name="preco" min="0" step="0.01" required><br>
    Desconto (%): <input type="number" name="desconto" min="0" max="100" required><br>
    Valor pago: <input type="number" name="pago" min="0" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe1.php';
    $classe = new Classe1();
    $r = $classe->calcular($_POST['quantidade'], $_POST['preco'], $_POST['desconto'], $_POST['pago']);

    echo "Produto: " . htmlspecialchars($_POST['produto']) . "<br>";
    echo "Valor bruto: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Desconto: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Total: R$ " . number_format($r[2], 2, ',', '.') . "<br>";

    if ($r[3] >= 0) {
        echo "Troco: R$ " . number_format($r[3], 2, ',', '.');
    } else {
        echo "Falta: R$ " . number_format(abs($r[3]), 2, ',', '.');
    }
}
?>
