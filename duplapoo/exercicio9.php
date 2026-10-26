
<h1>Formação de Preço</h1>
<form method="POST">
    Produto: <input name="produto" required><br>
    Custo de compra: <input type="number" name="custo" min="0" step="0.01" required><br>
    Custo adicional: <input type="number" name="adicional" min="0" step="0.01" required><br>
    Lucro desejado (%): <input type="number" name="lucro" min="0" step="0.01" required><br>
    Quantidade vendida: <input type="number" name="quantidade" min="0" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe9.php';
    $classe = new Classe9();
    $r = $classe->calcular($_POST['custo'], $_POST['adicional'], $_POST['lucro'], $_POST['quantidade']);

    echo "Produto: " . htmlspecialchars($_POST['produto']) . "<br>";
    echo "Custo unitário: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Preço de venda: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Faturamento: R$ " . number_format($r[2], 2, ',', '.') . "<br>";
    echo "Lucro estimado: R$ " . number_format($r[3], 2, ',', '.');
}
?>
