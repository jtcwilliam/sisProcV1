<?php



 
    include '../classes/Lancamento.php';

    
    $objLancamento = new Lancamento();

    
  

    $objLancamento->setArea($_POST['cbArea']);

    $objLancamento->setLancamento($_POST['txtNomeLancamento']);


    if($objLancamento->inserirLancamento())
        {            
            echo json_encode(array('retorno'=>TRUE));            
        } 
        
        