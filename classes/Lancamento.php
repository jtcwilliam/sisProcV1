<?php

header('Content-Type: text/html; charset=utf-8');
class Lancamento {

    private $area;
    private $lancamento;
    private $status;
    private $conexao;
    
    function getArea() {
        return $this->area;
    }

    function getLancamento() {
        return $this->lancamento;
    }

    function getStatus() {
        return $this->status;
    }

    function getConexao() {
        return $this->conexao;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setLancamento($lancamento) {
        $this->lancamento = $lancamento;
    }

    function setStatus($status) {
        $this->status = $status;
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
        public function  retornarLancamento( $filtro = null, $colunas = null){
            
            
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
 
        
        public function inserirLancamento(){        
        try {
            
         
            $sql = "INSERT INTO    lancamento  (descricaoLancamento, idArea )  VALUES( '{$this->getLancamento()}', "
            . "'{$this->getArea() }')";
            
            
 
         
                    
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