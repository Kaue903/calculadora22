<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora Simples</title>
    </head>
    <body style="background-color: lightblue; text-align:center;">
        <h1>Calculadora MarcosMática</h1>
        <form method="GET" action="">
            <label for="num1">Número1:</label><br>
            <input type="text" name="n1"><br>
            <label for="num2">Número2:</label><br>
            <input type="text" name="n2"><br>
            
            <button type="submit" style="background:white; color:black; padding:5px 15px; border:none; border-radius:5px; cursor:pointer;">
                Calcular
            </button>
            <button type="button" onclick="window.location.href=window.location.pathname;" style="background:white; color:black; padding:5px 15px; border:none; border-radius:5px; cursor:pointer;">
                Reset
            </button>
            
            <fieldset style="display:inline-block; margin-top:15px; text-align:left;">
                <legend>Operações</legend>
                <input type="radio" name="op" value="soma" checked>Soma<br>
                <input type="radio" name="op" value="subtracao">Subtração<br>
                <input type="radio" name="op" value="multiplicacao">Multiplicação<br>
                <input type="radio" name="op" value="divisao">Divisão<br>
                <input type="radio" name="op" value="modulo">Módulo<br>
                <input type="radio" name="op" value="exponencial">Exponencial<br>
            </fieldset>
        </form>
        
        <?php
            $imgPensador = "pensador.png";  
            $imgCorreto = "correto.png";  

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['n1']) && isset($_GET['n2']) && $_GET['n1'] !== "" && $_GET['n2'] !== "") {
                if (is_numeric($_GET['n1']) && is_numeric($_GET['n2'])) {
                    $n1 = $_GET['n1'];
                    $n2 = $_GET['n2'];
                    $op = $_GET['op'];

                    function multiplicacao($n1, $n2) { return $n1 * $n2; }
                    function subtracao($n1, $n2) { return $n1 - $n2; }
                    function soma($n1, $n2) { return $n1 + $n2; }
                    function divisao($n1, $n2) {
                        if ($n2 == 0) { return "Erro: Divisão por zero!"; }
                        return $n1 / $n2;
                    }
                    function modulo($n1, $n2) { return $n1 % $n2; }
                    function exponencial($n1, $n2){ return $n1 ** $n2; }

                    if ($op == 'soma') {
                        echo "<h2>Resultado: $n1 + $n2 = " . soma($n1, $n2) . "</h2>";
                    } elseif ($op == 'subtracao') {
                        echo "<h2>Resultado: $n1 - $n2 = " . subtracao($n1, $n2) . "</h2>";
                    } elseif ($op == 'multiplicacao') {
                        echo "<h2>Resultado: $n1 * $n2 = " . multiplicacao($n1, $n2) . "</h2>";
                    } elseif ($op == 'divisao') {
                        echo "<h2>Resultado: $n1 ÷ $n2 = " . divisao($n1, $n2) . "</h2>";
                    } elseif ($op == 'modulo') {
                        echo "<h2>Resultado: $n1 % $n2 = " . modulo($n1, $n2) . "</h2>";
                    } elseif ($op == 'exponencial') {
                        echo "<h2>Resultado: $n1 ^ $n2 = " . exponencial($n1, $n2) . "</h2>";
                    }

                    echo "<br><img src='$imgCorreto' width='150'>";
                } else {
                    echo "<h2>Por favor, insira números válidos.</h2>";
                }
            } else {
                echo "<img src='$imgPensador' width='150'>";
            }
        ?>
    </body>
</html>
