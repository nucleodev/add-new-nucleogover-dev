

<?php
// Aqui eu estou verificando se o usuário digitou algum número

if (isset($_GET['posicao'])) {
    // Obtém o valor enviado pelo usuário
    $posicao = $_GET['posicao'];

    // Função para calcular a sequência de Fibonacci
    function calculo($num)
    {
        $fib = [0, 1];

        for ($i = 2; $i <= $num; $i++) {
            $fib[$i] = bcadd($fib[$i - 1], $fib[$i - 2]);
        }

        return $fib[$num];
    }

    // Calcula o número na posição informada
    $resultado = calculo($posicao);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sequência de Fibonacci</title>
</head>
<body>
    <h1>Sequência de Fibonacci</h1>

    <form method="get" action="index.php">
        <label for="posicao">Informe a posição:</label>
        <input type="number" name="posicao" id="posicao" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($resultado)) : ?>
        <p>O número na posição <?= $posicao ?> da sequência de Fibonacci é: <?= $resultado ?></p>
    <?php endif; ?>
</body>
</html>