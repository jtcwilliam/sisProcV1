  <!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        $objComponentes = new Componentes();
        
        session_start();
        
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
            <div class="grid-x grid-padding-x"  style="  padding-top: 1em; padding-bottom: 1em">
                <div class="small-12 large-12 cell">
                    
                     

                        <div id="divNavegaDepto">

                        </div>
                        



                   
                    <fieldset class="fieldset"   >
                        
                        <legend id="tabelasDosProcesso"></legend> 
                        
                        <div class="columns">
                                          
                                             
                                              <div class="callout">      
                                                   
                                                        
                                                   
                                                   <div id="apresentaTodosProcesso"></div>
                                                   
                                                   
                                                  
                                              </div>
                                                    
                                                
                                                 
                                                  
                                           
                                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

 
          
      </main>
      
      <!-- incluindo o footer  -->
    <?php 
      include_once 'includes/footer.php';
    ?>

    <script>    
        
        
        
     function montaAbaDepto()
     {   
        try 
            {
                $.ajax({
                    type: "POST",
                    url: "controllerAjax/controllerDepartamento.php",
                    dataType:"html",
                        data:{tipoConsultaDepto:"consultarParaAbas"
                            },
                        success: function(data,status,xhr)
                            {                
                               

                                $('#divNavegaDepto').html(data);
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
     }
     
     
   
   
     
 
    
    $(document).ready(function() 
        {               
             
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            $('#txtPrevisao').mask('0000.000.000.000.000,00', {reverse: true});      
            
         
      
         
         
         //botão para consultar se existe processo pré cadastrado
      
               
             
       
         $('.complementoProcesso').css('display','block');
         
         
   
                        
         
  
         $('#conteudo').css('display','block');
         
         $('#apresentaTodosProcesso').html('<center><h4>Clique no departamento que deseja consultar o processo</h4></center>');
         
        
     //   carregarTodos(null,'apresentaTodosProcesso','todos' );
       
        montaAbaDepto();
        
    
    }); 
    
    

    </script>


    
</body>
</html>