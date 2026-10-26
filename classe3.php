
<?php
class Classe3 {
    public function calcular($quantidade, $preco, $minimo, $compra) {
        $valorEstoque = $quantidade * $preco;
        $reposicao = max(0, $minimo - $quantidade);
        $custoCompra = $compra * $preco;

        return [$valorEstoque, $reposicao, $custoCompra];
    }
}
?>
