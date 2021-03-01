<?php

/*
 
include_once '../classes/Pessoas.php';

$objPessoas = new Pessoas();

*/
 

$error        = array();      // array to hold validation errors
$data           = array();  


 
          

if (empty($_POST['txtObjetoProcesso'])) {
    $error['txtObjetoProcesso'] = 'Campo Nome está vazio';
    
}else{
    $txtObjetoProcesso = $_POST['txtObjetoProcesso'];
}

if (empty($_POST['cbDeptoReq'])) {
    $error['cbDeptoReq'] = 'Campo Perfil está vazio';
    }else{
    $cbDeptoReq = $_POST['cbDeptoReq'];
}

if (empty($_POST['cbStatus'])) {
    $error['status'] = 'Campo status está vazio';
    }else{
    $cbStatus = $_POST['cbStatus'];
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
 