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
              <div class="full reveal" id="modalInformacoes" data-reveal>
                 
                   
                 
              </div>
      
       <main style="background-color:#e9eaea;   " >
          <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <fieldset class="fieldset">
                          <form action="controllerAjax/controllerCadLancamento.php" method="post">
                          <legend>
                               Lançamento
                          </legend>
                            
                          
                          <!-- importa aqui qual departamento pode usar este lançamento -->
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-12 cell">                                                
                                         <label>Departamento Proprietário
                                      <select id="cbDepto">
                                          
                                           
 
                                      </select>
                                  </label>
                              </div>
                              
                              
                              
                                 <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Area (Sua Divisão)
                                      <select id="cbArea"  onclick="$('#txtNomeLancamento').attr('disabled',false)"   class="entradasDados"  >
                                              
                                      </select>
                                  </label>
                              </div>
                               
                              
                              
                              
                              
                              
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Lançamento
                                      <input type="text" id="txtNomeLancamento" disabled="" placeholder="">
                                  </label>
                              </div>    
                           
                          </div> 
                          
                          <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                      <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%">Inserir Novo Lançamento</button>
                                      
                                      
                                  </label>
                              </div>
                          
                          
                      </form>
                          
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
        
        popularCombo('departamento',null, 'cbDepto');
          
        $('#cbDepto').change(function (){    
        
             popularCombo("area"," where idDepartamento="+$('#cbDepto').val(), "cbArea"   );
       
        });
    
    
   
      
      
        $('form').submit(function(event) {
            console.log('dsdsd');
        
          var formData = {
             cbArea: $('#cbArea').val(),
              txtNomeLancamento: $('#txtNomeLancamento').val() 
            
          };
          
          $.ajax({
              type        : 'POST',  
              url         : 'controllerAjax/controllerCadLancamento.php', 
              data        : formData, 
              dataType    : 'json', 
              encode          : true
          })
               
            .done(function(data) 
                {
                    console.log(data);
                
                   if(data.retorno === true){
                   $('#modalInformacoes').css("background-color", "#E5FFD2");                               
                    $('#modalInformacoes').css("color", "Black");                                            
                    $('#modalInformacoes').css("font-weight", "bolder");                      
                    $('#modalInformacoes').css("text-align","center");
                    $('#modalInformacoes').html('<h3>Lançamento Cadastrado com Sucesso.</h3>   \n\
                            <a type="submit" class="button success"  style="width: 60%; color: white"   data-close \n\
                             id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');   
                }
 
                });

               
              event.preventDefault();
          });

      </script>


</body>
</html>