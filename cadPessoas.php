<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once './assets/includes/head.php'; 
        ?>
     
     
  
  
  <body style="background-color: #1c2c4e; ">
   
      <?php
        //incluindo o header (semantico)
        include_once './assets/includes/header.php';
      
      
      ?>
      
      <main style="background-color:#e9eaea;   " >
          <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <fieldset class="fieldset">
                          <legend>
                              Cadastrar Pessoas
                          </legend>
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-6 cell">                                                
                                  <label>Nome  
                                      <input type="text" placeholder="Digite seu Nome">
                                  </label>
                              </div>
                              
                              
                          </div> 
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Telefone Celular
                                      <input type="text" id="txtTelefone" placeholder="Digite seu Número">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-9 cell">                                                
                                  <label>Departamento
                                      <select>
                                          <option value="husker">Husker</option>
                                          <option value="starbuck">Starbuck</option>
                                          <option value="hotdog">Hot Dog</option>
                                          <option value="apollo">Apollo</option>
                                      </select>
                                  </label>
                              </div>
                          </div> 
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-6 cell">                                                
                                  <label>Email (este será seu login
                                      <input type="text" placeholder="Digite seu Email">
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Digite sua senha
                                      <input type="text" id="txtTelefone" placeholder="Digite uma senha">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Confirme sua senha
                                      <input type="password" id="txtTelefone" placeholder="Redigite a mesma senha">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                      <a class="button botaoConfirmar" style="width: 100%">Clique aqui para solicitar Cadastro e Acesso</a>
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
      include_once './assets/includes/footer.php';
    ?>

     


<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
<script src="assets/js/jquery.mask.js"></script>


    <script>
       $(document).ready(function() {
                $('#txtCPFPrincipal').mask("000.000.000-00");
                $('#txtTelefone').mask("(00) 00000-0000");
            });
    </script>


</body>
</html>