
<?php
class Investimento {
    public function calcular($inicial, $aporte, $taxa, $meses, $objetivo) {
        $saldo = $inicial;
        $totalAportes = 0;

        for ($i = 0; $i < $meses; $i++) {
            $saldo = $saldo + ($saldo * $taxa / 100);
            $saldo += $aporte;
            $totalAportes += $aporte;
        }

        $investido = $inicial + $totalAportes;
        $rendimentos = $saldo - $investido;
        $diferenca = $saldo - $objetivo;

        return [
            "inicial" => $inicial,
            "aportes" => $totalAportes,
            "saldo" => $saldo,
            "rendimentos" => $rendimentos,
            "diferenca" => $diferenca
        ];
    }
}
?>
