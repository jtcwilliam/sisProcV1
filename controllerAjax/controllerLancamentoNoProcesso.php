<?php
 
include '../classes/LancamentoProProcesso.php';
$objLancamentoNoProcesso = new LancamentoPorProcesso();

    
    
    switch ($_POST['tipoAcao']) 
        {
            case 'inserir':
                $objLancamentoNoProcesso->setIdProcesso($_POST['idProcesso']);
                $objLancamentoNoProcesso->setIdPessoas($_POST['idUsuario']);
                $objLancamentoNoProcesso->setData(date('Y-m-d'));
                $objLancamentoNoProcesso->setJustificativa(addslashes(utf8_encode($_POST['justificativa'])));                         
                $objLancamentoNoProcesso->setIdLancamento($_POST['lancamento']);
                $objLancamentoNoProcesso->setIdProcesso($_POST['idProcesso']);
            
                echo json_encode(array('retorno' => $objLancamentoNoProcesso->inserirLancamentoNoProcesso()));
            
                exit();
            break;
        
        
            case 'carregarLancamentosCadastrados':
                
                
            $dadosParaExibir=    $objLancamentoNoProcesso->consultarLancamentosNoProcessoAnaliticoProc($_POST['idProcesso']);
               
            
            
            foreach ($dadosParaExibir as $key => $value) {
                
            
                
                
                $dados[] = array(
                  'descricao'=>  $value['descricaoLancamento'],
                    'nomePessoa'=>  $value['nomePessoa'],
                    'dataLancamento'=>  $value['dataLancamento'],
                    'justificativa'=>  $value['justificativa'],
                        
                    
                );
                
            }
            
            echo json_encode($dados);
            
                
                /*
            
                    ini_set('display_errors', 1);
                    $array = array('one', 'two', 'three', 'four');

                    $temp = array(
                        'text' => 'Hello',
                        'text1' => 5,
                        'collect' => array()
                    );
                    $collect = array();
                    foreach ($array as $key => $value)
                    {
                        $collect[$value] = array(
                            'xx' => 'yy',
                            'key' => $key
                        );
                    }
                    $temp["collect"]=$collect;
                    echo json_encode($temp); 
            */
                
                
                
            
                
            
                
            
                
                
                    exit();
            break;
            
            
            
            
            
            default:
                break;
        }
    
 