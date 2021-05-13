<!DOCTYPE html>
 <?php
  
 include_once 'verificaAcesso.php';
 
 
  ?>
  
<html class="no-js" lang="pt-BR">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        $objComponentes = new Componentes();
       
 
  

   
        ?> 
  
  <body style="background-color: #1c2c4e;  ">    
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';            
      ?>
              <div class="small medium large reveal" id="modalInformacoes" data-reveal>                                                      
                     <div class="complementoProcesso">       
                         
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-5 cell">                                                
                                  <label>Numero e Ano do Processo
                                      <input type="text"  class="entradasDados "   id="numeroAnoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                          
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
                                      <textarea id="txtDescricaoProjeto"  class="entradasDados "  rows="5" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                          
                       <!-- criar a tabela fonte de recurso -->
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-5 cell">        
                                 <label>Fonte de Recursos
                                      <input type="text"  class="entradasDados "   id="txtFonteRecurso" placeholder="Objeto do Processo">
                                     
                              
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
                                 
                                 
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                     <label>Modalidade
                                         
                                          <input class=" input-group-field entradasDados "   id="txtModalidade"     type="text">
                                          
                                     </label>
                                 </div> 
                          </div>
                          
                           
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-8 cell">                                                
                                  <label>Departamento Requerente
                                      
                                       <input id="cbDeptoReq" class="entradasDados"  type="text" >
                                      
                                       
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Data de Abertura do Processo
                                      <input type="date" id="txtDataAbertura" class="entradasDados" />
                                  </label>
                              </div>
                              
                               </div>
                          
                           
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              
                               <div class="small-12 medium-12 large-12 cell">                                                
                                 
                                   <a  id="analiseProcesso"  class="button secondary" target="_blank"   data-close id="btntCadastrar"   style="width: 100%">Analisar Processo</a>
                                      
 
                                      <a  data-close  class="button primary"   data-close id="btntCadastrar" style="width: 100%">fechar</a>
                                      
                                      
 
                              </div>
                         
                          </div>
                          
                            </div>
                 
              </div>
      
      <main style="background-color:#e9eaea; display: none   " id="conteudo" >

    
          
             

        <div class="reveal" id="modalLoading" data-reveal>
            <center>  <h1>Aguarde por favor</h1>
            <img src="img/loading.gif" /> </center>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <?php 
        
           
                
              
        ?>
            <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <form   method="post">
                        <fieldset class="fieldset">
                          <legend>
                             Controle de Processos
                          </legend>
                            
                            
                            <div class="grid-x grid-padding-x" >
                              
                                <div class="small-12 medium-12 large-12 cell">                                 
                                   
                                    <div class="row">
                                        <div class="columns">
                                            <ul class="tabs" data-tabs id="example-tabs">
                                                <li class="tabs-title is-active"><a href="#panel2">Consulta por número</a></li>
                                                
                                                     <li class="tabs-title"><a href="#panel3">Consulta por Tag's</a></li>
                                                <li class="tabs-title "><a href="#processosAtivos" aria-selected="true">Processos Ativos</a></li>
                                                
                                            
                                                 
                                                 
                                            </ul>
 
                                            
                                            <div class="tabs-content" data-tabs-content="example-tabs">
                                              
                                                
                                                
                                                
                                                  <div class="tabs-panel is-active" id="panel2">
                                                    
                                                   
                                                    
                                                    <fieldset class="fieldset"> 
                                                    <div class="grid-x grid-padding-x" >
                                                    
                                                       
                                                        <div class="small-12 medium-12 large-4 cell"><input type="text" id="txtConsultaPorNumero" placeholder="Digite o Número e Ano do processo" ></div>  
                                                        <div class="small-12 medium-12 large-3 cell"><a class="button success"  onclick="carregarTodos($('#txtConsultaPorNumero').val(), 'apresentaProcessosPorNumero', 'processosPorNumero')  "   >Consultar</a></div>  
                                                    </div>
                                                        </fieldset>
                                                   
                                                 
                                                   
                                                    <div id="apresentaProcessosPorNumero"></div>
                                                    
                                                    
                                             
                                                    
                                                </div>
                                                
                                                <div class="tabs-panel" id="panel3">



                                                    <fieldset class="fieldset"> 
                                                        <div class="grid-x grid-padding-x" >


                                                            <div class="small-12 medium-12 large-3 cell"><input type="text" id="txtConsultaPorTags" placeholder="Digite palavras Chaves" ></div>  
                                                            <div class="small-12 medium-12 large-3 cell"><a class="button success"  onclick="carregarTodos($('#txtConsultaPorTags').val(), 'apresentaProcessosTags', 'consultaPorTags'  )  "   >Consultar</a></div>  
                                                        </div>
                                                    </fieldset>



                                                    <div id="apresentaProcessosTags"></div>




                                                </div>
                                                
                                                <div class="tabs-panel " id="processosAtivos">
                                                    
                                                    <fieldset class="fieldset"> 
                                                     
                                                   
                                                   <div id="apresentaTodosProcesso"></div>
                                                    </fieldset>
                                                   
                                                  
                                                    
                                                    
                                                </div>
                                                 
                                                
                                                
                                              
                                                
                                                
                                                
                                                
                                                
                                                
                                                 
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                 
                            </div>
                            
                            
                            <div class="grid-x grid-padding-x" >
                                <div class="auto cell">     
                                </div>

                                <div class="small-12 medium-12 large-4 cell">                                 
                                    <img src="img/loading.gif"  id="loading"  style="display: none" style="width: 100%" >
                                </div>
                                <div class="auto cell">     
                                </div>
                            </div>
                            
                            
                            
                           
                            
                            <div class="grid-x grid-padding-x" >
                                <div class="auto cell">     
                                </div>

                                <div class="small-12 medium-12 large-4 cell">                                 
                                    <img src="img/loading.gif"  id="loading"  style="display: none" style="width: 100%" >
                                </div>
                                <div class="auto cell">     
                                </div>
                            </div>
                            
                            
                          
                          
                          
                          
                      </fieldset>
                      </form>
                  </div>
              </div>
          </div>

 
          
      </main>
      
      <!-- incluindo o footer  -->
    <?php 
      include_once 'includes/footer.php';
    ?>

    <script>    
    
    function carregarTodos (dadoDesejado, areaApresentacao, tipoDeConsulta )
            {      
                console.log(dadoDesejado);
                console.log(tipoDeConsulta);
              
               
                 $('#'+areaApresentacao).html($('#loading').css('display','block'));
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerProcessoSintese.php",
                            dataType:"html",
                                data:{  dadoDesejado: dadoDesejado,
                                        areaApresentacao: areaApresentacao,
                                        tipoDeConsulta:  tipoDeConsulta
                                    
                                    },
                                success: function(data,status,xhr)
                                    {                
                                        
                                        console.log(data);
                                        
                                        $('#loading').css('display','none');
                                        
                                            
                                        //area da tela onde virão os dados
                                        $('#'+areaApresentacao).html(data);
                                                                  
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
                 
                 
                 
                 
    function carregarSinteseProcesso (dadoDesejado  )
            {      
                
                /*{numeroProcesso: "2", anoProcesso: "1475", descricaoProcesso: "testes de pão", objetoProcessos: "pança", dataAberturaProcesso: "2021-03-21", …}
anoProcesso: "1475"
dataAberturaProcesso: "2021-03-21"
descFonteRecursos: "Transferencias e Convênios Estaduais - Vinculados"
descricaoModalidade: "Inexigibilidade"
descricaoProcesso: "testes de pão"
nomestatus: "Ativo"
numeroProcesso: "2"
objetoProcessos: "pança"
previsaoOrcamentaria: "1265.25"
__proto__: Object*/
                
             
               
                $('#loading').css('display','block');
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerProcessoSintese.php",
                            dataType:"json",
                                data:{
                                    
                                    tipoDeConsulta: 'consultarSinteseDosProcessos',
                                   
                                    dadoDesejado: dadoDesejado
                                   
                                    },
                                success: function(data,status,xhr)
                                    {         
                                        
                                        console.log(data);
                                                                                                               
                                        $('#modalInformacoes').css("background-color", "#dcdcdc");
                                        $('#modalInformacoes').css("color", "white");
                                        $('#modalInformacoes').css("font-weight", "bolder");
                                                                                                              
                                        $('#modalInformacoes').foundation('open');   
                                        
                                        $('#numeroAnoProcesso').val(data[0].valor.numeroProcesso+'/'+data[0].valor.anoProcesso   );
                                        
                                        $('#txtObjetoProcesso').val(data[0].valor.objetoProcessos);

                                        $('#txtDescricaoProjeto').val(data[0].valor.descricaoProcesso);

                                        $('#txtFonteRecurso').val(data[0].valor.descFonteRecursos);

                                        $('#txtModalidade').val(data[0].valor.descricaoModalidade);

                                        $('#txtTag').val(data[0].valor.objetoProcessos);

                                        $('#txtPrevisao').val(data[0].valor.previsaoOrcamentaria);
                                        
                                        $('#cbDeptoReq').val(data[0].valor.nomeDepartamento);
                                          
                                        $('#txtDataAbertura').val(data[0].valor.dataDeAberturaSemFormatacao);
                                                                                                                                                                                                    
                                        $('#loading').css('display','none');
                                        
                                        
                                        $('#analiseProcesso').attr('href', 'analiticoProcesso.php?numeroProcesso='+ data[0].valor.numeroProcesso + '&anoProcesso='+data[0].valor.anoProcesso  + '&8654f1fd71ecf4ecc061cbab0a34a728='+data[0].valor.idProcesso  );
                                        
                                        
                                   
                                                                  
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
            $('.complementoProcesso').css('display','block');
            $('#conteudo').css('display','block');
                 
            carregarTodos(null,'apresentaTodosProcesso','todosOsProcessos' );
           
    
    }); 
    
    

    </script>


    
</body>
</html>