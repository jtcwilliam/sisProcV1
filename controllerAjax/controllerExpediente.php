<?php

 

include_once '../classes/Expediente.php';
include_once '../classes/LancamentoProProcesso.php';

$objExpediente = new Expediente();
$objLancamentoNoProcesso = new LancamentoPorProcesso;

 

$objExpediente->setIdPessoaRemetente($_POST['usuarioRemetente']);
$objExpediente->setIdDeptoRemetente($_POST['departamentoRemetente']);
$objExpediente->setIdAreaRemetente($_POST['areaRemetente']);

$objExpediente->setIdProcesso($_POST['processo']);
$objExpediente->setIdDeptoDestino($_POST['departamentoDestino']);
$objExpediente->setIdAreaDestino($_POST['areaDestino']);
$objExpediente->setDataEnvio(date("Y-m-d H:i:s") );

$objExpediente->setIdStatus('20');
$objExpediente->setIdLancamentoNoProcesso($_POST['lancamentoNoProcesso']);


try {
if($objExpediente->inserirExpediente())
    { 
        $objLancamentoNoProcesso->setLancamentoNoProcesso($_POST['lancamentoNoProcesso']);
        $objLancamentoNoProcesso->setStatus('20');
        if($objLancamentoNoProcesso->atualizarStatusLancamentoProcesso())
        {
         
            echo json_encode(array('retorno'=>TRUE));
            
        }
    
    }
    
     
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


 
