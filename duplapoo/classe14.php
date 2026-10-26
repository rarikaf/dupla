
<?php
class Reembolso {
    public function calcular($distancia, $valorKm, $alimentacao, $hospedagem, $outros, $limite) {
        $km = $distancia * $valorKm;
        $total = $km + $alimentacao + $hospedagem + $outros;
        $permitido = min($total, $limite);
        $excedente = max(0, $total - $limite);

        return [
            "km" => $km,
            "total" => $total,
            "permitido" => $permitido,
            "excedente" => $excedente
        ];
    }
}
?>
