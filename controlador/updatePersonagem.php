<?php
include_once '../classes/Conexao.php';
include_once '../classes/personagem.php';
include_once '../classes/personagemCrud.php';


$personagem = new Personagem();
$personagemCrud = new PersonagemCrud();

$filtra = filter_input_array(INPUT_POST);

if(isset($_POST['Altera'])){
    if (isset($filtra['id'])) {
        $personagem->setId($filtra['id']);
    }
    if (isset($filtra['name'])) {
        $personagem->setNome($filtra['name']);
    }
    if (isset($filtra['apparition'])) {
        $personagem->setPrimeiraAparicao($filtra['apparition']);
    }
    if (isset($filtra['greatFeat'])) {
        $personagem->setMaiorFeito($filtra['greatFeat']);
    }
    if (isset($filtra['description'])) {
        $personagem->setDescricao($filtra['description']);
    }
    if (isset($filtra['alive'])) {
        $personagem->setEstadoVM($filtra['alive'] ? 1 : 0);
    }
    if (isset($filtra['causeOfDead'])) {
        $personagem->setCausaDaMorte($filtra['causeOfDead']);
    }
    if (isset($filtra['image'])) {
        $personagem->setImagem($filtra['image']);
    }
    $personagemCrud->update($personagem);

    header('Location: /projetoPersonagemPOO/PagPersonagens.php');
    exit();
}

if(isset($_POST['alterar'])){
    session_start();

    $_SESSION['id'] = $_POST['alterar'];
    $consulta = $personagemCrud->consultaUpdate($id);
    $personagemCrud->update($consulta);

    header('Location: /projetoPersonagemPOO/pagUpdate.php');
    exit();

}

if (isset($_POST['verCadastro'])) {
    header('Location: /projetoPersonagemPOO/PagPersonagens.php');
    exit();
}

        
