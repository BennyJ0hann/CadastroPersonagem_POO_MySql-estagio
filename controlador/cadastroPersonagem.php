<?php
include_once '../classes/Conexao.php';
include_once '../classes/personagem.php';
include_once '../classes/personagemCrud.php';


$personagem = new Personagem();
$personagemCrud = new PersonagemCrud();

$filtra = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $personagem->setNome($filtra['name']);
    $personagem->setPrimeiraAparicao($filtra['apparition']);
    $personagem->setMaiorFeito($filtra['greatFeat']);
    $personagem->setDescricao($filtra['description']);
    $personagem->setEstadoVM($filtra['alive'] ? 1 : 0);
    $personagem->setCausaDaMorte($filtra['causeOfDead']);
    $personagem->setImagem($filtra['image']);

    $personagemCrud->create($personagem);

    header('Location: /projetoPersonagemPOO/PagPersonagens.php');
    exit();

}

if(isset($_POST['delete'])){

    $id = $_POST['delete'];

    $personagemCrud->delete($id);
    

}
if(isset($_POST['alterar'])){
    header('Location: /projetoPersonagemPOO/pagUpdate.php');
}

if (isset($_POST['verCadastro'])) {
    header('Location: /projetoPersonagemPOO/PagPersonagens.php');
    exit();
}
if (isset($_POST['cadastrarNew'])) {
    header('Location: /projetoPersonagemPOO/cadastro.html');
    exit();
}



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     if (isset($_POST['submit'])) {
//         $postNome = $_POST['nomePersonagem'];
//         $postAparicao = $_POST['primeiraAparicao'];
//         $postFeito = $_POST['maiorFeito'];
//         $postQuem = $_POST['quemE'];
//         $postVivo = $_POST['vivoMorto'];
//         $postMorte = isset($_POST['causaMorte']) ? $_POST['causaMorte'] : '';
//         $postImagem = $_POST['linkImagem'];

//         if (empty($postNome)) {
//             echo '<p class="text-danger">Informe o nome da pessoa.</p>';
//         } else if (empty($postAparicao)) {
//             echo '<p class="text-danger">Informe corretamente a aparição.</p>';
//         } else if (empty($postFeito)) {
//             echo '<p class="text-danger">Informe corretamente a idade.</p>';
//         } else if (empty($postQuem)) {
//             echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
//         }else if (empty($postVivo)) {
//             echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
//         } else {
//             $arrayPersonagem = [
//                 'nome' => $postNome,
//                 'aparicao' => $postAparicao,
//                 'maiorFeito' => $postFeito,
//                 'descricao' => $postQuem,
//                 'estadoVM' => $postVivo,
//                 'causaDaMorte' => $postMorte,
//                 'imagem' => $postImagem
//             ];

//             $colecaoPersonagens = new ColecaoPersonagens();
//             $colecaoPersonagens->addPersonagem($arrayPersonagem);

//             echo '<p class="text-success">Personagem adicionado com sucesso.</p>';
//             header('Location: /projetoPersonagemPOO/PagPersonagens.php');
//             exit();

        
