<?php

class Pessoas{
     
    
private $conexao; 


 

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

        

   
   
}