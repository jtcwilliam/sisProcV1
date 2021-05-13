<?php
 

class LocalAtualProcesso{
        private $conexao;
        private $idDepto;
        private $idProcesso;
        private $dataEnvio;
        private $idPessoaResponsavel;
        private $dataRecebimento;
                        
        function getConexao() {
            return $this->conexao;
        }

        function getIdDepto() {
            return $this->idDepto;
        }

        function getIdProcesso() {
            return $this->idProcesso;
        }

        function getDataEnvio() {
            return $this->dataEnvio;
        }

        function getIdPessoaResponsavel() {
            return $this->idPessoaResponsavel;
        }

        function getDataRecebimento() {
            return $this->dataRecebimento;
        }

        function setConexao($conexao) {
            $this->conexao = $conexao;
        }

        function setIdDepto($idDepto) {
            $this->idDepto = $idDepto;
        }

        function setIdProcesso($idProcesso) {
            $this->idProcesso = $idProcesso;
        }

        function setDataEnvio($dataEnvio) {
            $this->dataEnvio = $dataEnvio;
        }

        function setIdPessoaResponsavel($idPessoaResponsavel) {
            $this->idPessoaResponsavel = $idPessoaResponsavel;
        }

        function setDataRecebimento($dataRecebimento) {
            $this->dataRecebimento = $dataRecebimento;
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
        
        
         public function inserirAtual(){        
        try {                     
                $sql = "INSERT INTO  localatualprocesso  ( idDepto , idProcesso , dataEnvio , idPessoaResponsavel , dataRecebimento , idArea )"
                        . "VALUES ("
                        . "<{idDepto: }>,"
                        . "<{idProcesso: }>,"
                        . "<{dataEnvio: }>,"
                        . "<{idPessoaResponsavel: }>,"
                        . "<{dataRecebimento: }>,"
                        . "<{idArea: }>)";
                                                 
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