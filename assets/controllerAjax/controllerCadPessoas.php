<?php


 
include_once '../classes/Pessoas.php';

$objPessoas = new Pessoas();


$error        = array();      // array to hold validation errors
$data           = array();  



if (empty($_POST['txtNome'])) {
    $error['nome'] = 'Campo Nome está vazio';
    
}else{
    $txtNome = $_POST['txtNome'];
}

if (empty($_POST['cbPerfil'])) {
    $error['Perfil'] = 'Campo Perfil está vazio';
    }else{
    $CbPerfil = $_POST['cbPerfil'];
}

if (empty($_POST['cbStatus'])) {
    $error['status'] = 'Campo status está vazio';
    }else{
    $cbStatus = $_POST['cbStatus'];
}

if (empty($_POST['txtTelefone'])) {
    $error['telefone'] = 'Campo telefone está vazio';
    }else{
    $txtTelefone = $_POST['txtTelefone'];
}

if (empty($_POST['cbDepto'])) {
    $error['Departamento'] = 'Campo Departamento está vazio';
    }else{
    $cbDepto = $_POST['cbDepto'];
}

if (empty($_POST['txtEmail'])) {
    $error['email'] = 'Campo email está vazio';
    }else{
    $txtEmail = $_POST['txtEmail'];
}

if (empty($_POST['txtSenha'])) {
    $error['senha'] = 'Campo senha está vazio';
    }else{
    $txtSenha = $_POST['txtSenha'];
}

if (empty($_POST['txtConfirmaSenha'])) {
    $error['confirmaSenha'] = 'Campo Confirmação de Senha está vazio';
    }else{
    $txtConfirmaSenha = $_POST['txtConfirmaSenha'];
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
 