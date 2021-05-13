<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
      
        include_once 'includes/head.php'; 
          include_once './classes/componentes.php';
        $objComponentes = new Componentes();
        
        
      
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
                          <fieldset class="fieldset" id="inicial">
                          <legend>
                              Cadastrar Pessoas
                          </legend>
                          <div class="grid-x grid-padding-x">
                                                                     
                              <div class="small-12 medium-12 large-7 cell" id="grupoNome">                                                
                                  <label>Nome  
                                      <input type="text" id="txtNome"  required="" class="entradasDados"  placeholder="Digite seu Nome">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Código Funcional
                                      <input type="number" id="txtFuncional"  required="" class="entradasDados" maxlength="6"    placeholder="Digite seu Código Funcional">
                                  </label>
                              </div>
                              
                              
                        <!-- relaciona com a tabela perfil -->
                              
                          
                        <!-- relaciona com a tabela status -->
                              
                              
                              
                          </div> 
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Telefone/Ramal  
                                      <input type="text" id="txtRamal" required=""  class="entradasDados"    placeholder="Digite seu Número">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>  Celular (opcional)
                                      <input type="text" id="txtCelular"   class="entradasDados"    placeholder="Digite seu Número">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Status
                                      <select id="cbStatus"   required=""  class="entradasDados"   >
                                          
                                          
                                          
                                         
                                      </select>

                                  </label>
                              </div>
                              
                               </div> 
                          
                          <div class="grid-x grid-padding-x">
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Departamento
                                      <select id="cbDepto" required="" class="entradasDados"  >
                                         
                                      </select>
                                  </label>
                              </div>
                              
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Area (Sua Divisão)
                                      <select id="cbArea"  required=""    class="entradasDados"  >
                                              
                                      </select>
                                  </label>
                              </div>
                          </div> 
                          
                          
                          
                          <div class="grid-x grid-padding-x">
                              
                              
                              
                              <div class="small-12 medium-12 large-4 cell">                                                
                                  <label>Email (este será seu login)
                                      <input type="text" id="txtEmail" required=""  class="entradasDados"    placeholder="Digite seu Email">
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Digite sua senha
                                      <input type="password" id="txtSenha"  required=""  class="entradasDados"    placeholder="Digite uma senha">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Confirme sua senha
                                      <input type="password" id="txtConfirmaSenha" required=""  class="entradasDados"    placeholder="Redigite a mesma senha">
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
                          
                          
                          
                          <fieldset class="fieldset"  id="mensagemSucesso" style="background-color: #0078AB"> 

                            

                                 <div class="grid-x grid-padding-x" style="color: whitesmoke; font-size: x-large ; text-align: center ">
                              
                              
                                  
                                
                                     <div class="small-12 medium-12 large-12 cell"  >    <center>  <h3 style="font-weight: bold">Obrigado por sua Inscrição</h3></center>
                                  Vamos validar seu acesso e te convidar para o treinamento da ferramenta. Sua participação é muito importante para nós.
                                  Abraços. Secretaria de Educação - Prefeitura de Guarulhos.        <br> &nbsp;  <br>
                                  <a class="button success"  style="background-color: #01061f; color: #ffffff; width: 100%" href="index.php">Voltar</a>
                                  
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
    $('form').submit(function(event) {
      
        var formData = {
            verificarVazio: '1',
            txtNome: $('#txtNome').val(),
            cbPerfil: $('#cbPerfil').val(),
            cbStatus: $('#cbStatus').val(),
            txtRamal: $('#txtRamal').val(), 
            txtFuncional: $('#txtFuncional').val(), 
            txtCelular: $('#txtCelular').val(), 
            cbArea: $('#cbArea').val(),
            txtEmail: $('#txtEmail').val(),
            txtSenha: $('#txtSenha').val(),
            txtConfirmaSenha: $('#txtConfirmaSenha').val()
        };

        // process the form
        $.ajax({
            type        : 'POST',  
            url         : 'controllerAjax/controllerCadPessoas.php', 
            data        : formData,  
            dataType    : 'json', 
            encode          : true
        })
          
            .done(function(data) {                 

if(data.retorno === true)
            {
                $('#inicial').hide();
                $('#mensagemSucesso').show();
            }
               if(data.retorno == 'erroSenhas')
               {
                    $('#modalInformacoes').css("color", "white");                                            
                            $('#modalInformacoes').css("font-stretch", "ultra-condensed");                      
                            $('#modalInformacoes').css("text-align","center");
                            $('#modalInformacoes').html('<h1>Atenção</h1><h5>As senhas não conferem</h5>  \n\
                                    <a type="submit" class="button botaoConfirmar"     \n\
                                         onclick="zerarTela()" \n\  id="btntCadastrar" style="width: 100%">Clique aqui para fechar (Obrigatório)</a>').foundation('open');  
                    }            
            });
        
        event.preventDefault();
    }); 
    
    
    
    
    
    
    $('#cbDepto').change(function (){    
        
        popularCombo("area"," where idDepartamento="+$('#cbDepto').val(), "cbArea"   );
       
    });
    
    
      $( document ).ready(function() 
        {
            $('#mensagemSucesso').hide();
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtRamal').mask("(00) 0000-0000 Ramal 0000");
             $('#txtCelular').mask("(00) 00000-0000");
            console.log( "ready!" );
            
            //popular combo departamento
            popularCombo('departamento',null, 'cbDepto');
            
            //popular campo status
            popularCombo('status','where idstatus=0', 'cbStatus');
        }); 
        
    </script>


</body>
</html>