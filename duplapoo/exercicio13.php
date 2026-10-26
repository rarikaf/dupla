
<?php
require_once "classe13.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumo = $_POST["consumo"];
    $preco = $_POST["preco"];
    $taxa = $_POST["taxa"];
    $multa = $_POST["multa"];
    $atraso = isset($_POST["atraso"]) ? 1 : 0;

    $obj = new Energia();
    $r = $obj->calcular($consumo, $preco, $taxa, $multa, $atraso);
}
?>

<h1>Consumo de Energia</h1>

<form method="POST">
    Consumo mensal (kWh): <input type="number" name="consumo" min="0" required><br><br>
    Preço por kWh: <input type="number" name="preco" min="0" step="any" required><br><br>
    Taxas adicionais (R$): <input type="number" name="taxa" min="0" step="any" required><br><br>
    Multa por atraso (R$): <input type="number" name="multa" min="0" step="any" required><br><br>
    <label><input type="checkbox" name="atraso"> Conta em atraso</label><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Custo da energia: R$ <?= number_format($r["custo"], 2, ",", ".") ?></p>
    <p>Taxas adicionais: R$ <?= number_format($r["taxa"], 2, ",", ".") ?></p>
    <p>Multa: R$ <?= number_format($r["multa"], 2, ",", ".") ?></p>
    <p>Total: R$ <?= number_format($r["total"], 2, ",", ".") ?></p>
    <p>Economia com redução de 15%: R$ <?= number_format($r["economia"], 2, ",", ".") ?></p>
    <p>Total simulado: R$ <?= number_format($r["novoTotal"], 2, ",", ".") ?></p>
<?php } ?>
