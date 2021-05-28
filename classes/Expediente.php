<?php

class Expediente {

    private $idDeptoRemetente;
    private $idAreaRemetente;
    private $idPessoaRemetente;
    private $idDeptoDestino;
    private $idProcesso;
    private $idExpediente;
    private $idAreaDestino;
    private $idStatus;
    private $conexao;
    private $dataEnvio;
    private $dataRecebimento;
    private $idLancamentoNoProcesso;

    function getIdDeptoRemetente() {
        return $this->idDeptoRemetente;
    }

    function getIdAreaRemetente() {
        return $this->idAreaRemetente;
    }

    function getIdPessoaRemetente() {
        return $this->idPessoaRemetente;
    }

    function getIdDeptoDestino() {
        return $this->idDeptoDestino;
    }

    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdExpediente() {
        return $this->idExpediente;
    }

    function getIdAreaDestino() {
        return $this->idAreaDestino;
    }

    function getIdStatus() {
        return $this->idStatus;
    }

    function getConexao() {
        return $this->conexao;
    }

    function getDataEnvio() {
        return $this->dataEnvio;
    }

    function getDataRecebimento() {
        return $this->dataRecebimento;
    }

    function getIdLancamentoNoProcesso() {
        return $this->idLancamentoNoProcesso;
    }

    function setIdDeptoRemetente($idDeptoRemetente) {
        $this->idDeptoRemetente = $idDeptoRemetente;
    }

    function setIdAreaRemetente($idAreaRemetente) {
        $this->idAreaRemetente = $idAreaRemetente;
    }

    function setIdPessoaRemetente($idPessoaRemetente) {
        $this->idPessoaRemetente = $idPessoaRemetente;
    }

    function setIdDeptoDestino($idDeptoDestino) {
        $this->idDeptoDestino = $idDeptoDestino;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdExpediente($idExpediente) {
        $this->idExpediente = $idExpediente;
    }

    function setIdAreaDestino($idAreaDestino) {
        $this->idAreaDestino = $idAreaDestino;
    }

    function setIdStatus($idStatus) {
        $this->idStatus = $idStatus;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    function setDataEnvio($dataEnvio) {
        $this->dataEnvio = $dataEnvio;
    }

    function setDataRecebimento($dataRecebimento) {
        $this->dataRecebimento = $dataRecebimento;
    }

    function setIdLancamentoNoProcesso($idLancamentoNoProcesso) {
        $this->idLancamentoNoProcesso = $idLancamentoNoProcesso;
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

        date_default_timezone_set('America/Sao_Paulo');
    }

    public function inserirExpediente() {
        try {


            $sql = "INSERT INTO  expediente  ( idDeptoRemetente , idAreaRemetente , idPessoaRemetente , idDeptoDestino , idProcesso ,   idAreaDestino ,  idLancamentoNoProcesso  ,idStatus, dataEnvio ) "
                    . "VALUES ( "
                    . $this->getIdDeptoRemetente() . ","
                    . $this->getIdAreaRemetente() . ","
                    . $this->getIdPessoaRemetente() . ","
                    . $this->getIdDeptoDestino() . ","
                    . $this->getIdProcesso() . ","
                    . $this->getIdAreaDestino() . ","
                    . $this->getIdLancamentoNoProcesso() . ","
                    . $this->getIdStatus() . ",'"
                    . $this->getDataEnvio() . ""
                    . "')";
             
            $executar = mysqli_query($this->getConexao(), $sql);
              
              
            if ($executar == true) {
                
                return true;
            } else {
                return false;
            }
            
           
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

        public function retornarExpediente($filtro = null ) 
            {
             
                $sql = 'select * from expediente  ';
                if ($filtro != null) {
                    $sql .= 'where idProcesso = '.$filtro ;
                }
                
               

                $executar = mysqli_query($this->getConexao(), $sql);

                while ($row = mysqli_fetch_assoc($executar)) 
                    {
                        $dados[] = $row;                    
                    }

                if (isset($dados)) {

                    return $dados;
                } else {

                }
        }

}
