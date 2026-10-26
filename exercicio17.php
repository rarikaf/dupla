
<?php
require_once "classe17.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new Investimento();

    $r = $obj->calcular(
        $_POST["inicial"],
        $_POST["aporte"],
        $_POST["taxa"],
        $_POST["meses"],
        $_POST["objetivo"]
    );
}
?>

<h1>Investimento Empresarial</h1>

<form method="POST">
    Valor inicial (R$): <input type="number" name="inicial" min="0" step="any" required><br><br>
    Aporte mensal (R$): <input type="number" name="aporte" min="0" step="any" required><br><br>
    Rendimento mensal (%): <input type="number" name="taxa" min="0" step="any" required><br><br>
    Quantidade de meses: <input type="number" name="meses" min="0" required><br><br>
    Objetivo financeiro (R$): <input type="number" name="objetivo" min="0" step="any" required><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Investimento inicial: R$ <?= number_format($r["inicial"], 2, ",", ".") ?></p>
    <p>Total de aportes: R$ <?= number_format($r["aportes"], 2, ",", ".") ?></p>
    <p>Saldo final: R$ <?= number_format($r["saldo"], 2, ",", ".") ?></p>
    <p>Rendimentos: R$ <?= number_format($r["rendimentos"], 2, ",", ".") ?></p>

    <?php if ($r["diferenca"] >= 0) { ?>
        <p>Objetivo atingido! Valor acima da meta: R$ <?= number_format($r["diferenca"], 2, ",", ".") ?></p>
    <?php } else { ?>
        <p>Faltam R$ <?= number_format(abs($r["diferenca"]), 2, ",", ".") ?> para atingir o objetivo.</p>
    <?php } ?>
<?php } ?>
