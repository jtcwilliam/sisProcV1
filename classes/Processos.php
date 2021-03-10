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


    public function  retornarProcessos($numero,$ano){
        $sql = 'select * from processo';
        
        
        $executar = mysqli_query($this->getConexao(), $sql);
        
        $linhas = array();
        $dados = array();
        while($linhas = mysqli_fetch_assoc($executar)){
            array_push($dados, $linhas);
        }
         
        return $dados;
        
        /*
        $dados = mysql_query($query, $con) or die(mysql_error());
// transforma os dados em um array
$linha = mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
        
         * *
         */
        
    }

}
