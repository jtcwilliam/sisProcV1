<?php

class Pessoas{
     
    
private $conexao;
private $txtNome;
private $CbPerfil;
private $cbStatus;
private $txtTelefone;
private $cbDepto;
private $txtEmail;
private $txtSenha;
private $txtConfirmaSenha;
 
 

        function __construct() {
            // importar a classe conexao
            include_once 'Conexao.php';
            //criar uma instancia de conexao;
            $objConectar = new Conexao();
            
            //chamar o metdo conectar
            $banco = $objConectar->Conectar();
            
            //criar uma instancia dessa nova conexao
            $this->setConexao($banco);
        }

        
function getConexao() {
    return $this->conexao;
}

function setConexao($conexao) {
    $this->conexao = $conexao;
}

function getTxtNome() {
    return $this->txtNome;
}

function getCbPerfil() {
    return $this->CbPerfil;
}

function getCbStatus() {
    return $this->cbStatus;
}

function getTxtTelefone() {
    return $this->txtTelefone;
}

function getCbDepto() {
    return $this->cbDepto;
}

function getTxtEmail() {
    return $this->txtEmail;
}

function getTxtSenha() {
    return $this->txtSenha;
}

function getTxtConfirmaSenha() {
    return $this->txtConfirmaSenha;
}

function setTxtNome($txtNome) {
    $this->txtNome = $txtNome;
}

function setCbPerfil($CbPerfil) {
    $this->CbPerfil = $CbPerfil;
}

function setCbStatus($cbStatus) {
    $this->cbStatus = $cbStatus;
}

function setTxtTelefone($txtTelefone) {
    $this->txtTelefone = $txtTelefone;
}

function setCbDepto($cbDepto) {
    $this->cbDepto = $cbDepto;
}

function setTxtEmail($txtEmail) {
    $this->txtEmail = $txtEmail;
}

function setTxtSenha($txtSenha) {
    $this->txtSenha = $txtSenha;
}

function setTxtConfirmaSenha($txtConfirmaSenha) {
    $this->txtConfirmaSenha = $txtConfirmaSenha;
}


   
   
}