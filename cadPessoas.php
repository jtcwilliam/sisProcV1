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
          
          
      
       
          
          <div class="grid-container">
            
        

            
              
              
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <form action="controllerAjax/controllerCadPessoas.php" method="post">
                      <fieldset class="fieldset">
                          <legend>
                              Cadastrar Pessoas
                          </legend>
                          <div class="grid-x grid-padding-x">
                                                                     
                              <div class="small-12 medium-12 large-6 cell" id="grupoNome">                                                
                                  <label>Nome  
                                      <input type="text" id="txtNome"  class="entradaDados"  placeholder="Digite seu Nome">
                                  </label>
                              </div>
                              
                              
                        <!-- relaciona com a tabela perfil -->
                             <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Perfil / Cargo  
                                      <select id="cbPerfil"   class="entradaDados"   >
                                          <option value="0">Selecione</option>
                                          <option value="1">Departamento de Ensino Escolar (SESE01)</option>
                                           
</option>
                                      </select>
                                  </label>
                          </div> 
                          
                        <!-- relaciona com a tabela status -->
                              <div class="small-12 medium-12 large-2 cell">                                                
                                  <label>Status
                                      <select id="cbStatus"  class="entradaDados"   >
                                           <option value="0">Selecione</option>
                                          <option value="1">Ativo</option>
                                          <option value="2">Inativo</option>
                                           
                                      </select>

                                  </label>
                              </div>
                              
                              
                          </div> 
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Ramal / Celular 
                                      <input type="text" id="txtTelefone"  class="entradaDados"    placeholder="Digite seu Número">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-9 cell">                                                
                                  <label>Departamento
                                      <select id="cbDepto" class="entradaDados"  >
                                           <option value="0">Selecione</option>
                                                  <option value="1">Departamento de Ensino Escolar (SESE01)</option>
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
                          </div> 
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-6 cell">                                                
                                  <label>Email (este será seu login)
                                      <input type="text" id="txtEmail"  class="entradaDados"    placeholder="Digite seu Email">
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Digite sua senha
                                      <input type="text" id="txtSenha"  class="entradaDados"    placeholder="Digite uma senha">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Confirme sua senha
                                      <input type="password" id="txtConfirmaSenha"  class="entradaDados"    placeholder="Redigite a mesma senha">
                                  </label>
                              </div>
                              
                              
                              <div class="small-12 medium-12 large-12 cell"   >                                                
                                  <div id="retornoErros" style="">
                                      
                                      
                                      
                                  </div>
                              </div>
                              <br>
                              &nbsp;
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                      <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%">Clique aqui para solicitar Cadastro e Acesso</button>
                                      
                                      
                                  </label>
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
        
          
      
    $( document ).ready(function() 
        {
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            console.log( "ready!" );
        });    
            $('form').submit(function(event) {
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
           txtNome: $('#txtNome').val(),
            cbPerfil: $('#cbPerfil').val(),
            cbStatus: $('#cbStatus').val(),
            txtTelefone: $('#txtTelefone').val(), 
            cbDepto: $('#cbDepto').val(),
            txtEmail: $('#txtEmail').val(),
            txtSenha: $('#txtSenha').val(),
            txtConfirmaSenha: $('#txtConfirmaSenha').val(),
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'controllerAjax/controllerCadPessoas.php', // the url where we want to POST
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

 
            // handle errors for name ---------------
            if (data.error.nome) {
                    $('#txtNome').css("background-color", "yellow");
                    
              //      $('#retornoErros').addClass('has-error');
              //      $('#retornoErros').append('<div class="help-block">' + data.error.nome + '</div>'); 
            }
            
            
            if (data.error.status) {
                    $('#cbStatus').css("background-color", "yellow");
                    
          //          $('#retornoErros').addClass('has-error');
         //           $('#retornoErros').append('<div class="help-block">' + data.error.status + '</div>'); 
            }
            
             if (data.error.Perfil) {
                    $('#cbPerfil').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.Perfil + '</div>'); 
            }
            
             if (data.error.Departamento) {
                    $('#cbDepto').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
             //       $('#retornoErros').append('<div class="help-block">' + data.error.Departamento + '</div>'); 
            }
            
            if (data.error.email) {
                    $('#txtEmail').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.email + '</div>'); 
            }
            
            if (data.error.Departamento) {
                    $('#cbDepto').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.Departamento + '</div>'); 
            }
            
             if (data.error.telefone) {
                    $('#txtTelefone').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.telefone + '</div>'); 
            }
            
            if (data.error.telefone) {
                    $('#txtTelefone').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.telefone + '</div>'); 
            }
            
            if (data.error.senha) {
                    $('#txtSenha').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.senha + '</div>'); 
            }
            
            if (data.error.confirmaSenha) {
                    $('#txtConfirmaSenha').css("background-color", "yellow");
                    
             //       $('#retornoErros').addClass('has-error');
             //       $('#retornoErros').append('<div class="help-block">' + data.error.confirmaSenha + '</div>'); 
            }
             
        } else {
          // ALL GOOD! just show the success message!
          $('form').html('<div class="alert alert-success">' + data.message + '</div>');
        } 
                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    }); 
        
    </script>


</body>
</html>