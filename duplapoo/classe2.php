
<?php
class Classe2 {
    public function calcular($valorHora, $horasNormais, $horasExtras) {
        $normal = $valorHora * $horasNormais;
        $extras = $valorHora * 1.5 * $horasExtras;
        $total = $normal + $extras;

        return [$normal, $extras, $total];
    }
}
?>
