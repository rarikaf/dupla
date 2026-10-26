<?php
class Classe1 {
    public function calcular($quantidade, $preco, $desconto, $pago) {
        $bruto = $quantidade * $preco;
        $valorDesconto = $bruto * $desconto / 100;
        $total = $bruto - $valorDesconto;
        $diferenca = $pago - $total;

        return [$bruto, $valorDesconto, $total, $diferenca];
    }
}
?>