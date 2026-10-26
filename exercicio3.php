
<h1>Controle de Estoque</h1>
<form method="POST">
    Produto: <input name="produto" required><br>
    Quantidade em estoque: <input type="number" name="quantidade" min="0" required><br>
    Preço de custo: <input type="number" name="preco" min="0" step="0.01" required><br>
    Estoque mínimo: <input type="number" name="minimo" min="0" required><br>
    Quantidade para comprar: <input type="number" name="compra" min="0" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe3.php';
    $classe = new Classe3();
    $r = $classe->calcular($_POST['quantidade'], $_POST['preco'], $_POST['minimo'], $_POST['compra']);

    echo "Produto: " . htmlspecialchars($_POST['produto']) . "<br>";
    echo "Valor do estoque: R$ " . number_format($r[0], 2, ',', '.') . "<br>";

    if ($_POST['quantidade'] < $_POST['minimo']) {
        echo "Estoque baixo! É necessário comprar produtos.<br>";
    } else {
        echo "Estoque suficiente.<br>";
    }

    echo "Reposição recomendada: " . $r[1] . " unidades<br>";
    echo "Custo da compra informada: R$ " . number_format($r[2], 2, ',', '.');
}
?>
