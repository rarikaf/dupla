
<?php
class Classe4 {
    public function calcular($vendas, $percentual, $salario) {
        $comissao = $vendas * $percentual / 100;
        $bonus = $vendas > 10000 ? 200 : 0;
        $total = $salario + $comissao + $bonus;

        return [$comissao, $bonus, $total];
    }
}
?>
