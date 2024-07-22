<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Personagens</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="background">
    <div>
        <div class="logo">
            <a href="./pagInicial.html">
                <img src="./Design sem nome(1).png" alt="logo">
            </a>
        </div>
        <div class="cabecalho"></div>
    </div>
    <div class="formatation" id="conteudo">
        <h1 style="color: aliceblue;" class="pt-3">Personagens</h1>
        <div style="text-align: center; margin-top: 50px;">
            <form method="POST">
                <button type="submit" value="" name="cadastrarNew" class="btn btn-primary">Adicionar Personagem</button>
            </form>
        </div>
        <?php
        include 'functions.php';
            if (isset($_POST['cadastrarNew'])) {
                header('Location: http://localhost/projetoPersonagemPOO/cadastro.html');
                exit();
            }

            organizaCards();       
        
        ?>
    </div>
</body>
</html>
