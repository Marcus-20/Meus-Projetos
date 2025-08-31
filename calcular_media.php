<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Média</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
            text-align: center;
        }
        .container {
            background-color: white;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .message {
            font-size: 1.2em;
        }
        .success {
            color: #155724;
        }
        .error {
            color: #721c24;
        }
        a {
            display: inline-block;
            margin-top: 1.5em;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['nome_aluno']) && isset($_POST['nota1']) && isset($_POST['nota2'])) {
                $nome_aluno = htmlspecialchars(trim($_POST['nome_aluno']));
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];

                if (is_numeric($nota1) && is_numeric($nota2)) {
                    $media = ((float)$nota1 + (float)$nota2) / 2;
                    $media_formatada = number_format($media, 1, ',', '.');
                    echo "<p class='message success'>O aluno(a) <strong>" . $nome_aluno . "</strong> ficou com <strong>" . $media_formatada . "</strong> de média.</p>";
                } else {
                    echo "<p class='message error'>Erro: As notas devem ser valores numéricos.</p>";
                }
            } else {
                echo "<p class='message error'>Erro: Todos os campos do formulário devem ser preenchidos.</p>";
            }
        } else {
            echo "<p class='message error'>Por favor, envie os dados através do formulário.</p>";
        }
        ?>
        <a href="index.html">← Voltar ao formulário</a>
    </div>
</body>
</html>

