  <!doctype html>
 <?php
  
 include_once 'verificaAcesso.php';
 
 
  ?>
  
<html lang="pt-br">

    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        include_once './classes/Expediente.php';
        
        $objComponentes = new Componentes();
        $objExpediente = new Expediente();
        
        
        
       
     

   
        ?> 
  
  <body style="background-color: #1c2c4e;  ">
   
      
      
      
    
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';
  
      ?>
              <div class="small medium large reveal" id="modalInformacoes" data-reveal>
                   
                 
              </div>
      
      <main style="background-color:#e9eaea; display: block   " id="conteudo" >
 <?php
 
 
          
     
        
 
 ?>
          
          
          
             <div class="full reveal" id="modalSucessoTramitacao" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out" style="background-color: #eaeef4">
            
              
                 <div class="grid-container">
                     <div class="grid-x grid-padding-x"  style="  padding-top: 1em; padding-bottom: 6em">
                         <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                             <center>
                                 <h4>Processo Tramitado com Sucesso</h4>

                                 <img src="img/logAberto.png" style="width: 40%"/>
                             </center>
                         </div>
                         
                         
                         <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                             <center>
                               
                                 <br>

                                 <img src="img/logoPrefeitura.png" style="width: 20%"/>
                             </center>
                         </div>
                         
                         
                         
                          <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                             <center>
                               
                                 <br>

                                 <a href="analiticoProcesso.php?numeroProcesso=8834&anoProcesso=2021&8654f1fd71ecf4ecc061cbab0a34a728=<?=$_GET['8654f1fd71ecf4ecc061cbab0a34a728']?>" class="button botaoConfirmar">Clique aqui para concluir atualização</a>
                             </center>
                         </div>
                         
                         
                     </div>
                 </div>
  
               
               
          </div>

          <div class="large reveal" id="modalTramitar" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out" style="background-color: #e9eaea">
            
              
              <fieldset class="fieldset">
                  <legend>Olá. Agora a tramitação é Automática !</legend>
               
                  <br>

                  <div class="small-12 medium-12 large-12 cell">                                                
                      <label>Vai enviar para qual departamento?
                          <select id="cbDeptoTramitar">



                          </select>
                      </label>
                  </div>

                  <div class="small-12 medium-12 large-12 cell" id="divAreaTramite">                                                
                      <label>Escolha a Divisão que vai receber este processo!
                          <select id="cbAreaTramitar"       >
                              

                          </select>
                      </label>
                  </div>
                  
                  <div class="small-12 medium-12 large-12 cell"   id="botaoTramitarTudo" >                                                
                       <label> &nbsp;
                           <button class="button botaoConfirmar" onclick="tramitar()" style="width: 100%">Clique aqui e a tramitação estará feita !  </button>
                      </label>
                  </div>
                  
                  
                  
              </fieldset>
               
               
               
          </div>
          
         
    
        <div class="reveal" id="modalLoading" data-reveal>
            <center>  <h1>Aguarde por favor</h1>
            <img src="img/loading.gif" /> </center>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
              <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 1em; padding-bottom: 6em">
                   
                  
                  <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                      <ul class="menu align-right">
                          <li><a href="#" id="chamarAlteracoes">Habilitar Correção</a></li>
                          
                          <li><a href="report/relatorioAndamentos.php?dhkakjhdjhfjhfjhufh=<?=$_GET['8654f1fd71ecf4ecc061cbab0a34a728']?>"  target="_blank"  id="encaminhaProcesso">Relatórios</a></li>
                          
                              
                          
                      </ul>
                       
                  </div>
                  <div class="small-12 medium-12 large-12 cell">
                     
                      <div class="complementoProcesso">                                                           
                                  <fieldset class="fieldset">
                                      <legend id="dadosProcessoLegend" >Dados do Processo</legend>
                         
                         <!-- <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-5 cell">                                                
                                  <label>Numero e Ano do Processo
                                      <input type="text"   disabled=""  id="numeroAnoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div> -->
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Objeto do Processo  
                                      <input type="text"  class="entradasDados "   id="txtObjetoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                          
                            
                              
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Breve Descrição do Processo  
                                      <textarea id="txtDescricaoProjeto"  class="entradasDados "  rows="3" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                          
                       <!-- criar a tabela fonte de recurso -->
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-5 cell">        
                                 <label>Fonte de Recursos
                                    <select id="txtFonteRecurso" class="entradasDados " >
                                        <?php
                                            $objComponentes->setTabela('fonterecursos');
                                            $objComponentes->comboBox();
                                        ?>
                                            
                                    </select>
                              
                                      
                              
                                 </label>
                              </div>    
                           
                                 <div class="small-12 medium-12 large-3 cell">                                                
                                     <label>Previsão Orçamentária
                                         <div class="input-group">
                                             <span class="input-group-label">R$</span>
                                             <input class=" input-group-field entradasDados "   id="txtPrevisao"     type="text">
                                              
                                         </div>
                                     </label>
                                 </div>
                                 
                                 
                                 <div class="small-12 medium-12 large-3 cell">                                                
                                     <label>Modalidade
                                         
                                          <select id="txtModalidade"  class="entradasDados">
                                             <?php
                                            $objComponentes->setTabela('modalidade');
                                            $objComponentes->comboBox();
                                        ?>
                                         </select>
                                          
                                     </label>
                                 </div> 
                              
                              <div class="small-12 medium-12 large-1 cell">                                                
                                     <label>Favorito
                                         
                                          <select id="cbFavorito"  class="entradasDados">
                                              <option value="1">Sim</option>
                                              <option value="0">Não</option>
                                         </select>
                                          
                                     </label>
                                 </div> 
                              
                              
                          </div>
                          
                           
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-7 cell">                                                
                                  <label>Departamento Requerente
                                      
                                       <select id="cbDeptoReq" class="entradasDados">
                                           <?php
                                            $objComponentes->setTabela('departamento');
                                            $objComponentes->comboBox();
                                        ?>
                                      </select>
                                       
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-2 cell">                                                
                                  <label>Data de Abertura  
                                      <input type="date" id="txtDataAbertura" class="entradasDados" />
                                    
                                      <!-- não aparece na tela, mas não apague, ele é o id do processo, serve para validação -->
                                      <input type="hidden" id="txtIdProcesso" class="entradasDados" />
                                      <input type="hidden" id="txtIdUsuario" class="entradasDados" value="<?=$_SESSION['usuario']['idUsuario']?>"/>
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Prioridade
                                      
                                       <select id="cbPrioridades" class="entradasDados">
                                           <?php
                                            $objComponentes->setTabela('prioridade');
                                            $objComponentes->comboBox();
                                        ?>
                                      </select>
                                       
                                  </label>
                              </div>
                              
                              
                              
                    
                           <div class="small-12 medium-12 large-12 cell">       
                               <label>&nbsp;
                                   <a class="button warning" id="btnGravarAlteracoes"  onclick="atualizarProcesso()" style="width: 100%" >Gravar Alterações</a>
                               </label>
                           </div>
                              
                              

                       </div>
                       
                       
                 
                       
                       
                       
                     </fieldset>
                            </div>
                      
                       
                      
                    <div class="grid-x grid-padding-x" id="interacaoProcesso" >
                        <div class="small-12 medium-12 large-12 cell">                                       
                            <form  id="formulariosLancamentos"     action="controllerAjax/controllerLancamentoNoProcesso.php" method="post">
                                <fieldset class="fieldset">
                                    <legend>Interagir com o Processo</legend>           

                                    <div class="grid-x grid-padding-x">
                                        <div class="small-12 medium-12 large-6 cell">                                                
                                            <label>Lançar Informações

                                                <select id="cbLancamento" class="interagirProcesso">
                                                    <?php
                                                    $objComponentes->setTabela('lancamento');
                                                    $objComponentes->setFiltro(' where idarea=' .   $_SESSION['usuario']['idArea']. '  order by descricaoLancamento asc'   );
                                                    $objComponentes->comboBox();
                                                    ?>
                                                </select>

                                            </label>
                                        </div>
                                    </div>


                                    <div class="grid-x grid-padding-x">
                                        <div class="small-12 medium-12 large-12 cell">                                                
                                            <label>Justificativa, encaminhamento ou recomendação
                                                <textarea type="date" id="txtJustificativa" rows="2" class="interagirProcesso" ></textarea>


                                            </label>
                                        </div>
                                        
                                        
                                        <div class="small-12 medium-12 large-12 cell" id="sucessoLancamentoCastrado"  >                                                
                                            <label> 
                                                <div class="callout success">
                                                    <center>    <h3>Sua Interação foi inserida com sucesso </h3>
                                                         <h5>Vamos Atualizar a página e Recarregar todos os lançamentos </h5>
                                                    </center>
                                                   
                                                   
                                                </div>
                                            </label>
                                        </div>
                                        
                                        <div class="small-12 medium-12 large-12 cell">                                                
                                            <label> 
                                                <input  class="button botaoConfirmar" id="cadastrarLancamento" style=" width: 100%" value="Registrar Lancamento" type="submit" />


                                            </label>
                                        </div>
                                    
                                    
                                    
                                    </div>
                                    
                                    
                                    

                                </fieldset>
                            </form>
                        </div>
                    </div>
                    
                      <div class="grid-x grid-padding-x">
                          <div class="small-12 medium-12 large-12 cell">
                              
                                 <fieldset class="fieldset">
                                    <legend>Lançamentos do Processo</legend>        
                                    
                                    <div id="acordeon"></div>
                                    
                                    <ul class="accordion" data-accordion>
                                        
                                        <!-- ... -->
                                        
                                            
                                  
                                            
                                    <?php
                                    include 'classes/LancamentoProProcesso.php';
                                    $objLancamentoNoProcesso = new LancamentoPorProcesso();
                                     $dadosParaExibir=    $objLancamentoNoProcesso->consultarLancamentosNoProcessoAnaliticoProc($_GET['8654f1fd71ecf4ecc061cbab0a34a728']);
                                     
                                     
                                     
                                     $tamanho = count($dadosParaExibir);
                                     
                                     $cont = 1;
                                     foreach ($dadosParaExibir as $value) {
                                     
                        
                                         
                                         if(isset($value['descricaoLancamento'])){
                                         
                                         ?>
                                        <li class="accordion-item" data-accordion-item>
                                            <!-- Accordion tab title -->
                                            <a href="#" class="accordion-title" style="font-size: 1em"><?=$tamanho.'º -  '.$value['descricaoLancamento']?></a>                                            
                                            <div class="accordion-content" data-tab-content>
                                                <div class="grid-x grid-padding-x">
                                                    
                                                    
                                                    <div class="small-12 medium-12 large-2 cell">                                                
                                                        <label style="color: graytext ">Usuário</label>
                                                            <p style="font-size: 1em"><?=$value['nomePessoa']?></p>


                                                      
                                                    </div>
                                                    <div class="small-12 medium-12 large-3 cell">                                                
                                                        <label style="color: graytext ">Contato</label>
                                                            <p style="font-size: 1em"><?=$value['ramalPessoa']?></p>


                                                      
                                                    </div>
                                                    <div class="small-12 medium-12 large-2 cell">                                                
                                                        <label style="color: graytext ">Data de Lançamento</label>
                                                            <p style="font-size: 1em"><?=$value['dataLancamento']?></p>


                                                        
                                                    </div>
                                                    <div class="small-12 medium-12 large-5 cell">                                                
                                                        <label style="color: graytext; ">Departamento / Área</label>
                                                            <p style="font-size: 1em"><?=$value['inicialDepto'] . ' - '.$value['descricaoArea'] ?></p>
 
                                                    </div> 
                                                    <div class="small-12 medium-12 large-10 cell">                                                
                                                        <label style="color: graytext;  ">Justificativa, Encaminhamento ou Recomendação</label>
                                                            <p style="font-size: 1em"><?=$value['justificativa']?></p>
 
                                                    </div>
                                                      
                                                    <?php
                                                    
                                                    
                                                    
                                                    if($value['lancamentoNoProcesso']=='20'){
                                                        ?>
                                                            
                                                            <div class="small-12 medium-12 large-2 cell">   
                                                                 <label style="color: graytext;  "> </label>
                                                                 <a  style="color: black"     ><center><i class="fas fa-road"></i><br>Tramitado</center></a>
                                                            </div>
                                                        
                                                        
                                                        <?php
                                                    }else
                                                    {
                                                          ?>
                                                            
                                                            <div class="small-12 medium-12 large-2 cell">   
                                                                 <label style="color: graytext;  "> </label>
                                                                 <a href="#"  onclick="$('#modalTramitar').foundation('open');  $('#hdLancamentoProcesso').val(<?=$value['idLancamentoPorProcesso']?>)  " ><center>  <i class="fas fa-paper-plane"></i>   <br>Tramitar</center></a>
                                                            </div>
                                                        
                                                        
                                                        <?php
                                                        
                                                    }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>     
                                                    
                                             
                                        </li>
                                        <?php
                                         }
                                         
                                         $cont++;
                                         $tamanho-=1;
                                         
                                     } 
                                     
                                     ?> 
                                       </ul> 
                                 </fieldset>
                          </div>

                      </div>
                      
                      
                      
                      
                       
                  </div>
              </div>
          </div>
 
      </main>
      
      <div style="display: none">
            <input type="text" id="hdUsuario"       value="<?= $_SESSION['usuario']['idUsuario'] ?>"/>
            <input type="text" id="hdDepartamento"  value="<?= $_SESSION['usuario']['idDepartamento'] ?>"/>
            <input type="text" id="hdArea"          value="<?= $_SESSION['usuario']['idArea'] ?>"/>
            <input type="text" id="hdProcesso"      value="<?= $_GET['8654f1fd71ecf4ecc061cbab0a34a728'] ?>" />
            <input type="text" id="hdLancamentoProcesso"   />
      </div>    
            
      
      
      <!-- incluindo o footer  -->
    <?php 
      include_once 'includes/footer.php';
    ?>

    <script>     
      
      
      
function tramitar()
    {     
        var formData = {
            usuarioRemetente :$('#hdUsuario').val(),
            departamentoRemetente : $('#hdDepartamento').val(),
            areaRemetente : $('#hdArea').val(),
            processo : $('#hdProcesso').val(),         
            departamentoDestino: $('#cbDeptoTramitar').val(),
            areaDestino: $('#cbAreaTramitar').val(),
            lancamentoNoProcesso :$('#hdLancamentoProcesso').val()
        };               
        $.ajax({
            type        : 'POST',  
            url         : 'controllerAjax/controllerExpediente.php', 
            data        : formData, 
            dataType    : 'json', 
            encode          : true
        })
            // using the done promise callback
            .done(function(data) { 
               
               if(data.retorno = true){
                   $('#modalTramitar').foundation('close');
                     $('#modalSucessoTramitacao').foundation('open');
           
           
               }
                  
            });           
    };
    
        //inicio da area de cadastro de lancamento
        $('#formulariosLancamentos').submit(function(event) {
                 $('#cadastrarLancamento').hide();
   
   
       
   
        var formData = {
            tipoAcao: 'inserir',
            idProcesso : $('#txtIdProcesso').val(),
            lancamento: $('#cbLancamento').val(),
            justificativa: $('#txtJustificativa').val() ,
             idUsuario: $('#txtIdUsuario').val() 
            
        };

        // process the form
        $.ajax({
            type        : 'POST',  
            url         : 'controllerAjax/controllerLancamentoNoProcesso.php', 
            data        : formData, 
            dataType    : 'json', 
            encode          : true
        })
            // using the done promise callback
            .done(function(data) { 
                         
               console.log(data);
               console.log(data.retorno);
                
             if(data.retorno == true)
                {
                   
                   
                    $('#sucessoLancamentoCastrado').fadeIn('slow');
                    
                  setTimeout(function(){ location.reload(); }, 6000);
                    
                }
              
              
            });

         
        event.preventDefault();
    }); 
     
    //fim da area de de cadastro de lancamento
       
    $('#chamarAlteracoes').click(function (){
      
         alterarEdicao();
    });
    
    var contador=1;
    
    
    function alterarEdicao(){
      
        contador++;
        
        if(contador %2==0){
           //   console.log(contador);
               $('#btnGravarAlteracoes').show ();
                $('.entradasDados').attr('disabled', false);
                  $('#chamarAlteracoes').text('Desabilitar Correção');
               
            
        }else
        {
            
            $('#btnGravarAlteracoes').hide ();
                $('.entradasDados').attr('disabled', true);
              
                
                 $('#chamarAlteracoes').text('Habilitar Correção');
            
            
           
        }
        
    }
  
                
                 
    function atualizarProcesso ()
            {     
                $('#loading').css('display','block');
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerProcessoSintese.php",
                            dataType:"json",
                                data:{
                                    
                                        atualizarProcessos: 1,
                                        
                                        numeroAnoProcesso:    $('#numeroAnoProcesso').val(),

                                        txtObjetoProcesso:        $('#txtObjetoProcesso').val(),

                                        txtDescricaoProjeto:       $('#txtDescricaoProjeto').val(),
                                        
                                        cbPrioridades:       $('#cbPrioridades').val(),

                                        txtFonteRecurso:       $('#txtFonteRecurso').val(),

                                        txtModalidade:         $('#txtModalidade').val(),

                                        txtTag:        $('#txtTag').val(),

                                        txtPrevisao:        $('#txtPrevisao').val(),                                        

                                        cbDeptoReq:         $('#cbDeptoReq').val(),

                                        txtDataAbertura:       $('#txtDataAbertura').val(),
                                        
                                        
                                         cbFavorito:       $('#cbFavorito').val(),
                                        
                                                                                
                                        txtIdProcesso:  $('#txtIdProcesso').val()
                                                                     
                                   
                                    },
                                success: function(data,status,xhr)
                                    {         
                                        
                                       if(data.retorno == true)
                                       {
                                            $('#modalInformacoes').css("color", "white");                                            
                                            $('#modalInformacoes').css("font-stretch", "ultra-condensed");                      
                                            $('#modalInformacoes').css("text-align","center");
                                            $('#modalInformacoes').html('<h1>Sucesso</h1><h5>As informações foram corrigidas</h5>  \n\
                                                <a type="submit" class="button botaoConfirmar"  data-close   \n\
                                                \n\  id="btntCadastrar" style="width: 100%">Clique aqui para fechar (Obrigatório)</a>').foundation('open');  
                                            alterarEdicao();
                                             carregarSinteseProcesso(<?=$_GET['numeroProcesso']?>+'/'+<?=$_GET['anoProcesso']?>);
                                            
                                           
                                       }else
                                       {
                                           $('#modalInformacoes').css("color", "white");                                            
                                            $('#modalInformacoes').css("font-stretch", "ultra-condensed");                      
                                            $('#modalInformacoes').css("text-align","center");
                                            $('#modalInformacoes').html('<h1>Erro</h1><h5>As informações não foram alteradas</h5>  \n\
                                                <a type="submit" class="button botaoConfirmar"  data-close   \n\
                                                \n\  id="btntCadastrar" style="width: 100%">Clique aqui para fechar (Obrigatório)</a>').foundation('open');  
                                           
                                       }
                                                                                                                                                                                                     
                                     
                                                              
                                    },
                              error: function(xhr, status, error){
                                  alert("Error!" + xhr.status);
                              }
                         });
                     } 
                 catch(e) 
                     {
                         alert("A pesquisa não foi realizada");
                     };
                 };
    
    
    $(document).ready(function() 
        {               
             
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            $('#txtPrevisao').mask('0000.000.000.000.000,00', {reverse: true});      
            $('#btnGravarAlteracoes').toggle (); 
            $('.complementoProcesso').css('display','block');
              $('#sucessoLancamentoCastrado').css('display','none');
            $('.entradasDados ').attr('disabled', 'disabled');
            $('#divAreaTramite').hide();
             $('#botaoTramitarTudo').hide();
            
            
     
            
            
            
            
                 //popular combo departamento
            popularCombo('departamento',null, 'cbDeptoEscolhe');
             popularCombo('departamento',null, 'cbDeptoTramitar');
          
           
    }); 
    
    
    
       $('#cbDeptoTramitar').change(function (){    
        
             popularCombo("area"," where idDepartamento="+$('#cbDeptoTramitar').val(), "cbAreaTramitar"   );
               $('#divAreaTramite').show();
              
        });
        
        
        $('#cbAreaTramitar').click(function (){    
        
          
               $('#botaoTramitarTudo').show();
             
       
        });
    
    
    carregarSinteseProcesso(<?=$_GET['numeroProcesso']?>+'/'+<?=$_GET['anoProcesso']?>);
 
 
 
 (function($) {
    
  var allPanels = $('.accordion > dd').hide();
    
  $('.accordion > dt > a').click(function() {
    allPanels.slideUp();
    $(this).parent().next().slideDown();
    return false;
  });

})(jQuery);
 
    </script>


    
</body>
</html>