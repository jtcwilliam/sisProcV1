<?php

class Area{
    
    
 private $divisao;
 private $departamento;
 private $status;
 private $conexao; 

 function getDivisao() {
     return $this->divisao;
 }

 function getDepartamento() {
     return $this->departamento;
 }

 function getStatus() {
     return $this->status;
 }

 function setDivisao($divisao) {
     $this->divisao = $divisao;
 }

 function setDepartamento($departamento) {
     $this->departamento = $departamento;
 }

 function setStatus($status) {
     $this->status = $status;
 }

 
 
 

 function getConexao() {
     return $this->conexao;
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
 
  
 
        
        //função para especilizar algum tipo de consulta com pessoa, ou simplesmente trazer todos os dados de pessoa
        //posso descriminar as colunas que quero, ou simplesmente trazer todo mundo
        //posso filtrar essa consulta com where, etc, etc.. ou trazer todos os dados pelados mesmo, sem sofrer
        public function  retornarArea( $filtro = null, $colunas = null){
            
            
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
 
        
        public function inserirArea(){        
        try {
            
         
            $sql = "INSERT INTO    area  (descricaoarea, iddepartamento )  VALUES( '".utf8_encode($this->getDivisao())."', "
            . "'{$this->getDepartamento() }')";
            
         
         
                    
            $executar = mysqli_query($this->getConexao(), utf8_decode($sql));
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