
<?php
require_once "classe14.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new Reembolso();

    $r = $obj->calcular(
        $_POST["distancia"],
        $_POST["valorKm"],
        $_POST["alimentacao"],
        $_POST["hospedagem"],
        $_POST["outros"],
        $_POST["limite"]
    );
}
?>

<h1>Reembolso de Viagem</h1>

<form method="POST">
    Distância (km): <input type="number" name="distancia" min="0" step="any" required><br><br>
    Valor por km (R$): <input type="number" name="valorKm" min="0" step="any" required><br><br>
    Alimentação (R$): <input type="number" name="alimentacao" min="0" step="any" required><br><br>
    Hospedagem (R$): <input type="number" name="hospedagem" min="0" step="any" required><br><br>
    Outros gastos (R$): <input type="number" name="outros" min="0" step="any" required><br><br>
    Limite de reembolso (R$): <input type="number" name="limite" min="0" step="any" required><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Reembolso por quilometragem: R$ <?= number_format($r["km"], 2, ",", ".") ?></p>
    <p>Total das despesas: R$ <?= number_format($r["total"], 2, ",", ".") ?></p>
    <p>Valor permitido: R$ <?= number_format($r["permitido"], 2, ",", ".") ?></p>
    <p>Valor não reembolsável: R$ <?= number_format($r["excedente"], 2, ",", ".") ?></p>
<?php } ?>
