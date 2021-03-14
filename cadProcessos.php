  <!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        ?> 
  
  <body style="background-color: #1c2c4e; ">
   
    
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';
      
      
      ?>
              <div class="full reveal" id="modalInformacoes" data-reveal>
                 
                   
                 
              </div>
      
        <main style="background-color:#e9eaea;   " >

        <script>
                  

        </script>
          
            
            <a class="button" onclick="enviarCadastro()">TEstes</a>
            
            <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <form   method="post">
                        <fieldset class="fieldset">
                          <legend>
                              Processos
                          </legend>
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Numero Processo  
                                      <input type="text" id="txtNumero" placeholder="Numero do processo (sem o ano)">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-2 cell">                                                
                                  <label>Ano Processo  
                                      <input type="text" id="txtAno" placeholder="Digite Ano">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label> &nbsp;
                                      <a class="success button" id="btnConsultarPre" style="width: 100%">Consultar Pré Existência</a>
                                  </label>
                              </div>
                              
                              
                          </div> 
                            
                            
                            <div class="complementoProcesso">                  
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Objeto do Processo  
                                      <input type="text" id="txtObjetoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                          
                            
                             <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Modalidade
                                      <input type="text" id="txtModalidade" placeholder="Modalidade do Processo">
                                  </label>
                              </div>    
                          </div>
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Breve Descrição do Processo  
                                      <textarea id="txtDescricaoProjeto" rows="5" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                          
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Fonte de Recurso
                                      <input type="text" id="txtFonteRecurso" placeholder="Fonte de Recurso">
                                  </label>
                              </div>    
                          </div>
                            
                             <div class="grid-x grid-padding-x">
                                 <div class="small-12 medium-12 large-12 cell">                                                
                                     <label>Previsão Orçamentária
                                         <div class="input-group">
                                             <span class="input-group-label">R$</span>
                                             <input class="input-group-field" id="txtPrevisao" type="text">
                                              
                                         </div>
                                     </label>
                                 </div>    
                          </div>
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Tags (Palavras chaves separadas por ponto e virgula)
                                      <textarea id="txtTag" rows="2" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-6 cell">                                                
                                         <label>Departamento Requerente
                                      <select id="cbDeptoReq">
                                          <option value="0">Selecione</option>
                                          <option value="husker">Departamento de Ensino Escolar (SESE01)</option>
                                          <option value="starbuck">Departamento de Orientações Educacionais e Pedagógicas (SESE02)</option>
                                          <option value="hotdog">Departamento de Controle da Execução Orçamentária da Educação (SESE03)</option>
                                          <option value="apollo">Departamento de Alimentação e Suprimentos da Educação (SESE04)</option>
                                          <option value="apollo">Departamento de Manutenção de Próprios da Educação (SESE05)</option>
                                          <option value="apollo">Departamento de Planejamento e Informática na Educação (SESE06)</option>
                                          <option value="apollo">Departamento de Serviços Gerais da Educação (SESE07)
</option>
                                      </select>
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Data de Abertura do Processo
                                      <input type="date" id="txtDataAbertura" />
                                  </label>
                              </div>
                              
                               
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                      <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%">Clique aqui para solicitar Cadastro e Acesso</button>
                                      
                                      
                                  </label>
                              </div>
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
        
       
       
      
         
      
    $(document).ready(function() 
        { 
            
              
         /*   $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            $('#txtPrevisao').mask('0000.000.000.000.000,00', {reverse: true});
            */
           // $('.complementoProcesso').css('display','none');
        });    
         
         
          
       //   url: "controllerAjax/controllerCadProcessos.php",
       $('#btnConsultarPre').on('click', function (){
       
           
           $.ajax({
                     url: "controllerAjax/controllerCadProcessos.php",
                    method:"POST",
                     data:{consultaProcesso:"1"},
                     dataType:"json",
                       success:function(data)
                        {
                         console.log(data);
                        },
           error: function() {
             alert("Ocorreu um erro ao carregar os dados.");
           }
        });
       
           
       });
       

        
        
         
        
    </script>


</body>
</html>