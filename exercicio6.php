
<h1>Cálculo de Frete</h1>
<form method="POST">
    Distância (km): <input type="number" name="distancia" min="0" step="any" required><br>
    Valor por km: <input type="number" name="valorKm" min="0" step="0.01" required><br>
    Peso (kg): <input type="number" name="peso" min="0" step="any" required><br>
    Taxa por kg: <input type="number" name="taxaPeso" min="0" step="0.01" required><br>
    Valor dos produtos: <input type="number" name="produtos" min="0" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe6.php';
    $classe = new Classe6();
    $r = $classe->calcular($_POST['distancia'], $_POST['valorKm'], $_POST['peso'], $_POST['taxaPeso'], $_POST['produtos']);

    echo "Custo da distância: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Taxa por peso: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Desconto: R$ " . number_format($r[2], 2, ',', '.') . "<br>";
    echo "Frete final: R$ " . number_format($r[3], 2, ',', '.') . "<br>";
    echo "Total com frete: R$ " . number_format($r[4], 2, ',', '.');
}
?>
