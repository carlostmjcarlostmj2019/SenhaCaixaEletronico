<?php
// Função para verificar se a sequência de números contém apenas os números válidos da senha e na ordem correta
function verificarSequenciaSenha($sequencia, $senha) {
    $senhaIndex = 0;

    for ($i = 0; $i < strlen($sequencia); $i++) {
        if (isset($senha[$senhaIndex]) && $sequencia[$i] === $senha[$senhaIndex]) {
            $senhaIndex++;
        }
    }

    return $senhaIndex === strlen($senha);
}

// Gere valores aleatórios para os botões
function gerarValoresAleatorios() {
    $valores = range(0, 9);
    shuffle($valores);
    $buttonValues = array();

    for ($i = 0; $i < 5; $i++) {
        $buttonValues[] = array($valores[$i], $valores[$i + 5]);
    }

    return $buttonValues;
}

$buttonValues = gerarValoresAleatorios();

// Verifique se o formulário foi submetido
if (isset($_POST['sequenciaDigitada'])) {
    $sequenciaDigitada = $_POST['sequenciaDigitada'];

    if (verificarSequenciaSenha($sequenciaDigitada, $senha)) {
        $message = "Sequência correta! Acesso concedido.";
        $alertType = "success";
    } else {
        $message = "Sequência incorreta. Tente novamente.";
        $alertType = "danger";
    }
}
?>
