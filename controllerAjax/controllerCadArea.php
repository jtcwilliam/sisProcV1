<?php

  include '../classes/Area.php';
  
  $objArea = new Area();
  $objArea->setDepartamento($_POST['cbDepartamento']);
  $objArea->setDivisao(addslashes($_POST['txtNomeDaArea']), 'UTF-8') ;
  
  if($objArea->inserirArea()){
      echo json_encode(array('retorno'=>TRUE));
  }