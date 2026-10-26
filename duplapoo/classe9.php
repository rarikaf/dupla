
<?php
class Classe9 {
    public function calcular($custo, $adicional, $lucro, $quantidade) {
        $custoUnitario = $custo + $adicional;
        $precoVenda = $custoUnitario * (1 + $lucro / 100);
        $faturamento = $precoVenda * $quantidade;
        $lucroTotal = ($precoVenda - $custoUnitario) * $quantidade;

        return [$custoUnitario, $precoVenda, $faturamento, $lucroTotal];
    }
}
?>
