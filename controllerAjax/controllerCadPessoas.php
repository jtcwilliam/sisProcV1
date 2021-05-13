<?php
include '../classes/Pessoas.php';
$objPessoas = new Pessoas();
 

if (isset($_POST['alterarInserirPessoa'])) {

    $objPessoas->setIdStatus($_POST['status']);
    $objPessoas->setIdPerfil($_POST['perfil']);
    $objPessoas->setIdPessoas($_POST['idPessoas']);
    $objPessoas->permitirAcessoPessoa();


    return true;
}

/* @var $_POST type */
if (isset($_POST['pesquisaPessoasParaAdm'])) {

    $dados = $objPessoas->retornarPessoas(' where ps.idstatus in(' . $_POST['filtro'] . ')','ps.nomePessoa, ps.idPessoas, pr.descPerfil   from pessoas  ps inner join perfil pr on pr.idperfil = ps.idperfil  '  );

    if (isset($dados)) {

        
        $cont =1;

        foreach ($dados as $value) {
            ?>
            <tr>
                
                
                
                <?php
                
                if($_POST['validar'] == 1){
                ?>
                
                
                <td     width="400"><?= $value['nomePessoa'] ?></td>
                <td     width="200"     style="text-align: justify; color: #FF7F00"  ><?= $value['descPerfil'] ?> </a></td>
                <?php }
                
                
                else
                {
                    ?><td     width="600"><?= $value['nomePessoa'] ?></td> <?php
                }
                
                
                ?>
                <td     width="100"  class="iconsAdm"  ><a onclick="alterarPerfil('2', '2', <?= $value['idPessoas'] ?>)"  ><i class="fas fa-user-cog"></i></a></td>

                <td     width="100" class="iconsAdm"  ><a onclick="alterarPerfil('2', '5', <?= $value['idPessoas'] ?>)"  ><i class="fas fa-cash-register"></i></a></td>

                <td     width="100" class="iconsAdm"  ><a onclick="alterarPerfil('2', '3', <?= $value['idPessoas'] ?>)"  ><i class="fas fa-marker"></i></a></td>

                <td     width="100" class="iconsAdm"  ><a onclick="alterarPerfil('2', '4', <?= $value['idPessoas'] ?>)"  ><i class="fas fa-landmark"></i></a></td>

                <td     width="100"   class="iconsAdm"  ><a onclick="alterarPerfil('9999', '9999', <?= $value['idPessoas'] ?>)"  ><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php
        }
    } else {
        echo '  <td  colspan="6"     ><center><h5>Não Há Usuários Cadastrados</h5></center></i></td>   ';
    }


    return true;
} else if (isset($_POST['verificarVazio'])) {





    $error = array();
    $data = array();



 
 
 if (empty($_POST['cbPerfil'])) {

        $objPessoas->setIdPerfil('0');
    } else {


        $objPessoas->setIdPerfil($_POST['cbPerfil']);
    }

    
    $objPessoas->setNomePessoa(addslashes($_POST['txtNome']),'UTF-8') ;
 
  $objPessoas->setIdStatus($_POST['cbStatus']);
  
   $objPessoas->setIdArea($_POST['cbArea']);
   $objPessoas->setEmailPessoa(addslashes($_POST['txtEmail']),'UTF-8');

    $objPessoas->setRamalPessoa($_POST['txtRamal']);
 
     $objPessoas->setCelularPessoa($_POST['txtCelular']);
     
      $objPessoas->setCodFuncionalPessoa($_POST['txtFuncional']);

        $objPessoas->setSenha(md5($_POST['txtSenha']));

        $senha = $_POST['txtSenha'];
  

  

    if (empty($_POST['txtConfirmaSenha'])) {
        $error['confirmaSenha'] = 'Campo Confirmação de Senha está vazio';
    } else {
        $objPessoas->setConfirmaSenha($_POST['txtConfirmaSenha']);
        $confirmaSenha = $_POST['txtConfirmaSenha'];
    } 
  if ($_POST['txtSenha'] != $_POST['txtConfirmaSenha']) {
              echo json_encode(array('retorno'=>'erroSenhas'));
        } else {
            if ($objPessoas->inserirPessoas()) {
                echo json_encode(array('retorno'=>true));
            }
        }  
} 

if (isset($_POST['logar'])) {
    $objPessoas->setEmailPessoa($_POST['usuario']);
    $objPessoas->setSenha(md5($_POST['senha']));
    $objPessoas->setIdStatus($_POST['logar']);

    if ($dadosAcesso = $objPessoas->logar()) {


        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
           unset( $_SESSION['usuario']);

           
           $_SESSION['usuario']['idUsuario'] = $dadosAcesso[0]['idPessoas'];
            $_SESSION['usuario']['senha'] = $dadosAcesso[0]['senha'];
            $_SESSION['usuario']['nomePessoa'] = utf8_encode($dadosAcesso[0]['nomePessoa']);
            $_SESSION['usuario']['emailPessoa'] = $dadosAcesso[0]['emailPessoa'];
            $_SESSION['usuario']['ramalPessoa'] = $dadosAcesso[0]['ramalPessoa'];
            $_SESSION['usuario']['idStatus'] = $dadosAcesso[0]['idStatus'];
            $_SESSION['usuario']['idDepartamento'] = $dadosAcesso[0]['idDepartamento'];
            $_SESSION['usuario']['idPerfil'] = $dadosAcesso[0]['idPerfil'];
            $_SESSION['usuario']['idArea'] = $dadosAcesso[0]['idArea'];
            $_SESSION['usuario']['codFuncionalPessoa'] = $dadosAcesso[0]['codFuncionalPessoa'];
            $_SESSION['usuario']['descPerfil'] = $dadosAcesso[0]['descPerfil'];
            $_SESSION['usuario']['descricaoArea'] = utf8_encode($dadosAcesso[0]['descricaoArea']);
            $_SESSION['usuario']['nomeDepartamento'] = utf8_encode($dadosAcesso[0]['nomeDepartamento']);
            $_SESSION['usuario']['nomeStatus'] = $dadosAcesso[0]['nomeStatus'];
            
            
             echo json_encode(array('retorno' => true, 'nomeUsuario'=> utf8_encode($dadosAcesso[0]['nomePessoa'])  ));
            
            
        
    } else {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            session_destroy();
            unset($_SESSION);
        }
        
            echo json_encode(array('retorno' => false));
    }


    exit();
}
