<?php
 


include_once '../classes/Processos.php';
$objProcesso = new Processos();

include_once '../classes/Departamento.php';
$objDepartamento = new Departamento();
 




//pesquisar por tipoDeConsulta - neste caso sera
if( $_POST['tipoConsultar'] == 'consultaPorDepartamento'     )     
{
        
    $dadosDepartamento = $objDepartamento->retornarDepartamento(' where iddepartamento >0' );
    
        
    

        echo '<table><tbody>';
    $i=0;
    
    foreach ($dadosDepartamento as $value) {
        ?>

        
        <tr><Td style="background-color: #008; color: white"   width="1100"  colspan='2'><?=$dadosDepartamento[$i]['valor']['nomeDepartamento']?></td></tr>



        <?php
        
        
        
       $dadosProc = $objProcesso->retornarProcessos(' where deptoRequerente='.$dadosDepartamento[$i]['valor']['idDepartamento']);
       
       foreach ($dadosProc as $value) {
           
           if(isset($value['valor'])){
           ?>
           
             <tr>
                 
                 <td width="200"> <a   onclick="carregarSinteseProcesso('<?=$value['valor']['numeroProcesso'].'/'.$value['valor']['anoProcesso'] ?>' )"   href="#">  <?=$value['valor']['numeroProcesso'] ?> </a></td>
                 
                <td width="900"><?=$value['valor']['objetoProcessos'] ?></td>
                 
             
             </tr>
        <?php
       
           }else
           {
               ?>
              <tr><Td style="background-color: white; color: #012426; font-stretch: extra-condensed"   width="1100"  colspan='2'> Não há processo cadastrado!</td></tr>
              <?php
           }
        
        
       }
        
        
        $i++;
    }
    
    echo '</tbody></table>';
    
    
    return true;
    
}








if(isset($_POST['consultaProcessoTotal'])) {
       
    
    
    $dadoA_Consultar = $_POST['numeroProcesso'];
    $tipoConsulta = $_POST['tipoConsultar'];
    
    switch ($tipoConsulta) {
        case 'todos':
            $dados = $objProcesso->retornarProcessos();

            break;
        
          case 'consultaPorNumero':
              
              if($dadoA_Consultar == ''){
                  $dadoA_Consultar = 0;
              }
              
            $dados = $objProcesso->retornarProcessos(' where numeroProcesso='.$dadoA_Consultar   );

            break;
        
        case 'consultaPorTags':
            $dados = $objProcesso->retornarProcessos(' where tagsProcesso  like (lower(\'%'.$dadoA_Consultar.'%\'))'  );

            break;


        
        default:
            break;
    }

    
    /*
    if( $_POST['numeroProcesso'] == null)
    {
         
        $dados = $objProcesso->retornarProcessos();
    }else
    {        
       
    }
    */
   
 
    ?>


    <table>
        <thead>
            <tr>
                <th width="200">Processo</th>
                 
                <th width="900">Objeto do Processo</th>
                
            </tr>
        </thead>
        <tbody>
            
            <?php
            
            
            
               foreach ($dados as $value) 
                   {
                   
                   if(isset($value['valor'])){
                  
                         ?>  <tr>

                             <td width="200" >   <a   onclick="carregarSinteseProcesso('<?=$value['valor']['numeroProcesso'].'/'.$value['valor']['anoProcesso'] ?>' )"   href="#"><?=$value['valor']['numeroProcesso'].' / '.$value['valor']['anoProcesso'] ?>  </a></td>
                                <td width="900"    ><?=$value['valor']['objetoProcessos'] ?></td>
                            </tr>
                             <?php   
                   }else
                   {
                       ?>
                            
                            <td colspan="2" >  Não Há processos Cadastrados com esse número </a></td>
                              
                              <?php
                       
                   }
                    }  
             
             
?>
            
 
                               
 
            

            
          
        </tbody>
    </table>


<?php



return true;
}

 

if(isset($_POST['consultaProcessoPorNumeroAno'])) {
     
    
   $dados = $objProcesso->retornarProcessos(" where numeroProcesso =".$_POST['txtNumero']." and anoprocesso = ".$_POST['txtAno'] );
 
   echo json_encode($dados);
   
  
   
   
}else{
  
        $error        = array();      // array to hold validation errors
        $data           = array();  



        if (empty($_POST['txtNumero'])) {
            $error['txtNumero'] = 'Campo Nome está vazio';
        }else{                    
            $objProcesso->setTxtNumero($_POST['txtNumero']);
        }

        if (empty($_POST['txtModalidade'])) {
            $objProcesso->setModalidade('0');

        }else{      
            $objProcesso->setModalidade($_POST['txtModalidade']);
        }

        if (empty($_POST['txtAno'])) {
            $error['txtAno'] = 'Campo Nome está vazio';

        }else{
            $objProcesso->setTxtAno($_POST['txtAno']);
        }

        if (empty($_POST['txtObjetoProcesso'])) {
            $error['txtObjetoProcesso'] = 'Campo Perfil está vazio';
            }else{
            $objProcesso->setObjetoProcesso($_POST['txtObjetoProcesso']);
        }

        if (empty($_POST['txtDescricaoProjeto'])) {
            $error['txtDescricaoProjeto'] = 'Campo status está vazio';
            }else{
            $objProcesso->setDescricaoProjeto($_POST['txtDescricaoProjeto']);
        }

        if (empty($_POST['txtFonteRecurso'])) {
             $objProcesso->setFonteRecurso('0');
            }else{
            $objProcesso->setFonteRecurso($_POST['txtFonteRecurso']);
        } 
        
        

        if (empty($_POST['txtTag'])) {
            $error['txtTag'] = 'Campo tags está vazio';
            }else{
            $objProcesso->setTags($_POST['txtTag']);
        }

        if (empty($_POST['cbDeptoReq'])) {
            $error['cbDeptoReq'] = 'Campo depto requerente está vazio';
            }else{
            $objProcesso->setDeptoRequerente($_POST['cbDeptoReq']);
        }


        if (empty($_POST['txtDataAbertura'])) {
            $error['txtDataAbertura'] = 'Campo abertura está vazio';
            }else{
            $objProcesso->setDataAbertura($_POST['txtDataAbertura']);
        }

 
        if (empty($_POST['txtPrevisao'])) {
            $objProcesso->setPrevisao('0');
            
            }else{
                
                
                $valor = $_POST['txtPrevisao'];
                
                $valor = str_replace('.', '', $valor);
                
                $valor = str_replace(',', '.', $valor);
                
                
            $objProcesso->setPrevisao($valor);
        }
 

        if ( ! empty($error)) {

            // if there are items in our errors array, return those errors
            $data['success'] = false;
            $data['error']  = $error;
        } else {

              
            $objProcesso->setStatus('2');
            
            if($objProcesso->inserirProcessos())
            {
                $data['success'] = true;
            }
            /*$data['success'] = true;
            $data['message'] = 'só inserir!';*/
        }

        // return all our data to an AJAX call
        echo json_encode($data);
}