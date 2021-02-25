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
                              Cadastrar Processos
                          </legend>
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Numero Processo  
                                      <input type="text" id="txtNome" placeholder="Numero do processo (sem o ano)">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-2 cell">                                                
                                  <label>Ano Processo  
                                      <input type="text" id="txtAno" placeholder="Digite Ano">
                                  </label>
                              </div>
                              
                              
                          </div> 
                          
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
                          
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Fonte de Recurso
                                      <input type="text" id="txtFonteRecurso" placeholder="Objeto do Processo">
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