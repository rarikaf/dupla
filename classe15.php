
<?php
class Freelancer {
    public function calcular($horas, $valorHora, $paginas, $valorPagina, $percentual) {
        $desenvolvimento = $horas * $valorHora;
        $custoPaginas = $paginas * $valorPagina;
        $total = $desenvolvimento + $custoPaginas;

        $entrada = $total * ($percentual / 100);
        $saldo = $total - $entrada;
        $parcelas = $total > 3000 ? $saldo / 3 : 0;

        return [
            "desenvolvimento" => $desenvolvimento,
            "paginas" => $custoPaginas,
            "total" => $total,
            "entrada" => $entrada,
            "saldo" => $saldo,
            "parcelas" => $parcelas
        ];
    }
}
?>
