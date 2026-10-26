
<?php
require_once "classe16.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new Inventario();

    $r = $obj->calcular(
        $_POST["nome"],
        $_POST["valor"],
        $_POST["percentual"],
        $_POST["anos"]
    );
}
?>

<h1>Inventário de Equipamentos</h1>

<form method="POST">
    Nome do equipamento: <input type="text" name="nome" required><br><br>
    Valor de compra (R$): <input type="number" name="valor" min="0" step="any" required><br><br>
    Desvalorização anual (%): <input type="number" name="percentual" min="0" step="any" required><br><br>
    Anos de uso: <input type="number" name="anos" min="0" required><br><br>
    <button>Calcular</button>
</form>

<?php if (isset($r)) { ?>
    <h2>Resultados</h2>
    <p>Equipamento: <?= htmlspecialchars($r["nome"]) ?></p>
    <p>Valor de compra: R$ <?= number_format($r["valor"], 2, ",", ".") ?></p>
    <p>Desvalorização por ano: R$ <?= number_format($r["anual"], 2, ",", ".") ?></p>
    <p>Perda acumulada: R$ <?= number_format($r["perda"], 2, ",", ".") ?></p>
    <p>Valor residual: R$ <?= number_format($r["residual"], 2, ",", ".") ?></p>

    <?php if ($r["perdeuMais"]) { ?>
        <p>O equipamento perdeu mais de 50% do valor original.</p>
    <?php } else { ?>
        <p>O equipamento perdeu até 50% do valor original.</p>
    <?php } ?>
<?php } ?>
