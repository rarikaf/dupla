
<h1>Compra de Materiais</h1>
<form method="POST">
    Quantidade de cadernos: <input type="number" name="qc" min="0" required><br>
    Preço do caderno: <input type="number" name="pc" min="0" step="0.01" required><br>
    Quantidade de canetas: <input type="number" name="qca" min="0" required><br>
    Preço da caneta: <input type="number" name="pca" min="0" step="0.01" required><br>
    Quantidade de resmas: <input type="number" name="qr" min="0" required><br>
    Preço da resma: <input type="number" name="pr" min="0" step="0.01" required><br>
    Orçamento: <input type="number" name="orcamento" min="0" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe8.php';
    $classe = new Classe8();
    $r = $classe->calcular($_POST['qc'], $_POST['pc'], $_POST['qca'], $_POST['pca'], $_POST['qr'], $_POST['pr'], $_POST['orcamento']);

    echo "Cadernos: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Canetas: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Resmas: R$ " . number_format($r[2], 2, ',', '.') . "<br>";
    echo "Total: R$ " . number_format($r[3], 2, ',', '.') . "<br>";

    if ($r[4] >= 0) {
        echo "Saldo restante: R$ " . number_format($r[4], 2, ',', '.');
    } else {
        echo "Valor que falta: R$ " . number_format(abs($r[4]), 2, ',', '.') . "<br>";
        echo "Orçamento excedido em " . number_format($r[5], 2, ',', '.') . "%";
    }
}
?>
