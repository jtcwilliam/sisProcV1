  <!doctype html>
<html lang=”pt-br”>

    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        $objComponentes = new Componentes();
        
        session_start();
        
        ?> 
  
  <body style="background-color: #1c2c4e;  ">
   
      
      
      
    
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';
      
      
      ?>
              <div class="small reveal" id="modalInformacoes" data-reveal>
                 
                   
                 
              </div>
      
      <main style="background-color:#e9eaea; display: none   " id="conteudo" >

    
          
             

        <div class="reveal" id="modalLoading" data-reveal>
            <center>  <h1>Aguarde por favor</h1>
            <img src="img/loading.gif" /> </center>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <?php 
        
           
                
              
        ?>
            <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell">
                      <form   method="post">
                        <fieldset class="fieldset">
                          <legend>
                              Processos
                          </legend>
                          <div class="grid-x grid-padding-x ">
                             <div class="small-12 medium-12 large-3 cell caixa">                                                
                                  <label>Numero Processo  
                                      <input type="number" required=""   class="camposPreConsulta" id="txtNumero" placeholder="Numero do processo (sem o ano)">
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-2 cell caixa" >                                                
                                  <label>Ano Processo  
                                      <input type="number" required="" class="camposPreConsulta" id="txtAno" maxlength="4" placeholder="Digite Ano">
                                  </label>
                              </div>
                              
                              
                              
                              
                              <div class="small-12 medium-12 large-3 cell caixa" id="cancelarCadastro"  >                                                
                                  <label>&nbsp;
                                      <a class="warning button"  required="" href="cadProcessos.php" style="width: 100%">Cancelar Cadastro</a>
                                  </label>
                              </div>
                              
                              <div class="small-12 medium-12 large-3 cell caixa">                                                
                                  <label> &nbsp;
                                      <a class="success button" required="" id="btnConsultarPre" style="width: 100%">Consultar Pré Existência</a>
                                       
                                      
                                  </label>
                              </div>
                              
                              
                              
                          </div> 
                            
                            <div class="grid-x grid-padding-x" >
                                <div class="auto cell">     
                                </div>

                                <div class="small-12 medium-12 large-4 cell">                                 
                                    <img src="img/loading.gif" required=""  id="loading"  style="display: none" style="width: 100%" >
                                </div>
                                <div class="auto cell">     
                                </div>
                            </div>
                            
                            
                            <div class="complementoProcesso">                  
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Objeto do Processo  
                                      <input type="text" required=""  class="entradasDados "   id="txtObjetoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                          </div>
                          
                            
                              
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Breve Descrição do Processo  
                                      <textarea id="txtDescricaoProjeto" required=""  class="entradasDados "  rows="5" maxlength="160"></textarea>
                                  </label>
                              </div>    
                          </div>
                          
                       <!-- criar a tabela fonte de recurso -->
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-5 cell">        
                                 <label>Fonte de Recursos
                                  <select id="txtFonteRecurso" class="entradasDados " >
                                        <?php
                                            $objComponentes->setTabela('fonterecursos');
                                            $objComponentes->comboBox();
                                        ?>
                                           

                                          </option>
                                      </select>
                                 </label>
                              </div>    
                           
                                 <div class="small-12 medium-12 large-3 cell">                                                
                                     <label>Previsão Orçamentária
                                         <div class="input-group">
                                             <span class="input-group-label">R$</span>
                                             <input class=" input-group-field entradasDados "   id="txtPrevisao"     type="text">
                                              
                                         </div>
                                     </label>
                                 </div>
                                 
                                 
                                 <div class="small-12 medium-12 large-4 cell">                                                
                                     <label>Modalidade
                                         <select id="txtModalidade"  >
                                             <?php
                                            $objComponentes->setTabela('modalidade');
                                            $objComponentes->comboBox();
                                        ?>
                                         </select>
                                     </label>
                                 </div> 
                          </div>
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-9 cell">                                                
                                  <label>Tags (Palavras chaves separadas por ponto e virgula)
                                      <input id="txtTag" class="entradasDados"  required="" type="text" >
                                  </label>
                              </div>    
                         
                       
                       <div class="small-12 medium-12 large-3 cell  " >   
                                   <label>Prioridade
                                 <select id="txtPrioridade" class="entradasDados " >
                                    
                                        <?php
                                            $objComponentes->setTabela('prioridade');
                                            $objComponentes->comboBox();
                                        ?>
                                           

                                          </option>
                                      </select>
                                   </label>
                                  
                              </div>
                               </div>
                         
                          
                          
                          <div class="grid-x grid-padding-x">
                              <div class="small-12 medium-12 large-7 cell">                                                
                                  <label>Departamento Requerente
                                      <select id="cbDeptoReq"  required="" class="entradasDados">
                                          <option> </option>
                                           <?php
                                            $objComponentes->setTabela('departamento');
                                            $objComponentes->comboBox();
                                        ?>
                                      </select>
                                  </label>
                              </div>
                             <div class="small-12 medium-12 large-3 cell">                                                
                                  <label>Data de Abertura do Processo
                                      <input type="date" id="txtDataAbertura" required="" class="entradasDados" />
                                  </label>
                              </div>
                              
                               
                              
                              <div class="small-12 medium-12 large-2 cell">                                                
                                  <label> &nbsp;
                                      <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%">Autuar</button>
                                      
                                      
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
                
                $('.camposPreConsulta').attr('disabled', true);
                $('.camposPreConsulta').attr('disabled', true);
                
                
                
                
                $('#cancelarCadastro').css('display', 'block');
                
              
                
                if(txtNumero=== "" || txtAno === "" )
                    {
                            $('#modalInformacoes').css("background-color", "black");       
                             
                            $('#modalInformacoes').css("border", "black");     
                             
                             
                            $('#conteudo').css('display','none');
                            $('#modalInformacoes').css("color", "white");                                            
                            $('#modalInformacoes').css("font-stretch", "ultra-condensed");                      
                            $('#modalInformacoes').css("text-align","center");
                            $('#modalInformacoes').html('<h1>Atenção</h1><h5>Digite o número e ano do Processo</h5>  \n\
                                    <a type="submit" class="button botaoConfirmar"     \n\
                                         onclick="zerarTela()" \n\  id="btntCadastrar" style="width: 100%">Clique aqui para fechar (Obrigatório)</a>').foundation('open');  
                    }
                else {
                
                $(this).css('display','none');
                $('#loading').css('display','block');
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerCadProcessos.php",
                            dataType:"json",
                                data:{acaoProcesso:"consulta",
                                       txtNumero:txtNumero,
                                        txtAno:txtAno
                                    },
                                success: function(data,status,xhr)
                                    {                
                                        console.log(data);
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
                                                    <a type="submit" class="button botaoConfirmar"  onclick="zerarTela()"     \n\
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
 
       
        
        var formData = {
            acaoProcesso:"inserir",
            txtNumero: $('#txtNumero').val(),
            txtModalidade: $('#txtModalidade').val(),
            txtAno: $('#txtAno').val(),
            txtObjetoProcesso: $('#txtObjetoProcesso').val(),
            txtDescricaoProjeto: $('#txtDescricaoProjeto').val(),
            txtFonteRecurso: $('#txtFonteRecurso').val(),
            txtTag: $('#txtTag').val(),
            cbDeptoReq: $('#cbDeptoReq').val(),
            txtDataAbertura: $('#txtDataAbertura').val(),
            txtPrevisao: $('#txtPrevisao').val(),
            prioridade: $('#txtPrioridade').val()
            
        };
        
      
       
        $.ajax({
            type        : 'POST', 
            url         : 'controllerAjax/controllerCadProcessos.php', 
            data        : formData,  
            dataType    : 'json', 
            encode          : true
        })
           
            .done(function(data) { 
                   
                   console.log(data);
        
        if(data.retorno === true){
               
               
               $('#modalInformacoes').removeClass('small reveal').addClass('full reveal');

               
               
                $('#modalInformacoes').css("background-color", "#E5FFD2");                               
                    $('#modalInformacoes').css("color", "Black");                                            
                    $('#modalInformacoes').css("font-weight", "bolder");                      
                    $('#modalInformacoes').css("text-align","center");
                    $('#modalInformacoes').html('<h1>Ótimo.</h1><h5>O Processo <b>'+$('#txtNumero').val()+'/'+$('#txtAno').val()+'</b> foi Cadastrado Com Sucesso</h5>  \n\
                            <a type="submit" class="button success"  style="width: 60%; color: white"  href="cadProcessos.php" \n\
                             id="btntCadastrar" style="width: 100%">fechar</a>').foundation('open');   
            }
                
            });
        
        event.preventDefault();
    });  
          
    
    $('#cancelarCadastro').css('display','none');
   
   
   
         $('.complementoProcesso').css('display','none');
         
  
         $('#conteudo').css('display','block');
         
        
    
    }); 
    
    

    </script>


    
</body>
</html>