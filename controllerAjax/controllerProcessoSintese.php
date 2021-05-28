<?php

include_once '../classes/Processos.php';
$objProcesso = new Processos();

include_once '../classes/Departamento.php';
$objDepartamento = new Departamento();



if(isset($_POST['atualizarProcessos']))
    {
    
    $objProcesso->setDescricaoProjeto(addslashes($_POST['txtDescricaoProjeto']), 'UTF-8');
    $objProcesso->setFonteRecurso($_POST['txtFonteRecurso']);
    $objProcesso->setObjetoProcesso(addslashes($_POST['txtObjetoProcesso']), 'UTF-8');
    $objProcesso->setModalidade($_POST['txtModalidade']);
    $objProcesso->setDataAbertura($_POST['txtDataAbertura']);
    $objProcesso->setDeptoRequerente($_POST['cbDeptoReq']);
    $objProcesso->setPrioridade($_POST['cbPrioridades']);
    $objProcesso->setFavorito($_POST['cbFavorito']);
   
        
        
    $previsao = $_POST['txtPrevisao'];
    
    //apaga o ponto de milher
    $previsao = str_replace('.', '', $previsao);
    
    //altera a virgula para ponto decimal (a forma como armazena no banco
    $previsao = str_replace(',','.', $previsao);
     
    //atualiza 
    $objProcesso->setPrevisao($previsao);
    
    $objProcesso->setIdProcesso($_POST['txtIdProcesso']);
    
    $objProcesso->atualizarProcessos();
    
    }
    
    /*  atualizarProcessos: 1,
                                        
                                        numeroAnoProcesso:    $('#numeroAnoProcesso').val(),

                                        txtObjetoProcesso:        $('#txtObjetoProcesso').val(),

                                        txtDescricaoProjeto:       $('#txtDescricaoProjeto').val(),

                                        txtFonteRecurso:       $('#txtFonteRecurso').val(),

                                        txtModalidade:         $('#txtModalidade').val(),

                                        txtTag:        $('#txtTag').val(),

                                        txtPrevisao:        $('#txtPrevisao').val(),                                        

                                        cbDeptoReq:         $('#cbDeptoReq').val(),

                                        txtDataAbertura:       $('#txtDataAbertura').val()
     * 
     */
    




//variavel que recebe o tipo da Consulta
if (isset($_POST['tipoDeConsulta'])) 
    {
                
        
            $tipoDeConsulta = $_POST['tipoDeConsulta'];
            
            
            switch ($tipoDeConsulta) {
                case 'todosOsProcessos':
                    $objProcesso->retornarProcessosEmGrade( '  order by idprocesso desc limit 0,15');
                    
                    break;
                
                case 'processosPorNumero':                    
                    $numeroProcesso = explode('/', $_POST['dadoDesejado']);                    
                    $numero = $numeroProcesso[0];
                    $ano = $numeroProcesso[1];                                        
                    $objProcesso->retornarProcessosEmGrade(' where numeroProcesso='.$numero .' and anoProcesso='.$ano. '  order by idprocesso desc ' );
                    
                    break;
                
                
                case 'consultaPorTags':                    
                    $tags = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where tagsProcesso like(lower('%".$tags."%')) order by idprocesso desc ");
                    
                    break;
                
                
                   case 'consultarProcessosPorDepartamentoEscolhido':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where deptoRequerente=".$idDepartamento.' order by idprocesso desc ');
                    
                    break;
                
                
                  case 'sempreSecretario':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where idprioridade in (4,5) and statusStatus=2 order by idPrioridade asc, idprocesso desc ");
                    
                    break;
                
                
                case 'baixaPrioridade':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where idprioridade = 1 and statusStatus=2   order by idprocesso desc ");
                    
                    break;
                
                
                
                case 'urgente':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where idprioridade = 2 and statusStatus=2   order by idprocesso desc ");
                    
                    break;
                
                
                case 'urgentissimo':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where idprioridade = 3 and statusStatus=2   order by idprocesso desc ");
                    
                    break;
                
                
                
                case 'critico':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where idprioridade = 4 and statusStatus=2   order by idprocesso desc ");
                    
                    break;
                
                
                 case 'favorito':     
                
                    $idDepartamento = $_POST['dadoDesejado'];
                    $objProcesso->retornarProcessosEmGrade(" where favorito=1 and statusStatus=2   order by idprocesso desc ");
                    
                    break;
                
                
                
                
                
                
                
                
                
                
                
                case'consultarSinteseDosProcessos':
                $numeroProcesso = explode('/', $_POST['dadoDesejado']);                    
                    $numero = $numeroProcesso[0];
                    $ano = $numeroProcesso[1];         



                $dadosSintese = $objProcesso->retornarAnaliticoProcesso('where numeroprocesso = ' . $numero . ' and anoprocesso = ' . $ano);


                echo json_encode($dadosSintese);


                break;





        default:
                    break;
            }
    
    }


