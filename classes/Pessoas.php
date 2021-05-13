<?php
 

class Pessoas{
    
    
    
private $idPessoas;
private $nomePessoa;
private $emailPessoa;
private $celularPessoa;
private $idStatus;
private $idPerfil;
private $idArea;
private $ramalPessoa;
private $senha;
private $confirmaSenha;
private $codFuncionalPessoa;
private $conexao; 

 
 function getIdPessoas() {
     return $this->idPessoas;
 }

 function getNomePessoa() {
     return $this->nomePessoa;
 }

 function getEmailPessoa() {
     return $this->emailPessoa;
 }

 function getCelularPessoa() {
     return $this->celularPessoa;
 }

 function getIdStatus() {
     return $this->idStatus;
 }

 function getIdPerfil() {
     return $this->idPerfil;
 }

 function getIdArea() {
     return $this->idArea;
 }

 function getRamalPessoa() {
     return $this->ramalPessoa;
 }

 function getSenha() {
     return $this->senha;
 }

 function getConfirmaSenha() {
     return $this->confirmaSenha;
 }

 function getCodFuncionalPessoa() {
     return $this->codFuncionalPessoa;
 }

 function getConexao() {
     return $this->conexao;
 }

 function setIdPessoas($idPessoas) {
     $this->idPessoas = $idPessoas;
 }

 function setNomePessoa($nomePessoa) {
     $this->nomePessoa = $nomePessoa;
 }

 function setEmailPessoa($emailPessoa) {
     $this->emailPessoa = $emailPessoa;
 }

 function setCelularPessoa($celularPessoa) {
     $this->celularPessoa = $celularPessoa;
 }

 function setIdStatus($idStatus) {
     $this->idStatus = $idStatus;
 }

 function setIdPerfil($idPerfil) {
     $this->idPerfil = $idPerfil;
 }

 function setIdArea($idArea) {
     $this->idArea = $idArea;
 }

 function setRamalPessoa($ramalPessoa) {
     $this->ramalPessoa = $ramalPessoa;
 }

 function setSenha($senha) {
     $this->senha = $senha;
 }

 function setConfirmaSenha($confirmaSenha) {
     $this->confirmaSenha = $confirmaSenha;
 }

 function setCodFuncionalPessoa($codFuncionalPessoa) {
     $this->codFuncionalPessoa = $codFuncionalPessoa;
 }

 function setConexao($conexao) {
     $this->conexao = $conexao;
 }

 
 

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
 
        public function logar(){
              $sql = " select ps.idPessoas, ps.senha ,ps.nomePessoa, ps.emailPessoa, ps.ramalPessoa,"
                      . " ps.idStatus, ps.idPerfil, ps.idArea ,"
                      . " ps.ramalPessoa, ps.codFuncionalPessoa , pr.descPerfil, dp.idDepartamento, "
                      . " ar.descricaoArea, dp.nomeDepartamento, st.nomeStatus from pessoas as ps "
                      . " inner join perfil pr on pr.idperfil = ps.idPerfil"
                      . " inner join area ar on ps.idArea = ar.idarea "
                      . " inner join departamento dp on dp.iddepartamento = ar.idDepartamento "
                      
                      . "inner join status st on st.idstatus = ps.idStatus "
                      . "where ps.emailPessoa = '".$this->getEmailPessoa()."' and ps.senha= '".$this->getSenha()."'  and ps.idStatus=".$this->getIdStatus();
              
            
             
        $executar = mysqli_query($this->getConexao(), $sql);
         
      
          
        while ($row = mysqli_fetch_assoc($executar)) 
            {
               
                    $dados[] =  $row ;
                        
            }  
            
          
             if(isset($dados)) {
                
                return $dados;
             }else
             {
               
                  return FALSE;
             }
            
              
        }
 
        
        //função para especilizar algum tipo de consulta com pessoa, ou simplesmente trazer todos os dados de pessoa
        //posso descriminar as colunas que quero, ou simplesmente trazer todo mundo
        //posso filtrar essa consulta com where, etc, etc.. ou trazer todos os dados pelados mesmo, sem sofrer
        public function  retornarPessoas( $filtro = null, $colunas = null){
            
            
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = 'select  ';
        
        if($colunas != null){
            $sql .= $colunas;
        }else
        {
            $sql .= ' *  from pessoas';
        }
        
        $sql.= ' ';
                if($filtro  != null){
                    $sql .= $filtro;
                }
                
        echo $sql;
            
        $executar = mysqli_query($this->getConexao(), $sql);
          
        
         
        while ($row = mysqli_fetch_assoc($executar)) 
            {
               
                    $dados[] = $row;
                        
                
            }   
           
            if(isset($dados)){
               
                return $dados;
            }else
            {
                 
            }
         
          
    }

       
        
        public function inserirPessoas(){        
        try {
            
         
            $sql = "INSERT INTO  pessoas  (   nomePessoa ,   emailPessoa ,  celularPessoa , idStatus ,  idPerfil ,  idArea ,  ramalPessoa ,   codFuncionalPessoa, senha )  VALUES( '{$this->getNomePessoa()}', '{$this->getEmailPessoa() }',  '{$this->getCelularPessoa()}', '{$this->getIdStatus()}', '{$this->getIdPerfil()}', '{$this->getIdArea()}', '{$this->getRamalPessoa()}', '{$this->getCodFuncionalPessoa()}'   , '{$this->getSenha()}')";
                        
             $executar = mysqli_query($this->getConexao(), $sql);
             
            if ($executar == true) {
            
                return true;
            }else
            {
               
                return false;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
        
    
    
    //funcao unica para alterar perfil e dar acesso a pessoa
     public function permitirAcessoPessoa(){        
        try {
            
         
            $sql =  " UPDATE pessoas   SET "
                    . " idStatus  = ".$this->getIdStatus().","
                    . " idPerfil  = ".$this->getIdPerfil() .""
                    . " WHERE  idPessoas  = ".$this->getIdPessoas();
             
            echo $sql;
            
            $executar = mysqli_query($this->getConexao(), $sql);
            
            
            
            if ($executar == true) {
               
                return true;
            }else
            {
             
                return false;
            }
           
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        
        
    }
   
}