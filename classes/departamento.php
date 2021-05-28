<?php

class Departamento {

    private $conexao;
    private $iddepartamento;
    private $nomeDepartamento;
    private $statusDepartamento;
    private $responsavelDepto;
    private $siglaDepto;
    private $inicialDepto;
    

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
    
    function getSiglaDepto() {
        return $this->siglaDepto;
    }

    function getInicialDepto() {
        return $this->inicialDepto;
    }

    function setSiglaDepto($siglaDepto) {
        $this->siglaDepto = $siglaDepto;
    }

    function setInicialDepto($inicialDepto) {
        $this->inicialDepto = $inicialDepto;
    }

        
    
    
    function getIddepartamento() {
        return $this->iddepartamento;
    }

    function getNomeDepartamento() {
        return $this->nomeDepartamento;
    }

    function getStatusDepartamento() {
        return $this->statusDepartamento;
    }

    function getResponsavelDepto() {
        return $this->responsavelDepto;
    }

    function setIddepartamento($iddepartamento) {
        $this->iddepartamento = $iddepartamento;
    }

    function setNomeDepartamento($nomeDepartamento) {
        $this->nomeDepartamento = $nomeDepartamento;
    }

    function setStatusDepartamento($statusDepartamento) {
        $this->statusDepartamento = $statusDepartamento;
    }

    function setResponsavelDepto($responsavelDepto) {
        $this->responsavelDepto = $responsavelDepto;
    }

        
     
    
    /*
    public function  retornarAnaliticoProcesso($filtro = null){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = "select pr.numeroProcesso as numeroProcesso  , pr.anoProcesso  as anoProcesso , pr.descricaoProcesso as descricaoProcesso , pr.objetoProcessos  as  objetoProcessos,"
                . " pr.dataAberturaProcesso as dataAberturaProcesso ,   format(pr.previsaoOrcamentaria ,2,'de_DE')   as previsaoOrcamentaria ,  dp.nomeDepartamento as nomeDepartamento,"
                . " md.descricaoModalidade as descricaoModalidade, fr.descFonteRecursos  as descFonteRecursos  , st.nomestatus as  nomestatus from processo pr"
                . " inner join departamento dp on dp.iddepartamento = pr.deptoRequerente "
                . " inner join modalidade md on md.idmodalidade = pr.idModalidade "
                . " inner join fonterecursos fr on fr.idFonteRecursos = pr.fonteDeRecurso "
                . " inner join status st  on st.idStatus = pr.statusStatus ";
         
        
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
                
                //  "numeroProcesso" => $row['numeroProcesso'],
                    $dados[] = array
                        (
                            "resultado" => TRUE,
                            "valor" => array
                                (
                                    "numeroProcesso" => utf8_encode($row['numeroProcesso']),
                                    "anoProcesso" => utf8_encode($row['anoProcesso']),
                                    "descricaoProcesso" => utf8_encode($row['descricaoProcesso']),
                                    "objetoProcessos" => utf8_encode($row['objetoProcessos']),
                                    "dataAberturaProcesso" => utf8_encode($row['dataAberturaProcesso']),
                                    "previsaoOrcamentaria" => utf8_encode($row['previsaoOrcamentaria']),
                                    
                                    "descricaoModalidade" => utf8_encode($row['descricaoModalidade']),
                                    "descFonteRecursos" => utf8_encode($row['descFonteRecursos']),
                                    "nomeDepartamento" => utf8_encode($row['nomeDepartamento']),
                                    "nomestatus" => utf8_encode($row['nomestatus'])
                                )
                        );
                }   
            } 
        return $dados;
         
    }*/
    
    
    
    
    

    public function  retornarDepartamento($filtro = null){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = 'select * from departamento  ';
                if($filtro  != null){
                    $sql .= $filtro;
                }
                
              
            
        $executar = mysqli_query($this->getConexao(), $sql);
        
        $contarCampos = mysqli_num_rows($executar);
        
        
       
         
        $i=0;
        
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
                                "idDepartamento" => $row['idDepartamento'],
                                 "nomeDepartamento" =>  $row['nomeDepartamento'],
                                "responsavelDepartamento" => $row['responsavelDepto'] ,
                                "siglaDepto" => $row['siglaDepto'] ,
                                "inicialDepto" => $row['inicialDepto']
                                
                            )
                        );
                }   
            } 
            mysqli_close($this->getConexao());
        return $dados;
         
    }
    
}
 