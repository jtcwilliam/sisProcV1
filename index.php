
<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once './assets/includes/head.php'; 
        ?>
     
     
  
  
  <body style="background-color: #1c2c4e; ">
    
      <?php
        //incluindo o header (semantico)
        include_once './assets/includes/header.php';
      
      
      ?>
    
    <main style="background-color:#e9eaea;   " >
            
        <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                <div class="cell auto"></div>
                
                <div class="medium-2 cell">
                    <form>
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>Login  
                                        <input type="text" placeholder="Digite seu Email">
                                    </label>
                                </div>
                            </div>
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>Senha
                                        <input type="password" placeholder="Digite sua Senha">
                                    </label>
                                </div>
                            </div>

                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">

                                    <a  class="button success" style="width: 100%; background-color: #1c2c4e; color: white; font-weight: bold"   >Acessar</a>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="cell auto"></div>
            </div>
        
        
        </main>
      
      <!-- incluindo o footer  -->
    <?php 
      include_once './assets/includes/footer.php';
    ?>

     


<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
</body>
</html>