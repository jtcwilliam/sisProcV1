<?php


$perfil = array('4','1');

 
session_start();

 

 
   if( in_array($_SESSION['usuario']['idPerfil'],$perfil  ))
  {
    
  }else
  {
         header('Location: index.php?retorno=0');
  }
 