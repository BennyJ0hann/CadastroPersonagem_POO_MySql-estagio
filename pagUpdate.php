
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
<?php
include_once "classes/Conexao.php";
include_once "classes/personagem.php";
include_once "classes/personagemCrud.php";
include_once "controlador/cadastroPersonagem.php";
include_once "controlador/updatePersonagem.php";

$personagem = new Personagem();
$personagemCrud = new PersonagemCrud();

session_start();
if (isset($_SESSION['id'])) {
    $consulta = $personagemCrud->consultaUpdate($_SESSION['id']);
}
?>
    <div class="container">
        <h2>Cadastro de Personagem</h2>
        <div class="form-group row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="controlador/updatePersonagem.php" method="post">                    
                <label for="id">Id do Personagem: <?= htmlspecialchars($consulta->getId()) ?></label>
                <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($consulta->getId()) ?>"><br>

                    <label for="nome">Nome do Personagem:</label>
                    <input type="text" id="nome" name="name" value="<?= htmlspecialchars($consulta->getNome())?>" placeholder="<?= htmlspecialchars($consulta->getNome())?>" class="form-control"><br>

                    <label for="primeiraAparicao">Primeira Aparição(data):</label>
                    <input type="date" id="primeiraAparicao" name="apparition" value="<?= htmlspecialchars($consulta->getPrimeiraAparicao())?>" placeholder="<?= htmlspecialchars($consulta->getPrimeiraAparicao())?>" class="form-control" oninput="validateNumberInput(this)"><br>

                    <label for="maiorFeito">Maior Feito:</label>
                    <input type="text" id="maiorFeito" name="greatFeat" value="<?= htmlspecialchars($consulta->getMaiorFeito())?>" placeholder="<?= htmlspecialchars($consulta->getMaiorFeito())?>" class="form-control"><br>

                    <label for="quemE">Quem é:</label>
                    <input type="text" id="quemE" name="description" value="<?= htmlspecialchars($consulta->getDescricao())?>" placeholder="<?= htmlspecialchars($consulta->getDescricao())?>" class="form-control"><br>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alive" id="Vivo" value="true">
                        <label class="form-check-label" for="Vivo">Vivo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alive" id="Morto" value="false">
                        <label class="form-check-label" for="Morto">Morto</label>
                    </div><br>

                    <label for="causaMorte">Causa da Morte (se estiver morto):</label>
                    <input type="text" id="causaMorte" name="causeOfDead" value="<?= htmlspecialchars($consulta->getCausaDaMorte())?>" placeholder="<?= htmlspecialchars($consulta->getCausaDaMorte())?>" class="form-control" disabled><br>

                    <label for="linkImagem">Imagem do personagem (link web):</label>
                    <input type="text" id="linkImagem" name="image" value="<?= htmlspecialchars($consulta->getImagem())?>" placeholder="<?= htmlspecialchars($consulta->getImagem())?>" class="form-control"><br>

                    <div class="col mb-2">
                        <button type="submit" value="Confirmar" name="Altera" class="btn btn-success">Alterar</button>
                    </div>
                    <div class="col mb-2">
                        <button type="submit" value="limp" id="verCadastro" name="verCadastro" class="btn btn-secondary">Ver Cadastros</button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var morto = document.getElementById('Morto');
            var causaMorte = document.getElementById('causaMorte');

            morto.addEventListener('change', function () {
                if (morto.checked) {
                    causaMorte.disabled = false;
                } else {
                    causaMorte.disabled = true;
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <!-- <script>
            $(document).ready(function () {
                $('#primeiraAparicao').mask('00/00/0000');
            });
        </script> -->
</body>

</html>