
<?php
class Pedido {
    public function calcular($pratos, $precoPrato, $bebidas, $precoBebida, $sobremesas, $precoSobremesa, $taxa, $desconto, $pago) {
        $subtotalPratos = $pratos * $precoPrato;
        $subtotalBebidas = $bebidas * $precoBebida;
        $subtotalSobremesas = $sobremesas * $precoSobremesa;

        $subtotal = $subtotalPratos + $subtotalBebidas + $subtotalSobremesas;

        $valorTaxa = $subtotal * ($taxa / 100);
        $valorDesconto = $subtotal * ($desconto / 100);

        $total = $subtotal + $valorTaxa - $valorDesconto;

        $diferenca = $pago - $total;

        return [
            "pratos" => $subtotalPratos,
            "bebidas" => $subtotalBebidas,
            "sobremesas" => $subtotalSobremesas,
            "taxa" => $valorTaxa,
            "desconto" => $valorDesconto,
            "total" => $total,
            "diferenca" => $diferenca
        ];
    }
}
?>
