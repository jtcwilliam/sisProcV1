<?php

class Conexao 
{
    private $success;
	 
    public function Conectar() 
    {
        try 
        {   
             
               //desenvolvimento local
                $user = 'root';
                $password = '';
                $db = 'bancoprocteste';
                $host = '127.0.0.1';   
                  
                                 
                   /*
                 
                 //desenvolvimento
               
                $user = 'bancoprocteste';
                $password = 'testePro987';
                $db = 'bancoprocteste';
                $host = 'bancoprocteste.mysql.dbaas.com.br';    
                          */

                 
              $con=mysqli_connect($host,$user,$password,$db);
              
              
           mysqli_set_charset($con, "utf8");
              /*
            if (!mysqli_set_charset($con, "utf8mb4")) 
                {
                    printf("Error loading character set utf8mb4: %s\n", mysqli_error($con));
                    exit();
                } else {

                }*/

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
 
        return $con;
           
            } catch (Exception $exc) 
            {
                echo $exc->getTraceAsString();
            }
    }
    
    
    
   
}
