                        <header>

                            <div class="grid-container">
                                <div class="grid-x grid-margin-x">
                                    <div class="cell small-8 tituloGestao">  </div>

                                    <div class="cell small-4">
                                        <div class="grid-container">
                                            <figure>
                                                <img src="img/logAberto.png" alt="Logo Sistema de Projetos">
                                            </figure>     

                                        </div>
                                    </div>
                                </div>
                            </div>




                        </header>
                        <div class="grid-container"    >

                            <div class="title-bar" data-responsive-toggle="menuPrincipal" data-hide-for="medium">
                                <button class="menu-icon" type="button" data-toggle></button>
                                <div class="title-bar-title">Menu</div>
                            </div>


                            <div class="top-bar" id="menuPrincipal" style="display: none"  >
                                <div class="top-bar-left">
                                 
                                    <ul class="dropdown menu" data-dropdown-menu>
                                        <?php
                                        
                                        if(isset($_SESSION['usuario']['nomePessoa'])) {?>
                                        
                                        <li class="menu-text" style="color: #28617e; display: block">.:: Olá <?= $_SESSION['usuario']['nomePessoa'] ?> ::.</li>
                                        
                                        
                                        <?php }
                                        
                                        
                                        if(isset($_SESSION['usuario']['idPerfil'])){
                                        
                                            switch ($_SESSION['usuario']['idPerfil']) {
                                                case 1:
                                                    ?>    
                                                    
                                                        <!-- links adm -->
                                              
                                            <li>
                                                <a href="#" style="text-align: right" class="linksHeader">Gestão de Processos</a>
                                                <ul   class="menu vertical linksHeader">
                                                   
                                                    <li  ><a    class="linksHeader" href="cadProcessos.php">Cadastrar</a></li
                                                     <li  ><a   class="linksHeader" href="gestaoProcessos.php">Consultas Diversas</a></li>
                                                    <li  ><a    class="linksHeader" href="gestaoPorDepartamentos.php">Consultas por Departamentos</a></li>
                                                    <li  ><a    class="linksHeader" href="distribuicaoProcesso.php">Distribuir Processos</a></li>
                                                </ul>
                                            </li>
                                            
                                            
                                            
                                            
                                            <li  ><a   class="linksHeader" href="admPessoas.php">Gestão de Usuários</a></li>
                                             
                                            <li>
                                                <a href="#" style="text-align: right" class="linksHeader">Parâmetros</a>
                                                <ul   class="menu vertical linksHeader">
                                                 
                                                    <li  ><a    class="linksHeader" href="cadArea.php">Área</a></li>
                                                    <li  ><a   class="linksHeader" href="cadLancamento.php">Lancamentos</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li>
                                                <a href="sair.php" style="text-align: right" class="linksHeader">Sair</a>
                                                
                                            </li>
                                            <!-- links adm -->

                                        <?php
                                        
                                                    break;
                                                
                                                case 4:
                                                    ?>    
                                                    
                                            
                                            
                                                             <!-- links adm -->
                                            <li>
                                                <a href="#" style="text-align: right" class="linksHeader">Gestão de Processos</a>
                                                <ul   class="menu vertical linksHeader">
                                                    <li  ><a    class="linksHeader" href="cadProcessos.php">Cadastrar</a></li
                                                    <li  ><a   class="linksHeader" href="gestaoProcessos.php">Consultar</a></li>
                                                    <li  ><a    class="linksHeader" href="gestaoPorDepartamentos.php">Departamentos</a></li>
                                                    <li  ><a    class="linksHeader" href="distribuicaoProcesso.php">Distribuir Processos</a></li>
                                                </ul>
                                            </li
                                            <li  ><a   class="linksHeader" href="admPessoas.php">Gestão de Usuários</a></li>
                                            <li>
                                                <a href="#" style="text-align: right" class="linksHeader">Parâmetros</a>
                                                <ul   class="menu vertical linksHeader">
                                                 
                                                    <li  ><a    class="linksHeader" href="cadArea.php">Área</a></li>
                                                    <li  ><a   class="linksHeader" href="cadLancamento.php">Lancamentos</a></li>
                                                </ul>
                                            </li>
                                            <a href="sair.php" style="text-align: right" class="linksHeader">Sair</a>
                                            
                                           
                                                        

                                        <?php
                                                    break;
                                                case 6:
                                                    ?>    
                                                    
                                       
                                            <!-- links adm -->

                                        <?php
                                                    break;

                                                default:
                                                    break;
                                            }
                                            
                                            }
                                        ?>
                                            
                                        


                                    </ul>
                                </div>
                                
                                
                             
                            </div>
                            
                                
                        </div>