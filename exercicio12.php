
<?php
require_once "classe12.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pecas = $_POST["pecas"];
    $horas = $_POST["horas"];
    $meta = $_POST["meta"];
    $valorPeca = $_POST["valorPeca"];

    $obj = new Produtividade();
    $r = $obj->calcular($pecas, $horas, $meta, $valorPeca);
}
?>

<h1>Produtividade do Funcionário</h1>

<form method="POST">
    Peças produzidas: <input type="number" name="pecas" min="0" required><br><br>
    Horas trabalhadas: <input type="number" name="horas" min="0.01" step="any" required><br><br>
    Meta por hora: <input type="number" name="meta" min="0.01" step="any" required><br><br>
    Valor por peça: <input type="number" name="valorPeca" min="0" step="any" required><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Produtividade por hora: <?= round($r["produtividade"], 2) ?> peças</p>
    <p>Produção esperada: <?= $r["esperada"] ?> peças</p>
    <p>Meta atingida: <?= round($r["percentual"], 2) ?>%</p>
    <p>Pagamento variável: R$ <?= number_format($r["pagamento"], 2, ",", ".") ?></p>
    <p>Bônus: R$ <?= number_format($r["bonus"], 2, ",", ".") ?></p>
    <p>Total a receber: R$ <?= number_format($r["total"], 2, ",", ".") ?></p>

    <?php if ($r["percentual"] >= 100) { ?>
        <p>Meta atingida!</p>
    <?php } else { ?>
        <p>Meta não atingida.</p>
    <?php } ?>
<?php } ?>
