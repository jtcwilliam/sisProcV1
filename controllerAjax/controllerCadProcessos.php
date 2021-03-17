<?php
 


include_once '../classes/Processos.php';
$objProcesso = new Processos();
 
 

if(isset($_POST['consultaProcesso'])) {
     
    
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
            $error['txtModalidade'] = 'Campo Nome está vazio';

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
            $error['txtFonteRecurso'] = 'Campo telefone está vazio';
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
            $objProcesso->setPrevisao($_POST['txtPrevisao']);
        }
 

        if ( ! empty($error)) {

            // if there are items in our errors array, return those errors
            $data['success'] = false;
            $data['error']  = $error;
        } else {

              
            $objProcesso->setStatus('1');
            
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