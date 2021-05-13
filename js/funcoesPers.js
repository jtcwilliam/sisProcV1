     function zerarTela()
        {          
            $('#conteudo').css('display','block');             
            $('#modalInformacoes').foundation('close');
            $('.camposPreConsulta').attr('disabled', false);
             $('.camposPreConsulta').val('');
        }
        
        $('.entradasDados').click(function () {
            $(this).css('background-color','white');
        });
        
         
     
     
function popularCombo(tabela, filtro, combo){        
        try 
            {
                $.ajax({
                    type: "POST",
                    url:  'controllerAjax/controllerCombo.php', //
                    dataType:"html",
                        data:{  
                                filtro:filtro,
                                tabela:tabela
                            },
                        success: function(data,status,xhr)
                            {        
                                
                            
                                 
                                 $('#'+combo).html(data);                                 
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
    
   