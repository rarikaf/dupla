
<h1>Folha de Pagamento</h1>
<form method="POST">
    Funcionário: <input name="nome" required><br>
    Valor da hora: <input type="number" name="valorHora" min="0" step="0.01" required><br>
    Horas normais: <input type="number" name="normais" min="0" required><br>
    Horas extras: <input type="number" name="extras" min="0" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe2.php';
    $classe = new Classe2();
    $r = $classe->calcular($_POST['valorHora'], $_POST['normais'], $_POST['extras']);

    echo "Funcionário: " . htmlspecialchars($_POST['nome']) . "<br>";
    echo "Salário normal: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Horas extras: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Salário bruto: R$ " . number_format($r[2], 2, ',', '.') . "<br>";

    if ($_POST['extras'] > 10) {
        echo "Atenção: mais de 10 horas extras!";
    }
}
?>
