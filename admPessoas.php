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
         <div class="medium reveal" id="modalInformacoes" data-reveal>
                 
                   
                 
              </div>
      
      
      
      <main style="background-color:#e9eaea;   " >
          
          
      
       
          
          <div class="grid-container">
            
        

            
              
              
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <form action="controllerAjax/controllerCadPessoas.php" method="post">
                           
                          
                          
                          
                          <fieldset class="fieldset"   > 
                              <legend>Gerenciamento de Usuários</legend>
                              <ul class="accordion" data-accordion>
                                  <li class="accordion-item is-active" data-accordion-item>
                                      <!-- Accordion tab title -->
                                      <a href="#" class="accordion-title"><h4>Acessos Solicitados</h4></a>

                                      <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                                      <div class="accordion-content" data-tab-content>
                                          <table class="hover">
                                              
                                              
                                              <thead>
                                                  <tr>
                                                      <th   width="600"   style="font-size: 22px" >Nome Usuario</th>
                                                        <th colspan="6"   style="font-size: 22px" width="100" >Gestão de Perfil</th>
                                                         
                                                  </tr>
                                              </thead>
                                              <thead>
                                                  <tr>
                                                        <th    width="500"> </th>
                                                         
                                                        <th class="headTabelaAdm"  style="font-size: 12px" width="100" >Distribuidor</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100" >Técnico</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100"  >Diretor</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100"  >Gabinete</th>
                                                        <th class="headTabelaAdm"  style="font-size: 12px" width="100"  >Excluir</th>
                                                  </tr>
                                              </thead>
                                              <tbody  id="testes">
                                                  
                                                  
                                                     
                                                    
                                                    
                                                  
                                                    
                                                   
                                              </tbody>
                                          </table>
                                      </div>
                                  </li>



                                  <li class="accordion-item " data-accordion-item>
                                      <!-- Accordion tab title -->
                                      <a href="#" class="accordion-title"><h4>Usuários já Cadastrados</h4></a>

                                      <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                                      <div class="accordion-content" data-tab-content>
                                         <table class="hover">
                                              <thead>
                                                  <tr>
                                                        <th    width="400"> </th>
                                                         <th class="headTabelaAdm"  style="font-size: 12px; text-align: justify " width="200" >Perfil atual</th>
                                                        <th class="headTabelaAdm"  style="font-size: 12px" width="100" >Distribuidor</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100" >Técnico</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100"  >Diretor</th>
                                                        <th class="headTabelaAdm" style="font-size: 12px" width="100"  >Gabinete</th>
                                                        <th class="headTabelaAdm"  style="font-size: 12px" width="100"  >Excluir</th>
                                                  </tr>
                                              </thead>
                                              <tbody  id="usuariosJaComPerfil">
                                                  
                                                  
                                            
                                                     
                                                    
                                                    
                                                  
                                                    
                                                   
                                              </tbody>
                                          </table>
                                      </div>
                                  </li>




                                  <!-- ... -->
                              </ul>




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
        
        function alterarPerfil(status, perfil, idPessoas){        
        try 
            {
                $.ajax({
                    type: "POST",
                    url:  'controllerAjax/controllerCadPessoas.php', //
                    dataType:"html",
                        data:{  
                                alterarInserirPessoa:'1',
                                status: status,
                                perfil:perfil,
                                idPessoas:  idPessoas,
                              
                                pesquisaPessoasParaAdm:'1'
                            },
                        success: function(data,status,xhr)
                            {                                     
                                
                                console.log(data);
                                
                                  pesquisarUsuarios('1,2,3,4,5', 'usuariosJaComPerfil',1);
                                  pesquisarUsuarios('0', 'testes',0);
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
        
        
        
        
        
        
          
       function pesquisarUsuarios(filtro, idTabela, validar){        
        try 
            {
                $.ajax({
                    type: "POST",
                    url:  'controllerAjax/controllerCadPessoas.php', //
                    dataType:"html",
                        data:{  
                                filtro:filtro,
                                validar: validar,
                              
                                pesquisaPessoasParaAdm:'1'
                            },
                        success: function(data,status,xhr)
                            {     
                                
                                
                                console.log(data);
                                  
                                  $('#'+idTabela).html(data);                                 
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
      
    
    $( document ).ready(function() 
        {
            $('#mensagemSucesso').hide();
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtRamal').mask("(00) 0000-0000");
             $('#txtCelular').mask("(00) 00000-0000");
            console.log( "ready!" );

            //popular combo departamento
            popularCombo('departamento',null, 'cbDepto');

            //popular campo status
            popularCombo('status','where idstatus=0', 'cbStatus');
            
            
            pesquisarUsuarios('0', 'testes', 0);
            
             pesquisarUsuarios('1,2,3,4,5', 'usuariosJaComPerfil',1);
        }); 
        
    </script>


</body>
</html>