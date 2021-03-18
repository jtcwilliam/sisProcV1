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
          
             

        <div class="reveal" id="modalLoading" data-reveal>
            <center>  <h1>Aguarde por favor</h1>
            <img src="img/loading.gif" /> </center>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
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
                                      <input type="number" id="txtNumero" placeholder="Numero do processo (sem o ano)">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-2 cell">                                                
                                  <label>Ano Processo  
                                      <input type="number" id="txtAno" maxlength="4" placeholder="Digite Ano">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label> &nbsp;
                                      <a class="success button" id="btnConsultarPre" style="width: 100%">Consultar Pré Existência</a>
                                       
                                      
                                  </label>
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
                                  <label>Breve Descrição do Processo  
                                      <textarea id="txtDescricaoProjeto" rows="5" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                          
                       <!-- criar a tabela fonte de recurso -->
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-4 cell">        
                                 <label>Modalidade
                                  <select id="txtFonteRecurso">
                                          <option value="0">Selecione</option>
                                          <option value="1">Tesouro Municipal</option>
                                          <option value="2">Fundeb</option>
                                          <option value="3">Financiamento Privado</option>

                                          </option>
                                      </select>
                                 </label>
                              </div>    
                           
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                     <label>Previsão Orçamentária
                                         <div class="input-group">
                                             <span class="input-group-label">R$</span>
                                             <input class="input-group-field" id="txtPrevisao" type="text">
                                              
                                         </div>
                                     </label>
                                 </div>
                                 
                                 
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                     <label>Modalidade
                                         <select id="txtModalidade">
                                             <option value="0">Selecione</option>
                                             <option value="1">Inexibilidade</option>
                                             <option value="2">Dispensa de Licitação</option>

                                             </option>
                                         </select>
                                     </label>
                                 </div> 
                          </div>
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Tags (Palavras chaves separadas por ponto e virgula)
                                      <input id="txtTag" class="input-group-field"  type="text" >
                                  </label>
                              </div>    
                          </div>
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-6 cell">                                                
                                  <label>Departamento Requerente
                                      <select id="cbDeptoReq">
                                          <option value="0">Selecione</option>
                                          <option value="1">Departamento de Ensino Escolar (SESE01)</option>
                                          <option value="2">Departamento de Orientações Educacionais e Pedagógicas (SESE02)</option>

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
             
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            $('#txtPrevisao').mask('0000.000.000.000.000,00', {reverse: true});             
      
         
         
         //botão para consultar se existe processo pré cadastrado
       $('#btnConsultarPre').on('click', function ()
            {        
                
                var  txtNumero = $('#txtNumero').val();
                var txtAno = $('#txtAno').val();
                
                $('#txtNumero').attr('disabled', true);
                  $('#txtAno').attr('disabled', true);
                
              
                
                if(txtNumero=== "" || txtAno === "" ){
                   $('#modalInformacoes').css("background-color", "#1c2c4e");                               
                                            $('#modalInformacoes').css("color", "white");                                            
                                            $('#modalInformacoes').css("font-weight", "bolder");                      
                                            $('#modalInformacoes').css("text-align","center");
                                            $('#modalInformacoes').html('<h1>Atenção</h1><h5>Digite o número e ano do Processo</h5>  \n\
                                                    <a type="submit" class="button botaoConfirmar"     href="cadProcessos.php"  \n\
                                                     id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');  
                }else {
                
                $(this).css('display','none');
                $('#loading').css('display','block');
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerCadProcessos.php",
                            dataType:"json",
                                data:{consultaProcesso:"1",
                                       txtNumero:txtNumero,
                                        txtAno:txtAno
                                    },
                                success: function(data,status,xhr)
                                    {                
                                        
                                        console.log(data[0].valor);
                                 //se não encontrar processo,retorna false e abre os campos para cadastro
                                    if(data[0].resultado === false)
                                        {
                                            $('#loading').css('display','none');
                                            $('.complementoProcesso').css('display','block');
                                        }
                                    else
                                        {                                    
                                            $('#loading').css('display','none');                                                                                
                                            $('#modalInformacoes').css("background-color", "#1b1717");                               
                                            $('#modalInformacoes').css("color", "white");                                            
                                            $('#modalInformacoes').css("font-weight", "bolder");                      
                                            $('#modalInformacoes').css("text-align","center");
                                            $('#modalInformacoes').html('<h1>Atenção</h1><h5>Este Processo já consta em nossa base de dados</h5> <br> Objeto do Processo: <h3> '+ data[0].valor.objetoProcessos +'</h3>  \n\
                                                    <a type="submit" class="button botaoConfirmar"     href="cadProcessos.php"  \n\
                                                     id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');  
                                            $('#btnConsultarPre').css('display','block');
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
                     }
                 }
            });    
            
            
            
            
         
             $('form').submit(function(event) {
                 
        
        //modalLoading
        $('#modalLoading').foundation('open');

        
        var formData = {
          
            txtNumero: $('#txtNumero').val(),
            txtModalidade: $('#txtModalidade').val(),
            txtAno: $('#txtAno').val(),
            txtObjetoProcesso: $('#txtObjetoProcesso').val(),
            txtDescricaoProjeto: $('#txtDescricaoProjeto').val(),
            txtFonteRecurso: $('#txtFonteRecurso').val(),
            txtTag: $('#txtTag').val(),
            cbDeptoReq: $('#cbDeptoReq').val(),
            txtDataAbertura: $('#txtDataAbertura').val(),
            txtPrevisao: $('#txtPrevisao').val()
        };
        
      
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)           
            url         : 'controllerAjax/controllerCadProcessos.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                
               
                // log data to the console so we can see
                console.log(data);
                
                  if ( ! data.success) {
                      $('#modalInformacoes').css("background-color", "#1c2c4e"); 
                              
                              $('#modalInformacoes').css("color", "white");
                      
                      $('#modalInformacoes').css("font-weight", "bolder");
                      
                      $('#modalInformacoes').css("text-align","center");
                       
                       
                      
                        $('#modalInformacoes').html('<h1>Atenção</h1><h5>Existem campos sem informação! Favor observar os campos em amarelo</h5>  <button type="submit" class="button botaoConfirmar"    data-close aria-label="Close reveal"  id="btntCadastrar" style="width: 100%">fechar</button>').foundation('open');
                        
                        





//substituir o trecho, por um que escreva a mensagem.. 'campos em amarelo estão vazios, favor preencher corretamente'

 
            if (data.error.txtNumero) {
                    $('#txtNumero').css("background-color", "yellow");
             }

 
            if (data.error.txtAno) {
                    $('#txtAno').css("background-color", "yellow");
             }
 
             if (data.error.txtObjetoProcesso) {
                    $('#txtObjetoProcesso').css("background-color", "yellow");
             }

             
             if (data.error.txtDescricaoProjeto) {
                    $('#txtDescricaoProjeto').css("background-color", "yellow");
             }

             
 
            if (data.error.txtFonteRecurso) {
                    $('#txtFonteRecurso').css("background-color", "yellow");
             }

           
            if (data.error.txtTag) {
                    $('#txtTag').css("background-color", "yellow");
            }
            
            if (data.error.txtModalidade) {
                    $('#txtModalidade').css("background-color", "yellow");
            }

           
             if (data.error.cbDeptoReq) {
                    $('#cbDeptoReq').css("background-color", "yellow");
            }

             
            if (data.error.txtDataAbertura) {
                    $('#txtDataAbertura').css("background-color", "yellow");
            }

 

        } else {
          // ALL GOOD! just show the success message!
           console.log(data.success);
           
           
           if(data.success === true){
                $('#modalInformacoes').css("background-color", "#E5FFD2");                               
                    $('#modalInformacoes').css("color", "Black");                                            
                    $('#modalInformacoes').css("font-weight", "bolder");                      
                    $('#modalInformacoes').css("text-align","center");
                    $('#modalInformacoes').html('<h1>Que Ótimo.</h1><h5>O Processo <b>'+$('#txtNumero').val()+'/'+$('#txtAno').val()+'</b> foi Cadastrado Com Sucesso</h5>  \n\
                            <a type="submit" class="button success"  style="width: 60%; color: white"  href="cadProcessos.php" \n\
                             id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');   
            }
        } 
                // here we will handle errors and validation messages
            });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });  
            //cadastro do processo
               $('#btnConsultarPre').click(function(event) {
             
             
             console.log('teste');
             
             
              var formData = {
                  consultaProcesso:'1',
            txtNumero: $('#txtNumero').val(),
            txtAno: $('#txtAno').val(),
            txtObjetoProcesso: $('#txtObjetoProcesso').val(),
            txtDescricaoProjeto: $('#txtDescricaoProjeto').val(),
            txtFonteRecurso: $('#txtFonteRecurso').val(),
            txtModalidade: $('#txtModalidade').val(),
            txtTag: $('#txtTag').val(),
            cbDeptoReq: $('#cbDeptoReq').val(),
            txtDataAbertura: $('#txtDataAbertura').val(),
            txtPrevisao: $('#txtPrevisao').val()
              
        };

        // process the form
        $.ajax({  
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'controllerAjax/controllerCadProcessos.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                
             console.log('teste');
                console.log(data.numeroProcesso);
             
              
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
             
    }); 
    
    
   
         $('.complementoProcesso').css('display','none');
    
    });   
            
    </script>


</body>
</html>