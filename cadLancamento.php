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
                      <fieldset class="fieldset">
                          <legend>
                               Lançamento
                          </legend>
                           
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Lançamento
                                      <input type="text" id="txtNomeLancamento" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                          
                           
                          
                          
                           
                          
                           
                          
                          <!-- importa aqui qual departamento pode usar este lançamento -->
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-8 cell">                                                
                                         <label>Departamento Proprietário
                                      <select id="cbDepto">
                                          <option value="0">Selecione</option>
                                          <option value="DCEOE">James</option>
                                           
</option>
                                      </select>
                                  </label>
                              </div>
                              
                              
                              
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Status
                                      <select id="cbStatus">
                                          <option value="husker">Abertura</option>
                                          <option value="starbuck">Inativo</option>
                                           
</option>
                                      </select>
                                  </label>
                              </div>
                               
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                      <a class="button botaoConfirmar" id="btntCadastrar" style="width: 100%">Clique aqui para solicitar Cadastro e Acesso</a>
                                      
                                      
                                  </label>
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