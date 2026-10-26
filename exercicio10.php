
<?php
require_once "classe10.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumo = $_POST["consumo"];
    $franquia = $_POST["franquia"];
    $mensalidade = $_POST["mensalidade"];
    $valorGB = $_POST["valorGB"];

    $plano = new PlanoInternet();
    $resultado = $plano->calcular($consumo, $franquia, $mensalidade, $valorGB);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Plano de Internet</title>
</head>
<body>

<h1>Plano de Internet</h1>

<form method="POST">
    Consumo mensal (GB):
    <input type="number" name="consumo" min="0" step="any" required><br><br>

    Franquia (GB):
    <input type="number" name="franquia" min="0" step="any" required><br><br>

    Mensalidade (R$):
    <input type="number" name="mensalidade" min="0" step="any" required><br><br>

    Valor por GB excedente (R$):
    <input type="number" name="valorGB" min="0" step="any" required><br><br>

    <button type="submit">Calcular</button>
</form>

<?php if (isset($resultado)) { ?>

    <h2>Resultados</h2>

    <?php
    if ($consumo <= $franquia) {
        echo "<p>Consumo dentro da franquia.</p>";
    } else {
        echo "<p>Consumo acima da franquia!</p>";
    }
    ?>

    <p>Excedente: <?= $resultado["excedente"] ?> GB</p>
    <p>Valor adicional: R$ <?= number_format($resultado["adicional"], 2, ",", ".") ?></p>
    <p>Total mensal: R$ <?= number_format($resultado["total"], 2, ",", ".") ?></p>
    <p>Consumo com aumento de 20%: <?= $resultado["novoConsumo"] ?> GB</p>
    <p>Total com aumento: R$ <?= number_format($resultado["novoTotal"], 2, ",", ".") ?></p>

<?php } ?>

</body>
</html>
