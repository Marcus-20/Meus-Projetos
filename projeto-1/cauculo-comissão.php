<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h2 { color: #4CAF50; }
        a { text-decoration: none; color: #007BFF; }
    </style>
</head>
<body>

    <h1>Resultado do Cálculo de Salário</h1>

    <?php
    // Verifica se o formulário foi submetido usando o método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Obtém os valores do formulário e converte para número (float)
        $salario_fixo = (float)$_POST['salario_fixo'];
        $valor_vendas = (float)$_POST['valor_vendas'];

        // Define a taxa de comissão (4% = 0.04)
        $taxa_comissao = 0.04;

        // Calcula o valor da comissão
        $comissao = $valor_vendas * $taxa_comissao;

        // Calcula o salário final somando o fixo com a comissão
        $salario_final = $salario_fixo + $comissao;

        // Exibe os resultados formatados como moeda brasileira
        echo "<p><strong>Salário Fixo:</strong> R$ " . number_format($salario_fixo, 2, ',', '.') . "</p>";
        echo "<p><strong>Valor em Vendas:</strong> R$ " . number_format($valor_vendas, 2, ',', '.') . "</p>";
        echo "<p><strong>Comissão (4%):</strong> R$ " . number_format($comissao, 2, ',', '.') . "</p>";
        echo "<hr>";
        echo "<h2>Salário Final: R$ " . number_format($salario_final, 2, ',', '.') . "</h2>";

    } else {
        // Mensagem de erro se o script for acessado diretamente
        echo "<p>Erro: O formulário não foi submetido corretamente.</p>";
    }
    ?>

    <br>
    <a href="funcionario.html">← Voltar para a calculadora</a>

</body>
</html>
