<?php 

            if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){ ?>
        
                    <div class="container-fluid" style="background-color:gray;">
                                <span style="float:left;margin-top:7px;font-size:22px;">Bonjour <em><strong><?php echo $user->getusername(); ?></strong></em></span>
                                <div style="display:inline;float:right;margin-top:3px;">
                                        <a href="logout.php"><button class="btn btn-info btn-md"><strong>Déconnexion</strong></button></a>
                                </div>    
                                <div style="display:inline;float:right;margin-top:5px;">
                                        <span style="margin-right:80px;font-weight:bold;font-size:22px;"><a href="#">Mes associations</a></span>
                                        <span style="margin-right:80px;font-weight:bold;font-size:22px;"><a href="#">Mes événements</a></span>
                                        <?php
                                          if($user instanceof Admin){ ?>
                                            <span style="margin-right:80px;font-weight:bold;font-size:22px;"><a href="vassociation.php">Votre Association</a></span>
                                            
                                        <?php
                                          }
                                        ?>
                                </div>
                                
                                        
                                
                                
                        
                                
                    </div>
            
          <?php  
            }
        ?>