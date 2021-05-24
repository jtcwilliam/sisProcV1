<?php
 
 


class LancamentoPorProcesso {
    
    
    private $idLancamento;
    private $idProcesso;
    private $justificativa;
    private $data;
    private $idPessoas;
    private $conexao;

    function getIdLancamento() {
        return $this->idLancamento;
    }

    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getJustificativa() {
        return $this->justificativa;
    }

    function getData() {
        return $this->data;
    }

    function getIdPessoas() {
        return $this->idPessoas;
    }

    function setIdLancamento($idLancamento) {
        $this->idLancamento = $idLancamento;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setJustificativa($justificativa) {
        $this->justificativa = $justificativa;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setIdPessoas($idPessoas) {
        $this->idPessoas = $idPessoas;
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
    
    
    //INSERT INTO  bancoprocteste . lancamentoporprocesso  ( idLancamento , idProcesso , justificativa , dataLancamento , idPessoas ) VALUES (<{idLancamento: }>, <{idProcesso: }>, <{justificativa: }>, <{data: }>, <{idPessoas: }>);
    
    
    
    public function inserirLancamentoNoProcesso(){        
        try {                     
                $sql = "INSERT INTO  lancamentoporprocesso  (idProcesso , justificativa , dataLancamento , idPessoas, idLancamento ) "
                        . "VALUES ('".$this->getIdProcesso(). "','".($this->getJustificativa()). "','".$this->getData(). "','".$this->getIdPessoas()."','".$this->getIdLancamento()."')";
                
                
                  
                                                 
            $executar = mysqli_query($this->getConexao(), utf8_decode($sql));
            
            if ($executar == true) {
                
                mysqli_close($this->getConexao());
                return true;
                
                
            }else
            {
                
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage() ;
        }
         
    }
    
    
    public function  consultarLancamentosNoProcessoAnaliticoProc($idProcesso){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = "select   dpt.inicialDepto as  inicialDepto ,  ar.descricaoArea, la.descricaoLancamento, ps.nomePessoa,  ps.ramalPessoa,  "
                . "  DATE_FORMAT(lp.dataLancamento, '%d/%m/%Y')  as dataLancamento , ps.ramalPessoa, lp.justificativa, "
                . "lp.idLancamentoPorProcesso from lancamentoporprocesso lp inner join  lancamento la  "
                . "on lp.idLancamento =  la.idLancamento  "
                . "inner join pessoas ps on ps.idPessoas = lp.idPessoas     "
                . "inner join area ar on ar.idarea = ps.idArea   "
                . "inner join departamento dpt on dpt.iddepartamento = ar.idDepartamento "
                . " where lp.idProcesso=".$idProcesso . " order by idLancamentoPorProcesso desc  ";
                
        
       
     
                               
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
                    $dados[] =  $row;
                }   
            } 
            
            mysqli_close($this->getConexao());
        return $dados;
         
    }
 
}