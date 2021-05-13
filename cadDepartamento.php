<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php'; 
             session_start();
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
                      
                       <form action="controllerAjax/controllerDepartamento.php" method="post">
                      <fieldset class="fieldset">
                          <legend>
                              Departamento
                          </legend>
                           
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Nome do Departamento
                                      <input type="text" id="txtObjetoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                           
                          <!-- importa aqui o nome das pessoas com cargo de diretor' -->
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-8 cell">                                                
                                         <label>Responsável Pelo Departamento
                                      <select id="cbDeptoReq">
                                          <option value="0">Selecione</option>
                                          <option value="1">Patrão</option>
                                           
</option>
                                      </select>
                                  </label>
                              </div>
                              
                              
                              
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Status
                                      <select id="cbStatus">
                                          <option value="0">Selecione</option>
                                          <option value="1">Ativo</option>
                                          <option value="2">Inativo</option>
                                           
</option>
                                      </select>
                                  </label>
                              </div>
                               
                              
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
            
            console.log( "ready!" );
        });    
            $('form').submit(function(event) {
                
  
                
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            txtObjetoProcesso: $('#txtObjetoProcesso').val(),
            cbDeptoReq: $('#cbDeptoReq').val(),
            cbStatus: $('#cbStatus').val()
            
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'controllerAjax/controllerDepartamento.php', // the url where we want to POST
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
                        
                        
  
       
 
            // handle errors for name ---------------
            if (data.error.txtObjetoProcesso) {
                    $('#txtObjetoProcesso').css("background-color", "yellow");
                    
              //      $('#retornoErros').addClass('has-error');
              //      $('#retornoErros').append('<div class="help-block">' + data.error.nome + '</div>'); 
            }
             
            if (data.error.cbDeptoReq) {
                    $('#cbDeptoReq').css("background-color", "yellow");
                    
          //          $('#retornoErros').addClass('has-error');
         //           $('#retornoErros').append('<div class="help-block">' + data.error.status + '</div>'); 
            }
            
             if (data.error.cbStatus) {
                    $('#cbStatus').css("background-color", "yellow");
                    
            //        $('#retornoErros').addClass('has-error');
            //        $('#retornoErros').append('<div class="help-block">' + data.error.Perfil + '</div>'); 
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