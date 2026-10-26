
<?php
require_once "classe15.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new Freelancer();

    $r = $obj->calcular(
        $_POST["horas"],
        $_POST["valorHora"],
        $_POST["paginas"],
        $_POST["valorPagina"],
        $_POST["percentual"]
    );
}
?>

<h1>Contratação de Freelancer</h1>

<form method="POST">
    Horas de desenvolvimento: <input type="number" name="horas" min="0" step="any" required><br><br>
    Valor por hora (R$): <input type="number" name="valorHora" min="0" step="any" required><br><br>
    Quantidade de páginas: <input type="number" name="paginas" min="0" required><br><br>
    Valor por página (R$): <input type="number" name="valorPagina" min="0" step="any" required><br><br>
    Entrada (%): <input type="number" name="percentual" min="0" max="100" required><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Custo de desenvolvimento: R$ <?= number_format($r["desenvolvimento"], 2, ",", ".") ?></p>
    <p>Custo das páginas: R$ <?= number_format($r["paginas"], 2, ",", ".") ?></p>
    <p>Total: R$ <?= number_format($r["total"], 2, ",", ".") ?></p>
    <p>Entrada: R$ <?= number_format($r["entrada"], 2, ",", ".") ?></p>
    <p>Saldo restante: R$ <?= number_format($r["saldo"], 2, ",", ".") ?></p>

    <?php if ($r["total"] > 3000) { ?>
        <p>O saldo pode ser dividido em 3 parcelas de R$ <?= number_format($r["parcelas"], 2, ",", ".") ?>.</p>
    <?php } ?>
<?php } ?>
