<?php

class Processos {

    private $conexao;
    private $idProcesso;
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
    
    private $prioridade;
    private $favorito;
    
    function getFavorito() {
        return $this->favorito;
    }

    function setFavorito($favorito) {
        $this->favorito = $favorito;
    }

        
    
    
    function getPrioridade() {
        return $this->prioridade;
    }

    function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
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

    function getConexao() {
        return $this->conexao;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }
    
    
  
    function getIdProcesso() {
        return $this->idProcesso;
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

    function getStatus() {
        return $this->status;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
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

    function setStatus($status) {
        $this->status = $status;
    }

        
    
    
    public function  retornarAnaliticoProcesso($filtro = null){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = "select pr.numeroProcesso as numeroProcesso  ,  pr.idProcesso   ,pr.deptoRequerente  ,pr.idModalidade,  idprioridade, favorito ,pr.fonteDeRecurso  as fonteDeREcurso   ,pr.anoProcesso  as anoProcesso , pr.descricaoProcesso as descricaoProcesso ,"
                . " pr.objetoProcessos  as  objetoProcessos,"
                . "   DATE_FORMAT(pr.dataAberturaProcesso, '%d/%m/%Y')   as dataAberturaProcesso ,  pr.dataAberturaProcesso   as dataDeAberturaSemFormatacao  , format(pr.previsaoOrcamentaria ,2,'de_DE') "
                . "  as previsaoOrcamentaria ,  dp.nomeDepartamento as nomeDepartamento,"
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
                                
                                
                                     "idProcesso" =>  $row['idProcesso'],
                                    "numeroProcesso" =>  $row['numeroProcesso'],
                                    "anoProcesso" =>  $row['anoProcesso'],
                                    "descricaoProcesso" =>  $row['descricaoProcesso'],
                                    "objetoProcessos" =>  $row['objetoProcessos'],
                                    "dataAberturaProcesso" =>  $row['dataAberturaProcesso'],
                                "dataDeAberturaSemFormatacao" =>  $row['dataDeAberturaSemFormatacao'],                                
                                "favorito" =>  $row['favorito'],   
                                    "previsaoOrcamentaria" =>  $row['previsaoOrcamentaria'],
                                    "idModalidade" =>  $row['idModalidade'],
                                    "idFonteDeRecurso" =>  $row['fonteDeREcurso'],                                    
                                    "descricaoModalidade" =>  $row['descricaoModalidade'],
                                    "descFonteRecursos" =>  $row['descFonteRecursos'],
                                 "idprioridade" =>  $row['idprioridade'],
                                    "nomeDepartamento" =>  $row['nomeDepartamento'],
                                      "deptoRequerente" =>  $row['deptoRequerente'],
                                    "nomestatus" =>  $row['nomestatus']
                                )
                        );
                }   
            } 
              mysqli_close($this->getConexao());
        return $dados;
         
    }
    
    
    
    
    //classe para criar uma grade com todos os processos
        public function  retornarProcessosEmGrade($filtro = null){
        
          //faz a consulta
        $sql = 'select * from processo  ';
                if($filtro  != null){
                    $sql .= $filtro;
                }         
                
             
                
                 
        $executar = mysqli_query($this->getConexao(), $sql);
          
        //monta a tabela, se quiser rolagem, coloque um valor em pixels, tipo 500px
            ?>
                <table>
                        <thead>
                            <tr>
                            <th width="150">Processo</th>                                 
                            <th width="100">Favorito</th>    
                            <th width="500">Objeto do Processo</th>     
                            
                             <th width="300">Tag's</th>    
                        </tr>
                    </thead>
                    <tbody>                            
                    <?php            
                    while ($row = mysqli_fetch_assoc($executar)) 
                        {  
                        
                      
                        
                            ?> 
                            <tr>
                                    <td width="150" >  
                                        <a    <?php if( $row['idprioridade'] == 4) { echo  'style="font-stretch: expanded;   color: #B13817"'; } ?>  onclick="carregarSinteseProcesso('<?=$row['numeroProcesso'] . '/' . $row['anoProcesso'] ?>' )"   href="#">
                                            <?=utf8_encode($row['numeroProcesso']) . '/' . $row['anoProcesso']; ?> 
                                        </a>
                                    </td>
                                    <td width="100"  style="font-stretch: ultra-condensed"   >
                                        <?php                                    
                                                if($row['favorito']  == '1'){
                                                ?>
                                                        <img src="img/favorite.png" style="width: 10%" />
                                                <?php
                                                }
                                                ?>
                                    </td>
                                    
                                    <td width="500">  
                                            <a   <?php if( $row['idprioridade'] == 4) { echo  'style="font-stretch: expanded;   color: #B13817"'; } ?>  onclick="carregarSinteseProcesso('<?=$row['numeroProcesso'] . '/' . $row['anoProcesso'] ?>' )"   href="#">
                                                <?= substr($row ['objetoProcessos'], 0, 60) ?>... 
                                            </a>
                                    </td>
                                    
                                    <td width="300"  > 
                                        <a   <?php if( $row['idprioridade'] == 4) { echo  'style="font-stretch: expanded;   color: #B13817"'; } ?>  onclick="carregarSinteseProcesso('<?=$row['numeroProcesso'] . '/' . $row['anoProcesso'] ?>' )"   href="#">
                                                <?= $row ['tagsProcesso'] ?>
                                        </a>
                                    </td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>        
        <?php 
        
                mysqli_close($this->getConexao());
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
                                 "anoProcesso" => $row['anoProcesso'],
                                "statusStatus" => $row['statusStatus'],
                                "objetoProcessos" => $row['objetoProcessos']
                            )
                        );
                }   
            } 
            
            mysqli_close($this->getConexao());
        return $dados;
         
    }
    
    
    
     public function  consultarDadosProcesso($filtro = null){
        //forma de se ter o método retorno de processo com várias possibilidades
        $sql = '  select pr.numeroProcesso , pr.anoProcesso , pr.descricaoProcesso, pr.objetoProcessos, '
                . 'pr.dataAberturaProcesso, pr.previsaoOrcamentaria, dp.nomeDepartamento, '
                . 'md.descricaoModalidade, fr.descFonteRecursos, st.nomestatus from processo pr '
                . 'inner join departamento dp on dp.iddepartamento = pr.deptoRequerente  '
                . 'inner join modalidade md on md.idmodalidade = pr.idModalidade  '
                . 'inner join fonterecursos fr on fr.idFonteRecursos = pr.fonteDeRecurso '
                . 'inner join status st  on st.idStatus = pr.statusStatus  ';
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
                                "anoProcesso" => $row['anoProcesso'],
                                "descricaoProcesso" => $row['descricaoProcesso'],
                                "dataAberturaProcesso" => $row['dataAberturaProcesso'],
                                "previsaoOrcamentaria" => $row['previsaoOrcamentaria'],
                                "nomeDepartamento" => $row['nomeDepartamento'],
                                "descricaoModalidade" => $row['descricaoModalidade'],
                                "descFonteRecursos" => $row['descFonteRecursos'],
                                "nomestatus" => $row['nomestatus'], 
                                "objetoProcessos" => utf8_encode($row['objetoProcessos'])
                            )
                        );
                }   
            } 
            
             mysqli_close($this->getConexao());
        return $dados;
        
         
    }
    
    
    
    public function inserirProcessos(){        
        try {
            
         
            $sql = "INSERT INTO bancoprocteste . processo 
                (
                numeroProcesso,anoProcesso,descricaoProcesso ,fonteDeRecurso ,statusStatus ,objetoProcessos ,dataAberturaProcesso ,tagsProcesso ,deptoRequerente ,idModalidade ,previsaoOrcamentaria, idprioridade, favorito)
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
                    . "'{$this->getPrevisao()}' ,"
                    . "'{$this->getPrioridade()}', '0')";
                    
                  
                    
                    
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
        mysqli_close($this->getConexao());
    }
    
    
         public function atualizarProcessos(){        
        try {
            
         
            $sql = "UPDATE  processo  SET descricaoProcesso  =   '{$this->getDescricaoProjeto()}'  , "
                    . "fonteDeRecurso  =   '{$this->getFonteRecurso()}'  , "
                    . "objetoProcessos  =   '{$this->getObjetoProcesso()}'  , "
                    . "dataAberturaProcesso  =   '{$this->getDataAbertura()}'  , "
                    . "idprioridade  =   '{$this->getPrioridade()}'  ,"                                        
                    . "deptoRequerente  =   '{$this->getDeptoRequerente()}'  , "
                    . "idModalidade  =   '{$this->getModalidade()}'  , "
                    . "previsaoOrcamentaria  =   '{$this->getPrevisao()} ', "
                    . "favorito =   '{$this->getFavorito()} '"
                    . "WHERE  idprocesso  =   {$this->getIdProcesso()} ";
                     
            $executar = mysqli_query($this->getConexao(),  $sql);
             
            if ($executar == true) {
              
              echo json_encode(array('retorno'=>TRUE));
            }else
            {
           
                echo json_encode(array('retorno'=>false));
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
         mysqli_close($this->getConexao());
    }
}

