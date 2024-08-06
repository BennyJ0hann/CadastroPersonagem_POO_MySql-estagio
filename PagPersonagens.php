<?php
include_once "classes/Conexao.php";
include_once "classes/personagem.php";
include_once "classes/personagemCrud.php";
include_once "controlador/cadastroPersonagem.php";
include_once "controlador/updatePersonagem.php";


// Instancia as classes
$personagem = new Personagem();
$personagemCrud = new PersonagemCrud();

$counter = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Personagens</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
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
            <form method="POST" action="cadastro.html">
                <button type="submit" value="" name="cadastrarNew" class="btn btn-primary">Adicionar Personagem</button>
            </form>
        </div>
        <form action="" method="POST">
        <div>
            <ul class="ul1">
                <?php 

                foreach ($personagemCrud->read() as $personagem): 
                ?>
                    <?php if ($counter > 0 && $counter % 4 == 0): ?>
                        </ul><ul class="ul1">
                    <?php endif;?>
                    <div class="cards" style="margin-right: 15px; width: 23%">
                        <h2><?= htmlspecialchars($personagem->getNome())?></h2>
                            <div class="container">
                                <a href="<?= htmlspecialchars($personagem->getImagem())?> ">
                                    <button style="background-color: black; border: none;">
                                        <img src="<?= htmlspecialchars($personagem->getImagem())?>" alt="Avatar" class="" style="width: 100%; height: 100%; left: 50%; position: absolute; top: 50%; object-fit: cover; transform: translate(-50%, -50%);">
                                        <div class="overlay">
                                            <div class="text">Conhecer <br> Personagem</div>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        <?php if ($personagem->getCausaDaMorte() != null): ?> 
                            <p class="dead">Morto</p>
                         <?php else : ?>
                            <p class="life">Vivo</p>
                        <?php endif;?>
                        
                         <table>
                            <tr valign="top">
                                <th class="text-start fontCard">Nome</th>
                                <td class="text-start fontCard"><?= htmlspecialchars($personagem->getNome())?></td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Primeira aparição</th>
                                <td class="text-start fontCard"><?= htmlspecialchars($personagem->getPrimeiraAparicao())?></td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Maior feito</th>
                                <td class="fontCard text-start"><?=htmlspecialchars($personagem->getMaiorFeito()) ?></td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Quem é?</th>
                                <td class="text-start fontCard"><?=htmlspecialchars($personagem->getDescricao())?></td>
                            </tr>
                        <?php if ($personagem->getCausaDaMorte() != null): ?>
                            <tr valign="top">
                                <th class="text-start fontCard">Causa da morte</th>
                                <td class="text-start fontCard"><?=htmlspecialchars($personagem->getCausaDaMorte())?></td>
                            </tr>
                        <?php endif;?>
                            
                            <button class="btn btn-secondary dropdown-toggle-split mt-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><button type="submit" value="<?=htmlspecialchars($personagem->getId())?>" name="alterar" class="btn">Alterar</button></a></li>
                                <li><a class="dropdown-item text-danger" href="#"><button type="submit" value="<?=htmlspecialchars($personagem->getId())?>" name="delete" class="btn">Deletar</button></a></li>
                            </ul>
                        </table>
                    </div>
                    

                    <?php $counter++; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
