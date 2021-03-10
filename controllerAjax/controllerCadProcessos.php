<?php
 
include_once '../classes/Processos.php';
$objProcesso = new Processos();
 
$dados = array(); 

if(isset($_POST['consultaProcesso'])) {
    
    
   
    
   $dados[]= $objProcesso->retornarProcessos($_POST['txtNumero'], $_POST['txtAno']);
   
  
    echo json_encode($dados);
   
}

exit();




$error        = array();      // array to hold validation errors
$data           = array();  

 

if (empty($_POST['txtNumero'])) {
    $error['txtNumero'] = 'Campo Nome está vazio';
    
}else{
    $txtNumero = $_POST['txtNumero'];
}
 
if (empty($_POST['txtModalidade'])) {
    $error['txtModalidade'] = 'Campo Nome está vazio';
    
}else{
    $txtModalidade = $_POST['txtModalidade'];
}

if (empty($_POST['txtAno'])) {
    $error['txtAno'] = 'Campo Nome está vazio';
    
}else{
    $txtAno = $_POST['txtAno'];
}

if (empty($_POST['txtObjetoProcesso'])) {
    $error['txtObjetoProcesso'] = 'Campo Perfil está vazio';
    }else{
    $txtObjetoProcesso = $_POST['txtObjetoProcesso'];
}

if (empty($_POST['txtDescricaoProjeto'])) {
    $error['txtDescricaoProjeto'] = 'Campo status está vazio';
    }else{
    $txtDescricaoProjeto = $_POST['txtDescricaoProjeto'];
}

if (empty($_POST['txtFonteRecurso'])) {
    $error['txtFonteRecurso'] = 'Campo telefone está vazio';
    }else{
    $txtFonteRecurso = $_POST['txtFonteRecurso'];
}

if (empty($_POST['txtTag'])) {
    $error['txtTag'] = 'Campo Departamento está vazio';
    }else{
    $txtTag = $_POST['txtTag'];
}

if (empty($_POST['cbDeptoReq'])) {
    $error['cbDeptoReq'] = 'Campo email está vazio';
    }else{
    $cbDeptoReq = $_POST['cbDeptoReq'];
}


if (empty($_POST['txtDataAbertura'])) {
    $error['txtDataAbertura'] = 'Campo email está vazio';
    }else{
    $txtDataAbertura = $_POST['txtDataAbertura'];
}
 


if (empty($_POST['txtPrevisao'])) {
    $error['txtPrevisao'] = 'Campo email está vazio';
    }else{
    $txtPrevisao = $_POST['txtPrevisao'];
}
 

if ( ! empty($error)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['error']  = $error;
} else {

    // if there are no errors process our form, then return a message

    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}

// return all our data to an AJAX call
echo json_encode($data);
 