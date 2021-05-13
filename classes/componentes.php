<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
      


class Componentes {
    
    
    
    private $conexao;
    private $filtro;
    private $tabela;
    
    function __construct() {
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

    function getFiltro() {
        return $this->filtro;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    function setFiltro($filtro) {
        $this->filtro = $filtro;
    }
    
    function getTabela() {
        return $this->tabela;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }



    public function  comboBox()
        {
        //forma de se ter o método retorno de processo com várias possibilidades
            $sql = "select * from {$this->getTabela()}  ";
                    if($this->getFiltro()  != null){
                        $sql .= $this->getFiltro();
                    }
                    
      echo $sql;
                    
  
            $executar = mysqli_query($this->getConexao(), $sql);
               

            while ($row = mysqli_fetch_array($executar)) 
                {
                    echo "<option value=".$row[0].">".$row[1]."</option>";                
                }   
              
        }
     
}

 