
<?php
class Produtividade {
    public function calcular($pecas, $horas, $meta, $valorPeca) {
        $produtividade = $pecas / $horas;
        $esperada = $horas * $meta;
        $percentual = ($pecas / $esperada) * 100;
        $pagamento = $pecas * $valorPeca;
        $bonus = 0;

        if ($percentual >= 120) {
            $bonus = $pagamento * 0.10;
        }

        return [
            "produtividade" => $produtividade,
            "esperada" => $esperada,
            "percentual" => $percentual,
            "pagamento" => $pagamento,
            "bonus" => $bonus,
            "total" => $pagamento + $bonus
        ];
    }
}
?>
