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
        
         
     
     
function popularCombo(tabela, filtro, combo)
    {        
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
    
function carregarTodos (dadoDesejado, areaApresentacao, tipoDeConsulta, departamento = null )
    {      
        //se vier consulta a partir do departamento, vai escrever no legend o nome do departamento
        if(departamento !== null)
            {
                $('#tabelasDosProcesso').html(departamento);
            } 

         $('#'+areaApresentacao).html($('#loading').css('display','block'));
        try 
            {
                $.ajax({
                    type: "POST",
                    url: "controllerAjax/controllerProcessoSintese.php",
                    dataType:"html",
                        data:{  dadoDesejado: dadoDesejado,
                                areaApresentacao: areaApresentacao,
                                tipoDeConsulta:  tipoDeConsulta

                            },
                        success: function(data,status,xhr)
                            {                
                                $('#loading').css('display','none');

                                //area da tela onde virão os dados
                                $('#'+areaApresentacao).html(data);
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
    
     
    
       function carregarSinteseProcesso (dadoDesejado)
            {     
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
                                         
                                          
                                          /*
                                        $('#modalInformacoes').css("background-color", "#dcdcdc");
                                        $('#modalInformacoes').css("color", "white");
                                        $('#modalInformacoes').css("font-weight", "bolder");
                                        $('#modalInformacoes').foundation('open');*/
                                                                           
                                        $('#txtIdProcesso').val(data[0].valor.idProcesso);                                      
                                        $('#numeroAnoProcesso').val(data[0].valor.numeroProcesso + '/' + data[0].valor.anoProcesso);
                                        $('#txtObjetoProcesso').val(data[0].valor.objetoProcessos);
                                        $('#txtDescricaoProjeto').val(data[0].valor.descricaoProcesso);
                                        $('#txtFonteRecurso').val(data[0].valor.idFonteDeRecurso);
                                         $('#cbFonteRecurso').val(data[0].valor.idFonteDeRecurso);
                                        
                                        
                                        $('#cbFavorito').val(data[0].valor.favorito);
                                        $('#cbPrioridades').val(data[0].valor.idprioridade);
                                        $('#txtModalidade').val(data[0].valor.descricaoModalidade);
                                         $('#txtModalidade').val(data[0].valor.idModalidade);
                                        $('#txtTag').val(data[0].valor.objetoProcessos);
                                        $('#txtPrevisao').val(data[0].valor.previsaoOrcamentaria);
                                        $('#cbDeptoReq').val(data[0].valor.deptoRequerente);
                                        $('#txtDataAbertura').val(data[0].valor.dataDeAberturaSemFormatacao);
                                        $('#loading').css('display', 'none');
                                       // $('#analiseProcesso').attr('href', 'analiticoProcesso.php?numeroProcesso=' + data[0].valor.numeroProcesso + '&anoProcesso=' + data[0].valor.anoProcesso + '&8654f1fd71ecf4ecc061cbab0a34a728=' + data[0].valor.idProcesso);
                                                                  
                                    },
                                error: function(xhr, status, error)
                                    {
                                        alert("Error!" + xhr.status);
                                    }
                         });
                     } 
                 catch(e) 
                     {
                         alert("A pesquisa não foi realizada");
                     };
            };
    
    
   
    /*
function carregarSinteseProcesso_b(dadoDesejado)
    { 
        $('#loading').css('display', 'block');
        try
        {
            $.ajax({
                type: "POST",
                url: "controllerAjax/controllerProcessoSintese.php",
                dataType: "json",
                data: {
                    tipoDeConsulta: 'consultarSinteseDosProcessos',
                    dadoDesejado: dadoDesejado
                },
                success: function (data, status, xhr)
                {                 
                    $('#modalInformacoes').css("background-color", "#dcdcdc");
                    $('#modalInformacoes').css("color", "white");
                    $('#modalInformacoes').css("font-weight", "bolder");
                    $('#modalInformacoes').foundation('open');
                    
                    
                    //carga dos dados (que são retornados por json)
                    $('#numeroAnoProcesso').val(data[0].valor.numeroProcesso + '/' + data[0].valor.anoProcesso);
                    $('#txtObjetoProcesso').val(data[0].valor.objetoProcessos);
                    $('#txtDescricaoProjeto').val(data[0].valor.descricaoProcesso);
                    $('#txtFonteRecurso').val(data[0].valor.descFonteRecursos);
                    $('#txtModalidade').val(data[0].valor.descricaoModalidade);
                    $('#txtTag').val(data[0].valor.objetoProcessos);
                    $('#txtPrevisao').val(data[0].valor.previsaoOrcamentaria);
                    $('#cbDeptoReq').val(data[0].valor.nomeDepartamento);
                    $('#txtDataAbertura').val(data[0].valor.dataDeAberturaSemFormatacao);
                    $('#loading').css('display', 'none');
                    $('#analiseProcesso').attr('href', 'analiticoProcesso.php?numeroProcesso=' + data[0].valor.numeroProcesso + '&anoProcesso=' + data[0].valor.anoProcesso + '&8654f1fd71ecf4ecc061cbab0a34a728=' + data[0].valor.idProcesso);
                },
                //se houver errro
                error: function (xhr, status, error) {
                    alert("Error!" + xhr.status);
                }
            });
        } catch (e)
        {
            //aqui só entra se a bosta for bem grande mesmo
            alert("A pesquisa não foi realizada");
        };
    };*/