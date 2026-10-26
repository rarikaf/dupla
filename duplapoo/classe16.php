
<?php
class Inventario {
    public function calcular($nome, $valor, $percentual, $anos) {
        $anual = $valor * ($percentual / 100);
        $perda = min($valor, $anual * $anos);
        $residual = max(0, $valor - $perda);

        return [
            "nome" => $nome,
            "valor" => $valor,
            "anual" => $anual,
            "perda" => $perda,
            "residual" => $residual,
            "perdeuMais" => $perda > ($valor * 0.5)
        ];
    }
}
?>
