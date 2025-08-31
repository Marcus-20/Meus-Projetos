<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Área do Trapézio</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Resultado do Cálculo</h1>
        <?php
        // Verifica se o formulário foi submetido usando o método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os valores do formulário e converte para número (float)
            $baseMaior = isset($_POST['base_maior']) ? floatval($_POST['base_maior']) : 0;
            $baseMenor = isset($_POST['base_menor']) ? floatval($_POST['base_menor']) : 0;
            $altura = isset($_POST['altura']) ? floatval($_POST['altura']) : 0;

            // Valida se os valores são números positivos
            if ($baseMaior > 0 && $baseMenor > 0 && $altura > 0) {
                // Calcula a área do trapézio
                $area = (($baseMaior + $baseMenor) * $altura) / 2;

                // Exibe os valores de entrada e o resultado formatado
                echo "<p>Base Maior: " . htmlspecialchars($baseMaior) . "</p>";
                echo "<p>Base Menor: " . htmlspecialchars($baseMenor) . "</p>";
                echo "<p>Altura: " . htmlspecialchars($altura) . "</p>";
                echo "<h2>A área do trapézio é: " . htmlspecialchars(number_format($area, 2, ',', '.')) . "</h2>";
            } else {
                // Exibe uma mensagem de erro se os valores forem inválidos
                echo "<p class='error'>Por favor, insira valores numéricos e positivos para todas as dimensões.</p>";
            }
        } else {
            // Mensagem para acesso direto ao script sem submeter o formulário
            echo "<p>Nenhum dado foi submetido. Por favor, use o formulário.</p>";
        }
        ?>
        <br>
        <a href="trapezio.html">Calcular novamente</a>
    </div>

</body>
</html>
