
<?php
class Classe6 {
    public function calcular($distancia, $valorKm, $peso, $taxaPeso, $produtos) {
        $custoDistancia = $distancia * $valorKm;
        $custoPeso = $peso * $taxaPeso;
        $frete = $custoDistancia + $custoPeso;
        $desconto = $produtos > 500 ? $frete * 0.5 : 0;
        $freteFinal = $frete - $desconto;

        return [$custoDistancia, $custoPeso, $desconto, $freteFinal, $produtos + $freteFinal];
    }
}
?>
