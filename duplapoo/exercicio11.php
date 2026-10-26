
<?php
require_once "classe11.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pratos = $_POST["pratos"];
    $precoPrato = $_POST["precoPrato"];
    $bebidas = $_POST["bebidas"];
    $precoBebida = $_POST["precoBebida"];
    $sobremesas = $_POST["sobremesas"];
    $precoSobremesa = $_POST["precoSobremesa"];
    $taxa = $_POST["taxa"];
    $desconto = $_POST["desconto"];
    $pago = $_POST["pago"];

    $pedido = new Pedido();

    $resultado = $pedido->calcular(
        $pratos, $precoPrato,
        $bebidas, $precoBebida,
        $sobremesas, $precoSobremesa,
        $taxa, $desconto, $pago
    );
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Pedidos</title>
</head>
<body>

<h1>Pedido do Restaurante</h1>

<form method="POST">
    Quantidade de pratos:
    <input type="number" name="pratos" min="0" required><br><br>

    Preço por prato:
    <input type="number" name="precoPrato" min="0" step="any" required><br><br>

    Quantidade de bebidas:
    <input type="number" name="bebidas" min="0" required><br><br>

    Preço por bebida:
    <input type="number" name="precoBebida" min="0" step="any" required><br><br>

    Quantidade de sobremesas:
    <input type="number" name="sobremesas" min="0" required><br><br>

    Preço por sobremesa:
    <input type="number" name="precoSobremesa" min="0" step="any" required><br><br>

    Taxa de serviço (%):
    <input type="number" name="taxa" min="0" required><br><br>

    Desconto (%):
    <input type="number" name="desconto" min="0" max="100" required><br><br>

    Valor pago pelo cliente:
    <input type="number" name="pago" min="0" step="any" required><br><br>

    <button type="submit">Calcular pedido</button>
</form>

<?php if (isset($resultado)) { ?>

    <h2>Resultados</h2>

    <p>Subtotal dos pratos: R$ <?= number_format($resultado["pratos"], 2, ",", ".") ?></p>
    <p>Subtotal das bebidas: R$ <?= number_format($resultado["bebidas"], 2, ",", ".") ?></p>
    <p>Subtotal das sobremesas: R$ <?= number_format($resultado["sobremesas"], 2, ",", ".") ?></p>
    <p>Taxa de serviço: R$ <?= number_format($resultado["taxa"], 2, ",", ".") ?></p>
    <p>Desconto: R$ <?= number_format($resultado["desconto"], 2, ",", ".") ?></p>
    <p><strong>Total do pedido: R$ <?= number_format($resultado["total"], 2, ",", ".") ?></strong></p>

    <?php if ($resultado["diferenca"] >= 0) { ?>
        <p>Troco: R$ <?= number_format($resultado["diferenca"], 2, ",", ".") ?></p>
    <?php } else { ?>
        <p>Valor restante a pagar: R$ <?= number_format(abs($resultado["diferenca"]), 2, ",", ".") ?></p>
    <?php } ?>

<?php } ?>

</body>
</html>
