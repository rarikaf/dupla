
<?php
class PlanoInternet {
    public function calcular($consumo, $franquia, $mensalidade, $valorGB) {
        $excedente = max(0, $consumo - $franquia);
        $adicional = $excedente * $valorGB;
        $total = $mensalidade + $adicional;

        $novoConsumo = $consumo * 1.2;
        $novoExcedente = max(0, $novoConsumo - $franquia);
        $novoTotal = $mensalidade + ($novoExcedente * $valorGB);

        return [
            "excedente" => $excedente,
            "adicional" => $adicional,
            "total" => $total,
            "novoConsumo" => $novoConsumo,
            "novoTotal" => $novoTotal
        ];
    }
}
?>
