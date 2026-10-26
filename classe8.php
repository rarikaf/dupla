
<?php
class Classe8 {
    public function calcular($qtdCadernos, $precoCaderno, $qtdCanetas, $precoCaneta, $qtdResmas, $precoResma, $orcamento) {
        $cadernos = $qtdCadernos * $precoCaderno;
        $canetas = $qtdCanetas * $precoCaneta;
        $resmas = $qtdResmas * $precoResma;
        $total = $cadernos + $canetas + $resmas;
        $saldo = $orcamento - $total;
        $excedido = $orcamento > 0 && $saldo < 0 ? abs($saldo) / $orcamento * 100 : 0;

        return [$cadernos, $canetas, $resmas, $total, $saldo, $excedido];
    }
}
?>
