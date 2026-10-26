
<?php
class Classe7 {
    public function calcular($receita, $aluguel, $funcionarios, $contas, $outras) {
        $despesas = $aluguel + $funcionarios + $contas + $outras;
        $resultado = $receita - $despesas;
        $margem = $receita > 0 ? ($resultado / $receita) * 100 : 0;

        return [$despesas, $resultado, $margem];
    }
}
?>
