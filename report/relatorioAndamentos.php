<?php

// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


ob_start();
 

?><html>
<head>
<style>
table  {
  font-family: arial, sans-serif;
  font-stretch: ultra-condensed;
  border-collapse: collapse;
  width: 100%;
}

.linha  {
  border: 1px solid #dddddd;
  text-align: left;
  font-stretch: ultra-condensed;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #fff;
  font-stretch: ultra-condensed;
}
</style>
</head>
<body>
   
    
    
 
     

<table  >
    <tr >
      <th  style="width: 70%; text-align: justify;  padding: 8px; background-color: white ;  border: 0px solid  #fffff;    " >Relatório Analítico do Processo</th>
      <th style="width: 30%  ;background-color: white;   border: 0px solid #fffff;" > <img src="logAberto.png" style="width: 30%;   "/></th>
  </tr>
  
</table>
    <br>
    
    <?php
 
        include '../classes/Processos.php';
        $objProcesso = new Processos();
        $dadosDoProcesso = $objProcesso->retornarAnaliticoProcesso('where idProcesso= '.$_GET['dhkakjhdjhfjhfjhufh']);
         
        ?>
    
    
    <table class="linha">
        <tr class="linha" >
            <td  class="linha"   class="linha" colspan="3" style="background-color: #dddddd"  > <b>Objeto Processo</b>: <?= $dadosDoProcesso[0]['valor']['objetoProcessos'] ?></td>


        </tr>
  <tr class="linha" >
      <td  class="linha"  class="linha" colspan="3"    > <b>Processo</b>: <?=$dadosDoProcesso[0]['valor']['numeroProcesso'].'/'.$dadosDoProcesso[0]['valor']['anoProcesso'] ?></td>
      
       </tr>
  <tr class="linha" >     
       <td  class="linha"  class="linha" colspan="3" style="background-color: #dddddd"  > <b>Data de Abertura</b>: <?=$dadosDoProcesso[0]['valor']['dataAberturaProcesso'] ?></td>
       
  </tr>
       
  <tr class="linha" >
      <td  class="linha"  class="linha" colspan="3"  > <b>Departamento Responsável</b>: <?=$dadosDoProcesso[0]['valor']['nomeDepartamento'] ?></td>
     
  </tr>
  <tr class="linha" >
              <td  class="linha"  class="linha" colspan="3" style="background-color: #dddddd" > <b>Descrição do Processo</b>: <?=$dadosDoProcesso[0]['valor']['descricaoProcesso'] ?></td>
  </tr>
  <tr class="linha" colspan="2" >
      <td  class="linha"  class="linha"   > <b>Descrição de Modalidade</b>: <?=$dadosDoProcesso[0]['valor']['descricaoModalidade']  ?></td>
      <td  class="linha"  class="linha"   > <b>Fonte de Recursos</b>: <?=$dadosDoProcesso[0]['valor']['descFonteRecursos'] ?></td>
      <td  class="linha"  class="linha"   > <b>Previsão Orçamentária</b>: <?=$dadosDoProcesso[0]['valor']['previsaoOrcamentaria'] ?></td>
      
     
  </tr>
  

                                    
                                 
                                            
<?php           
 
                                      
                                        ?></table>
    
    
    
    <Br>
    
    
    
<table>
    <tr >
      <th  style="width: 100%; text-align: justify; padding: 8px; " >Lançamentos no Processo (histórico)</th>
      
  </tr>
  
</table>
    
 
   
 

<table class="linha">
  <tr class="linha" >
      <th  class="linha"  class="linha"  >  Departamento</th>
      <th  class="linha">Area</th>
    <th  class="linha">Usuario</th>
    <th  class="linha">Data</th>
    <th  class="linha">Justificativa</th>
  </tr>
  
<?php
 
 
                                    include '../classes/LancamentoProProcesso.php';
                                    $objLancamentoNoProcesso = new LancamentoPorProcesso();
                                     $dadosParaExibir=    $objLancamentoNoProcesso->consultarLancamentosNoProcessoAnaliticoProc($_GET['dhkakjhdjhfjhfjhufh']);
                                     
                             
                               
                                     
                                     $cont = 1;
                                   
                                     
                                     // style="background-color: red"
                                     
                                     $tamanho = count($dadosParaExibir);
                                     
                                     foreach ($dadosParaExibir as $value) {
                                     
                                         
                                  
                                         if(isset($value['inicialDepto'])  ){
                                         
                                             
                                             ?>
                                                <tr class="linha">
                                                    <td   class="linha" colspan="5"  style="background-color: #A1D4E9"class="linha" ><?='<b>'.$tamanho.'</b>º   &nbsp;  '.$value['descricaoLancamento']?></td>
                                                </tr>
                                                <tr class="linha" style="border-bottom-width: 5px; border-bottom-color: black ">
                                                    <td   class="linha"  class="linha" ><?=$value['inicialDepto']?> </td>
                                                        <td class="linha"  class="linha"><?=$value['descricaoArea']?></td>
                                                        <td class="linha"  class="linha"><?=$value['nomePessoa']?></td>
                                                       <td class="linha"  class="linha"><?=$value['dataLancamento']?></td>
                                                        <td class="linha"  class="linha"><?=$value['justificativa']?></td>
                                                    </tr >
                                            
                                        <?php
                                                 
                                                 
                                                 
                                                 
                                     
                                        
                                         }
                                         
                                         $cont++;
                                         $tamanho--;
                                         
                                     }
                                      
                                      
                                        ?></table>

</body>
</html><?php
                                    
                                    
                                     
                      

 //die();

 
$dompdf->loadHtml(ob_get_clean());


 

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

header('Content-type: application/pdf');

// Output the generated PDF to Browser
$dompdf->stream();


?>