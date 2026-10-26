
<h1>Orçamento de Serviços</h1>
<form method="POST">
    Cliente: <input name="cliente" required><br>
    Valor das peças: <input type="number" name="pecas" min="0" step="0.01" required><br>
    Horas de serviço: <input type="number" name="horas" min="0" step="0.5" required><br>
    Valor por hora: <input type="number" name="valorHora" min="0" step="0.01" required><br>
    Desconto (%): <input type="number" name="desconto" min="0" max="100" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe5.php';
    $classe = new Classe5();
    $r = $classe->calcular($_POST['pecas'], $_POST['horas'], $_POST['valorHora'], $_POST['desconto']);

    echo "Cliente: " . htmlspecialchars($_POST['cliente']) . "<br>";
    echo "Peças: R$ " . number_format($_POST['pecas'], 2, ',', '.') . "<br>";
    echo "Mão de obra: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Desconto: R$ " . number_format($r[1], 2, ',', '.') . "<br>";
    echo "Total: R$ " . number_format($r[2], 2, ',', '.') . "<br>";

    if ($r[2] > 1000) {
        echo "Atenção: é necessária a aprovação do cliente.";
    }
}
?>
