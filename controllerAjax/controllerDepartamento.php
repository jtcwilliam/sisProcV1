<?php

include_once '../classes/Departamento.php';
$objDepartamento = new Departamento();

include_once '../classes/Processos.php';
$objProcesso = new Processos();


if (isset($_POST['tipoConsultaDepto']))
    {
    
    
    $tipoConsulta = $_POST['tipoConsultaDepto'];
    
    
        
    switch ($tipoConsulta) {
        case 'consultarParaAbas':

             $dados = $objDepartamento->retornarDepartamento(' where iddepartamento >0');
        
            
            echo '<div class="expanded   small button-group">';
            
        
        
                foreach ($dados as $key => $value) 
                    {
                   
                    echo '<a  onclick="carregarTodos ('.$dados[$key]['valor']['idDepartamento'].',    \'apresentaTodosProcesso\', \'consultarProcessosPorDepartamentoEscolhido\', \''.$dados[$key]['valor']['nomeDepartamento'].'\'  )"   class="button tiny" href="#">'.$dados[$key]['valor']['inicialDepto'].'</a>';
                    
                      } 
            echo '</div>';
            

            break;
            
            
            case 'consultarAbasParaArea':

             $dados = $objDepartamento->retornarDepartamento(' where iddepartamento >0');
        
            
            echo '<div class="expanded   small button-group">';
        
                foreach ($dados as $key => $value) 
                    {
                   ?>
               
                    
                    
                            <a   onclick="$('#enviarProcesso').html('Confirmar envio para <?=$dados[$key]['valor']['inicialDepto']?>');      popularCombo('area','where idDepartamento=<?=$dados[$key]['valor']['idDepartamento']?>', 'cbArea'   )"  class="button tiny" href="#"><?=$dados[$key]['valor']['inicialDepto']?></a>
                    
                    <?php  } 
            echo '</div>';
            

            break;
            
        
            
            
            
            
            
            
            
            
            
            
            

        default:
            break;
    }
    
        
    
    
    
    
    
    
    
    /*
    
        if ($_POST['tipoConsultaDepto'] == 'consultarParaAbas') 
            {
                $dados = $objDepartamento->retornarDepartamento(' where iddepartamento >0');
                
                foreach ($dados as $key => $value) {
                   
                    ?>

                        <li class="tabs-title"><a href="#panel3"><?=$dados[$key]['valor']['inicialDepto']?></a></li>

                      <?php
                    
                }
            }


if (isset($_POST['tipoConsultaDepto']))
    {
        if ($_POST['tipoConsultaDepto'] == 'consultarParaAbas') 
            {
                $dados = $objDepartamento->retornarDepartamento(' where iddepartamento >0');
                
                foreach ($dados as $key => $value) {
                   
                    ?>

                        <li class="tabs-title"><a href="#panel3"><?=$dados[$key]['valor']['inicialDepto']?></a></li>

                      <?php
                    
                }
            }            
    }
     * 
     */


            
    }
    
    
     