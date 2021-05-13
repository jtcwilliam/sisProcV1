<!DOCTYPE html>
 <?php
  
 include_once 'verificaAcesso.php';
 
 
  ?>
  
<html class="no-js" lang="pt-BR">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        include_once './classes/componentes.php';
        $objComponentes = new Componentes();
       
 
  

   
        ?> 
  
  <body style="background-color: #1c2c4e;  ">    
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';            
      ?>
              <div class="small medium large reveal" id="modalInformacoes" data-reveal>                                                      
                     
                 
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
              <div class="grid-x grid-padding-x"  style="  padding-top: 0em; padding-bottom: 1em">
                  <div class="small-12 medium-12 large-12 cell">
                      
                      
                      
                      
                      
                        <fieldset class="fieldset">
                          <legend>
                             O Processo
                          </legend>
                            
                            
                            <div class="grid-x grid-padding-x" >
                                
                                <div class="small-12 medium-7 large-5 cell">
                                    <label> Digite o número do processo que deseja distribuir

                                        
                                        <?php
                                        
                                        
                                            if(isset($_GET['numero']))
                                            {
                                                ?>
                                        
                                        <input type="text" id="txtNumeroProcesso"  value="<?=$_GET['numero'].'/'.$_GET['ano']?>"  />
                                        
                                                <?php
                                            }else
                                            {?>
                                               
                                                    <input type="text" id="txtNumeroProcesso" placeholder="Digite o Número do Processo"/>
                                    <?php
                                            }
                                        
                                        ?>
                                    </label>
                                </div>
                                
                                <div class="small-12 medium-2 large-3 cell">
                                 <label> &nbsp;
                                     <a class="expanded button" required="" id="btnConsultarPre" onclick="carregarSinteseProcesso($('#txtNumeroProcesso').val())"   style="width: 100%">Procurar</a>
                                       
                                      
                                  </label>
                                </div>
                                
                             
                                <div class="small-12 medium-12 large-12 cell dadosDestino"  >                                                
                                  <label>Objeto do Processo  
                                      <input type="text"  class="entradasDados "   id="txtObjetoProcesso" placeholder="Objeto do Processo">
                                  </label>
                              </div>    
                                
                            </div>
                        </fieldset>
                      
                      
                      
                      <fieldset class="fieldset dadosDestino"    >
                          <legend>
                            Departamento de Destino
                          </legend>
                                
                             <div class="grid-x grid-padding-x" >
                                  <div class="small-12 medium-12 large-12 cell">     
                                 <div id="divNavegaDepto">

                                 </div>
                                  </div>

                             
                           
                                
                                
                                <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Área (Divisão) de Destino
                                      <select id="cbArea" style="font-stretch: condensed"  required=""      >
                                              
                                      </select>
                                  </label>
                              </div>
                                 
                                 
                                 
                                 <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Recomendação, encaminhamento ou justificativa
                                      <textarea id="txtRecomendacao" rows="6" maxlength="300" ></textarea>
                                  </label>
                              </div>
                                 
                                 <div class="small-12 medium-2 large-12 cell">
                                 <label> &nbsp;
                                     <a class="button  expanded" required="" id="enviarProcesso" onclick="  "   style="width: 100%">Enviar o processo </a>
                                       
                                      
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
    
        function montaAbaDepto()
     {   
        try 
            {
                $.ajax({
                    type: "POST",
                    url: "controllerAjax/controllerDepartamento.php",
                    dataType:"html",
                        data:{tipoConsultaDepto:"consultarAbasParaArea"
                            },
                        success: function(data,status,xhr)
                            {                
                               

                                $('#divNavegaDepto').html(data);
                            },
                      error: function(xhr, status, error){
                          alert("Error!" + xhr.status);
                      }
                 });
             } 
         catch(e) 
             {
                 alert("A pesquisa não foi realizada");
             };                          
     }
    
    
   
                 
                 
                 
    function carregarSinteseProcesso (dadoDesejado  )
            {      
                
                /*{numeroProcesso: "2", anoProcesso: "1475", descricaoProcesso: "testes de pão", objetoProcessos: "pança", dataAberturaProcesso: "2021-03-21", …}
anoProcesso: "1475"
dataAberturaProcesso: "2021-03-21"
descFonteRecursos: "Transferencias e Convênios Estaduais - Vinculados"
descricaoModalidade: "Inexigibilidade"
descricaoProcesso: "testes de pão"
nomestatus: "Ativo"
numeroProcesso: "2"
objetoProcessos: "pança"
previsaoOrcamentaria: "1265.25"
__proto__: Object*/
                
             
               
                $('#loading').css('display','block');
                try 
                    {
                        $.ajax({
                            type: "POST",
                            url: "controllerAjax/controllerProcessoSintese.php",
                            dataType:"json",
                                data:{
                                    
                                    tipoDeConsulta: 'consultarSinteseDosProcessos',
                                   
                                    dadoDesejado: dadoDesejado
                                   
                                    },
                                success: function(data,status,xhr)
                                    {         
                                        
                                        console.log(data);
                                                                                                               
                                            if(data[0].resultado == true)                                                                 
                                            {
                                               
                                                $('.dadosDestino').show();
                                                
                                                
                                                  $('#txtObjetoProcesso').val(data[0].valor.objetoProcessos);
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
                     };
                 };
    
    
    
    
    
      
    
    
    $(document).ready(function() 
        {               
             
            $('#txtCPFPrincipal').mask("000.000.000-00");
            $('#txtTelefone').mask("(00) 00000-0000");
            $('#txtPrevisao').mask('0000.000.000.000.000,00', {reverse: true});
            $('.complementoProcesso').css('display','block');
            $('#conteudo').css('display','block');
            
            $('.dadosDestino').hide();
                 
        
        montaAbaDepto();
           
    
    }); 
    
    

    </script>


    
</body>
</html>