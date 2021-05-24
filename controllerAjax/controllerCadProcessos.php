<?php
 header('Content-type: text/html; charset=UTF-8');


include_once '../classes/Processos.php';
$objProcesso = new Processos();
 

//trecho para verificar se há campos vazios, caso não exista, permite a gravação



if ($_POST['acaoProcesso'] == 'consulta') {


    $dados = $objProcesso->retornarProcessos(" where numeroProcesso =".$_POST['txtNumero']." and anoprocesso = ".$_POST['txtAno'] );
 
   echo json_encode($dados);
   
  
   
   
}





if ($_POST['acaoProcesso'] == 'inserir') {


    $objProcesso->setTxtNumero($_POST['txtNumero']);

    $objProcesso->setModalidade($_POST['txtModalidade']);

    $objProcesso->setTxtAno($_POST['txtAno']);

    $objProcesso->setObjetoProcesso(addslashes($_POST['txtObjetoProcesso']), 'UTF-8');

    $objProcesso->setDescricaoProjeto(addslashes($_POST['txtDescricaoProjeto']), 'UTF-8');

    $objProcesso->setFonteRecurso($_POST['txtFonteRecurso']);


    $objProcesso->setTags(addslashes($_POST['txtTag']), 'UTF-8');

    $objProcesso->setDeptoRequerente($_POST['cbDeptoReq']);

    $objProcesso->setDataAbertura($_POST['txtDataAbertura']);
    
    $objProcesso->setPrioridade($_POST['prioridade']);



    if (empty($_POST['txtPrevisao'])) {
        $objProcesso->setPrevisao('0.00');
    } else {


        $valor = $_POST['txtPrevisao'];

        $valor = str_replace('.', '', $valor);

        $valor = str_replace(',', '.', $valor);


        $objProcesso->setPrevisao($valor);
    }





    $objProcesso->setStatus('2');

    if ($objProcesso->inserirProcessos()) {
        echo json_encode(array('retorno'=>TRUE));
    }




  
}