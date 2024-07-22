<?php
include_once 'classes/personagem.class.php';
include_once 'functions.php';

if (isset($_POST['verCadastro'])) {
    header('Location: /projetoPersonagemPOO/PagPersonagens.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['submit'])) {
        $postNome = $_POST['nomePersonagem'];
        $postAparicao = $_POST['primeiraAparicao'];
        $postFeito = $_POST['maiorFeito'];
        $postQuem = $_POST['quemE'];
        $postVivo = $_POST['vivoMorto'];
        $postMorte = isset($_POST['causaMorte']) ? $_POST['causaMorte'] : '';
        $postImagem = $_POST['linkImagem'];

        if (empty($postNome)) {
            echo '<p class="text-danger">Informe o nome da pessoa.</p>';
        } else if (empty($postAparicao)) {
            echo '<p class="text-danger">Informe corretamente a cidade.</p>';
        } else if (empty($postFeito)) {
            echo '<p class="text-danger">Informe corretamente a idade.</p>';
        } else if (empty($postQuem)) {
            echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
        }else if (empty($postVivo)) {
            echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
        } else {
            
            $personagem = new Personagem($postNome,$postAparicao,$postFeito,$postQuem,$postVivo,$postMorte,$postImagem);

            insertDB($personagem);

            echo '<p class="text-success">Personagem adicionado com sucesso.</p>';
            header('Location: /projetoPersonagemPOO/PagPersonagens.php');
            exit();

        }
        
    }
}
?>
