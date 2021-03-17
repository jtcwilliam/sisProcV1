<?php

class Processos {

    private $conexao;
    private $txtNumero;
    private $txtAno;
    private $objetoProcesso;
    private $descricaoProjeto;
    private $fonteRecurso;
    private $modalidade;
    private $tags;
    private $deptoRequerente;
    private $dataAbertura;
    private $previsao;
    private $status;

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
    
    
    function getTxtNumero() {
        return $this->txtNumero;
    }

    function getTxtAno() {
        return $this->txtAno;
    }

    function getObjetoProcesso() {
        return $this->objetoProcesso;
    }

    function getDescricaoProjeto() {
        return $this->descricaoProjeto;
    }

    function getFonteRecurso() {
        return $this->fonteRecurso;
    }

    function getModalidade() {
        return $this->modalidade;
    }

    function getTags() {
        return $this->tags;
    }

    function getDeptoRequerente() {
        return $this->deptoRequerente;
    }

    function getDataAbertura() {
        return $this->dataAbertura;
    }

    function getPrevisao() {
        return $this->previsao;
    }

    function setTxtNumero($txtNumero) {
        $this->txtNumero = $txtNumero;
    }

    function setTxtAno($txtAno) {
        $this->txtAno = $txtAno;
    }

    function setObjetoProcesso($objetoProcesso) {
        $this->objetoProcesso = $objetoProcesso;
    }

    function setDescricaoProjeto($descricaoProjeto) {
        $this->descricaoProjeto = $descricaoProjeto;
    }

    function setFonteRecurso($fonteRecurso) {
        $this->fonteRecurso = $fonteRecurso;
    }

    function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    function setDeptoRequerente($deptoRequerente) {
        $this->deptoRequerente = $deptoRequerente;
    }

    function setDataAbertura($dataAbertura) {
        $this->dataAbertura = $dataAbertura;
    }

    function setPrevisao($previsao) {
        $this->previsao = $previsao;
    }
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    

    public function  retornarProcessos($filtro = null){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = 'select * from processo  ';
                if($filtro  != null){
                    $sql .= $filtro;
                }
            
        $executar = mysqli_query($this->getConexao(), $sql);
        
        $contarCampos = mysqli_num_rows($executar);
        
        if($contarCampos ==0)
            {             
                $dados[] = array ("resultado"=>false );             
            }
        else 
            {
            while ($row = mysqli_fetch_assoc($executar)) 
                {
                    $dados[] = array
                        (
                            "resultado" => TRUE,
                            "valor" => array(
                                "numeroProcesso" => $row['numeroProcesso'],
                                "statusStatus" => $row['statusStatus'],
                                "objetoProcessos" => utf8_encode($row['objetoProcessos'])
                            )
                        );
                }   
            } 
        return $dados;
        
        
    
    }
    
    
    
    public function inserirProcessos(){        
        try {
            
         
            $sql = "INSERT INTO bancoprocteste . processo 
                (
                numeroProcesso,anoProcesso,descricaoProcesso ,fonteDeRecurso ,statusStatus ,objetoProcessos ,dataAberturaProcesso ,tagsProcesso ,deptoRequerente ,idModalidade ,previsaoOrcamentaria)
                    VALUES
                    ({$this->getTxtNumero()} ,"
                    . "'{$this->getTxtAno()}' ,"
                    . "'{$this->getDescricaoProjeto()}' ,"
                    . "'{$this->getFonteRecurso()}' ,"
                    . "' {$this->getStatus()}' ,"
                    . "'{$this->getObjetoProcesso()}' ,"
                    . "'{$this->getDataAbertura()}' ,"
                    . "'{$this->getTags()}' ,"
                    . "'{$this->getDeptoRequerente()}',"
                    . "'{$this->getModalidade()}' ,"
                    . "'{$this->getPrevisao()}')";
                    
                    
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
    
    
    
    /*
     * 

     */

}
