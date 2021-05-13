<?php
 
    


session_start();

    

 $perfilUsuario = $_SESSION['usuario']['idPerfil'];
 
 switch ($perfilUsuario) {
    case 4:
            header('Location: gestaoProcessos.php');
        

         break;
     
       case 1:
            header('Location: gestaoProcessos.php');
        

         break;

    default:
        break;
}