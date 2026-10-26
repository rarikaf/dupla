
<?php
class Energia {
    public function calcular($consumo, $preco, $taxa, $multa, $atraso) {
        $custo = $consumo * $preco;
        $valorMulta = $atraso ? $multa : 0;
        $total = $custo + $taxa + $valorMulta;

        $novoConsumo = $consumo * 0.85;
        $novoTotal = ($novoConsumo * $preco) + $taxa + $valorMulta;

        return [
            "custo" => $custo,
            "taxa" => $taxa,
            "multa" => $valorMulta,
            "total" => $total,
            "economia" => $total - $novoTotal,
            "novoTotal" => $novoTotal
        ];
    }
}
?>
