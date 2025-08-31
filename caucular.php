<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        h1 { color: #333; }
        p { font-size: 1.1em; }
        .resultado { font-weight: bold; color: #007bff; }
        a { display: inline-block; margin-top: 20px; text-decoration: none; padding: 10px 15px; background-color: #007bff; color: white; border-radius: 4px; }
        a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h1>Resultado do Cálculo</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["custo_fabrica"])) {
        $custo_fabrica = (float)$_POST["custo_fabrica"];
        $percentual_distribuidor = 0;
        $percentual_impostos = 0;

        if ($custo_fabrica <= 39999.99) {
            $percentual_distribuidor = 0.05;
            $percentual_impostos = 0;
        } elseif ($custo_fabrica >= 40000 && $custo_fabrica <= 69999.99) {
            $percentual_distribuidor = 0.10;
            $percentual_impostos = 0.15;
        } else {
            $percentual_distribuidor = 0.15;
            $percentual_impostos = 0.20;
        }

        $valor_distribuidor = $custo_fabrica * $percentual_distribuidor;
        $valor_impostos = $custo_fabrica * $percentual_impostos;
        $preco_final = $custo_fabrica + $valor_distribuidor + $valor_impostos;

        // Função para formatar números como moeda brasileira
        function formatar_moeda($valor) {
            return "R$ " . number_format($valor, 2, ',', '.');
        }

        echo "<p>Custo de Fábrica: " . formatar_moeda($custo_fabrica) . "</p>";
        echo "<p>Percentual do Distribuidor: " . ($percentual_distribuidor * 100) . "%</p>";
        echo "<p>Percentual de Impostos: " . ($percentual_impostos * 100) . "%</p>";
        echo "<hr>";
        echo "<p class='resultado'>Preço Final ao Consumidor: " . formatar_moeda($preco_final) . "</p>";

    } else {
        echo "<p>Nenhum valor foi enviado. Por favor, volte e preencha o formulário.</p>";
    }
    ?>
    <a href="index.html">Calcular Novamente</a>
</body>
</html>
