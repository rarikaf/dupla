
<?php
class Classe5 {
    public function calcular($pecas, $horas, $valorHora, $desconto) {
        $maoObra = $horas * $valorHora;
        $subtotal = $pecas + $maoObra;
        $valorDesconto = $subtotal * $desconto / 100;
        $total = $subtotal - $valorDesconto;

        return [$maoObra, $valorDesconto, $total];
    }
}
?>
