
<h1>Comissão de Vendas</h1>
<form method="POST">
    Vendedor: <input name="nome" required><br>
    Total vendido: <input type="number" name="vendas" min="0" step="0.01" required><br>
    Comissão (%): <input type="number" name="percentual" min="0" max="100" step="0.01" required><br>
    Salário fixo: <input type="number" name="salario" min="0" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe4.php';
    $classe = new Classe4();
    $r = $classe->calcular($_POST['vendas'], $_POST['percentual'], $_POST['salario']);

    echo "Vendedor: " . htmlspecialchars($_POST['nome']) . "<br>";
    echo "Total vendido: R$ " . number_format($_POST['vendas'], 2, ',', '.') . "<br>";
    echo "Comissão: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Bônus: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Salário total: R$ " . number_format($r[2], 2, ',', '.');
}
?>
