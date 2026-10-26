
<h1>Controle Financeiro</h1>
<form method="POST">
    Receita mensal: <input type="number" name="receita" min="0" step="0.01" required><br>
    Aluguel: <input type="number" name="aluguel" min="0" step="0.01" required><br>
    Funcionários: <input type="number" name="funcionarios" min="0" step="0.01" required><br>
    Energia e internet: <input type="number" name="contas" min="0" step="0.01" required><br>
    Outras despesas: <input type="number" name="outras" min="0" step="0.01" required><br>
    <button>Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classe7.php';
    $classe = new Classe7();
    $r = $classe->calcular($_POST['receita'], $_POST['aluguel'], $_POST['funcionarios'], $_POST['contas'], $_POST['outras']);

    echo "Receita: R$ " . number_format($_POST['receita'], 2, ',', '.') . "<br>";
    echo "Despesas: R$ " . number_format($r[0], 2, ',', '.') . "<br>";
    echo "Resultado: R$ " . number_format($r[1], 2, ',', '.') . "<br>";

    if ($r[1] > 0) {
        echo "A empresa teve lucro.<br>";
    } elseif ($r[1] < 0) {
        echo "A empresa teve prejuízo.<br>";
    } else {
        echo "A empresa não teve lucro nem prejuízo.<br>";
    }

    if ($_POST['receita'] > 0) {
        echo "Margem: " . number_format($r[2], 2, ',', '.') . "%";
    } else {
        echo "Não é possível calcular a margem com receita zero.";
    }
}
?>
