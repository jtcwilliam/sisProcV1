<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        $objComponentes = new Componentes();
        
             session_start();
        ?> 
  
  <body style="background-color: #1c2c4e; ">
   
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';
      
      
      ?>
              <div class="small medium large reveal" id="modalInformacoes" data-reveal>
                 
                
                 
              </div>
      
        <main style="background-color:#e9eaea;   " >
          <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      
                       <form action="controllerAjax/controllerCadArea.php" method="post">
                      <fieldset class="fieldset">
                          <legend>
                             Cadastrar Divisão
                          </legend>
                           
                          
                          
                           
                          <!-- importa aqui o nome das pessoas com cargo de diretor' -->
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-8 cell">                                                
                                         <label>Departamento
                                      <select id="cbDepartamento">
                                           <?php
                                            $objComponentes->setTabela('departamento');
                                            $objComponentes->comboBox();
                                        ?>
                                      </select>
                                  </label>
                              </div>
                          </div>
                              
                              <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Nome da Divisão
                                      <input type="text" id="txtNomeDaArea" placeholder="Digite o nome da Divisão">
                                  </label>
                              </div>    
                          </div>
                              
                              
                                  
                               
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label> &nbsp;
                                        <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%">Inserir Nova Área</button>
                                      
                                      
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
                
   
        var formData = {
            txtNomeDaArea: $('#txtNomeDaArea').val(),
            cbDepartamento: $('#cbDepartamento').val() 
            
        };

        // process the form
        $.ajax({
            type        : 'POST',  
            url         : 'controllerAjax/controllerCadArea.php', 
            data        : formData, 
            dataType    : 'json', 
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                
               
               
                if(data.retorno == true){
                   $('#modalInformacoes').css("background-color", "#E5FFD2");                               
                    $('#modalInformacoes').css("color", "Black");                                            
                    $('#modalInformacoes').css("font-weight", "bolder");                      
                    $('#modalInformacoes').css("text-align","center");
                    $('#modalInformacoes').html('<h3>Divisão Cadastrada com Sucesso.</h3>   \n\
                            <a type="submit" class="button success"  style="width: 60%; color: white"  href="cadProcessos.php" \n\
                             id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');   
                }
               
              
              
            });

         
        event.preventDefault();
    }); 
        
    </script>


</body>
</html>