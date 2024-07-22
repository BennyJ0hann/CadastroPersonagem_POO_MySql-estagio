<?php
include "db.php";
class Personagem{
    private $nome;
    private $primeiraAparicao;
    private $maiorFeito;
    private $descricao;
    private $estadoVM;
    private $causaDaMorte;
    private $imagem;
public function __construct(string $nome, string $primeiraAparicao, string $maiorFeito, string $descricao, bool $estadoVM,string $causaDaMorte, string $imagem){
    $this->nome = $nome;
    $this->primeiraAparicao = $primeiraAparicao;
    $this->maiorFeito = $maiorFeito;
    $this->descricao = $descricao;
    $this->estadoVM = $estadoVM;
    $this->causaDaMorte = $causaDaMorte;
    $this->imagem = $imagem;
}
public function getNome(){
    return $this->nome;
}
public function setNome($nome){
    $this->nome = $nome;
}

public function getPrimeiraAparicao(){
    return $this->primeiraAparicao;
}
public function setPrimeiraAparicao($primeiraAparicao){
    $this->primeiraAparicao = $primeiraAparicao;
}

public function getMaiorFeito(){
    return $this->maiorFeito;
}
public function setMaiorFeito($maiorFeito){
    $this->maiorFeito = $maiorFeito;
}

public function getDescricao(){
    return $this->descricao;
}
public function setDescricao($descricao){
    $this->descricao = $descricao;
}

public function getEstadoVM(){
    return $this->estadoVM;
}
public function setEstadoVM($estadoVM){
    $this->estadoVM = $estadoVM;
}
public function getCausaDaMorte(){
    return $this->causaDaMorte;
}
public function setCausaDaMorte($causaDaMorte){
    $this->causaDaMorte = $causaDaMorte;
}

public function getImagem(){
    return $this->imagem;
}
public function setImagem($imagem){
    $this->imagem = $imagem;
}


}
?>